<?php 
    $cart_items = $this->session->userdata('count');
    foreach($cart_items as $count){ 
    ?> 
    <nav>
        <h2>Dojo E-commerce</h2>
        <h3 id="cart"><a href="/shopping-cart">Shopping Cart (<?= $count['count']; ?>)</a></h3>
    </nav>  
<?php } ?>