<div class="row pt-4 pb-2">
    <div class="col">
        <h5>Daftar Buku</h5>
    </div>
    <div class="col">
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary rounded-pill" onclick="modal('buku','add')">Tambah
                Buku</button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="table-responsive ">
            <table id="table-buku" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <td rowspan="2" class="align-middle">#</td>
                        <td rowspan="2" class="align-middle">Kode Buku</td>
                        <td rowspan="2" class="align-middle">Kategory</td>
                        <td rowspan="2" class="align-middle">Nama Buku</td>
                        <td rowspan="2" class="align-middle">Harga</td>
                        <td rowspan="2" class="align-middle">Stock</td>
                        <td rowspan="2" class="align-middle">Penerbit</td>
                        <td colspan="2" class="align-center">
                            <center>Option<center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center>Edit</center>
                        </td>
                        <td>
                            <center>Delete</center>
                        </td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal-buku" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-buku-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-buku">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Kode Buku</label>
                        <input type="text" class="form-control" id="kode_buku" name="kode_buku" required>
                        {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategory</label>
                        <input type="text" class="form-control" id="kategory" name="kategory" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Buku</label>
                        <input type="text" class="form-control" id="nama_buku" name="nama_buku" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stock</label>
                        <input type="text" class="form-control" id="stock" name="stock" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penerbit</label>
                        <select class="form-select" aria-label="Penerbit" id="id_penerbit" name="id_penerbit">
                            
                        </select>
                    </div>

                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill"
                        data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary rounded-pill" id="button-save-buku">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
