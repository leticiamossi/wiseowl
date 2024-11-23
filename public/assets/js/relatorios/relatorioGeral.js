let chartTurma;
let chartMelhores;
let chartPiores;

function montarRelatorioGeral(json) {

    //turmas 
    const turmas = [...new Set(json.map(item => item.nome_turma))];

    //media acertos 
    var mediaAcertos = []
    turmas.forEach(t => {
        var acertos = json.filter(r => r.nome_turma == t).reduce(function (acumulador, valor) { return acumulador + parseFloat(valor.correcao_gabarito) }, 0)
        var qtd = json.filter(r => r.nome_turma == t).length
        mediaAcertos.push(((acertos / qtd) * 100).toFixed(1))
    })

    var options = {
        series: [{
            name: 'MediaAcertos',
            data: mediaAcertos
        }],
        chart: {
            height: 350,
            type: 'bar',
            animations: {
                enabled: false
            }
        },
        plotOptions: {
            bar: {
                borderRadius: 10,
                dataLabels: {
                    position: 'top', // top, center, bottom
                },
            }
        },
        fill: {
            colors: ['#91CD93', '#CD9191', '#91C2CD', '#CD91C7', '#A191CD'],
        },
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                return val + "%";
            },
            offsetY: -20,
            style: {
                fontSize: '12px',
                colors: ["#304758"]
            }
        },

        xaxis: {
            categories: turmas,
            position: 'bottom',
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false
            },
            crosshairs: {
                fill: {
                    type: 'gradient',
                    gradient: {
                        colorFrom: '#D8E3F0',
                        colorTo: '#BED1E6',
                        stops: [0, 100],
                        opacityFrom: 0.4,
                        opacityTo: 0.5,
                    }
                }
            },
            tooltip: {
                enabled: false,
            }
        },
        yaxis: {
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false,
            },
            labels: {
                show: false,
                formatter: function (val) {
                    return val;
                }
            }

        },
        title: {
            text: 'Média de acertos por turma',
            floating: true,
            offsetY: 0,
            align: 'center',
            style: {
                color: '#444'
            }
        }
    };

    chartTurma = new ApexCharts(document.querySelector("#media-turma"), options);
    chartTurma.render();


    //////

    //topicos
    const topicos = [...new Set(json.map(item => item.topico_assunto))];
    var mpTopicos = []
    topicos.forEach(tp => {
        a = json.filter(r => r.topico_assunto == tp).reduce(function (acumulador, valor) { return acumulador + parseFloat(valor.correcao_gabarito) }, 0);
        qt = json.filter(r => r.topico_assunto == tp).length;
        mpTopicos.push({
            topico: tp,
            acert: ((a / qt) * 100).toFixed(1),
            err: (((qt - a) / qt) * 100).toFixed(1)
        })
    })

    var melhores = mpTopicos.sort((a, b) => b.acert - a.acert).slice(0, 4)
    var piores = mpTopicos.sort((a, b) => b.err - a.err).slice(0, 4)

    var options = {
        title: {
            text: "Melhores Tópicos",
            align: "center"
        },
        series: melhores.map(a => a.acert),
        chart: {
            height: 300,
            type: 'radialBar',
            animations: {
                enabled: false
            }
        },
        plotOptions: {
            radialBar: {
                offsetY: 0,
                startAngle: 0,
                endAngle: 270,
                hollow: {
                    margin: 5,
                    size: '30%',
                    background: 'transparent',
                    image: undefined,
                },
                dataLabels: {
                    name: {
                        show: false,
                    },
                    value: {
                        show: false,
                    }
                },
                barLabels: {
                    enabled: true,
                    useSeriesColors: true,
                    offsetX: -8,
                    fontSize: '16px',
                    formatter: function (seriesName, opts) {
                        return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex] + "%"
                    },
                },
            }
        },
        fill: {
            opacity: 1,
            colors: ['#91CD93', '#CD9191', '#91C2CD', '#CD91C7', '#A191CD']
        },
        labels: melhores.map(a => a.topico),
        responsive: [{
            breakpoint: 480,
            options: {
                legend: {
                    show: false
                },
                chart: {
                    height: 300
                }
            }
        }, {
            breakpoint: 1000,
            options: {
                chart: {
                    height: 390,
                }
            }
        }]
    };

    chartMelhores = new ApexCharts(document.querySelector("#melh-ass"), options);
    chartMelhores.render();

    var options = {
        title: {
            text: "Tópicos Críticos",
            align: "center"
        },
        series: piores.map(a => a.acert),
        chart: {
            height: 300,
            type: 'radialBar',
            animations: {
                enabled: false
            }
        },
        plotOptions: {
            radialBar: {
                offsetY: 0,
                startAngle: 0,
                endAngle: 270,
                hollow: {
                    margin: 5,
                    size: '30%',
                    background: 'transparent',
                    image: undefined,
                },
                dataLabels: {
                    name: {
                        show: false,
                    },
                    value: {
                        show: false,
                    }
                },
                barLabels: {
                    enabled: true,
                    useSeriesColors: true,
                    offsetX: -8,
                    fontSize: '16px',
                    formatter: function (seriesName, opts) {
                        return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex] + "%"
                    },
                },
            }
        },
        fill: {
            opacity: 1,
            colors: ['#91CD93', '#CD9191', '#91C2CD', '#CD91C7', '#A191CD']
        },
        labels: piores.map(a => a.topico),
        responsive: [{
            breakpoint: 480,
            options: {
                legend: {
                    show: false
                },
                chart: {
                    height: 300
                }
            }
        }, {
            breakpoint: 1000,
            options: {
                chart: {
                    height: 390,
                }
            }
        }]
    };

    chartPiores = new ApexCharts(document.querySelector("#crit-ass"), options);
    chartPiores.render();
}

