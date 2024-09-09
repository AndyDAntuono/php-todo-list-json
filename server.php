<?php
    $todolist = [
        "HTML",
        "CSS",
        "Responsive design",
        "JavaScript",
        "PHP"
    ];

    header('Content-type: application/json');
    echo json_encode($todolist);

?>