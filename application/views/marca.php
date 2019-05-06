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

    *[role="form2"] {
        max-width: 500px;
        padding: 20px;
        margin: 0 auto;
        background-color: #fff;
        border-radius: 0.3em;
    }

  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="modal fade" id="exampleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Se van a agregar 2<br>
                Estas seguro?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary">Si</button>
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    No se que poner<br>
                    Jalas o no?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary">Si</button>
                </div>
            </div>
        </div>
    </div>
  <div class="content-wrapper"> <!-- Inicio content-wrapper -->
       <section class="content">
       	<div class="row">
       		<div class="clear">
               <div class="container">
                    <form class="form-horizontal" role="form" action="<?php echo base_url();?>index.php/Marca/guardarMarca" method="POST">
                        <h2>ALTA MARCA DE AUTO</h2>
                        <div class="form-group">
                            <label for="nombreMarca" class="col-sm-3 control-label">Marca</label>
                            <div class="col-sm-9">
                                <input type="text" id="nombreMarca" placeholder="Nombre de la marca" class="form-control" name="txtNombreMarca" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3">
                                <button type="submit" class="btn btn-primary btn-block" name="btnEnviarMarca">Guardar</button>
                            </div>
                        </div>
                    </form> <!-- /form -->
                </div> <!-- ./container -->
                <form role="form2">
                    <div class="form-group">
                        <label for="marcasGuardadas">Marcas guardadas</label>
                        <select multiple class="form-control" id="marcas-guardadas">
                        
                        </select>
                    </div>
                </form>    
            <!-- <div>
                <h3>
                    Marcas registradas
                </h3>
            </div>
            <div class="marcas-container">
                Aqui iran las marcas
            </div> -->

            </div> <!-- /clear -->
        </div> <!-- /row -->
       </section>
  <div class="control-sidebar-bg"></div>
</div> <!-- /Content wrapper -->

<!-- AJAX -->
<script>

    $('#marcas-guardadas').on("click","option",function(){
            $("#exampleModal").modal('show');
    });

    $(document).ready(function(){
        $.ajax({
            url: 'Marca/mostrarMarca',
            success: function(response){
                console.log(response);
                response = JSON.parse(response);
                $.each(response, function(index, value){
                    $("#marcas-guardadas").append(
                        "<option>"+value.nombreMarca+"</option>"
                    );
                });
            }
        });
    });
</script>

<?php $this->load->view('Global/footer')?>

<script src="<?php echo base_url('assets/js/header.js'); ?>"></script>