<h2>Каталог</h2>

<div>
    <?php foreach ($catalog as $item): ?>
        <div>
            <img src="<?=$item['image']?>" alt="<?=$item['name']?>" width="200px"><br>
            <?=$item['name']?><br>
            Цена: <?=$item['price']?><br>
            <button>Купить</button>
            <hr>
        </div>
    <?php endforeach; ?>
</div>