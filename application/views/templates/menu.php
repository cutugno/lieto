<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

	<!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
    	<div class="container">
        	<!-- top header -->
            <div class="top-header">
            	<div class="top-contact pull-left">
                	<ul class="list-inline list-unstyled">
                    	<li><p><i class="pe-7s-call pe-lg pe-va"></i> +00 (123) 456 78 90</p></li>
                        <li><p><i class="pe-7s-mail pe-lg pe-va"></i> <a href="mailto:info@junik.com">info@junik.com</a></p></li>
                    </ul>    
                </div>
                <div class="top-social pull-right">
                	<ul class="list-inline list-unstyled">
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    	<li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>    
                </div>
            </div>
            <!-- /top header -->
        
        	<!--zetta menu -->
            <ul onClick="" class="zetta-menu zm-response-switch zm-full-width zm-effect-fade">
                <li class="zm-logo"><a href="index.html"><img title="logo" src="<?php echo base_url(); ?>assets/img/logo.png" alt=""></a></li>
                <!-- home pages -->
                <li><a>Home</a>
                    <ul class="w-200">
                        <li><a href="index.html">Home Agency</a></li>
                        <li><a href="home-business.html">Home Bussines</a></li>
                        <li><a href="home-corporate.html">Home Corporate</a></li>
                    </ul>
                </li>
                <!-- /home pages -->
                
                <!-- Pages -->
                <li class="zm-content-full"><a>Pages</a>
                    <div>
                        <div class="zm-row">
                            <div class="zm-col c-3">
                                <ul>
                                    <li><a href="about-us-1.html">About Us 1</a></li>
                                    <li><a href="about-us-2.html">About Us 2</a></li>
                                    <li><a href="about-us-3.html">About Us 3</a></li>
                                    <li><a href="services-1.html">Services 1</a></li>
                                </ul>
                            </div>
                            <div class="zm-col c-3">
                                <ul>
                                    <li><a href="services-2.html">Services 2</a></li>
                                    <li><a href="services-3.html">Services 3</a></li>
                                    <li><a href="contact-1.html">Contact 1</a></li>
                                    <li><a href="contact-2.html">Contact 2</a></li>
                                </ul>
                            </div>
                            <div class="zm-col c-3">
                                <ul>
                                    <li><a href="error404.html">Error 404</a></li>
                                    <li><a href="error500.html">Error 500</a></li>
                                    <li><a href="portfolio-masonry.html">Portfolio Masonry</a></li>
                                    <li><a href="portfolio-juicy.html">Portfolio Juicy</a></li>
                                </ul>
                            </div>
                            <div class="zm-col c-3">
                                <ul class="last">
                                    <li><a href="portfolio-full-screen.html">Portfolio Full Screen</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- /Pages -->
            
                <!-- Shop -->
                <li><a>Shop</a>
                    <ul class="w-200">
                        <li><a href="shop-grid-4.html">Shop Grid 4</a></li>
                        <li><a href="shop-grid-3.html">Shop Grid 3</a></li>
                        <li><a href="shop-product.html">Product</a></li>
                        <li><a href="shop-cart.html">Cart</a></li>
                        <li><a href="shop-cart-empty.html">Cart Empty</a></li>
                        <li><a href="shop-checkout.html">Checkout</a></li>
                        <li><a href="shop-confirmation.html">Confirmation</a></li>
                    </ul>
                </li>
            	<!-- /Shop -->
                
                <!-- Account -->
                <li><a>Account</a>
                    <ul class="w-200">
                        <li><a href="login.html">login</a></li>
                        <li><a href="lost-password.html">Lost Password</a></li>
                        <li><a href="change-password.html">Change Password</a></li>
                        <li><a href="shop-edit-shipping-address.html">Edit Shipping Address</a></li>
                        <li><a href="shop-edit-billing-address.html">Edit Billing Address</a></li>
                        <li><a href="shop-order-list.html">Order List</a></li>
                    </ul>
                </li>
            	<!-- /Account -->
                
                <!-- Features -->
                <li><a>Features</a>
                    <ul class="w-200">
                        <li><a href="features/sections.html">Sections</a></li>
                        <li><a href="features/pricing-tables.html">Pricing Tables</a></li>
                        <li><a href="features/icons.html">Icons</a></li>
                        <li><a href="features/features-box.html">Features Box</a></li>
                        <li><a href="features/count-bar.html">Count And Bar</a></li>
                        <li><a href="features/carousel.html">Carousel</a></li>
                        <li><a href="features/buttons.html">Buttons</a></li>
                        <li><a href="features/accordion-tab.html">Accordion Tab</a></li>
                    </ul>
                </li>
            	<!-- /Features -->
                
                <!-- Blog -->
                <li><a>Blog</a>
                    <ul class="w-200">
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="blog-with-sidebar.html">Blog With Sidebar</a></li>
                        <li><a href="blog-single-post.html">Blog Single Post</a></li>
                        <li><a href="post-with-sidebar.html">Post With Sidebar</a></li>
                    </ul>
                </li>
            	<!-- /Blog -->
            	
                <!-- Search Place -->
                <li class="zm-search zm-right-item">
                    <form>
                        <input id="search-1" name="search" type="search">
                        <label for="search-1" class="pe-7s-search pe-lg pe-va"></label>
                    </form>
                </li>
                <!-- /Search Place -->
                
                <!-- Card -->
                <li class="zm-content zm-right-item zm-right-align"><a><i class="pe-7s-cart pe-lg pe-va"></i></a>
                    <div class="w-300">
                    	<div class="cart">
                        	<p>No products in the cart.</p>
                            <a href="#">Cart</a>
                            <b class="pull-right">Total: <span class="value">&euro;0.00</span></b>
                        </div>
                    </div>
                </li>
                <!-- /Card -->
                
            </ul>
    	</div><!-- end container -->
    </nav>
    <!-- navigation -->
