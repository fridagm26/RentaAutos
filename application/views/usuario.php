<?php $this->load->view('Global/header'); ?>
  <?php $this->load->view('Global/menu'); ?>
  <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
       <section class="content">
       	<div class="row">
       		<div class="clear">
                <body>
                    <form>
                        <h3>Formulario de Renta</h3>
                        <label>Nombre(s):<br></label>
                        <input type="text" name="nombre" placeholder=""><br/>
                        <label>Apellidos:<br></label>
                        <input type="text" name="apellido" placeholder=""><br/>
                        <label>Edad:<br></label>
                        <input type="text" name="edad" placeholder=""><br/> 
                        <input type="submit" name="guardar" value="Insertar">

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