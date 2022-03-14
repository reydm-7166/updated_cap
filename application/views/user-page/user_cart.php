<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Information</title>
    <link rel="stylesheet" href="../../../user_guide/_static/css/css/user_cart.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<style>
    a:hover {
        color: white;

    }
    #notifmain {
            width: 25%;
            position: absolute;
            top: 25rem;
            right: 10rem;
            text-align: center;
        }

</style>
<body>
    <?php $this->load->view('partials/nav_bar'); ?>
    
    <button class="btn btn-primary" id="back" onclick="history.back()">Go back</button>
    <main>
        <table>
            <tr>
              <th>Item</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
            </tr>
            <?php $total = 0; if(!empty($cart_items)) { foreach($cart_items as $data){ ?>
            <tr>
              <td><?= $data['item_name']?></td>
              <td><?= $data['item_price']?></td>
              <td><?= $data['item_quantity']?></td>
              <td><?= $data['item_total']?></td>
            </tr>
            <?php $total += $data['item_total']; }  }?>
          </table>
          <h4 class="total">Total: $<?= $total ?></h4>
          
          <button class="btn btn-success"><a href="/products">Continue Shopping</a></button>

        <?php if(isset($_SESSION['notice'])) {?>
            <div class="notification bg-success text-white rounded" id="notifmain">
                <p class="fs-1" id="notif"><?= $_SESSION['notice'] ?></p>
            </div>
        <?php } unset($_SESSION['notice']) ?>
    </main>
    <section>
        <form action="payment" method="post">
            <div class="forms">
            <h2>Shipping Information</h2><br>
                First Name: <input type="text" name="ship_fname"><br>
                Last Name: <input type="text" name="ship_lname"><br>
                Address: <input type="text" name="ship_address"><br>
                Address 2: <input type="text" name="ship_address2"><br>
                City: <input type="text" name="ship_city"><br>
                State: <input type="text" name="ship_state"><br>
                Zipcode: <input type="text" name="ship_zipcode"><br>
                <input type="hidden" name="total" value="<?= $total ?>">
            </div>


            <div class="forms" id="form2">
                <h2>Billing Information</h2><br>
                    <label>Same as Shipping Information: </label><input type="checkbox" id="checkbox" name="same" onchange="valueChanged()" value="on"><br>
                        <div id="hide">
                            First Name: <input type="text" name="bill_fname"><br>
                            Last Name: <input type="text" name="bill_lname"><br>
                            Address: <input type="text" name="bill_address"><br>
                            Address 2: <input type="text" name="bill_address2"><br>
                            City: <input type="text" name="bill_city"><br>
                            State: <input type="text" name="bill_state"><br>
                            Zipcode: <input type="text" name="bill_zipcode"><br>
                        </div>
                    Card: <input type="text" name="card"><br>
                    Security Card: <input type="text" name="sec_code"><br>
                <input type="submit" class="btn btn-primary" name="submit" value="Pay">
            </div>
        </form>
    </section>
    <?php if(validation_errors()) {
        echo "<script> alert('Please fill up the form properly') </script>";
        
    }?>
</body>
<script type="text/javascript">
    function valueChanged()
    {
        if($('#checkbox').is(":checked"))   
            $("#hide").hide();
        else
            $("#hide").show();
    }
</script>
</html>