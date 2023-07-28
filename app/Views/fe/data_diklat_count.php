<section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h3><span><?php echo $sub_title;?></span></h3>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class='bx bxs-graduation'></i></div>
              <h4><a href="">Data Pendidikan</a></h4>
              <p><h5><span data-purecounter-start="0" data-purecounter-end="<?php echo $count[$model_name]['pendidikan'][0]['total']; ?>" data-purecounter-duration="1" class="purecounter"></span> Data</h5></p>
              <p><a href='<?php echo base_url()."/data-diklat/$orig_title/pendidikan/summary" ?>' class="btn btn-warning"><i class='bx bx-right-arrow-circle' ></i> Info Detail</i></a></p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-sm-6" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
              <div class="icon"><i class="fa-solid fa-user-tie"></i></div>
              <h4><a href="">Data Pelatihan</a></h4>
              <p><h5><span data-purecounter-start="0" data-purecounter-end="<?php echo $count[$model_name]['pelatihan'][0]['total']; ?>" data-purecounter-duration="1" class="purecounter"></span> Data</h5></p>
                <a href='<?php echo base_url()."/data-diklat/$orig_title/pelatihan/summary" ?>' class="btn btn-warning"><i class="bx bx-right-arrow-circle"></i></i> Info Detail</i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-xs-6" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
              <div class="icon"><i class="fa-solid fa-people-group"></i></div>
              <h4><a href="">Data Gabungan</a></h4>
              <p><h5><span data-purecounter-start="0" data-purecounter-end="<?php echo $count[$model_name]['gabungan'][0]['total']; ?>" data-purecounter-duration="1" class="purecounter"></span> Data</h5></p>
                <a href='<?php echo base_url()."/data-diklat/$orig_title/gabungan/summary" ?>' class="btn btn-warning"><i class="bx bx-right-arrow-circle"></i> Info Detail</i></a>
            </div>
        </div>

      </div>
</section>