<?php
/**
 * Home Page
 *
 * PHP version 7
 *
 * @category  Page
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

?>


<?php  require_once 'header.php'; ?>


<main role="main" class="flex-shrink-0">

<?php 

if(isset($_GET['continent'])){
  $continent = $_GET['continent'];
  $desPays = getCountriesByContinent($continent);
} else {
  $continent = "Tous";
  $desPays = getAllCountries($continent);
}

$continentFR = "";

?>

  <div class="container">
    <h1><?php switch($continent) { 
      case "North America":
        echo "Les pays en Amérique du Nord";
        break;
      case "Asia":
        echo "Les pays en Asie";
        break;
      case "Africa":
        echo "Les pays en Afrique";
        break;
      case "Europe":
        echo "Les pays en Europe";
        break;
      case "South America":
        echo "Les pays en Amérique du Sud";
        break;
      case "Oceania":
        echo "Les pays en Océanie";
        break;
      case "Antarctica":
        echo "Les pays en Antarctique";
        break;
      case "Tous":
        echo "Tous les pays";
        break;
    } ?></h1>
    <div>
     <table class="table">
         <tr>
          <th>ID</th>
          <th>Drapeau</th>
          <th>Nom</th>
          <th>Population</th>
          <th>Continent</th>
          <th>Capital</th>
         </tr>
       <?php
       // $desPays est un tableau dont les éléments sont des objets représentant
       // des caractéristiques d'un pays (en relation avec les colonnes de la table Country)
       
       foreach($desPays as $pays){ ?>
          <tr>
            <td> <?php echo $pays->id ?></td>
            <?php $code = mb_strtolower($pays->Code2); ?>
            <td> <img src="<?php if(file_exists("images/drapeau/".$code.".png")) {
                            echo "images/drapeau/$code.png";} 
                            else {echo "images/drapeau/default.png";} ?>"
                      alt="<?php echo strtolower($pays->Name)?>" 
                      style="max-height: 25px;" /></td>
            <td> <a href="info.php"><?php echo $pays->Name ?></td>
            <td> <?php echo $pays->Population ?></td>
            <td> <?php echo $pays->Continent ?></td>
            <td> <?php echo getCapitale($pays->Capital) ?></td>
          </tr>
        <?php } ?>
     </table>
</main>

<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>
