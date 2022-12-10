  <main class="flex-shrink-0">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="text-center mt-5">Import Data Mahasiswa</h2>
          <div class="card mt-5">
            <div class="card-header">
              <div class="d-flex justify-content-between">
                <div class="text-lef">
                  Import Data Mahasiswa
                </div>
                <div class="text-right">
                  <a href="<?=site_url('/')?>" class="btn btn-sm btn-primary">Kembali</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="<?=site_url('import/data')?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label class="form-label">File Excel <small class="text-danger">(Format : csv/xlsx, Max. 3mb)</small></label>
                  <input class="form-control" type="file" name="upload_file">
                  <small class="text-danger"><?=form_error('upload_file') ?></small>
                </div>
                <a href="<?=site_url('import/format')?>" class="btn btn-primary" target="_blank">Download Format Import</a>
                <button type="submit" class="btn btn-success">Import Data</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>