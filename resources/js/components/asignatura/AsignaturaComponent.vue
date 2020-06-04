<template>
  <div class="card">
    <div>
      <h4 class="text-center mb-2 card-title">GESTIONANDO ASIGNATURA</h4>
    </div>
    <div class="card-body row">

      <form>
        <div class="row">
          <div class="col-6 form-group">
            <input class="form-control" placeholder="nombre" v-model="asignatura.nombre" />
          </div>
        </div>
      </form>

      <div class="row justify-content-center col">
        <div class="col-6 form-group" v-if="true">
          <button class="btn btn-primary btn-block" @click="agregar()">Guardar</button>
        </div>
      </div>
      <br />
      <div class="container">
        <div class="row">
          <div class="card-body col">
            <div clas="container row">
              <div class="table text-center table-reponsive">
                <table class="table text-center">
                  <thead>
                    <tr>
                      <th>Codigo</th>
                      <th>nombre</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(asignatura,index) in asignaturas" :key="asignatura.index">
                      <td>{{asignatura.id}}</td>
                      <td>{{asignatura.nombre}}</td>
                      <td>
                        <button
                          class="btn btn-success btn-sm"
                          data-toggle="modal"
                          data-target="#editarModal"
                          @click = "editarForm(asignatura,index)"
                        >
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button class="btn btn-danger btn-sm" @click="eliminar(asignatura,index)">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div
          class="modal fade"
          id="editarModal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Asignatura</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <input placeholder="nombre" v-model="asignatura.nombre" />
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button
                  type="button"
                  class="btn btn-primary"
                  @click="editar()"
                  data-dismiss="modal"
                >Guardar Cambios</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      asignatura: {
        id:"",
        nombre: ""
      },
      asignaturas: [],
      //registro: true, //me describe el compartamieto del boton si va a guardar o va a editar
      errors: []
    };
  },
  created() {
    axios.get("/api/asignatura").then(res => {
      this.asignaturas = res.data;
    });
  },
  methods: {
    agregar() {
      // alert(this.personas.prinom);
      const params = {
        nombre: this.asignatura.nombre
      };
      this.asignatura.nombre = "";

      axios.post("/api/asignatura", params).then(res => {
        if (res.data == null) {
          alert("La la asignatura no se ha registrado con exito");
        } else {
          alert("La asignatura se ha registrado");
        }
        this.asignaturas.push(res.data);
      });
    },

    eliminar(asignatura, index) {
      const confirmacion = confirm(
        `Confirma Eliminar Asignatura: ${asignatura.nombre}`
      );
      if (confirmacion) {
        axios.delete("/api/asignatura/" + asignatura.id).then(() => {
          this.asignaturas.splice(index, 1);
          alert("La asignatura se ha eliminado con exito");
        });
      }
    },

    editarForm(asignatura, index) {
      this.asignatura = asignatura;
      this.asignatura.index = index;
    },

    editar() {
      const params = {
        nombre: this.asignatura.nombre
      };
      axios
        .put("/api/asignatura/" + this.asignatura.id, params)
        .then(res => {
          if (res.data == null) {
            alert("La asignatura no se ha actualizado");
          } else {
            alert("La asignatura se ha actualizado");
          }
          //alert(this.area.index)
          this.asignaturas[this.asignatura.index] = res.data;
          this.asignatura.nombre = "";

          //this.$refs.editarModal.modal('dispose');
        })
        .catch(error => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;

            //let mensaje='Error con alguno de los campos';

            alert(this.errors.nombre[0]);
          }
        });
    }
  }
};
</script>