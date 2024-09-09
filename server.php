<?php
    // Controlla se il file esiste e carica il contenuto, altrimenti imposta una lista vuota
    if (file_exists('./data/todo-list.json')) {
        $string = file_get_contents('./data/todo-list.json');
        $todolist = json_decode($string, true); // Decodifica come array
    } else {
        $todolist = [];
    }

    if(isset($_POST['addTodo'])){
        $todo_item = $_POST['addTodo']; // Uso corretto di $_POST

        // Crea un array associativo per il nuovo todo
        $newTodo = ["name" => $todo_item];
        array_push($todolist, $newTodo);

        file_put_contents('./data/todo-list.json', json_encode($todolist));
    }

    if(isset($_POST['deleteTodo'])){
        $index = $_POST['deleteTodo'];
        
        // Rimuove l'elemento dall'array
        array_splice($todolist, $index, 1);
        file_put_contents('./data/todo-list.json', json_encode($todolist));
    }

    header('Content-type: application/json');
    echo json_encode($todolist);
?>
