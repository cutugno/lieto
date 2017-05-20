	<!-- header -->
    <section class="content section-parallax parallax-slider" style="background-image: url(<?php echo site_url('assets/img/offerte/'.$offerta->img_banner) ?>)">
    	<div class="layer-dark"></div>
    	<div class="container white-content">
        	<div class="row">
				<div class="col-sm-12">
					<h2><?php echo $offerta->nome ?></h2>
				</div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- end header -->
    
    <!-- product section -->
    <section class="content section-white">
    	<div class="container text-left">
        	<div class="row">
            	<?php // var_dump ($offerta) ?>
				<div class="col-sm-5">
                	
                    <div class="owl-carousel slider">
					<?php if (!empty($offerta->images)) : ?>
						<?php foreach ($offerta->images as $image) : ?>
                        <div class="item">
                            <img src="<?php echo $image ?>" alt="<?php echo $offerta->nome ?> - Offerta Nautica Lieto">
                        </div>
						<?php endforeach ?>
					<?php endif ?>
                    </div><!-- end owl-carousel -->

                </div>
                
                <div class="col-sm-7">
                	<div class="product-price" style="display:none">
                		<!--<span class="product-price-single-off">&euro;45.00</span>-->
                		<span class="product-price-single">&euro;17.000,00</span>
                    </div>
                    <div class="description margin-bottom-45">
                    	<p><?php echo $offerta->descr ?></p>
                    </div>
                    <div class="margin-bottom-45"></div>
                    <a href="<?php echo site_url($offerta->link) ?>" class="btn btn-sm ju-btn-default dark" target=<?php echo $offerta->target ?>><?php echo $offerta->btn_txt ?></a>
              
                    
                </div>
                
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- /product section -->
