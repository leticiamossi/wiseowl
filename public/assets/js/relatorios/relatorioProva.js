function montarNumeros(json) {

  const alunos = [...new Set(json.map(item => item.id_aluno))];

  document.getElementById("materia").innerHTML += "<b>Prova:</b> " + json[0]['nome_materia'] + " - " + json[0]['observacao_prova']

  const data = new Date(json[0]['data_prova'])
  document.getElementById("data").innerHTML += "<b>Aplicaçao:</b> " + data.toLocaleDateString("pt-BR")
  document.getElementById("turma").innerHTML += "<b>Turma:</b> " + json[0]['nome_turma']
  document.getElementById("qtd-alunos").innerHTML += "<b>Gabaritos Inseridos:</b> " + alunos.length
  document.getElementById("nota-max").innerHTML += "<b>Nota Máxima:</b> " + json[0]['notaMax_prova']
  document.getElementById("nota-media").innerHTML += "<b>Nota Aprovaçao:</b> " + json[0]['notaMed_prova']

  notas = []
  alunos.forEach(aluno => {
    var certa = 0
    var errada = 0
    var cont = 0

    var gabarito = json.filter(g => g.id_aluno === aluno);
    gabarito.forEach(gab => {
      switch (gab.correcao_gabarito) {
        case "1":
          certa = certa + (1 * gab.peso_questaoProva)
          break
        case "0.5":
          certa = certa + (0.5 * gab.peso_questaoProva)
          errada = errada + (0.5 * gab.peso_questaoProva)
          break
        case "0":
          errada = errada + (1 * gab.peso_questaoProva)
          break
      }
      cont = cont + gab.peso_questaoProva
    })
    var nota = (json[0]['notaMax_prova'] / cont) * certa
    notas.push({
      id: aluno,
      nota: nota.toFixed(1)
    })
  })

  var media = notas.reduce((acumulador, nota) => acumulador + parseFloat(nota.nota), 0) / notas.length
  document.getElementById("media").innerHTML +=
    `
    <p class="titulo-cartao">Média</p>
    <p class="numero-cartao">${media.toFixed(1)}</p>
    `;

  document.getElementById("maior-nota").innerHTML +=
    `
    <p class="titulo-cartao">Maior Nota</p>
    <p class="numero-cartao">${Math.max(...notas.map(n => n.nota))}</p>
    `;

  document.getElementById("menor-nota").innerHTML +=
    `
    <p class="titulo-cartao">Menor Nota</p>
    <p class="numero-cartao">${Math.min(...notas.map(n => n.nota))}</p>
    `;


  var range = json[0]['notaMax_prova'] / 5
  var aux = 0
  var categorias = []
  var dados = []
  while (aux < json[0]['notaMax_prova']) {
    var min = aux
    aux = aux + range
    categorias.push(min + "-" + aux)
    dados.push(notas.filter(n => n.nota >= min && n.nota <= aux).length)
  }

  var options = {
    series: [{
      name: 'Quantidade',
      data: dados
    }],
    chart: {
      height: 350,
      width: '100%',
      type: 'bar',
      animations: {
        enabled: false,
      }
    },
    tooltip: {
      enabled: false,
    },
    plotOptions: {
      bar: {
        borderRadius: 10,
        dataLabels: {
          position: 'top', // top, center, bottom
        },
      }
    },
    dataLabels: {
      enabled: true,
      formatter: function (val) {
        return val;
      },
      offsetY: -30,
      style: {
        fontSize: '12px',
        colors: ["#304758"]
      }
    },
    colors: ['#91CD93'],
    xaxis: {
      categories: categorias,
      position: 'bottom',
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
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
      }

    },
    title: {
      text: 'Distribuiçao de Notas',
      floating: true,
      offsetY: 0,
      align: 'left',
      style: {
        color: '#444'
      }
    }
  };

  var chartDistribuicaoNota = new ApexCharts(document.querySelector("#distribuicao-nota"), options);
  chartDistribuicaoNota.render();


  const assuntos = [...new Set(json.map(item => item.assunto_assunto))];
  distribuicaoAss = []
  assuntos.forEach(ass => {
    var aux = json.filter(a => a.assunto_assunto === ass)
    var acert = aux.reduce((acumulador, valor) => acumulador + parseFloat(valor.correcao_gabarito), 0)
    distribuicaoAss.push(acert)
  })

  var options = {
    series: [{
      name: 'Acertos',
      data: distribuicaoAss,
    }],
    chart: {
      height: 350,
      width: '100%',
      type: 'radar',
      animations: {
        enabled: false,
      }
    },
    tooltip: {
      enabled: false,
    },
    title: {
      text: 'Acertos por Assunto'
    },
    yaxis: {
      stepSize: Math.max(...distribuicaoAss) / 4
    },
    xaxis: {
      categories: assuntos
    },
    colors: ['#5B009B']
  };

  var chart = new ApexCharts(document.querySelector("#radar-assunto"), options);
  chart.render();
}

