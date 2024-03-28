<?php

?>

<h1>Tous les films</h1>

<?php foreach ($movies as $movie): ?>
    <div>
        <?= $this->Html->link(__($movie->title), ['action' => 'details', $movie->id]) ?>
    </div>
<?php endforeach; ?>