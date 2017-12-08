        
        </div>
        </div>
        </main>
        <footer class="fixed-bottom" >
          
            © Heladeria Kevin Sánchez Bryan Vásquez
            
        </footer>
            
<?php     $msj = "";
if (isset ( $_GET ["alert"] ))
	$msj = $_GET ["alert"];?>   
<!-- Modal Structure -->
<div class="modal" id="modalMensaje" tabindex="-1" role="dialog" aria-labelledby="modalMensajeLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo $msj;?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>        
      </div>
    </div>
  </div>
</div>
	
<?php if (isset ( $_GET ["alert"] )) { ?>
<script type="text/javascript">
 
 $("#modalMensaje").modal('open');
 </script>

<?php } ?> 

</body>
</html>