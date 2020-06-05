<!--
    Auteur: Alexandre Cormier;
    Matricule: 748947;
    Code Permanent: CORA 2902 7602;
    Login: cormiea
-->

<?php
$PageTitle = "Travail Pratique #1";
include_once '../TP1/templates/header.php';

?>

  <div class="main-container">
  <div id="alert" class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>OOPPS!!</strong> Veuillez sélectionner une ville svp.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<hr class="line">
<div class="card text-center">
  <div class="card-body">
    <h5 class="card-title">Choix de la ville</h5>
    <form name="formVilles" action="./villes.php" method="post">
      <div class="form-group">

        <?php

$file = 'http://www.iro.umontreal.ca/~dift1147/pages/TPS/tp1/villes.txt';
$fichier = @fopen($file, 'r') or die("Problème à la lecture du fichier");
?>

<select multiple class="form-control" id="villes" name="ville[]" size="6">
<?php
if ($fichier) {
    while (!feof($fichier)) {
        $line = fgets($fichier);
        $extract = substr($line, 6);
        $output = preg_replace_callback("/(&#[0-9]+;)/", function ($m) {return mb_convert_encoding($m[1], "UTF-8", "HTML-ENTITIES");}, $extract);
        $item = strtok($output, ";");
        $ficV = array_pad(explode(":", $output), 2, null);
        //$ficV = explode(":", $output);
        $fich = substr($ficV[1], 0);
        trim($fich);
        if (strlen($item) > 1) {
            echo '<option value="' . $fich . '">' . $item . '</option>';
        }
    }

    fclose($fichier);
} else {
    echo "Problème à d'accès aux données sur le serveur";
}
?>
        <input type="hidden" name="monAction" value="obtenirVille">
        </select><br>

        <input class="btn btn-warning" type="button" onClick="envoyerFormulaire(formVilles);" value="Afficher la météo" />
    </form>

        </div>
</div>
  </div>
        </div>

<?php
include_once '../TP1/templates/footer.php';
?>
