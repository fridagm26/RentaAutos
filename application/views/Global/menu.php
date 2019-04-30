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
        <li class="header">MODULOS</li>
          <!--Menu-->
          <?php foreach($modulos as $modulo){ ?>
          <li><a href="<?php echo base_url($modulo->ruta);?>"><i class="fa fa-file"></i> <span><?php echo $modulo->nombre ?> </span></a></li>
          <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
    <!-- <?php echo base_url($modulo->ruta);?> -->
  </aside>