<?php

require 'vendor/autoload.php';
require_once realpath(__DIR__ ."/cart_mvc/cart_model.php");
require_once realpath(__DIR__ ."/includes/connection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function create_message($products){
    ?>
    <div class='my-5'>
    <h1 class='text-center'>Items in your cart</h1>
    <table class="table mt-5">

        <thead>
            <tr>
                <th>Dish</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($products as $product){
        ?>
            <tr>
                <td><?=$product["name"]?></td>
                <td><?=$product["price"]?> €</td>
                <td><?=$product["quantity"]?></td>
            </tr>
        <?php
        }
        ?>   
        </tbody>
    </table>
</div>
    <?php
}

function send_mail(PDO $pdo, $products){

    $mail = new PHPMailer(true);
    $name = $_SESSION["username"];
    $email = "";
    $products = get_cart_products($pdo);


    try{
        //Configurazione server Smtp 
        $mail->isSMTP();
        $mail->Host = 'gnldm1022.siteground.biz';//Indirizzo del server SMTP. 
        $mail->SMTPAuth = true;//Dichiaro che il mio server SMTP utilizza l'autenticazione. 
        $mail->Username = 'info@captain-edward.tech';//Lo username SMTP non è altro che l'indirizzo email.
        $mail->Password = '$54z_fq2~G1#';//Password per accedere alla casella di posta 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Utilizzo un protocollo sicuro e vado a criptare la richiesta SSL/TLS
        $mail->Port = 465;

        //Informazioni su mittente e destinatario
        $mail->setFrom('info@captain-edward.tech','Sito web');//E-mail del mittente (Ho inserito anche il nome del mittente)
        // $mail->addAddress('ricezione@captain-edward.tech');//Email del destinatario. 
        $mail->addAddress('sidar47561@ahaks.com'); 
        
        //Contenuto dell'email. 
        $mail->isHTML();//Il contenuto dell'e-mail ora accetta l'HTML
        $mail->Subject = 'Messaggio inviato dal sito';//L'oggetto dell'e-mail. 
        $mail->Body = "
            <h1>Nuovo messaggio:</h1>
            <p><b>Name:</b>$name</p>
            <p><b>E-mail:</b></p>
            <p><b>Order:</b>" . create_message($products) . "</p>";
            //Il contenuto dell'email. 
        // $mail->AltBody = "Nome: $name\nEmail: $email\nMessaggio: $message";//Contenuto alternativo per i client e-mail che non supportano l'HTML

        //Invia la mail. 
        $mail->send();
        echo 'Messaggio inviato con successo';
    }catch(Exception $e){
        echo "Errore durante l'invio del messaggio: $mail->ErrorInfo";
    }
}