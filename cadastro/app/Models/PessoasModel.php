<?php

namespace App\Models;

use CodeIgniter\Model;

class PessoasModel extends Model
{
    protected $table        = 'pessoas';
    protected $primaryKey   = 'cod_pessoa';

    private $apiModel;

    public function __construct()
    {
        $this->apiModel = new \App\Models\ApiModel();
    }
    
    public function list()
    {
        $endpoint = 'pessoas/list';

        $list_pessoas = $this->apiModel->sendHttpGet($endpoint);

        $list_pessoas = json_decode($list_pessoas, true);

        return $list_pessoas['data'];
    }

    public function create($form = null)
    {
        $endpoint = 'pessoas/create';

        $retorno = [];

        if ($form != null) {

            // Montando os dados para serem enviados
            $dados['nome_completo']     = $form['nome_completo'];
            $dados['rg']                = $form['rg'];
            $dados['cpf']               = limpa_documento($form['cpf']);
            $dados['data_nascimento']   = $form['data_nascimento'];
            $dados['cep']               = limpa_documento($form['cep']);
            $dados['logradouro']        = $form['logradouro'];
            $dados['numero']            = $form['numero'];
            $dados['complemento']       = $form['complemento'];
            $dados['bairro']            = $form['bairro'];
            $dados['cidade']            = $form['cidade'];
            $dados['estado']            = $form['estado'];

            $retorno = $this->apiModel->sendHttpPost($endpoint, null, $dados);

            $retorno = json_decode($retorno, true);

            if (!$retorno) {

                $retorno['response']    = 'error';
                $retorno['msg']         = 'Não foi possível cadastrar a pessoa';
            }
            
            return $retorno;

        } else {

            return false;
        }
    }

    public function edit($cod_pessoa = null, $form = null)
    {
        if ($cod_pessoa != null && $form) {

            $endpoint = 'pessoas/update/'.$cod_pessoa;

            $retorno = [];

            // Montando os dados para serem enviados
            $dados['cod_pessoa']        = $cod_pessoa;
            $dados['nome_completo']     = $form['nome_completo'];
            $dados['rg']                = $form['rg'];
            $dados['cpf']               = limpa_documento($form['cpf']);
            $dados['data_nascimento']   = $form['data_nascimento'];
            $dados['cep']               = limpa_documento($form['cep']);
            $dados['logradouro']        = $form['logradouro'];
            $dados['numero']            = $form['numero'];
            $dados['complemento']       = $form['complemento'];
            $dados['bairro']            = $form['bairro'];
            $dados['cidade']            = $form['cidade'];
            $dados['estado']            = $form['estado'];

            $retorno = $this->apiModel->sendHttpPut($endpoint, null, $dados);

            $retorno = json_decode($retorno, true);

            if (!$retorno) {

                $retorno['response']    = 'error';
                $retorno['msg']         = 'Não foi possível alterar a pessoa';
            }
            
            return $retorno;

        } else {

            return false;
        }
    }

    public function find($cod_pessoa = null)
    {
        if ($cod_pessoa != null) {

            $endpoint = 'pessoas/find/'.$cod_pessoa;

            $find_pessoa = $this->apiModel->sendHttpGet($endpoint);

            $find_pessoa = json_decode($find_pessoa, true);

            return $find_pessoa['data'];

        } else {

            return false;
        }
    }

    public function remove($cod_pessoa = null)
    {
        if ($cod_pessoa != null) {

            $endpoint = 'pessoas/cancel/'.$cod_pessoa;

            $retorno = $this->apiModel->sendHttpDelete($endpoint);

            $retorno = json_decode($retorno, true);

            return $retorno;

        } else {

            return false;
        }
    }
}