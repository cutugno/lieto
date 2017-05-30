<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

	<?php 
		$prod=$menuprod[0];
		$maxprod=$menuprod[1];
		$totcat=$menuprod[2];
	?>
	<!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
    	<div class="container">
        	<!-- top header -->
            <div class="top-header">
            	<div class="top-contact pull-left">
                	<ul class="list-inline list-unstyled">
                    	<li><p><i class="pe-7s-call pe-lg pe-va"></i> <a href="tel:+390771472017">0771 472017</a></p></li>
                        <li><p><i class="pe-7s-mail pe-lg pe-va"></i> <a href="mailto:info@nauticalieto.it" target="_blank">info@nauticalieto.it</a></p></li>
                    </ul>    
                </div>
                <div class="top-social pull-right">
                	<ul class="list-inline list-unstyled">
                    	<li><a href="https://www.facebook.com/nauticalieto/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li id="lingue"><small><?php echo $this->lang->line('custom_menu_01') ?>: <a href="<?php echo site_url('setlanguage/italian')?>">ITA</a> - <a href="<?php echo site_url('setlanguage/english')?>">ENG</a></small></li>
                    </ul>   
                </div>
            </div>
            <!-- /top header -->
        
        	<!--zetta menu -->
            <ul class="zetta-menu zm-response-switch zm-full-width zm-effect-fade">
				<li class="zm-logo"><a href="<?php echo base_url(); ?>"><img title="logo" src="<?php echo base_url(); ?>assets/img/logo.png" alt=""></a></li>
				
				<li><a href="<?php echo site_url('azienda'); ?>"><?php echo $this->lang->line('custom_menu_02') ?></a></li>
                
                <li class="zm-content-full"><a><?php echo $this->lang->line('custom_menu_03') ?></a>
                    <div>
                        <div class="row zm-row">
						<?php
							$ccat=0;
							foreach ($prod as $val) : ?>
							<div class="zm-col c-2">
								<?php $ccat++; ?>
								<?php if ($ccat==$totcat) : ?>
								<ul class="last">									
								<?php else : ?>
								<ul>
								<?php endif ?>
									<li class="sub_title"><?php echo $val->nome; ?></li>
									<?php 
										$countp=0;
										foreach ($val->prodotti as $valp) 
									: ?>
									<li><a href="<?php echo site_url($valp->link); ?>"><?php echo $valp->nome; ?></a></li>  
									<?php 
										$countp++;
										endforeach 
									?>
									<?php if ($maxprod - $countp > 0) : ?>
										<?php for ($x=1;$x<=$maxprod - $countp;$x++) : ?>
										<li class="hidden-sm"></li>
										<?php endfor ?>										
									<?php endif ?>
								</ul>
							</div>
						<?php endforeach ?>
                        </div>
                    </div>
                </li>
            
                <li><a href="<?php echo site_url('servizi'); ?>"><?php echo $this->lang->line('custom_menu_04') ?></a></li>
                
                <li><a href="<?php echo site_url('assistenza'); ?>"><?php echo $this->lang->line('custom_menu_05') ?></a></li>
                
                <li><a href="<?php echo site_url('usato'); ?>"><?php echo $this->lang->line('custom_menu_06') ?></a></li>
                
                <li><a href="<?php echo site_url('offerte'); ?>"><?php echo $this->lang->line('custom_menu_07') ?></a></li>
               
                <li><a href="<?php echo site_url('news'); ?>"><?php echo $this->lang->line('custom_menu_08') ?></a></li>
                
                <li><a href="<?php echo site_url('contatti'); ?>"><?php echo $this->lang->line('custom_menu_09') ?></a></li>
                
                <li><a href="<?php echo site_url('richiedi_preventivo'); ?>"><?php echo $this->lang->line('custom_menu_10') ?></a></li>
			</ul>
    	</div><!-- end container -->
    </nav>
    <!-- navigation -->
