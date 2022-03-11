<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Information</title>
    <link rel="stylesheet" href="../../../user_guide/_static/css/css/user_item_details.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
         * {
        box-sizing: border-box;
        }
        h2 {
            display: inline-block;
        }
        #cart {
            position: absolute;
            top: 1rem;
            right: 10rem;
        }
        a {
            color: white;
            text-decoration: none;
        }
        a:hover {
            color: white;
        }
        nav {
            background-color: red;
            padding: 1rem
        }
        form {            
            font-size: 1.2rem;
            position: absolute;
            right: 25rem;
        }
        .notification {
            height: 10vh;
            width: 30%;
            margin: auto;
            outline: black 1px solid;
            text-align: center;
            padding: 1rem;
        }
        #back {
        position: absolute;
        top: 6rem;
        left: 2rem;
    }
    </style>
</head>
<body>
    <?php $this->load->view('partials/nav_bar'); ?>  
    
    <a id="back" href="/products" class="btn btn-primary">Go back</a>
    <?php 
        foreach($item_info as $item){ ?>
    <main>
        <img src="<?= $item['image'] ?>" alt="none yet">
    </main>
    <section>
       <p><?= $item['item_description'] ?></p>
    </section>

    <form action="/Add_items/add_cart" method="post">
        <input type="submit" value="Buy">
        <input type="hidden" name="item_id" value="<?= $item['id']; ?>">
        <select name="quantity">
            <option value="1">1 - $<?php echo ($item['item_price'] * 1); ?></option>
            <option value="2">2 - $<?php echo ($item['item_price'] * 2); ?></option>
            <option value="3">3 - $<?php echo ($item['item_price'] * 3); ?></option>
        </select>
        <input type="hidden" name="item_price" value="<?= $item['item_price'] ?>">
    </form>
    <?php } ?>

    <?php if(isset($_SESSION['added_cart'])) {?>
    <div class="notification bg-success text-white rounded" id="notif">
        <p class="fs-1"><?= $_SESSION['added_cart'] ?></p>
    </div>
    <?php } unset($_SESSION['added_cart']);?>
</body>

</html>