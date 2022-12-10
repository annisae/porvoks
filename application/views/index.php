  <main class="flex-shrink-0">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="text-center mt-5">Data Mahasiswa di Indonesia</h2>
          <div class="card mt-5">
            <div class="card-header">
              <div class="d-flex justify-content-between">
                <div class="text-lef">
                  Data Mahasiswa
                </div>
                <div class="text-right">
                  <a href="<?=site_url('tambah-data')?>" class="btn btn-sm btn-primary">Tambah Data</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover">
                  <thead>
                    <th>No.</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Email</th>
                    <th>Nama Kampus</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    foreach ($mahasiswa as $mahasiswa) : ?>
                      <tr>
                        <td><?=$no++;?></td>
                        <td><?=ucfirst($mahasiswa->nim)?></td>
                        <td><?=ucfirst($mahasiswa->nama)?></td>
                        <td><?=ucfirst($mahasiswa->email)?></td>
                        <td><?=ucfirst($mahasiswa->nama_kampus)?></td>
                        <td><?=ucfirst($mahasiswa->jurusan)?></td>
                        <td>
                          <a href="<?=site_url('update-data/').$mahasiswa->id?>" class="btn btn-sm btn-success">Update Data</a>
                          <a href="<?=site_url('hapus-data/').$mahasiswa->id?>" class="btn btn-sm btn-danger" onClick="return confirm('Apakah Anda yakin akan menghapus data ini?')">Hapus Data</a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>