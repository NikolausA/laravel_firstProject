<?php include "../menu.php"; ?>
<h1>Новости</h1>
<?php //dump($news) ?>
<?php foreach ($news as $item): ?>
    <a href="<?=route('oneNews', $item['id'])?>"><?=$item['title']?></a><br>
<?php endforeach; ?>
