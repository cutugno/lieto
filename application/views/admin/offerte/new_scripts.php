<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    
    <!-- custom scripts -->
    <script type="text/javascript">
		
		$(function(){
			<?php if (isset($this->session->save)) : ?>
			swal({title:"", text:"<?php echo $this->session->save ?>", timer:1500, showConfirmButton:false, type: "<?php echo $this->session->save_status ?>"});
			<?php endif ?>
		});
	
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
		
		var dzLink = new Dropzone("#newlink", { 
			url: "<?php echo site_url('admin/upload'); ?>",
			maxFilesize: 1, // MB
			acceptedFiles: ".pdf,.txt,.doc,.docx",
			dictFileTooBig: "Dimensioni file: {{filesize}}MB. Dimensioni massime: {{maxFilesize}}MB",
			dictInvalidFileType: "Tipo file errato. Estensioni consentite: .pdf, .txt, .doc, .docx",
			previewsContainer: "#file-preview-link",
			previewTemplate: document.getElementById('preview-template-link').innerHTML
		});
		
		/* link processQueue (auto) */
		dzLink.on('sending', function(file, xhr, formData){
			dzLink.removeAllFiles();
            formData.append('type', 'offerte');
            formData.append('link', $("input[name='link']").val());
        });        
		dzLink.on("success", function(file,msg) {
			$("input[name='link']").val(msg);	
			$("#link_preview").attr("data-name",msg);	
		});
		dzLink.on("error", function(file,msg) {
			console.log("dzLink error: "+msg);
		});	
		/* end link processQueue */
		
		dzLink.on("removedfile",function(file) {
			$("input[name='link']").val("[]");
		});
		
		var dzLinkEn = new Dropzone("#newlink_en", { 
			url: "<?php echo site_url('admin/upload'); ?>",
			maxFilesize: 1, // MB
			acceptedFiles: ".pdf,.txt,.doc,.docx",
			dictFileTooBig: "Dimensioni file: {{filesize}}MB. Dimensioni massime: {{maxFilesize}}MB",
			dictInvalidFileType: "Tipo file errato. Estensioni consentite: .pdf, .txt, .doc, .docx",
			previewsContainer: "#file-preview-link-en",
			previewTemplate: document.getElementById('preview-template-link-en').innerHTML
		});
		
		/* link_en processQueue (auto) */
		dzLinkEn.on('sending', function(file, xhr, formData){
			dzLinkEn.removeAllFiles();
            formData.append('type', 'offerte');
            formData.append('link_en', $("input[name='link_en']").val());
        });        
		dzLinkEn.on("success", function(file,msg) {
			$("input[name='link_en']").val(msg);	
			$("#link_preview_en").attr("data-name",msg);	
		});
		dzLinkEn.on("error", function(file,msg) {
			console.log("dzLinkEn error: "+msg);
		});	
		/* end link_en processQueue */
		
		dzLinkEn.on("removedfile",function(file) {
			$("input[name='link_en']").val("[]");
		});
		
		// anteprima allegato
		$("body").on("click","#link_preview",function() {
			var filename=JSON.parse($(this).attr("data-name"));
			filename="<?php echo site_url($this->config->item('tmp_store_folder')) ?>"+filename[0];
			window.open(filename);
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
			dati+="&type=offerte";
			var url="<?php echo site_url('admin/offerte/save') ?>";
			$.post(url,dati,function(resp) {
				if ($.isNumeric(resp)) {
					location.href="<?php echo site_url('admin/offerte') ?>";
				}else{	
					$(".loadmsg").hide();
					swal({title:"", text:resp, timer:2500, showConfirmButton:false, type: "error"});
					console.log("do_save error: "+resp);
				}
			})
		}

    </script>

