<?php if ($param<>'video'): ?>
<section id="services" class="services">
    <div class="container" data-aos="fade-up">

        <div class="row">
            <div class="col-sm-3">
                <label>Nama Kegiatan</label>
                <input class="form-control form-control-sm Globalfilters" data-filtername="nama_kegiatan" type="text"
                    placeholder="Nama Kegiatan">
            </div>
            <div class="col-sm-3">
                <label>Tanggal Kegiatan</label>
                <input class="form-control form-control-sm Globalfilters" data-filtername="tgl_kegiatan"
                    data-filtertype="date_range_start" type="date" placeholder="Tanggal Kegiatan">
            </div>
            <div class="col-sm-3">
                <label></label>
                <input class="form-control form-control-sm Globalfilters" data-filtername="tgl_kegiatan"
                    data-filtertype="date_range_end" type="date" placeholder="Tanggal Kegiatan">
            </div>
            <div class="col-sm-3">
                <label>Paparan</label>
                <input class="form-control form-control-sm Globalfilters" data-filtername="nama_bankdata" type="text"
                    placeholder="Paparan">
            </div>
        </div>
        <br>
        <div class='table-responsive'>
            <table id="tablePaparan" class="table dataTable table-striped">
                <thead class="table-primary">
                    <tr>
                        <th style="width:4%">No</th>
                        <th style="width:35%">Nama Kegiatan</th>
                        <th style="width:10%">Tanggal Kegiatan</th>
                        <th style="width:20%">Paparan</th>
                        <th style="width:10%">Tanggal Upload</th>
                        <th style="width:10%">Tanggal Update</th>
                        <th style="width:5%">Unduh File</th>
                        <th style="width:5%">Details</th>
                    </tr>
                </thead>
            </table>
        </div>
        <script>
        var DtTableId = 'tablePaparan';
        var DtModelNaame = '<?php echo $model_init; ?>';
        var DtMethodName = '<?php echo $method; ?>';
        var DtMethodParam = '<?php echo $method_param; ?>';
        var DtMethodType = '<?php echo $method_type; ?>';
        </script>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="detail_publikasi" tabindex="-1" aria-labelledby="detail_publikasiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table>
                    <tr>
                        <td>Nama Kegiatan</td>
                        <td>:</td>
                        <td id="dialog_nama"></td>
                    </tr>
                    <tr>
                        <td>Tanggal Kegiatan</td>
                        <td>:</td>
                        <td id="dialog_tgl_kegiatan"></td>
                    </tr>
                    <tr>
                        <td>Paparan</td>
                        <td>:</td>
                        <td id="dialog_paparan"></td>
                    </tr>
                    <tr>
                        <td>Tanggal Upload</td>
                        <td>:</td>
                        <td id="dialog_tgl_upload"></td>
                    </tr>
                    <tr>
                        <td>Tanggal Update</td>
                        <td>:</td>
                        <td id="dialog_tgl_update"></td>
                    </tr>
                    <tr>
                        <td>Lokasi</td>
                        <td>:</td>
                        <td id="dialog_lokasi"></td>
                    </tr>
                    <tr>
                        <td>Unduh File</td>
                        <td>:</td>
                        <td id="dialog_file"></td>
                    </tr>
                    <tr>
                        <td>Link Video</td>
                        <td>:</td>
                        <td id="dialog_video"></td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>:</td>
                        <td id="dialog_kategori"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
        else:
          echo '<section id="team" class="team">';
          echo '<div class="container" data-aos="fade-up">';
          echo '<div class="row">';
        foreach ($detail[$model_name][$param] as $row) {
            echo '<div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">';
              echo '<div class="member">';
                echo '<div class="member-img">';
                  echo '<div class="social"><a href="'.$row['video_url'].'" class="glightbox"><i class="fa fa-play"></i></a></div>';
                  echo '<img src="'.base_url().'public/assets/main/video-thumbnail.jpg" class="img-fluid" alt="">';
                echo '</div>';
                echo '<div class="member-info">';
                  echo '<h4>Diklat Pusbindiklatren Bappenas</h4>';
                  echo '<span>'.$row['nama_kegiatan'].'</span>';
                echo '</div>';
              echo '</div>';
            echo '</div>';
        }    
        echo '</div></div></section>';
    ?>

<?php endif; ?>
<br>
<br>
<style>

</style>