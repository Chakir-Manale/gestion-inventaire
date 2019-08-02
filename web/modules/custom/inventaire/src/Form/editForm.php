<?php

namespace Drupal\inventaire\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;

/**
 * Class inventaireForm.
 */
class editForm extends FormBase  {
  
  /**
   * {@inheritdoc}
   */
  public function getFormId() {return 'inventaire_form'; }

 
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state,int $id = 0 ) 
  {
  // drupal.dump($id);die();

    $node = Node::load($id); 
    
    $form['id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('id :'),
      '#value' => $node->id(),
      '#maxlength' => 50,      
    ];
    $form['nom_collab'] = [
     '#type' => 'textfield',
     '#title' => $this->t('Nom_Collab :'),
     '#value' => $node->get('field_nom_collab')->value,
     '#maxlength' => 50,      
   ];

   $form['prenom_collab'] = [
    '#type' => 'textfield',
    '#title' => $this->t('Prenom_Collab :'),
    '#value' => $node->get('field_prenom_collab')->value,
    '#maxlength' => 50,
  ];
  $form['type_machine'] = [
    '#type' => 'select',
    '#title' => $this->t('type_machine :'),
    '#value' => $node->get('field_type')->value,
    '#options' => array(
      'Fixe' => t('Fixe'),
      'Portable' => t('Portable'),
    ),
  ];
  $form['marque'] = [
    '#type' => 'textfield',
    '#title' => $this->t('Marque :'),
    '#default_value' => $this->configuration['DELL'],
    '#value' => $node->get('field_marque')->value,
  ];
  $form['model'] = [
    '#type' => 'textfield',
    '#title' => $this->t('Modele :'),
    '#value' => $node->get('field_modele')->value,
    '#maxlength' => 50,
  ];
    $form['num_serie'] = [
    '#type' => 'textfield',
    '#title' => $this->t('Num_Serie :'),
    '#value' => $node->get('field_num_serie')->value,
    '#maxlength' => 50,
  ];
  $form['ID'] = [
    '#type' => 'textfield',
    '#title' => $this->t('ID_inventaire :'),
    '#value' => $node->get('field_id')->value,
    '#maxlength' => 50,
  ];
  $form['Date_Livraison'] = [
    '#type' => 'date',
    '#title' => $this->t('Date_Livraison :'),
    '#value' => $node->get('field_date_livraison')->value,
  ];
  $form['Date_Fin_Garantie'] = [
    '#type' => 'date',
    '#title' => $this->t('Date_Fin_Garantie :'),
    '#value' => $node->get('field_date_fin_garantie')->value,
  ];
  $form['Date_Affectation'] = [
    '#type' => 'date',
    '#title' => $this->t('Date_Affectation :'),
    '#value' => $node->get('field_date_affectation')->value,
  ];
  $form['CPU'] = [
    '#type' => 'textfield',
    '#title' => $this->t('CPU :'),
    '#value' => $node->get('field_cpu')->value,
    '#maxlength' => 50,
  ];
  $form['RAM'] = [
    '#type' => 'textfield',
    '#title' => $this->t('RAM :'),
    '#value' => $node->get('field_ram')->value,
    '#maxlength' => 50,
  ];
  $form['TypeHDD'] = [
    '#title' => $this->t('TypeHDD :'),
    '#value' => $node->get('field_typehdd')->value,
    '#type' => 'select',
    '#options' => array(
      'SSD_M2' => t('SSD_M2'),
      'SSD' => t('SSD'),
      'SATA' => t('SATA'),
    ),
  ];

 $form['Capacite'] = [
      '#title' => $this->t('Capacite :'),
      '#value' => $node->get('field_capacitehdd')->value,
      '#type' => 'select',
      '#options' => array(
        '1 To' => t('1 To'),
        '500 Go' => t('500 Go'),
        '512 Go' => t('512 Go'),
        '256 Go' => t('256 Go'),
      ),
    ];
    $form['Taille_Ecran'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Taille_Ecran :'),
      '#value' => $node->get('field_taille_ecran')->value,
      '#maxlength' => 50,
    ];
    $form['num_serie_ecran'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Num_Serie_ecran :'),
      '#value' => $node->get('field_num_serie_ecran')->value,
      '#maxlength' => 50,
    ];
    $form['Souris'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Souris :'),
      '#default_value' => $this->configuration['DELL'],
      '#value' => $node->get('field_s')->value,
      '#maxlength' => 50,
    ];
    $form['Clavier'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Clavier :'),
      '#default_value' => $this->configuration['DELL'],
      '#value' => $node->get('field_clavier')->value,
      '#maxlength' => 50,
    ];
    $form['Adaptateur'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Adaptateur :'),
      '#value' => $node->get('field_adaptateur')->value,
    ];
    $form['Casque'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Casque :'),
      '#value' => $node->get('field_casque')->value,
    ];
    $form['num_serie_casque'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Num_Serie_casque :'),
      '#value' => $node->get('field_num_serie_casque')->value,
      '#maxlength' => 50,
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Update'),
    ];


   //return $form;
   return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) 
  {
    foreach ($form_state->getValues() as $key => $value) {
      // @TODO: Validate fields.
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state ) 
  {
    
    $fields = $form_state -> getValues(); 
    $node = \Drupal::entityTypeManager()->getStorage('node')->load($fields['id']);
    $node->delete();
    
 
    $node = \Drupal::entityTypeManager()->getStorage('node')->create(
              [ 'type' => 'ordinateurs',
                'title' => 'Ordinateur '.$fields['id'],
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
         $node->nid->value = $fields['id'];
         $node->save();
         $success = TRUE;
         drupal_set_message('Updated the node.'.$node->id());
        }
        catch (Exception $e) {
          drupal_set_message('Could not update the node.', 'error');
        }
   
  }
}