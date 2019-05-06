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

    #muestraModelos{
      margin-top: 20px;
      margin-right: 50px;
    }

  </style>

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
                        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                    </div>
                </div>
            </form> <!-- /form -->

            <!-- Empieza la tabla -->
            <div id="muestraModelos">
              <table class="table" id="muestraModelos">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
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
  $(document).ready( function() {
    $('#nombreModelo').prop('disabled',true);
    $('#disponibilidad').prop('disabled',true);
    $('#totales').prop('disabled',true);
    $('#marca').change(function(){
      $('#nombreModelo').prop('disabled',false);
      $('#disponibilidad').prop('disabled',false);
      $('#totales').prop('disabled',false);
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
  });
</script>

<script src="<?php echo base_url('assets/js/header.js'); ?>"></script>