<div class="starter-template text-center mt-5 px-3">
	<h1>Mise à jour de mes informations</h1>
	<p class="lead">Laissez le mot de passe vide pour ne pas le changer</p>
</div>

<div id="relative" class="row justify-content-center">
	<div class="col justify-content-center">
	<?php
	
	$form = new BootstrapForm('Modification', 'User', METHOD_POST);

	$form->addInput('surname', TYPE_TEXT, 		['value' => $Auth->User->surname, 'label' => 'Nom', 'placeholder' => 'Nom']);
	$form->addInput('name', TYPE_TEXT, 			['value' => $Auth->User->surname, 'label' => 'Prénom', 'placeholder' => 'Prénom']);
	$form->addInput('pseudo', 	TYPE_TEXT, 		['value' => $Auth->User->pseudo, 'label' => 'Pseudo', 'placeholder' => 'Quelque chose d\'unique, qui te caractérise !']);
	$form->addInput('age', 	TYPE_NUMBER, 	['value' => $Auth->User->age, 'label' => 'Quel age as-tu ?', 'min' => 16, 'max' => 99, 'step' => 1, 'placeholder' => 'Pour savoir quel joueur tu es']);
	$form->addInput('username',	TYPE_EMAIL, 	['value' => $Auth->User->username, 'label' => 'Adresse mail', 'placeholder' => 'Pour spammer ta boite mail chaque jour']);
	$form->addInput('password', TYPE_PASSWORD, 	['label' => 'Mot de passe', 'placeholder' => 'laissez vide pour ne pas le changer']);
	$form->addInput('city', TYPE_TEXT, 			['value' => $Auth->User->city, 'label' => 'Ville', 'placeholder' => 'Dans qu\'elle ville es-tu ?']);
	$form->addInput('domaines', TYPE_SELECT,	['label' => 'Domaines', 'data' => ['ingénieur du son' => 'ingénieur du son', 'chanteur' => 'chanteur', 'rappeur' => 'rappeur', 'beatmaker' => 'beatmaker', 'instrumentiste' => 'instrumentiste'], 'class' => 'select2', 'value' => 'jsp du tout']);
	$form->addInput('style', TYPE_SELECT, 		['label' => 'Ton style de musique préféré', 'data' => ['rap' => 'rap', 'variété' => 'variété', 'electro' => 'electro', 'reggae' => 'reggae', 'rock/métal' => 'rock/métal'], 'class' => 'select2', 'value' => 'jsp du tout']);
	$form->addInput('description', TYPE_TEXTAREA,[ 'label' => 'Description', 'placeholder' => 'laissez vide pour ne pas le changer', 'rows' => 8, 'class' => 'summernote']);
	$form->addInput('instagram', TYPE_TEXT, 	['value' => $Auth->User->instagram, 'label' => 'Instagram', 'placeholder' => 'Liens de ton Instagram*']);
	$form->addInput('facebook', TYPE_TEXT, 		['value' => $Auth->User->facebook, 'label' => 'Facebook', 'placeholder' => 'Liens de ton Facebook*']);
	$form->addInput('twitter', TYPE_TEXT, 		['value' => $Auth->User->twitter, 'label' => 'Twitter', 'placeholder' => 'Liens de ton Twitter*']);
	
	$form->setSubmit('Mettre à jour', ['color' => SUCCESS]);
	
	echo $form->form();
	?>
	<p>
	<?= $html->button(
		'&larr; Retour',
		['dir' => 'posts', 'page' => 'user', 'options' => ['id' => $Auth->User->id]],
		['color' => 'light']); ?>
	</p>
    </div>
</div>