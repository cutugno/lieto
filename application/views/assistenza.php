	<!-- header -->
    <section class="content section-parallax parallax-slider" style="background-image: url(<?php echo base_url(); ?>assets/img/slider/picjumbo.com_IMG_9747.jpg);">
    	<div class="layer-dark"></div>
    	<div class="container white-content">
        	<div class="row">
				<div class="col-sm-12">
					<h2>Assistenza</h2>
				</div>
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- end header -->
    
    <!-- features section -->
    <section class="content section-white">
    	<div class="container">
		
			<div class="margin-bottom-45"></div>
			<?php // var_dump ($assistenza); ?>
        	<div class="row">
				<?php foreach ($assistenza as $val) : ?>
                <div class="col-xs-12">
					<div class="left_icons style6">
						<div class="single_box_right default">
							<img class="logo_small" src="<?php echo site_url('assets/img/prodotti/'.$val->img); ?>" alt="<?php echo "http://".$val->ext_link; ?>">
						</div>
						<div class="single_box_right">
							<h6><?php echo $val->nome; ?></h6>
							<p><?php echo $val->descr; ?></p>
							<p><a href="http://<?php echo $val->ext_link; ?>" target="_blank"><?php echo $val->ext_link; ?></a></p>
						</div>
					</div>
				</div>
				<div class="col-xs-12 margin-bottom-15"></div>
				<?php endforeach ?>              
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- /features section -->
    
    <!-- map section -->
    <section class="section-white">
		<div class="map-full" id="map"></div>
    </section>
    <!-- /map section -->
