<div class="modal fade" id="modal_hapus" tabindex="-1" role="dialog" aria-labelledby="modal_hapusLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_hapusLabel">Warning</h5>
        <button type="button" class="close coeg_modal" data-dismiss="modal_coeg" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        Are you sure, this data wants to be deleted?
        <form id="form_hapus_data"  action="<?= base_url() ?>master/delete_product" method="post">
          <input type="hidden" name="hapus_data_id" id="hapus_data_id" value="">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary coeg_modal" data-dismiss="modal_coeg">Close</button>
        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
      </div>
    </form>

    </div>
  </div>
</div>
