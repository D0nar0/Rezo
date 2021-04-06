<div class="starter-template text-center mt-5 px-3">
	<h1 class="mb-3">Actualité</h1>
</div>

<div id="relative" class="row justify-content-center mt-5">
	<div class="col col-sm-8">
	<?php
        if ($Auth->User->admin == 1) {
			?>
			<h2>Ajouter un article</h2>
			<?php
            $form = new BootstrapForm('Nouvelle article', 'Actu', METHOD_POST);
    
            // $form->addInput('user_id', TYPE_HIDDEN, ['value' => $Auth->User->id]);
            $form->addInput('title',	TYPE_TEXT, 	['label' => 'Titre', 'placeholder' => 'Pour décrire de quoi tu parle']);
        
            // A coder dans BootstrapForm
            $form->addInput('content', 	TYPE_TEXTAREA, 	['label' => 'Contenu', 'rows' => 8, 'class' => 'summernote']);
        
            $form->setSubmit('Je publie', ['color' => DANGER]);
        
            echo $form->form();
        }
	foreach ($_actu as $actu): ?>
    <br/>
    <br/>
	<div class="card mb-5" id="post_<?= $actu->id; ?>">
		<div class="card-header">

			<div class="row">
				<div class="col-8">
					Le <?= date('d/m/Y', strtotime($actu->created)); ?> 
					</a>
				</div>
				<div class="col-2">
				</div>
			</div>
			
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col col-sm-8">
		    		<h5 class="card-title"><?= $actu->title; ?></h5>
		    		<p class="card-text"><?= $html->toHtml($actu->content) ;?></p>
		    	</div>
		    </div>
	    </div>

		
	    <!-- <div class="card-footer mt-3">
	    	<?= $html->button(
				'Voir le forum',
				['dir' => 'posts', 'page' => 'one', 'options' => ['id' => $actu->id]],
				['color' => SUCCESS, 'class' => 'btn-sm']); ?>
	    </div> -->
	</div>
	<?php endforeach; ?>
	</div>
</div>