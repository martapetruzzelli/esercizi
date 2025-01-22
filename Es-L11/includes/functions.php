<?php
function getAllSandwich(){
    $sql = "SELECT * FROM sandwich ORDER BY price DESC";
} 

function getSandwichById(int $id){
    global $db;
    
    $sql = "SELECT * FROM sandwich WHERE id = :id";

    $query = $db->prepare($sql);

    $query->bindParam(':id',$id, PDO::PARAM_BOOL);

    if($query->execute()){

        $rows = $query->fetchAll(PDO::FETCH_ASSOC);

        [
            'flavor' => $flavor,
            'price' => $price,
            'vegan' => $vegan,
            'avaiable' => $avaiable
        ] = $rows[0];

    }else{

        throw new Exception($query->errorInfo());

    }
}

function createSandwich(){

}

function deleteSandwich(int $id){
    
}

function editSandwich(int $id){
    
}