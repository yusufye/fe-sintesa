<!-- ============================= WEBSITE DIDEVELOP OLEH VIAN TAUM | DATAGOE.COM ============================= -->

<?php

use App\Models\Modelkonfigurasi;

$this->konfigurasi = new Modelkonfigurasi();
$konfigurasi = $this->konfigurasi->orderBy('id_setaplikasi')->first();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <title>Token</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />

    <link rel="shortcut icon" href="<?= base_url('/public/img/konfigurasi/icon/' . $konfigurasi['icon']) ?>">
    <link href="<?= base_url() ?>/public/temp-backend/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/public/temp-backend/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/public/temp-backend/assets/css/style.css" rel="stylesheet" type="text/css">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>



<body>
    <!-- Background -->
    <div class="account-pages"></div>
    <!-- Begin page -->
    <div class="wrapper-page">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center m-0">
                    <a href="<?= base_url('token') ?>" class="logo logo-admin"><img src="<?= base_url('/public/temp-backend/assets/images/logo-sintesa-new.png') ?>" alt="" width="250" height="50"></a>
                </h3>
                <div class="p-1">
                    <?= form_open('token/validasi_token', ['class' => 'formtoken']) ?>
                    <?= csrf_field() ?>
                    <form class="form-horizontal m-t-30" action="index.html">
                        <div class="form-group">
                            <label for="username"><b>Token</b></label>
                            <input type="text" class="form-control" name="token" id="token" placeholder="Silahkan input token yang sudah dikirim ke email anda." autofocus>
                            <div class="invalid-feedback errorUsername"></div>
                        </div>
                       
                        <div class="form-group row m-t-20">
                           
                            <div class="col-6 text-right"><br>
                                <button class="btn btn-primary w-md waves-effect waves-light btnlogin" type="submit"><i class="fas fa-sign-in-alt text-light"></i> <b>Submit</b></button>
                            </div>
                        </div>
                        <center><p color=red><b><?= date('Y') ?> <?= $konfigurasi['nama'] ?></b></p></center>
                    </form>
                    <?php echo form_close() ?>
                </div>

            </div>
        </div>

        <!--<div class="m-t-40 text-center">

            <p color=red><b><?= date('Y') ?> <?= $konfigurasi['nama'] ?></b></p>
        </div>-->

    </div>
    <!-- jQuery  -->
    <script src="<?= base_url() ?>/public/temp-backend/assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>/public/temp-backend/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/public/temp-backend/assets/js/waves.min.js"></script>
    <script src="<?= base_url() ?>/public/temp-backend/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="<?= base_url() ?>/public/temp-backend/assets/js/sweetalert2.js"></script>

</body>

</html>

<script>
    $(document).ready(function() {
        $('.formtoken').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.btnlogin').prop('disable', true);
                    $('.btnlogin').html('<span class="spinner-border spinner-border-sm text-light" role="status" aria-hidden="true"></span> <i>Loading...')

                },
                complete: function() {
                    $('.btnlogin').prop('disable', false);
                    $('.btnlogin').html('Log in')
                    $('.btnlogin').html('<i class="fas fa-sign-in-alt"></i>  Submit');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.username) {
                            $('#token').addClass('is-invalid');
                            $('.errorToken').html(response.error.token);
                        } else {
                            $('#token').removeClass('is-invalid');
                            $('.errorToken').html();
                        }
                    }

                    if (response.sukses) {
                        window.location = '<?= base_url('admin') ?>';
                    }

                    if (response.nonactive) {
                        Swal.fire({
                            title: "Oooopss!",
                            text: "Token salah atau masih kosong!",
                            icon: "error",
                            showConfirmButton: false,
                            timer: 1250
                        });
                    }
                },
                error: function(xhr, ajaxOptions, thrownerror) {
                    Swal.fire({
                        title: "Maaf gagal load data!",
                        html: `Ada kesalahan Kode Error: <strong>${(xhr.status + "\n")}</strong> `,
                        icon: "error",
                        showConfirmButton: false,
                        timer: 3100
                    });
                }
            });
            return false;
        });
    });
</script>