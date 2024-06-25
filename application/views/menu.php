<div class="container mt-4 menu-container" style="padding-top: 70px;">
    <h2 class="text-center">Our Menu</h2>
    <div class="row">
        <?php 
        $menu_items = array(
            array('id' => 1, 'name' => 'Burger', 'description' => 'Beef burger with lettuce and tomato', 'price' => 50000, 'image' => 'burger.jpg'),
            array('id' => 2, 'name' => 'Fries', 'description' => 'Crispy golden fries', 'price' => 25000, 'image' => 'fried_chicken.jpg'),
            array('id' => 3, 'name' => 'Coke', 'description' => 'Refreshing Coca-Cola drink', 'price' => 15000, 'image' => 'cola.jpg'),
            array('id' => 4, 'name' => 'Chicken Nuggets', 'description' => 'Juicy chicken nuggets', 'price' => 30000, 'image' => 'nuggets.jpg'),
            array('id' => 5, 'name' => 'Ice Cream', 'description' => 'Creamy vanilla ice cream', 'price' => 20000, 'image' => 'ice_cream.jpg'),
            array('id' => 6, 'name' => 'Salad', 'description' => 'Fresh garden salad', 'price' => 35000, 'image' => 'salad.jpg'),
            array('id' => 7, 'name' => 'Pizza', 'description' => 'Cheesy pepperoni pizza', 'price' => 75000, 'image' => 'pizza.jpg'),
            array('id' => 8, 'name' => 'Spaghetti', 'description' => 'Classic Italian spaghetti', 'price' => 60000, 'image' => 'spaghetti.jpg'),
            array('id' => 9, 'name' => 'Smoothie', 'description' => 'Fruit smoothie', 'price' => 40000, 'image' => 'smoothie.jpg')
        );
        foreach ($menu_items as $item): ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="<?php echo base_url('assets/img/') . $item['image']; ?>" class="card-img-top" alt="<?php echo $item['name']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item['name']; ?></h5>
                        <p class="card-text"><?php echo $item['description']; ?></p>
                        <p class="card-text"><strong>Price:</strong> Rp <?php echo number_format($item['price']); ?></p>
                        <div class="btn-group" role="group">
                            <?php if ($this->session->userdata('logged_in')): ?>
                                <form method="post" action="<?php echo site_url('home/add_to_cart/') . $item['id']; ?>">
                                    <input type="hidden" name="name" value="<?php echo $item['name']; ?>">
                                    <input type="hidden" name="description" value="<?php echo $item['description']; ?>">
                                    <input type="hidden" name="price" value="<?php echo $item['price']; ?>">
                                    <input type="hidden" name="image" value="<?php echo $item['image']; ?>">
                                    <input type="hidden" name="qty" value="1">
                                    <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                                </form>
                                <form method="post" action="<?php echo site_url('home/buy_now/') . $item['id']; ?>">
                                    <input type="hidden" name="name" value="<?php echo $item['name']; ?>">
                                    <input type="hidden" name="description" value="<?php echo $item['description']; ?>">
                                    <input type="hidden" name="price" value="<?php echo $item['price']; ?>">
                                    <input type="hidden" name="image" value="<?php echo $item['image']; ?>">
                                    <input type="hidden" name="qty" value="1">
                                    <button type="submit" class="btn btn-outline-success btn-sm"><i class="fas fa-credit-card"></i> Buy Now</button>
                                </form>
                            <?php else: ?>
                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="alert('You need to register or login to add items to your cart.');"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                                <button type="button" class="btn btn-outline-success btn-sm" onclick="alert('You need to register or login to buy now.');"><i class="fas fa-credit-card"></i> Buy Now</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>