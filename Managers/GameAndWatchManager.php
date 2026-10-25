<?php

class GameAndWatchManager
{
    public static function getALLGameAndWatches()
    {
        global $con;
        $stmt = $con->prepare("SELECT * FROM game_and_watch");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getGameAndWatchByID($id)
    {
        global $con;
        $stmt = $con->prepare("SELECT * FROM game_and_watch WHERE id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt->fetchObject();
    }

    public static function editByID($id, $name, $code, $price_charting, $geschatte_waarde, $compleet, $met_doos, $beschrijving)
    {
        global $con;
        $stmt = $con->prepare("UPDATE game_and_watch SET naam = ?, code = ?, price_charting = ?, geschatte_waarde = ?, compleet = ?, met_doos = ?, beschrijving = ? WHERE id = ?");
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $code);
        $stmt->bindValue(3, $price_charting);
        $stmt->bindValue(4, $geschatte_waarde);
        $stmt->bindValue(5, $compleet);
        $stmt->bindValue(6, $met_doos);
        $stmt->bindValue(7, $beschrijving);
        $stmt->bindValue(8, $id);
        $stmt->execute();
    }

    public static function insertGameAndWatch($naam, $code, $geschatte_waarde, $beschrijving,  $price_charting, $compleet, $met_doos, $image_id)
    {
        global $con;
        $stmt = $con->prepare("INSERT into game_and_watch (naam, code, geschatte_waarde, beschrijving, price_charting, compleet, met_doos, image_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindValue(1, $naam);
        $stmt->bindValue(2, $code);
        $stmt->bindValue(3, $geschatte_waarde);
        $stmt->bindValue(4, $beschrijving);
        $stmt->bindValue(5, $price_charting);
        $stmt->bindValue(6, $compleet);
        $stmt->bindValue(7, $met_doos);
        $stmt->bindValue(8, $image_id);
        $stmt->execute();
    }

    public static function deleteById($id){
        global $con;
        $stmt = $con->prepare("DELETE FROM game_and_watch WHERE id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}
