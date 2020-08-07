<template>
    <transition name="fade">
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Paciente
                        <button
                            type="button"
                            class="btn btn-success"
                            @click="toggleModal()"
                        >
                            <i class="fa fa-plus"></i>&nbsp;Nuevo
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                id="tablaPaciente"
                                class="table table-bordered table-striped"
                            >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Direccion</th>
                                        <th>Telefono</th>
                                        <th>Sexo</th>
                                        <th>Email</th>
                                        <th>Usuario</th>
                                        <th>Foto</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(item, index) in datos"
                                        :key="item.id"
                                    >
                                        <!--Recorremos el array y cargamos nuestra tabla-->
                                        <td v-text="index + 1"></td>
                                        <td v-text="item.nombre_usuario"></td>
                                        <td v-text="item.apellido_usuario"></td>
                                        <td v-text="item.direccion"></td>
                                        <td v-text="item.telefono"></td>
                                        <td v-text="item.sexo"></td>
                                        <td v-text="item.email"></td>
                                        <td v-text="item.usuario"></td>
                                        <td>
                                            <img
                                                v-bind:src="
                                                    '/img/usuarios/' + item.foto
                                                "
                                                width="50"
                                                height="50"
                                                class="img-responsive"
                                            />
                                        </td>
                                        <td>
                                            <button
                                                @click="editar(item.id)"
                                                class="btn btn-warning"
                                                data-toggle="modal"
                                                data-target="#modelId"
                                            >
                                                <span class="fa fa-edit"></span>
                                            </button>
                                            <button
                                                @click="eliminar(item)"
                                                class="btn btn-danger"
                                            >
                                                <span
                                                    class="fa fa-remove"
                                                ></span>
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
                            <h5 v-if="update == 0" class="modal-title">
                                Agregar Doctor
                            </h5>
                            <h5 v-else class="modal-title">
                                Actualizar Doctor
                            </h5>
                            <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                            >
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
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
                                    maxlength="10"
                                />
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for>Sexo</label>
                                    <div class="col-md-3">
                                        <span>Hombre</span>
                                        <input
                                            type="radio"
                                            v-model="sexo"
                                            name="sexo"
                                            id="sexo"
                                            value="Hombre"
                                        />
                                    </div>
                                    <div class="col-md-3">
                                        <span>Mujer</span>
                                        <input
                                            type="radio"
                                            v-model="sexo"
                                            name="sexo"
                                            id="sexo"
                                            value="Mujer"
                                        />
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
                                    v-model="password"
                                    class="form-control"
                                    name="password"
                                    id="password"
                                    placeholder="Intrododuce una contraseña"
                                />
                            </div>
                            <div class="form-group">
                                <label>Foto de Perfil</label>
                                <input
                                    type="file"
                                    class="form-control-file"
                                    name="image"
                                    id="image"
                                    accept="image/*"
                                    @change="getImagen"
                                />
                                <img
                                    :src="avatar"
                                    class="img-circle"
                                    width="150"
                                />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- Botón que limpia el formulario y inicializa la variable a 0, solo se muestra si la variable update es diferente a 0-->
                            <button
                                v-if="update != 0"
                                @click="limpiarInput()"
                                type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal"
                            >
                                Cerrar
                            </button>
                            <!-- Botón que añade los datos del formulario, solo se muestra si la variable update es igual a 0-->
                            <button
                                v-if="update == 0"
                                @click="guardar()"
                                data-dismiss="modal"
                                class="btn btn-success"
                            >
                                Añadir
                            </button>
                            <!-- Botón que modifica la tarea que anteriormente hemos seleccionado, solo se muestra si la variable update es diferente a 0-->
                            <button
                                v-if="update != 0"
                                @click="actualizar()"
                                data-dismiss="modal"
                                class="btn btn-warning"
                            >
                                Actualizar
                            </button>
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
            password: "",
            imagen: "",
            avatar: "",
            loaded: false,
            update: 0 /*Esta variable contrarolará cuando es una nueva tarea o una modificación, si es 0 significará que no hemos seleccionado*/,
            datos: []
        };
    },
    mounted() {
        this.listar();
    },
    methods: {
        initDtt() {
            $(document).ready(() => {
                $("#tablaPaciente").DataTable({
                    responsive: true,
                    language: {
                        url:
                            "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                    }
                });
            });
        },
        listar() {
            let me = this;
            let url = "/paciente/index"; //Ruta que hemos creado para que nos devuelva todas las tareas
            axios
                .get(url)
                .then(function(response) {
                    //creamos un array y guardamos el contenido que nos devuelve el response
                    me.datos = response.data;
                    me.initDtt();
                    // me.$swal("Hello Vue world!!!");
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                });
        },
        guardar() {
            let me = this;
            let url = "/paciente/store"; //Ruta que hemos creado para enviar una tarea y guardarla
            //Creamos el formDataa
            var formdata = new FormData();
            //Añadimos la imagen seleccionada
            formdata.append("nombre_usuario", this.nombres);
            formdata.append("apellido_usuario", this.apellidos);
            formdata.append("direccion", this.direccion);
            formdata.append("telefono", this.telefono);
            formdata.append("sexo", this.sexo);
            formdata.append("email", this.email);
            formdata.append("usuario", this.usuario);
            formdata.append("password", this.password);
            formdata.append("avatar", this.imagen);
            axios
                .post(url, formdata, {
                    headers: { "Content-Type": "multipart/form-data" }
                })
                .then(function(response) {
                    //          me.getTasks(); //llamamos al metodo getTask(); para que refresque nuestro array y muestro los nuevos datos
                    //        me.clearFields(); //Limpiamos los campos e inicializamos la variable update a 0
                    me.reiniciarTabla();
                    me.limpiarInput();
                })
                .catch(function(error) {
                    console.log(error);
                });
        },
        editar(id) {
            this.update = id;
            let me = this;
            let url = "/paciente/edit/" + this.update;
            axios
                .get(url)
                .then(function(response) {
                    me.nombres = response.data.nombre_usuario;
                    me.apellidos = response.data.apellido_usuario;
                    me.direccion = response.data.direccion;
                    me.telefono = response.data.telefono;
                    me.sexo = response.data.sexo;
                    me.email = response.data.email;
                    me.usuario = response.data.usuario;
                    me.password = "";
                    //me.imagen =response.data.foto;
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                });
        },
        actualizar() {
            let me = this;
            let url = "/paciente/update/" + this.update; //Ruta que hemos creado para enviar una tarea y guardarla
             var formdata = new FormData();
            //Añadimos la imagen seleccionada
            formdata.append("nombre_usuario", this.nombres);
            formdata.append("apellido_usuario", this.apellidos);
            formdata.append("direccion", this.direccion);
            formdata.append("telefono", this.telefono);
            formdata.append("sexo", this.sexo);
            formdata.append("email", this.email);
            formdata.append("usuario", this.usuario);
            formdata.append("password", this.password);
            formdata.append("avatar", this.imagen);
            axios
                .post(url, formdata, {
                    headers: { "Content-Type": "multipart/form-data" }
                })
                .then(function(response) {
                    me.reiniciarTabla();
                    me.limpiarInput();
                })
                .catch(function(error) {
                    console.log(error);
                });
            // axios
                // .put("/paciente/update/" + this.update, {
                //     //id: this.update,
                //     nombre_usuario: this.nombres,
                //     apellido_usuario: this.apellidos,
                //     direccion: this.direccion,
                //     telefono: this.telefono,
                //     sexo: this.sexo,
                //     email: this.email,
                //     usuario: this.usuario,
                //     password: this.password
                // })
                // .then(function(response) {
                //    me.reiniciarTabla();
                //     me.limpiarInput();
                // })
                // .catch(function(error) {
                //     console.log(error);
                // });
        },
        eliminar(item) {
            //Esta nos abrirá un alert de javascript y si aceptamos borrará la tarea que hemos elegido
            let me = this;
            // let task_id = data.id;
            //me.$swal("Hello Vue world!!!");
            me.$swal
                .fire({
                    title: "¿Seguro que deseas borrar?",
                    text:
                        "Eliminaras a " +
                        item.nombre_usuario +
                        " " +
                        item.apellido_usuario,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Aceptar"
                })
                .then(result => {
                    if (result.value) {
                        axios
                            .delete("/paciente/delete/" + item.id)
                            .then(function(response) {
                                me.$swal.fire(
                                    "Eliminado!",
                                    "Su Registro a sido eliminado",
                                    "success"
                                );
                                me.reiniciarTabla();
                            })
                            .catch(function(error) {
                                console.log(error);
                            });
                    }
                });
        },
        limpiarInput() {
            this.nombres = "";
            this.apellidos = ""; //Esta variable, mediante v-model esta relacionada con el input del formulario
            this.direccion = "";
            this.telefono = "";
            this.sexo = "";
            this.email = ""; //Esta variable, mediante v-model esta relacionada con el input del formulario
            this.usuario = "";
            this.password = "";
            this.imagen = "";
            this.avatar = "";
            this.loaded = false;
            this.update = 0;
        },
        toggleModal() {
            $("#modelId").modal("show");
        },
        getImagen(e) {
            //Asignamos la imagen a  nuestra data
            this.imagen = e.target.files[0];
            let image = e.target.files[0];
            let reader = new FileReader();
            reader.readAsDataURL(image);
            reader.onload = e => {
                this.avatar = e.target.result;
            };
            this.loaded = true;
        },
        reiniciarTabla() {
            $("#tablaPaciente")
                .dataTable()
                .fnDestroy();
            this.listar();
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
