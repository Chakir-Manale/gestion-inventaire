<?php

namespace Drupal\inventaire\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

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
    $form['nom_collab'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Nom_Collab'),
      '#maxlength' => 50,      
    ];
    $form['prenom_collab'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Prenom_Collab'),
      '#maxlength' => 50,
    ];
    $form['type_machine'] = [
      '#type' => 'select',
      '#title' => $this->t('type_machine'),
      '#options' => array(
        'Fixe' => t('Fixe'),
        'Portable' => t('Portable'),
      ),
    ];
    $form['marque'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Marque'),
      '#default_value' => $this->configuration['DELL'],
    ];
    $form['model'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Modele'),
      '#maxlength' => 50,
    ];
      $form['num_serie'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Num_Serie'),
      '#maxlength' => 50,
    ];
    $form['ID'] = [
      '#type' => 'textfield',
      '#title' => $this->t('ID_inventaire'),
      '#maxlength' => 50,
    ];
    $form['Date_Livraison'] = [
      '#type' => 'Date',
      '#title' => $this->t('Date_Livraison'),
    ];
    $form['Date_Fin_Garantie'] = [
      '#type' => 'Date',
      '#title' => $this->t('Date_Fin_Garantie'),
    ];
    $form['Date_Affectation'] = [
      '#type' => 'Date',
      '#title' => $this->t('Date_Affectation'),
    ];
    $form['CPU'] = [
      '#type' => 'textfield',
      '#title' => $this->t('CPU'),
      '#maxlength' => 50,
    ];
    $form['RAM'] = [
      '#type' => 'textfield',
      '#title' => $this->t('RAM'),
      '#maxlength' => 50,
    ];
    $form['TypeHDD'] = [
      '#title' => $this->t('TypeHDD'),
      '#type' => 'select',
      '#title' => $this->t('TypeHDD'),
      '#options' => array(
        'SSD_M2' => t('SSD_M2'),
        'SSD' => t('SSD'),
        'SATA' => t('SATA'),
      ),
    ];
    $form['Capacite'] = [
      '#title' => $this->t('Capacite'),
      '#type' => 'select',
      '#title' => $this->t('Capacite'),
      '#options' => array(
        '1 To' => t('1 To'),
        '500 Go' => t('500 Go'),
        '512 Go' => t('512 Go'),
        '256 Go' => t('256 Go'),
      ),
    ];
    $form['Taille_Ecran'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Taille_Ecran'),
      '#maxlength' => 50,
    ];
    $form['num_serie_ecran'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Num_Serie_ecran'),
      '#maxlength' => 50,
    ];
    $form['Souris'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Souris'),
      '#default_value' => $this->configuration['DELL'],
      '#maxlength' => 50,
    ];
    $form['Clavier'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Clavier'),
      '#default_value' => $this->configuration['DELL'],
      '#maxlength' => 50,
    ];
    $form['Adaptateur'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Adaptateur'),
    ];
    $form['Casque'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Casque'),
    ];
    $form['num_serie_casque'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Num_Serie_casque'),
      '#maxlength' => 50,
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Ajouter'),
    ];

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
  public function submitForm(array &$form, FormStateInterface $form_state) 
  {
    $fields = $form_state -> getValues();
/*
    $nom_collab = $fields['nom_collab'];
    $prenom_collab = $fields['prenom_collab'];
    $type_machine = $fields['type_machine'];
    $marque = $fields['marque'];
    $model = $fields['model'];
    $num_serie = $fields['model'];
    $ID = $fields['ID'];
    $Date_Livraison = $fields['Date_Livraison'];
    $Date_Fin_Garantie = $fields['Date_Fin_Garantie'];
    $Date_Affectation = $fields['Date_Affectation'];
    $CPU = $fields['CPU'];
    $RAM = $fields['RAM'];
    $TypeHDD = $fields['TypeHDD'];
    $Capacite = $fields['Capacite'];
    $Taille_Ecran = $fields['Taille_Ecran'];
    $num_serie_ecran = $fields['num_serie_ecran'];
    $Souris = $fields['Souris'];
    $Clavier = $fields['Clavier'];
    $Adaptateur = $fields['Adaptateur'];
    $Casque = $fields['Casque'];
    $num_serie_casque = $fields['num_serie_casque'];
*/
    $query = \Drupal::database();
    $query->update('inventaireSc')
        ->fields($fields)
        ->execute();
    drupal_set_message("Bien Ajouté ! ");
    $form_state->setRedirect('');

    /* foreach ($form_state->getValues() as $key => $value) {
      \Drupal::messenger()->addMessage($key . ': ' . ($key === 'text_format'?$value['value']:$value));
   */
   
   
    }
}

