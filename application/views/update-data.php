  <main class="flex-shrink-0">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="text-center mt-5">Update Data Mahasiswa</h2>
          <div class="card mt-5">
            <div class="card-header">
              <div class="d-flex justify-content-between">
                <div class="text-lef">
                  Update Data Mahasiswa
                </div>
                <div class="text-right">
                  <a href="<?=site_url('/')?>" class="btn btn-sm btn-primary">Kembali</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="<?=site_url('update-data/').$mahasiswa['id']?>" method="post">
                <div class="mb-3">
                  <label class="form-label">NIM</label>
                  <input type="hidden" class="form-control" name="id" value="<?=$mahasiswa['id'] ?>">
                  <input type="text" class="form-control" name="nim" value="<?=$mahasiswa['nim'] ?>">
                  <small class="text-danger"><?= form_error('nim') ?></small>
                </div>
                <div class="mb-3">
                  <label class="form-label">Nama Mahasiswa</label>
                  <input type="text" class="form-control" name="nama" value="<?=$mahasiswa['nama'] ?>">
                  <small class="text-danger"><?= form_error('nama') ?></small>
                </div>
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" value="<?=$mahasiswa['email'] ?>">
                  <small class="text-danger"><?= form_error('email') ?></small>
                </div>
                <div class="mb-3">
                  <label class="form-label">Nama Kampus</label>
                  <input type="text" class="form-control" name="nama_kampus" value="<?=$mahasiswa['nama_kampus'] ?>">
                  <small class="text-danger"><?= form_error('nama_kampus') ?></small>
                </div>
                <div class="mb-3">
                  <label class="form-label">Jurusan</label>
                  <input type="text" class="form-control" name="jurusan" value="<?=$mahasiswa['jurusan'] ?>">
                  <small class="text-danger"><?= form_error('jurusan') ?></small>
                </div>
                <button type="submit" class="btn btn-success">Update Data</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>