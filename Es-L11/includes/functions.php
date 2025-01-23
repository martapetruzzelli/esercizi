<?php
function getAllSandwich(){
    $sql = "SELECT * FROM sandwich ORDER BY price DESC";
} 

function getSandwichById(int $id){
    global $db;

    $sql = "SELECT * FROM sandwich WHERE id =:id";

        $query = $db->prepare($sql);
    
        $query->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    
        if($query->execute()){
    
            return $query->fetchAll(PDO::FETCH_ASSOC)[0];
    
        }else{
    
            throw new Exception($query->errorInfo());
    
        }
}

function createSandwich(){

}

function deleteSandwich(int $id, string $from){

    global $db;
    
    $sql = "DELETE FROM $from WHERE id = :id";
    
    $query = $db->prepare($sql);

        $query->bindParam(":id", $id);

        if($query->execute()){

            header("Location: index.php?id=$id&message=Sandwich deleted succesfully");
        }


}

function editSandwich(int $id){
    
}

function archiveSandwich(int $id, string $newDb, string $from){
    global $db;

    $sql = "INSERT INTO $newDb SELECT * FROM $from WHERE id =:id";

        $query = $db->prepare($sql);
    
        $query->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    
        if($query->execute()){
    
            $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    
            [
                'flavor' => $flavor,
                'price' => $price,
                'vegan' => $vegan,
                'avaiable' => $avaiable,
            ] = $rows[0];
    
        }else{
    
            throw new Exception($query->errorInfo());
    
        }
}
