<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class Pessoas extends ResourceController
{
    private $pessoasModel;
    private $token = '123456qwert';

    public function __construct()
    {
        $this->pessoasModel = new \App\Models\PessoasModel();
    }

    private function _validaToken()
    {
        return $this->request->getHeaderLine('token') == $this->token;
    }

    public function find($cod_pessoa) 
    {
        $response = [];

        if ($this->_validaToken() == true) {

            $data = $this->pessoasModel->find($cod_pessoa);

            $response = [
                'response'  => 'success',
                'data'      => $data
            ];

        } else {

            $response = [
                'response'  => 'error',
                'msg'       => 'Token inválido'
            ];
        }

        return $this->response->setJSON($response);
    }

    public function list()
    {
        $response = [];

        if ($this->_validaToken() == true) {

            $data = $this->pessoasModel->where('excluido', 'N')->findAll();

            $response = [
                'response'  => 'success',
                'data'      => $data
            ];

        } else {

            $response = [
                'response'  => 'error',
                'msg'       => 'Token inválido'
            ];
        }

        return $this->response->setJSON($response);
    }

    public function create()
    {
        $response = [];

        // validar token
        if ($this->_validaToken() == true) {

            // Função irá funcionar tanto com o JSON quanto com um formulário comum

            if($this->request->getJson()) {

                $dados = (array) $this->request->getJson();

                // pegando os dados que vieram na requisição
                $newPessoa['nome_completo']     = (isset($dados['nome_completo'])) ? $dados['nome_completo'] : null;
                $newPessoa['rg']                = (isset($dados['rg'])) ? $dados['rg'] : null;
                $newPessoa['cpf']               = (isset($dados['cpf'])) ? $dados['cpf'] : null;
                $newPessoa['data_nascimento']   = (isset($dados['data_nascimento'])) ? $dados['data_nascimento'] : null;
                $newPessoa['cep']               = (isset($dados['cep'])) ? $dados['cep'] : null;
                $newPessoa['logradouro']        = (isset($dados['logradouro'])) ? $dados['logradouro'] : null;
                $newPessoa['numero']            = (isset($dados['numero'])) ? $dados['numero'] : null;
                $newPessoa['complemento']       = (isset($dados['complemento'])) ? $dados['complemento'] : null;
                $newPessoa['bairro']            = (isset($dados['bairro'])) ? $dados['bairro'] : null;
                $newPessoa['cidade']            = (isset($dados['cidade'])) ? $dados['cidade'] : null;
                $newPessoa['estado']            = (isset($dados['estado'])) ? $dados['estado'] : null;

            } else {

                // pegando os dados que vieram na requisição
                $newPessoa['nome_completo']     = ($this->request->getPost('nome_completo')) ? $this->request->getPost('nome_completo') : null;
                $newPessoa['rg']                = ($this->request->getPost('rg')) ? $this->request->getPost('rg') : null;
                $newPessoa['cpf']               = ($this->request->getPost('cpf')) ? $this->request->getPost('cpf') : null;
                $newPessoa['data_nascimento']   = ($this->request->getPost('data_nascimento')) ? $this->request->getPost('data_nascimento') : null;
                $newPessoa['cep']               = ($this->request->getPost('cep')) ? $this->request->getPost('cep') : null;
                $newPessoa['logradouro']        = ($this->request->getPost('logradouro')) ? $this->request->getPost('logradouro') : null;
                $newPessoa['numero']            = ($this->request->getPost('numero')) ? $this->request->getPost('numero') : null;
                $newPessoa['complemento']       = ($this->request->getPost('complemento')) ? $this->request->getPost('complemento') : null;
                $newPessoa['bairro']            = ($this->request->getPost('bairro')) ? $this->request->getPost('bairro') : null;
                $newPessoa['cidade']            = ($this->request->getPost('cidade')) ? $this->request->getPost('cidade') : null;
                $newPessoa['estado']            = ($this->request->getPost('estado')) ? $this->request->getPost('estado') : null;
            }

            try {

                if ($this->pessoasModel->insert($newPessoa)) {

                    $response = [
                        'response'  => 'success',
                        'msg'       => 'Pessoa cadastrada com sucesso'
                    ];

                } else {

                    $response = [
                        'response'          => 'error',
                        'msg'               => 'Não foi possível cadastrar a pessoa',
                        'validation_error'  => $this->pessoasModel->errors()
                    ];
                }

            } catch(Exception $e) {

                $response = [
                    'response'          => 'error',
                    'msg'               => 'Não foi possível cadastrar a pessoa',
                    'validation_error'  => [
                        'exception' => $e->getMessage()
                    ]
                ];
            }

        } else {

            $response = [
                'response'  => 'error',
                'msg'       => 'token inválido'
            ];
        }

        return $this->response->setJSON($response);
    }

    public function update($cod_pessoa = null)
    {
        $response = [];

        if ($this->_validaToken() == true) {

            // primeiro passo é verificar se a pessoa realmente existe
            $data = $this->pessoasModel->find($cod_pessoa);

            if (!$data) {

                $response = [
                    'response'  => 'error',
                    'msg'       => 'Pessoa não encontrada'
                ];

            } else {

                /*$validation =  \Config\Services::validation();

                $validation->setRules([
                    'nome_completo'     => 'required',
                    'rg'                => 'required',
                    'cpf'               => "required|min_length[11]|is_unique[pessoas.cpf,cod_pessoa,{cod_pessoa}]",
                    'data_nascimento'   => 'required',
                    'cep'               => 'required|min_length[8]',     
                    'logradouro'        => 'required',
                    'numero'            => 'required',
                    'bairro'            => 'required',
                    'cidade'            => 'required',
                    'estado'            => 'required'
                ]); 
                */

                //if ($validation->withRequest($this->request)->run()==false) {

                    /*$response = [
                        'response'          => 'error',
                        'msg'               => 'Não foi possível alterar a pessoa',
                        'validation_error'  => $validation->getErrors()
                    ];*/

                //} else {
                    
                    if($this->request->getJson()) {

                        $dados = (array) $this->request->getJson();
        
                        // pegando os dados que vieram na requisição
                        $newPessoa['cod_pessoa']        = $cod_pessoa;
                        $newPessoa['nome_completo']     = $dados['nome_completo'];
                        $newPessoa['rg']                = $dados['rg'];
                        $newPessoa['cpf']               = $dados['cpf'];
                        $newPessoa['data_nascimento']   = $dados['data_nascimento'];
                        $newPessoa['cep']               = $dados['cep'];
                        $newPessoa['logradouro']        = $dados['logradouro'];
                        $newPessoa['numero']            = $dados['numero'];
                        $newPessoa['complemento']       = $dados['complemento'];
                        $newPessoa['bairro']            = $dados['bairro'];
                        $newPessoa['cidade']            = $dados['cidade'];
                        $newPessoa['estado']            = $dados['estado'];
        
                    } else {
        
                        // pegando os dados que vieram na requisição
                        $newPessoa['nome_completo']     = $this->request->getPost('nome_completo');
                        $newPessoa['rg']                = $this->request->getPost('rg');
                        $newPessoa['cpf']               = $this->request->getPost('cpf');
                        $newPessoa['data_nascimento']   = $this->request->getPost('data_nascimento');
                        $newPessoa['cep']               = $this->request->getPost('cep');
                        $newPessoa['logradouro']        = $this->request->getPost('logradouro');
                        $newPessoa['numero']            = $this->request->getPost('numero');
                        $newPessoa['complemento']       = $this->request->getPost('complemento');
                        $newPessoa['bairro']            = $this->request->getPost('bairro');
                        $newPessoa['cidade']            = $this->request->getPost('cidade');
                        $newPessoa['estado']            = $this->request->getPost('estado');
                    }

                    try {

                        if ($this->pessoasModel->update($cod_pessoa, $newPessoa)) {
        
                            $response = [
                                'response'  => 'success',
                                'msg'       => 'Pessoa alterada com sucesso'
                            ];
        
                        } else {
        
                            $response = [
                                'response'          => 'error',
                                'msg'               => 'Não foi possível alterar a pessoa',
                                'validation_error'  => $this->pessoasModel->errors()
                            ];
                        }
        
                    } catch(Exception $e) {
        
                        $response = [
                            'response'          => 'error',
                            'msg'               => 'Não foi possível alterar a pessoa',
                            'validation_error'  => [
                                'exception' => $e->getMessage()
                            ]
                        ];
                    }
            }

        } else {

            $response = [
                'response'  => 'error',
                'msg'       => 'token inválido'
            ];
        }

        return $this->response->setJSON($response);
    }

    public function cancel($cod_pessoa = null)
    {
        $response = [];

        if ($this->_validaToken() == true) {

            // primeiro passo é verificar se a pessoa realmente existe
            $data = $this->pessoasModel->find($cod_pessoa);

            if (!$data) {

                $response = [
                    'response'  => 'error',
                    'msg'       => 'Pessoa não encontrada'
                ];

            } else {

                $data['excluido']        = 'Y';
                $data['dth_excluido']   = date('Y-m-d H:i:s');

                try {

                    if ($this->pessoasModel->update($cod_pessoa, $data)) {
    
                        $response = [
                            'response'  => 'success',
                            'msg'       => 'Pessoa cancelada com sucesso'
                        ];
    
                    } else {
    
                        $response = [
                            'response'          => 'error',
                            'msg'               => 'Não foi possível cancelar a pessoa',
                            'validation_error'  => $this->pessoasModel->errors()
                        ];
                    }
    
                } catch(Exception $e) {
    
                    $response = [
                        'response'          => 'error',
                        'msg'               => 'Não foi possível cancelar a pessoa',
                        'validation_error'  => [
                            'exception' => $e->getMessage()
                        ]
                    ];
                }
            }

        } else {

            $response = [
                'response'  => 'error',
                'msg'       => 'token inválido'
            ];
        }

        return $this->response->setJSON($response);
    }
}