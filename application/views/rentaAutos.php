<?php $this->load->view('Global/header'); ?>
  <?php $this->load->view('Global/menu'); ?>
  <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<style>

*[role="form"] {
    max-width: 530px;
    padding: 15px;
    margin: 0 auto;
    border-radius: 0.3em;
}

*[role="form"] h2 {
    margin-left: 5em;
    margin-bottom: 1em;
}

.mUsuarios{
        max-width: 300px;
        padding: 15px;
        margin: 0 auto;
    }

#tUsuario th{
        cursor: pointer;
        text-align: center;
    }

    #tUsuario, #trUsuario th{
        text-align: center;
    }

    #trUsuario th{
        font-size: 9 px;
    }

    #tUsuario th:hover{
        background-color: #428BCA;
        color: white;
    }
</style>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <section class="content">
       	<div class="row">
       		<div class="clear">
                  <div class="container">
                  <!-- tabla -->
                  <div id="mUsuarios">
                        <table class="table" id="muestrausuarios">
                            <thead>
                            <tr id="trUsuario">
                                <th scope="col">Nombre(s)</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Id</th>
                            </tr>
                            </thead>
                            <tbody id="tUsuario">
                            </tbody>
                        </table>
                    </div>  
                      <!-- tabla -->
                    <form action="http://localhost/RentaAutos/index.php/renta/rentas" method="POST" class="form-horizontal" role="form">
                      <h2>Formulario de renta</h2>

                      <div class="form-group">
                          <label for="total" class="col-sm-3 control-label">id Usuario: </label>
                          <div class="col-sm-9">
                            <input type="text" name="idUsuario" id="idUsuario" class="form-control" autofocus value="">
                          </div>
                        </div>

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
                            <label for="slctAuto" class="col-sm-3 control-label">Auto</label>
                            <div class="col-sm-9">
                                <select id="slctAuto" class="form-control" name="slctAuto">
                                <option value="" disabled selected >Selecciona un auto</option>
                                                
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
                            <label for="" class="col-sm-3 control-label">Precio x Dia</label>
                            <div class="col-sm-9">
                                <input type="text" id="PrecioDia" placeholder="Ingrese el precio por dia" class="form-control" 
                                  autofocus name="txtPrecioDia" value="">
                            </div>
                        </div>                              
                        <div class="form-group">
                          <label for="txtFI" class="col-sm-3 control-label">Fecha de inicio:</label>
                          <div class="col-sm-9">
                            <input type="date" name="txtFI" id="FI" class="form-control">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="txtFF" class="col-sm-3 control-label">Fecha de fin:</label>
                          <div class="col-sm-9">
                            <input type="date" name="txtFF" id="FF" class="form-control">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-9 col-sm-offset-3">
                            <button 
                                    type="button" onclick="calcularTotal()" class="btn btn-success btn-sm">Calcular total
                            </button>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="total" class="col-sm-3 control-label">Total:</label>
                          <div class="col-sm-9">
                            <input type="text" name="txttotal" id="total" class="form-control" autofocus>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                          </div>
                        </div>
                    </form> <!-- /form -->
                  </div> <!-- ./container -->
       	  </div>
        </div>
      </section>
  </div>
  <div class="control-sidebar-bg"></div>
</div>
<script>

  var fecha1 = new Date();
  var fecha2 = new Date();

  $('#FI').change(function(){
    fechaFI = new Date(document.getElementById("FI").value);
    year = fechaFI.getFullYear();
    month = fechaFI.getMonth();
    day = fechaFI.getDate()+1;
    console.log(year);
    console.log(month);
    console.log(day);
    fecha1.setFullYear(year, month, day);
    console.log(fecha1);
  });

  $('#FF').change(function(){
    fechaFF = new Date(document.getElementById("FF").value);
    year = fechaFF.getFullYear();
    month = fechaFF.getMonth();
    day = fechaFF.getDate()+1;
    console.log(year);
    console.log(month);
    console.log(day);
    fecha2.setFullYear(year, month, day);
    console.log(fecha2);
  });

  function calcularTotal(){
    total = Math.round((fecha2-fecha1)/(1000*60*60*24));
    console.log(total);
    precioDia = document.getElementById("PrecioDia").value;
    console.log(precioDia);
    costoTotal = precioDia * total;
    console.log(costoTotal);
    document.getElementById("total").value = costoTotal;
  }


    $(document).ready(function(){
        $("#PrecioDia").prop('disabled', true);
        $("#Year").prop('disabled', true);
        $("#Color").prop('disabled', true);
        $("#slctMarca").change(function(){
                console.log($('#slctMarca').val());
                $.get('<?php echo base_url('index.php/renta/getModelosId/')?>' + $('#slctMarca').val(), function(datos, status){
                        let data = JSON.parse(datos);   
                        $.each(data, function(index, value){
                            $("#slctModelo").append(
                                "<option value="+value.idModelo+">"+ value.nombreModelo + "</option>"
                            );
                        });

                });
        });
    }); 

    $(document).ready(function(){
        $("#slctModelo").change(function(){
                console.log($('#slctModelo').val());
                $.get('<?php echo base_url('index.php/renta/getMarcasId/')?>' + $('#slctModelo').val(), function(datos, status){
                        let data = JSON.parse(datos);   
                        $.each(data, function(index, value){
                            $("#slctAuto").append(
                                "<option value="+value.idAuto+">"+ value.nombreModelo + " | " + value.color + "</option>"
                            );
                        });

                });
        });
    }); 
    // SAUL AQUI TRABAJA
    $(document).ready(function(){
        $("#slctAuto").change(function(){
                console.log($('#slctAuto').val());
                $.get('<?php echo base_url('index.php/renta/getAutosId/')?>' + $('#slctAuto').val(), function(datos, status){
                        let data = JSON.parse(datos);   
                        $.each(data, function(index, value){
                          document.getElementById("Year").value = value.year;
                          document.getElementById("Color").value = value.color;
                          document.getElementById("PrecioDia").value = value.precioDia;
                        });

                });
        });
    }); 

    //yardiel
    var temp = 0;
    var temp2 = null;
    function idUsuario(idUsuario){
      temp = idUsuario;
      document.getElementById("idUsuario").value = temp;
    }

    $(document).ready(function(){
        $("#slctModelo").change(function(){
                console.log($('#slctModelo').val());
                $.get('<?php echo base_url('index.php/renta/actdisp/')?>' + $('#slctModelo').val(), function(datos, status){
                        let data = JSON.parse(datos);   
                        $.each(data, function(index, value){
                            $("#slctAuto").append(
                                "<option value="+value.idAuto+">"+ value.nombreModelo + " | " + value.color + "</option>"
                            );
                        });

                });
        });
    });

    $(document).ready(function(){
        $.ajax({
            url: 'renta/mostrarUsuarios',
            success: function(response){
                console.log(response);
                response = JSON.parse(response);
                $.each(response, function( index, value){
                    $("#tUsuario").append(
                    "<tr data-usuario='"+value.idUsuario+"'>"+
                    "<th onclick='idUsuario("+value.idUsuario+")'>"+value.nombre+"</th>"+
                        "<td>"+value.apellidos+"</td>"+
                        "<td>"+value.edad+"</td>"+
                        "<td>"+value.idUsuario+"</td>"+
                    "</tr>")
                });
            }
        });
    });

/*     $('#ListaAutos').on("click","option",function(){
        $("#exampleModal").modal('show');
    }); */
</script>
<?php $this->load->view('Global/footer')?>

<script src="<?php echo base_url('assets/js/header.js'); ?>"></script>