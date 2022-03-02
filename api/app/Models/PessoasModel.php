<?php

namespace App\Models;

use CodeIgniter\Model;

class PessoasModel extends Model
{
    protected $table = 'pessoas';
    protected $primaryKey = 'cod_pessoa';
    protected $allowedFields = [
        'nome_completo',
        'rg',
        'cpf',
        'data_nascimento',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'excluido',
        'dth_excluido'
    ];

    protected $validationRules = [
        'nome_completo'     => 'required',
        'rg'                => 'required',
        'cpf'               => 'required|min_length[11]|is_unique[pessoas.cpf,cod_pessoa,{cod_pessoa}]',
        'data_nascimento'   => 'required',
        'cep'               => 'required|min_length[8]',     
        'logradouro'        => 'required',
        'numero'            => 'required',
        'bairro'            => 'required',
        'cidade'            => 'required',
        'estado'            => 'required'
    ];
}