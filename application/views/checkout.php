<div class="container mt-4">
    <h2 class="text-center">Checkout</h2>
    <?php if (empty($cart_items)): ?>
        <p class="text-center">Your cart is empty.</p>
    <?php else: ?>
        <form method="post" action="<?php echo site_url('home/place_order'); ?>">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($cart_items as $item): ?>
                        <tr>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo $item['description']; ?></td>
                            <td><?php echo number_format($item['price']); ?></td>
                            <td><?php echo isset($item['qty']) ? $item['qty'] : ''; ?></td> <!-- Validasi untuk memastikan 'qty' ada -->
                            <td><?php echo number_format($item['price'] * (isset($item['qty']) ? $item['qty'] : 1)); ?></td> <!-- Validasi untuk memastikan 'qty' ada -->
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                <label for="customer_name">Name:</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" required>
            </div>
            <div class="form-group">
                <label for="customer_address">Address:</label>
                <textarea class="form-control" id="customer_address" name="customer_address" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    <?php endif; ?>
</div>
