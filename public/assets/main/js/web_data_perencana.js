$(document).ready(function () {
  $("#tableCountPusat").DataTable({
    searching: false,ordering: false,
    dom: "<'row'B>"+
            "<'row' lfrtip>",
            buttons: [
                {
                    extend:'print'
                },
                {
                extend: 'collection',
                className: "",
                text: 'Export',
                buttons:
                [
                    {
                        extend: "copy", className: ""
                    },
                    {
                        extend: "pdf", className: ""
                    },
                        {
                        extend: "excel", className: ""
                    },
                        {
                        extend: "csv", className: ""
                    },
                ],
              }],
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
  });
  $("#tableCountDaerah").DataTable({
    searching: false,ordering: false,
    dom: "<'row'B>"+
            "<'row' lfrtip>",
            buttons: [
                {
                    extend:'print'
                },
                {
                extend: 'collection',
                className: "",
                text: 'Export',
                buttons:
                [
                    {
                        extend: "copy", className: ""
                    },
                    {
                        extend: "pdf", className: ""
                    },
                        {
                        extend: "excel", className: ""
                    },
                        {
                        extend: "csv", className: ""
                    },
                ],
              }],
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
  });
  $("#tableCountGabungan").DataTable({
    searching: false,ordering: false,
    dom: "<'row'B>"+
            "<'row' lfrtip>",
            buttons: [
                {
                    extend:'print'
                },
                {
                extend: 'collection',
                className: "",
                text: 'Export',
                buttons:
                [
                    {
                        extend: "copy", className: ""
                    },
                    {
                        extend: "pdf", className: ""
                    },
                        {
                        extend: "excel", className: ""
                    },
                        {
                        extend: "csv", className: ""
                    },
                ],
              }],
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
  });
});




// new Chart(document.getElementById('chartAreaCountPusat'), {
//   type: 'line',
//   data: dataRadarPusat,
//   options: {
//     elements: {
//       line: {
//         borderWidth: 3
//       }
//     }
//   },
// });

// const dataRadarDaerah = {
//   labels:  datasetDaerah.label,
//   datasets: datasetDaerah.dataset
// };

// new Chart(document.getElementById('chartRadarCountDaerah'), {
//   type: 'radar',
//   data: dataRadarDaerah,
//   options: {
//     elements: {
//       line: {
//         borderWidth: 3
//       }
//     }
//   },
// });

// new Chart(document.getElementById('chartAreaCountDaerah'), {
//   type: 'line',
//   data: dataRadarDaerah,
//   options: {
//     elements: {
//       line: {
//         borderWidth: 3
//       }
//     }
//   },
// });


// const dataRadarGabungan = {
//   labels:  datasetGabungan.label,
//   datasets: datasetGabungan.dataset
// };

// new Chart(document.getElementById('chartRadarCountGabungan'), {
//   type: 'radar',
//   data: dataRadarGabungan,
//   options: {
//     elements: {
//       line: {
//         borderWidth: 3
//       }
//     }
//   },
// });


// new Chart(document.getElementById('chartAreaCountGabungan'), {
//   type: 'line',
//   data: dataRadarGabungan,
//   options: {
//     elements: {
//       line: {
//         borderWidth: 3
//       }
//     }
//   },
// });


function generatePerencanaFilters(callback) {
  let Perencanafilters=$.map($('.Perencanafilters'), function(el) {
      return {field: $(el).data('filtername'), value:$(el).val(), type:$(el).data('filtertype')??'like'}
  });

  $.ajax({
    type: "POST",
    url: "/web/get_chart_perencana_pusat_detail",
    dataType: "json",
    data:function (d) { 
      d.filters=Perencanafilters; 
    },
    success:callback
  });
}

$('.Globalfilters').change(function (e) {
  generatePerencanaFilters(function(result){
    console.log(result);
    // const dataRadarPusat = {
    //   labels:  datasetPusat.label,
    //   datasets: datasetPusat.dataset
    // };
    
    // new Chart(document.getElementById('chartRadarCountPusat'), {
    //   type: 'radar',
    //   data: dataRadarPusat,
    //   options: {
    //     elements: {
    //       line: {
    //         borderWidth: 3
    //       }
    //     }
    //   },
    // });
  })
});