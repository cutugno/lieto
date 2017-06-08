<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container pagecontainer">
	<h2>Nuovo usato</h2>
	<?php
		$attr=array('id'=>'form');
		echo form_open('#', $attr);
	?>	
	<div class="row">
		<div class="form-group col-xs-12">
			<label>Nome</label>
			<?php 
				$attr=array('class'=>'form-control', 'name'=>'nome');
				echo form_input($attr);
				echo form_error('nome');
			?>								
		</div>
	</div>
	<div class="row greyrow">
		<div class="form-group col-sm-6">
			<label>Descrizione ITA</label>
			<?php 
				$attr=array('class'=>'form-control', 'name'=>'descr[it]', 'rows'=>'5');
				echo form_textarea($attr);
				echo form_error('descr[it]')
			?>	
		</div>
		<div class="form-group col-sm-6">
			<label>Descrizione ENG</label>
			<?php 
				$attr=array('class'=>'form-control', 'name'=>'descr[en]', 'rows'=>'5');
				echo form_textarea($attr);
				echo form_error('descr[en]');
			?>	
		</div>
	</div>
	<div class="row">
		<div class="form-group col-xs-12">
			<label>Caratteristiche tecniche</label><br/>
			<button type="button" class="btn btn-primary btn-xs" id="newcar">Nuova caratteristica</button>
		</div>
		<div id="cartec" class="col-xs-12">
			<!-- template row cartec -->
			<div id="tpl_cartec" style="display:none">
				<div class="row row_cartec">
					<div class="form-group col-xs-5">
						<?php 
							$attr=array('class'=>'form-control', 'name'=>'cartec[%n%][it]', 'placeholder'=>'ITA');
							echo form_input($attr);
						?>	
					</div>
					<div class="form-group col-xs-5">
						<?php 
							$attr=array('class'=>'form-control', 'name'=>'cartec[%n%][en]', 'placeholder'=>'ENG');
							echo form_input($attr);
						?>	
					</div>
					<div class="col-xs-2">
						<button type="button" class="btn btn-warning btn-xs btn_delcar">Elimina</button>
					</div>
				</div>
			</div>
			<!-- / template row cartec -->
		</div>
	</div>
	<div class="row greyrow">
		<div class="form-group col-sm-6">
			<label>Accessori ITA</label>
			<?php 
				$attr=array('class'=>'form-control', 'name'=>'accessori[it]', 'rows'=>'5');
				echo form_textarea($attr);
			?>	
		</div>
		<div class="form-group col-sm-6">
			<label>Accessori ENG</label>
			<?php 
				$attr=array('class'=>'form-control', 'name'=>'accessori[en]', 'rows'=>'5');
				echo form_textarea($attr);
			?>	
		</div>
	</div>
	<div class="row">
		<div class="form-group col-xs-12">
			<label>Foto Home (300x190)</label><br>
			<button type="button" class="btn btn-primary btn-xs" id="newhome">Carica foto</button>
			<input type="hidden" name="home_file" value="[]"></input>			
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
			<input type="hidden" name="banner_file" value="[]"></input>			
		</div>
		<div class="col-xs-12" id="picture-preview-banner"></div>
		<!-- preview container banner -->
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
		<div class="form-group col-xs-12">			
			<?php echo form_checkbox("visible",1,true) ?>
			<label>Visibile</label>
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
		</div>
		<div class="col-xs-12">
			<div class="loadmsg" id="loader" style="display:none"><i class="fa fa-spinner fa-spin text-info"></i> <span class="text-info">Attendi caricamento immagini</span></div>
			<div class="loadmsg" id="loaded" style="display:none"><i class="fa fa-check text-success"></i></i></i> <span class="text-success">Caricamento completato</span></div>
			<div class="loadmsg" id="notloaded" style="display:none"><i class="fa fa-times text-danger"></i></i></i> <span class="text-danger">Caricamento non effettuato</span></div>
		</div>
	</div>
	<?php echo form_close() ?>
</div>
