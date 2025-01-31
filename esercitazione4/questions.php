<?php
session_start();
require_once "includes/connection.php";
require_once "includes/quiz_model.php";
require_once "includes/quiz_view.php";

if(isset($_GET["next-question"])){
    $_SESSION["question_id"] ++;
    
}
if($_SESSION["question_id"] == 4){
    
    unset($_SESSION["question_id"]);
    header("Location:result.php");
}
echo $_SESSION["question_id"];

$file = 'question_list_' . session_id() . '.json';
$answerFile = 'answer_list_' . session_id() . '.json';

$fromFile = get_question_from_file($file, $answerFile, $_SESSION["question_id"]);

var_dump($fromFile);



?>

<form action="?next-question=1&id=<?=$_SESSION["question_id"]?>" method="POST">
   
   <?php
    if(!$answers){
        $answers = [];
    } 
    create_question($fromFile);
    
    array_push($answers, $_POST["answers"]);

    $_SESSION["answers"] = $answers;

    ?>

    <button>Next</button>
</form>


<?php
