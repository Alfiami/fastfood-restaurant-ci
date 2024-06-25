<div class="container mt-4 menu-container" style="padding-top: 70px;">
    <h2 class="text-center">Shopping Cart</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($cart_items as $item) : ?>
                        <tr>
                            <td><?php echo isset($item['name']) ? $item['name'] : ''; ?></td>
                            <td><?php echo isset($item['description']) ? $item['description'] : ''; ?></td>
                            <td>Rp <?php echo isset($item['price']) ? number_format($item['price']) : ''; ?></td>
                            <td><?php echo isset($item['qty']) ? $item['qty'] : ''; ?></td>
                            <td>Rp <?php echo isset($item['price']) && isset($item['qty']) ? number_format($item['price'] * $item['qty']) : ''; ?></td>
                            <td>
                                <?php if (isset($item['id'])) : ?>
                                    <a href="<?php echo base_url('home/delete_from_cart/') . $item['id']; ?>" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i> Remove</a>
                                <?php else : ?>
                                    <span class="text-danger">ID not available</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                        <tr>
                            <td colspan="4" class="text-right"><strong>Total Amount</strong></td>
                            <td><strong>Rp <?php echo isset($total_amount) ? number_format($total_amount) : ''; ?></strong></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                <a href="<?php echo base_url('home/checkout'); ?>" class="btn btn-success">Proceed to Checkout</a>
            </div>
        </div>
    </div>
</div>
<script>
    function deleteItem(itemId) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo base_url('home/delete_from_cart/'); ?>' + itemId);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                var row = document.getElementById('item_row_' + itemId);
                row.parentNode.removeChild(row);
            } else {
                console.log('Failed to delete item from cart.');
            }
        };
        xhr.send();
    }
    function incrementQuantity(itemId) {
        var quantityElement = document.getElementById('quantity_' + itemId);
        var currentQuantity = parseInt(quantityElement.innerText);
        quantityElement.innerText = currentQuantity + 1;
    }
    function decrementQuantity(itemId) {
        var quantityElement = document.getElementById('quantity_' + itemId);
        var currentQuantity = parseInt(quantityElement.innerText);
        if (currentQuantity > 1) {
            quantityElement.innerText = currentQuantity - 1;
        }
    }
</script>
<style>
    body {
        background-color: #f0f0f0;
    }
</style>
