<!-- MENU MENU MENU MENU MENU -->
<?php $this->load->view('Global/header'); ?>
  <?php $this->load->view('Global/menu'); ?>
  <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
       <section class="content">
       	<div class="row">-
       		<div class="clear">
       			<h1>Altas Autos</h1>
                   <form action="<?php echo base_url();?>index.php/cAutos/altaAutos" method="POST">
                        <table>
                            <tr>    
                                <td>
                                    <label for="">Marca:</label>
                                    <select name="" id="slctMarca">
                                        <option value="">Selecciona una marca</option>
                                        <?php
                                            //Aqui se muestran todas las marcas disponibles en la base de datos 
                                            foreach($marcas->result() as $marca){
                                                echo "<option value=".$marca->idMarca.">".$marca->nombreMarca."</option>";
                                            }
						                ?>
                                        
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">Modelo:</label>
                                    <select name="" id="slctModelo">
                                            <option value="">Selecciona un modelo</option>
                                            <?php
                                                //Aqui se muestran todos los modelos dependiendo de la marca seleccionada anteriormente
                                                foreach($modelos->result() as $modelo){
                                                    echo "<option value=".$modelo->idModelo.">".$modelo->nombreModelo."</option>";
                                                }
                                            ?>
                                    </select>
                                </td>
                                
                            </tr>
                            <tr>
                                <td><label for="">Año:</label></td>
                                <td><input type="text" name="txtYear" id=""></td>
                            </tr>
                            <tr>
                                <td><label for="">Color:</label></td>
                                <td><input type="text" name="txtColor" id=""></td>
                            </tr>
                            <tr>
                                <td><label for="">Precio x Dia:</label></td>
                                <td><input type="text" name="txtPrecioDia" id=""></td>
                            </tr>
                            <tr>
                                <td><label for="">Placas:</label></td>
                                <td><input type="text" name="txtPlacas" id=""></td>
                            </tr>
                            <tr>
                                <td><input type="submit" value="Guardar"></td>
                            </tr>
                        </table>
                   </form>
       		</div>
         </div>
       </section>
  </div>
  <div class="control-sidebar-bg"></div>
</div>

<script>
    $(document).ready(function(){
       // $("#slctModelo").prop('disabled', true);
        $("#slctMarca").change(function(){
                console.log($('#slctMarca').val());
                $.get('<?php echo base_url('index.php/cAutos/getModelosId/')?>' + $('#slctMarca').val(), function(datos, status){
                        let data = JSON.parse(datos);   
                        data.forEach(element => {
                            console.log(data);
                        }); 
                });
        });
    });    
</script>

<?php $this->load->view('Global/footer')?>

<script src="<?php echo base_url('assets/js/header.js'); ?>"></script>

