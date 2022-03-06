<!-- Modal -->
<div class="modal fade" id="modal_remover_pessoa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Remover pessoa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url().'pessoas/remove' ?>" method="POST">
                <input type="hidden" name="exc_cod_pessoa" id="exc_cod_pessoa" value="">
                <div class="modal-body">
                    <p>Deseja realmente remover a pessoa abaixo?</p>
                    <p><strong><span id="nome_pessoa"></span></strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Cancelar</button>
                    <button type="submit" class="btn btn-outline-success"><i class="fa fa-check"></i>&nbsp;&nbsp;Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</div>