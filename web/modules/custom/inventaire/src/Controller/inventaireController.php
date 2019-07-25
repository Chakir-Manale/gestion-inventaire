
<?php
namespace Drupal\inventaire\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Database;
use Drupal\Core\Url;
/**
 * Class inventaireController.
 *
 * @package Drupal\inventaire\Controller
 */
class inventaireController extends ControllerBase {
  
  
  public function display() {
    
    $header_table = array(
      'ID' => t('ID'),
      'Nom_Collab' => t('Nom_Collab'),
      'prenom_collab'=> t('prenom_collab'),        
      'type_machine'=> t('type_machine'),        
      'marque'=> t('marque'),        
      'model'=> t('model'),
      'num_serie'=> t('num_serie'),       
      'Date_Livraison'=> t('Date_Livraison'),       
      'Date_Fin_Garantie'=> t('Date_Fin_Garantie'),        
      'Date_Affectation'=> t('Date_Affectation'),       
      'CPU'=> t('CPU'),       
      'RAM'=> t('RAM'),        
      'TypeHDD'=> t('TypeHDD'),        
      'Capacite'=> t('Capacite'),        
      'Taille_Ecran'=> t('Taille_Ecran'),        
      'num_serie_ecran'=> t('num_serie_ecran'),  
      'Souris'=> t('Souris'), 
      'Clavier'=> t('Clavier'), 
      'Adaptateur'=> t('Adaptateur'),  
      'Casque'=> t('Casque'), 
      'num_serie_casque'=> t('num_serie_casque'),
  
      //'opt' => t('operations'),
      //'opt1' => t('operations'),
    );
//select records from table
    $query = \Drupal::database()->select('inventaireSc', 'i');
      $query->fields('i', ['ID','Nom_Collab','Prenom_Collab','type_machine','marque','model',
      'num_serie','Date_Livraison','Date_Fin_Garantie','Date_Affectation',
      'CPU','RAM','TypeHDD','Capacite','Taille_Ecran','num_serie_ecran',
      'Souris','Clavier','Adaptateur','Casque','num_serie_casque']);

      $results = $query->execute()->fetchAll();
        $rows=array();
    foreach($results as $data)
    {
       // $delete = Url::fromUserInput('/mydata/form/delete/'.$data->id);
       // $edit   = Url::fromUserInput('/mydata/form/mydata?num='.$data->id);
      //print the data from table
             $rows[] = array(
                'ID' =>$data->ID,
                'Nom_Collab' => $data->Nom_Collab,
                'Prenom_Collab' => $data->Prenom_Collab,
                'type_machine' => $data->type_machine,
                'marque' => $data->marque,
                'model' => $data->model,
                'num_serie' => $data->num_serie,
                'Date_Livraison' => $data->Date_Livraison,
                'Date_Fin_Garantie' => $data->Date_Fin_Garantie,
                'Date_Affectation' => $data->Date_Affectation,
                'CPU' => $data->CPU,
                'RAM' => $data->RAM,
                'TypeHDD' => $data->TypeHDD,
                'Capacite' => $data->Capacite,
                'Taille_Ecran' => $data->Taille_Ecran,
                'num_serie_ecran' => $data->num_serie_ecran,
                'Souris' => $data->Souris,
                'Clavier' => $data->Clavier,
                'Adaptateur' => $data->Adaptateur,
                'Casque' => $data->Casque,
                'num_serie_casque' => $data->num_serie_casque,
                // \Drupal::l('Delete', $delete),
                // \Drupal::l('Edit', $edit),
            );
    }
    //display data in site
    $form['table'] = [
            '#type' => 'table',
            '#header' => $header_table,
            '#rows' => $rows,
            '#empty' => t('Rien dans la base de données'),
        ];
        return $form;
}