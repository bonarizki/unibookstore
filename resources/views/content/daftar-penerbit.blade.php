<div class="row pt-4 pb-2">
    <div class="col">
        <h5>Daftar Penerbit</h5>
    </div>
    <div class="col">
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary rounded-pill" onclick="modal('penerbit','add')">Tambah
                Penerbit</button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="table-responsive ">
            <table id="table-penerbit" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <td rowspan="2" class="align-middle">#</td>
                        <td rowspan="2" class="align-middle">Kode Penerbit</td>
                        <td rowspan="2" class="align-middle">Nama </td>
                        <td rowspan="2" class="align-middle">Alamat</td>
                        <td rowspan="2" class="align-middle">Kota</td>
                        <td rowspan="2" class="align-middle">Telephone</td>
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
<div class="modal fade" id="modal-penerbit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-penerbit-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-penerbit">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Kode Penerbit</label>
                        <input type="text" class="form-control" id="kode_penerbit" name="kode_penerbit" required>
                        {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Penerbit</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" placeholder="Leave a comment here" id="alamat" name="alamat" style="height: 100px"
                            required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kota</label>
                        <input type="text" class="form-control" id="kota" name="kota" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" required>
                    </div>
                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill"
                        data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary rounded-pill" id="button-save-penerbit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
