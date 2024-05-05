<!-- Begin Page Content -->
<div class="container-fluid"><br>

<!-- Page Heading -->
                     <!-- Page Heading -->
                     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?= $title ?>
</h1>
                        <a href="<?= base_url('akses/halaman_tambah') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Tambah Hak Akses</a>
                    </div>
                    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Daftar Akses</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id Akses</th>
                                            <th>Nama Akses</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php foreach($akses as $a) : ?>
                                        <tr>
                                            <td><?= $a->IdAkses; ?></td>
                                            <td><?= $a->NamaAkses; ?></td>
                                            <td><?= $a->Keterangan; ?></td>
                                            <td>
                                            <a href="#" class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#edit<?= $a->IdAkses;?>"><i
                                class="fas fa-edit fa-sm text-white-50"></i> Ubah </a>
                                            <a href="<?= base_url('akses/hapus/').$a->IdAkses ?>" class="btn btn-sm btn-danger shadow-sm"><i
                                class="fas fa-trash fa-sm text-white-50"></i> Hapus </a>
                                            </td>
                                        </tr>  
                                    <?php endforeach; ?>                                         
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
</div>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?php
  foreach ($akses as $a) : ?>
<div class="modal fade" id="edit<?= $a->IdAkses;?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Hak Akses</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <form action="<?= base_url('akses/ubah/').$a->IdAkses; ?>" method="post">
      <div class="modal-body">
      <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Nama Akses" name="NamaAkses" value="<?= $a->NamaAkses; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Keterangan" name="Keterangan" value="<?= $a->Keterangan; ?>">
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Simpan
                                        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
     </form>
    </div>
  </div>
</div>

<?php endforeach; ?>
            