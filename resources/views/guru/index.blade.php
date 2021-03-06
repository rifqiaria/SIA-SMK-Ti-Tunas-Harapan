@extends('master.template')
@section('master.intro-header')

<div class="main-wrapper">
    <div class="row">
        <div class="col">
            <div id="success_message"></div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Guru SMK Ti Tunas Harapan</h5>
                    <button type="button" id="btn_tambah" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah Data</button>
                    <a href="#" class="btn btn-success mb-5">Export Excel</a>
                    <a href="#" class="btn btn-danger mb-5">Export PDF</a>
                    <table id="table-guru" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>NIGN</th>
                                <th>Nama Guru</th>
                                <th>Jenis Kelamin</th>
                                <th>No. Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Guru -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-judul">Tambah Data Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formGuru" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="user_id" id="user_id">
                    <ul id="save_errorList"></ul>
                    <div class="row g-3">
                        <div class="mb-3 col-sm-6">
                            <label for="nama_depan" class="form-label">NIGN</label>
                            <input type="text" name="nign" class="nign form-control" required>
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="nama_depan" class="form-label">Nama Guru</label>
                            <input type="text" name="nama_guru" class="nama_guru form-control" required>
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="nama_depan" class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" required>
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="nama_depan" class="form-label">Tanggal Lahir</label>
                            <input type="text" name="tanggal_lahir" class="form-control"required>
                        </div>
                        <div class="form-floating col-sm-6">
                            <fieldset class="form-group">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" id="selectJk" tabindex="-1" style="display: none; width: 100%" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="email form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nomor Telepon</label>
                            <input type="text" name="telepon" class="telepon form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Alamat</label>
                            <textarea class="alamat form-control" name="alamat" aria-label="With textarea" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Avatar</label>
                            <input type="file" name="avatar" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block" id="btn-simpan" value="create">Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Tambah Guru -->

