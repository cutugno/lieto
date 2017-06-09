<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    
    <!-- custom scripts -->
    <script type="text/javascript">
	
		var dzGallery = new Dropzone("#newgallery", { 
			url: "<?php echo site_url('admin/upload'); ?>",
			thumbnailWidth: 190,
			thumbnailHeight: 120,
			thumbnailMethod: "contain",
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
			thumbnailWidth: 190,
			thumbnailHeight: 120,
			thumbnailMethod: "contain",
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
			thumbnailWidth: 760,
			thumbnailHeight: 120,
			thumbnailMethod: "contain",
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
			var url="<?php echo site_url('admin/usato/save') ?>";
			$.post(url,dati,function(resp) {
				if ($.isNumeric(resp)) {
					location.href="<?php echo site_url('admin/usato') ?>";
				}else{	
					$(".loadmsg").hide();
					swal({title:"", text:resp, timer:2500, showConfirmButton:false, type: "error"});
					console.log("do_save error: "+resp);
				}
			})
		}

    </script>

