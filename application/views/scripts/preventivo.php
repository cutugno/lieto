
    <script type="text/javascript">
		$(document).ready(function(){
			<?php if (isset($this->session->esito)) : ?>
			  <?php if ($this->session->esito==1) : ?>
			  swal({title:"", text:"<?php echo $this->lang->line('custom_form_04') ?>", timer:2500, showConfirmButton:false, type:"success"})
			  <?php else: ?>
			  swal({title:"", text:"<?php echo $this->session->esito ?>", timer:7000, showConfirmButton:false, type:"warning"})
			  <?php endif ?>
		  <?php endif ?> 
		});
	</script>


