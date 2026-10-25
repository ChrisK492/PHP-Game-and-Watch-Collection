<?php


require_once "database.php";
require_once "Managers/GameAndWatchManager.php";

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
                <a class="side-bar-links active-link" href="index.php">Mijn Game and Watch Collectie</a>
            <a class="side-bar-links" href='toevoegen.php'>Game and Watch toevoegen +</a>
            <a class="side-bar-links" href="https://www.ebay.nl/sch/i.html?_nkw=game+and+watch&_sacat=0&_from=R40&_trksid=p4624852.m570.l1313">Game and Watches op Ebay.nl</a>
            <a class="side-bar-links" href="https://www.marktplaats.nl/q/game+and+watch/">Game and Watches op Marktplaats.nl</a>


        </div>
        <?php
        $checked = ($GameAndWatch->compleet == 1) ? "checked" : ""; // als compleet 1 is (true), dan checkbox op checked, anders leeg
        $boxed = ($GameAndWatch->met_doos == 1) ? "checked" : ""; // zelfde gelft voor doos check

        echo "
        <div id='info-schema'>
            <h1>$GameAndWatch->naam ($GameAndWatch->code)</h1>

            <img id='plaatje-meerinfo' src='images/GameAndWatches/$GameAndWatch->image_id'>

            <p>$GameAndWatch->beschrijving</p><br>

            <p>geschatte <b>waarde</b>: €$GameAndWatch->geschatte_waarde</p><br>

            Game and Watch is <b>compleet</b>:<input type='checkbox' disabled readonly name='compleet' $checked><br><br>

            Game and Watch heeft <b>doos</b>:<input type='checkbox' disabled readonly name='boxed' $boxed><br><br>

            Game and Watch op <b>pricecharting</b>: <a href='$GameAndWatch->price_charting'>$GameAndWatch->price_charting</a>
        </div>
        ";

        ?>
</body>

</html>