<div class="container mt-4 menu-container" style="padding-top: 70px;">
    <h2 class="text-center">Order Details</h2>
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>
    <?php if (empty($order_details)): ?>
        <p class="text-center">No details found for this order.</p>
    <?php else: ?>
        <div class="card">
            <div class="card-header">
                Order #<?php echo $order['id']; ?>
            </div>
            <div class="card-body">
                <h5 class="card-title">Customer: <?php echo $order['customer_name']; ?></h5>
                <p class="card-text">Address: <?php echo $order['customer_address']; ?></p>
                <p class="card-text">Status: <?php echo ucfirst($order['status']); ?></p>
                <p class="card-text">Total Amount: <?php echo number_format($order['total_amount'], 2); ?></p>
                <h5>Order Items</h5>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Product</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($order_details as $item): ?>
                                <tr>
                                    <td><?php echo $item['product_name']; ?></td>
                                    <td><?php echo $item['product_description']; ?></td>
                                    <td><?php echo number_format($item['product_price'], 2); ?></td>
                                    <td><?php echo $item['quantity']; ?></td>
                                    <td><?php echo number_format($item['subtotal'], 2); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <a href="<?php echo site_url('home/orders'); ?>" class="btn btn-primary">Back to Orders</a>
            </div>
        </div>
    <?php endif; ?>
</div>
