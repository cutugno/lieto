<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    
    <!-- custom scripts -->
    <script type="text/javascript">
		
		$(function(){
			<?php if (isset($this->session->save)) : ?>
			swal({title:"", text:"<?php echo $this->session->save ?>", timer:1500, showConfirmButton:false, type: "<?php echo $this->session->save_status ?>"});
			<?php endif ?>
		});
		
		// elimina immagine home originale
		$("#remove_img_home").click(function() {
			$("#img_home").remove();
			$("input[name='home_file']").val("[]");
		});
		// elimina immagine banner originale
		$("#remove_img_banner").click(function() {
			$("#img_banner").remove();
			$("input[name='banner_file']").val("[]");
		});
		
		var dzGallery = new Dropzone("#newgallery", { 
			url: "<?php echo site_url('admin/upload'); ?>",
			autoProcessQueue: false,
			uploadMultiple: true,
			maxFiles: 10,
			parallelUploads: 10,
			maxFilesize: 1, // MB
			acceptedFiles: ".jpg",
			dictFileTooBig: "Dimensioni file: {{filesize}}MB. Dimensioni massime: {{maxFilesize}}MB",
			dictInvalidFileType: "Solo immagini in formato .jpg",
			dictMaxFilesExceeded: "Max 10 file contemporanei",
			previewsContainer: "#picture-preview-gallery",
			previewTemplate: document.getElementById('preview-template-gallery').innerHTML
		});
		
		/* gallery processQueue */
		dzGallery.on('sending', function(file, xhr, formData){
            formData.append('gallery_files', $("input[name='gallery_files']").val());
        });        
		dzGallery.on("successmultiple", function(file,msg) {
			$("input[name='gallery_files']").val(msg);	
			do_save(); // submit form
		});
		dzGallery.on("error", function(file,msg) {
			console.log("dzGallery error: "+msg);
		});	
		/* end gallery processQueue */
		
		var dzHome = new Dropzone("#newhome", { 
			url: "<?php echo site_url('admin/upload'); ?>",
			maxFilesize: 1, // MB
			acceptedFiles: ".jpg",
			dictFileTooBig: "Dimensioni file: {{filesize}}MB. Dimensioni massime: {{maxFilesize}}MB",
			dictInvalidFileType: "Solo immagini in formato .jpg",
			previewsContainer: "#picture-preview-home",
			previewTemplate: document.getElementById('preview-template-home').innerHTML
		});
		
		/* home processQueue (auto) */
		dzHome.on('sending', function(file, xhr, formData){
			dzHome.removeAllFiles();
            formData.append('type', 'usato');
            formData.append('home_file', $("input[name='home_file']").val());
        });        
		
		dzHome.on("success", function(file,msg) {
			$("#img_home").remove();
			$("input[name='home_file']").val(msg);	
		});
		dzHome.on("error", function(file,msg) {
			console.log("dzHome error: "+msg);
		});	
		/* end home processQueue */
		
		dzHome.on("removedfile",function(file) {
			$("input[name='home_file']").val("[]");
		});
		
		var dzBanner = new Dropzone("#newbanner", { 
			url: "<?php echo site_url('admin/upload'); ?>",
			maxFilesize: 1, // MB
			acceptedFiles: ".jpg",
			dictFileTooBig: "Dimensioni file: {{filesize}}MB. Dimensioni massime: {{maxFilesize}}MB",
			dictInvalidFileType: "Solo immagini in formato .jpg",
			previewsContainer: "#picture-preview-banner",
			previewTemplate: document.getElementById('preview-template-banner').innerHTML
		});
		
		/* banner processQueue (auto) */
		dzBanner.on('sending', function(file, xhr, formData){
			dzBanner.removeAllFiles();
            formData.append('type', 'usato');
            formData.append('banner_file', $("input[name='banner_file']").val());
        });        
		dzBanner.on("success", function(file,msg) {
			$("#img_banner").remove();
			$("input[name='banner_file']").val(msg);	
		});
		dzBanner.on("error", function(file,msg) {
			console.log("dzBanner error: "+msg);
		});	
		/* end banner processQueue */
		
		dzBanner.on("removedfile",function(file) {
			$("input[name='banner_file']").val("[]");
		});
				
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
			$(".loadmsg").hide();
			$("#loader").show();
			if (dzGallery.getQueuedFiles().length > 0) {                       
				dzGallery.processQueue();  
			} else {                       
				do_save();
			}                                    
		});
	
		// submit form salvataggio
		function do_save() {		
			$("#tpl_cartec input").prop("disabled",true);	
			var dati=$("#form").serialize();
			dati+="&type=usato";
			var url="<?php echo site_url('admin/usato/update') ?>";
			$.post(url,dati,function(resp) {
				console.log(resp);exit();
				if (resp==1) {
					location.reload();
				}else{	
					$(".loadmsg").hide();
					swal({title:"", text:resp, timer:2500, showConfirmButton:false, type: "error"});
					console.log("do_save error: "+resp);
				}
			})
		}

    </script>

