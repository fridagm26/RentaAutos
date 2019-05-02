<?php $this->load->view('Global/header'); ?>
  <?php $this->load->view('Global/menu'); ?>
  <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
       <section class="content">
       	<div class="row">
       		<div class="clear">
                <body>
                    <form action="http://localhost/RentaAutos/index.php/Inicio/guardar" method="POST">
                        <h3>Formulario de Renta</h3>
                        <label>Disponibilidad:<br></label>
                        <input type="int" name="disp" placeholder=""><br/> 
                        <label>Fecha de inicio:<br></label>
                        <input type="date" name="txtFI" min="2019-04-30"><br/>
                        <label>Fecha de fin:<br></label>
                        <input type="date" name="txtFF"><br/>
                        <label>Licencia Vigente:<br></label>
                        <input type="checkbox" name="txtsi" value="Si">Si
                        <input type="checkbox" name="txtno" value="No">No<br/>
                        <label>Edad:<br></label>
                        <input type="int" name="edad" placeholder=""><br/>
                        <br><br/> 
                        <input type="submit" value="Insertar">
                    </form>
                </body> 
       			<br>
       			<br>
       			<br>
       			<br>
       			<br>
       			<br>
       			<br>
       			<br>
       		</div>
            
            
         </div>
       </section>
  </div>
  <div class="control-sidebar-bg"></div>
</div>
<?php $this->load->view('Global/footer')?>

<script src="<?php echo base_url('assets/js/header.js'); ?>"></script>