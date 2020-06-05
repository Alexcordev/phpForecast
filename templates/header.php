<!--
    Auteur: Alexandre Cormier;
    Matricule: 748947;
    Code Permanent: CORA 2902 7602
    Login: cormiea
-->
<!DOCTYPE html>
<html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?=isset($PageTitle) ? $PageTitle : "Travail Pratique #1"?></title>
            <link rel="stylesheet" href="../css/styles.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <div class="main-container">
                <h1 class="main-title">Informations météorologiques</h1>
                <h2 class="date">
                    <?php setlocale(LC_ALL, 'fr_FR');
date_default_timezone_set("America/New_York");
echo "Le " . strftime("%A %d %B %Y - %H:%M:%S");
?>
                </h2>
            </div>
        </head>
    <body>