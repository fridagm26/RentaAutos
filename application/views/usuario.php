<?php $this->load->view('Global/header'); ?>
  <?php $this->load->view('Global/menu'); ?>
  <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


  <style>

*[role="form"] {
    max-width: 700px;
    padding: 15px;
    margin: 0 auto;
    border-radius: 0.3em;
}

*[role="form"] h2 {
    margin-left: 10em;
    margin-bottom: 1em;
}
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
       <section class="content">
       	<div class="row">
       		<div class="clear">
                    <form class="form-horizontal" role="form">
                        <h2>Usuario</h2>
                        <?php
                              /* $date1 = new DateTime("2019-05-25");
                              $date2 = new DateTime("2019-05-10"); */
                              /* $diff = $_POST['txtFF']->diff($_POST['txtFI']);
                              echo $diff->days . ' days '; */
                              /* $interval = date_diff($_POST['txtFF'], $_POST['txtFI']);
                              print_r( $interval ); */
                              /* $today = new DateTime();
                              $date = DateTime::createFromFormat('Y-m-d', $rowSelectMyAgend['']);
                              $diff = $today->diff($date);
                              print_r($diff->format('%a días')); */
                            ?>
                        <div class="form-group">
                          <label for="txtnomb" class="col-sm-3 control-label">Nombre(s):</label>
                          <div class="col-sm-9">
                            <input type="double" id="txtnomb" class="form-control" autofocus>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="txtap" class="col-sm-3 control-label">Apellido:</label>
                          <div class="col-sm-9">
                            <input type="double" id="txtap" class="form-control" autofocus>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="txtedad" class="col-sm-3 control-label">Edad:</label>
                          <div class="col-sm-9">
                            <input type="double" id="txtedad" class="form-control" autofocus>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-3">Licencia vigente:</label>
                          <div class="col-sm-9">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="txtsi" value="Si">Si
                              </label>
                            </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="txtno" value="No">No
                            </label>
                        </div>
                  </div>
                </div> <!-- /.form-group -->
                <div class="form-group">
                          <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                          </div>
                        </div>
                    </form>
       		</div>
            
            
         </div>
       </section>
  </div>
  <div class="control-sidebar-bg"></div>
</div>
<?php $this->load->view('Global/footer')?>

<script src="<?php echo base_url('assets/js/header.js'); ?>"></script>