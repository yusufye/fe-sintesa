<?php 
        $data_detail_pendidikan=$detail[$model_name][$param];
?>

<section id="services" class="services">
    <div class="container" data-aos="fade-up">
    <div class="row">
            <div class="col-sm-3">
                <label>Nama</label>
                <input class="form-control form-control-sm Globalfilters Diklatfilters" data-filtername="name" type="text" placeholder="Nama">
            </div>
            <div class="col-sm-3">
                <label>Jenis Kelamin</label>
                <select class="form-control form-control-sm Globalfilters Diklatfilters" data-filtertype="equal_to" data-filtername="gender" type="text" placeholder="Gender">
                    <option value="">- Select Gender -</option>
                    <option value="L">L</option>
                    <option value="P">P</option>
                </select>
            </div>
            <div class="col-sm-3">
                <label>Instansi</label>
                <select class="form-control form-control-sm Globalfilters Diklatfilters" data-filtertype="equal_to" data-filtername="nama_inst" type="text" placeholder="Instansi">
                <option value="">- Select Instansi -</option>
                    <?php
                        foreach ($list_instansi as $row) {
                            echo "<option value='".$row['nama_inst']."'>".$row['nama_inst']."</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="col-sm-3">
                <label>Periode</label>
                <select class="form-control form-control-sm Globalfilters Diklatfilters" data-filtertype="equal_to" data-filtername="tahun" type="text" placeholder="periode">
                    <option value="">- Select Periode -</option>
                    <?php
                        foreach ($list_periode as $row) {
                            echo "<option value='".$row['tahun']."'>".$row['tahun']."</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <br>

        <table id="tableDetailPendidikan" class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>Wilayah</th>
                    <th>Instansi</th>
                    <th>Pendidikan</th>
                    <th>Jurusan</th>
                    <th>Penempatan</th>
                    <th>Tahun</th>
                </tr>
            </thead>
        </table>

        <div class="row">
            <div class="col col-md-4">
                <label for="chartBarGender">Grafik Berdasarkan Jenis Kelamin</label>
                <canvas id="chartBarGender"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col col-md-6">
                <label for="chartBarPeriod">Grafik Berdasarkan Tahun</label>
                <canvas id="chartBarPeriod"></canvas>
            </div>
            <div class="col col-md-6">
                <label for="tablePeriod">Table Berdasarkan Tahun</label>
                <div id="tablePeriod"></div>
            </div>
        </div>
    </div>
</section>



<script>
var DtTableId = 'tableDetailPendidikan';
var DtModelNaame = '<?php echo $model_init; ?>';
var DtMethodName = '<?php echo $method; ?>';
var DtMethodParam = '<?php echo $method_param; ?>';
var DtMethodType = '<?php echo $method_type; ?>';
var type          = '<?php echo $orig_title; ?>';
var method_type   = '<?php echo $method_type; ?>';
</script>