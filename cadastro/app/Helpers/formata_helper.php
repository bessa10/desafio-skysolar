<?php

if (!function_exists('formata_data')) 
{

    function formata_data($valor) {
        $data = date('d/m/Y', strtotime($valor));

        return $data;
    }
}

if (!function_exists('formatCnpjCpf')) 
{
    function formatCnpjCpf($value)
    {
        $cnpj_cpf = preg_replace("/\D/", '', $value);
        
        if (strlen($cnpj_cpf) === 11) {
            return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
        } 
        
        return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
    }
}


if (!function_exists('formata_cep')) {

    function formata_cep($valor) {
        $cep = substr($valor, 0, 5) . '-' . substr($valor, 5, 3);

        return $cep;
    }
}

if (!function_exists('msgAlert')) 
{
    function msgAlert()
    {
        $html = '';

        if (session()->getFlashdata('msg') && session()->getFlashdata('msg')) {

        $type = session()->getFlashdata('type');
        $msg  = session()->getFlashdata('msg');

        //if ($msg['type'] && $msg['msg']) {

            $html .= '
                <div id="msg-alert">
                    <div class="mt-3 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="alert alert-'.$type.'">
                            <strong>'.$msg.'</strong>
                        </div>
                    </div>
                </div>
            ';
        }

        return $html;
    }
}

if (!function_exists('isInvalid')) 
{
    function isInvalid($validation_error, $key)
    {   
        $class = '';

        if (isset($validation_error[$key])) {

            $class = 'is-invalid';
        }

        return $class;
    }
}

if (!function_exists('invalidFeedback')) 
{
    function invalidFeedback($validation_error, $key)
    {   
        $html = '';

        if (isset($validation_error[$key])) {

            $html = '
                <div class="invalid-feedback">
                    '.$validation_error[$key].'
                </div>
            ';
        }

        return $html;
    }
}


if (!function_exists('limpa_documento')) {

    function limpa_documento($str) {

        $str = trim($str);

        if ($str != '') {

            $str = str_replace('/', '', $str);
            $str = str_replace('\\', '', $str);
            $str = str_replace('.', '', $str);
            $str = str_replace('_', '', $str);
            $str = str_replace('-', '', $str);
            $str = str_replace("'", '', $str);
        }

        return $str;
    }
}