<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List To Do</title>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body class="bg-primary">
    <div id="App">
        <div class="container  mt-3 p-3">
            <h1 class="text-center">List To Do</h1>
            <div class="m-auto bg-light p-3">
                <div class="border_black w-50 m-auto">
                    <ul class="d-flex flex-column text-center m-0">
                        <template v-for="(dato,i) in dati">
                            <li>
                                <span :class="checkStatus(i)" @click="changeStatus(i)">{{dato.name}}</span>
                                <button @click="deleteItem(i)">X</button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Edit
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="text" v-model="editingText" placeholder="type your change">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" @click="editItem(i)" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </template>
                    </ul>
                </div>
                <div class="input-group mt-2">
                    <input v-model="newTask" class="w-50 m-auto" @keyup.enter="addNewTask" type="text" class="form-control" placeholder="Inserisci la nuova attività">
                    <div class="input-group mt-2 d-flex justify-content-center">
                        <button @click="addNewTask" class="btn btn-primary  wid-50 mx-3">Aggiungi</button>
                        <button @click="deleteAllTasks" class="btn btn-secondary">Elimina tutti</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>