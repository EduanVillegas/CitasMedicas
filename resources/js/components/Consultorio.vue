<template>
  <transition name="fade">
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> Consultorios
            <button type="button" class="btn btn-success" @click="toggleModal()">
              <i class="fa fa-plus"></i>&nbsp;Nuevo
            </button>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="tabla" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Consultorios</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(item,index) in consultorios" :key="item.id">
                  <!--Recorremos el array y cargamos nuestra tabla-->
                  <td v-text="index+1"></td>
                  <td v-text="item.nombre"></td>
                  <td>
                    <button @click="cargarDatos(item.id)" class="btn btn-warning">
                      <span class="fa fa-edit"></span>
                    </button>
                    <button @click="eliminar(item)" class="btn btn-danger">
                      <span class="fa fa-remove"></span>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.container-fluid -->
      <!-- Button trigger modal -->
      <!-- Modal -->
      <div
        class="modal fade"
        id="modelId"
        tabindex="-1"
        role="dialog"
        aria-labelledby="modelTitleId"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" v-if="update == 0">Agregar consultorio</h5>
              <h5 class="modal-title" v-else>Actualizar Consultorio</h5>
              <button type="button" @click="limpiarInput()" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for>Nombre</label>
                <input
                  type="text"
                  v-model="nombre"
                  name="nombre"
                  id="nombre"
                  class="form-control"
                  placeholder="Nombre del Consultorio"
                  aria-describedby="helpId"
                />
                <!-- <small id="helpId" class="text-muted">Help text</small> -->
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                v-if="update != 0"
                @click="limpiarInput() "
                class="btn btn-danger float-right"
                data-dismiss="modal"
              >
                <span class="fa fa-remove"></span> Cerrar
              </button>
              <button
                type="button"
                v-if="update == 0"
                @click="guardarConsultorio()"
                class="btn btn-success"
              >
                <span class="fa fa-save"></span> Guardar
              </button>
              <button type="button" @click="actualizar()" v-if="update != 0" class="btn btn-warning">
                <span class="fa fa-edit"></span> Actualizar
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Button trigger modal -->
  </transition>
</template>

<script>

//import j from 'jquery';
export default {
  data() {
    return {
      nombre: "", //Esta variable, mediante v-model esta relacionada con el input del formulario
      update: 0 /*Esta variable contrarolará cuando es una nueva tarea o una modificación, si es 0 significará que no hemos seleccionado*/,
      consultorios: []
    };
  },
  mounted() {
    this.listar();
    //this.getDataTableUsers();
  },
  methods: {
    listar() {
      let me = this;
      let url = "/consultorio/index"; //Ruta que hemos creado para que nos devuelva todas las tareas
      axios
        .get(url)
        .then(function(response) {
          //creamos un array y guardamos el contenido que nos devuelve el response
          me.consultorios = response.data;
          me.initDtt();
        })
        .catch(function(error) {
          // handle error
          console.log(error);
        });
    },
    initDtt() {
      $(document).ready(() => {
        $("#tabla").DataTable({
          language: {
            url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
          },
          responsive: true
        });
      });
    },
    toggleModal: function() {
      $("#modelId").modal("show");
    },
    guardarConsultorio: function() {
      let me = this;
      let url = "/consultorio/store"; //Ruta que hemos creado para enviar una tarea y guardarla
      axios
        .post(url, {
          //estas variables son las que enviaremos para que crear la tarea
          nombre: this.nombre
        })
        .then(function(response) {
          //          me.getTasks(); //llamamos al metodo getTask(); para que refresque nuestro array y muestro los nuevos datos
          //        me.clearFields(); //Limpiamos los campos e inicializamos la variable update a 0
          $("#tabla")
            .dataTable()
            .fnDestroy();
          me.listar();
          me.limpiarInput();
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    cargarDatos: function(id) {
      //Esta función rellena los campos y la variable update, con la tarea que queremos modificar
      this.toggleModal();
      this.update = id;
      let me = this;
      let url = "/consultorio/edit/" + this.update;
      axios
        .get(url)
        .then(function(response) {
          me.nombre = response.data.nombre;
        })
        .catch(function(error) {
          // handle error
          console.log(error);
        });
    },
    actualizar: function() {
      /*Esta funcion, es igual que la anterior, solo que tambien envia la variable update que contiene el id de la
                tarea que queremos modificar*/
      let me = this;
      axios
        .put("/consultorio/update/" + this.update, {
          //id: this.update,
          nombre: this.nombre,
        })
        .then(function(response) {
          $("#tabla")
            .dataTable()
            .fnDestroy();
          me.listar();
          me.limpiarInput();
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    eliminar: function(item) {
      //Esta nos abrirá un alert de javascript y si aceptamos borrará la tarea que hemos elegido
      let me = this;
      // let task_id = data.id;
      if (confirm("¿Seguro que deseas borrar el consultorio de "+item.nombre+" ?")) {
        axios
          .delete("/consultorio/delete/" +item.id)
          .then(function(response) {
            $("#tabla")
              .dataTable()
              .fnDestroy();
            me.listar();
          })
          .catch(function(error) {
            console.log(error);
          });
      }
    },
    limpiarInput: function() {
      /*Limpia los campos e inicializa la variable update a 0*/
      this.nombre = "";
      this.update = 0;
      $("#modelId").modal("hide");
    }
  }
};
</script>
<style>
/* Enter and leave animations can use different */
/* durations and timing functions.              */
.fade-enter-active {
  transition: all .3s ease;
}
.fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.fade-enter, .fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}
</style>

