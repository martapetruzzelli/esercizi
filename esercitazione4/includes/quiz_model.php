<?php

function get_all_subjects(PDO $pdo): array{
    $sql ="SELECT * FROM subject";
    $query = $pdo->prepare($sql);
    $query->execute();
    
    $subjects = $query->fetchAll(PDO::FETCH_ASSOC);
    return $subjects;

}

function get_questions(PDO $pdo, int $subject_id): array{
    $sql = "SELECT * FROM question WHERE subject_id = :subject_id ORDER BY RAND();";
    $query = $pdo->prepare($sql);
    $query->bindParam(":subject_id", $subject_id, PDO::PARAM_INT);
    $query->execute();

    $questions = $query->fetchAll(PDO::FETCH_ASSOC);
    return $questions;
}

function get_answers(PDO $pdo, string $ids): array{
    $sql = "SELECT * FROM answer WHERE question_id IN ($ids);";
    $query = $pdo->query($sql);

    $answers = $query->fetchAll(PDO::FETCH_ASSOC);
    return $answers;
}

