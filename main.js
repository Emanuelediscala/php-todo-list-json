const { createApp } = Vue;

createApp({
    data() {
        return {
            apiUrl: "api.php",
            dati: [],
            todoList: [],
            newTask: "",
            editingText: "",
        };
    },
    methods: {
        getData(data) {
            axios.get(this.apiUrl).then((response) => {
                console.log("Dati ricevuti: ", response.data);
                this.dati = response.data;
                
            });
        },
        sendData(data) {
            axios.post(this.apiUrl, data, {
                headers: {'Content-Type': 'multipart/form-data'}
            }).then((response) => {
                console.log("Dati ricevuti: ", response.data);
                this.dati = response.data;
                
            })
        },
        deleteItem(i) {
            const data = { deleteIndex: i};
            this.sendData(data);
        },
        editItem(i) {
            const data = {
                editing: this.editingText,
                index : i
            }
            this.sendData(data);

        },
        checkStatus(i) {
        
            if (this.dati[i].done == true) {
                return "overwritten"
            }
            else {
                return ""
            }
        },
        changeStatus(i) {
            const data = {
                change: true,
                index:i
            }
            this.sendData(data)
        },
        addNewTask() {
            const data = { newTask: this.newTask };
            this.sendData(data);
            this.newTask = "";
        },
        deleteAllTasks() {
            const data = { deleteAll: true };
            this.sendData(data);
        },
    },
    mounted() {
        this.getData();
    }
}).mount("#App")
