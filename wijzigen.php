<?php
require_once "database.php";
require_once "Managers/GameAndWatchManager.php";

$errorMessage = "";

if ($_POST) {
    if ($_POST["naam"] == "" || $_POST["code"] == "" || $_POST["code"] == "" || $_POST["price_charting"] == "" || $_POST["geschatte_waarde"] == "" || $_POST["beschrijving"] == "") {
        $errorMessage = "Informatie niet opgeslagen, niet elk veld was ingevuld";
    }
    // kijken of hij aan / uit staat voor post
    $compleet = isset($_POST["compleet"]) ? 1 : 0;
    $boxed = isset($_POST["met_doos"]) ? 1 : 0;

    if($errorMessage == ""){

    GameAndWatchManager::editByID($_GET['id'], $_POST["naam"], $_POST["code"], $_POST["price_charting"], $_POST["geschatte_waarde"], $compleet, $boxed, $_POST["beschrijving"]);
    header("location: index.php");
    exit();
    }
}

$GameAndWatch = GameAndWatchManager::getGameAndWatchByID($_GET["id"]);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel=stylesheet href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bitcount+Grid+Double:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <div id="side-en-body">
        <div id="side-bar">
            <img class='plaatje' src="images/logo.png">
            <a class="side-bar-links home-btn" href='index.php'>Terug naar hoofdmenu</a>
            <a class="side-bar-links active-link" href="index.php">Mijn Game and Watch Collectie</a>
            <a class="side-bar-links" href="https://www.ebay.nl/sch/i.html?_nkw=game+and+watch&_sacat=0&_from=R40&_trksid=p4624852.m570.l1313">Game and Watches op Ebay.nl</a>
            <a class="side-bar-links" href="https://www.marktplaats.nl/q/game+and+watch/">Game and Watches op Marktplaats.nl</a>


        </div>

        <?php
        $checked = ($GameAndWatch->compleet == 1) ? "checked" : ""; // als compleet 1 is (true), dan checkbox op checked, anders leeg
        $boxed = ($GameAndWatch->met_doos == 1) ? "checked" : ""; // zelfde gelft voor doos check


        // gevuld form
        // errorMessage wordt aangeroepen en is gevuld als je niet bent teruggeleid.

        echo "
        <div id='info-schema'>
        <p id='error'>$errorMessage</p>
        <form method='post'>
        Naam:<input class='update-text' value='$GameAndWatch->naam' name='naam'type='text'><br><br>

        Code:<input class='update-text' value='$GameAndWatch->code' name='code'type='text'><br><br>


        Geschatte Waarde:<input class='update-text' value='$GameAndWatch->geschatte_waarde' name='geschatte_waarde'type='text'><br><br>

        Beschrijving:<textarea name='beschrijving' class='update-text-groot'>$GameAndWatch->beschrijving</textarea><br><br>

        Price Charting URL:<input class='update-text' value='$GameAndWatch->price_charting' name='price_charting'type='text'><br><br>

        Compleet:<input name='compleet'type='checkbox' $checked><br><br>

        Met doos:<input name='met_doos'type='checkbox' $boxed><br><br>

        <input type='submit' class='opslaan-knop' value='opslaan'>
        </form>
        </div>
        ";
        ?>
</body>

</html>