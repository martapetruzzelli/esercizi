<?php
session_start();

require_once "includes/connection.php";
require_once "includes/quiz_model.php";
require_once "includes/quiz_view.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <header class="d-flex justify-content-center py-3 text-bg-dark">
    </header>
    <main>
        <div class="container">
            <h1>Benvenuto studente!</h1>
            <form action="init_questions.php" method="POST">
                <?php
                    $subjects = get_all_subjects($pdo);
                    create_subject_selecter($subjects);
                ?>
                <button class="btn btn-primary"></button>
            </form>
        </div>

    </main>
</body>
</html>