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
        <input class="form-control phone_cell" type="text" name="celular" id="celular" placeholder="(00) 00000-0000 " required />
    </section>
    <section class="col-md-6">
        <label for="telefone">Telefone</label>
        <input class="form-control phone" type="text" name="telefone" id="telefone" placeholder="(00) 0000-0000" required />
    </section>
</section>

<label for="data_nascimento">Data Nascimento</label>
<input class="form-control" type="date" name="data_nascimento" id="data_nascimento" required />

<section class="form-row pt-4">
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
        <input class="form-control cep" type="text" name="cep" id="cep" placeholder="00000-000" required />
    </section>
    <section class="col-2 col-md-1">
        <button id="busca_cep" class="form-control btn btn-success" type="button">
                    <i class="fa fa-search"></i>
                </button>
    </section>
</section>

<div id="erroCep"></div>

<section class="form-row">
    <section class="col-md-9">
        <label for="endereco">Endereço</label>
        <input class="form-control" type="text" name="endereco" id="endereco" placeholder="Rua, Avenida..." required disabled/>
    </section>
    <section class="col-md-3">
        <label for="numero">Numero</label>
        <input class="form-control" type="number" name="numero" id="numero" placeholder="nº" required disabled />
    </section>
</section>

<section class="form-row">
    <section class="col-md-6">
        <label for="bairro">Bairro</label>
        <input class="form-control" type="text" name="bairro" id="bairro" placeholder="Centro, Vila..." required disabled />
    </section>
    <section class="col-md-6">
        <label for="complemento">Complemento</label>
        <input class="form-control" type="text" name="complemento" id="complemento" placeholder="Casa, Andar, Frente, Fundos..." required disabled />
    </section>
</section>

<section class="form-row">
    <section class="col-md-6">
        <label for="estado">Estado</label>
        <input class="form-control" type="text" name="estado" id="estado" placeholder="SP, RJ, PR..." required disabled />
    </section>
    <section class="col-md-6">
        <label for="bairro">Cidade</label>
        <input class="form-control" type="text" name="cidade" id="cidade" placeholder="São Paulo, Rio de Janeiro..." required disabled />
    </section>
</section>

<div class="form-row mt-2">
    <div class="col-sm-6 pt-2 pt-sm-0">
        <button class="form-control btn btn-success" type="submit" name="btnAdd" value="CadastroCli">
                    Cadastrar
                </button>
    </div>
    <div class="col-sm-6 pt-2 pt-sm-0">
        <button class="form-control btn btn-dark" type="button">
                    Voltar
                </button>
    </div>
</div>
<hr/>