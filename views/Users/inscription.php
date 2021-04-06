<div class="starter-template text-center mt-5 px-3">
	<h1>Inscription</h1>
	<p class="lead">Merci de remplir le formulaire ci-dessous.</p>
</div>

<div class="row justify-content-center">
	<div class="col col-sm-8 col-lg-4">
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
	
	$form->setSubmit('Je m\'inscris', ['color' => SUCCESS]);
	
	echo $form->form();
	?>
	<p> * Veuillez indiquer vos réseaux, en inscrivant leurs liens (si vous en avez pas veuillez ne rien remplir)</p>
    <hr />
    <p class="lead text-center">Déjà inscrit ?</p>
    <p class="text-center"><?= $html->button('Connexion', ['dir' => 'users', 'page' => 'connexion'], ['color' => WARNING]); ?></p>
	</div>
</div>