function atualizarRelatorioGeral(json) {
    //turmas 
    const turmas = [...new Set(json.map(item => item.nome_turma))];

    //media acertos 
    var mediaAcertos = []
    turmas.forEach(t => {
        var acertos = json.filter(r => r.nome_turma == t).reduce(function (acumulador, valor) { return acumulador + parseFloat(valor.correcao_gabarito) }, 0)
        var qtd = json.filter(r => r.nome_turma == t).length
        mediaAcertos.push(((acertos / qtd) * 100).toFixed(1))
    })

    if (chartTurma) {
        chartTurma.updateSeries([{
            name: 'MediaAcertos',
            data: mediaAcertos
        }]);
        chartTurma.updateOptions({
            xaxis: {
                categories: turmas,
            }
        })
    }

    //topicos
    const topicos = [...new Set(json.map(item => item.topico_assunto))];
    var mpTopicos = []
    topicos.forEach(tp => {
        a = json.filter(r => r.topico_assunto == tp).reduce(function (acumulador, valor) { return acumulador + parseFloat(valor.correcao_gabarito) }, 0);
        qt = json.filter(r => r.topico_assunto == tp).length;
        mpTopicos.push({
            topico: tp,
            acert: ((a / qt) * 100).toFixed(1),
            err: (((qt - a) / qt) * 100).toFixed(1)
        })
    })

    var melhores = mpTopicos.sort((a, b) => b.acert - a.acert).slice(0, 4)
    var piores = mpTopicos.sort((a, b) => b.err - a.err).slice(0, 4)

    if (chartMelhores) {
        chartMelhores.updateSeries(melhores.map(a => a.acert));
        chartMelhores.updateOptions({
            labels: melhores.map(a => a.topico),
        })
    }

    if (chartPiores) {
        chartPiores.updateSeries(piores.map(a => a.acert));
        chartPiores.updateOptions({
            labels: piores.map(a => a.topico),
        })
    }
}

function montarListaProvas(json) {
    const idProvas = [...new Set(json.map(item => item.id_prova))];
    document.getElementById("lista-provas").innerHTML = ''

    idProvas.forEach((prova, index) => {
        var count = json.filter(p => p.id_prova === prova).length

        var certa = json.filter(p => p.id_prova === prova && (p.correcao_gabarito === "1")).length
        var meia = json.filter(p => p.id_prova === prova && (p.correcao_gabarito === "0.5")).length
        var errada = count - (certa + meia)

        certa = ((certa+meia)/count)*100
        errada = (errada/count)*100
        var cor = ""

        if(errada < 60.0 && errada > 40.0){
            cor = "rgba(204, 161, 75, .4)"
        } 
        if(errada > 60.0){
            cor = "rgba(204, 94, 75, .4)"
        }

        var info = json.filter(p => p.id_prova === prova)
        document.getElementById("lista-provas").innerHTML +=
            `<tr id="row-${index}" style="background-color:${cor}; ">
            <td>${info[0]['data_prova']}</td>
            <td>${info[0]['nome_materia'] + " - " + info[0]['nome_turma']}</td>
            <td>${info[0]['observacao_prova']}</td>
            <td style="display: flex; justify-content: center; gap:15px;">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#035e00" class="bi bi-check-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
                        </svg> ${(certa).toFixed(1)}% 
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#780800" class="bi bi-x-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                        </svg> ${(errada).toFixed(1)}%
                    </div>
                </td>
            <td><a href="/relatorio/prova/${prova}" class="btn btn-row">Detalhar</a></td>
        </tr>`

    })
}