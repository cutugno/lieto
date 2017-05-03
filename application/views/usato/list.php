  <section class="content section-parallax parallax-slider" style="background-image: url(assets/img/banner/usato.jpg);">
    	<div class="layer-dark"></div>
    	<div class="container white-content">
        	<div class="row">
				<div class="col-sm-12">
					<h2>Usato</h2>
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
					<!-- FILTRI NO -->          
                    <div id="filters-container" class="cbp-l-filters-button" style="display:none">
                        <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">
                            All <div class="cbp-filter-counter"></div>
                        </div>
                        <div data-filter=".identity" class="cbp-filter-item">
                            Identity <div class="cbp-filter-counter"></div>
                        </div>
                        <div data-filter=".web-design" class="cbp-filter-item">
                            Web Design <div class="cbp-filter-counter"></div>
                        </div>
                        <div data-filter=".graphic" class="cbp-filter-item">
                            Graphic <div class="cbp-filter-counter"></div>
                        </div>
                        <div data-filter=".logo" class="cbp-filter-item">
                            Logo <div class="cbp-filter-counter"></div>
                        </div>
                    </div>
                    <!-- /FILTRI -->
            
                    <div id="grid-container" class="cbp-l-grid-projects">
						<?php if ($usati != "") : ?>
                        <ul>
							<?php foreach ($usati as $usato) :?>
							<!-- loop usato -->
                            <li class="cbp-item">
                                <div class="cbp-caption">
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="<?php echo site_url('assets/img/usato/'.$usato->img_home) ?>" alt="">
                                    </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignCenter">
                                            <div class="cbp-l-caption-body">                                                                                               
                                                <a href="<?php echo site_url('usato/'.$usato->url) ?>" class="cbp-l-caption-buttonLeft">Scheda</a>
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
                        Nessun usato disponibile
                        <?php endif ?>
                    </div>
           
                </div><!-- end col-sm-12 -->
                
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- /portfolio juicy -->
