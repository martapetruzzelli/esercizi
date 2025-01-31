<?php
session_start();
require_once "includes/connection.php";
require_once "includes/quiz_model.php";
require_once "includes/quiz_view.php";

if(!isset($_SESSION["question_id"])){
    $_SESSION["question_id"] = 0;
}

$file = 'question_list_' . session_id() . '.json';

$questions = get_questions($pdo, $_POST["subject"]);

file_put_contents($file, json_encode($questions));

$ids = array_map(function ($question) {
    return $question["id"];
}, $questions);

$ids = implode(",", $ids);

$answerFile = 'answer_list_' . session_id() . '.json';

$answers = get_answers($pdo, $ids);

file_put_contents($answerFile, json_encode($answers));

header("Location:questions.php");