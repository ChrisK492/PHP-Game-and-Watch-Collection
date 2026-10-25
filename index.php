<?php

require_once "database.php";
require_once "Managers/GameAndWatchManager.php";

$GameAndWatches = GameAndWatchManager::getALLGameAndWatches();

// DELETE

if (isset($_GET["id"])) {
    GameAndWatchManager::deleteById($_GET["id"]);
    header("location: index.php");
}



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
            <a class="side-bar-links active-link" href="index.php">Mijn Game and Watch Collectie</a>
            <a class="side-bar-links" href='toevoegen.php'>Game and Watch toevoegen +</a>
            <a class="side-bar-links" href="https://www.ebay.nl/sch/i.html?_nkw=game+and+watch&_sacat=0&_from=R40&_trksid=p4624852.m570.l1313">Game and Watches op Ebay.nl</a>
            <a class="side-bar-links" href="https://www.marktplaats.nl/q/game+and+watch/">Game and Watches op Marktplaats.nl</a>


        </div>
        <div id="container">
            <h1>Mijn Game and Watch Collectie</h1>


            <?php
            foreach ($GameAndWatches as $GAW) {
                echo "
<div id='card'>
    <img src='images/GameAndWatches/$GAW->image_id' class='plaatje'>

    <div class='info'>
        Naam: $GAW->naam<br>
        Code: $GAW->code<br>
        <div id='price-container'>
        PriceCharting: <a id='url' href='$GAW->price_charting'>$GAW->price_charting</a>
                </div>

        Waarde: €$GAW->geschatte_waarde

        <div class='buttons'>
            <a class='shared-btn-style' href='meerinfo.php?id=$GAW->id' id='meerinfoknop'>Meer informatie</a>
            <a class='shared-btn-style' id='wijzigknop' href='wijzigen.php?id=$GAW->id'>Wijzigen</a>
            <a class='shared-btn-style' id='verwijderknop' href='index.php?id=$GAW->id'>Verwijderen</a>
        </div>
    </div>
</div>

";
            }

            ?>

        </div>
    </div>
</body>

</html>