<?php

require_once "database.php";
require_once "Managers/GameAndWatchManager.php";

$errorMessage = "";


// image id = code . png

if ($_POST) {
    if ($_POST["naam"] == "" || $_POST["code"] == "" || $_POST["code"] == "" || $_POST["price_charting"] == "" || $_POST["geschatte_waarde"] == "" || $_POST["beschrijving"] == "") {
        $errorMessage = "Informatie niet opgeslagen, niet elk veld was ingevuld";
    }

    $bestandsnaam = $_FILES["foto"]["name"];
    $tijdelijkeNaam = $_FILES["foto"]["tmp_name"];

    move_uploaded_file($tijdelijkeNaam, "images/GameAndWatches/" . $bestandsnaam);


    $compleet = isset($_POST["compleet"]) ? 1 : 0;
    $boxed = isset($_POST["met_doos"]) ? 1 : 0;
    $image_id = $_POST["code"];

    if ($errorMessage == "") {
        GameAndWatchManager::insertGameAndWatch($_POST["naam"], $_POST["code"], $_POST["geschatte_waarde"], $_POST["beschrijving"], $_POST["price_charting"], $compleet, $boxed, $image_id);
        header("location: index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Foto Upload</title>
    <link rel=stylesheet href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bitcount+Grid+Double:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>

    <div id="side-en-body">
        <div id="side-bar">
            <img class='plaatje' src="images/logo.png">
            <a class="side-bar-links" href="index.php">Mijn Game and Watch Collectie</a>
            <a class="side-bar-links  active-link" href='toevoegen.php'>Game and Watch toevoegen +</a>
            <a class="side-bar-links" href="https://www.ebay.nl/sch/i.html?_nkw=game+and+watch&_sacat=0&_from=R40&_trksid=p4624852.m570.l1313">Game and Watches op Ebay.nl</a>
            <a class="side-bar-links" href="https://www.marktplaats.nl/q/game+and+watch/">Game and Watches op Marktplaats.nl</a>


        </div>
        <div id="info-schema">

            <!-- nooit terug geleid, dus errormessage is vol, veld niet ingevuld -->
            <?php echo "<p id='error'>$errorMessage</p>" ?>

            <form method="POST" enctype="multipart/form-data">
                Naam:<input class="update-text" placeholder="bijv: Donkey Kong" type="text" name="naam"><br><br>

                Code:<input class="update-text" placeholder="bijv: DK-52" type="text" name="code"><br><br>

                Geschatte Waarde:<input class="update-text" placeholder="bijv: 100" type="text" name="geschatte_waarde"><br><br>

                Beschrijving:<textarea class="update-text-groot" type="text" name="beschrijving"></textarea><br><br>

                Price Charting URL:<input class="update-text" type="text" name="price_charting"><br><br>

                Compleet: <input type="checkbox" name="compleet"><br><br>

                Met doos: <input type="checkbox" name="met_doos"><br><br>

                Foto: <span id='normal-tekst'>(moet ingevulde Code + .png hebben, bijv DK-52.png)</span>
                <input type="file" name="foto"><br><br>
                <input type='submit' class='opslaan-knop' value="opslaan">
            </form>
        </div>

</body>

</html>