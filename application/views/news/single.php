	<!-- header -->
    <section class="content section-parallax parallax-slider" style="background-image: url(<?php echo site_url('assets/img/news/'.$news->img_banner) ?>)">
    	<div class="layer-dark"></div>
    	<div class="container white-content">
        	<div class="row">
				<div class="col-sm-12">
					<h2><?php echo $news->titolo ?></h2>
				</div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- end header -->
    
    <!-- blog single post -->
    <section class="content section-white">
    	<div class="container">
        	<div class="row">
            
            	<div class="col-md-10 col-sm-12 col-md-offset-1">
                	<div class="blog-post with-sidebar">
                        <div class="article-image">
                            <img src="<?php echo site_url('assets/img/news/'.$news->img_titolo) ?>" alt="<?php echo $news->titolo ?>">
                        </div>
                        <div class="article-content">
                            <div class="article-details">
                                <ul class="list-inline list-unstyled">
                                    <li><?php echo $news->ts ?></li>
                                </ul>
                            </div><!-- end article details -->
                            <h2><?php echo $news->titolo ?></h2>
                            <p><?php echo $news->text ?></p>
                            <!-- se abbiamo altro material andra qua
                            <figure>
                            	<img src="img/slider/shutterstock_206624476.jpg" alt="" />
                            	<figcaption>Here is a caption for this picture</figcaption>
                            </figure>                     
                            <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
                            -->                                                  
                        </div><!-- end article-content -->
                        
                    </div><!-- end blog post -->
                </div><!-- end col-sm-10 -->
                
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- /blog single post -->
