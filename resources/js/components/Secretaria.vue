<template>
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-align-justify"></i> Secretaria
          <button
            type="button"
            class="btn btn-success"
            data-toggle="modal"
            data-target="#modelId"
          >
            <i class="fa fa-plus"></i>&nbsp;Nuevo
          </button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="secretariaTable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in secretarias.data" :key="item.id_usuario">
                <!--Recorremos el array y cargamos nuestra tabla-->
                <td v-text="item.nombre_usuario">1</td>
                <td v-text="item.nombre_usuario">1</td>
                <td v-text="item.nombre_usuario">1</td>
                <td v-text="item.nombre_usuario">1</td>
                <td v-text="item.nombre_usuario">1</td>
                <td v-text="item.nombre_usuario">1</td>
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
    <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
      Launch
    </button>-->
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
            <h5 class="modal-title">Agregar Secretaria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="#" method="get">
              <div class="form-group">
                <label for>Nombres</label>
                <input
                  type="text"
                  v-model="nombres"
                  name="nombres"
                  id="nombres"
                  class="form-control"
                  placeholder="nombres de la secretaria"
                  aria-describedby="helpId"
                />
              </div>
              <div class="form-group">
                <label for>Apellidos</label>
                <input
                  type="text"
                  v-model="apellidos"
                  name="apellidos"
                  id="apellidos"
                  class="form-control"
                  placeholder="apellidos de la secretaria"
                  aria-describedby="helpId"
                />
              </div>
              <div class="form-group">
                <label for>direccion</label>
                <input
                  type="text"
                  v-model="direccion"
                  name="direccion"
                  id="direccion"
                  class="form-control"
                  placeholder="direccion de la secretaria"
                  aria-describedby="helpId"
                />
              </div>
              <div class="form-group">
                <label for>telefono</label>
                <input
                  type="text"
                  v-model="telefono"
                  name="telefono"
                  id="telefono"
                  class="form-control"
                  placeholder="telefono de la secretaria"
                  aria-describedby="helpId"
                />
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" @click="guardar()" data-dismiss="modal">Guardar</button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import dt from "datatables.net-dt";
import dtcss from "datatables.net-dt/css/jquery.dataTables.min.css";
import $ from 'jquery';
export default {
  data() {
    return {
      nombres: "", //Esta variable, mediante v-model esta relacionada con el input del formulario
      apellidos: "", //Esta variable, mediante v-model esta relacionada con el input del formulario
      direccion: "", //Esta variable, mediante v-model esta relacionada con el input del formulario
      telefono: "", //Esta variable, mediante v-model esta relacionada con el input del formulario
      update: 0 /*Esta variable contrarolará cuando es una nueva tarea o una modificación, si es 0 significará que no hemos seleccionado*/,
      secretarias: []
    };
  },
  mounted() {
    this.getSecretarias();
    //this.getDataTableUsers();
  },
  methods: {
    getSecretarias() {
      let me = this;
      let url = "/secretaria/index"; //Ruta que hemos creado para que nos devuelva todas las tareas
      axios
        .get(url)
        .then(function(response) {
          //creamos un array y guardamos el contenido que nos devuelve el response
          me.secretarias = response.data;
          me.initDtt();
        })
        .catch(function(error) {
          // handle error
          console.log(error);
        });
    },
    initDtt() {
      $(document).ready(() => {
        $("#secretariaTable").DataTable({
           language: {
          url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        }
        });
      });
    },
    getDataTableUsers: function() {
      $("#secretariaTable").DataTable();
      // $("#secretariaTable").DataTable({
      //   // processing: true,
      //   // serverSide: true,
      //   language: {
      //     url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
      //   }
      //   // ajax: {
      //   //   url: "/secretaria/index",
      //   //   dataSrc: "data",
      //   //   type: "GET"
      //   // },
      //   // columns: [
      //   //   { data: "id_usuario" },
      //   //   { data: "nombre_usuario" },
      //   //   { data: "apellido_usuario" },
      //   //   { data: "direccion" },
      //   //   { data: "telefono" },
      //   //   {
      //   //     render: function(data, wea, row) {
      //   //       return (
      //   //         '<a class="btn btn-warning" href="#"><i class="fa fa-edit" aria-hidden="true" title="Actualizar Secretaria"></i></a></li>' +
      //   //         ' <a class="btn btn-danger" href="#" ><i class="fa fa-remove " aria-hidden="true" title="Eliminar Secretaria"></i></a></li>'
      //   //       );
      //   //     }
      //   //   }
      //   // ]
      // });
    },
    cargarDatos() {
      //Esta función rellena los campos y la variable update, con la tarea que queremos modificar
      //this.update = 2;
      alert("hola");
      // let me = this;
      // let url = "/secretaria/show/id=" + this.update;
      // axios
      //   .get(url)
      //   .then(function(response) {
      //     (me.nombres =response.data.nombres),
      //       (me.apellidos =response.data.apellidos),
      //       (me.direccion =response.data.direccion),
      //       (me.telefono =response.data.telefono),
      //   })
      //   .catch(function(error) {
      //     // handle error
      //     console.log(error);
      //   });
    },
    guardar: function() {
      let me = this;
      let url = "/secretaria/store"; //Ruta que hemos creado para enviar una tarea y guardarla
      axios
        .post(url, {
          //estas variables son las que enviaremos para que crear la tarea
          nombre_usuario: this.nombres,
          apellido_usuario: this.apellidos,
          direccion: this.direccion,
          telefono: this.telefono
        })
        .then(function(response) {
          //          me.getTasks(); //llamamos al metodo getTask(); para que refresque nuestro array y muestro los nuevos datos
          //        me.clearFields(); //Limpiamos los campos e inicializamos la variable update a 0
          $("#secretariaTable")
            .dataTable()
            .fnDestroy();
          me.getSecretarias();
          me.limpiarInput();
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    limpiarInput: function() {
      /*Limpia los campos e inicializa la variable update a 0*/
      (this.nombres = ""), //Esta variable, mediante v-model esta relacionada con el input del formulario
        (this.apellidos = ""), //Esta variable, mediante v-model esta relacionada con el input del formulario
        (this.direccion = ""), //Esta variable, mediante v-model esta relacionada con el input del formulario
        (this.telefono = ""), //Esta variable, mediante v-model esta relacionada con el input del formulario
        (this.update = 0); /*Esta variable contrarolará cuando es una nueva tarea o una modificación, si es 0 significará que no hemos seleccionado*/
    }
  }
};
</script>

