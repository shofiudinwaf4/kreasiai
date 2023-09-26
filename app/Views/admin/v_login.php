<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?> - <?= $perusahaan['nama_perusahaan']; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>/mazer-main/dist/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/mazer-main/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/mazer-main/dist/assets/css/app.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/mazer-main/dist/assets/css/pages/auth.css">
    <link rel="shortcut icon" href="<?= base_url('img'); ?>/<?= $perusahaan['logo_header']; ?>" type="image/x-icon">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-md-5 mx-auto p-2 col-12 text-center">
                <div id="auth-left">
                    <div class="auth-logo text-center">
                        <a href="index.html"><img src="<?= base_url('img'); ?>/<?= $perusahaan['logo']; ?>" alt="Logo"></a>
                    </div>
                    <div class="card-body">
                        <h1 class="auth-title"><?= $judul; ?></h1>
                        <?php
                        $session = \Config\Services::session();
                        if ($session->getFlashdata('warning')) {
                        ?>
                            <!-- <div class="alert alert-danger"> -->

                            <div class="alert alert-light-danger color-danger">
                                <?php
                                foreach ($session->getFlashdata('warning') as $val) {
                                ?>
                                    <p><?= $val ?></p>

                                <?php
                                }
                                ?>
                            </div>
                            <!-- </div> -->
                        <?php
                        }
                        if ($session->getFlashdata('success')) {
                        ?>
                            <div class="alert alert-light-success color-success"><?php echo $session->getFlashdata('success') ?></div>
                        <?php
                        }
                        ?>
                        <form method="POST" action="<?= base_url('admin/ceklogin'); ?>">

                            <div class="form-group position-relative has-icon-left mb-1">
                                <input type="text" class="form-control form-control-md" id="invalid-state" name="username" placeholder=" Masukkan Username">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i><?php if ($session->getFlashdata('username')) echo $session->getFlashdata('username') ?>
                                </div>
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                </div>
                                </input>
                            </div>
                            <div class="form-group position-relative has-icon-left mb-1">
                                <input type="password" class="form-control form-control-md" name="password" id="invalid-state" placeholder="Masukkan Password">
                                <div class="form-control-icon">
                                    <i class="bi bi-shield-lock"></i>
                                </div>
                                <div class="invalid-feedback">username belum dimasukkan</div>
                                </input>
                            </div>
                            <input type="submit" class="btn btn-primary btn-lg shadow-lg mt-3" name="login" value="Login"></input>
                        </form>
                    </div>
                    <div class="text-center mt-5 text-md fs-4">
                        <p class="text-gray-600">Don't have an account? <a href="auth-register.html" class="font-bold">Sign
                                up</a>.</p>
                        <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>