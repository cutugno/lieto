  <section class="content section-parallax parallax-slider" style="background-image: url(<?= $banner ?>);">
    	<div class="layer-dark"></div>
    	<div class="container white-content">
        	<div class="row">
				<div class="col-sm-12">
					<h2><?php echo $this->lang->line('custom_news_01') ?></h2>
				</div>	
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- end header -->
    
     <!-- blog section -->
    <section class="content section-white">
    	<div class="container">
        	<div class="row">
            
            	<div class="col-sm-10 col-sm-offset-1">
					
					<?php if ($news != "") : ?>
                    <div id="grid-container" class="cbp-l-grid-blog margin-bottom-70">
                        <ul>
							<?php foreach ($news as $notizia) : ?>
							<!-- loop news -->
                            <li class="cbp-item">
                                <div class="cbp-caption">
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="<?php echo site_url('assets/img/news/'.$notizia->img_titolo) ?>" alt="<?php echo $notizia->titolo ?>">
                                    </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignCenter">
                                            <div class="cbp-l-caption-body">                                                                                               
                                                <a href="<?php echo site_url('news/'.$notizia->url) ?>" class="cbp-l-caption-buttonLeft"><?php echo $this->lang->line('custom_offerte_02') ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cbp-l-grid-projects-title"><span class="text-uppercase"><?php echo $notizia->titolo ?></span></div>
                                <div class="cbp-l-grid-blog-date"><?php echo $notizia->ts ?></div>
                                <div class="cbp-l-grid-blog-desc"><?php echo $notizia->abst ?>...</div>
                            </li>
                            <!-- / loop news -->
                            <?php endforeach ?>                     
                        </ul>
                    </div>
                    <?php else : ?>
                    <p><?php echo $this->lang->line('custom_news_02') ?></p>
                    <?php endif ?>
                </div><!-- end col-sm-10 -->
                
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- /blog section -->
