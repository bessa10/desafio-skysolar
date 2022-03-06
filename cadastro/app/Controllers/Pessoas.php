<?php

namespace App\Controllers;

use Exception;

class Pessoas extends BaseController
{
    private $pessoasModel;
    private $estadoModel;

    public function __construct()
    {
        $this->pessoasModel = new \App\Models\PessoasModel();
        $this->estadosModel = new \App\Models\EstadosModel();
    }

    public function index()
    {
        $list_pessoas = $this->pessoasModel->list();

        return view('pessoas/index', compact('list_pessoas'));
    }

    public function create()
    {
        $validation_error = null;

        $lista_estados = $this->estadosModel->findAll();

        if ($_SERVER['REQUEST_METHOD']=='POST') {

            $retorno = $this->pessoasModel->create($_POST);

            if ($retorno['response'] == 'success') {

                $alert['type'] = 'success';
                $alert['msg']  = 'Pessoa cadastrada com sucesso';

                session()->setFlashdata($alert);

                return redirect()->route('pessoas');

            } else {

                if ($retorno['validation_error']) {

                    $validation_error = $retorno['validation_error'];

                    $type = 'danger';
                    $msg  = 'Existem erros no preenchimento';

                } else {

                    $type = 'danger';
                    $msg  = 'Não foi possível cadastrar a pessoa';
                }

                $alert['type'] = $type;
                $alert['msg']  = $msg;

                session()->setFlashdata($alert);
            }
        }

        return view('pessoas/create', compact('validation_error', 'lista_estados'));
    }

    public function edit($cod_pessoa)
    {
        // buscar os dados da pessoa na api
        $dados_pessoa = $this->pessoasModel->find($cod_pessoa);

        if (!$dados_pessoa) {

            $alert['type'] = 'danger';
            $alert['msg']  = 'Não foi possível editar a pessoa, por favor tente novamente.';

            session()->setFlashdata($alert);

            return redirect()->route('pessoas');
        }

        $validation_error = null;
        $lista_estados = $this->estadosModel->findAll();

        if ($_SERVER['REQUEST_METHOD']=='POST') {

            $retorno = $this->pessoasModel->edit($cod_pessoa, $_POST);

            if ($retorno['response'] == 'success') {

                $alert['type'] = 'success';
                $alert['msg']  = 'Pessoa alterada com sucesso';

                session()->setFlashdata($alert);

                return redirect()->route('pessoas');

            } else {

                if ($retorno['validation_error']) {

                    $validation_error = $retorno['validation_error'];

                    $type = 'danger';
                    $msg  = 'Existem erros no preenchimento';

                } else {

                    $type = 'danger';
                    $msg  = 'Não foi possível alterar a pessoa';
                }

                $alert['type'] = $type;
                $alert['msg']  = $msg;

                session()->setFlashdata($alert);
            }
        }

        return view('pessoas/edit', compact('validation_error', 'lista_estados', 'dados_pessoa'));
    }

    public function remove()
    {  
        if ($_SERVER['REQUEST_METHOD']=='POST') {

            if ($this->request->getPost('exc_cod_pessoa')) {

                $cod_pessoa = $this->request->getPost('exc_cod_pessoa');

                $retorno = $this->pessoasModel->remove($cod_pessoa);

                if ($retorno['response'] == 'success') {

                    $type = 'success';
                    $msg  = 'Pessoa removida com sucesso.';

                } else {

                    $type = 'danger';
                    $msg  = 'Não foi possível remover a pessoa, por favor tente novamente.';
                }
            }

        } else {

            $type = 'danger';
            $msg  = 'Não foi possível remover a pessoa, por favor tente novamente.';
        }

        $alert['type'] = $type;
        $alert['msg']  = $msg;

        session()->setFlashdata($alert);

        return redirect()->route('pessoas');
    }
}