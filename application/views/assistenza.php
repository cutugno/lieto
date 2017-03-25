	<!-- header -->
    <section class="content section-parallax parallax-slider" style="background-image: url(<?php echo $banner; ?>">
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
			<div class="row">
				 <div class="col-xs-12">
					<div class="left_icons style6">
						<div class="single_box_right default">
							<p>E’ uno dei punti di forza della Nautica Lieto, sia in ambito motoristico che per alcuni importanti brand d’imbarcazioni. Presso il centro verrà fornita assistenza meccanica sia su motori fuoribordo che entrobordo ed entrofuoribordo, oltre che sulle moto d’acqua e barche. Tra i prestigiosi marchi di cui siamo “Centro di Assistenza Autorizzato” vanno segnalati: EVINRUDE, JOHNSON e SELVA per ciò che concerne le motorizzazioni fuoribordo,  CASTOLDI, VOLVO PENTA, YANMAR e FNM per quelle entrobordo ed entrofuoribordo, SEA DOO per le moto d’acqua e, per ciò che concerne le imbarcazioni, viene fornita Assistenza Autorizzata su tutte le imbarcazioni a marchio FIART. Inoltre, attraverso dei centri affiliati e visibili sull’apposita mappa, la Nautica Lieto è in grado d’intervenire anche al difuori di Gaeta, coprendo così un ampio tratto di costa.</p>
						</div>
						
					</div>
				</div>
			</div>			
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
