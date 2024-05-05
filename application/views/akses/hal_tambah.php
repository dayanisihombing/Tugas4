<!-- Begin Page Content -->
<div class="container-fluid"><br>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    
</div>
<form class="user" action = "<?= base_url('akses/tambah') ?>" method = "post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Nama Akses" name="NamaAkses">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Keterangan" name="Keterangan">
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Simpan
                                        </button>
                                        <hr>
                                        
                                    </form>
</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->