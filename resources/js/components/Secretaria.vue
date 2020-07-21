<template>
  <transition name="fade">
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> Secretaria
            <button type="button" class="btn btn-success" @click="toggleModal()">
              <i class="fa fa-plus"></i>&nbsp;Nuevo
            </button>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive">
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
                  <tr v-for="(item,index) in secretarias.data" :key="item.id">
                    <!--Recorremos el array y cargamos nuestra tabla-->
                    <td v-text="index+1"></td>
                    <td v-text="item.nombre_usuario"></td>
                    <td v-text="item.apellido_usuario"></td>
                    <td v-text="item.direccion"></td>
                    <td v-text="item.telefono"></td>
                    <td>
                      <button
                        @click="cargarDatos(item.id)"
                        class="btn btn-warning"
                        data-toggle="modal"
                        data-target="#modelId"
                      >
                        <span class="fa fa-edit"></span>
                      </button>
                      <button @click="deleteSecretaria(item.id)" class="btn btn-danger">
                        <span class="fa fa-remove"></span>
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
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
                  />
                </div>
                <div class="form-group">
                  <div class="row">
                    <label for>Sexo</label>
                    <div class="col-md-3">
                      <span>Hombre</span>
                      <input type="radio" v-model="sexo" name="sexo" id="sexo" value="Hombre" />
                    </div>
                    <div class="col-md-3">
                      <span>Mujer</span>
                      <input type="radio" v-model="sexo" name="sexo" id="sexo" value="Mujer" />
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for>Email</label>
                  <input
                    type="email"
                    v-model="email"
                    class="form-control"
                    name="email"
                    id="email"
                    placeholder="Introduce el Email"
                  />
                </div>
                <div class="form-group">
                  <label for>Usuario</label>
                  <input
                    type="text"
                    v-model="usuario"
                    name="usuario"
                    id="usuario"
                    class="form-control"
                    placeholder="introduce el usuairo"
                  />
                </div>
                <div class="form-group">
                  <label for>Contraseña</label>
                  <input
                    type="password"
                    v-model="contrasena"
                    class="form-control"
                    name="contrasena"
                    id="contrasena"
                    placeholder="Intrododuce una contraseña"
                  />
                </div>
                <div class="form-group">
                  <label for>Foto de Perfil</label>
                  <input
                    type="file"
                    class="form-control-file"
                    name="imagen"
                    id="imagen"
                    accept="image/*"
                    @change="getImagen"
                  />
                  <img :src="avatar" class="img-circle" width="150" />
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <!-- Botón que limpia el formulario y inicializa la variable a 0, solo se muestra si la variable update es diferente a 0-->
              <button
                v-if="update != 0"
                @click="limpiarInput()"
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >Cerrar</button>
              <!-- Botón que añade los datos del formulario, solo se muestra si la variable update es igual a 0-->
              <button
                v-if="update == 0"
                @click="guardar()"
                data-dismiss="modal"
                class="btn btn-success"
              >Añadir</button>
              <!-- Botón que modifica la tarea que anteriormente hemos seleccionado, solo se muestra si la variable update es diferente a 0-->
              <button
                v-if="update != 0"
                @click="updateSecretaria()"
                data-dismiss="modal"
                class="btn btn-warning"
              >Actualizar</button>
            </div>
          </div>
        </div>
      </div>
    </section>
  </transition>
</template>

<script>
export default {
  data() {
    return {
      nombres: "", //Esta variable, mediante v-model esta relacionada con el input del formulario
      apellidos: "", //Esta variable, mediante v-model esta relacionada con el input del formulario
      direccion: "", //Esta variable, mediante v-model esta relacionada con el input del formulario
      telefono: "", //Esta variable, mediante v-model esta relacionada con el input del formulario
      sexo: "",
      email: "",
      usuario: "",
      contrasena: "",
      imagen: "",
      avatar: "",
       loaded: false,
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
          responsive: true,
          language: {
            url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
          }
        });
      });
    },
    getImagen(e) {
      let image = e.target.files[0];
      let reader = new FileReader();
      reader.readAsDataURL(image);
      reader.onload = e => {
        this.avatar = e.target.result;
      };
      this.loaded = true;
    },
    toggleModal: function() {
      $("#modelId").modal("show");
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
    cargarDatos: function(id) {
      //Esta función rellena los campos y la variable update, con la tarea que queremos modificar
      this.update = id;
      let me = this;
      let url = "/secretaria/edit/" + this.update;
      axios
        .get(url)
        .then(function(response) {
          me.nombres = response.data.nombre_usuario;
          me.apellidos = response.data.apellido_usuario;
          me.direccion = response.data.direccion;
          me.telefono = response.data.telefono;
        })
        .catch(function(error) {
          // handle error
          console.log(error);
        });
    },
    updateSecretaria: function() {
      /*Esta funcion, es igual que la anterior, solo que tambien envia la variable update que contiene el id de la
                tarea que queremos modificar*/
      let me = this;
      axios
        .put("/secretaria/update/" + this.update, {
          //id: this.update,
          nombre_usuario: this.nombres,
          apellido_usuario: this.apellidos,
          direccion: this.direccion,
          telefono: this.telefono
        })
        .then(function(response) {
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
    deleteSecretaria: function(id) {
      //Esta nos abrirá un alert de javascript y si aceptamos borrará la tarea que hemos elegido
      let me = this;
      // let task_id = data.id;
      if (confirm("¿Seguro que deseas borrar esta tarea?")) {
        axios
          .delete("/secretaria/delete/" + id)
          .then(function(response) {
            $("#secretariaTable")
              .dataTable()
              .fnDestroy();
            me.getSecretarias();
          })
          .catch(function(error) {
            console.log(error);
          });
      }
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
<style>
.fade-enter-active {
  transition: all 0.3s ease;
}
.fade-leave-active {
  transition: all 0.6s cubic-bezier(1, 0.5, 0.8, 1);
}
.fade-enter, .fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}
</style>