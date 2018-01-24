<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container pagecontainer">
	<h2>Elenco offerte</h2>
	<?php if ($offerte) : ?>
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
		<?php foreach ($offerte as $offerta) : ?>
			<tr>
				<td><img class="listimg" src="<?php echo site_url('public/img/offerte/'.$offerta->img_home) ?>" /></td>
				<td><?php echo $offerta->nome ?></td>
				<td class="text-center"><i class="fa fa-circle text-<?php echo $offerta->visible==1 ? "success" : "danger" ?>" aria-hidden="true"></i></td>
				<td><a href="<?php echo site_url('admin/offerte/view/'.$offerta->url) ?>"><button class="btn btn-sm btn-info">Dettagli</button></a></td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
	<?php else : ?>
	Nessuna offerta disponibile
	<?php endif ?>
</div>