<!-- Modal Edit Guru -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-judul">Edit Data Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formEdit" name="formEdit" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <ul class="alert alert-warning d-none" id="modalJudulEdit"></ul>
                    <div class="row g-3">
                        <div class="mb-3 col-sm-6">
                            <label for="nign" class="form-label">NIGN</label>
                            <input type="text" id="nign" name="nign" class=" form-control" value="" required>
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="nama_guru" class="form-label">Nama Guru</label>
                            <input type="text" id="nama_guru" name="nama_guru" class=" form-control" value="" required>
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" value="" required>
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="text" id="tanggal_lahir" name="tanggal_lahir" class="form-control" value="" required>
                        </div>
                        <div class="form-floating col-sm-6">
                            <fieldset class="form-group">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="js-states form-control" name="jenis_kelamin" id="jenis_kelamin" tabindex="-1" style="display: none; width: 100%">
                                    <optgroup label="Pilih Jenis Kelamin">
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </optgroup>
                                </select>
                            </fieldset>
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="exampleInputPassword1" class="form-label">Nomor Telepon</label>
                            <input type="text" name="telepon" class="form-control" id="telepon" value="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" aria-label="With textarea" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Avatar</label>
                            <input type="file" name="avatar" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block" id="btn-update" value="create">Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Delete -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalHapus" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">PERHATIAN</h5>
            </div>
            <div class="modal-body">
                <p><b>Jika menghapus Guru maka</b></p>
                <p>*data guru tersebut hilang selamanya, apakah anda yakin?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" id="btn-hapus" data-target="#btn-hapus" class="btn btn-danger tambah_data" value="add">Hapus</button>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('template/plugins/jquery/jquery-3.4.1.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    //MULAI DATATABLE
    //script untuk memanggil data json dari server dan menampilkannya berupa datatable
    $(document).ready(function() {
        $('#table-guru').DataTable({
            processing: true,
            serverSide: true, //aktifkan server-side 
            ajax: {
                url: "/guru",
                type: 'GET'
            },
            columns: [{
                    data: 'nign',
                    name: 'nign'
                },
                {
                    data: 'nama_guru',
                    name: 'nama_guru'
                },
                {
                    data: 'jenis_kelamin',
                    name: 'jenis_kelamin'
                },
                {
                    data: 'telepon',
                    name: 'telepon'
                },
                {
                    data: 'aksi',
                    name: 'aksi'
                },
            ],
            order: [
                [0, 'asc']
            ]
        });
    });

    $('#btn_tambah').click(function() {
        $('#btn-simpan').val("tambah-guru");
        $('#guru_id').val('');
        $('#formGuru').trigger("reset");
        $('#modal-judul').html("Tambah Guru");
        $('#tambahModal').modal('show');
        $('#selectJk').select2({
            dropdownParent: $('#tambahModal')
        });
    });

    $(document).on('click', '.edit-guru', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $('#editModal').modal('show');
        $('#jenis_kelamin').select2({
            dropdownParent: $('#editModal')
        });
        $.ajax({
            type: "GET",
            url: "/guru/edit/" + id,
            success: function(response) {
                console.log(response);
                if (response.status == 404) {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#editModal').modal('hide');
                } else {
                    $('#id').val(id);
                    $('#nign').val(response.nign);
                    $('#nama_guru').val(response.nama_guru);
                    $('#tempat_lahir').val(response.tempat_lahir);
                    $('#tanggal_lahir').val(response.tanggal_lahir);
                    $('#jenis_kelamin').val(response.jenis_kelamin);
                    $('#telepon').val(response.telepon);
                    $('#alamat').val(response.alamat);
                    $('#avatar').val();
                }
            }
        });
        $('.btn-close').find('input').val('');

    });

    //SIMPAN & UPDATE DATA DAN VALIDASI (SISI CLIENT)
    //jika id = formguru panjangnya lebih dari 0 atau bisa dibilang terdapat data dalam form tersebut maka
    //jalankan jquery validator terhadap setiap inputan dll dan eksekusi script ajax untuk simpan data
    if ($("#formGuru").length > 0) {
        $("#formGuru").validate({
            submitHandler: function(form) {
                var actionType = $('#btn-simpan').val();
                // Mengubah data menjadi objek agar file image bisa diinput kedalam database
                var formData = new FormData($('#formGuru')[0]);
                $.ajax({
                    data: formData, //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                    url: "/guru/store", //url simpan data
                    type: "POST", //data tipe kita kirim berupa JSON
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        var oTable = $('#table-guru').dataTable(); //inialisasi datatable
                        oTable.fnDraw(false); //reset datatable
                        if (response.status == 400) {
                            $('#save_errorList').html("");
                            $('#save_errorList').removeClass('d-none');
                            $.each(response.errors, function(key, err_value) {
                                $('#save_errorList').append('<li>' + err_value +
                                '</li>');
                            }); 

                            $('#btn-simpan').text('Menyimpan..');
                        } 
                        else if(response.status == 200)
                        {
                            $('#modalJudulEdit').html("");
                            $('#formGuru').find('input').val('');
                            toastr.success(response.message);

                            $('#tambahModal').modal('hide');

                        }
                    }
                });
            }
        })
    }

    $(document).on('submit', '#formEdit', function(e) {
        e.preventDefault();
        var id = $('#id').val();

        // Mengubah data menjadi objek agar file image bisa diinput kedalam database
        var EditFormData = new FormData($('#formEdit')[0]);

        $.ajax({
            type: "POST",
            url: "/guru/update/" + id,
            data: EditFormData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                var oTable = $('#table-guru').dataTable(); //inialisasi datatable
                oTable.fnDraw(false); //reset datatable
                if (response.status == 400) {
                    $('#modalJudulEdit').html("");
                    $('#modalJudulEdit').removeClass('d-none');
                    $.each(response.errors, function(key, err_value) {
                        $('#modalJudulEdit').append('<li>' + err_value +
                        '</li>');
                    }); 

                    $('#btn-update').text('Update');
                } 
                else if (response.status == 404)
                {
                    alert(response.message);
                }
                else if(response.status == 200)
                {
                    $('#modalJudulEdit').html("");
                    toastr.success(response.message);

                    $('#editModal').modal('hide');
                }
            }
        });

    });

    //jika klik class delete (yang ada pada tombol delete) maka tampilkan modal konfirmasi hapus maka
    $('body').on('click', '.delete', function() {
        id = $(this).attr('id');
        $('#modalHapus').modal('show');
    });
    //jika tombol hapus pada modal konfirmasi di klik maka
    $('#btn-hapus').click(function() {
        $.ajax({
            url: "/guru/delete/" + id, //eksekusi ajax ke url ini
            type: 'delete',
            beforeSend: function() {
                $('#btn-hapus').text('Hapus Data...'); //set text untuk tombol hapus
            },
            success: function(response) { //jika sukses
                setTimeout(function() {
                    $('#modalHapus').modal('hide');
                    var oTable = $('#table-guru').dataTable();
                    oTable.fnDraw(false); //reset datatable
                    if(response.status == 404)
                    {
                        alert(response.message);
                    }
                    else if(response.status == 200)
                    {
                        toastr.success(response.message);
                    }
                });
            }
        })
    });

</script>
@endsection