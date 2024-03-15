<?php
/**
 * Pages des informations liés à un pays
 *
 * PHP version 7
 *
 * @category  Include_JS
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

?>

<?php  
    require_once 'header.php'; 
    require_once 'javascripts.php';
    require_once 'footer.php';

    if(isset($_GET['continent'])){
        $continent = $_GET['continent'];
        $desPays = getCountriesByContinent($continent);
      } else {
        $continent = "Tous";
        $desPays = getAllCountries($continent);
      }
?>

<div>
     <table class="table">
         <tr>
          <th>ID Pays</th>
          <th>Villes</th>
          <th>District</th>
          <th>Population</th>
         </tr>
       <?php
       // $desPays est un tableau dont les éléments sont des objets représentant
       // des caractéristiques d'un pays (en relation avec les colonnes de la table Country)
       
       foreach($desVilles as $villes){ ?>
          <tr>
            <td> <?php echo $villes->idCountry ?></td>
            <td> <?php echo $villes->Name ?></td>
            <td> <?php echo $villes->District ?></td>
            <td> <?php echo $villes->Population ?></td>
          </tr>
        <?php } ?>
     </table>

