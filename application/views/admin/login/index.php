<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<div class="container" style="margin-top:50px">
		<div class="row">
			<div class="col-xs-8 col-xs-offset-2 jumbotron" id="login_form">
				<h1 class="text-center">LOGIN</h1>
				<br><br>
				<?php
				$attr = array('id' => 'form_login');
				echo form_open('#', $attr);
				$data = array(
						'name'          => 'user',
						'id'            => 'user',
						'class'			=> 'form-control',
						'placeholder'	=> 'Username',
						'value'			=> set_value('user')
				);
				?>
				<div class="form-group">
					<?php echo form_input($data) ?>
				</div>
				<?php
				$data = array(
						'name'          => 'password',
						'id'            => 'password',
						'class'			=> 'form-control',
						'placeholder'	=> 'Password'
				);
				?>
				<div class="form-group">
					<?php echo form_password($data) ?>
				</div>
				<?php
				$data = array(						
						'id'			=> 'btn_login',
						'type'			=> 'submit',
						'class'			=> 'btn btn-primary btn-lg btn-block',
						'content'		=> 'LOGIN'
				);
				
				echo form_button($data);
				
				echo form_close();
				?>
				
			</div>
		</div>
	</div>
