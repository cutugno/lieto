	<!-- header -->
    <section class="content section-parallax parallax-slider" style="background-image: url(<?= $banner ?>);">
    	<div class="layer-dark"></div>
    	<div class="container white-content">
        	<div class="row">
				<div class="col-sm-12">
					<h2><?php echo $this->lang->line('custom_contatti_01') ?></h2>
				</div>
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- end header -->
    
    <!-- contact form -->
    <section class="content section-grey">
    	<div class="container">
        	<div class="row">
            	<div class="col-sm-8 col-sm-offset-2">
                    <p style="margin-bottom:35px"><?php echo $this->lang->line('custom_contatti_06') ?></p>
                    <?php
						$attr=array('id'=>'form_contatti');
						echo form_open(site_url('contatti'), $attr);
						//echo form_open(site_url('email/contatti'), $attr);
					?>	
					<div class="row text-left">
						<div class="form-group col-sm-6">
							<label for="nome"><?php echo $this->lang->line('custom_contatti_07') ?></label>
							<?php 
								$attr=array('class'=>'form-control', 'name'=>'nome', 'value'=>set_value('nome'));
								echo form_input($attr);
								echo form_error('nome');
							?>								
						</div>
						<div class="form-group col-sm-6">
							<label for="cognome"><?php echo $this->lang->line('custom_contatti_08') ?></label>
							<?php 
								$attr=array('class'=>'form-control', 'name'=>'cognome', 'value'=>set_value('cognome'));
								echo form_input($attr);
								echo form_error('cognome');
							?>								
						</div>
						<div class="form-group col-sm-6">
							<label for="email"><?php echo $this->lang->line('custom_contatti_09') ?></label>
							<?php 
								$attr=array('class'=>'form-control', 'name'=>'email', 'value'=>set_value('email'));
								echo form_input($attr);
								echo form_error('email');
							?>								
						</div>
						<div class="form-group col-sm-6">
							<label for="telefono"><?php echo $this->lang->line('custom_contatti_10') ?></label>
							<?php 
								$attr=array('class'=>'form-control', 'name'=>'telefono', 'value'=>set_value('telefono'));
								echo form_input($attr);
								echo form_error('telefono');
							?>								
						</div>
						<div class="form-group col-sm-12">
							<label for="indirizzo"><?php echo $this->lang->line('custom_contatti_11') ?></label>
							<?php 
								$attr=array('class'=>'form-control', 'name'=>'indirizzo', 'value'=>set_value('indirizzo'));
								echo form_input($attr);
								echo form_error('indirizzo');
							?>								
						</div>
						<div class="form-group col-sm-7">
							<label for="citta"><?php echo $this->lang->line('custom_contatti_12') ?></label>
							<?php 
								$attr=array('class'=>'form-control', 'name'=>'citta', 'value'=>set_value('citta'));
								echo form_input($attr);
								echo form_error('citta');
							?>								
						</div>
						<div class="form-group col-xs-6 col-sm-2">
							<label for="provincia"><?php echo $this->lang->line('custom_contatti_13') ?></label>
							<?php 
								$attr=array('class'=>'form-control', 'name'=>'provincia', 'value'=>set_value('provincia'));
								echo form_input($attr);
								echo form_error('provincia');
							?>								
						</div>
						<div class="form-group col-xs-6 col-sm-3">
							<label for="cap"><?php echo $this->lang->line('custom_contatti_14') ?></label>
							<?php 
								$attr=array('class'=>'form-control', 'name'=>'cap', 'value'=>set_value('cap'));
								echo form_input($attr);
								echo form_error('cap');
							?>								
						</div>
						<div class="col-xs-12">
							<label><?php echo $this->lang->line('custom_contatti_15') ?>:</label>
						</div>						
						<div class="form-group col-sm-3">							
							<?php 
								echo form_checkbox('interessato[barche]','barche',set_checkbox('interessato[barche]','barche'));
							?>	
							<label><?php echo $this->lang->line('custom_contatti_16') ?></label>
						</div>
						<div class="form-group col-sm-3">							
							<?php 
								echo form_checkbox('interessato[gommoni]','gommoni',set_checkbox('interessato[gommoni]','gommoni'));
							?>	
							<label><?php echo $this->lang->line('custom_contatti_17') ?></label>
						</div>
						<div class="form-group col-sm-3">							
							<?php 
								echo form_checkbox('interessato[moto]','moto',set_checkbox('interessato[moto]','moto'));
							?>	
							<label><?php echo $this->lang->line('custom_contatti_18') ?></label>
						</div>
						<div class="form-group col-sm-3">							
							<?php 
								echo form_checkbox('interessato[motori]','motori',set_checkbox('interessato[motori]','motori'));
							?>	
							<label><?php echo $this->lang->line('custom_contatti_19') ?></label>
						</div>
						<div class="form-group col-xs-12">
							<?php 
								echo form_checkbox('newsletter',1,set_checkbox('newsletter',1));
							?>	
							<label><?php echo $this->lang->line('custom_contatti_20') ?></label>
						</div>
						<div class="col-xs-12 form-group text-left">
							<p class="small text-danger"><?php echo $this->lang->line('custom_contatti_21') ?></p>
							<p class="small"><?php echo $this->lang->line('custom_contatti_22') ?></p>
                        	<button type="submit" id="send" class="btn btn-primary ju-btn-default btn-filled-2 rounded"><?php echo $this->lang->line('custom_contatti_05') ?></button>
                        </div>
					</div>
					<?php echo form_close() ?>    
				</div>
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- /contact form -->
    
   <!-- contact info -->
    <section class="content section-white">
    	<div class="container">
			
			<div class="margin-bottom-70"></div>
			
        	<div class="row">
                <div class="col-sm-6 col-md-4">
					<div class="left_icons style6">
						<div class="single_box_left default">
							<i class="pe-7s-map-marker"></i>
						</div>
						<div class="single_box_right">
							<h6><?php echo $this->lang->line('custom_contatti_02') ?></h6>
							<p>Lungomare Caboto, 23/25<br />04024 Gaeta (LT)</p>
						</div>
					</div>
				</div>
                
                <div class="col-sm-6 col-md-4">
					<div class="left_icons style6">
						<div class="single_box_left default">
							<i class="pe-7s-call"></i>
						</div>
						<div class="single_box_right">
							<h6><?php echo $this->lang->line('custom_contatti_03') ?></h6>
								<p>Tel: +39 0771 472017<br /> Fax: +39 0771 310632<br />Cell: +39 329 4708765-6</p>
						</div>
					</div>
				</div>
                
                <div class="col-sm-6 col-md-4">
					<div class="left_icons style6">
						<div class="single_box_left default">
							<i class="pe-7s-mail"></i>
						</div>
						<div class="single_box_right">
							<h6><?php echo $this->lang->line('custom_contatti_04') ?></h6>
							<p><a href="mailto:info@nauticalieto.it">info@nauticalieto.it</a></p>
						</div>
					</div>
				</div>
                
                
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- /contact info -->
     
    <!-- map section -->
    <section class="section-white">
		<div class="map-full" id="map"></div>
    </section>
    <!-- /map section -->
