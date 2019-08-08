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
     $node = Node::load($id); 
#REGION 
        $form['id'] = [
          '#type' => 'hidden',
          '#title' => $this->t('nid :'),
          '#value' => $node->id(),
          '#maxlength' => 50,      
          '#required' => true,
        ];      

        $form['title'] = [
        '#type' => 'textfield',
        '#default_value' => $node->title->value,
        '#maxlength' => 50,
        '#disabled' => TRUE,
      ];
      

        $form['cancel'] = array(
          '#type' => 'submit',
          '#value' => t('Cancel'),
          '#submit' => array('::DeleteFormCancel'),
        );

        $form['submit'] = [
          '#type' => 'submit',
          '#value' => $this->t('Delete'),
        ];

        
#ENDREGION
    return $form;
  }

  /**
   * Custom submission handler.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   */
  public function DeleteFormCancel(array &$form, FormStateInterface $form_state) {
    // Get the form values here as $form_state->getValue(array('sample_field')) 
    // and process it.
    $url = Url::fromRoute('view.listing_page.page_1');
    return $form_state->setRedirectUrl($url);
  
  }
  

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) 
  {   parent::validateForm($form, $form_state); }

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
      drupal_set_message('DELETED the node.');
      }
       catch (Exception $e) {
      drupal_set_message('Could not DELETE the node.', 'error');
      }
     
  $url = Url::fromRoute('view.listing_page.page_1');
  return $form_state->setRedirectUrl($url);

  }//Formsubmit method

}//end class

