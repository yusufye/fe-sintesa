$(document).ready(function () {
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
});


const dataRadarPendidikan = {
  labels:  datasetPendidikan.label,
  datasets: datasetPendidikan.dataset
};

new Chart(document.getElementById('chartRadarCountPendidikan'), {
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
