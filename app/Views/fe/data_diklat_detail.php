<?php 
        $data_detail_pendidikan=$detail[$model_name][$param];
?>

<section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <!-- <select name="filter_kota" id="filter_kota" data-filtername="kota" class="filters">
        <option value="Sendai"></option>
        <option value="Tokyo"></option>
        <option value="Yokohama"></option>
    </select>

    <select name="filter_kode" id="filter_kode" data-filtername="kode" class="filters">
        <option value="RIKYO"></option>
        <option value="TOY"></option>
        <option value="TAKU"></option>
    </select> -->

        <table id="tableDetailPendidikan" class="table">
            <thead>
                <tr>
                    <th>nip</th>
                    <th>nama</th>
                    <th>jabatan</th>
                    <th>unit_kerja</th>
                    <th>nama_inst</th>
                    <th>pnddkn</th>
                </tr>
            </thead>
        </table>
    </div>
</section>

<script>
var DtTableId = 'tableDetailPendidikan';
var DtModelNaame = '<?php echo $model_init; ?>';
var DtMethodName = '<?php echo $method; ?>';
var DtMethodParam = '<?php echo $method_param; ?>';
var DtMethodType = '<?php echo $method_type; ?>';
</script>