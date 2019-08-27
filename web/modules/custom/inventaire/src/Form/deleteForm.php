<?php

namespace Drupal\inventaire\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;

use Drupal\Core\Url;
/**
 * Class inventaireForm.
 */
class deleteForm extends FormBase  {
  
  /**
   * {@inheritdoc}
   */
  public function getFormId() { return 'delete_form'; }

 
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state,int $id = 0 ) 
  {
#REGION   
        $node = Node::load($id); 

         //the node id 
        $form['id'] = [
          '#type' => 'hidden',
          '#title' => $this->t('nid :'),
          '#default_value' => $node->id(),
          '#disabled' => TRUE,
        ]; 
       
 if (strpos($node->title->value, 'Device') !== false) {
    $form['title'] = [
          '#type' => 'textfield',
          '#default_value' => 'Title: '.$node->title->value,
          '#disabled' => TRUE,
        ];
        
         //the attribute ID      
        $form['ID'] = [
          '#type' => 'textfield',
          '#default_value' => 'ID: '.$node->get('field_id_device')->value,
          '#disabled' => TRUE,
        ];
} else if (strpos($node->title->value, 'Ordinateur') !== false){
   
  $form['title'] = [
    '#type' => 'textfield',
    '#default_value' => 'Title: '.$node->title->value,
    '#disabled' => TRUE,
  ];
  
   //the attribute ID      
  $form['ID'] = [
    '#type' => 'textfield',
    '#default_value' => 'ID: '.$node->get('field_id')->value,
    '#disabled' => TRUE,
  ];
}

       

        $form['cancel'] = array(
          '#type' => 'submit',
          '#value' => t('Cancel'),
          '#submit' => array('::DeleteFormCancel'),
        );

        $form['submit'] = [
          '#type' => 'submit',
          '#value' => $this->t('Delete'),
        ];

    return $form;
#ENDREGION
  }
        

  public function DeleteFormCancel(array &$form, FormStateInterface $form_state) {
    $fields = $form_state -> getValues(); 
    $node = Node::load( $fields['id']);
    if (strpos($node->title->value, 'Device') !== false) {

      $url = Url::fromRoute('view.devices_list.page_1');
      return $form_state->setRedirectUrl($url);
    }
    else if (strpos($node->title->value, 'Ordinateur') !== false){
        $url = Url::fromRoute('view.listing_page.page_1');
        return $form_state->setRedirectUrl($url);
      }    
   }
  

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state)  {  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state ) 
  {
    
    $fields = $form_state -> getValues(); 

    $node = Node::load( $fields['id']); 
  

    try {
      $node = \Drupal::entityTypeManager()->getStorage('node')->load($fields['id']);
      $node->delete();
      drupal_set_message('Machine DELETED with success .');
      }
       catch (Exception $e) {
      drupal_set_message('Could not DELETE machine .', 'error');
      }
      
      $url = Url::fromRoute('view.devices_list.page_1');
      return $form_state->setRedirectUrl($url);
    
  }//End Formsubmit 

}//endClass

