<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    
    <!-- custom scripts -->
    <script type="text/javascript">
		
		$(function(){
			<?php if (isset($this->session->save)) : ?>
			swal({title:"", text:"<?php echo $this->session->save ?>", type: "<?php echo $this->session->save_status ?>"});
			<?php endif ?>
		});
		
		// elimina immagine home originale
		$("#remove_img_home").click(function() {
			$("#img_home").remove();
			$("input[name='home_file']").val("[]");
		});
		// elimina immagine gallery originale
		$(".remove_img_gallery").click(function() {
			$(this).parent().parent(".img_gallery").remove();
		});
		// elimina immagine banner originale
		$("#remove_img_banner").click(function() {
			$("#img_banner").remove();
			$("input[name='banner_file']").val("[]");
		});
		// elimina allegati originali
		$("#remove_link_it").click(function() {
			$("#link_it").remove();
			$("input[name='link']").val("[]");
		});
		$("#remove_link_en").click(function() {
			$("#link_en").remove();
			$("input[name='link_en']").val("[]");
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
            formData.append('type', 'offerte');
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
            formData.append('type', 'offerte');
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
			$("#link_it").remove();
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
			$("#link_en").remove();
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
		$("body").on("click","#link_preview_en",function() {
			var filename=JSON.parse($(this).attr("data-name"));
			filename="<?php echo site_url($this->config->item('tmp_store_folder')) ?>"+filename[0];
			window.open(filename);
		});
		$("body").on("click","#link_preview_orig",function() {
			var filename=JSON.parse($(this).attr("data-name"));
			filename="<?php echo site_url($this->config->item('public_folder')) ?>"+filename[0];
			window.open(filename);
		});
		$("body").on("click","#link_preview_en_orig",function() {
			var filename=JSON.parse($(this).attr("data-name"));
			filename="<?php echo site_url($this->config->item('public_folder')) ?>"+filename[0];
			window.open(filename);
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
			var url="<?php echo site_url('admin/offerte/update/'.$offerta->id) ?>";
			$.post(url,dati,function(resp) {
				if (resp==1) {
					location.reload();
				}else{	
					$(".loadmsg").hide();
					swal({title:"", text:resp, timer:2500, showConfirmButton:false, type: "error"});
					console.log("do_save error: "+resp);
				}
			})
		}
		
		// elimina offerta
		$("#btn_delete").click(function() {
			var id_offerta=$(this).attr("data-id");
			swal({
			  title: '',
			  text: 'Attenzione! La cancellazione è irreversibile. Continuare?',
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'SI',
			  cancelButtonText: 'ANNULLA', 
			  closeOnConfirm: false
			},
			function(){
				var dati="id_offerta="+id_offerta;
				var url="<?php echo site_url('admin/offerte/delete') ?>";
				$.post(url,dati,function(resp){
					//console.log(resp);exit();
					if (resp==1) {
						location.href="<?php echo site_url('admin/offerte') ?>";
					}else{
						swal("","Errore durante la cancellazione. Riprova","error");
					}
				});
			  
			});
		});

    </script>

