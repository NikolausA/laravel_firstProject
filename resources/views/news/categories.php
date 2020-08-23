<?php //include "../menu.php"; ?>
<h2>Категории новостей</h2>
<?php //dump($categories); ?>
<?php foreach ($categories as $item): ?>
    <a href="<?=route('selected', ['id' => $item['id'], 'name' => $item['name']])?>"><?=$item['name']?></a><br>
<?php endforeach; ?>
