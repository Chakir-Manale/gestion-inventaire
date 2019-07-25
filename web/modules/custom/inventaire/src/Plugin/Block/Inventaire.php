<?php

namespace Drupal\inventaire\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'Inventaire' block.
 *
 * @Block(
 *  id = "id_inventaire",
 *  admin_label = @Translation("Inventaire"),
 * )
 */
class Inventaire extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
    ] + parent::defaultConfiguration();
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
   // $build = [];
    $build['#theme'] = 'id_inventaire';
   
    $form = \Drupal::formBuilder()->getForm('Drupal\inventaire\Form\inventaireForm');
    return $form;
  }
 
}
