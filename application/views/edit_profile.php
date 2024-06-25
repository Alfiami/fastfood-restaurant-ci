<!-- edit_profile.php -->
<body class="login-register-page">
    <div class="container mt-5 menu-container" style="padding-top: 15px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="form-wrapper">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center mb-0">Edit Profile</h3>
                        </div>
                        <div class="card-body">
                            <form id="editProfileForm" method="post" action="<?= base_url('home/update_profile');?>" enctype="multipart/form-data">
                                <input type="hidden" name="action" value="update">
                                <div class="profile-picture">
                                    <img src="<?= base_url('uploads/'. $user->profile_picture);?>" alt="Profile Picture" class="img-thumbnail rounded-circle mb-3">
                                    <input type="file" name="profile_picture" class="form-control">
                                </div>
                                <div class="info-container">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" id="username" name="username" class="form-control" value="<?= $user->username;?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control" value="<?= $user->email;?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" id="phone" name="phone" class="form-control" value="<?= $user->phone;?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select id="gender" name="gender" class="form-control" required>
                                            <option value="male" <?= ($user->gender == 'male') ? 'selected' : '';?>>Male</option>
                                            <option value="female" <?= ($user->gender == 'female') ? 'selected' : '';?>>Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea id="address" name="address" class="form-control" required><?= $user->address;?></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-right mt-3">Update Profile</button>
                                <a href="<?= base_url('home/logout');?>" class="btn btn-danger float-right mt-3 mr-2">Logout</a>
                            </form>
                            <?php if ($this->session->flashdata('error')): ?>
                                <div class="alert alert-danger mt-3" role="alert">
                                    <?= $this->session->flashdata('error'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($this->session->flashdata('success')): ?>
                                <div class="alert alert-success mt-3" role="alert">
                                    <?= $this->session->flashdata('success'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
