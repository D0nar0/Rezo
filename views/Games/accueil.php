<div class="container">
	<div id="rowHp" class="row justify-content-around custom-line">
		<div class="col-6">
			<h1 class="underline">ЯEZO</h1>
			<h2>La plateforme de mise en relations des musiciens !</h2>
			<p>Rezo est la première plateforme française de mise en relation des musiciens. Notre projet permet aux débutants, amateurs et professionnels d’établir un contact via le site web...</p>
			<?= $html->button(
					'En savoir plus',
					[
						'dir' => 'games',
						'page' => 'presentation'
					],
					['color' => LIGHT,'class' => 'btn-sm']
				); ?>
		</div>
		<div id="hpBorder" class="col-4">
			<div id="page_afficher_par_defaut">
				<?php
					
				$form = new BootstrapForm('Connexion', 'User', METHOD_POST);

				$form->addInput('username',	TYPE_EMAIL, 	['label' => 'Adresse mail']);
				$form->addInput('password', TYPE_PASSWORD, 	['label' => 'Mot de passe']);

				$form->setSubmit('Je me connecte', ['color' => DANGER]);
					
				echo $form->form();
				?>
				<br /><hr />
				<p class="lead text-center">Pas encore de compte ?</p>
				<p class="text-center"><a href="javascript:switchDisplay();" style="text-decoration: none; font-size: 18px; font-weight: 400; color : white; background-color : purple; padding: 8px; border-radius : 8px;">Inscription</a></p>
			</div>
			<div id="page_cacher_par_defaut" style="display:none;">
				<div>
					<?php
					
					$form = new BootstrapForm('Inscription Nouvel Utilisateur', 'User', METHOD_POST);

					$form->addInput('surname', TYPE_TEXT, 		['label' => 'Nom', 'placeholder' => 'Nom']);
					$form->addInput('name', TYPE_TEXT, 			['label' => 'Prénom', 'placeholder' => 'Prénom']);
					$form->addInput('pseudo', 	TYPE_TEXT, 		['label' => 'Pseudo', 'placeholder' => 'Quelque chose d\'unique, qui te caractérise !']);
					$form->addInput('age', 	TYPE_NUMBER, 		['label' => 'Age', 'min' => 16, 'max' => 99, 'step' => 1, 'placeholder' => 'Quel age as-tu ?']);
					$form->addInput('username',	TYPE_EMAIL, 	['label' => 'Adresse mail', 'placeholder' => 'Pour spammer ta boite mail chaque jour']);
					$form->addInput('password', TYPE_PASSWORD, 	['label' => 'Mot de passe', 'placeholder' => '8 caractères minimum']);
				
					$form->addInput('city', TYPE_TEXT, 			['label' => 'Ville', 'placeholder' => 'Dans qu\'elle ville es-tu ?']);
					$form->addInput('domaines', TYPE_SELECT,	['label' => 'Domaines', 'data' => ['ingénieur du son' => 'ingénieur du son', 'chanteur' => 'chanteur', 'rappeur' => 'rappeur', 'beatmaker' => 'beatmaker', 'instrumentiste' => 'instrumentiste'], 'class' => 'select2', 'value' => ' ']);
					$form->addInput('style', TYPE_SELECT, 		['label' => 'Ton style de musique préféré', 'data' => ['rap' => 'rap', 'variété' => 'variété', 'electro' => 'electro', 'reggae' => 'reggae', 'rock/métal' => 'rock/métal'], 'class' => 'select2', 'value' => 'jsp du tout']);
					$form->addInput('description', TYPE_TEXTAREA,['label' => 'Description', 'placeholder' => 'Décris toi en quelques lignes !', 'rows' => 8, 'class' => 'summernote']);
					$form->addInput('instagram', TYPE_TEXT, 	['label' => 'Instagram', 'placeholder' => 'Liens de ton Instagram*']);
					$form->addInput('facebook', TYPE_TEXT, 		['label' => 'Facebook', 'placeholder' => 'Liens de ton Facebook*']);
					$form->addInput('twitter', TYPE_TEXT, 		['label' => 'Twitter', 'placeholder' => 'Liens de ton Twitter*']);
					
					$form->setSubmit('Je m\'inscris', ['color' => DANGER]);
					
					echo $form->form();
					?>
					<hr />
					<p class="lead text-center">Déjà inscrit ?</p>
					<p class="text-center"><a href="javascript:switchDisplay();" style="text-decoration: none; font-size: 18px; font-weight: 400; color : white; background-color : purple; padding: 8px; border-radius : 8px;">Connexion</a></p>
				</div>
			<div>
		</div>
	</div>
</div>