	<!-- header -->
    <section class="content section-parallax parallax-slider" style="background-image: url('<?php echo site_url('assets/img/banner/preventivo.jpg') ?>');">
    	<div class="layer-dark"></div>
    	<div class="container white-content">
        	<div class="row">
				<div class="col-sm-12">
					<h2><?php echo $this->lang->line('custom_preventivo_01') ?></h2>
				</div>
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- end header -->
    
    <!-- form preventivo -->
    <section class="content section-grey">
    	<div class="container">
        	<div class="row">
            	<div class="col-sm-8 col-sm-offset-2">
                    <p style="margin-bottom:35px"><?php echo $this->lang->line('custom_preventivo_03') ?></p>
                    <?php
						$attr=array('id'=>'form_preventivo');
						echo form_open(site_url('preventivo'), $attr);
					?>	
					<div class="row text-left">
						<div class="form-group col-sm-6">
							<label for="nome"><?php echo $this->lang->line('custom_preventivo_07') ?></label>
							<?php 
								$attr=array('class'=>'form-control', 'name'=>'nome', 'value'=>set_value('nome'));
								echo form_input($attr);
								echo form_error('nome');
							?>								
						</div>
						<div class="form-group col-sm-6">
							<label for="cognome"><?php echo $this->lang->line('custom_preventivo_08') ?></label>
							<?php 
								$attr=array('class'=>'form-control', 'name'=>'cognome', 'value'=>set_value('cognome'));
								echo form_input($attr);
								echo form_error('cognome');
							?>								
						</div>
						<div class="form-group col-sm-6">
							<label for="email"><?php echo $this->lang->line('custom_preventivo_09') ?></label>
							<?php 
								$attr=array('class'=>'form-control', 'name'=>'email', 'value'=>set_value('email'));
								echo form_input($attr);
								echo form_error('email');
							?>								
						</div>
						<div class="form-group col-sm-6">
							<label for="telefono"><?php echo $this->lang->line('custom_preventivo_10') ?></label>
							<?php 
								$attr=array('class'=>'form-control', 'name'=>'telefono', 'value'=>set_value('telefono'));
								echo form_input($attr);
								echo form_error('telefono');
							?>								
						</div>
						<div class="form-group col-sm-12">
							<label for="indirizzo"><?php echo $this->lang->line('custom_preventivo_11') ?></label>
							<?php 
								$attr=array('class'=>'form-control', 'name'=>'indirizzo', 'value'=>set_value('indirizzo'));
								echo form_input($attr);
								echo form_error('indirizzo');
							?>								
						</div>
						<div class="form-group col-sm-7">
							<label for="citta"><?php echo $this->lang->line('custom_preventivo_12') ?></label>
							<?php 
								$attr=array('class'=>'form-control', 'name'=>'citta', 'value'=>set_value('citta'));
								echo form_input($attr);
								echo form_error('citta');
							?>								
						</div>
						<div class="form-group col-xs-6 col-sm-2">
							<label for="provincia"><?php echo $this->lang->line('custom_preventivo_13') ?></label>
							<?php 
								$attr=array('class'=>'form-control', 'name'=>'provincia', 'value'=>set_value('provincia'));
								echo form_input($attr);
								echo form_error('provincia');
							?>								
						</div>
						<div class="form-group col-xs-6 col-sm-3">
							<label for="cap"><?php echo $this->lang->line('custom_preventivo_14') ?></label>
							<?php 
								$attr=array('class'=>'form-control', 'name'=>'cap', 'value'=>set_value('cap'));
								echo form_input($attr);
								echo form_error('cap');
							?>								
						</div>
						<div class="form-group col-xs-12">							
							<label for="richiesta"><?php echo $this->lang->line('custom_preventivo_15') ?></label>
							<?php 
								$attr=array('class'=>'form-control', 'name'=>'richiesta', 'value'=>set_value('richiesta'), 'rows'=>8);
								echo form_textarea($attr);
								echo form_error('richiesta');
							?>	
						</div>
						<div class="form-group col-xs-12">
							<?php 
								echo form_checkbox('newsletter',1,set_checkbox('newsletter',1));
							?>	
							<label><?php echo $this->lang->line('custom_preventivo_20') ?></label>
						</div>
						<div class="col-xs-12 form-group text-left">
							<p class="small text-danger"><?php echo $this->lang->line('custom_preventivo_21') ?></p>
							<p class="small"><?php echo $this->lang->line('custom_preventivo_22') ?></p>
                        	<button type="submit" id="send" class="btn btn-primary ju-btn-default btn-filled-2 rounded"><?php echo $this->lang->line('custom_preventivo_02') ?></button>
                        </div>
					</div>
					<?php echo form_close() ?>    
				</div>
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- / form -->
