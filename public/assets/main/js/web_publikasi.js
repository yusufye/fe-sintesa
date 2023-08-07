var myModal = new bootstrap.Modal(document.getElementById('detail_publikasi'))

$(document).ready(function () {
    $(document).on("click", ".show_dialog_detail", function () {
        var label_dialog=$(this).attr('data-source');
        console.log(label_dialog);
        showDetail($(this).data('source'),$(this).data('id'),function(data){
            myModal.show();
            $('.modal-title').text(label_dialog);
            $('#dialog_nama').text(data.nama_kegiatan);
            $('#dialog_tgl_kegiatan').text(data.tgl_kegiatan);
            $('#dialog_paparan').text(data.nama_bankdata);
            $('#dialog_tgl_upload').text(data.tgl_upload);
            $('#dialog_tgl_update').text(data.tgl_update);
            $('#dialog_lokasi').text(data.lokasi);
            $('#dialog_file').html('<a href="'+data.file_url+'" class="btn btn-secondary btn-sm" target="_blank">Download</a>');
            $('#dialog_video').html('<a href="'+data.video_url+'" class="btn btn-secondary btn-sm" target="_blank">Link Video</a>');;
            $('#dialog_kategori').text(data.kategorivideo_id);
        })
    })
});

function showDetail(source,id,callback){
    if (source=='biodata_narasumber') {
        to_url="/web/detail_publikasi/"+id;
    }else{
        to_url="/web/detail_publikasi/"+id;
    }

    $.ajax({
        type: "POST",
        url: to_url,
        dataType: "json",
        success: callback,
        beforeSend: function() {
            $("#ajax_loader").show();
        },
        complete: function() {
            $("#ajax_loader").hide();
        }
    });
}