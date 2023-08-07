<section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h3><span><?php echo $sub_title;?></span></h3>
        </div>

        <div class="row">
           
          <div class="col-lg-6 col-md-6 col-sm-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
            <div class="icon"><i class='bx bxs-video'></i></div>
              <h4><a href="">Jumlah Video</a></h4>
              <p><h5><span data-purecounter-start="0" data-purecounter-end="<?php echo $count[$model_name]['video'][0]['total']; ?>" data-purecounter-duration="1" class="purecounter"></span> Data</h5></p>
                <a href="" class="btn btn-warning"><i class='bx bx-right-arrow-circle' ></i> Info Detail</i></a>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 col-sm-6" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
              <div class="icon"><i class="fa-solid fa-person-chalkboard"></i></div>
              <h4><a href="">Jumlah Paparan</a></h4>
                <p><h5><span data-purecounter-start="0" data-purecounter-end="<?php echo $count[$model_name]['paparan'][0]['total']; ?>" data-purecounter-duration="1" class="purecounter"></span> Data</h5></p>
                <a href="" class="btn btn-warning"><i class="bx bx-right-arrow-circle"></i> Info Detail</i></a>
            </div>
          </div>

      </div>
</section>