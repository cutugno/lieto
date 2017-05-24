	<!-- header -->
    <section class="content section-parallax parallax-slider" style="background-image: url(<?php echo site_url('assets/img/usato/'.$usato->img_banner) ?>)">
    	<div class="layer-dark"></div>
    	<div class="container white-content">
        	<div class="row">
				<div class="col-sm-12">
					<h2><?php echo $usato->nome ?></h2>
				</div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- end header -->
    
    <!-- product section -->
    <section class="content section-white">
    	<div class="container text-left">
        	<div class="row">
            	<?php // var_dump ($usato) ?>
				<div class="col-sm-5">
                	
                    <div class="owl-carousel slider">
					<?php if (!empty($usato->images)) : ?>
						<?php foreach ($usato->images as $image) : ?>
                        <div class="item">
                            <img src="<?php echo $image ?>" alt="<?php echo $usato->nome ?> - <?php echo $this->lang->line('custom_usato_04') ?>">
                        </div>
						<?php endforeach ?>
					<?php endif ?>
                    </div><!-- end owl-carousel -->

                </div>
                
                <div class="col-sm-7">
                    <div class="description margin-bottom-45">
                    	<p><?php echo $usato->descr ?></p>
                    </div>
                    <h5><?php echo $this->lang->line('custom_usato_05') ?></h5>
                    <ul class="margin-bottom-45 list-unstyled product-desciption">
					<?php if (!empty($usato->tecniche)) : ?>
						<?php foreach($usato->tecniche as $car) : ?>
						<li><?php echo $car ?></li>
						<?php endforeach ?>
					<?php endif ?>
                    </ul>
                    <?php if ($usato->accessori != "") : ?>
                    <h5><?php echo $this->lang->line('custom_usato_06') ?></h5>
                    <?php echo $usato->accessori ?>
                    <?php endif ?>
                    <div class="margin-bottom-45"></div>
                    <a href="<?php echo site_url('contatti') ?>" class="btn btn-sm ju-btn-default dark"><?php echo $this->lang->line('custom_usato_07') ?></a>
                    
                </div>
                
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- /product section -->
