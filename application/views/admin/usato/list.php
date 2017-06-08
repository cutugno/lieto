<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container pagecontainer">
	<h2>Elenco usati</h2>
	<?php if ($usati) : ?>
	<table class="table table-striped table-condensed">
		<thead>
			<tr>
				<th></th>
				<th>Modello</th>
				<th class="text-center">Visibile</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($usati as $usato) : ?>
			<tr>
				<td><img class="listimg" src="<?php echo site_url('assets/img/usato/'.$usato->img_home) ?>" /></td>
				<td><?php echo $usato->nome ?></td>
				<td class="text-center"><i class="fa fa-circle text-<?php echo $usato->visible==1 ? "success" : "danger" ?>" aria-hidden="true"></i></td>
				<td><a href="<?php echo site_url('admin/usato/view/'.$usato->url) ?>"><button class="btn btn-sm btn-info">Dettagli</button></a></td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
	<?php else : ?>
	Nessun usato disponibile
	<?php endif ?>
</div>
