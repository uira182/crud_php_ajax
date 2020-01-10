<form method="POST" name="formularioCadastro">

    <h1>Cadastro de Cliente</h1>

    <section class="form-row">
        <section class="col-lg-6">
            <label for="nome">Nome</label>
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome" required />
        </section>
        <section class="col-lg-6">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="email@email.com" required />
        </section>
    </section>

    <section class="form-row">
        <section class="col-md-6">
            <label for="celular">Celular</label>
            <input class="form-control" type="number" name="celular" id="celular" placeholder="(00) 00000-0000 " required />
        </section>
        <section class="col-md-6">
            <label for="telefone">Telefone</label>
            <input class="form-control" type="number" name="telefone" id="telefone" placeholder="(00) 0000-0000" required />
        </section>
    </section>

    <label for="data_nascimento">Data Nascimento</label>
    <input class="form-control" type="date" name="data_nascimento" id="data_nascimento" required />

    <section class="form-row mt-2 mb-2">
        <section class="col-6 text-center">
            <input class="form-control" type="radio" name="sexo" id="sexoM" value="0" checked />
            <label for="sexoM">Masculino</label>
        </section>
        <section class="col-6 text-center">
            <input class="form-control" type="radio" name="sexo" id="sexoF" value="1" />
            <label for="sexoF">Feminino</label>
        </section>
    </section>

    <label for="cep">CEP</label>
    <section class="form-row">
        <section class="col-10 col-md-11">
            <input class="form-control" type="number" name="cep" id="cep" placeholder="CEP" required />
        </section>
        <section class="col-2 col-md-1">
            <button id="busca_cep" class="form-control btn btn-success" type="button">
        <i class="fa fa-search"></i>
      </button>
        </section>
    </section>

    <section class="form-row">
        <section class="col-md-9">
            <label for="endereco">Endereço</label>
            <input class="form-control" type="text" name="endereco" id="endereco" placeholder="Endereço" required />
        </section>
        <section class="col-md-3">
            <label for="numero">Numero</label>
            <input class="form-control" type="number" name="numero" id="numero" placeholder="nº" required />
        </section>
    </section>

    <section class="form-row">
        <section class="col-md-6">
            <label for="bairro">Bairro</label>
            <input class="form-control" type="text" name="bairro" id="bairro" placeholder="Centro, vila..." required />
        </section>
        <section class="col-md-6">
            <label for="complemento">Complemento</label>
            <input class="form-control" type="text" name="complemento" id="complemento" placeholder="Casa, andar, frente, fundos..." required />
        </section>
    </section>

    <section class="form-row">
        <section class="col-md-6">
            <label for="estado">Estado</label>
            <input class="form-control" type="text" name="estado" id="estado" placeholder="" required />
        </section>
        <section class="col-md-6">
            <label for="bairro">Cidade</label>
            <input class="form-control" type="text" name="cidade" id="cidade" placeholder="" required/>
        </section>
    </section>



    <div class="form-row mt-2">
        <div class="col-6">
            <button class="form-control btn btn-success" type="submit" name="btnAdd" value="add">
                Cadastrar
            </button>
        </div>
        <div class="col-6">
            <button class="form-control btn btn-dark" type="button">
                Voltar
            </button>
        </div>
    </div>
    <hr/>
</form>
<div class="row pb-5">
    <div class="col-md-12 mx-auto text-center">
        <div class="container" id="Resultado">

        </div>
    </div>
</div>

<script type="text/javascript" src="assets/js/cadCli.js"></script>