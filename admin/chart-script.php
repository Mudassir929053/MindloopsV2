<script>
  // *******************************************************************************************************
  var dayData = <?php echo json_encode($dayData); ?>;
  var dayCtx = document.getElementById('dayChartDownload').getContext('2d');
  var dayChartDownload = new Chart(dayCtx, {
    type: 'bar',
    data: {
      labels: dayData.labels,
      datasets: [{
        label: 'Day Downloads Statistics',
        data: dayData.data,
        backgroundColor: dayData.backgroundColor,
        borderColor: dayData.borderColor,
        borderWidth: dayData.borderWidth,
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: true,
      scales: {
        x: {
          beginAtZero: true
        },
        y: {
          beginAtZero: true
        }
      }
    }
  });



  var monthData = <?php echo json_encode($monthData); ?>;
  var monthCtx = document.getElementById('monthChartDownload').getContext('2d');
  var monthChartDownload = new Chart(monthCtx, {
    type: 'bar',
    data: {
      labels: monthData.labels,
      datasets: [{
        label: 'Month Downloads Statistics',
        data: monthData.data,
        backgroundColor: monthData.backgroundColor,
        borderColor: monthData.borderColor,
        borderWidth: monthData.borderWidth,
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: true,
      scales: {
        x: {
          beginAtZero: true
        },
        y: {
          beginAtZero: true
        }
      },
      // height: 300, // Set the height of the chart
      // width: 500, // Set the width of the chart
    }
  });




  var yearData = <?php echo json_encode($yearData); ?>;
  var yearCtx = document.getElementById('Download').getContext('2d');
  var Download = new Chart(yearCtx, {
    type: 'bar',
    data: {
      labels: yearData.labels,
      datasets: [{
        label: 'Year Downloads Statistics',
        data: yearData.data,
        backgroundColor: yearData.backgroundColor,
        borderColor: yearData.borderColor,
        borderWidth: yearData.borderWidth,
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: true,
      scales: {
        x: {
          beginAtZero: true
        },
        y: {
          beginAtZero: true
        }
      },
      // height: 300, // Set the height of the chart
      // width: 500, // Set the width of the chart
    }
  });


  // *******************************************************************************************************


  var dayData = <?php echo json_encode($dayData); ?>;
  var dayCtx = document.getElementById('dayChartPreview').getContext('2d');
  var dayChartPreview = new Chart(dayCtx, {
    type: 'bar',
    data: {
      labels: dayData.labels,
      datasets: [{
        label: 'Day Previews Statistics',
        data: dayData.data,
        backgroundColor: dayData.backgroundColor,
        borderColor: dayData.borderColor,
        borderWidth: dayData.borderWidth,
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: true,
      scales: {
        x: {
          beginAtZero: true
        },
        y: {
          beginAtZero: true
        }
      }
    }
  });

  var monthData = <?php echo json_encode($monthData); ?>;
  var monthCtx = document.getElementById('monthChartPreview').getContext('2d');
  var monthChartPreview = new Chart(monthCtx, {
    type: 'bar',
    data: {
      labels: monthData.labels,
      datasets: [{
        label: 'Month Previews Statistics',
        data: monthData.data,
        backgroundColor: monthData.backgroundColor,
        borderColor: monthData.borderColor,
        borderWidth: monthData.borderWidth,
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: true,
      scales: {
        x: {
          beginAtZero: true
        },
        y: {
          beginAtZero: true
        }
      },
      // height: 300, // Set the height of the chart
      // width: 500, // Set the width of the chart
    }
  });


  var yearData = <?php echo json_encode($yearData); ?>;
  var yearCtx = document.getElementById('yearChartPreview').getContext('2d');
  var yearChartPreview = new Chart(yearCtx, {
    type: 'bar',
    data: {
      labels: yearData.labels,
      datasets: [{
        label: 'Year Previews Statistics',
        data: yearData.data,
        backgroundColor: yearData.backgroundColor,
        borderColor: yearData.borderColor,
        borderWidth: yearData.borderWidth,
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: true,
      scales: {
        x: {
          beginAtZero: true
        },
        y: {
          beginAtZero: true
        }
      },
      // height: 300, // Set the height of the chart
      // width: 500, // Set the width of the chart
    }
  });


  // *******************************************************************************************************


  var teacherData = <?php echo json_encode($teacherData); ?>;
  var ctx = document.getElementById('teachersChart').getContext('2d');
  var teachersChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: teacherData.labels,
      datasets: teacherData.datasets,
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        x: {
          beginAtZero: true
        },
        y: {
          beginAtZero: true
        }
      },
    }
  });

  // *******************************************************************************************************

  var studentData = <?php echo json_encode($studentData); ?>;
  var ctx = document.getElementById('studentsChart').getContext('2d');
  var studentsChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: studentData.labels,
      datasets: studentData.datasets,
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        x: {
          beginAtZero: true
        },
        y: {
          beginAtZero: true
        }
      },
    }
  });

  // *******************************************************************************************************

  var logInData = <?php echo json_encode($logInData); ?>;
  var registerData = <?php echo json_encode($registerData); ?>;
  var ctx = document.getElementById('pageViewsChart').getContext('2d');
  var pageViewsChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: logInData.labels, // Use the labels from your data
      datasets: [{
          label: logInData.datasets[0].label, // Use the label from your data
          data: logInData.datasets[0].data, // Use the data from your data
          backgroundColor: logInData.datasets[0].backgroundColor, // Use the backgroundColor from your data
          borderColor: logInData.datasets[0].borderColor, // Use the borderColor from your data
          borderWidth: logInData.datasets[0].borderWidth, // Use the borderWidth from your data
        },
        {
          label: registerData.datasets[0].label, // Use the label from your data
          data: registerData.datasets[0].data, // Use the data from your data
          backgroundColor: registerData.datasets[0].backgroundColor, // Use the backgroundColor from your data
          borderColor: registerData.datasets[0].borderColor, // Use the borderColor from your data
          borderWidth: registerData.datasets[0].borderWidth, // Use the borderWidth from your data
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        x: {
          beginAtZero: true,
        },
        y: {
          beginAtZero: true,
        },
      },
    },
  });

  // *******************************************************************************************************


  var ctx = document.getElementById('contentChart').getContext('2d');
  var contentChart = new Chart(ctx, {
    type: 'line',
    data: <?php echo json_encode($chartData1); ?>,
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        x: {
          beginAtZero: true,
        },
        y: {
          beginAtZero: true,
        },
      },
    },
  });

  // *******************************************************************************************************


  var ctx = document.getElementById('ctrChart').getContext('2d');
  var ctrChart = new Chart(ctx, {
    type: 'bar',
    data: <?php echo json_encode($chartData); ?>,
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        x: {
          beginAtZero: true,
        },
        y: {
          beginAtZero: true,
        },
      },
    },
  });

  // *******************************************************************************************************
</script>