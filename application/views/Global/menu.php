<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-right info">
          <p>Propuesta Aaron</p>
        </div>
        <div class="clear">&nbsp;</div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">CATALOGOS</li>
          <?php 
           foreach($modulos->result() as $modulo){ ?>
          <!--  {
             
            echo "<br>" .$modulo->nombre;
            echo "<br>" .$modulo->ruta;
           } -->
           <li><a href="<?php echo base_url($modulo->ruta);?>"><i class="fa fa-file"></i><?php echo $modulo->nombre?></a></li>
          <?php }?>
          <!--Menu-->
          <li><a href="<?php echo base_url();?>index.php/Inicio/hola"><i class="fa fa-file"></i> <span>Titulo Electronico</span></a></li>
          <li><a href="<?php echo base_url();?>index.php/Inicio/world"><i class="fa fa-file"></i> <span>Titulo Electronico</span></a></li>
          

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>