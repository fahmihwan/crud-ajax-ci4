<?= $this->extend('templates'); ?>

<?= $this->section('content'); ?>

<div class="container">

    <!-- DataTales Example -->
    <div class="card shadow mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary ">Data Mahasiswa</h6>
        </div>
        <div class="card-body">
            <form method="post" action="<?= site_url('mahasiswa/update') ?>" id="dataMahasiswa">
                <input type="hidden" name="id" value="<?= $mhs['id'] ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="npm">NPM</label>
                            <input type="text" id="npm" class="form-control" placeholder="NPM" name="npm" value="<?= $mhs['npm'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">nama</label>
                            <input type="text" id="nama" class="form-control" placeholder="Nama" name="nama" value="<?= $mhs['nama'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group ">
                            <label for="gender">gender</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="laki-laki" <?= ($mhs['gender'] == 'laki-laki') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="exampleRadios1">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="perempuan" <?= ($mhs['gender'] == 'perempuan') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="exampleRadios2">
                                    Perempuan
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select class="form-control" id="jurusan" name="jurusan">
                                <?php if ($mhs['jurusan']) : ?>
                                    <option value="<?= $mhs['jurusan'] ?>"><?= $mhs['jurusan'] ?></option>
                                <?php endif; ?>
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
                    <input type="text" class="form-control" placeholder="Asal" name="asal" value="<?= $mhs['asal'] ?>">
                </div>
                <div class="form-group">
                    <label for="jurusan">Umur</label>
                    <input type="text" class="form-control" placeholder="Umur" name="umur" value="<?= $mhs['umur'] ?>">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>




</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<?= $this->endSection() ?>