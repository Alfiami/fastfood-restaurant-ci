<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Food Restaurant</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/style.css'); ?>">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">FastFood</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item <?php echo $this->uri->segment(1) === 'home' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo base_url('home'); ?>">Home</a>
                </li>
                <li class="nav-item <?php echo $this->uri->segment(1) === 'about' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo base_url('about'); ?>">About</a>
                </li>
                <li class="nav-item <?php echo $this->uri->segment(1) === 'contact' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo base_url('contact'); ?>">Contact</a>
                </li>
                <li class="nav-item <?php echo $this->uri->segment(1) === 'menu' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo base_url('menu'); ?>">Menu</a>
                </li>
                <li class="nav-item <?php echo $this->uri->segment(1) === 'orders' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo base_url('orders'); ?>">Orders</a>
                </li>
            </ul>
            <ul class="navbar-nav">               
                <li class="nav-item">
                    <form class="form-inline" action="<?php echo base_url('home/search'); ?>" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control border-right-0" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" name="query">
                        </div>
                    </form>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link" href="#"><i class="fas fa-search"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item <?php echo $this->uri->segment(1) === 'cart' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo base_url('cart'); ?>"><i class="fas fa-shopping-cart"></i></a>
                </li>
                <li class="nav-item mr-3">
                    <?php if ($this->session->userdata('logged_in')): ?>
                        <a class="nav-link" href="<?php echo base_url('register'); ?>"><i class="fas fa-user" style="margin-right: 8px;"></i></a>
                    <?php else: ?>
                        <a class="nav-link" href="<?php echo base_url('register'); ?>"><i class="fas fa-user" style="margin-right: 8px;"></i>Login</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </nav>
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
