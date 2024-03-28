<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'letterboxD';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake', 'all.min']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Letter</span>boxD</a>
        </div>
        <div class="top-nav-links">
            <?= $this->Html->link('<i class="fa-solid fa-house"></i> Voir les films', ['controller' => 'Movies', 'action' => 'index'], [
                'escape' => false,
                'class' => ($this->templatePath == 'Movies' && $this->template == 'index') ? 'active' : ''
            ]) ?>


            <?php if($this->request->getAttribute('identity') == null) : ?>

                <?= $this->Html->link('Créer un compte', ['controller' => 'Users', 'action' => 'signup'], ['escape' => false, 'class' => ($this->templatePath == 'Users' && $this->template == 'signup') ? 'active' : ''] ) ?>
                <?= $this->Html->link('Se connecter', ['controller' => 'Users', 'action' => 'login'], ['escape' => false, 'class' => ($this->templatePath == 'Users' && $this->template == 'login') ? 'active' : ''] ) ?>

            <?php else : ?>

                <?= $this->Html->link('<i class="fa-solid fa-plus"></i> Nouveau film', ['controller' => 'Movies', 'action' => 'add'], ['escape' => false, 'class' => ($this->templatePath == 'Movies' && $this->template == 'add') ? 'active' : ''] ) ?>
                <?= $this->Html->link('Se déconnecter '.
                $this->request->getAttribute('identity')->pseudo.' ', ['controller' => 'Users', 'action' => 'logout'], ['escape' => false]) ?>

            <?php endif; ?>

        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
    <script src="https://kit.fontawesome.com/a074af59b6.js" crossorigin="anonymous"></script>
</body>
</html>
