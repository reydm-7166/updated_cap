<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Information</title>
    <link rel="stylesheet" href="../../../user_guide/_static/css/css/user_cartt.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<style>
    a:hover {
        color: white;

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
            <tr>
              <td>Alfreds Futterkiste</td>
              <td>Maria Anders</td>
              <td>Germany</td>
              <td>Mexico</td>
            </tr>
          </table>
          <h4 class="total">Total $20.00</h4>
          <button class="btn btn-success"><a href="user_home.html">Continue Shopping</a></button>
    </main>
    <section>
        <form action="" method="post">
            <div class="forms">
            <h2>Shipping Information</h2><br>
                First Name: <input type="text" name="ship_fname"><br>
                Last Name: <input type="text" name="ship_lname"><br>
                Address: <input type="text" name="ship_address"><br>
                Address 2: <input type="text" name="ship_address2"><br>
                City: <input type="text" name="ship_city"><br>
                State: <input type="text" name="ship_state"><br>
                Zipcode: <input type="text" name="ship_zipcode"><br>
            </div>


            <div class="forms" id="form2">
                <h2>Billing Information</h2><br>
                    <label>Same as Shipping Information: </label><input type="checkbox" id="checkbox" name="same" onchange="valueChanged()"><br>
                        <div id="hide">
                            First Name: <input type="text" name="ship_fname"><br>
                            Last Name: <input type="text" name="ship_lname"><br>
                            Address: <input type="text" name="ship_address"><br>
                            Address 2: <input type="text" name="ship_address2"><br>
                            City: <input type="text" name="ship_city"><br>
                            State: <input type="text" name="ship_state"><br>
                            Zipcode: <input type="text" name="ship_zipcode"><br>
                        </div>
                    Card: <input type="text" name="card"><br>
                    Security Card: <input type="text" name="sec_code"><br>
                <input type="submit" class="btn btn-primary" name="submit" value="Pay">
            </div>
        </form>
    </section>
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