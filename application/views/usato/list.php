  <section class="content section-parallax parallax-slider" style="background-image: url(assets/img/banner/usato.jpg);">
    	<div class="layer-dark"></div>
    	<div class="container white-content">
        	<div class="row">
				<div class="col-sm-12">
					<h2><?php echo $this->lang->line('custom_usato_01') ?></h2>
				</div>	
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- end header -->
    
    <!-- portfolio juicy -->
    <section class="content section-white">
    	<div class="container">
        	<div class="row">

                <div class="col-sm-12">            
                    <div id="grid-container" class="cbp-l-grid-projects">
						<?php if ($usati != "") : ?>
                        <ul>
							<?php foreach ($usati as $usato) :?>
							<!-- loop usato -->
                            <li class="cbp-item">
                                <div class="cbp-caption">
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="<?php echo site_url('assets/img/usato/'.$usato->img_home) ?>" alt="<?php echo $usato->nome ?>">
                                    </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignCenter">
                                            <div class="cbp-l-caption-body">                                                                                               
                                                <a href="<?php echo site_url('usato/'.$usato->url) ?>" class="cbp-l-caption-buttonLeft"><?php echo $this->lang->line('custom_usato_02') ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cbp-l-grid-projects-title"><span class="text-uppercase"><?php echo $usato->nome ?></span></div>
                            </li>
                            <!-- fine loop usato -->
                           <?php endforeach ?>
                        </ul>
                        <?php else : ?>
                        <?php echo $this->lang->line('custom_usato_03') ?>
                        <?php endif ?>
                    </div>
           
                </div><!-- end col-sm-12 -->
                
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- /portfolio juicy -->
