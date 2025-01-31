<?php

function create_subject_selecter(array $subjects){
    ?>
    <select name="subject">
        <?php foreach($subjects as $subject){ ?>
            <option value="<?=$subject["id"]?>"><?=$subject["name"]?></option>
        <?php } ?>
    </select>
    <?php
}

function get_question_from_file(string $questionFile, string $answersFile, int $questionIndex){
    if(!file_exists($questionFile) || !file_exists($answersFile)){
        die();
    }

    $questionJson = file_get_contents($questionFile);
    $question = json_decode($questionJson, true);

    $answersJson = file_get_contents($answersFile);
    $answers = json_decode($answersJson, true);

    $filterAnswers = array_filter($answers, function($answer) use ($question, $questionIndex){ 

        return $answer["question_id"] == $question[$questionIndex]["id"];
        
    });

    return [
        "question" => $question[$questionIndex],
        "answers" => $filterAnswers
    ];
}

function create_question(array $question){
    
    
    $html = "<div><h3>{$question["question"]["question_text"]}</h3>
            <select name='answers'>"; 
            foreach($question["answers"] as $answer){
                $html .= "<option value='{$answer["is_correct"]}'>{$answer["answer_text"]}</option>";
            }
            $html .= "</select></div>";
    echo $html;
}

