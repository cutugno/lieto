<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    
    <!-- custom scripts -->
    <script type="text/javascript">
		
		$(function(){
			<?php if (isset($this->session->save)) : ?>
			swal({title:"", text:"<?php echo $this->session->save ?>", timer:1500, showConfirmButton:false, type: "<?php echo $this->session->save_status ?>"});
			<?php endif ?>
			
			<?php if (isset($this->session->delete)) : ?>
			swal({title:"", text:"<?php echo $this->session->delete ?>", timer:1500, showConfirmButton:false, type: "<?php echo $this->session->delete_status ?>"});
			<?php endif ?>
		});
    </script>

