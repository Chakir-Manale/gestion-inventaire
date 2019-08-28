<?php

namespace Drupal\inventaire\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;
use Drupal\Core\Url;

/**
 * Class inventaireForm.
 */
class NewDeviceForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {return 'NewDevice_form'; }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) 
  {
#REGION  
    $form['ID'] = [
      '#type' => 'textfield',
      '#title' => $this->t('ID Device :'),
      '#maxlength' => 50,
      '#required' => true,
    ];  

    $form['nom_collab'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Nom Collab :'),
      '#maxlength' => 50,      
      '#required' => true,
    ];

    $form['prenom_collab'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Prenom Collab :'),
      '#maxlength' => 50,
      '#required' => true,
    ];
    $form['Type'] = [
      '#title' => $this->t('Type :'),
      '#type' => 'select',
      '#options' => array(
        'mobile' => t('mobile'),
        'tablette' => t('tablette'),
      ),
      '#default_value' => $this->t('mobile'),
      '#required' => true,
    ];

    $form['Numero'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Numero :'),
      '#maxlength' => 50,
        '#required' => true,
    ];

    $form['marque'] = [
      '#title' => $this->t('Marque :'),
      '#type' => 'select',
      '#options' => array(
        'samsung' => t('samsung'),
        'iphone' => t('iphone'),
      ),
      '#default_value' => $this->t('sumsang'),
      '#required' => true,
    ];

    $form['Skill_Center'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Skill Center :'),
      '#maxlength' => 50,
      '#required' => true,
    ];
      $form['Mac_Address'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Mac Address :'),
      '#maxlength' => 50,
        '#required' => true,
    ];
   
    
    $form['cancel'] = [
      '#type' => 'submit',
      '#value' => t('Cancel'),
      '#submit' => array('::AddNewFormCancel'),
      '#limit_validation_errors' => array(),
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Add'),
    ];

    return $form;
  }
#ENDREGION

  public function AddNewFormCancel(array &$form, FormStateInterface $form_state) {
    $url = Url::fromRoute('view.devices_list.page_1');
    return $form_state->setRedirectUrl($url);
  }
  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) 
  {
    parent::validateForm($form, $form_state);
    
    if(!preg_match('/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-F]{2})$/',$form_state->getValue('Mac_Address'))) {
      $form_state->setErrorByName('Mac_Address',"L'adresse' '".$form_state->getValue('Mac_Address')."' n'est pas valide");
    }

    if(!preg_match('/^(\+212|0)([ \-_]*)(\d[ \-_]*){9}$/',$form_state->getValue('Numero'))) {
      $form_state->setErrorByName('Numero',"the number '".$form_state->getValue('Numero')."'should be like:+212 6 ** ** ** ** ou 06 ** ** ** **");
    }
   
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) 
  {
    $fields = $form_state -> getValues();
      
    $node = \Drupal::entityTypeManager()->getStorage('node')->create(
              [ 'type' => 'device',
                'title' => 'Device ', 
                'field_id_device' => $fields['ID'],
                'field_nom_collab' => $fields['nom_collab'],     
                'field_prenom_collab' =>  $fields['prenom_collab'], 
                'field_type_device' => $fields['Type'],             
                'field_numero' => $fields['Numero'], 
                'field_marque_device' => $fields['marque'],       
                'field_skill_center' => $fields['Skill_Center'],            
                'field_mac' => $fields['Mac_Address'],                     
               ]);
             
              try {
                $node->save();
                $success = TRUE;
                drupal_set_message('Added the node.'.$node->id());
                 
                $ChangeNodeTitle = Node::load($node->id()); 
                $ChangeNodeTitle->title->value = 'Device '.$node->id();
                $ChangeNodeTitle->save();
        
                $url = Url::fromRoute('view.devices_list.page_1');
                return $form_state->setRedirectUrl($url);
              }
              catch (Exception $e) {
                drupal_set_message('Could not create the node.', 'error');
              }
 

  }

}