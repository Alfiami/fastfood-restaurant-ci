<div class="jumbotron text-center">
    <h1 class="animated-text">Selamat Datang di Fast Food Restaurant</h1>
    <p class="animated-text">Makanan cepat saji terbaik di kota dengan layanan yang cepat dan ramah.</p>
</div>
<div class="container">
    <h2>Menu Terlaris</h2>
    <div class="row">
        <!-- card menu -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="<?= base_url('assets/img/burger.jpg'); ?>" class="card-img-top" alt="Burger">
                <div class="card-body position-relative">
                    <h5 class="card-title">Burger</h5>
                    <p class="card-text">Burger lezat dengan daging sapi asli dan sayuran segar.</p>
                    <div class="rating-wrapper">
                        <span class="star">&#9733;</span>
                        <span class="rating">4.0</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="<?= base_url('assets/img/pizza.jpg'); ?>" class="card-img-top" alt="Pizza">
                <div class="card-body position-relative">
                    <h5 class="card-title">Pizza</h5>
                    <p class="card-text">Pizza dengan topping keju dan pepperoni yang melimpah.</p>
                    <div class="rating-wrapper">
                        <span class="star">&#9733;</span>
                        <span class="rating">4.7</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="<?= base_url('assets/img/fried_chicken.jpg'); ?>" class="card-img-top" alt="Fried Chicken">
                <div class="card-body position-relative">
                    <h5 class="card-title">Fried Chicken</h5>
                    <p class="card-text">Ayam goreng renyah dengan bumbu rahasia kami.</p>
                    <div class="rating-wrapper">
                        <span class="star">&#9733;</span>
                        <span class="rating">4.6</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- akhir card menu -->
    </div>
    <div class="text-center mt-4">
        <a href="<?= base_url('menu'); ?>" class="btn btn-primary">See More</a>
    </div>
</div>
<div class="container mt-5">
    <h2>Testimoni Pelanggan</h2>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="profile">
                                        <img src="assets/img/profil2.jpg" alt="Profil Picture">
                                        <span class="name custom-font">Dian Marwah Humaira</span>
                                    </div>
                                    <div class="rating">
                                        <span>&#9733;</span>
                                        <span>&#9733;</span>
                                        <span>&#9733;</span>
                                        <span>&#9733;</span>
                                        <span>&#9733;</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text">"Saya sangat menyukai burger disini. Dagingnya selalu segar dan juicy, serta rotinya selalu lembut dan empuk. Rasanya selalu konsisten enak setiap kali saya makan di sana. Ditambah lagi, mereka memiliki berbagai pilihan topping yang membuat burger menjadi lebih menarik, seperti saus spesial dan keju leleh yang melimpah."</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="carousel-item">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="profile">
                                        <img src="assets/img/profil1.jpg" alt="Profil Picture">
                                        <span class="name custom-font">Zendigo Igo Putra</span>
                                    </div>
                                    <div class="rating">
                                        <span>&#9733;</span>
                                        <span>&#9733;</span>
                                        <span>&#9733;</span>
                                        <span>&#9733;</span>
                                        <span>&#9733;</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text">"Fries disini adalah yang terbaik! Mereka selalu garing di luar dan lembut di dalamnya. Saya suka bagaimana mereka memberikan porsi yang besar dengan harga yang terjangkau. Tidak hanya itu, tetapi mereka juga menawarkan opsi untuk menambahkan berbagai bumbu seperti garam, lada, atau bahkan saus BBQ, memberikan variasi rasa yang menyenangkan setiap kali saya makan di sana"</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="profile">
                                        <img src="assets/img/profil4.jpg" alt="Profil Picture">
                                        <span class="name custom-font">Putri Cantika</span>
                                    </div>
                                    <div class="rating">
                                        <span>&#9733;</span>
                                        <span>&#9733;</span>
                                        <span>&#9733;</span>
                                        <span>&#9733;</span>
                                        <span>&#9733;</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text">"Pelayanan selalu ramah dan cepat. Saya selalu senang dengan pengalaman pelanggan saya setiap kali mengunjungi mereka. Para stafnya selalu terlihat senang membantu dan siap melayani dengan baik, sehingga saya merasa dihargai sebagai pelanggan."</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- akhir card testimoni -->
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<div class="container mt-5">
    <h2>Berita dan Acara</h2>
    <div class="card no-hover-card">
        <div class="card-body">
            <h5 class="card-title">Grand Opening Cabang Baru!</h5>
            <div class="row">
                <div class="col-md-8">
                    <p class="card-text">Kami dengan bangga mengumumkan pembukaan cabang baru kami di Jalan Sudirman, salah satu kawasan paling strategis dan ramai di kota ini. Cabang terbaru ini dirancang untuk memberikan pengalaman belanja yang lebih nyaman dan menyenangkan bagi para pelanggan setia kami. Dengan fasilitas modern dan staf yang ramah, kami berharap dapat melayani Anda dengan lebih baik dan memenuhi semua kebutuhan Anda.</p>
                </div>
                <div class="col-md-4">
                    <img src="assets/img/berita.jpg" alt="Grand Opening Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <!-- Garis panjang -->
    <hr class="custom-hr my-4">
    <!-- Kartu baru -->
    <div class="card no-hover-card">
        <div class="card-body">
            <h5 class="card-title">Diskon 50% di Bulan Juni</h5>
            <div class="row">
                <div class="col-md-8">
                    <p class="card-text">Nikmati diskon besar-besaran selama bulan Juni di semua cabang kami dengan potongan harga hingga 50%! Ini adalah kesempatan yang tidak boleh Anda lewatkan untuk mendapatkan produk-produk favorit Anda dengan harga yang lebih terjangkau. Segera kunjungi toko terdekat dan manfaatkan promo spesial ini sebelum waktunya habis. Ayo, jadikan bulan Juni lebih ceria dengan belanja hemat bersama kami!</p>
                </div>
                <div class="col-md-4">
                    <img src="assets/img/sale.jpg" alt="Diskon 50% Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>