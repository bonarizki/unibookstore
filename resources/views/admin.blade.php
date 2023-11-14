@extends('layout.master')

@section('title', 'Admin Management')

@section('content')
    <div class="row mt-2 mb-2">
        <div class="col">
            <h2 class="d-flex justify-content-center">Selamat datang admin, selamat bekerja :) </h2>
        </div>
    </div>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-buku" data-bs-toggle="tab" data-bs-target="#nav-management-buku"
                type="button" role="tab" aria-controls="nav-buku" aria-selected="true">
                <h4>Management Buku</h4>
            </button>
            <button class="nav-link" id="nav-penerbit" data-bs-toggle="tab" data-bs-target="#nav-management-penerbit"
                type="button" role="tab" aria-controls="nav-penerbit" aria-selected="false">
                <h4>Management Penerbit</h4>
            </button>

        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-management-buku" role="tabpanel" aria-labelledby="nav-buku">
            @include('content.daftar-buku')
        </div>
        <div class="tab-pane fade" id="nav-management-penerbit" role="tabpanel" aria-labelledby="nav-management-penerbit">
            @include('content.daftar-penerbit')
        </div>
    </div>

    <div class="toast-container position-fixed bottom-0 end-0 p-3" id="toast-container">

    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            getDataBuku();
            getDataPenerbit();
        });

        getDataBuku = () => {
            $('#table-buku').DataTable({
                destroy: true,
                ajax: {
                    url: `{{ route('books.index') }}`,
                    method: 'get'
                },
                columns: [{
                        data: 'DT_RowIndex'
                    },
                    {
                        data: 'kode_buku'
                    },
                    {
                        data: 'kategory'
                    },
                    {
                        data: 'nama_buku'
                    },
                    {
                        data: 'harga'
                    },
                    {
                        data: 'stock'
                    },
                    {
                        data: 'id_penerbit'
                    },
                    {
                        data: 'id',
                        render: function(data, type, row, meta) {
                            return `<center><span onclick="modal('buku','edit','${data}')"><i class="bi bi-pencil-square"></i></span></center`;
                        }
                    },
                    {
                        data: 'id',
                        render: function(data, type, row, meta) {
                            return `<center><span onclick="deleteData('buku','${data}')"><i class="bi bi-trash"></i></span></center>`;
                        }
                    }
                ]
            });
        }

        getDataPenerbit = () => {
            $('#table-penerbit').DataTable({
                destroy: true,
                ajax: {
                    url: `{{ route('publisher.index') }}`,
                    method: 'get'
                },
                columns: [{
                        data: 'DT_RowIndex'
                    },
                    {
                        data: 'kode_penerbit'
                    },
                    {
                        data: 'nama'
                    },
                    {
                        data: 'alamat'
                    },
                    {
                        data: 'kota'
                    },
                    {
                        data: 'telepon'
                    },
                    {
                        data: 'id',
                        render: function(data, type, row, meta) {
                            return `<center><span onclick="modal('penerbit','edit','${data}')"><i class="bi bi-pencil-square"></i></span></center`;
                        }
                    },
                    {
                        data: 'id',
                        render: function(data, type, row, meta) {
                            return `<center><span onclick="deleteData('penerbit','${data}')"><i class="bi bi-trash"></i></span></center>`;
                        }
                    }
                ]
            });
        }

        modal = (tab, type, id = null) => {
            $(`#modal-${tab}`).modal('show');
            $(`#form-${tab}`)[0].reset();
            $(`#button-save-${tab}`).attr('onClick', `save('${tab}','${type}','${id}')`);


            if (type === 'add') {
                $(`#modal-${tab}-title`).text(`Tambah ${tab.toUpperCase()}`);
            } else {
                $(`#modal-${tab}-title`).text(`Edit ${tab.toUpperCase()}`);
                edit(tab, id)
            }
        }

        edit = (tab, id) => {
            url = setUrl(tab);

            $.ajax({
                url: `{{ url('${url}') }}/${id}/edit`,
                method: 'get',
                success: (res) => {
                    let data = res.data;
                    if (tab === 'penerbit') {
                        $('#kode_penerbit').val(data.kode_penerbit);
                        $('#nama').val(data.nama);
                        $('#alamat').val(data.alamat);
                        $('#kota').val(data.kota);
                        $('#telepon').val(data.telepon);
                    } else {
                        $('#kode_buku').val(data.kode_buku);
                        $('#kategory').val(data.kategory);
                        $('#nama_buku').val(data.nama_buku);
                        $('#harga').val(data.harga);
                        $('#stock').val(data.stock);
                        $('#id_penerbit').val(data.id_penerbit);
                    }
                }
            })
        }

        save = (tab, type, id = null) => {
            let method = type === 'add' ? 'post' : 'patch';
            let host = setUrl(tab);
            let url = type === 'add' ? `{{ url('${host}') }}` : `{{ url('${host}/${id}') }}`;
            var data = $('#form-penerbit').serialize();

            $.ajax({
                url: url,
                method: method,
                data: data,
                success: (res) => {
                    successHandler(res.message)
                    $('#modal-penerbit').modal('hide');
                    getDataPenerbit()
                },
                error: (res) => {
                    toastHandler(res.responseJSON.errors)
                    $('.toast').toast('show');
                }
            })
        }

        deleteData = (tab, id) => {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    processDelete(tab, id)
                }
            });


        }

        processDelete = (tab, id) => {
            let url = setUrl(tab);

            $.ajax({
                url: `{{ url('${url}') }}/${id}`,
                method: 'delete',
                success: (res) => {
                    successHandler(res.message)
                    $('#modal-penerbit').modal('hide');
                    getDataPenerbit()
                },
                error: (res) => {
                    toastHandler(res.responseJSON.errors)
                    $('.toast').toast('show');
                }
            })
        }

        toastHandler = (data) => {
            $('#toast-container').empty();
            let key = Object.keys(data)
            key.forEach(element => {
                let toast = `
                <div class="toast text-white bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="me-auto">Warning</strong>
                        <small class="text-muted">just now</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        ${data[element][0]}
                    </div>
                </div>`

                $('#toast-container').append(toast);
            });
        }

        successHandler = (message) => {
            Swal.fire({
                title: "Good job!",
                text: message,
                icon: "success"
            });
        }

        setUrl = (tab) => {
            return tab === 'penerbit' ? 'publisher' : 'books';
        }
    </script>
@endsection
