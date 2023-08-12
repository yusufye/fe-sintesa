<!-- ============================= WEBSITE DIDEVELOP OLEH VIAN TAUM | DATAGOE.COM ============================= -->

<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <title>Login</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />

    <link href="<?php echo base_url();?>public/assets/main/sintesa_icon.png" rel="icon">
    <link href="<?php echo base_url();?>public/assets/main/sintesa_icon.png" rel="apple-touch-icon">

    <link href="<?php echo base_url();?>/public/assets/be/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/public/assets/be/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/public/assets/be/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/public/assets/be/css/style.css" rel="stylesheet" type="text/css">

    
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
                    <a href="<?= base_url('login') ?>" class="logo logo-admin"><img src="<?php echo base_url();?>public/assets/main/logo-sintesa-new-220x45.png" alt="" width="250" height="50"></a>
                </h3>
                <div class="p-1">
                    <?= form_open(base_url().'/login/validasi', ['class' => 'formlogin']) ?>
                    <?= csrf_field() ?>
                    <form class="form-horizontal m-t-30" action="index.html">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" autofocus>
                            <div class="invalid-feedback errorUsername"></div>
                        </div>
                        <div class="form-group">
                            <label for="userpassword">Password</label>
                            <input type="password" class="form-control" name="password_hash" id="password_hash" placeholder="Enter password">
                            <div class="invalid-feedback errorPassword">
                            </div>
                        </div>
                        
                        <div class="form-group row m-t-20">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="g-recaptcha" data-sitekey="6LcuBy4iAAAAAIrjNC_iGQARXTtmNiRngeEuY3C8"></div><br/><br>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>* Ganti Password anda secara berkala minimal 1 bulan sekali </b></p>
                            
                            <!--<input type="submit" value="Refresh" data-wrapper-class="btn" onclick="refresh()">-->
                            <div class="col-6">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                                    <label class="custom-control-label" for="customControlInline">Remember me </label>
                                </div>
                            </div>
                           <div class="col-6 text-right">
                            
                            </div>
                            
                           
                            
                             <div class="col-6 text-left">
                                <a href="<?php echo base_url();?>" class="btn btn-primary w-md waves-effect waves-light" ><i class="fas fa-home"></i>  Home</a>
                            </div>
                            
                            <div class="col-6 text-right">
                                <button class="btn btn-primary w-md waves-effect waves-light btnlogin" type="submit"><i class="fas fa-sign-in-alt text-light"></i> Login</button>
                            </div>
                        </div>

                    </form>
                    <?php echo form_close() ?>
                </div>
               
            </div>
        </div>

    </div>
    <!-- jQuery  -->
    <script src="<?= base_url() ?>/public/assets/be/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>/public/assets/be/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/public/assets/be/js/waves.min.js"></script>
    <script src="<?= base_url() ?>/public/assets/be/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="<?= base_url() ?>/public/assets/be/js/sweetalert2.js"></script>
   

</body>

</html>
 <script>
        function refresh() {
            
                setTimeout(function () {
                    location.reload()
                }, 100);
            }
    </script>
