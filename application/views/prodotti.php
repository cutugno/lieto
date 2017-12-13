	<!-- header -->
    <section class="content section-parallax parallax-slider" style="background-image: url(<?= $banner ?>)">
    	<div class="layer-dark"></div>
    	<div class="container white-content">
        	<div class="row">
				<div class="col-sm-12">
					<h2><?php echo $prodotto->nome; ?></h2>
				</div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- end header -->
    
    <!-- product section -->
    <section class="content section-white">
    	<div class="container text-left">
        	<div class="row">
            
				<div class="col-sm-5">
                	<img class="img-responsive" src="<?php echo base_url(); ?>assets/img/prodotti/<?php echo $prodotto->img; ?>" alt="<?php echo $prodotto->nome; ?>">
                    <!--
                    <div class="owl-carousel slider">
                        <div class="item">
                            <img src="<?php echo base_url(); ?>assets/img/shop_images/image_01_538x548.jpg" alt="">
                        </div>
                        <div class="item">
                        	<img src="<?php echo base_url(); ?>assets/img/shop_images/image_03_538x548.jpg" alt="">
                        </div>
                        <div class="item">
                            <img src="<?php echo base_url(); ?>assets/img/shop_images/image_11_538x548.jpg" alt="">
                        </div>
                    </div>
					<!-- end owl-carousel -->
                </div>
                
                <div class="col-sm-7">
                    <div class="description margin-bottom-60">
                    	<p><?php echo $prodotto->descr; ?></p>
                    	<p><a href="http://<?php echo $prodotto->ext_link; ?>" target="_blank"><?php echo $prodotto->ext_link; ?></a></p>
                    </div>
                    <!--
                    <ul class="margin-bottom-45 list-unstyled product-desciption">
                    	<li><b><?php echo $this->lang->line('custom_prodotti_01') ?>:</b> 
                        	<a href="#"><i class="fa fa-facebook social-icon-3"></i></a>
                            <a href="#"><i class="fa fa-twitter social-icon-3"></i></a>
                            <a href="#"><i class="fa fa-google-plus social-icon-3"></i></a>
                     	</li>
                    </ul>         
                    -->           
                </div>
                
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- /product section -->
 
