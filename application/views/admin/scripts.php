<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

	<!-- jQuery -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
    <!-- Bootstrap -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <!-- Dropzone -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dropzone.js"></script>
    
    <script type="text/javascript">
		
		var id="<?php echo isset($id) ? $id : 0 ?>"; // se sto modificando 
		
		var dzGallery = new Dropzone("#newgallery", { 
			url: "<?php echo site_url('admin/upload'); ?>",
			autoProcessQueue: false,
			uploadMultiple: true,
			maxFiles: 10,
			maxFilesize: 1, // MB
			acceptedFiles: ".jpg",
			dictFileTooBig: "Dimensioni file: {{filesize}}MB. Dimensioni massime: {{maxFilesize}}MB",
			dictInvalidFileType: "Solo immagini in formato .jpg",
			dictMaxFilesExceeded: "Max 10 file contemporanei",
			previewsContainer: "#picture-preview-gallery",
			previewTemplate: document.getElementById('preview-template-gallery').innerHTML
		});
		
		/* gellery processQueue */
		dzGallery.on('sending', function(file, xhr, formData){
            formData.append('type', 'usato');
            formData.append('gallery_files', $("input[name='gallery_files']").val());
        });        
		dzGallery.on("processing", function(file) {
			$(".loadmsg").hide();
			$("#loader").show();
		});
		dzGallery.on("success", function(file,msg) {
			$("input[name='gallery_files']").val(msg);	
			do_save(); // submit form
		});
		dzGallery.on("error", function(file,msg) {
			$(".loadmsg").hide();	
			$("#notloaded").show();	
			console.log("dzGallery error: "+msg);
		});	
		/* end processQueue */
		
		// aggiungi caratteristica tecnica
		var cartec=$("#tpl_cartec").html();
		$("#newcar").click(function() {
			var n=$(".row_cartec").length; 
			new_cartec=cartec.replace("%n%",n); // per it
			new_cartec=new_cartec.replace("%n%",n); // per en
			$("#cartec").append(new_cartec);
		});
		
		// rimuovi caratteristica tecnica
		$("body").on("click",".btn_delcar",function() {
			$(this).closest(".row_cartec").remove();
		});
		
		// upload foto o direttamente submit form se non ho foto
		$("#btn_save").click(function() {
			if (dzGallery.getQueuedFiles().length > 0) {                        
				dzGallery.processQueue();  
			} else {                       
				do_save();
			}                                    
		});
	
		// submit form salvataggio
		function do_save() {			
			var dati=$("#form").serialize();
			dati+="&type=usato";
			var url="<?php echo site_url('admin/save') ?>";
			$.post(url,dati,function(resp) {
				console.log(resp);
			})
			.success(function(){															
				$(".loadmsg").hide();
				$("#loaded").show();
				$("#play").hide();
				$("#stop").show();
			});
		}

    
    </script>

