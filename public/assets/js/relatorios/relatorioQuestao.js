function montarNumeros(json) {
    console.log(json)
    const alunos = [...new Set(json.map(item => item.id_aluno))];

    document.getElementById("materia").innerHTML += "<b>Prova:</b> " + json[0]['nome_materia'] + " - " + json[0]['observacao_prova']

    const data = new Date(json[0]['data_prova'])
    document.getElementById("data").innerHTML += "<b>Aplicaçao:</b> " + data.toLocaleDateString("pt-BR")
    document.getElementById("turma").innerHTML += "<b>Turma:</b> " + json[0]['nome_turma']
    document.getElementById("qtd-alunos").innerHTML += "<b>Gabaritos Inseridos:</b> " + alunos.length
    document.getElementById("nota-max").innerHTML += "<b>Nota Máxima:</b> " + json[0]['notaMax_prova']
    document.getElementById("nota-media").innerHTML += "<b>Nota Aprovaçao:</b> " + json[0]['notaMed_prova']

    if (json[0]['questao_questao'] === null) {
        document.getElementById("questao").innerHTML += "<b>Pergunta: </b> " + json[0]['questao_questaoDesc']
    } else {
        document.getElementById("questao").innerHTML += "<b>Pergunta: </b> " + json[0]['questao_questao']
    }

    const opcoes = [{
        letra: 'a)',
        resp: 'respostaUm_questao',
    }, {
        letra: 'b)',
        resp: 'respostaDois_questao',
    }, {
        letra: 'c)',
        resp: 'respostaTres_questao',
    }, {
        letra: 'd)',
        resp: 'respostaQuatro_questao',
    }, {
        letra: 'e)',
        resp: 'respostaCinco_questao'
    }]

    opcoes.forEach(op => {
        var marcacao = json.filter(r => r.respostaAluno_gabarito === op.resp).length
        var tamanho = (marcacao / alunos.length) * 100

        var cor = "#CD9191";
        if (json[0]['respostaCerta_questao'] === op.resp) {
            cor = "#91CD93";
        }

        document.getElementById("opcoes-resposta").innerHTML +=
            `
        <p style="background-color: ${cor}; border-radius: 10px; padding: 5px 10px"><b>${op.letra}</b> ${json[0][op.resp]}</p>
        <div style="display: flex; flex-direction:row; align-items:center; gap: 10px; margin-bottom: 50px"><p style="width: ${tamanho}%; height: 40px; background-color: ${cor};"></p><p>${marcacao}</p></div>
        `
    })

}

function montarListaAlunos(json) {
    
    const idAlunos = [...new Set(json.map(item => item.id_aluno))];
    
    idAlunos.forEach((aluno, index) => {
        var cor = "$000"
        
        var info = json.filter(a => a.id_aluno === aluno)
        if(info[0]['respostaAluno_gabarito'] === info[0]['respostaCerta_questao']){
            cor = "rgba(145, 205, 147, .5)"
        } else {
            cor = "rgba(205, 145, 145, .5)"
        }

        var respostaEscolhida = ""
        switch(info[0]['respostaAluno_gabarito']){
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

        document.getElementById("lista-alunos").innerHTML +=
            `<tr id="row-${index}" style="background-color:${cor}; ">
            <td>${info[0]['nome_aluno']} ${info[0]['sobrenome_aluno']}</td>
            <td>${respostaEscolhida}</td>
            <td><a href="/relatorio/aluno/${aluno}" class="btn btn-row">Detalhar</a></td>
        </tr>`

    })
}