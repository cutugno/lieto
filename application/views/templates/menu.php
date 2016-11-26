<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

	<!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
    	<div class="container">
        	<!-- top header -->
            <div class="top-header">
            	<div class="top-contact pull-left">
                	<ul class="list-inline list-unstyled">
                    	<li><p><i class="pe-7s-call pe-lg pe-va"></i> <a href="tel:+390771472017">0771 472017</a></p></li>
                        <li><p><i class="pe-7s-mail pe-lg pe-va"></i> <a href="mailto:info@nauticalieto.it">info@nauticalieto.it</a></p></li>
                    </ul>    
                </div>
                <div class="top-social pull-right">
                	<ul class="list-inline list-unstyled">
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    	<li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li id="lingue"><small>Scegli lingua: <a href="#">ITA</a> - <a href="#">ENG</a></small></li>
                    </ul>   
                </div>
            </div>
            <!-- /top header -->
        
        	<!--zetta menu -->
            <ul class="zetta-menu zm-response-switch zm-full-width zm-effect-fade">
				<li class="zm-logo"><a href="<?php echo base_url(); ?>"><img title="logo" src="<?php echo base_url(); ?>assets/img/logo.png" alt=""></a></li>
				
				<li><a href="<?php echo site_url('azienda'); ?>">Azienda</a></li>
                
                <li class="zm-content-full"><a>Prodotti</a>
                    <div>
                        <div class="zm-row">
                            <div class="zm-col c-3">
                                <ul>
                                    <li><a href="#">Cat 1 Prodotto 1</a></li>                                    
                                    <li><a href="#">Cat 1 Prodotto 2</a></li>                                    
                                    <li><a href="#">Cat 1 Prodotto 3</a></li>                                                                      
                                </ul>
                            </div>
                            <div class="zm-col c-3">
                                <ul>
                                    <li><a href="#">Cat 2 Prodotto 1</a></li>                                    
                                    <li><a href="#">Cat 2 Prodotto 2</a></li>                                    
                                    <li><a href="#">Cat 2 Prodotto 3</a></li>                                    
                                    <li><a href="#">Cat 1 Prodotto 4</a></li>                                    
                                </ul>
                            </div>
                            <div class="zm-col c-3">
                                <ul>
                                    <li><a href="#">Cat 3 Prodotto 1</a></li>                                    
                                    <li><a href="#">Cat 3 Prodotto 2</a></li>                                    
                                    <li><a href="#">Cat 3 Prodotto 3</a></li>                                    
                                    <li><a href="#">Cat 3 Prodotto 4</a></li>                                    
                                    <li><a href="#">Cat 3 Prodotto 5</a></li>                                    
                                </ul>
                            </div>
                            <div class="zm-col c-3">
                                <ul class="last">
                                    <li><a href="#">Cat 4 Prodotto 1</a></li>                                    
                                    <li><a href="#">Cat 4 Prodotto 2</a></li>                                                                       
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            
                <li><a>Servizi</a>
                    <ul class="w-200">
                        <li><a href="#">Servizio 1</a></li>
                        <li><a href="#">Servizio 2</a></li>
                        <li><a href="#">Servizio 3</a></li>
                        <li><a href="#">Servizio 4</a></li>
                        <li><a href="#">Servizio 5</a></li>
                        <li><a href="#">Servizio 6</a></li>
                    </ul>
                </li>
                
                <li><a href="<?php echo site_url('usato'); ?>">Usato</a></li>
                
                <li><a href="#">Offerte</a></li>
               
                <li><a href="#">News</a></li>
                
                <li><a href="#">Contatti</a></li>
                
                <li><a href="#">Richiedi Preventivo</a></li>
			</ul>
    	</div><!-- end container -->
    </nav>
    <!-- navigation -->
