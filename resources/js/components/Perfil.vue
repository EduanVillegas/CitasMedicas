<template>
    <transition name="fade">
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Perfil
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img
                                                class="profile-user-img img-fluid img-circle"
                                                v-bind:src="
                                                    '/img/usuarios/default.png'
                                                "
                                                alt="User profile picture"
                                            />
                                        </div>

                                        <h3
                                            class="profile-username text-center"
                                            v-text="nombres"
                                        >
                                            >
                                        </h3>

                                        <p
                                            v-if="perfil == 1"
                                            class="text-muted text-center"
                                        >
                                            Secretaria
                                        </p>
                                        <p
                                            v-else-if="perfil == 2"
                                            class="text-muted text-center"
                                        >
                                            Doctor
                                        </p>
                                        <p
                                            v-else  class="text-muted text-center"
                                        >
                                            Paciente
                                        </p>
                                        <ul
                                            class="list-group list-group-unbordered mb-3"
                                        >
                                            <li class="list-group-item">
                                                <b>Followers</b>
                                                <a class="float-right">1,322</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Following</b>
                                                <a class="float-right">543</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Friends</b>
                                                <a class="float-right"
                                                    >13,287</a
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-header p-2">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <a
                                                    class="nav-link"
                                                    href="#settings"
                                                    data-toggle="tab"
                                                    >Informacion</a
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div
                                                class="tab-pane active"
                                                id="settings"
                                            >
                                                <form class="form-horizontal">
                                                    <div class="form-group row">
                                                        <label
                                                            for="inputName"
                                                            class="col-sm-2 col-form-label"
                                                            >Nombre(s)</label
                                                        >
                                                        <div class="col-sm-10">
                                                            <input
                                                                type="email"
                                                                v-model="
                                                                    nombres
                                                                "
                                                                class="form-control"
                                                                id="nombre"
                                                                placeholder="Ingresa nombre"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            for="inputEmail"
                                                            class="col-sm-2 col-form-label"
                                                            >Apellido(s)</label
                                                        >
                                                        <div class="col-sm-10">
                                                            <input
                                                                type="text"
                                                                v-model="
                                                                    apellidos
                                                                "
                                                                class="form-control"
                                                                id="nombre"
                                                                placeholder="ingresa apellido"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            for="inputName2"
                                                            class="col-sm-2 col-form-label"
                                                            >Direccion</label
                                                        >
                                                        <div class="col-sm-10">
                                                            <input
                                                                type="text"
                                                                v-model="
                                                                    direccion
                                                                "
                                                                class="form-control"
                                                                id="inputName2"
                                                                placeholder="Ingresa direccion"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            for="inputExperience"
                                                            class="col-sm-2 col-form-label"
                                                            >Telefono</label
                                                        >
                                                        <div class="col-sm-10">
                                                            <input
                                                                type="text"
                                                                v-model="
                                                                    telefono
                                                                "
                                                                class="form-control"
                                                                id="inputSkills"
                                                                placeholder="Ingresa telefono"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            for="inputSkills"
                                                            class="col-sm-2 col-form-label"
                                                            >email</label
                                                        >
                                                        <div class="col-sm-10">
                                                            <input
                                                                type="email"
                                                                v-model="email"
                                                                class="form-control"
                                                                id="inputSkills"
                                                                placeholder="Ingresa correo"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            for="inputSkills"
                                                            class="col-sm-2 col-form-label"
                                                            >Usuario</label
                                                        >
                                                        <div class="col-sm-10">
                                                            <input
                                                                type="text"
                                                                v-model="
                                                                    usuario
                                                                "
                                                                class="form-control"
                                                                id="inputSkills"
                                                                placeholder="Ingresa usuario"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            for="inputSkills"
                                                            class="col-sm-2 col-form-label"
                                                            >Contraseña</label
                                                        >
                                                        <div class="col-sm-10">
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="inputSkills"
                                                                placeholder="Ingresa contraseña"
                                                            />
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.tab-pane -->
                                        </div>
                                        <!-- /.tab-content -->
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.nav-tabs-custom -->
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.container-fluid -->
            <!-- Button trigger modal -->
        </section>
        <!-- Button trigger modal -->
    </transition>
</template>

<script>
export default {
    props: ["user"],
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
            perfil: ""
        };
    },
    mounted() {
        console.log(this.user);
        this.nombres = this.user.nombre_usuario;
        this.apellidos = this.user.apellido_usuario; //Esta variable, mediante v-model esta relacionada con el input del formulario
        this.direccion = this.user.direccion; //Esta variable, mediante v-model esta relacionada con el input del formulario
        this.telefono = this.user.telefono; //Esta variable, mediante v-model esta relacionada con el input del formulario
        this.sexo = this.user.sexo;
        this.email = this.user.email;
        this.usuario = this.user.usuario;
        this.perfil = this.user.perfil;
    }
};
</script>
