
<div id="quotes1">
<?php foreach($images_data as $item){ ?>

    <div class="item_image border border-2 rounded m-3">
        <a href="products/show/<?= $item['id'] ?>"><img src="../../../uploads/<?= $item['image'] ?>" alt="dummy"></a> 
        <p class="price"><i>Price: $<?= $item['item_price'] ?></i></p>
        <h5><?= $item['item_name'] ?></h5>
    </div>
    
    <?php } ?>
</div>