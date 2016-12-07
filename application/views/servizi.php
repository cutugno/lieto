	<!-- header -->
    <section class="content section-parallax parallax-slider" style="background-image: url(<?php echo site_url('assets/img/prodotti/banner/'); ?>">
    	<div class="layer-dark"></div>
    	<div class="container white-content">
        	<div class="row">
				<div class="col-sm-12">
					<h2><?php // echo $prodotto->nome; ?></h2>
					<h2>Servizio <?php echo $cat; ?></h2>
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
                	<img class="img-responsive" src="<?php echo base_url(); ?>assets/img/prodotti/" alt="">
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
                	<div class="product-price" style="display:none">
                		<span class="product-price-single-off">&euro;45.00</span>
                		<span class="product-price-single">&euro;45.00</span>
                    </div>
                    <div class="description margin-bottom-60">
                    	<p><?php // echo $prodotto->descr; ?></p>
                    	<p><a href="http://<?php // echo $prodotto->ext_link; ?>" target="_blank"><?php // echo $prodotto->ext_link; ?></a></p>
                    </div>
                    <ul class="margin-bottom-45 list-unstyled product-desciption">
                    	<li style="display:none"><b>Category:</b> <a href="#">other</a></li>
                        <li style="display:none"><b>Tags:</b> <a href="#">other</a>, <a href="#">other2</a></li>
                        <li><b>Share:</b> 
                        	<a href="#"><i class="fa fa-facebook social-icon-3"></i></a>
                            <a href="#"><i class="fa fa-twitter social-icon-3"></i></a>
                            <a href="#"><i class="fa fa-google-plus social-icon-3"></i></a>
                     	</li>
                    </ul>
                    
                    <a style="display: none" href="#" class="btn btn-sm ju-btn-default dark">Add to card</a>
                    
                </div>
                
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- /product section -->
    
    <!-- features product section -->
    <section class="content section-grey" style="display:none">
    	<div class="container">
            
            <div class="woocommerce columns-4">
                
                <ul class="products">
                    <li class="product">
                        <div class="product-image">
                            <div class="product-layer"></div>
                            <div class="new-product">New</div>
                            <img src="img/shop_images/image_01_254x300.jpg" alt="">
                            <div class="product-button">
                                <a href="#" class="btn btn-sm ju-btn-default dark">Add to card</a>
                            </div>
                        </div>
                        <div class="product-footer">
                            <span class="price">
                                <span class="amount">&euro; 105.00</span>
                            </span>
                            <span class="product-title"><a href="#">Product name</a></span>
                            <span class="product-category"><a href="#">clothes</a>, <a href="#">other</a></span>
                        </div>
                    </li>
                    <li class="product">
                        <div class="product-image">
                            <div class="product-layer"></div>
                            <div class="for-sales">Sale</div>
                            <div class="product-off">Off</div>
                            <img src="img/shop_images/image_03_254x300.jpg" alt="">
                            <div class="product-button">
                                <a href="#" class="btn btn-sm ju-btn-default dark">Add to card</a>
                            </div>
                        </div>
                        <div class="product-footer">
                            <span class="price">
                                <span class="amount off">&euro; 89.00</span>
                                <span class="amount">&euro; 59.00</span>
                            </span>
                            <span class="product-title"><a href="#">Product name</a></span>
                            <span class="product-category"><a href="#">clothes</a>, <a href="#">other</a></span>
                        </div>
                    </li>
                    <li class="product">
                        <div class="product-image">
                            <div class="product-layer"></div>
                            <img src="img/shop_images/image_11_254x300.jpg" alt="">
                            <div class="product-button">
                                <a href="#" class="btn btn-sm ju-btn-default dark">Add to card</a>
                            </div>
                        </div>
                        <div class="product-footer">
                            <span class="price">
                                <span class="amount">&euro; 85.00</span>
                            </span>
                            <span class="product-title"><a href="#">Product name</a></span>
                            <span class="product-category"><a href="#">clothes</a>, <a href="#">other</a></span>
                        </div>
                    </li>
                    <li class="product">
                        <div class="product-image">
                            <div class="product-layer"></div>
                            <img src="img/shop_images/image_13_254x300.png" alt="">
                            <div class="product-button">
                                <a href="#" class="btn btn-sm ju-btn-default dark">Add to card</a>
                            </div>
                        </div>
                        <div class="product-footer">
                            <span class="price">
                                <span class="amount">&euro; 99.00</span>
                            </span>
                            <span class="product-title"><a href="#">Product name</a></span>
                            <span class="product-category"><a href="#">clothes</a>, <a href="#">other</a></span>
                        </div>
                    </li>
                </ul>  
        	</div><!-- end woocommerce-->
        </div><!-- end container -->
    </section>
    <!-- /features product section -->
