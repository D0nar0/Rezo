<?php
// Menu
$html->addMenu('Présentation', 
    Router::urlView('games', 'presentation')
);

if ($Auth->logged) {
    $html->addMenu('Annuaire', Router::urlView('users', 'annuaire'));

    $html->addMenu('Actualité', Router::urlView('actu', 'actu'));

    if ($Auth->User->admin) {
        $html->addMenu('Dashboard', Router::urlView('admin', 'dashboard'));
    }
    $html->addMenu('Feed', Router::urlView('posts', 'feed'));
    $html->addMenu('Profil', Router::urlView('posts', 'user', ['id' => $Auth->User->id]));

    $html->addMenu('Déconnexion', Router::urlProcess('users', 'logout'));
}



$html->setDisplayRecherche(false);