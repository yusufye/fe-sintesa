
<!-- ======= Footer ======= -->
<footer id="footer">
  <div class="container py-4">
    <div class="copyright">
      Copyright &copy; 2022 - SINTESA - Pusbindiklatren Kementerian PPN/Bappenas. All Rights Reserved.
    </div>
   
    <div class="credits">
            <a href="#" class="twitter" style="color:#ffff"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook" style="color:#ffff"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram" style="color:#ffff"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus" style="color:#ffff"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin" style="color:#ffff"><i class="bx bxl-linkedin"></i></a>
          
    </div>
  </div>

  
</footer><!-- End Footer -->

<div id="preloader"></div>
<div id="ajax_loader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?php echo base_url();?>public/assets/bizland/assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="<?php echo base_url();?>public/assets/bizland/assets/vendor/aos/aos.js"></script>
<script src="<?php echo base_url();?>public/assets/bizland/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>public/assets/bizland/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?php echo base_url();?>public/assets/bizland/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url();?>public/assets/bizland/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?php echo base_url();?>public/assets/bizland/assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="<?php echo base_url();?>public/assets/bizland/assets/vendor/php-email-form/validate.js"></script>
<script src="https://kit.fontawesome.com/04af257788.js" crossorigin="anonymous"></script>
<!-- Template Main JS File -->
<script src="<?php echo base_url();?>public/assets/bizland/assets/js/main.js"></script>
<script>
  var baseUrl='<?php echo base_url(); ?>';
  var siteUrl='<?php echo site_url(); ?>';
</script>
<?php
  if(isset($init_datatable)){
    echo '<script src="https://code.jquery.com/jquery-3.5.1.js"></script>';
    echo '<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>';
  }

  if (isset($init_global_dttable_js)) {
    echo '<script src="'.base_url().'public/assets/main/js/data_table.js'.'?v='.time().'"></script>';
  }

  if (isset($init_chart)) {
    echo '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';
  }

  $controller  = strtolower(class_basename(service('router')->controllerName()));
  $method = strtolower(service('router')->methodName());
  if (file_exists(FCPATH."assets\main\js\web_data_diklat.js")){
    echo '<script src="'.base_url("public/assets/main/js/{$controller}_{$method}.js").'?v='.time().'"></script>';
  }
  
?>

<script>
//   $('#ajax_loader').bind('beforeSend', function(){
//     $(this).show();
// }).bind('ajaxStop', function(){
//     $(this).hide();
// });
</script>

</body>

</html>