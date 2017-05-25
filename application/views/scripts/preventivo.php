
    <script type="text/javascript">
		$(document).ready(function(){
			<?php if ($this->session->ok==1) : ?>
			swal({title:"", text:"<?php echo $this->lang->line('custom_form_04') ?>", timer:2500, showConfirmButton:false, type:"success"})
			<?php endif ?>
		});
	</script>


