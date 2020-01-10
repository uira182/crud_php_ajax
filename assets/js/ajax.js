function Del_agenda(bd) {
    let dados = {};
    dados.del = bd;

    var dadosTexto = JSON.stringify(dados);

    var result = document.getElementById("Resultado");
    var xmlreq = CriaRequest();

    result.innerHTML = '<img src="assets/image/sistem/loading.gif" width="20%" />';

    // Iniciar uma requisição
    xmlreq.open("POST", "assets/function/Contato.php", true);
    xmlreq.setRequestHeader('Content-Type', 'application/json');

    // Atribui uma função para ser executada sempre que houver uma mudança de dado
    xmlreq.onload = function() {
        Busca();
        // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
        if (xmlreq.readyState == 4) {

            // Verifica se o arquivo foi encontrado com sucesso
            if (xmlreq.status == 200) {
                result.innerHTML = xmlreq.responseText;
            } else {
                result.innerHTML = "Erro: " + xmlreq.statusText;
            }
        }
    };
    xmlreq.send(dadosTexto);
}

function Inserir() {
    var dados = {};

    dados.addnome = f_add.addnome.value;
    dados.addtel = f_add.addtel.value;
    dados.addcel = f_add.addcel.value;
    dados.addemail = f_add.addemail.value;

    var dadosTexto = JSON.stringify(dados);

    console.log(dadosTexto);

    var result = document.getElementById("Resultado");
    var xmlreq = CriaRequest();

    result.innerHTML = '<img src="assets/image/sistem/loading.gif" width="20%" />';

    // Iniciar uma requisição
    xmlreq.open("POST", "assets/function/Contato.php", true);
    xmlreq.setRequestHeader('Content-Type', 'application/json');

    // Atribui uma função para ser executada sempre que houver uma mudança de dado
    xmlreq.onload = function() {
        f_add.reset();
        Busca();
        // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
        if (xmlreq.readyState == 4) {

            // Verifica se o arquivo foi encontrado com sucesso
            if (xmlreq.status == 200) {
                result.innerHTML = xmlreq.responseText;
            } else {
                result.innerHTML = "Erro: " + xmlreq.statusText;
            }
        }
    };
    xmlreq.send(dadosTexto);

}

function Busca() {
    var dados = {};
    dados.nome = document.getElementById("txtnome").value;

    var dadosTexto = JSON.stringify(dados);

    //console.log(dadosTexto);

    // Declaração de Variáveis
    var nome = document.getElementById("txtnome").value;
    var result = document.getElementById("Resultado");
    var xmlreq = CriaRequest();

    // Exibi a imagem de progresso
    result.innerHTML = '<img src="assets/image/sistem/loading.gif" width="20%" />';

    // Iniciar uma requisição
    xmlreq.open("POST", "assets/function/Contato.php", true);
    xmlreq.setRequestHeader('Content-Type', 'application/json');

    // Atribui uma função para ser executada sempre que houver uma mudança de dado
    xmlreq.onload = function() {

        // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
        if (xmlreq.readyState == 4) {

            // Verifica se o arquivo foi encontrado com sucesso
            if (xmlreq.status == 200) {
                result.innerHTML = xmlreq.responseText;
            } else {
                result.innerHTML = "Erro: " + xmlreq.statusText;
            }

            var btn_del = document.querySelectorAll("#btn_del");

            for (let bd of btn_del) {
                bd.addEventListener("click", function() {
                    if (confirm("Deseja realmente deletar?")) {
                        Del_agenda(bd.value);
                    }
                });
            }
        }
    };
    xmlreq.send(dadosTexto);
}
/**
 * Função para criar um objeto XMLHTTPRequest
 */
function CriaRequest() {
    try {
        request = new XMLHttpRequest();
    } catch (IEAtual) {

        try {
            request = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (IEAntigo) {

            try {
                request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (falha) {
                request = false;
            }
        }
    }

    if (!request) {
        alert("Seu Navegador não suporta Ajax!");
    } else {
        return request;
    }
}

var f_add = document.forms.f_add;

f_add.addEventListener("submit", function(event) {
    event.preventDefault();
    Inserir();
    Busca();
});

/**
 * Função para enviar os dados
 */
var f_busca = document.forms.f_busca;

f_busca.addEventListener("submit", function(event) {
    event.preventDefault();
    Busca();
});

Busca();