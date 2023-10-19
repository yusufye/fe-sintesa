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
                <input class="form-control form-control-sm Globalfilters Perencanafilters" data-filtername="name"
                    type="text" placeholder="Nama">
            </div>
            <div class="col-sm-3">
                <label>Jenis Kelamin</label>
                <select class="form-control form-control-sm Globalfilters Perencanafilters" data-filtertype="equal_to"
                    data-filtername="gender" type="text" placeholder="Gender">
                    <option value="">- Select Gender -</option>
                    <option value="L">L</option>
                    <option value="P">P</option>
                </select>
            </div>
            <div class="col-sm-3">
                <label>Golongan</label>
                <select class="form-control form-control-sm Globalfilters Perencanafilters" data-filtertype="equal_to"
                    data-filtername="golongan" type="text" placeholder="Golongan">
                    <option value="">- Select Golongan -</option>
                    <?php
                        foreach ($list_golongan as $row) {
                            echo "<option value='".$row['golongan']."'>".$row['golongan']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col-sm-3">
                <label>Instansi</label>
                <select class="form-control form-control-sm Globalfilters Perencanafilters" data-filtertype="equal_to"
                    data-filtername="kementrian_name" type="text" placeholder="Instansi">
                    <option value="">- Select Instansi -</option>
                    <?php
                        foreach ($list_instansi as $row) {
                            echo "<option value='".$row['kementrian_name']."'>".$row['kementrian_name']."</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3">
                <label>Unit Kerja</label>
                <select class="form-control form-control-sm Globalfilters Perencanafilters" data-filtertype="equal_to"
                    data-filtername="unit_kerja" type="text" placeholder="Unit Kerja">
                    <option value="">- Select Unit Kerja -</option>
                    <?php
                        foreach ($list_unit_kerja as $row) {
                            echo "<option value='".$row['unit_kerja']."'>".$row['unit_kerja']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col-sm-3">
                <label>Jabatan</label>
                <select class="form-control form-control-sm Globalfilters Perencanafilters" data-filtertype="equal_to"
                    data-filtername="jabatan" type="text" placeholder="Jabatan">
                    <option value="">- Select Jabatan -</option>
                    <?php
                        foreach ($list_jabatan as $row) {
                            echo "<option value='".$row['jabatan']."'".(isset($filtersGET['jabatan']) && strtolower($filtersGET['jabatan'])==strtolower($row['jabatan'])?'selected':'').">".$row['jabatan']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col-sm-3">
                <label>Periode</label>
                <select class="form-control form-control-sm Globalfilters Perencanafilters" data-filtertype="equal_to"
                    data-filtername="periode" type="text" placeholder="periode">
                    <option value="">- Select Periode -</option>
                    <?php
                        foreach ($list_periode as $row) {
                            echo "<option value='".$row['periode']."'>".$row['periode']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col-sm-3">
                <label>Program</label>
                <select class="form-control form-control-sm Globalfilters Perencanafilters" data-filtertype="perencana_program"
                    data-filtername="kemcategory" type="text" placeholder="kemcategory">
                    <option value="">- Select Program -</option>
                    <option value="pusat" <?php echo (isset($filtersGET['program']) && strtolower($filtersGET['program'])=='pusat'?'selected':''); ?> >Pusat</option>
                    <option value="daerah" <?php echo (isset($filtersGET['program']) &&  strtolower($filtersGET['program'])=='daerah'?'selected':''); ?>>Daerah</option>
                </select>
            </div>
        </div>
        <br>
        <div class='table-responsive'>
            <table id="tableDetailPendidikan" class="table dataTable table-striped">
                <thead class="table-primary">
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Email</td>
                        <td>Jenis Kelamin</td>
                        <td>Golongan</td>
                        <td>Nama Instansi</td>
                        <td>Unit Kerja</td>
                        <td>Provinsi</td>
                        <td>Jabatan</td>
                        <td>Periode</td>
                    </tr>
                </thead>
            </table>
        </div>
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
        <!-- <div class="row">
            <div class="col col-md-3">
                <?php //button_chart_export('tablePeriod',true); ?>
                <br>
                <label for="tablePeriod">Table Berdasarkan Tahun</label>
                <div id="tablePeriod"></div>
            </div>
        </div> -->
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