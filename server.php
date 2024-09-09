<?php
    // Controlla se il file esiste e carica il contenuto, altrimenti imposta una lista vuota
    if (file_exists('./data/todo-list.json')) {
        $string = file_get_contents('./data/todo-list.json');
        // Decodifica il contenuto JSON come array associativo
        $todolist = json_decode($string, true);
    } else {
        // Se il file non esiste, crea una lista vuota
        $todolist = [];
    }

    // Verifica se è stato inviato un nuovo incarico tramite POST
    if(isset($_POST['addTodo'])){
        $todo_item = $_POST['addTodo']; // Ottiene il valore del nuovo incarico

        // Verifica che l'elemento non sia vuoto o nullo
        if (!empty($todo_item)) {
            // Crea un array associativo con una chiave 'name' per il nuovo incarico
            $newTodo = ["name" => $todo_item];
            // Aggiunge il nuovo incarico alla lista delle cose da fare
            array_push($todolist, $newTodo);
            // Salva la lista aggiornata nel file JSON
            file_put_contents('./data/todo-list.json', json_encode($todolist));
        }
    }
/* commento questa sessione perché anche se ho scritto il codice per cancellare l'incarico, non riesco ad inserire questa "cancellazione" negli altri files
   
    if(isset($_POST['deleteTodo'])){
        $index = $_POST['deleteTodo'];
        
        // Verifica che l'indice sia valido e rimuove l'elemento dall'array
        if (is_numeric($index) && $index >= 0 && $index < count($todolist)) {
            array_splice($todolist, $index, 1);
            file_put_contents('./data/todo-list.json', json_encode($todolist));
        }
    }
*/
    // Imposta il tipo di contenuto della risposta come JSON
    header('Content-type: application/json');
    // Restituisce la lista aggiornata in formato JSON
    echo json_encode($todolist);
?>
