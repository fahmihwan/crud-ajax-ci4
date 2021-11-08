<?= $this->extend('templates'); ?>

<?= $this->section('content'); ?>
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand float-left" href="#">Tugas CRUD</a>
    <a class="btn btn-primary float-right" href="<?= site_url('login/logout') ?>">logout</a>
</nav>
<div class="container">

    <!-- Begin Page Content -->
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-9">

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#mahasiswa">
                    Tambah
                </button>

                <!-- Modal -->
                <div class="modal fade" id="mahasiswa" tabindex="-1" aria-labelledby="mahasiswaLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mahasiswaLabel">Tambah Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form method="post" id="dataMahasiswa">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="npm">NPM</label>
                                                <input type="text" id="npm" class="form-control" placeholder="NPM" name="npm">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama">nama</label>
                                                <input type="text" id="nama" class="form-control" placeholder="Nama" name="nama">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="gender">gender</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="laki-laki">
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        Laki-laki
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="perempuan">
                                                    <label class="form-check-label" for="exampleRadios2">
                                                        Perempuan
                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="jurusan">Jurusan</label>
                                                <select class="form-control" id="jurusan" name="jurusan">
                                                    <option value="S1-Sistem Informasi">S1-Sistem Informasi</option>
                                                    <option value="S1-Teknik Informatika">S1-Teknik Informatika</option>
                                                    <option value="S1-Teknik Komputer">S1-Teknik Komputer</option>
                                                    <option value="S1-Teknik Elektro">S1-Teknik Elektro</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="jurusan">Asal</label>
                                        <input type="text" class="form-control" placeholder="Asal" name="asal">
                                    </div>
                                    <div class="form-group">
                                        <label for="jurusan">Umur</label>
                                        <input type="text" class="form-control" placeholder="Umur" name="umur">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- endModal -->


                <!-- modal edit  -->
                <div class="modal" tabindex="-1" role="dialog" id="editModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ubah Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="editDataMahasiswa">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end Modal edit -->

            </div>
            <div class=" col-md-3">
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="cari" id="input-pencarian">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit" id="btn-cari">cari</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary ">Data Mahasiswa</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>NPM</th>
                                <th>Nama</th>
                                <th>Gender</th>
                                <th>Jurusan</th>
                                <th>Asal</th>
                                <th>Umur</th>
                            </tr>
                        </thead>
                        <tbody id="table">


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>


<?= $this->endSection() ?>

<?= $this->section('script') ?>


<script>
    $('document').ready(function() {
        loadData();

        $('#dataMahasiswa').submit(function(e) {
            e.preventDefault()
            insertData();
        })


        $('#btn-cari').click(function() {
            const input = $('#input-pencarian').val();
            pencarian(input)
            $('#input-pencarian').val('');
        })
    })


    function pencarian(data) {
        loadData()
        $.ajax({
            url: '<?= site_url('mahasiswa/index') ?>',
            type: 'post',
            dataType: 'json',
            data: {
                search: data
            },
            success: function(response) {
                console.log(response)
                $('#table').empty();
                response.forEach(e => {
                    $('#table').append(`
            <tr>
                <td>
                    <a class="btn btn-sm btn-danger" onclick="hapus(${e.id})" role=" button">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </a>
                  
                    <a class="btn btn-sm btn-warning" onclick="editData(${e.id})" role="button">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                </td>
                <td>${e.npm}</td>
                <td>${e.nama}</td>
                <td>${e.gender}</td>
                <td>${e.jurusan}</td>
                <td>${e.asal}</td>
                <td>${e.umur}</td>
            </tr>`);
                });
            },
            error: function() {
                alert('error');
            }
        })
    }

    function editData(id) {
        $.ajax({
            url: "<?= site_url('mahasiswa/editData') ?>",
            type: 'post',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(data) {
                $('#editModal').modal('show')
                $('#editDataMahasiswa').html(` <form method="post" id="updateMahasiswa" action="<?= site_url('mahasiswa/update') ?>"> 
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="npm">NPM</label>
                                                    <input type="text" id="npm" class="form-control" placeholder="NPM" name="id" value= "${data.id}" hidden>
                                                    <input type="text" id="npm" class="form-control" placeholder="NPM" name="npm" value= "${data.npm}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nama">nama</label>
                                                    <input type="text" id="nama" class="form-control" placeholder="Nama" name="nama" value="${data.nama}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="gender">gender</label>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="laki-laki" ${data.gender == 'laki-laki' ? 'checked': ''}>
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            Laki-laki
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="perempuan" ${data.gender == 'perempuan'? 'checked' : ''} >
                                                        <label class="form-check-label" for="exampleRadios2">
                                                            Perempuan
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="jurusan">Jurusan</label>
                                                    <select class="form-control" id="jurusan" name="jurusan">
                                                        <option value="${data.jurusan}">${data.jurusan}</option>
                                                        <option value="S1-Sistem Informasi">S1-Sistem Informasi</option>
                                                        <option value="S1-Teknik Informatika">S1-Teknik Informatika</option>
                                                        <option value="S1-Teknik Komputer">S1-Teknik Komputer</option>
                                                        <option value="S1-Teknik Elektro">S1-Teknik Elektro</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="jurusan">Asal</label>
                                            <input type="text" class="form-control" placeholder="Asal" name="asal" value="${data.asal}">
                                        </div>
                                        <div class="form-group">
                                            <label for="jurusan">Umur</label>
                                            <input type="text" class="form-control" placeholder="Umur" name="umur" value="${data.umur}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary" id="submitUbah" >Ubah</button>
                                    </div>
                                </form>
                `);
            },
            error: function() {
                alert('error')
            }
        })

    }


    function insertData() {
        $.ajax({
            url: "<?= site_url('mahasiswa/index') ?>",
            type: 'post',
            dataType: 'json',
            data: $('#dataMahasiswa').serialize(),
            success: function() {
                loadData()
                $('#dataMahasiswa').trigger('reset')
                $('#mahasiswa').modal('hide');

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'data berhasil disimpan',
                    showConfirmButton: false,
                    timer: 1000
                })
            },
            error: function() {
                // console.log('error');
                alert('eroor')
            }
        })
    }

    function hapus(id) {

        Swal.fire({
            title: 'Konfirmasi',
            text: "Hapus data mahasiswa?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= site_url('mahasiswa/delete') ?>",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        id: id
                    },
                    success: function() {
                        loadData()
                    },
                    error: function() {
                        alert('error');
                    }
                })

                Swal.fire(
                    'Deleted!',
                    'Data berhasil di hapus.',
                    'success'
                )
            }
        })

    }


    function loadData() {
        $.ajax({
            url: "<?= site_url('mahasiswa/getData') ?>",
            dataType: 'JSON',
            success: function(response) {
                $('#table').empty();
                response.findAll.forEach(e => {

                    $('#table').append(`
            <tr>
                <td>
                    <a class="btn btn-sm btn-danger" onclick="hapus(${e.id})" role=" button">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </a>
                  
                    <a class="btn btn-sm btn-warning" onclick="editData(${e.id})" role="button">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                </td>
                <td>${e.npm}</td>
                <td>${e.nama}</td>
                <td>${e.gender}</td>
                <td>${e.jurusan}</td>
                <td>${e.asal}</td>
                <td>${e.umur}</td>
            </tr>`);
                });
            },
            error: function() {
                alert('errr')
            }
        })
    }
</script>

<?= $this->endSection() ?>