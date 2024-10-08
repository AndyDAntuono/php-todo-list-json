<!--index.php-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.7/axios.min.js" integrity="sha512-DdX/YwF5e41Ok+AI81HI8f5/5UsoxCVT9GKYZRIzpLxb8Twz4ZwPPX+jQMwMhNQ9b5+zDEefc+dcvQoPWGNZ3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <title>PHP ToDo List JSON</title>
</head>
<body>
    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <ul>
                    <li v-for="(todo, index) in todoList" :key="index">
                        {{ todo && todo.name ? todo.name : 'Elemento non valido' }}
                    </li>
                    </ul>
                </div>
                <div class="col-6">
                    <div class="d-flex">
                        <input type="text" name="todo-item" id="todo-item" placeholder="Aggiungi incarico" class="form-control" v-model="todo_item">
                        <button class="btn btn-primary" @click="addTodo">Aggiungi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="./js/script.js"></script>
</body>
</html>