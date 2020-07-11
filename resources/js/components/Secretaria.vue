<template>
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-align-justify"></i> Secretarias
          <button
            type="button"
            class="btn btn-success"
            data-toggle="modal"
            data-target="#registrar_producto"
          >
            <i class="fa fa-plus"></i>&nbsp;Nuevo
          </button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Motor</th>
                <th>Buscador</th>
                <th>Plataforma(s)</th>
                <th>Version</th>
                <th>Soporte Css</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Trident</td>
                <td>
                  Internet
                  Explorer 4.0
                </td>
                <td>Win 95+</td>
                <td>4</td>
                <td>X</td>
                <td>
                  <button
                    type="button"
                    class="btn btn-warning btn-md"
                    data-toggle="modal"
                    data-target="#actualizar_producto"
                  >
                    <i class="fa fa-pencil"></i>
                  </button> &nbsp;
                  <button
                    type="button"
                    class="btn btn-danger btn-md"
                    data-toggle="modal"
                    data-target="#deshabilitar_producto"
                  >
                    <i class="fa fa-trash"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td>Trident</td>
                <td>
                  Internet
                  Explorer 5.0
                </td>
                <td>Win 95+</td>
                <td>5</td>
                <td>C</td>
                <td>
                  <button
                    type="button"
                    class="btn btn-warning btn-md"
                    data-toggle="modal"
                    data-target="#actualizar_producto"
                  >
                    <i class="fa fa-pencil"></i>
                  </button> &nbsp;
                  <button
                    type="button"
                    class="btn btn-danger btn-md"
                    data-toggle="modal"
                    data-target="#deshabilitar_producto"
                  >
                    <i class="fa fa-trash"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td>Trident</td>
                <td>
                  Internet
                  Explorer 5.5
                </td>
                <td>Win 95+</td>
                <td>5.5</td>
                <td>A</td>
                <td>
                  <button
                    type="button"
                    class="btn btn-warning btn-md"
                    data-toggle="modal"
                    data-target="#actualizar_producto"
                  >
                    <i class="fa fa-pencil"></i>
                  </button> &nbsp;
                  <button
                    type="button"
                    class="btn btn-danger btn-md"
                    data-toggle="modal"
                    data-target="#deshabilitar_producto"
                  >
                    <i class="fa fa-trash"></i>
                  </button>
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <th>Rendering engine</th>
                <th>Browser</th>
                <th>Platform(s)</th>
                <th>Engine version</th>
                <th>CSS grade</th>
                <th>Opciones</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.container-fluid -->
  </section>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  }
};
</script>

