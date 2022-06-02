<!-- Modal -->
<div class="modal fade" id="tambah1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-vertical-top">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pd-12">
                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama Kategori</label>
                        <input type="text" class="form-control" name="name">
                    </div>


            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
            </form>
        </div>
    </div>
</div>
