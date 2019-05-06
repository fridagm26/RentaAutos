<!-- MENU MENU MENU MENU MENU -->
<?php $this->load->view('Global/header'); ?>
    <?php $this->load->view('Global/menu'); ?>
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <!-- Content Wrapper. Contains page content -->
  <style>
    *[role="form"] , #ListaAutos{
        max-width: 530px;
        padding: 15px;
        margin: 0 auto;
        border-radius: 0.3em;
    }

    *[role="form"] h2 {
        margin-left: 7em;
        margin-bottom: 1em;
    }

  </style>

<div class="modal fade" id="exampleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ELIMINAR UN AUTO</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Desea eliminar el auto?<br>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
            <button type="button" class="btn btn-primary">SI</button>
        </div>
        </div>
    </div>
</div>

  <div class="content-wrapper">
       <section class="content">
       	<div class="row">
       		<div class="clear">
                <div class="container">
                    <form class="form-horizontal" role="form" action="<?php echo base_url();?>index.php/cAutos/altaAutos" method="POST">
                        <h2 id="titulo">Alta autos</h2>
                        <div class="form-group">
                            <label for="slctMarca" class="col-sm-3 control-label">Marca</label>
                            <div class="col-sm-9">
                                <select id="slctMarca" class="form-control" name="slctMarca">
                                <option value="" disabled selected>Selecciona una marca</option>
                                                <?php
                                                    //Aqui se muestran todas las marcas disponibles en la base de datos 
                                                    foreach($marcas->result() as $marca){
                                                        echo "<option value=".$marca->idMarca.">".$marca->nombreMarca."</option>";
                                                    }
                                                ?>
                                </select>
                            </div>
                        </div> <!-- /.form-group -->

                        <div class="form-group">
                            <label for="slctModelo" class="col-sm-3 control-label">Modelo</label>
                            <div class="col-sm-9">
                                <select id="slctModelo" class="form-control" name="slctModelo">
                                <option value="" disabled selected >Selecciona una modelo</option>
                                                
                                </select>
                            </div>
                        </div> <!-- /.form-group -->

                        <div class="form-group">
                            <label for="Year" class="col-sm-3 control-label">Año</label>
                            <div class="col-sm-9">
                                <input type="text" id="Year" placeholder="Ingrese el año" class="form-control" autofocus name="txtYear">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Color" class="col-sm-3 control-label">Color</label>
                            <div class="col-sm-9">
                                <input type="text" id="Color" placeholder="Ingrese un color" class="form-control" autofocus name="txtColor">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="PrecioDia" class="col-sm-3 control-label">Precio x Dia</label>
                            <div class="col-sm-9">
                                <input type="text" id="PrecioDia" placeholder="Ingrese el precio por dia" class="form-control" autofocus name="txtPrecioDia">
                            </div>
                        </div>                              
                        <div class="form-group">
                            <label for="Placas" class="col-sm-3 control-label">Placas</label>
                            <div class="col-sm-9">
                                <input type="text" id="Placas" placeholder="Ingrese las placas" class="form-control" autofocus name="txtPlacas">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3">
                                <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                            </div>
                        </div>
                        
                    </form> <!-- /form -->
                    <div class="form-group">
                    
                        <label for="exampleFormControlSelect1">Autos Disponibles</label>
                        
                        <select  multiple class="form-control" id="ListaAutos">


                        </select>
                    </div>
                </div> <!-- ./container -->
       		</div>
         </div>
       </section>
  </div>
  <div class="control-sidebar-bg"></div>
</div>

<script>
    $(document).ready(function(){
        $("#slctModelo").prop('disabled', true);
        $('#slctMarca').change(function(){
            $("#slctModelo").prop('disabled', false);
        });

        $("#slctMarca").change(function(){
                console.log($('#slctMarca').val());
                $.get('<?php echo base_url('index.php/cAutos/getModelosId/')?>' + $('#slctMarca').val(), function(datos, status){
                        let data = JSON.parse(datos);   
                        /* data.forEach(element => {
                            console.log(data);
                            $(".marcas-container").append(
                                "<div>"+"<span>"+status.nombreModelo+"</span>"+"</div>"
                            );  
                        });  */
                        $.each(data, function(index, value){
                            $("#slctModelo").append(
                                "<option value="+value.idModelo+">"+ value.nombreModelo + "</option>"
                            );
                        });

                });
        });
    });    

    $(document).ready(function(){
        $.ajax({
            url: 'cAutos/mostrarAutos',
            success: function(response){
                console.log(response);
                response = JSON.parse(response);
                $.each(response, function(index, value){
                    $("#ListaAutos").append(
                        "<option>"+  value.nombreMarca+ " | " + value.nombreModelo + " | " + value.color + " | " + value.year + "</option>"
                    );
                });
            }
        });
    });

    $('#ListaAutos').on("click","option",function(){
        $("#exampleModal").modal('show');
    });

</script>





<?php $this->load->view('Global/footer')?>

<script src="<?php echo base_url('assets/js/header.js'); ?>"></script>