<script>
    $(document).ready(function() {
        $('.formlogin').submit(function(e) {
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
                    $('.btnlogin').html('<i class="fas fa-sign-in-alt"></i>  Log in');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.username) {
                            $('#username').addClass('is-invalid');
                            $('.errorUsername').html(response.error.username);
                        } else {
                            $('#username').removeClass('is-invalid');
                            $('.errorUsername').html();
                        }

                        if (response.error.password_hash) {
                            $('#password_hash').addClass('is-invalid');
                            $('.errorPassword').html(response.error.password_hash);
                        } else {
                            $('#password_hash').removeClass('is-invalid');
                            $('.errorPassword').html();
                        }
                    }

                    if (response.sukses) {
                        window.location = '<?= base_url() ?>';
                    }

                    if (response.nonactive) {
                        Swal.fire({
                            title: "Oooopss!",
                            text: "Captcha Salah atau User belum aktif!!",
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

<div class="modal fade" id="modalregister" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="card-header mt-0">
                <h6 class="modal-title m-0"><?= $title  ?>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h6>
            </div>
            <?= form_open_multipart('', ['class' => 'formregister']) ?>
            <?= csrf_field(); ?>


            <div class="modal-body">

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama User</label>
                    <div class="col-sm-9">
                        <input type=" text" class="form-control" name="username" id="username" placeholder="Username berisi firstname dan lastname (iyan.alfiyansyah)" autofocus>
                        <div class="invalid-feedback errorusername"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                        <div class="invalid-feedback erroremail"></div>
                    </div>

                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        <div class="invalid-feedback errorpassword"></div>
                    </div>

                </div>

                <!--<div class="form-group row">
                    <label class="col-sm-3 col-form-label">Level</label>
                    <div class="col-sm-9">
                        <select name="level" id="level" class="form-control">
                            <option Disabled=true Selected=true>Pilih</option>
                            <option value="super_admin">Super Administrator</option>
                            <option value="admin">Administrator</option>
                            <option value="user">User</option>
                        </select>
                        <div class="invalid-feedback errorLevel"></div>
                    </div>

                </div>-->

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                        <input type=" text" class="form-control" name="fullname" id="fullname" placeholder="Nama Lengkap" required>
                        <div class="invalid-feedback errorFullname"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Foto Profil</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="file" class="form-control" name="foto" id="foto" accept="image/*" required>
                            <div class="invalid-feedback errorFoto"></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary btnupload"><i class="mdi mdi-content-save-all"></i> Simpan</button>
                <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal"> <i class="ion-close"></i> Batal</button>
            </div>

            <?= form_close() ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.btnupload').click(function(e) {
            e.preventDefault();
            let form = $('.formregister')[0];
            let data = new FormData(form);
            $.ajax({
                type: "post",
                url: '<?= site_url('login/registerUser') ?>',
                data: data,
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                dataType: "json",
                beforeSend: function() {
                    $('.btnupload').attr('disable', 'disable');
                    $('.btnupload').html('<span class="spinner-border spinner-grow-sm" role="status" aria-hidden="true"></span> <i>Loading...</i>');
                    $('#modalregister').modal('hide');
                },
                complete: function() {
                    $('.btnupload').removeAttr('disable', 'disable');
                    $('.btnupload').html('<i class="mdi mdi-content-save-all"></i>  Simpan');
                },
                success: function(response) {
                    if (response.error) {

                        if (response.error.username) {
                            $('#username').addClass('is-invalid');
                            $('.errorusername').html(response.error.username);
                        } else {
                            $('#username').removeClass('is-invalid');
                            $('.errorusername').html('');
                            $('#username').addClass('is-valid');

                        }

                        if (response.error.password) {
                            $('#password').addClass('is-invalid');
                            $('.errorpassword').html(response.error.password);
                        } else {
                            $('#password').removeClass('is-invalid');
                            $('.errorpassword').html('');
                            $('#password').addClass('is-valid');
                        }


                        if (response.error.fullname) {
                            $('#fullname').addClass('is-invalid');
                            $('.errorFullname').html(response.error.fullname);
                        } else {
                            $('#fullname').removeClass('is-invalid');
                            $('.errorFullname').html('');
                            $('#fullname').addClass('is-valid');
                        }
                        /*if (response.error.level) {
                            $('#level').addClass('is-invalid');
                            $('.errorLevel').html(response.error.level);
                        } else {
                            $('#level').removeClass('is-invalid');
                            $('.errorLevel').html('');
                            $('#level').addClass('is-valid');
                        }*/


                        if (response.error.email) {
                            $('#email').addClass('is-invalid');
                            $('.erroremail').html(response.error.email);
                        } else {
                            $('#email').removeClass('is-invalid');
                            $('.erroremail').html('');
                            $('#email').addClass('is-valid');
                        }

                        if (response.error.foto) {
                            $('#foto').addClass('is-invalid');
                            $('.errorFoto').html(response.error.foto);
                        } else {
                            $('#foto').removeClass('is-invalid');
                            $('.errorFoto').html('');
                            $('#foto').addClass('is-valid');
                        }


                    } else {

                        /*toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            },
                            toastr["success"](response.sukses)*/
                            Swal.fire({
                            title: "Sukses!",
                            text: response.sukses,
                            icon: "success",
                            showConfirmButton: false,
                            timer: 3550
                             }).then(function() {

                            window.location = '<?= base_url('') ?>';
                            });
                            //$('#modalregister').modal('hide');
                       
                    }
                },
                error: function(xhr, ajaxOptions, thrownerror) {
                    toastr["error"]("Maaf gagal proses Kode Error:  " + (xhr.status + "\n"), );
                    $('#modalregister').modal('hide');
                }
            });
        });
    });
</script>