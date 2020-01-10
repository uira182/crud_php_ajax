$(document).ready(function() {
    $("#busca_cep").click(function() {
        var cep = $("#cep").val().replace(/[^0-9]/, '');
        if (cep) {
            var url = 'https://viacep.com.br/ws/' + cep + '/json/?callback=crmall';
            $.ajax({
                url: url,
                dataType: 'jsonp',
                crossDomain: true,
                contentType: "application/json",
                success: function(json) {
                    $("#endereco").prop("disabled", false);
                    $("#numero").prop("disabled", false);
                    $("#bairro").prop("disabled", false);
                    $("#complemento").prop("disabled", false);
                    $("#cidade").prop("disabled", false);
                    $("#estado").prop("disabled", false);

                    $("#endereco").val(json.logradouro);
                    $("#bairro").val(json.bairro);
                    $("#complemento").val(json.complemento);
                    $("#cidade").val(json.localidade);
                    $("#estado").val(json.uf);
                }
            });
        }

    });

    $("#form_edt").submit(function(e) {
        if (!confirm("Deseja realmente atualizar os dados?")) {
            e.preventDefault();
        } else {
            $("#endereco").prop("disabled", false);
            $("#numero").prop("disabled", false);
            $("#bairro").prop("disabled", false);
            $("#complemento").prop("disabled", false);
            $("#cidade").prop("disabled", false);
            $("#estado").prop("disabled", false);
        }
    });

});