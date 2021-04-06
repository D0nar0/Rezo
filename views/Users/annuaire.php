<div id="relative" class="starter-template text-center mt-5 px-3">
	<h1>Annuaire</h1>
	<p class="lead">Découvre la liste des Utilisateurs disponibles dans <?= NAME_APPLICATION ?> ! </p>

	<?php
	// Si je suis connecté, lien vers la recherche
	if ($Auth->logged) {
		echo $html->button('Recherche', [
				'dir' => 'games',
				'page' => 'search'
			],
			['color' => LIGHT]
		) . ' ' .
		$html->button('Suggestions', [
			'dir' => 'games',
			'page' => 'suggest'
		],
		['color' => LIGHT]
	) .
		'<br /><br />';
	}
	?>

</div>
<div class="row justify-content-center">
	<div class="col col-md-6">
	<p class="lead text-center mb-5">Il y a actuellement <strong><?= count($_listOfUsers); ?></strong> jeux dans la base de données</p>
		<?php foreach ($_listOfUsers as $user): ?>
        <?php
    // echo '<pre>';
    // echo print_r($_listOfUsers);
    // echo '</pre>';
        ?>
		<div class="card mb-2">
			<div class="card-body">
			<span class="badge bg-danger float-end"><?= $user->city; ?></span>
				<h5 class="card-title"><?= ucfirst($user->pseudo)?> </h5>
				<p class="card-text"><strong><?php echo $user->age ;?> ans</strong></p>
                <p class="card-text">Domaine :<strong><?php echo $user->domaines ;?></strong></p>
                <p class="card-text">Style :<strong><?php echo $user->style ;?></strong></p>
				<?= $html->button(
					'Voir le profil',
					[
						'dir' => 'posts',
						'page' => 'user',
						'options' => ['id' => $user->id]
					],
					['color' => DANGER,'class' => 'btn-sm']
				); ?>
			</div>
		</div>

		<?php endforeach; ?>
	</div>
</div>