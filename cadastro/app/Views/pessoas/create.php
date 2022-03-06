<?= $this->extend('default') ?>
<?= $this->section('content') ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">Pessoas</li>
                        <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
                    </ol>
                </nav>
            </div>
        </div>
        <form method="POST">        
            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <label for="nome_completo"><strong>Nome completo</strong></label>
                    <input type="text" class="form-control <?= isInvalid($validation_error,'nome_completo') ?>" id="nome_completo" name="nome_completo" value="<?= set_value('nome_completo') ?>" placeholder="Nome completo">
                    <?= invalidFeedback($validation_error, 'nome_completo') ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <label for="rg"><strong>RG</strong></label>
                    <input type="text" class="form-control <?= isInvalid($validation_error,'rg') ?>" id="rg" name="rg" value="<?= set_value('rg') ?>" placeholder="RG">
                    <?= invalidFeedback($validation_error, 'rg') ?>
                </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <label for="cpf"><strong>CPF</strong></label>
                    <input type="text" class="form-control cpf <?= isInvalid($validation_error,'cpf') ?>" id="cpf" name="cpf" value="<?= set_value('cpf') ?>" placeholder="CPF">
                    <?= invalidFeedback($validation_error, 'cpf') ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <label for="data_nascimento"><strong>Data nascimento</strong></label>
                    <input type="date" class="form-control <?= isInvalid($validation_error,'data_nascimento') ?>" id="data_nascimento" name="data_nascimento" value="<?= set_value('data_nascimento') ?>" placeholder="Data nascimento">
                    <?= invalidFeedback($validation_error, 'data_nascimento') ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <label for="cep"><strong>CEP</strong></label>
                    <input type="text" class="form-control cep <?= isInvalid($validation_error,'cep') ?>" id="cep" name="cep" value="<?= set_value('cep') ?>" placeholder="CEP" onblur="pesquisacep(this.value)">
                    <?= invalidFeedback($validation_error, 'cep') ?>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <label for="logradouro"><strong>Logradouro</strong></label>
                    <input type="text" class="form-control <?= isInvalid($validation_error,'logradouro') ?>" id="logradouro" name="logradouro" value="<?= set_value('logradouro') ?>" placeholder="Logradouro">
                    <?= invalidFeedback($validation_error, 'logradouro') ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <label for="numero"><strong>Nº</strong></label>
                    <input type="text" class="form-control <?= isInvalid($validation_error,'numero') ?>" id="numero" name="numero" value="<?= set_value('numero') ?>" placeholder="Nº">
                    <?= invalidFeedback($validation_error, 'numero') ?>
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="complemento"><strong>Complemento</strong></label>
                    <input type="text" class="form-control <?= isInvalid($validation_error,'complemento') ?>" id="complemento" name="complemento" value="<?= set_value('complemento') ?>" placeholder="Complemento">
                    <?= invalidFeedback($validation_error, 'complemento') ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-4 col-md-2 col-sm-12 col-xs-12">
                    <label for="bairro"><strong>Bairro</strong></label>
                    <input type="text" class="form-control <?= isInvalid($validation_error,'bairro') ?>" id="bairro" name="bairro" value="<?= set_value('bairro') ?>" placeholder="Bairro">
                    <?= invalidFeedback($validation_error, 'bairro') ?>
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="cidade"><strong>Cidade</strong></label>
                    <input type="text" class="form-control <?= isInvalid($validation_error,'cidade') ?>" id="cidade" name="cidade" value="<?= set_value('cidade') ?>" placeholder="Cidade">
                    <?= invalidFeedback($validation_error, 'cidade') ?>
                </div>
                <div class="form-group col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <label for="estado"><strong>Estado</strong></label>
                    <select class="form-control <?= isInvalid($validation_error,'estado') ?>" name="estado" id="estado">
                        <option value="">Selecione</option>
                        <?php foreach($lista_estados as $row) { ?>
                            <?php $selected = ($row['sigla'] == set_value('estado')) ? 'selected' : '' ?>
                            <option value="<?= $row['sigla'] ?>" <?= $selected ?>><?= $row['sigla'] ?></option>    
                        <?php } ?>
                    </select>
                    <?= invalidFeedback($validation_error, 'estado') ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-5 col-md-6 col-sm-6 col-xs-6">
                    <button class="btn btn-dark" type="submit"><i class="fa fa-save"></i>&nbsp;&nbsp;Salvar</button>
                </div>
                <div class="form-group col-lg-5 col-md-6 col-sm-6 col-xs-6 text-right">
                    <a href="<?= site_url().'pessoas' ?>" class="btn btn-info" type="submit"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Voltar</a>
                </div>
            </div>
        </form>
    </div>
<?= $this->endSection() ?>