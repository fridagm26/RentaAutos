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
</style>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <section class="content">
       	<div class="row">
       		<div class="clear">
                  <div class="container">
                    <form action="http://localhost/RentaAutos/index.php/renta/guardar" method="POST" class="form-horizontal" role="form">
                      <h2>Formulario de renta</h2>
                        <div class="form-group">
                            <label for="slctMarca" class="col-sm-3 control-label">Marca</label>
                            <div class="col-sm-9">
                                <select id="slctMarca" class="form-control">
                                <option value="">Selecciona una marca</option>
                                                <?php
                                                    //Aqui se muestran todas las marcas disponibles en la base de datos 
                                                    foreach($marcas->result() as $marca){
                                                        echo "<option value=".$marca->idMarca.">".$marca->nombreMarca."</option>";
                                                    }
                                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="slctModelo" class="col-sm-3 control-label">Modelo</label>
                            <div class="col-sm-9">
                                <select id="slctModelo" class="form-control">
                                <option value="">Selecciona una modelo</option>
                                                <?php
                                                        //Aqui se muestran todos los modelos dependiendo de la marca seleccionada anteriormente
                                                        foreach($modelos->result() as $modelo){
                                                            echo "<option value=".$modelo->idModelo.">".$modelo->nombreModelo."</option>";
                                                        }
                                                    ?>
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
                                <input type="text" id="PrecioDia" placeholder="Ingrese el precio por dia" class="form-control" 
                                  autofocus name="txtPrecioDia" value="">
                            </div>
                        </div>
                        <form action="http://localhost/RentaAutos/index.php/renta" method="POST">                                
                        <div class="form-group">
                          <label for="txtFI" class="col-sm-3 control-label">Fecha de inicio:</label>
                          <div class="col-sm-9">
                            <input type="date" id="FI" class="form-control">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="txtFF" class="col-sm-3 control-label">Fecha de fin:</label>
                          <div class="col-sm-9">
                            <input type="date" id="FF" class="form-control">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-9 col-sm-offset-3">
                            <button  type="button" class="btn btn-success btn-sm" onclick="calcularTotal()"> Calcular total
                            </button>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="total" class="col-sm-3 control-label">Total:</label>
                          <div class="col-sm-9">
                            <input type="text" id="total" class="form-control" autofocus>
                            <span id="interval">0</span>
                          </div>
                        </div>
                        </form>
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

</script>
<?php $this->load->view('Global/footer')?>

<script src="<?php echo base_url('assets/js/header.js'); ?>"></script>