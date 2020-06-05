<!--
    Auteur: Alexandre Cormier;
    Matricule: 748947;
    Code Permanent: CORA 2902 7602
    Login: cormiea
-->

<?php
$PageTitle = "Travail Pratique #1";
include_once './templates/header.php';
?>
<div>
    <hr class="line"/>
    <h3 class="city">

<?php
foreach ($_POST["ville"] as $city) {
    $cut = explode('.', $city);
    print "Ville: " . ucfirst($cut[0]);
}

?>

    </h3>
    <?php
$action = $_POST['monAction'];
switch ($action) {
    case "obtenirVille":
        $ext = $_POST["ville"];
        $x = $ext[0];
        trim($x);
        listeVille($x);
        break;

}

function listeVille($x)
{
    define("FILE", "http://www.iro.umontreal.ca/~dift1147/pages/TPS/tp1/");
    $fic = trim(FILE . $x);

    $fichier = fopen($fic, "r") or die("Ce fichier n'existe pas!");

    $contents = file($fic);
    $img = null;
    $information = null;
    $temp = null;
    $vent = null;
    $hum = null;
    $desc = null;

    foreach ($contents as $infos) {
        $split = explode(':', $infos);
        $info = $split;
        trim($info[0]);

        switch ($info[0]) {
            case 'information':
                $img = trim($info[1]);
                $information = $info[1];
                break;
            case 'temperature':
                $temp = $info[1];
                break;
            case 'vent':
                $vent = $info[1];
                break;
            case 'humidite':
                $hum = $info[1];
                break;
            case 'desc':
                $desc = $info[1];
                break;

        }
        ?>
<div class="container">
<div class="row">
    <div class="col-lg-12">
<?php
$display = '<table class="table table-bordered">';
        $display .= "<thead><tr class='headerStyle'>";
        $image = "<img width='200px' height='200px' src='./images/$img.gif'>";
        $display .= "<th colspan='3'>" . $image . "<br />" . "<span class='highlight'>" . $information . "</span>" . "</th></tr></thead>";
        $display .= "<tbody><tr><td>Température: " . "<span class='highlight'>" . $temp . "</span>" . "</td>";
        if ($vent == null) {
            $vent = "&nbsp;";
            $display .= "<td>" . $vent . "</td>";
        } else {
            $display .= "<td>Vent:" . "<span class='highlight'>" . $vent . "</span>" . "</td>";
        }
        if ($hum == null) {
            $hum = "&nbsp";
            $display .= "<td>" . $hum . "</td></tr>";
        } else {
            $display .= "<td>Humidité: " . "<span class='highlight'>" . $hum . "</span>" . "</td></tr>";
        }
        $display .= "<tr><td colspan='3'>Description: " . "<span class='highlight'>" . $desc . "</span>" . "</td></tr></tbody></table>";

    }

    fclose($fichier);
    echo $display;
    echo "<br><br><a style='margin:20px auto 20px 20px;' href=\"tp1.php\">Retour à l'acceuil</a>";

}

?>
 </div>
</div>
 </div>
<?php
include_once './templates/footer.php';
?>