<?php

namespace Drupal\inventaire\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;

use Drupal\Core\Url;

/**
 * Class inventaireForm.
 */
class editForm extends FormBase  {
  
  /**
   * {@inheritdoc}
   */
  public function getFormId() { return 'inventaire_form'; }

 
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
        $form['nom_collab'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Nom_Collab :'),
        '#default_value' => $node->get('field_nom_collab')->value,
        '#maxlength' => 50,      
        '#required' => true,
      ];

      $form['prenom_collab'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Prenom_Collab :'),
        '#default_value' => $node->get('field_prenom_collab')->value,
        '#maxlength' => 50,
        '#required' => true,
      ];
      $form['type_machine'] = [
        '#type' => 'select',
        '#title' => $this->t('type_machine :'),
        '#default_value' => $node->get('field_type')->value,
        '#options' => array(
          'Fixe' => t('Fixe'),
          'Portable' => t('Portable'),
        ),
        '#required' => true,
      ];
      $form['marque'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Marque :'),
        '#default_value' => $node->get('field_marque')->value,
        '#required' => true,
      ];
      $form['model'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Modele :'),
        '#default_value' => $node->get('field_modele')->value,
        '#maxlength' => 50,
        '#required' => true,
      ];
        $form['num_serie'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Num_Serie :'),
        '#default_value' => $node->get('field_num_serie')->value,
        '#maxlength' => 50,
        '#required' => true,
      ];
      $form['ID'] = [
        '#type' => 'textfield',
        '#title' => $this->t('ID_inventaire :'),
        '#default_value' => $node->get('field_id')->value,
        '#maxlength' => 50,
        '#required' => true,
      ];
      $form['Date_Livraison'] = [
        '#type' => 'date',
        '#title' => $this->t('Date_Livraison :'),
        '#default_value' => $node->get('field_date_livraison')->value,
        '#required' => true,
      ];
      $form['Date_Fin_Garantie'] = [
        '#type' => 'date',
        '#title' => $this->t('Date_Fin_Garantie :'),
        '#default_value' => $node->get('field_date_fin_garantie')->value,
        '#required' => true,
      ];
      $form['Date_Affectation'] = [
        '#type' => 'date',
        '#title' => $this->t('Date_Affectation :'),
        '#default_value' => $node->get('field_date_affectation')->value,
        '#required' => true,
      ];
      $form['CPU'] = [
        '#type' => 'textfield',
        '#title' => $this->t('CPU :'),
        '#default_value' => $node->get('field_cpu')->value,
        '#maxlength' => 50,
        '#required' => true,
      ];
      $form['RAM'] = [
        '#type' => 'number',
        '#title' => $this->t('RAM :'),
        '#default_value' => $node->get('field_ram')->value,
        '#maxlength' => 50,
        '#required' => true,
      ];
      $form['TypeHDD'] = [
        '#title' => $this->t('TypeHDD :'),
        '#default_value' => $node->get('field_typehdd')->value,
        '#type' => 'select',
        '#options' => array(
          'SSD_M2' => t('SSD_M2'),
          'SSD' => t('SSD'),
          'SATA' => t('SATA'),
        ),
        '#required' => true,
      ];

    $form['Capacite'] = [
          '#title' => $this->t('Capacite :'),
          '#default_value' => $node->get('field_capacitehdd')->value,
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
          '#title' => $this->t('Taille_Ecran :'),
          '#default_value' => $node->get('field_taille_ecran')->value,
          '#maxlength' => 50,
          '#required' => true,
        ];
        $form['num_serie_ecran'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Num_Serie_ecran :'),
          '#default_value' => $node->get('field_num_serie_ecran')->value,
          '#maxlength' => 50,
          '#required' => true,
        ];
        $form['Souris'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Souris :'),
          '#default_value' => $node->get('field_s')->value,
          '#maxlength' => 50,
          '#required' => true,
        ];
        $form['Clavier'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Clavier :'),
          '#default_value' => $node->get('field_clavier')->value,
          '#maxlength' => 50,
          '#required' => true,
        ];
        $form['Adaptateur'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Adaptateur :'),
          '#default_value' => $node->get('field_adaptateur')->value,
          '#required' => true,
        ];
        $form['Casque'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Casque :'),
          '#default_value' => $node->get('field_casque')->value,
          '#required' => true,
        ];
        $form['num_serie_casque'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Num_Serie_casque :'), 
          '#default_value' => $node->get('field_num_serie_casque')->value,
          '#maxlength' => 50,
          '#required' => true,
        ];

        $form['submit'] = [
          '#type' => 'submit',
          '#value' => $this->t('Update'),
        ];
#ENDREGION
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) 
  {
    parent::validateForm($form, $form_state);

    if(!preg_match('/^[a-zA-Z]+$/',$form_state->getValue('nom_collab'))) {
      $form_state->setErrorByName('nom_collab',"Le Nom '".$form_state->getValue('nom_collab')."' n'est pas valide");
      }
     
      if(!preg_match('/^[a-zA-Z]+$/',$form_state->getValue('prenom_collab'))) {
        $form_state->setErrorByName('prenom_collab',"Le prenom '".$form_state->getValue('prenom_collab')."' n'est pas valide");
      }
    
      if(!preg_match('/^[a-zA-Z]+$/',$form_state->getValue('marque'))) {
        $form_state->setErrorByName('marque',"La marque '".$form_state->getValue('marque')."' n'est pas valide");
      }  

    
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state ) 
  {
    
    $fields = $form_state -> getValues(); 

    $node = Node::load( $fields['id']); 
  
   
      $node->field_nom_collab->value =  $fields['nom_collab'];     
      $node->field_prenom_collab->value =   $fields['prenom_collab'];    
      $node->field_type->value =  $fields['type_machine'];
      $node->field_marque->value =  $fields['marque'];              
      $node->field_modele->value =  $fields['model'];       
      $node->field_num_serie->value =  $fields['model'];            
      $node->field_id->value =  $fields['ID'];              
      $node->field_date_livraison->value =  $fields['Date_Livraison'];            
      $node->field_date_fin_garantie->value =  $fields['Date_Fin_Garantie'];            
      $node->field_date_affectation->value =  $fields['Date_Affectation'];           
      $node->field_cpu->value =  $fields['CPU'];           
      $node->field_ram->value =  $fields['RAM'];              
      $node->field_typehdd->value =  $fields['TypeHDD'];          
      $node->field_capacitehdd->value =  $fields['Capacite'];      
      $node->field_taille_ecran->value =  $fields['Taille_Ecran'];       
      $node->field_num_serie_ecran->value =  $fields['num_serie_ecran'];            
      $node->field_s->value =  $fields['Souris'];       
      $node->field_clavier->value =  $fields['Clavier'];          
      $node->field_adaptateur->value =  $fields['Adaptateur'];       
      $node->field_casque->value =  $fields['Casque'];
      $node->field_num_serie_casque->value =  $fields['num_serie_casque'];    
               


    try { 
         $node->id->value = $fields['id'];
         $node->title->value = 'Ordinateur '. $fields['id'];
         $node->save();
         $success = TRUE;
         drupal_set_message('successfuly updated the node.'.$node->id(), 'status');

         $url = \Drupal\Core\Url::fromRoute('entity.node.canonical', ['node' => $node->id()]);
         return $form_state->setRedirectUrl($url);
        }
        catch (Exception $e) {
          drupal_set_message('Could not update the node.', 'error');
        }  
      

  }//Formsubmit method

}//end class