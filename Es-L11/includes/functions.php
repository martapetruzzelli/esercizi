<?php
function getAllSandwich(): array|null{

    global $db;
    $sql = "SELECT * FROM sandwich ORDER BY price DESC";

    $query = $db->prepare($sql);

    return $query->execute() ? $query->fetchAll(PDO::FETCH_ASSOC) : die();
}

function getSandwichById(int $id)
{
    global $db;

    $sql = "SELECT * FROM sandwich WHERE id =:id";

    $query = $db->prepare($sql);

    $query->bindParam(':id', $_GET['id'], PDO::PARAM_INT);

    if ($query->execute()) {

        return $query->fetchAll(PDO::FETCH_ASSOC)[0];

    } else {

        throw new Exception($query->errorInfo());

    }
}

function createSandwich($flavor, $price, $vegan, $avaiable): bool|array{

    global $db;
    
    $sql = "INSERT INTO sandwich (flavor, price, vegan, avaiable) VALUES (:flavor,:price,:vegan,:avaiable)";
    
    $query = $db->prepare($sql);

    $query->bindParam(":flavor", $flavor, PDO::PARAM_STR);
    $query->bindParam(":price", $price, PDO::PARAM_INT);
    $query->bindParam(":vegan", $vegan, PDO::PARAM_BOOL);
    $query->bindParam(":avaiable", $avaiable, PDO::PARAM_BOOL);
    
    return $query->execute() ? true : $query->errorInfo();

}

function deleteSandwich(int $id, string $from){

    global $db;

    $sql = "DELETE FROM $from WHERE id = :id";

    $query = $db->prepare($sql);

    $query->bindParam(":id", $id);

    if ($query->execute()) {

        header("Location: index.php?id=$id&message=Sandwich deleted succesfully");
    }


}

function updateSandwich($flavor, $price, $vegan, $avaiable, $id = null):bool{

    global $db;

    $sql = "UPDATE sandwich 
    SET flavor=:flavor,price=:price,vegan=:vegan,avaiable=:avaiable 
    WHERE id = :id";
    
    $query = $db->prepare($sql);
    
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->bindParam(":flavor", $flavor, PDO::PARAM_STR);
    $query->bindParam(":price", $price, PDO::PARAM_INT);
    $query->bindParam(":vegan", $vegan, PDO::PARAM_BOOL);
    $query->bindParam(":avaiable", $avaiable, PDO::PARAM_BOOL);
    
    return $query->execute() ? true : $query->errorInfo();

}

function archiveSandwich(int $id, string $newDb, string $from){

    global $db;

    $sql = "INSERT INTO $newDb SELECT * FROM $from WHERE id =:id";

    $query = $db->prepare($sql);

    $query->bindParam(':id', $_GET['id'], PDO::PARAM_INT);

    if ($query->execute()) {

        $rows = $query->fetchAll(PDO::FETCH_ASSOC);

        [
            'flavor' => $flavor,
            'price' => $price,
            'vegan' => $vegan,
            'avaiable' => $avaiable,
        ] = $rows[0];

    } else {

        throw new Exception($query->errorInfo());

    }
}
