<?= $this->extend('default') ?>
<?= $this->section('content') ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Pessoas cadastradas</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php if ($list_pessoas) { ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-ligth">
                            <tr>
                                <th scope="col">Nome Completo</th>
                                <th class="text-center" scope="col">RG</th>
                                <th class="text-center" scope="col">CPF</th>
                                <th class="text-center" scope="col">Data Nascimento</th>
                                <th class="text-center" scope="col">Cidade</th>
                                <th class="text-center" scope="col">UF</th>
                                <th class="text-center" scope="col">Editar</th>
                                <th class="text-center" scope="col">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_pessoas as $key => $value) { ?>
                            <tr>
                                <td><?= $value['nome_completo'] ?></td>
                                <td class="text-center"><?= $value['rg'] ?></td>
                                <td class="text-center"><?= formatCnpjCpf($value['cpf']) ?></td>
                                <td class="text-center"><?= formata_data($value['data_nascimento']) ?></td>
                                <td class="text-center"><?= $value['cidade'] ?></td>
                                <td class="text-center"><?= $value['estado'] ?></td>
                                <td class="text-center">
                                    <a href="<?= site_url().'pessoas/edit/'.$value['cod_pessoa'] ?>"  class="btn btn-small btn-info"
                                        ><i class="fa fa-edit"></i>&nbsp;&nbsp;Editar
                                    </a>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-small btn-danger" onclick="removerPessoa(<?= $value['cod_pessoa'] ?>, '<?= $value['nome_completo'] ?>')">
                                        <i class="fa fa-trash"></i>&nbsp;&nbsp;Excluir
                                    </button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php } else { ?>
                    <p>Não existem pessoas cadastradas</p>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <a href="<?= site_url().'pessoas/create' ?>" class="btn btn-dark"><i class="fa fa-plus"></i>&nbsp;&nbsp;Cadastrar nova pessoa</a>

            </div>
        </div>
    </div>
    <?= $this->include('pessoas/modal_remover') ?>
<?= $this->endSection() ?>