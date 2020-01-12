/* Professor Uirá - TELA DE CADASTRO DE CLIENTE */

/************************************************************************/
/*                                                                      */
/*                   Função de Busca de Cliente                         */
/*                                                                      */
/************************************************************************/

function Busca() {
    var dados = {};
    dados.operacao = "BuscaCli";
    dados.nome = document.getElementById("txtNome").value;

    var dadosTexto = JSON.stringify(dados);

    //console.log(dadosTexto);

    // Declaração de Variáveis
    var nome = document.getElementById("txtNome").value;
    var result = document.getElementById("Resultado");
    var xmlreq = CriaRequest();

    // Exibi a imagem de progresso
    result.innerHTML = '<img src="assets/image/sistem/loading.gif" width="20%" />';

    // Iniciar uma requisição
    xmlreq.open("POST", "assets/function/dashboard.php", true);
    xmlreq.setRequestHeader('Content-Type', 'application/json');

    // Atribui uma função para ser executada sempre que houver uma mudança de dado
    xmlreq.onload = function() {

        // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
        if (xmlreq.readyState == 4) {

            // Verifica se o arquivo foi encontrado com sucesso
            if (xmlreq.status == 200) {

                result.innerHTML = xmlreq.responseText;

                var btn_del = document.querySelectorAll("#btn_del");

                for (let cli of btn_del) {
                    cli.addEventListener("click", function() {
                        if (confirm("Deseja realmente deletar?")) {
                            deletarCliente(cli.value);
                        }
                    });
                }

            } else {
                result.innerHTML = "Erro: " + xmlreq.statusText;
            }

        }
    };
    xmlreq.send(dadosTexto);
}

/************************************************************************/
/*                                                                      */
/*                   Pagina de forulario de cadastro                    */
/*                                                                      */
/************************************************************************/

function PrimeiraPagina(tela) {
    var dados = {};
    if (!tela) {
        dados.tela = "PrimeiraPagina";
    } else {
        dados.tela = tela;
    }

    var dadosTexto = JSON.stringify(dados);

    //console.log(dadosTexto);

    // Declaração de Variáveis
    var dados = document.getElementById("TelaCliente");
    var xmlreq = CriaRequest();

    // Exibi a imagem de progresso
    //dados.innerHTML = '<img src="assets/image/sistem/loading.gif" width="20%" />';

    // Iniciar uma requisição
    xmlreq.open("POST", "assets/function/dashboard.php", true);
    xmlreq.setRequestHeader('Content-Type', 'application/json');

    // Atribui uma função para ser executada sempre que houver uma mudança de dado
    xmlreq.onload = function() {

        // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
        if (xmlreq.readyState == 4) {

            // Verifica se o arquivo foi encontrado com sucesso
            if (xmlreq.status == 200) {

                dados.innerHTML = xmlreq.responseText;

                /*let j = xmlreq.responseText;
                j = JSON.parse(j);
                for (let cliente of j) {
                    console.log(cliente.nome);
                }*/

            } else {
                dados.innerHTML = "Erro: " + xmlreq.statusText;
            }

        }
    };
    xmlreq.send(dadosTexto);
}


/************************************************************************/
/*                                                                      */
/*                   Funçao de Cadastro de Cliente                      */
/*                                                                      */
/************************************************************************/

function cadastrarCliente() {

    var dados = {};

    dados.operacao = formularioCadastro.btnAdd.value;
    dados.nome = formularioCadastro.nome.value;
    dados.email = formularioCadastro.email.value;
    dados.sexo = formularioCadastro.sexo.value;
    dados.celular = formularioCadastro.celular.value;
    dados.telefone = formularioCadastro.telefone.value;
    dados.endereco = formularioCadastro.endereco.value;
    dados.numero = formularioCadastro.numero.value;
    dados.bairro = formularioCadastro.bairro.value;
    dados.complemento = formularioCadastro.complemento.value;
    dados.estado = formularioCadastro.estado.value;
    dados.cidade = formularioCadastro.cidade.value;
    dados.cep = formularioCadastro.cep.value;
    dados.data_nascimento = formularioCadastro.data_nascimento.value;

    var dadosTexto = JSON.stringify(dados);

    //console.log(dadosTexto);

    var result = document.getElementById("Resultado");
    var xmlreq = CriaRequest();

    result.innerHTML = '<img src="assets/image/sistem/loading.gif" width="20%" />';

    // Iniciar uma requisição
    xmlreq.open("POST", "assets/function/dashboard.php", true);
    xmlreq.setRequestHeader('Content-Type', 'application/json');

    // Atribui uma função para ser executada sempre que houver uma mudança de dado
    xmlreq.onload = function() {

        formularioCadastro.reset(); // Atualiza o formulario deixando em branco.
        $("#cep").prop("disabled", false);
        $("#endereco").prop("disabled", true);
        $("#numero").prop("disabled", true);
        $("#bairro").prop("disabled", true);
        $("#complemento").prop("disabled", true);
        $("#cidade").prop("disabled", true);
        $("#estado").prop("disabled", true);

        Busca(); // Executa a função de busca de usuario e exibe logo em seguida.

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

/************************************************************************/
/*                                                                      */
/*                    Função de Exclusão de Cliente                     */
/*                                                                      */
/************************************************************************/

function deletarCliente(bd) {

    let dados = {};
    dados.operacao = "DeletarCli";
    dados.del = bd;

    var dadosTexto = JSON.stringify(dados);

    var result = document.getElementById("Resultado");
    var xmlreq = CriaRequest();

    result.innerHTML = '<img src="assets/image/sistem/loading.gif" width="20%" />';

    // Iniciar uma requisição
    xmlreq.open("POST", "assets/function/dashboard.php", true);
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


/************************************************************************/
/*                                                                      */
/*              Função para criar um objeto XMLHTTPRequest              */
/*                                                                      */
/************************************************************************/

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

/************************************************************************/
/*                                                                      */
/*                              COMANDOS                                */
/*                                                                      */
/************************************************************************/

/*             Iniciar com uma busca de todos os clientes               */

PrimeiraPagina(); // Ao entrar seleciona a tela de cadastro.
Busca(); // Ao entrar na tela executara a função de busca para exibir todos os clientes cadastrados.

/************************************************************************/

/*                         Busca de Clientes                            */

var f_busca = document.forms.f_busca; // Captura o elemento do formulario de pesquisa do menu.

f_busca.addEventListener("submit", function(event) { // Quando Executar o formulario de pesquisa.
    event.preventDefault(); // Não deixa executar o formulario e atualizar.
    Busca(); // Executa a função de busca de usuario e exibe logo em seguida.
});

/************************************************************************/

/*                        Cadastro de Clientes                          */

var formularioCadastro = document.forms.formularioCadastro; // Captura o elemento do formulario de cadastro da tela cadCli.

formularioCadastro.addEventListener("submit", function(event) { // Quando executado o formulario de cadastro.
    event.preventDefault(); // Paraliza a execução e atualização do formulario.
    cadastrarCliente(); // Executa a função de cadastro.
});

/***********************************************************************/