function setPeriodAttr(el) {
  var selectedOption = $(el).find('option:selected');
  var hasOperator = selectedOption.data('operator');
  if (hasOperator) {
    $(el).data('filtertype', 'less_than');
  }else{
    $(el).data('filtertype', 'equal_to');
  }
}

$(document).ready(function () {

  $('#FilterPeriodID').change(function (e) { 
    setPeriodAttr(this)
  });


  $("#tableCountPendidikan").DataTable(
    {
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
  $("#tableCountPelatihan").DataTable(
    {
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
  $("#tableCountGabungan").DataTable(
    {
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
    generateDiklatFilters(function(result){
      if (Object.keys(result).length !== 0) {
        generate_chart(result)
      }
    })
  }

});

if (typeof(datasetPendidikan)!='undefined') {
  const dataRadarPendidikan = {
    labels:  datasetPendidikan.label,
    datasets: datasetPendidikan.dataset
  };

  var chartRadarCountPendidikan=new Chart(document.getElementById('chartRadarCountPendidikan'), {
    type: 'radar',
    data: dataRadarPendidikan,
    options: {
      elements: {
        line: {
          borderWidth: 3
        }
      }
    },
  });

  new Chart(document.getElementById('chartAreaCountPendidikan'), {
    type: 'line',
    data: dataRadarPendidikan,
    options: {
      elements: {
        line: {
          borderWidth: 3
        }
      }
    },
  });
}

if (typeof(datasetPelatihan)!='undefined') {
  const dataRadarPelatihan = {
    labels:  datasetPelatihan.label,
    datasets: datasetPelatihan.dataset
  };

  new Chart(document.getElementById('chartRadarCountPelatihan'), {
    type: 'radar',
    data: dataRadarPelatihan,
    options: {
      elements: {
        line: {
          borderWidth: 3
        }
      }
    },
  });

  new Chart(document.getElementById('chartAreaCountPelatihan'), {
    type: 'line',
    data: dataRadarPelatihan,
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

function generateDiklatFilters(callback) {
  let Diklatfilters=$.map($('.Diklatfilters'), function(el) {
      return {field: $(el).data('filtername'), value:$(el).val(), type:$(el).data('filtertype')??'like'}
  });


  $.ajax({
    type: "POST",
    url: baseUrl+"web/get_chart_diklat_detail",
    dataType: "json",
    data:{ 
      filters:Diklatfilters, 
      param:DtMethodParam,
      type:type,
      csrf_test_name:$('input[name=csrf_test_name]').val()
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

    var dataPieGender = {};
    var ChartGenderPie= new Chart(document.getElementById('chartPieGender'), {
      type: 'pie',
      data: dataPieGender,
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
        },
      },
    });

    
    var dataPiePeriod = {};
    var ChartPeriodPie= new Chart(document.getElementById('chartPiePeriod'), {
      type: 'pie',
      data: dataPiePeriod,
      options: {
        elements: {
          line: {
            borderWidth: 3
          }
        }
      },
    });
  

  function generate_chart(result){
    console.log(result);
    dataAreaGender.labels=  result.gender.bar.label;
    dataAreaGender.datasets=  result.gender.bar.dataset;
    ChartGenderArea.update();

    dataPieGender.labels=  result.gender.pie.label;
    dataPieGender.datasets=  result.gender.pie.dataset;
    ChartGenderPie.update();
    
    dataAreaPeriod.labels=  result.period.label;
    dataAreaPeriod.datasets=  result.period.dataset;
    ChartPeriodArea.update();

    dataPiePeriod.labels=  result.period.pie.label;
    dataPiePeriod.datasets=  result.period.pie.dataset;
    ChartPeriodPie.update();
    

    $('#tablePeriod').html(result.table_period);
  }
  
  $('.Globalfilters').change(function (e) {
    if ($(this).prop('id')=='FilterPeriodID') {
      setPeriodAttr(this)
    }
    generateDiklatFilters(function(result){
      if (Object.keys(result).length !== 0) {
        generate_chart(result)
      }
    })
  });
}


// const button = document.getElementsByClassName('button-export-chart');
// button.addEventListener('click', () => {
  
// });
