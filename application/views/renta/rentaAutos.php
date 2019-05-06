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
                          <label for="disp" class="col-sm-3 control-label">Disponibilidad:</label>
                          <div class="col-sm-9">
                            <input type="text" id="disp" class="form-control" autofocus>
                            <span class="help-block">Last Name, First Name, eg.: Smith, Harry</span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="txtFI" class="col-sm-3 control-label">Fecha de inicio:</label>
                          <div class="col-sm-9">
                            <input type="date" id="txtFI" class="form-control">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="txtFF" class="col-sm-3 control-label">Fecha de fin:</label>
                          <div class="col-sm-9">
                            <input type="date" id="txtFF" class="form-control">
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
                </form> <!-- /form -->
              </div> <!-- ./container -->
       		</div>
         </div>
       </section>
  </div>
  <div class="control-sidebar-bg"></div>
</div>
<?php $this->load->view('Global/footer')?>

<script src="<?php echo base_url('assets/js/header.js'); ?>"></script>