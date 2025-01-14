<?php require_once __DIR__.'/m1-l5.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
   
    <div class="container">
        <div class="card-body row mx-auto">
            <?php foreach($products as $product) : ?>
            <div class="col-12 col-md-6 col-lg-4 my-5 mx-auto py-3 bg-light">
                <img src="https://picsum.photos/300" class="card-img-top">
                <h4 class="card-title my-4 text-center"><?=$product['name']?></h4>
                <p class="card-text my-2">Price: <?=$product['price']?>€</p>
                <p class="card-text my-2">Details: <?=$product['description']?></p>    
                
                <a href="#" class="btn btn-primary my-4">View Product</a>
            </div>
            <?php 
            endforeach;?>
        </div>
    </div>

</body>
</html>