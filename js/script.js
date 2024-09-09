//script.js

const { createApp } = Vue;

createApp({
    data() {
        return {
            todoList: [],
            url: 'server.php',
            todo_item: '',
        }
    },
    methods: {
        getTodoList(){
            axios.get(this.url).then((resp) => {
                console.log(resp.data);
                this.todoList = resp.data;
            });
        },
        addTodo(){
            const data = new FormData();
            data.append('addTodo', this.todo_item);  // Cambiato il nome del campo

            axios.post(this.url, data, {headers: {'Content-Type': 'multipart/form-data'}})
                .then((resp) => {
                    console.log('Todo added successfully');
                    this.getTodoList();  // Aggiorna la lista dopo l'aggiunta
                    this.todo_item = '';  // Resetta il campo di input
                })
                .catch((error) => {
                    console.error('Error adding todo:', error);
                });
        }
    },
    mounted(){
        this.getTodoList();
    }
}).mount('#app');