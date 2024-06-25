<div class="container mt-4 menu-container">
    <div style="padding-top: 70px;">
        <h2 class="text-center mb-4">My Orders</h2>
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
        <?php if (empty($orders)): ?>
            <p class="text-center">You have no orders.</p>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Customer Name</th>
                            <th>Address</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?php echo $order['customer_name']; ?></td>
                                <td><?php echo $order['customer_address']; ?></td>
                                <td>$<?php echo number_format($order['total_amount'], 2); ?></td>
                                <td><?php echo ucfirst($order['status']); ?></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="<?php echo site_url('home/order_details/'.$order['id']); ?>" class="btn btn-info btn-sm">View Details</a>                                       
                                        <?php if ($order['status'] == 'pending'): ?>
                                            <a href="<?php echo site_url('home/cancel_order/'.$order['id']); ?>" class="btn btn-danger btn-sm">Cancel Order</a>
                                            <a href="<?php echo site_url('home/pay_order/'.$order['id']); ?>" class="btn btn-success btn-sm">Pay Now</a>
                                        <?php elseif ($order['status'] == 'completed'): ?>
                                            <span class="badge badge-success">Completed</span>
                                        <?php elseif ($order['status'] == 'cancelled'): ?>
                                            <span class="badge badge-secondary">Cancelled</span>
                                        <?php endif; ?>                                       
                                        <a href="<?php echo site_url('home/delete_order/'.$order['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this order?');">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>
