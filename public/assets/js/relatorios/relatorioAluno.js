let chartMelhores;
let chartPiores;
let chartProgressao;

function montarNumeros(json, jsonT) {
    const idProvas = [...new Set(json.map(item => item.id_prova))];

    document.getElementById("nome").innerHTML += `<b>Nome: </b> ${json[0]['nome_aluno']} ${json[0]['sobrenome_aluno']}`
    document.getElementById("turma").innerHTML += `<b>Turma: </b> ${json[0]['nome_turma']}`
    document.getElementById("qtd-provas").innerHTML += `<b>Provas Feitas: </b> ${idProvas.length}`
    document.getElementById("nota-media").innerHTML += `<b>Média Geral: </b> ${json[0]['nome_turma']}`


    const topicos = [...new Set(json.map(item => item.topico_assunto))];
    var mpTopicos = []
    topicos.forEach(tp => {
        a = json.filter(r => r.topico_assunto == tp).reduce(function (acumulador, valor) { return acumulador + parseFloat(valor.correcao_gabarito) }, 0);
        t = jsonT.filter(r => r.topico_assunto == tp).reduce(function (acumulador, valor) { return acumulador + parseFloat(valor.correcao_gabarito) }, 0);

        qt = json.filter(r => r.topico_assunto == tp).length;
        qtt = jsonT.filter(r => r.topico_assunto == tp).length;

        mpTopicos.push({
            topico: tp,
            acert: ((a / qt) * 100).toFixed(1),
            err: (((qt - a) / qt) * 100).toFixed(1),
            acertTurma: ((t / qtt) * 100).toFixed(1),
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
                    height: 300,
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
                    height: 300,
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


    mpTopicos.sort((a, b) => b.err - a.err).forEach((t, index) => {
        var cor = ""
        if (t.err > 60.0) {
            cor = "rgba(205, 145, 145, .5)"
        }
        if (t.err < 60.0 && t.err > 40.0) {
            cor = "rgba(205, 186, 145, .5)"
        }
        if (t.err < 40.0) {
            cor = "none"
        }

        document.getElementById("lista-assuntos").innerHTML +=
            `<tr id="row-${index}" style="background-color:${cor}; ">
                <td>${t.topico}</td>
                <td>${t.acert}%</td>
                <td>${t.acertTurma}%</td>
            </tr>`
    })


    var provas = []
    idProvas.forEach((prova, index) => {
        var certa = 0
        var errada = 0
        var meia = 0
        var cont = 0

        var resultados = json.filter(a => a.id_prova === prova)
        resultados.forEach(aux => {
            if (aux.id_prova === prova && aux.status_questaoProva != "Anulada") {
                switch (aux.correcao_gabarito) {
                    case "1":
                        certa = certa + (1 * aux.peso_questaoProva)
                        break
                    case "0.5":
                        certa = certa + (0.5 * aux.peso_questaoProva)
                        errada = errada + (0.5 * aux.peso_questaoProva)
                        break
                    case "0":
                        errada = errada + (1 * aux.peso_questaoProva)
                        break
                }
                cont = cont + aux.peso_questaoProva
            }
            nota = (aux.notaMax_prova / cont) * certa
        })
        var resultadosTurma = jsonT.filter(t => t.id_prova === prova)
        resultadosTurma.forEach(aux => {
            if (aux.id_prova === prova && aux.status_questaoProva != "Anulada") {
                switch (aux.correcao_gabarito) {
                    case "1":
                        certa = certa + (1 * aux.peso_questaoProva)
                        break
                    case "0.5":
                        certa = certa + (0.5 * aux.peso_questaoProva)
                        errada = errada + (0.5 * aux.peso_questaoProva)
                        break
                    case "0":
                        errada = errada + (1 * aux.peso_questaoProva)
                        break
                }
                cont = cont + aux.peso_questaoProva
            }
            notaTurma = (aux.notaMax_prova / cont) * certa
        })
        provas.push({
            data: resultados[0]['data_prova'],
            nota: nota.toFixed(1),
            notaTurma: notaTurma.toFixed(1)
        })
    })

    var options = {
        series: [{
            name: "Aluno",
            data: provas.sort((a, b) => new Date(a.data) - new Date(b.data)).map(p => p.nota)
        }, {
            name: "Turma",
            data: provas.sort((a, b) => new Date(a.data) - new Date(b.data)).map(p => p.notaTurma)
        }],
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            },
            animations: {
                enabled: false
            },
        },
        dataLabels: {
            enabled: true
        },
        stroke: {
            curve: 'straight'
        },
        title: {
            text: 'Evolução',
            align: 'left'
        },
        xaxis: {
            categories: provas.sort((a, b) => new Date(a.data) - new Date(b.data)).map(p => new Date(p.data).toLocaleDateString('pt-BR')),
            tickPlacement: 'between'
        },
        yaxis: {
            show: false
        },
        fill: {
            colors: ['#5B009B', '#91CD93']
        },
        markers: {
            size: 1
        },
        tooltip: {
            enabled: false
        }
    };

    chartProgressao = new ApexCharts(document.querySelector("#progresso-tempo"), options);
    chartProgressao.render();

    mpTopicos.filter(tp => tp.err > 60.0).sort((a, b) => b.err - a.err).forEach((t, index) => {
        var questoesCrit = json.filter(q => q.topico_assunto === t.topico)

        questoesCrit.forEach((qc, index) => {
            var respostaEscolhida = ""
            switch (qc.respostaAluno_gabarito) {
                case 'respostaUm_questao':
                    respostaEscolhida = 'A'
                    break
                case 'respostaDois_questao':
                    respostaEscolhida = 'B'
                    break
                case 'respostaTres_questao':
                    respostaEscolhida = 'C'
                    break
                case 'respostaQuatro_questao':
                    respostaEscolhida = 'D'
                    break
                case 'respostaCinco_questao':
                    respostaEscolhida = 'E'
                    break
            }

            var respostaCerta = ""
            switch (qc.respostaCerta_questao) {
                case 'respostaUm_questao':
                    respostaCerta = 'A'
                    break
                case 'respostaDois_questao':
                    respostaCerta = 'B'
                    break
                case 'respostaTres_questao':
                    respostaCerta = 'C'
                    break
                case 'respostaQuatro_questao':
                    respostaCerta = 'D'
                    break
                case 'respostaCinco_questao':
                    respostaCerta = 'E'
                    break
            }

            if(respostaCerta !== respostaEscolhida){
                document.getElementById("lista-questoes").innerHTML +=
                    `<tr id="row-${index}"">
                        <td>${qc.topico_assunto}</td>
                        <td>${respostaEscolhida}</td>
                        <td>${respostaCerta}</td>
                        <td><a href="/relatorio/questao/${qc.id_questaoProva}" class="btn btn-row">Detalhar</a></td>
                    </tr>`
            }
        })
    })
}

function atualizarRelatorioAluno(json, jsonT) {
    const idProvas = [...new Set(json.map(item => item.id_prova))];

    const topicos = [...new Set(json.map(item => item.topico_assunto))];
    var mpTopicos = []
    topicos.forEach(tp => {
        a = json.filter(r => r.topico_assunto == tp).reduce(function (acumulador, valor) { return acumulador + parseFloat(valor.correcao_gabarito) }, 0);
        t = jsonT.filter(r => r.topico_assunto == tp).reduce(function (acumulador, valor) { return acumulador + parseFloat(valor.correcao_gabarito) }, 0);

        qt = json.filter(r => r.topico_assunto == tp).length;
        qtt = jsonT.filter(r => r.topico_assunto == tp).length;

        mpTopicos.push({
            topico: tp,
            acert: ((a / qt) * 100).toFixed(1),
            err: (((qt - a) / qt) * 100).toFixed(1),
            acertTurma: ((t / qtt) * 100).toFixed(1),
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

    document.getElementById("lista-assuntos").innerHTML = ''
    mpTopicos.sort((a, b) => b.err - a.err).forEach((t, index) => {
        var cor = ""
        if (t.err > 60.0) {
            cor = "rgba(205, 145, 145, .5)"
        }
        if (t.err < 60.0 && t.err > 40.0) {
            cor = "rgba(205, 186, 145, .5)"
        }
        if (t.err < 40.0) {
            cor = "none"
        }

        document.getElementById("lista-assuntos").innerHTML +=
            `<tr id="row-${index}" style="background-color:${cor}; ">
                <td>${t.topico}</td>
                <td>${t.acert}%</td>
                <td>${t.acertTurma}%</td>
            </tr>`
    })

    var provas = []
    idProvas.forEach((prova, index) => {
        var certa = 0
        var errada = 0
        var meia = 0
        var cont = 0

        var resultados = json.filter(a => a.id_prova === prova)
        resultados.forEach(aux => {
            if (aux.id_prova === prova && aux.status_questaoProva != "Anulada") {
                switch (aux.correcao_gabarito) {
                    case "1":
                        certa = certa + (1 * aux.peso_questaoProva)
                        break
                    case "0.5":
                        certa = certa + (0.5 * aux.peso_questaoProva)
                        errada = errada + (0.5 * aux.peso_questaoProva)
                        break
                    case "0":
                        errada = errada + (1 * aux.peso_questaoProva)
                        break
                }
                cont = cont + aux.peso_questaoProva
            }
            nota = (aux.notaMax_prova / cont) * certa
        })
        var resultadosTurma = jsonT.filter(t => t.id_prova === prova)
        resultadosTurma.forEach(aux => {
            if (aux.id_prova === prova && aux.status_questaoProva != "Anulada") {
                switch (aux.correcao_gabarito) {
                    case "1":
                        certa = certa + (1 * aux.peso_questaoProva)
                        break
                    case "0.5":
                        certa = certa + (0.5 * aux.peso_questaoProva)
                        errada = errada + (0.5 * aux.peso_questaoProva)
                        break
                    case "0":
                        errada = errada + (1 * aux.peso_questaoProva)
                        break
                }
                cont = cont + aux.peso_questaoProva
            }
            notaTurma = (aux.notaMax_prova / cont) * certa
        })
        provas.push({
            data: resultados[0]['data_prova'],
            nota: nota.toFixed(1),
            notaTurma: notaTurma.toFixed(1)
        })
    })
    console.log(provas.sort((a, b) => new Date(a.data) - new Date(b.data)).map(p => new Date(p.data).toLocaleDateString('pt-BR')))
    if (chartProgressao) {
        chartProgressao.updateSeries([{
            name: "Aluno",
            data: provas.sort((a, b) => new Date(a.data) - new Date(b.data)).map(p => p.nota)
        }, {
            name: "Turma",
            data: provas.sort((a, b) => new Date(a.data) - new Date(b.data)).map(p => p.notaTurma)
        }]);
        chartProgressao.updateOptions({
            xaxis: {
                categories: provas.sort((a, b) => new Date(a.data) - new Date(b.data)).map(p => new Date(p.data).toLocaleDateString('pt-BR'))
            }
        }, true)
    }
}