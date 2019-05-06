<!-- MENU MENU MENU MENU MENU -->
<?php $this->load->view('Global/header'); ?>
  <?php $this->load->view('Global/menu'); ?>
  <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>

  <style>

    *[role="form"] {
        max-width: 530px;
        padding: 15px;
        margin: 0 auto;
        background-color: #fff;
        border-radius: 0.3em;
    }

    *[role="form"] h2 {
        margin-left: 5em;
        margin-bottom: 1em;
    }

    #mModelos{
      margin-top: 20px;
      margin-right: 50px;
    }

    #tModelos th{
        cursor: pointer;
        text-align: center;
    }

    #tModelos, #trModelos th{
        text-align: center;
    }

    #trModelos th{
        font-size: 16px;
    }

    #tModelos th:hover{
        background-color: #428BCA;
        color: white;
    }

  </style>

  <div class="modal fade" id="confirmacionModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Modelo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Desea eliminar el modelo??
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" onclick="eliminarModelo()">Si</button>
            </div>
            </div>
        </div>
    </div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
       <section class="content">
       	<div class="row">
       		<div class="clear">
           <div class="container">
            <form class="form-horizontal" role="form" action="<?php echo base_url();?>index.php/Modelo/guardarModelo" method="POST">
                <h2>AÑADIR MODELO</h2>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Marca</label>
                    <div class="col-sm-9">
                        <select id="marca" class="form-control" name="idMarca">
                            <option value="" disabled selected hidden>--Seleccione una opción</option>
                        </select>
                    </div>
                </div> 
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Modelo</label>
                    <div class="col-sm-9">
                        <input type="text" id="nombreModelo" placeholder="Nombre del Modelo" class="form-control" name="txtNombreModelo" autofocus>
                    </div>
                </div> <!-- /.form-group -->
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Disponibles</label>
                    <div class="col-sm-9">
                        <input type="text" id="disponibilidad" placeholder="No. disponibles" class="form-control" name="txtDisponibilidad" autofocus>
                    </div>
                </div> <!-- /.form-group -->
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Numero total</label>
                    <div class="col-sm-9">
                        <input type="text" id="totales" placeholder="No. totales" class="form-control" name="txtTotales" autofocus>
                    </div>
                </div> <!-- /.form-group -->
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary btn-block" id="guardar">Guardar</button>
                    </div>
                </div>
            </form> <!-- /form -->

            <!-- Empieza la tabla -->
            <div id="mModelos">
              <table class="table" id="muestraModelos">
                <thead>
                  <tr id="trModelos">
                    <th scope="col">Modelos</th>
                    <th scope="col">Disponibles</th>
                    <th scope="col">Totales</th>
                  </tr>
                </thead>
                <tbody id="tModelos">
                  <!-- <tr id="tModelos"> -->
                    <!-- <th scope="row" id="tModelos"></th>  -->
                 <!--    <td>Mark</td>
                    <td>Otto</td> -->
                  </tr>
                  <tr>
                   <!--  <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td> -->
                  </tr>
                  <tr>
                    <!-- <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td> -->
                  </tr>
                </tbody>
              </table>
            </div>  
            <!-- termina la tabla -->

        </div> <!-- ./container -->
       		</div> <!-- /clear -->
         </div>  <!-- /row -->
       </section>
  </div>
  <div class="control-sidebar-bg"></div>
</div>
<?php $this->load->view('Global/footer')?>

<script>

var idModeloEliminar = 0;

function confirmarEliminacionModelo(idModelo){
  idModeloEliminar = idModelo;
  $("#confirmacionModal").modal('show');
}

function eliminarModelo(){
  $("#confirmacionModal").modal('hide');
  $.ajax({
    url: 'Modelo/eliminarModelo', 
    type: "post",
    data: {
        idModelo: idModeloEliminar
    },
    success: function( response ) {
        if( response == 1 ) $("tr[data-modelo='"+idModeloEliminar+"']").remove();
        else alert("Hubo un error, no se pudo eliminar");
    }
   });
}


  $(document).ready( function() {

    $('#nombreModelo').prop('disabled',true);
    $('#disponibilidad').prop('disabled',true);
    $('#totales').prop('disabled',true);
    $('#guardar').prop('disabled',true);

    $('#marca').change(function(){
      $('#nombreModelo').prop('disabled',false);
    });

    $('#nombreModelo').change(function(){
      $('#disponibilidad').prop('disabled',false);
    });

    $('#disponibilidad').change(function(){
      $('#totales').prop('disabled',false);
    });

    $('#totales').change(function(){
      $('#guardar').prop('disabled',false);
    });

    $.ajax({
        url: 'Modelo/mostrarMarcas', 
        success: function( response ) {
            console.log(response);
            response = JSON.parse(response);
            $.each(response, function( index, value){
                $("#marca").append("<option value="+value.idMarca+">"+value.nombreMarca+"</option>")
            });
        }
    });

    $.ajax({
        url: 'Modelo/mostrarModelos', 
        success: function( response ) {
            console.log(response);
            response = JSON.parse(response);
            $.each(response, function( index, value){
                $("#tModelos").append(
                  "<tr data-modelo='"+value.idModelo+"'>"+
                      "<th onclick='confirmarEliminacionModelo("+value.idModelo+")'>"+value.nombreModelo+"</th>"+
                      "<td>"+value.disponibilidad+"</td>"+
                      "<td>"+value.totales+"</td>"+
                  "</tr>")
            });
        }
    });

  });
</script>

<script src="<?php echo base_url('assets/js/header.js'); ?>"></script>