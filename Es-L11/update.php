<?php include_once './includes/header.php';

try{

    $avaiablePostValues = ['id', 'flavor', 'price', 'vegan', 'avaiable'];
    include __DIR__ . '/includes/checkPostFields.php';

}catch(Exception $e){
    echo $e->getMessage();
}

$sql = "UPDATE sandwich 
SET flavor=:flavor,price=:price,vegan=:vegan,avaiable=:avaiable 
WHERE id = :id";

$query = $db->prepare($sql);

$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->bindParam(":flavor", $flavor, PDO::PARAM_STR);
$query->bindParam(":price", $price, PDO::PARAM_INT);
$query->bindParam(":vegan", $vegan, PDO::PARAM_BOOL);
$query->bindParam(":avaiable", $avaiable, PDO::PARAM_BOOL);



if($query->execute()){
    header("Location: index.php?message=Sandwich edited successfully!");
}else{
    echo $query->errorInfo();
}

include_once './includes/footer.php';