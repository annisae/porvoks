  <main class="flex-shrink-0">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="text-center mt-5">Tambah Data Mahasiswa</h2>
          <div class="card mt-5">
            <div class="card-header">
              <div class="d-flex justify-content-between">
                <div class="text-lef">
                  Tambah Data Mahasiswa
                </div>
                <div class="text-right">
                  <a href="<?=site_url('/')?>" class="btn btn-sm btn-primary">Kembali</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="<?=site_url('tambah-data')?>" method="post">
                <div class="mb-3">
                  <label class="form-label">NIM</label>
                  <input type="text" class="form-control" name="nim" value="<?=set_value('nim')?>">
                  <small class="text-danger"><?= form_error('nim') ?></small>
                </div>
                <div class="mb-3">
                  <label class="form-label">Nama Mahasiswa</label>
                  <input type="text" class="form-control" name="nama" value="<?=set_value('nama')?>">
                  <small class="text-danger"><?= form_error('nama') ?></small>
                </div>
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" value="<?=set_value('email')?>">
                  <small class="text-danger"><?= form_error('email') ?></small>
                </div>
                <div class="mb-3">
                  <label class="form-label">Nama Kampus</label>
                  <input type="text" class="form-control" name="nama_kampus" value="<?=set_value('nama_kampus')?>">
                  <small class="text-danger"><?= form_error('nama_kampus') ?></small>
                </div>
                <div class="mb-3">
                  <label class="form-label">Jurusan</label>
                  <input type="text" class="form-control" name="jurusan" value="<?=set_value('jurusan')?>">
                  <small class="text-danger"><?= form_error('jurusan') ?></small>
                </div>
                <button type="submit" class="btn btn-success">Tambah Data</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>