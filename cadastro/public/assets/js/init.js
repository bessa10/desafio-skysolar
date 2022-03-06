setTimeout(function () {
    $('#msg-alert').hide();
}, 4000);

$(document).ready(function(){

    $('.cpf').mask('000.000.000-00');
    $('.cep').mask('00000-000');
});

function removerPessoa(cod_pessoa = '', nome_pessoa = '')
{   
    $("#nome_pessoa").html(nome_pessoa);
    $("#exc_cod_pessoa").val(cod_pessoa);
    $("#modal_remover_pessoa").modal('show');
}

function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    
    $("#logradouro").val('');
    $("#bairro").val('');
    $("#cidade").val('');
    $("#estado").val('');
}

function meu_callback(conteudo) {

    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        
        $("#logradouro").val(conteudo.logradouro);
        $("#bairro").val(conteudo.bairro);
        $("#cidade").val(conteudo.localidade);
        $("#estado").val(conteudo.uf);
    
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            $("#logradouro").val('...');
            $("#bairro").val('...');
            $("#cidade").val('...');
            $("#estado").val('...');

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};