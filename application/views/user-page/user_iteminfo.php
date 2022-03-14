<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Information</title>
    <link rel="stylesheet" href="../../../user_guide/_static/css/css/user_item_details.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        img {
            object-fit: cover;
            margin: 1.5rem 1rem 0 0;
        }
        main {
            height: 50vh;
            width: 22%;
            border: 1px solid black;
            margin: 5rem 2rem 2rem 2rem;
            display: inline-block;
            vertical-align: top;
            padding: 0;
        }
        section {
            display: inline-block;
            height: 60vh;
            width: 60%;
            border: 1px solid black;
            margin: 2rem 0 3rem; 
        }
        img {
            height: 416px;
            width: 416px;
        }
        
    </style>
</head>
<body>
    <?php $this->load->view('partials/nav_bar'); ?>  
    
    <a id="back" href="/products" class="btn btn-primary">Go back</a>
    <?php 
        foreach($item_info as $item){ ?>
    <main class=" border border-1 rounded-3">
        <img src="../../../uploads/<?= $item['image'] ?>" alt="">
    </main>
    <section class=" border border-2 rounded-4">
       <p><b><i><?= $item['item_description'] ?></i></b><br><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat qui laborum quaerat facilis mollitia autem voluptas dolorem sint sunt neque ratione natus officia hic, sit id, ipsum earum cum ex.
       Unde sed saepe dicta impedit vitae non voluptatum at modi magni error. Dolor nihil vitae, hic quas omnis voluptatum voluptatibus eos animi, voluptatem iure molestiae deserunt sunt ipsum officia laudantium?
       Laborum minus ab repellat quod odit fugiat nostrum corrupti consequatur a facilis accusantium ut soluta inventore illum commodi dolorum alias, quos velit perferendis. Necessitatibus maxime officia, dignissimos rerum rem doloremque.
       Tempore quas cupiditate nisi aliquid exercitationem ad eligendi ullam corporis amet tempora omnis sequi numquam, nobis eos, autem eum quia deleniti maxime distinctio voluptate. Asperiores totam in deserunt earum odit!
       Voluptas unde, esse ad veritatis porro ut voluptate vel a minima possimus sint, iusto et. Blanditiis cum commodi velit harum dicta, tenetur cumque obcaecati odio culpa eos impedit est tempora.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat qui laborum quaerat facilis mollitia autem voluptas dolorem sint sunt neque ratione natus officia hic, sit id, ipsum earum cum ex.
       Unde sed saepe dicta impedit vitae non voluptatum at modi magni error. Dolor nihil vitae, hic quas omnis voluptatum voluptatibus eos animi, voluptatem iure molestiae deserunt sunt ipsum officia laudantium?
       Laborum minus ab repellat quod odit fugiat nostrum corrupti consequatur a facilis accusantium ut soluta inventore illum commodi dolorum alias, quos velit perferendis. Necessitatibus maxime officia, dignissimos rerum rem doloremque.
       Tempore quas cupiditate nisi aliquid exercitationem ad eligendi ullam corporis amet tempora omnis sequi numquam, nobis eos, autem eum quia deleniti maxime distinctio voluptate. Asperiores totam in deserunt earum odit!
       Voluptas unde, esse ad veritatis porro ut voluptate vel a minima possimus sint, iusto et.</p>
    </section>

    <form action="/Add_items/add_cart" method="post">
        <input type="submit" value="Buy">
        <input type="hidden" name="item_id" value="<?= $item['id']; ?>">
        <select name="quantity">
            <option value="1">1 - $<?php echo ($item['item_price'] * 1); ?></option>
            <option value="2">2 - $<?php echo ($item['item_price'] * 2); ?></option>
            <option value="3">3 - $<?php echo ($item['item_price'] * 3); ?></option>
        </select>
        <input id="submit" type="hidden" name="item_price" value="<?= $item['item_price'] ?>">
    </form>
    <?php } ?>

    <?php if(isset($_SESSION['added_cart'])) {?>
    <div class="notification bg-success text-white rounded" id="notif">
        <p class="fs-1" id="notif"><?= $_SESSION['added_cart'] ?></p>
    </div>
    <?php } unset($_SESSION['added_cart']);?>
    
</body>
</body>

</html>