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

  if (typeof(method_type)!='undefined') {
    
    generatePerencanaFilters(function(result){
      if (Object.keys(result).length !== 0) {
        generate_chart(result)
      }
    })
  }
});


if (typeof(datasetPusat)!='undefined') {
  
  const dataRadarPusat = {
    labels:  datasetPusat.label,
    datasets: datasetPusat.dataset
  };
    
  new Chart(document.getElementById('chartRadarCountPusat'), {
      type: 'radar',
    data: dataRadarPusat,
    options: {
      elements: {
        line: {
          borderWidth: 3
        }
      }
    },
  });

  new Chart(document.getElementById('chartAreaCountPusat'), {
    type: 'line',
    data: dataRadarPusat,
    options: {
      elements: {
        line: {
          borderWidth: 3
        }
      }
    },
  });

}

if (typeof(datasetDaerah)!='undefined') {

  const dataRadarDaerah = {
    labels:  datasetDaerah.label,
    datasets: datasetDaerah.dataset
  };

  new Chart(document.getElementById('chartRadarCountDaerah'), {
    type: 'radar',
    data: dataRadarDaerah,
    options: {
      elements: {
        line: {
          borderWidth: 3
        }
      }
    },
  });

  new Chart(document.getElementById('chartAreaCountDaerah'), {
    type: 'line',
    data: dataRadarDaerah,
    options: {
      elements: {
        line: {
          borderWidth: 3
        }
      }
    },
  });
}

if (typeof(datasetGabungan)!='undefined') {

  const dataRadarGabungan = {
    labels:  datasetGabungan.label,
    datasets: datasetGabungan.dataset
  };

  new Chart(document.getElementById('chartRadarCountGabungan'), {
    type: 'radar',
    data: dataRadarGabungan,
    options: {
      elements: {
        line: {
          borderWidth: 3
        }
      }
    },
  });


  new Chart(document.getElementById('chartAreaCountGabungan'), {
    type: 'line',
    data: dataRadarGabungan,
    options: {
      elements: {
        line: {
          borderWidth: 3
        }
      }
    },
  });
}


function generatePerencanaFilters(callback) {
  let Perencanafilters=$.map($('.Perencanafilters'), function(el) {
      return {field: $(el).data('filtername'), value:$(el).val(), type:$(el).data('filtertype')??'like'}
  });


  $.ajax({
    type: "POST",
    url: "/web/get_chart_perencana_detail",
    dataType: "json",
    data:{ 
      filters:Perencanafilters, 
      param:DtMethodParam,
      type:type,
    },
    success:callback
  });
}

if (typeof(method_type)!='undefined') {
  var dataAreaGender = {};
    var ChartGenderArea= new Chart(document.getElementById('chartBarGender'), {
      type: 'bar',
      data: dataAreaGender,
      options: {
        elements: {
          line: {
            borderWidth: 3
          }
        }
      },
    });
  
  
  var dataAreaPeriod = {}
    var ChartPeriodArea= new Chart(document.getElementById('chartBarPeriod'), {
      type: 'bar',
      data: dataAreaPeriod,
      options: {
        elements: {
          line: {
            borderWidth: 3
          }
        }
      },
    });
  

  function generate_chart(result){
    console.log('run');
    dataAreaGender.labels=  result.gender.label;
    dataAreaGender.datasets=  result.gender.dataset;
    
    dataAreaPeriod.labels=  result.period.label;
    dataAreaPeriod.datasets=  result.period.dataset;
    
    ChartGenderArea.update();
    ChartPeriodArea.update();

    $('#tablePeriod').html(result.table_period);
  }
  
  $('.Globalfilters').change(function (e) {
    generatePerencanaFilters(function(result){
      console.log(result);
      if (Object.keys(result).length !== 0) {
        generate_chart(result)
      }
    })
  });
}