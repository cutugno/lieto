<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container pagecontainer">
	<div class="row">
		<div class="col-xs-6">
			<h2>Dettagli offerta</h2>
		</div>
		<div class="col-xs-6 text-right">
			<a href="<?php echo site_url('admin/offerte') ?>"><button class="btn btn-default">Torna a elenco</button></a>
		</div>
	</div>
	<?php
		$attr=array('id'=>'form');
		echo form_open('#', $attr);
	?>
	<div class="row">
		<div class="form-group col-xs-12">
			<label>Nome</label>
			<?php 
				$attr=array('class'=>'form-control', 'name'=>'nome', 'value'=>$offerta->nome);
				echo form_input($attr);
				echo form_error('nome');
			?>								
		</div>
	</div>
	<div class="row greyrow">
		<div class="form-group col-sm-6">
			<label>Descrizione ITA</label>
			<?php 
				$attr=array('class'=>'form-control', 'name'=>'descr[it]', 'rows'=>'5', 'value'=>$offerta->descr->it);
				echo form_textarea($attr);
				echo form_error('descr[it]')
			?>	
		</div>
		<div class="form-group col-sm-6">
			<label>Descrizione ENG</label>
			<?php 
				$attr=array('class'=>'form-control', 'name'=>'descr[en]', 'rows'=>'5', 'value'=>$offerta->descr->en);
				echo form_textarea($attr);
				echo form_error('descr[en]');
			?>	
		</div>
	</div>
	<div class="row">
		<div class="form-group col-xs-12">
			<label>Foto Home (450x285)</label><br>			
			<button type="button" class="btn btn-primary btn-xs" id="newhome">Carica foto</button>
			<input type="hidden" name="home_file" value='<?php echo $offerta->home_file ?>'></input>
			<br><br>			
			<div class="dz-preview dz-file-preview img-preview" id="img_home">
			  <div class="dz-details">
				<img style="height:120px" src="<?php echo site_url('public/img/offerte/'.$offerta->img_home) ?>" />
			  </div>
			  <div class="text-center">	
				<button type="button" id="remove_img_home" class="btn btn-info btn-xs" data-dz-remove>Cancella foto</button>
			  </div>
			</div>
		</div>
		<div class="col-xs-12" id="picture-preview-home"></div>
		<!-- preview container home -->
		<div id="preview-template-home" style="display:none">
			  <div class="dz-preview dz-file-preview img-preview">
				  <div class="dz-details">
					<img data-dz-thumbnail />
				  </div>
				  <div class="text-center">	
					<button type="button" class="btn btn-info btn-xs" data-dz-remove>Cancella foto</button>
				  </div>
			  </div>
		</div>
	</div>
	<div class="row greyrow">
		<div class="form-group col-xs-12">
			<label>Foto Gallery (1000x635)</label><br>
			<button type="button" class="btn btn-primary btn-xs" id="newgallery">Carica foto</button>
			<input type="hidden" name="gallery_files" value="[]"></input>	
			<br><br>
					
			<?php if (!empty($offerta->pics)) : ?>
			<?php foreach ($offerta->pics as $pic) : ?>
			<!-- loop immagini galleria -->				
			<div class="dz-preview dz-file-preview img-preview img_gallery">
			  <input type="hidden" name="orig_gallery[]" value="<?php echo $pic->id ?>">
			  <div class="dz-details">
				<img style="height:120px" src="<?php echo site_url('public/img/offerte/'.$pic->pic) ?>" />
			  </div>
			  <div class="text-center">	
				<button type="button" class="btn btn-info btn-xs remove_img_gallery" data-dz-remove>Cancella foto</button>
			  </div>
			</div>		
			<!-- / loop immagini galleria -->
			<?php endforeach ?>
			<?php endif ?>
		</div>
		<div class="col-xs-12" id="picture-preview-gallery"></div>
		<!-- preview container gallery -->
		<div id="preview-template-gallery" style="display:none">
			  <div class="dz-preview dz-file-preview img-preview">
				  <div class="dz-details">
					<img data-dz-thumbnail />
				  </div>
				  <div class="text-center">	
					<button type="button" class="btn btn-info btn-xs" data-dz-remove>Cancella foto</button>
				  </div>
			  </div>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-xs-12">
			<label>Foto Banner (1900x300)</label><br>
			<button type="button" class="btn btn-primary btn-xs" id="newbanner">Carica foto</button>
			<input type="hidden" name="banner_file" value='<?php echo $offerta->banner_file ?>'></input>	
			<br><br>			
			<div class="dz-preview dz-file-preview img-preview" id="img_banner">
			  <div class="dz-details">
				<img style="height:120px" src="<?php echo site_url('public/img/offerte/'.$offerta->img_banner) ?>" />
			  </div>
			  <div class="text-center">	
				<button type="button" id="remove_img_banner" class="btn btn-info btn-xs" data-dz-remove>Cancella foto</button>
			  </div>
			</div>		
		</div>
		<div class="col-xs-12" id="picture-preview-banner"></div>
		<!-- preview container gallery -->
		<div id="preview-template-banner" style="display:none">
			  <div class="dz-preview dz-file-preview img-preview">
				  <div class="dz-details">
					<img data-dz-thumbnail />
				  </div>
				  <div class="text-center">	
					<button type="button" class="btn btn-info btn-xs" data-dz-remove>Cancella foto</button>
				  </div>
			  </div>
		</div>
	</div>
	<div class="row greyrow">
		<div class="col-xs-6">
			<div class="row">
				<div class="form-group col-xs-12">
					<label>Allegato ITA (solo .pdf, .txt, .doc, .docx)</label><br>
					<button type="button" class="btn btn-primary btn-xs" id="newlink">Carica file</button>
					<input type="hidden" name="link" value='<?php echo $offerta->link_ita ?>'></input>
					<?php if ($offerta->link_ita != "[]") : ?>
					<br><br>
					<div class="dz-preview dz-file-preview img-preview" id="link_it">
						  <div class="dz-details">
							  <i class="fa fa-file-text-o fa-3x" aria-hidden="true"></i>
						  </div>
						  <div class="text-center">
							<button type="button" class="btn btn-info btn-xs" id="remove_link_it">Cancella allegato</button>
						  </div>
					 </div>	
					 <?php endif ?>
				</div>
				<div class="col-xs-12" id="file-preview-link"></div>
				<!-- preview container link -->
				<div id="preview-template-link" style="display:none">
					  <div class="dz-preview dz-file-preview img-preview">
						  <div class="dz-details">
							  <i class="fa fa-file-text-o fa-3x" aria-hidden="true"></i>
						  </div>
						  <div class="text-center">
							<button type="button" class="btn btn-info btn-xs" data-dz-remove>Cancella allegato</button>
						  </div>
					  </div>
				</div>
			</div>
		</div>
		<div class="col-xs-6">
			<div class="row">
				<div class="form-group col-xs-12">
					<label>Allegato ENG (solo .pdf, .txt, .doc, .docx)</label><br>
					<button type="button" class="btn btn-primary btn-xs" id="newlink_en">Carica file</button>
					<input type="hidden" name="link_en" value='<?php echo $offerta->link_eng ?>'></input>
					<?php if ($offerta->link_eng != "[]") : ?>	
					<br><br>
					<div class="dz-preview dz-file-preview img-preview" id="link_en">
						  <div class="dz-details">
							  <i class="fa fa-file-text-o fa-3x" aria-hidden="true"></i>
						  </div>
						  <div class="text-center">
							<button type="button" class="btn btn-info btn-xs" id="remove_link_en">Cancella allegato</button>
						  </div>
					 </div>	
					 <?php endif ?>
				</div>
				<div class="col-xs-12" id="file-preview-link-en"></div>
				<!-- preview container link -->
				<div id="preview-template-link-en" style="display:none">
					  <div class="dz-preview dz-file-preview img-preview">
						  <div class="dz-details">
							  <i class="fa fa-file-text-o fa-3x" aria-hidden="true"></i>
						  </div>
						  <div class="text-center">							
							<button type="button" class="btn btn-info btn-xs" data-dz-remove>Cancella allegato</button>
						  </div>
					  </div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-xs-6">
			<label>Testo pulsante ITA</label>
			<?php 
				$attr=array('class'=>'form-control', 'name'=>'btn_txt[it]', 'value'=>$offerta->btn_txt->it);
				echo form_input($attr);
				echo form_error('btn_txt[it]');
			?>	
		</div>
		<div class="form-group col-xs-6">
			<label>Testo pulsante ENG</label>
			<?php 
				$attr=array('class'=>'form-control', 'name'=>'btn_txt[en]', 'value'=>$offerta->btn_txt->en);
				echo form_input($attr);
				echo form_error('btn_txt[en]');
			?>	
		</div>
	</div>
	<div class="row greyrow">
		<div class="form-group col-xs-12">			
			<?php echo form_checkbox("visible",1,true) ?>
			<label>Visibile</label>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-sm-6">
			<label>OG:title ITA</label>
			<?php 
				$attr=array('class'=>'form-control', 'name'=>'og_title[it]', 'value'=>$offerta->seo->og_title->it);
				echo form_input($attr);
			?>	
		</div>
		<div class="form-group col-sm-6">
			<label>OG:title ENG</label>
			<?php 
				$attr=array('class'=>'form-control', 'name'=>'og_title[en]', 'value'=>$offerta->seo->og_title->en);
				echo form_input($attr);
			?>	
		</div>
	</div>
	<div class="row greyrow">
		<div class="form-group col-sm-6">
			<label>OG:description ITA</label>
			<?php 
				$attr=array('class'=>'form-control', 'name'=>'og_description[it]', 'value'=>$offerta->seo->og_description->it);
				echo form_input($attr);
			?>	
		</div>
		<div class="form-group col-sm-6">
			<label>OG:description ENG</label>
			<?php 
				$attr=array('class'=>'form-control', 'name'=>'og_description[en]', 'value'=>$offerta->seo->og_description->en);
				echo form_input($attr);
			?>	
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
		<?php
			$attr=array(
					'id'            => 'btn_save',
					'type'          => 'button',
					'class'  		=> 'btn btn-info',
					'content'       => 'SALVA'
			);
			echo form_button($attr);
		?>
		<?php
			$attr=array(
					'id'            => 'btn_delete',
					'type'          => 'button',
					'class'  		=> 'btn btn-warning',
					'content'       => 'CANCELLA',
					'data-id'		=> $offerta->id
			);
			echo form_button($attr);
		?>
		</div>
		<div class="col-xs-12">
			<div class="loadmsg" id="loader" style="display:none"><i class="fa fa-spinner fa-spin text-info"></i> <span class="text-info">Attendi caricamento immagini</span></div>
			<div class="loadmsg" id="loaded" style="display:none"><i class="fa fa-check text-success"></i></i></i> <span class="text-success">Caricamento completato</span></div>
			<div class="loadmsg" id="notloaded" style="display:none"><i class="fa fa-times text-danger"></i></i></i> <span class="text-danger">Caricamento non effettuato</span></div>
		</div>
	</div>
	<?php echo form_close() ?>
</div>