function montarListaQuestoes(json) {
  const idQuestao = [...new Set(json.map(item => item.id_questaoProva))];

  idQuestao.forEach((questao, index) => {
    var count = json.filter(q => q.id_questaoProva === questao).length

    var certa = json.filter(q => q.id_questaoProva === questao && (q.correcao_gabarito === "1")).length
    var meia = json.filter(q => q.id_questaoProva === questao && (q.correcao_gabarito === "0.5")).length
    var errada = count - (certa + meia)

    certa = ((certa + meia) / count) * 100
    errada = (errada / count) * 100
    var cor = ""

    if (errada < 60.0 && errada > 40.0) {
      cor = "rgba(204, 161, 75, .4)"
    }
    if (errada > 60.0) {
      cor = "rgba(204, 94, 75, .4)"
    }

    var info = json.filter(q => q.id_questaoProva === questao)

    var resultadosQuestao = ""
    if (info[0]['status_questaoProva'] !== 'Anulada') {
      resultadosQuestao = `<td style="display: flex; justify-content: center; gap:15px;">
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
              </td>`
    } else {
      resultadosQuestao = "<td>Anulada</td>";
    }

    document.getElementById("lista-questoes").innerHTML +=
      `<tr id="row-${index}" style="background-color:${cor}; ">
          <td>${index + 1}</td>
          <td>${info[0]['assunto_assunto']}</td>
          ${resultadosQuestao}
          <td><a href="/relatorio/questao/${questao}" class="btn btn-row">Detalhar</a></td>
      </tr>`

  })
}

function montarListaAlunos(json) {
  const idAlunos = [...new Set(json.map(item => item.id_aluno))];

  idAlunos.forEach((aluno, index) => {
    var certa = 0
    var errada = 0
    var meia = 0
    var cont = 0

    var resultados = json.filter(a => a.id_aluno === aluno)
    resultados.forEach(aux => {
      if (aux.id_aluno === aluno && aux.status_questaoProva != "Anulada") {
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
    certa = (certa / cont) * 100
    errada = (errada / cont) * 100

    var cor = ""
    var notaMed = json[0]['notaMed_prova']

    if (nota < notaMed) {
      cor = "rgba(204, 161, 75, .4)"
    }
    if (nota < notaMed / 2) {
      cor = "rgba(204, 94, 75, .4)"
    }

    var info = json.filter(a => a.id_aluno === aluno)
    document.getElementById("lista-alunos").innerHTML +=
      `<tr id="row-${index}" style="background-color:${cor}; ">
          <td>${info[0]['nome_aluno']} ${info[0]['sobrenome_aluno']}</td>
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
            <td>${nota.toFixed(1)}</td>
          <td><a href="/relatorio/aluno/${aluno}" class="btn btn-row">Detalhar</a></td>
      </tr>`

  })
}