const { createApp } = App;

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
            const data = {
                todoItem: this.todo_iterm
            }

            axios.post(this.url, data, {headers: {'content.type': 'multipart/form.data'}})
        }
    },
    mounted(){
        this.getTodoList();
    }
}).mount('#app');