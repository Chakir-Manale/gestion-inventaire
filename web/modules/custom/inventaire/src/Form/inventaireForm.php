<?php

namespace Drupal\inventaire\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;
use Drupal\Core\Url;

/**
 * Class inventaireForm.
 */
class inventaireForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {return 'inventaire_form'; }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) 
  {
#REGION   
    $form['ID'] = [
      '#type' => 'textfield',
      '#title' => $this->t('ID Pc :'),
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

    $form['type_machine'] = [
      '#type' => 'select',
      '#title' => $this->t('type Pc :'),
      '#options' => array(
        'Fixe' => t('Fixe'),
        'Portable' => t('Portable'),
      ),
      '#required' => true,
    ];

    $form['marque'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Marque :'),
      '#default_value' => $this->t('DELL'),
      '#required' => true,
    ];

    $form['model'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Modele :'),
      '#maxlength' => 50,
      '#required' => true,
    ];

    $form['num_serie'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Num Serie :'),
      '#maxlength' => 50,
        '#required' => true,
    ];
    
    $form['Date_Livraison'] = [
      '#type' => 'date',
      '#title' => $this->t('Date Livraison :'),
      '#required' => true,
    ];

    $form['Date_Fin_Garantie'] = [
      '#type' => 'date',
      '#title' => $this->t('Date Fin Garantie :'),
      '#required' => true,
    ];

    $form['Date_Affectation'] = [
      '#type' => 'date',
      '#title' => $this->t('Date Affectation :'),
      '#required' => true,
    ];

    $form['CPU'] = [
      '#type' => 'textfield',
      '#title' => $this->t('CPU :'),
      '#maxlength' => 50,
      '#required' => true,
    ];

    $form['RAM'] = [
      '#type' => 'textfield',
      '#title' => $this->t('RAM :'),
      '#maxlength' => 50,
      '#required' => true,
    ];

    $form['TypeHDD'] = [
      '#title' => $this->t('Type HDD :'),
      '#type' => 'select',
      '#options' => array(
        'SSD_M2' => t('SSD M2'),
        'SSD' => t('SSD'),
        'SATA' => t('SATA'),
      ),
      '#required' => true,
    ];

    $form['Capacite'] = [
      '#title' => $this->t('Capacite :'),
      '#type' => 'select',
      '#options' => array(
        '1 To' => t('1 To'),
        '500 Go' => t('500 Go'),
        '512 Go' => t('512 Go'),
        '256 Go' => t('256 Go'),
      ),
      '#required' => true,
    ];
    
    $form['Taille_Ecran'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Taille Ecran :'),
      '#maxlength' => 50,
      '#required' => true,
    ];

    $form['num_serie_ecran'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Num Serie ecran :'),
      '#maxlength' => 50,
      '#required' => true,
    ];

    $form['Souris'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Souris :'),
      '#default_value' => $this->t('DELL'),
      '#maxlength' => 50,
      '#required' => true,
    ];

    $form['Clavier'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Clavier :'),
      '#default_value' => $this->t('DELL'),
      '#maxlength' => 50,
      '#required' => true,
    ];

    $form['Adaptateur'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Adaptateur :'),
      '#required' => true,
    ];

    $form['Casque'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Casque :'),
      '#required' => true,
    ];

    $form['num_serie_casque'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Num Serie casque :'),
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
    
    $url = Url::fromRoute('view.listing_page.page_1');
    return $form_state->setRedirectUrl($url);
  }
  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) 
  {
   
    parent::validateForm($form, $form_state);

    
    if(!preg_match('/^[a-zA-Z ]+$/',$form_state->getValue('nom_collab'))) {
      $form_state->setErrorByName('nom_collab',"Le Nom '".$form_state->getValue('nom_collab')."' n'est pas valide");
    }
     
    if(!preg_match('/^[a-zA-Z ]+$/',$form_state->getValue('prenom_collab'))) {
        $form_state->setErrorByName('prenom_collab',"Le prenom '".$form_state->getValue('prenom_collab')."' n'est pas valide");
    }
    
    if(!preg_match('/^[a-zA-Z ]+$/',$form_state->getValue('marque'))) {
        $form_state->setErrorByName('marque',"La marque '".$form_state->getValue('marque')."' n'est pas valide");
    }  

    if(!preg_match('/^[0-9]{1,3}$/',$form_state->getValue('RAM'))) {
        $form_state->setErrorByName('RAM',"La RAM '".$form_state->getValue('RAM')."' n'est pas valide");
    }
    if(!preg_match('/^[0-9]$/',$form_state->getValue('ID'))) {
        $form_state->setErrorByName('ID'," l'ID '".$form_state->getValue('ID')."' n'est pas valide");
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) 
  {
    $fields = $form_state -> getValues();
      
    $node = \Drupal::entityTypeManager()->getStorage('node')->create(
              [ 'type' => 'ordinateurs',
                'title' => 'Ordinateur ',
                'field_nom_collab' => $fields['nom_collab'],     
                'field_prenom_collab' =>  $fields['prenom_collab'],    
                'field_type' => $fields['type_machine'],
                'field_marque' => $fields['marque'],              
                'field_modele' => $fields['model'],       
                'field_num_serie' => $fields['model'],            
                'field_id' => $fields['ID'],              
                'field_date_livraison' => $fields['Date_Livraison'],            
                'field_date_fin_garantie' => $fields['Date_Fin_Garantie'],            
                'field_date_affectation' => $fields['Date_Affectation'],           
                'field_cpu' => $fields['CPU'],           
                'field_ram' => $fields['RAM'],              
                'field_typehdd' => $fields['TypeHDD'],          
                'field_capacitehdd' => $fields['Capacite'],      
                'field_taille_ecran' => $fields['Taille_Ecran'],       
                'field_num_serie_ecran' => $fields['num_serie_ecran'],            
                'field_s' => $fields['Souris'],       
                'field_clavier' => $fields['Clavier'],          
                'field_adaptateur' => $fields['Adaptateur'],         
                'field_casque' => $fields['Casque'],
                'field_num_serie_casque' => $fields['num_serie_casque']      
               ]);
             
              try {
                $node->save();
                $success = TRUE;
                drupal_set_message('Added the node.'.$node->id());
                 
                $ChangeNodeTitle = Node::load($node->id()); 
                $ChangeNodeTitle->title->value = 'Ordinateur '.$node->id();
                $ChangeNodeTitle->save();
        
                $url = \Drupal\Core\Url::fromRoute('entity.node.canonical', ['node' => $node->id()]);
                return $form_state->setRedirectUrl($url);
              }
              catch (Exception $e) {
                drupal_set_message('Could not create the node.', 'error');
              }
  }

}