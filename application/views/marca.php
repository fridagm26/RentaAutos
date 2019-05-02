<!-- MENU MENU MENU MENU MENU -->
<?php $this->load->view('Global/header'); ?>
  <?php $this->load->view('Global/menu'); ?>
  <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
       <section class="content">
       	<div class="row">
       		<div class="clear">
                <h2>
                    ALTA MARCAS
                </h2>
                <form action="<?php echo base_url();?>index.php/Marca/guardarMarca" method="POST">
                    <table>
                        <tr> 
                            <td>
                                <label> Nombre:</label>
                            </td>
                            <td>
                                <input type="text" name="txtNombreMarca">
                            </td>
                        </tr>
                        <tr>
                           <td> <input type="submit" name="btnEnviarMarca"> </td>
                        </tr>
                    </table>
                </form>
       		</div>
            <div>
                <h3>
                    Marcas registradas
                </h3>
            </div>
            <div class="marcas-container">
                <!-- Aqui iran las marcas -->
            </div>
            
         </div>
       </section>
  </div>
  <div class="control-sidebar-bg"></div>
</div>
<script>
    $(document).ready(function(){
        $.ajax({
            url: 'mostrarMarca',
            success: function(response){
                console.log(response);
                response = JSON.parse(response);
                $.each(response, function(index, value){
                    $(".marcas-container").append(
                        "<div>"+"<span>"+value.nombreMarca+"</span>"+"</div>"
                    );
                });
            }
        });
    });
</script>

<?php $this->load->view('Global/footer')?>

<script src="<?php echo base_url('assets/js/header.js'); ?>"></script>