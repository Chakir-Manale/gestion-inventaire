<?php

namespace Drupal\inventaire\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;

use Drupal\Core\Url;

/**
 * Class inventaireForm.
 */
class EditDeviceForm extends FormBase  {
  
  /**
   * {@inheritdoc}
   */
  public function getFormId() { return 'EditDevice_form'; }

 
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state,int $id = 0 ) 
  {
     $node = Node::load($id); 
#REGION 
        $form['id'] = [
          '#type' => 'hidden',
          '#title' => $this->t('nid :'),
          '#value' => $node->id(),
          '#maxlength' => 50,      
          '#required' => true,
        ];
        $form['ID'] = [
          '#type' => 'textfield',
          '#title' => $this->t('ID Device :'),
          '#default_value' => $node->get('field_id_device')->value,
          '#required' => true,
        ];  
    
        $form['nom_collab'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Nom Collab :'),
          '#default_value' => $node->get('field_nom_collab')->value,      
          '#required' => true,
        ];
    
        $form['prenom_collab'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Prenom Collab :'),
          '#default_value' => $node->get('field_nom_collab')->value,
          '#required' => true,
        ];
        $form['Type'] = [
          '#title' => $this->t('Type :'),
          '#type' => 'select',
          '#options' => array(
            'mobile' => t('mobile'),
            'tablette' => t('tablette'),
          ),
          '#default_value' => $node->get('field_type_device')->value,
          '#required' => true,
        ];
    
        $form['Numero'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Numero :'),
          '#default_value' => $node->get('field_numero')->value,
            '#required' => true,
        ];
    
        $form['marque'] = [
          '#title' => $this->t('Marque :'),
          '#type' => 'select',
          '#options' => array(
            'samsung' => t('samsung'),
            'iphone' => t('iphone'),
          ),
          '#default_value' => $node->get('field_marque_device')->value,
          '#required' => true,
        ];
    
        $form['Skill_Center'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Skill Center :'),
          '#default_value' => $node->get('field_skill_center')->value,
          '#required' => true,
        ];
          $form['Mac_Address'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Mac Address :'),
          '#default_value' => $node->get('field_mac')->value,
            '#required' => true,
        ];
       
        $form['cancel'] = [
          '#type' => 'submit',
          '#value' => t('Cancel'),
          '#submit' => array('::UpdateFormCancel'),
          '#limit_validation_errors' => array(),
        ];

        $form['submit'] = [
          '#type' => 'submit',
          '#value' => $this->t('Update'),
        ];
#ENDREGION
    return $form;
  }

  public function UpdateFormCancel(array &$form, FormStateInterface $form_state) {
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
  public function submitForm(array &$form, FormStateInterface $form_state ) 
  {
    
    $fields = $form_state -> getValues(); 

    $node = Node::load( $fields['id']); 
  
      $node->field_id_device->value =  $fields['ID']; 
      $node->field_nom_collab->value =  $fields['nom_collab'];     
      $node->field_prenom_collab->value =   $fields['prenom_collab'];    
      $node->field_type_device->value =  $fields['Type'];
      $node->field_marque_device->value =  $fields['marque'];              
      $node->field_numero->value =  $fields['Numero'];       
      $node->field_skill_center->value =  $fields['Skill_Center'];            
      $node->field_mac->value =  $fields['Mac_Address']; 

    try { 
         $node->id->value = $fields['id'];
         $node->title->value = 'Device '. $fields['id'];
         $node->save();
         $success = TRUE;
         drupal_set_message('successfuly updated the device.'.$node->id(), 'status');

         $url = \Drupal\Core\Url::fromRoute('entity.node.canonical', ['node' => $node->id()]);
         return $form_state->setRedirectUrl($url);
        }
        catch (Exception $e) {
          drupal_set_message('Could not update the device.', 'error');
        }       

  }//Formsubmit method

}//endClass
  