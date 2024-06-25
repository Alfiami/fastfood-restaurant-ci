<body class="login-register-page">
    <div class="container mt-5 menu-container" style="padding-top: 15px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="form-wrapper">
                    <div class="card">
                        <div class="card-header">
                            <?php if ($user): ?>
                                <h3 class="text-center mb-0">User Information</h3>
                            <?php else: ?>
                                <h3 class="text-center mb-0">Hello!</h3>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <?php if (!$user): ?>
                                <div id="login-form">
                                    <form id="login" method="post" action="<?= base_url('home/authentication'); ?>">
                                        <input type="hidden" name="action" value="login">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                                        <p class="text-center mt-3">Don't have an account? <a href="#" class="tab-btn" id="register-tab">Register here</a></p>
                                    </form>
                                </div>
                                <div id="register-form" style="display: none;">
                                    <form id="register" method="post" action="<?= base_url('home/authentication'); ?>" enctype="multipart/form-data">
                                        <input type="hidden" name="action" value="register">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control" placeholder="Username" required>                                         
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Email" required>                                           
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>                                           
                                        </div>
                                        <div class="form-group">
                                            <select name="gender" class="form-control" required>
                                                <option value="">Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>                                           
                                        </div>
                                        <div class="form-group">
                                            <textarea name="address" class="form-control" placeholder="Address" required></textarea>                                          
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                                        <p class="text-center mt-3">Already have an account? <a href="#" class="tab-btn" id="login-tab">Login here</a></p>
                                    </form>
                                </div>
                            <?php else: ?>
                                <div class="text-center">
                                    <!-- Formulir untuk memperbarui profil -->
                                    <form id="editProfileForm" method="post" action="<?= base_url('home/update_profile');?>" enctype="multipart/form-data">
                                        <input type="hidden" name="action" value="update">
                                        <div class="info-container">
                                            <div class="info-item">
                                                <label for="username">Name:</label>
                                                <input type="text" id="username" name="username" class="form-control" value="<?= $user->username;?>" required>
                                            </div>
                                            <div class="info-item">
                                                <label for="email">Email:</label>
                                                <input type="email" id="email" name="email" class="form-control" value="<?= $user->email;?>" required>
                                            </div>
                                            <div class="info-item">
                                                <label for="phone">Phone:</label>
                                                <input type="text" id="phone" name="phone" class="form-control" value="<?= $user->phone;?>" required>
                                            </div>
                                            <div class="info-item">
                                                <label for="gender">Gender:</label>
                                                <select id="gender" name="gender" class="form-control" required>
                                                    <option value="male" <?= ($user->gender == 'male') ? 'selected' : '';?>>Male</option>
                                                    <option value="female" <?= ($user->gender == 'female') ? 'selected' : '';?>>Female</option>
                                                </select>
                                            </div>
                                            <div class="info-item">
                                                <label for="address">Address:</label>
                                                <textarea id="address" name="address" class="form-control" required><?= $user->address;?></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary float-right mt-3">Update Profile</button>
                                        <a href="<?= base_url('home/logout');?>" class="btn btn-danger float-right mt-3 mr-2">Logout</a>
                                    </form>
                                    <!-- Akhir formulir pembaruan profil -->
                                </div>
                            <?php endif; ?>
                            <?php if ($this->session->flashdata('error')): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $this->session->flashdata('error'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($this->session->flashdata('success')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?= $this->session->flashdata('success'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var loginForm = document.getElementById('login-form');
            var registerForm = document.getElementById('register-form');
            var registerTab = document.getElementById('register-tab');
            var loginTab = document.getElementById('login-tab');

            if (registerTab && loginTab) {
                registerTab.addEventListener('click', function(event) {
                    event.preventDefault();
                    loginForm.style.display = 'none';
                    registerForm.style.display = 'block';
                });

                loginTab.addEventListener('click', function(event) {
                    event.preventDefault();
                    registerForm.style.display = 'none';
                    loginForm.style.display = 'block';
                });
            }
        });

    </script>
</body>
