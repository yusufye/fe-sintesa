<?php 
        $data_kerjasama=$detail[$model_name][$param];
?>

<section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-sm-3">
                <label>Nama Kerjasama</label>
                <input class="form-control form-control-sm Globalfilters" data-filtername="nama_kerjasama" type="text"
                    placeholder="Nama Kerjasama">
            </div>

            <div class="col-sm-3">
                <label>Deskripsi</label>
                <input class="form-control form-control-sm Globalfilters" data-filtername="deskripsi" type="text"
                    placeholder="Deskripsi">
            </div>

            <div class="col-sm-3">
                <label>Date Range</label>
                <input class="form-control form-control-sm Globalfilters" data-filtername="start_date"
                    data-filtertype="date_range_start" type="date" placeholder="Start Date">
            </div>

            <div class="col-sm-3">
                <label></label>
                <input class="form-control form-control-sm Globalfilters" data-filtername="end_date"
                    data-filtertype="date_range_end" type="date" placeholder="End Date">
            </div>


        </div>
        <br>
        <div class='table-responsive'>
            <table id="tableDetailKerjasama" class="table table-stripped">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Nama Kerjasama</th>
                        <th>Deskripsi</th>
                        <th>Durasi</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Download File</th>
                        <th>Input Date</th>
                        <th>Modify Date</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</section>

<script>
var DtTableId = 'tableDetailKerjasama';
var DtModelNaame = '<?php echo $model_init; ?>';
var DtMethodName = '<?php echo $method; ?>';
var DtMethodParam = '<?php echo $method_param; ?>';
var DtMethodType = '<?php echo $method_type; ?>';
</script>