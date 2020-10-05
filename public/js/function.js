
jQuery(document).ready(function() {

    app1.getAxios('');

});
Vue.use(axios);

var app1 = new Vue({
    el: "#appTable",
    data: {
        beerList: [],
        beerName :"",
        beerDescription : "",
        beerStyle:"",
        beerId:""
    },
    methods :{
        resetField: function(){
            this.beerName = '';
            this.beerDescription = '';
            this.beerStyle = '';
            this.beerId = '';
        },
        selectId: function(beer){
            this.beerName = beer.beer_name;
            this.beerDescription = beer.beer_description;
            this.beerStyle = beer.beer_style;
            this.beerId = beer.beer_id;
        },
        getAxios: function(id){
            axios
            .get('/apiPHP/main.php/list',{ })
            .then(response => {
                if (response.status != "200") alert("ATTENZIONE: Status "+response.status);
                this.beerList = response.data.beer;
                console.log(response.data);

            })
            .catch((error) => {
                throw error.response.data
                })

            },
        postAxios: function(){
            if ( this.beerName == '' || this.beerDescription == '' || this.beerStyle == ''){
                alert("Devi compilare tutti i campi");
                return;
            }

            axios
            .post('/apiPHP/main.php/insert',{
                    beerName:this.beerName,
                    beerDescription:this.beerDescription,
                    beerStyle:this.beerStyle,
                }
            )
            .then(response => {
                if (response.status != "200") alert("ATTENZIONE: Status "+response.status);
                this.resetField();
                this.getAxios();
                if (response.data.beerId >= 1) alert("Record creato correttamente id:" + response.data.beerId);
                else alert("Errore nella creazione del record");
                //console.log(response.data);

            })
            .catch((error) => {
                throw error.response.data
                })

            },
        deleteAxios: function(){
                if ( this.beerId == '' ){
                    alert("Devi selezionare prima una riga");
                    return;
                }

                axios
                .delete('/apiPHP/main.php/delete/'+this.beerId,{})
                .then(response => {
                    if (response.status != "200") alert("ATTENZIONE: Status "+response.status);
                    if (response.data.countBeer == 1) alert("Record eliminato correttamente");
                    else alert("Errore durante la cancellazione del record");

                    console.log(response.data);
                    this.resetField();
                    this.getAxios();
                })
                .catch((error) => {
                        throw error.response.data
                    })

                },
                putAxios: function(){
                    axios
                    .put('/apiPHP/main.php/update/'+this.beerId,{
                        beerName:this.beerName,
                        beerDescription:this.beerDescription,
                        beerStyle:this.beerStyle
                        }
                    )
                    .then(response => {
                        if (response.status != "200") alert("ATTENZIONE: Status "+response.status);
                        if (response.data.countBeer == 1) alert("Record modificato correttamente");
                        else alert("Errore durante la modificato del record");
                        this.getAxios();
                        //console.log(response.data)
                        this.resetField();
                    })
                    .catch((error) => {
                        throw error.response.data
                        })

            },
        }
    });
