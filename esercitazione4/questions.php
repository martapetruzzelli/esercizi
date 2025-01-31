<?php
session_start();
require_once "includes/connection.php";
require_once "includes/quiz_model.php";
require_once "includes/quiz_view.php";

if(isset($_GET["next-question"])){
    $_SESSION["question_id"] ++;
}


$file = 'question_list_' . session_id() . '.json';
$answerFile = 'answer_list_' . session_id() . '.json';

$fromFile = get_question_from_file($file, $answerFile, $_SESSION["question_id"]);

var_dump($fromFile);

?>

<form action="?next-question=1&id=<?=$_SESSION["question_id"]?>" method="POST">
    <?php
    create_question($fromFile);
    ?>

    <button>Next</button>
</form>


<?php
if($_SESSION["question_id"] == count($fromFile['answers']) - 1){
    header("Location:index.php");
}