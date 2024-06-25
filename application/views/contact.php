<div class="container mt-4" style="padding-top: 70px;">
    <div class="row">
        <div class="col-md-6">
            <h3 class="contact-title text-center mb-4">Online Inquiry</h3>         
            <?php if($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>
            <?php if($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>
            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            <form action="<?php echo base_url('home/save_message'); ?>" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" placeholder="Enter your message"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
        <div class="col-md-6">
            <h3 class="contact-title text-center mb-4">Our Contact Details</h3>
            <div class="text-center">
                <p><span class="contact-label">Address:</span> Jl. Jendral Sudirman 123</p>
                <p><span class="contact-label">Phone:</span> +123 456 7890</p>
                <p><span class="contact-label">Email:</span> fastfood@gmail.com</p>
                <p><span class="contact-label">Website:</span> www.fastfood.com</p>
                <p><span class="contact-label">Customer Service:</span> 24/7 Support: 0800-123-4567 (Gratis)</p>
                <p><span class="contact-label">Layanan Pengiriman:</span> Nikmati layanan pengiriman kami di wilayah sekitar dengan pesanan minimal Rp 50.000.</p>               
                <h3>Follow Us</h3>
                <p>
                    <a href="https://www.instagram.com/alfiamii/" class="btn btn-social-icon btn-facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/alfiamii/" class="btn btn-social-icon btn-twitter"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/alfiamii/" class="btn btn-social-icon btn-instagram"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.instagram.com/alfiamii/" class="btn btn-social-icon btn-linkedin"><i class="fab fa-linkedin-in"></i></a>
                </p>
            </div>
        </div>
    </div>
</div>
