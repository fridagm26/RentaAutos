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

    .table-container{
        max-width: 530px;
        padding: 15px;
        margin: 0 auto;
    }

    #marcas-mostrar th{
        cursor: pointer;
        text-align: center;
    }

    #marcas-mostrar, #tr-marcas th{
        text-align: center;
    }

    #tr-marcas th{
        font-size: 16px;
    }

    #marcas-mostrar th:hover{
        background-color: #428BCA;
        color: white;
    }

  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="modal fade" id="confirmacionModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Desea eliminar la marca?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" id="btnEliminar" onclick="eliminarMarca()">Si</button>
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
                            <label for="" class="col-sm-3 control-label">Marca</label>
                            <div class="col-sm-9">
                                <input type="text" id="nMarca" placeholder="Nombre de la marca" class="form-control" name="txtNombreMarca" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3">
                                <button type="submit" class="btn btn-primary btn-block" id="enviarMarca">Guardar</button>
                            </div>
                        </div>
                    </form> <!-- /form -->  
                </div> <!-- ./container -->
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr id="tr-marcas">
                                <th scope="col">Marcas Registradas</th>
                            </tr>
                        </thead>
                        <tbody id="marcas-mostrar">
                            <!-- <tr>
                                <th scope="row">Nissan</th>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
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

    var idMarcaEliminar = 0;

    function confirmarEliminacionMarca(idMarca){
    idMarcaEliminar = idMarca;
    $("#confirmacionModal").modal('show');
    }

    function eliminarMarca(){
    $("#confirmacionModal").modal('hide');
    $.ajax({
        url: 'Marca/eliminarMarca', 
        type: "post",
        data: {
            idMarca: idMarcaEliminar
        },
        success: function( response ) {
            if( response == 1 ) $("tr[data-marca='"+idMarcaEliminar+"']").remove();
            else alert("Hubo un error, no se pudo eliminar");
        }
    });
    }

    $(document).ready(function(){

        $('#enviarMarca').prop('disabled',true);

        $('#nMarca').change(function(){
             $('#enviarMarca').prop('disabled',false);
        });


        $.ajax({
            url: 'Marca/mostrarMarca',
            success: function(response){
                console.log(response);
                response = JSON.parse(response);
                $.each(response, function(index, value){
                    $("#marcas-mostrar").append(
                        "<tr data-marca='"+value.idMarca+"'>"+
                           "<th onclick='confirmarEliminacionMarca("+value.idMarca+")' >"+ value.nombreMarca+"</td>"+
                        "</tr>"
                        /* "<option onclick='confirmarEliminacionMarca("+value.idMarca+")' value="+value.idMarca+">"+value.nombreMarca+"</option>" */
                    );
                });
            }
        });
    });
</script>

<?php $this->load->view('Global/footer')?>

<script src="<?php echo base_url('assets/js/header.js'); ?>"></script>