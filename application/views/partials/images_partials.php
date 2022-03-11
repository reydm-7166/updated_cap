
<div id="quotes1">
<?php foreach($images_data as $item){ ?>

    <div class="item_image m-3">
        <a href="products/show/<?= $item['id'] ?>"><img src="" alt="dummy"></a> 
        <p class="price">Price: <?= $item['item_price'] ?></p>
        <p><?= $item['item_name'] ?></p>
    </div>
    
    <?php } ?>
</div>