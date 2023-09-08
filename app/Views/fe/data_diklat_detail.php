<?php 
        $data_detail_pendidikan=$detail[$model_name][$param];
?>

<section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="d-flex justify-content-end pb-4">
                    <a class="btn btn-secondary btn-sm" title="Print Page" onclick="window.print();"><i class="fa fa-print"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <label>Nama</label>
                <input class="form-control form-control-sm Globalfilters Diklatfilters" data-filtername="name"
                    type="text" placeholder="Nama">
            </div>
            <div class="col-sm-3">
                <label>Jenis Kelamin</label>
                <select class="form-control form-control-sm Globalfilters Diklatfilters" data-filtertype="equal_to"
                    data-filtername="gender" type="text" placeholder="Gender">
                    <option value="">- Select Gender -</option>
                    <option value="L">L</option>
                    <option value="P">P</option>
                </select>
            </div>
            <div class="col-sm-3">
                <label>Instansi</label>
                <select class="form-control form-control-sm Globalfilters Diklatfilters" data-filtertype="equal_to"
                    data-filtername="nama_inst" type="text" placeholder="Instansi">
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
                <select class="form-control form-control-sm Globalfilters Diklatfilters" data-filtertype="equal_to"
                    data-filtername="tahun" type="text" placeholder="periode">
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

        <table id="tableDetailPendidikan" class="table  dataTable table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Wilayah</th>
                    <th>Instansi</th>
                    <th>Provinsi</th>
                    <th>Pendidikan</th>
                    <th>Jurusan</th>
                    <th>Penempatan</th>
                    <th>Tahun</th>
                </tr>
            </thead>
        </table>
    </div>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col col-md-8">
                <?php button_chart_export('chartBarGender'); ?>
                <br>
                <label for="chartBarGender">Grafik Berdasarkan Jenis Kelamin</label>
                <canvas id="chartBarGender"></canvas>
            </div>
            <div class="col col-md-4">
                <?php button_chart_export('chartPieGender'); ?>
                <br>
                <label for="chartPieGender">Grafik Berdasarkan Jenis Kelamin</label>
                <canvas id="chartPieGender"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col col-md-8">
                <?php button_chart_export('chartBarPeriod'); ?>
                <br>
                <label for="chartBarPeriod">Grafik Berdasarkan Tahun</label>
                <canvas id="chartBarPeriod"></canvas>
            </div>
            <div class="col col-md-4">
                <?php button_chart_export('chartPiePeriod'); ?>
                <br>
                <label for="chartPiePeriod">Grafik Berdasarkan Tahun</label>
                <canvas id="chartPiePeriod"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col col-md-3">
                <?php button_chart_export('tablePeriod',true); ?>
                <br>
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
var type = '<?php echo $orig_title; ?>';
var method_type = '<?php echo $method_type; ?>';
</script>