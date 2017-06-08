<script type="text/javascript">
	
	$(function () {
		$("#user").focus();
	});
	
	// login
	$("#btn_login").click(function(event) {
		event.preventDefault();
		event.returnValue=0;
		var dati=$("#form_login").serialize();
		var url="<?php echo site_url('admin/login_check') ?>";
		$.post(url, dati, function(resp) {			
			if (resp==1) {
				location.href="<?php echo site_url('admin') ?>";
			}else{
				swal("",resp,"error");
			}
		});
	});
			
</script>
