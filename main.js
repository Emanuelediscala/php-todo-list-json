const { createApp } = Vue;

createApp({
    data() {
        return {
            apiUrl: "api.php",
            dati:[]
        };
    },
    methods: {

    },
    mounted() {
        console.log("HELLO WORLD");
        axios.get(this.apiUrl).then((response) => {
            console.log("Dati ricevuti: ", response.data);
            this.dati = response.data;
            console.log(this.dati);
            
        });
    }
}).mount("#App")
