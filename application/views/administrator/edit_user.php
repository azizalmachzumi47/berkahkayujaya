<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h3 class="text-center"><?= $title; ?></h3>

                <div class="card-body">
                    <form id="form" action="<?= base_url('administrator/edit_actionuser/' . $allusers->id); ?>"
                        method="post" enctype="multipart/form-data" class="form-horizontal">

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="form-control">Username</label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="text" name="username" id="username" class="form-control"
                                        value="<?= $allusers->username ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="form-control">Nama</label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="text" name="nama" id="nama" class="form-control"
                                        value="<?= $allusers->nama ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="form-control">Email</label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="text" name="email" id="email" class="form-control"
                                        value="<?= $allusers->email ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="form-control">Password</label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <?php if (empty($allusers->password)): ?>
                                            <input type="password" name="password" id="password" class="form-control"
                                                value="">
                                            <span class="help-block">* Password kosong atau belum di-hash.</span>
                                            <?php else: ?>
                                            <?php if (preg_match('/^\$2y\$/', $allusers->password)): ?>
                                            <div class="input-group-password">
                                                <input type="password" name="password" id="password"
                                                    class="form-control" value="">
                                                <div class="input-group-append">
                                                    <button class="btn btn-default reveal" type="button"
                                                        onclick="togglePasswordVisibility()">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <span class="help-block">* Password sudah di-hash.</span>
                                            <?php else: ?>
                                            <input type="password" name="password" id="password" class="form-control"
                                                value="">
                                            <span class="help-block">* Password belum di-hash.</span>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="form-control">Role</label>
                                </div>
                            </div>

                            <div class="col-sm-8">
                                <div class="form-group">
                                    <select name="role_id" id="role_id" class="form-control">
                                        <option value="<?= $allusers->role_id ?>"><?= $allusers->role_id ?>
                                        </option>
                                        <?php foreach ($roleuser as $key => $value) { ?>
                                        <option value="<?= $value->id ?>"><?= $value->id ?> = <?= $value->role ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Is Active</label>
                            <?php

                            if ($allusers->is_active == '1') {
                                $check = ' checked';
                            } else {
                                $check = '';
                            }

                            echo '<input type="checkbox" name="is_active" value="' . 1 . '"' . $check . '>';

                            ?>
                            <?php if ($allusers->is_active == 0) { ?>
                            <span class="badge badge-warning">Account Disable</span>
                            <?php } else { ?>
                            <span class="badge badge-success">Account Enable</span><br>
                            <?php } ?>

                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <img src="<?= base_url('assets/profile/' . $allusers->image) ?>"
                                            id="gambar_load" width="100px">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Upload Foto</label>
                                    <input type="file" name="image" class="form-control" id="preview_gambar">
                                </div>
                            </div>
                        </div>

                        <div class="row pt-2 pt-sm-5 mt-1">
                            <div class="col-sm-6 pl-0">
                                <p class="text-right">
                                    <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                    <a href="<?= base_url('administrator/index'); ?>"
                                        class="btn btn-secondary">Cancel</a>
                                </p>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>


    <script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById('password');
        var eyeIcon = document.querySelector('.input-group-password .fa');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            if (eyeIcon.classList.contains('fa-eye')) {
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            }
        } else {
            passwordInput.type = 'password';
            if (eyeIcon.classList.contains('fa-eye-slash')) {
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    }
    </script>

    <script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#preview_gambar").change(function() {
        bacaGambar(this);
    });
    </script>