<template>
    <div>
        <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre...." @keyup="getProvincias" v-model="provincia_select">
        <div class="panel-footer" v-if="provincias.length">
            <ul class="list-group">
                <li class="list-group-item" v-for="result in provincias"  
                    v-on:click="selectProvincia(result)"
                >
                <strong>{{ result.nombre }}</strong>    
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['descripcion_provincia'],
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return{
                provincia_select:this.descripcion_provincia,
                provincias:[],
                result_visible:false
            }
        },
        methods: {
            getProvincias:function(event){
                if (event) {
                //alert(event.target.value)
                    let busqueda=event.target.value
                    let me =this; 
                    var url = 'https://apis.datos.gob.ar/georef/api/provincias?nombre='+busqueda;
                    axios.get(url).then((response)=>{  
                        me.result_visible=true;
                        me.provincias=response.data.provincias
                    });
                }
            },
            selectProvincia: function(result) {
                this.provincia_select=result.nombre
                this.provincias=[];
            }
        }
    }
</script>
