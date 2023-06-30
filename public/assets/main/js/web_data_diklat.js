$(document).ready(function () {
  $("#tableCountPendidikan").DataTable({searching: false,ordering: false});
  $("#tableCountPelatihan").DataTable({searching: false,ordering: false});
  $("#tableCountGabungan").DataTable({searching: false,ordering: false});
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
