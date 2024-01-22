<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash();?>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal"
                data-bs-target="#formModal">
                Tambah Data Siswa
            </button>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-6">
            <form action="<?=BASEURL;?>mahasiswa/cari" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon"
                        aria-describedby="button-addon1" placeholder="Cari Mahasiswa" name="keyword" id="keyword" autocomplete="off">
                    <button class="btn btn-outline-primary" type="submit" id="tombolCari">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <h3>Daftar Siswa</h3>
            <ul class="list-group">
                <?php foreach($data['sw'] as $sw):?>
                <li class="list-group-item">
                    <?= $sw['nama'];?>
                    <a href="<?= BASEURL;?>mahasiswa/hapus/<?=$sw['id'];?>" class="badge text-bg-danger float-end"
                        style="text-decoration: none; font-size:600;" onclick="return confirm('yakin?')">Hapus</a>
                    <a href="<?= BASEURL;?>mahasiswa/ubah/<?= $sw['id'] ?>"
                        class="badge text-bg-success float-end me-2 tampilModalUbah"
                        style="text-decoration: none; font-size:600;" data-bs-toggle="modal" data-bs-target="#formModal"
                        data-id="<?= $sw['id'];?>">Edit</a>
                    <a href="<?= BASEURL;?>mahasiswa/detail/<?= $sw['id'] ?>"
                        class="badge text-bg-primary float-end me-2 "
                        style="text-decoration: none; font-size:600;">Detail</a>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>

<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModal">Tambah Data Mahasiswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL;?>mahasiswa/tambah" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="nama" class="form-label">nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Anda">
                    </div>
                    <div class="mb-3">
                        <label for="nis" class="form-label">NIS :</label>
                        <input type="number" class="form-control" id="nis" name="nis" placeholder="NIS Anda">
                    </div>
                    <div class="mb-3">
                        <label for="absen" class="form-label">No Absen :</label>
                        <input type="number" class="form-control" id="absen" name="absen" placeholder="No Absen Anda">
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas :</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas Anda">
                    </div>
                    <div class="col-md-4">
                        <label for="jurusan" class="form-label">Jurusan :</label>
                        <select id="jurusan" class="form-select" name="jurusan">
                            <option value="Bisnis Konstruksi Properti">Bisnis Konstruksi Properti</option>
                            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                            <option value="Teknis Bisnis Sepeda Motor">Teknis Bisnis Sepeda Motor</option>
                            <option value="Teknik Kompoter Jaringan">Teknik Kompoter Jaringan</option>
                            <option value="Teknik Audio Video">Teknik Audio Video</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>