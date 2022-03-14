<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../user_guide/_static/css/css/user_home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Home</title>
    <style>
        .items {
            border-width:0px;
            border:none;
            background-color: white;
            color: blue;
            border-bottom: .5px solid black;
            padding-bottom: 5px; 
        }
        section {
            display: inline-block;
            vertical-align: top;
            border: 1px solid black;
            margin: 2rem 0 0 5rem;
            width: 70%;
            height: 88vh;
        }
        
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
        .categories a {
            color: blue;
            border-bottom: .5px solid black;
            padding-bottom: 5px; 
        }

        main {
            display: inline-block;
            height: 50vh;
            width: 23%;
            margin: 1rem;
        }
        p {
            display: block;
        }
        .item_image {
            border: 1px solid black;
            width: 20%;
            padding-left: 1rem;
            display: inline-block;
        }
            .item_image .price {
                position: relative;
                left: 9rem;
            }
    </style>
</head>
<body>
    <?php $this->load->view('partials/nav_bar'); ?>
    
    <main>
        <div class="details mt-5 p-2">
            <form id="search" action="" method="post">
                <input type="text" name="search" placeholder="Search...">
                <input type="submit" name="submit" value="Submit">
            </form>
            <h2 class="mt-4">Categories</h2>

            <div class="categories mt-4" id="category">
                <?php 
                    foreach($information as $item){     
                ?>
                <form id="category" action="products/by-category" method="post">
                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                    <h3 class="mt-3"><input class="items" type="submit" value="<?= $item['category_name']?> (<?= $item['count']?>)"></h3>
                </form><?php } ?>

                <h3 class="mt-3" id="all"><a id="all" href="">Show All</a></h3>
            </div>
        </div>
    </main>
    <section class="p-5 border border-success rounded-3">
        <h1>T-Shirts (page 1)</h1>
        <h3>Sorted By:</h3>
            <div id="images">

            </div>
    </section>
</body>
    <script>
     $(document).ready(function(){

      $.get('/Items/show_all', function(res) {
          $('#images').html(res);
        });
        
        $('form').submit(function(){
          $.post('products/by-category', $(this).serialize(), function(res) {
            $('#images').html(res);
          });
          return false;
        });

        $('#all').click(function(){
          $.post('Items/show_all', function(res) {
            $('#images').html(res);
          });
          return false;
        });
     });
   </script>
</html>