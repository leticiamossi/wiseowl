function montarRelatorio(json, index) {
  const assuntos = [...new Set(json.map(item => item.assunto_assunto))];


  var composicao = [];
  assuntos.forEach((ass) => {
    var count = json.filter(a => a.assunto_assunto === ass).length
    var certa = json.filter(a => a.assunto_assunto === ass && (a.correcao_gabarito === "1" || a.correcao_gabarito === "0.5")).length
    composicao.push({ name: ass, data: [count, certa] });
  })
  console.log(composicao)

  var optionsComp = {
    series: composicao,
    title: {
      text: "Composição",
      floating: true,
      style: {
        color: '#5B009B'
      }
    },
    chart: {
      type: 'bar',
      height: 150,
      stacked: true,
      stackType: '100%'
    },
    plotOptions: {
      bar: {
        horizontal: true,
        borderRadius: 20,
        borderRadiusApplication: 'end',
      },
    },
    stroke: {
      width: 0,
    },
    fill: {
      opacity: 1,
      colors: ['#91CD93', '#CD9191', '#91C2CD', '#CD91C7', '#A191CD']
    },
    grid: {
      show: false
    },
    dataLabels: {
      enabled: true,
      style: {
        colors: ["#5B009B"]
      },
      formatter: function (val, { seriesIndex, dataPointIndex, w }) {
        return w.config.series[seriesIndex].name + ' - ' + val.toFixed(1) + "%"
      },
    },
    xaxis: {
      categories: ['Prova', 'Nota'],
      labels: {
        show: false
      },
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      }
    },
    yaxis: {
      labels: {
        show: true
      }
    },
    legend: {
      show: false
    },
    tooltip: {
      enabled: false
    },
    responsive: [{
      breakpoint: 1000,
      options: {
        chart: {
          height: 350,
        },
        plotOptions: {
          bar: {
            horizontal: false,
          },
        },
        dataLabels: {
          offsetY: 0
        },
        xaxis: {
          categories: ['Prova', 'Nota'],
          labels: {
            show: true,
          },
        },
        yaxis: {
          labels: {
            show: false
          }
        },
      }
    }]
  };

  var chartComp = new ApexCharts(document.querySelector("#composicao-" + index), optionsComp);
  chartComp.render();


  var arrCertas = [];
  var arrErradas = [];

  assuntos.forEach((ass) => {
    var certa = json.filter(a => a.assunto_assunto === ass && a.correcao_gabarito === "1").length
    var errada = json.filter(a => a.assunto_assunto === ass && a.correcao_gabarito === "0").length
    var meia = json.filter(a => a.assunto_assunto === ass && a.correcao_gabarito === "0.5").length
    certa = certa + (meia / 2)
    errada = errada + (meia / 2)

    arrCertas.push(certa)
    arrErradas.push(errada)
  })

  var optionsCompa = {
    series: [{
      name: 'Certas',
      data: arrCertas
    }, {
      name: 'Erradas',
      data: arrErradas
    }],
    title: {
      text: "Certas x Erradas",
      floating: true,
      style: {
        color: '#5B009B'
      }
    },
    chart: {
      type: 'bar',
      height: 300,
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '60%',
        endingShape: 'rounded'
      },
    },
    dataLabels: {
      enabled: true,
      textAnchor: 'middle',
    },
    fill: {
      colors: ["#5B009B", "#91CD93"]
    },
    grid: {
      show: false
    },
    stroke: {
      show: true,
      width: 2,
      colors: ['transparent']
    },
    xaxis: {
      categories: assuntos,
    },
    yaxis: {
      show: false
    },
    tooltip: {
      enabled: false
    },
    legend: {
      position: 'top',
      markers: {
        shape: 'circle',
        strokeWidth: 0
      }
    },
    responsive: [{
      breakpoint: 1000,
      options: {
        legend: {
          position: 'bottom',
        },
        plotOptions: {
          bar: {
            horizontal: true,
          },
        },
        xaxis: {
          labels: {
            show: false
          },
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          }
        },
        yaxis: {
          categories: assuntos,
        },
      },
    }]
  };

  var chartCompa = new ApexCharts(document.querySelector("#comparacao-" + index), optionsCompa);
  chartCompa.render();




}