<template>
    <div class="container container-task">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group"><!-- Formulario para la creación o modificación de nuestras tareas-->
                    
                    <label>Nombre</label>
                    <input v-model="asignatura.nombre" type="text" class="form-control">

                </div>
                <div class="container-buttons">
                <!-- Botón que añade los datos del formulario, solo se muestra si la variable update es igual a 0-->
                    <button v-if="update == 0" @click="save()" class="btn btn-success">Añadir</button>
                </div>
            </div>
        </div>
    </div>   
</template>
<script>
    export default {

        data(){
            return{
                asignatura:{
                    nombre:''
                    },
                update:0,
                asignaturas:[], //Este array contendrá las tareas de nuestra bd
            }
        },
        methods:{
            
            save(){
                const params={nombre:this.asignatura.nombre}
                this.asignatura.nombre = '';
                axios.post('/api/asignatura',params)
                    .then(res=>{
                        if(res.data == null){
                            alert('la asignatura no se ha registrado con exito')
                        }else{
                            alert('la asignatura se ha registrado')
                        }
                        console.log(res.data)
                        this.asignatura.push(res.data)
                });
            }
            
        },

        mounted() {
           
        }
    }
</script>