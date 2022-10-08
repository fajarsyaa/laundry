<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Tambah pegawai
        </h3>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="<?php controller("PegawaiController@TambahData") ?>" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="masukkan nama calon pegawai">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="masukkan email calon pegawai">
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="masukkan password calon pegawai">
                </div>
                <div class="form-group">
                    <label for="umur">Umur</label>
                    <input type="number" name="umur" class="form-control" placeholder="masukkan umur calon pegawai">
                </div>
                <div class="form-group">
                    <label for="no_hp">Nomor Hp</label>
                    <input type="number" name="no_hp" class="form-control" placeholder="masukkan no hp calon pegawai">
                </div>
                <div class="form-group">
                    <label for="status_pekerjaan">Posisi Yang Akan DI Isi</label>
                    <select name="status_pekerjaan" id="kurir" class="form-control">
                        <option value="kurir">kurir</option>
                        <option value="admin">admin</option>
                        <option value="lainya">lainya</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="wilker">Wilayah Kerja</label>
                    <select name="wilker" id="wilker" class="form-control">
                        <option value="gudang">gudang</option>
                        <?php foreach (query()->table('ongkir')->get() as $key => $value) : ?>
                            <option value="<?= $value['daerah'] ?>"><?= $value['daerah'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="asal">Domisili</label>
                    <input type="text" name="asal" class="form-control" placeholder="masukkan asal calon pegawai">
                </div>
                <div class="form-group">
                    <label for="ttl">tempat,tanggal,lahir</label>
                    <input type="text" name="ttl" class="form-control" placeholder="mojokerto, 02-02-22">
                </div>
                <div class="form-group">
                    <label for="foto">Foto karyawan</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <?php tombolForm() ?>
                <!-- Agar fungsi tombol kembali berfungsi dengan baik, pastikan anda punya file dengan nama data.php -->

            </form>
        </div>
    </div><!-- /.card-body -->
</div>