<div class="starter-template text-center mt-5 px-3">
	<h1 class="mb-3">Le feed de <?= $_member->pseudo; ?></h1>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="true" href="#">Informations</a>
                </ul>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?= $_member->pseudo; ?> </h5>
                <p class="card-text">Nom : <?= $_member->surname; ?>     Prénom : <?= $_member->name; ?> </p>
                <p class="card-text">Age : <?= $_member->age; ?></p>
                <p id="underline"  class="card-text">Ville : <?= $_member->city; ?> </p>
                <p class="card-text">Domaine : <?= $_member->domaines; ?> </p>
                <p class="card-text">Style : <?= $_member->style; ?></p>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="true" href="#">Description</a>
                </ul>
            </div>
            <div class="card-body">
                <p class="card-text"><?= $_member->description; ?></p>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="true" href="#">Réseaux Sociaux</a>
                </ul>
            </div>
            <div class="card-body">
                <h5 class="card-title">Contacter moi ici !</h5>
                <a href="<?= $_member->facebook; ?>"><img src="assets/img/facebook.png" alt="Facebook" height="30" style="margin : 5px;"></a>
                <a href="<?= $_member->instagram; ?>"><img src="assets/img/instagram.png" alt="Instagram" height="30" style="margin : 5px;"></a>
                <a href="<?= $_member->description; ?>"><img src="assets/img/twitter.png" alt="Twitter" height="30" style="margin : 5px;"></a>
                <a href="mailto:<?= $_member->username; ?>"><img src="assets/img/mail.png" alt="Mail" height="30" style="margin : 5px;"></a>
            </div>
            </div>
        </div>
    </div>
</div>
<div class="container" id="relative">
    <div class="row justify-content-center mt-5">
	    <div class="col col-sm-8">
        <?php
        if ($_member->id == $Auth->User->id ) {
            ?>
            <div class="card-footer mt-3">
                <?= $html->button(
                'parametres',
                ['dir' => 'users', 'page' => 'parametre'],
                ['color' => SUCCESS, 'class' => 'btn-sm']); ?>
            </div>
        <?php

        }

        foreach ($_member->LastPostsAndComments as $postOrComment) {

            if (is_a($postOrComment['data'], 'Post')) {
                $post = $postOrComment['data'];
                include(DIR_VIEWS . 'Elements/post_seul.php');
            }

            if (is_a($postOrComment['data'], 'Comment')) {
                $comment = $postOrComment['data'];
                include(DIR_VIEWS . 'Elements/comment_seul.php');
            }
        }
        ?>
        </div>
    </div>
</div>