var myModal = new bootstrap.Modal(document.getElementById('detailKegiatan'))

$(document).ready(function () {
    $(document).on("click", ".show_dialog_detail", function () {
        showDetail($(this).data('source'),$(this).data('id'),function(data){
            console.log(data);
            myModal.show();
            
            $('#dialog_kegiatan').text(data.nama_kegiatan);
            $('#dialog_paparan_narasumber').text(data.paparan_narasumber);
            $('#dialog_narasumber').text(data.nama);
            $('#dialog_tgl_upload').text(data.tgl_upload);
            $('#dialog_tgl_kegiatan').text(data.tgl_kegiatan);
            $('#dialog_lokasi').text(data.lokasi);
            $('#dialog_download_file').html('<a href="'+data.file_url+'" class="btn btn-secondary btn-sm" target="_blank">Download</a>');
            $('#dialog_laporan_kegiatan').html('<a href="'+data.filename_url+'" class="btn btn-secondary btn-sm" target="_blank">Download</a>');
            $('#dialog_dokumentasi').html('<img source="'+data.filename_url+'" style="max-width:100px"></img>');
        })
    })
});

function showDetail(source,id,rtr){  
    if (source=='data_kegiatan') {
        to_url=baseUrl+"web/detail_kegiatan/"+id;
    }else{
        to_url=baseUrl+"web/detail_kegiatan/"+id;
    }

    $.ajax({
        type: "POST",
        url: to_url,
        dataType: "json",
        data: {[csrf_name]:$('input[name='+csrf_name+']').val()},
        success: rtr
    });
}