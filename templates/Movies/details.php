<h1><?= $movie->title ?></h1>

<?php 
$genreNames = [];
foreach ($movie->genres as $genre) {
    $genreNames[] = $genre->genre;
}
$echoGenre = implode(' - ', $genreNames);

?>
<h4><?= $echoGenre ?></h4>

<p><?= $movie->synopsis ?></p>

<i class="fa-regular fa-eye"></i>
<i class="fa-solid fa-eye"></i>
<i class="fa-regular fa-heart"></i>
<i class="fa-solid fa-heart"></i>
<i class="fa-regular fa-clock"></i>
<i class="fa-solid fa-clock"></i>

<?php if($this->request->getAttribute('identity')->role == 'admin'): ?>
  <?= $this->Html->link('Edit', ['action' => 'edit', $movie->id], ['class' => 'button']) ?>
<?php endif ?>

<?php if($this->request->getAttribute('identity')->role == 'admin'): ?>
  <?= $this->Form->postLink('Delete', ['action' => 'delete', $movie->id], ['class' => 'button', 'confirm' => 'êtes vous sur ?']) ?>
<?php endif ?>
