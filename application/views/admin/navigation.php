<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>  
    
    
    <nav class="navbar navbar-default">
	  <div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <a class="navbar-brand" href="<?php echo site_url('admin'); ?>">ADMIN LIETO</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestione usati <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo site_url('admin/usato/new') ?>">Nuovo usato</a></li>
					<li><a href="<?php echo site_url('admin/usato') ?>">Elenco usati</a></li>
				</ul>
			</li>
			<li><a href="#">Gestione Offerte </a></li>			
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
