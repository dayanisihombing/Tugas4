<!-- Begin Page Content -->
<div class="container-fluid"><br>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard Penjualan</h1>
    
</div>

<!-- Content Row -->
<div class="row">

    <!-- Pending Requests Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Total Stok Barang</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $barang?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Penjualan
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?='Rp '.number_format($penjualan[0]['TotalPendapatan'],'0',',','.')?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <!-- <i class="fa-solid fa-dollar-sign"></i> -->
                        <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Laba Rugi
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?='Rp '.number_format($penjualan[0]['LabaRugi'],'0',',','.')?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Daftar Barang</h6>
    </div>
    <div class="card-body">
    <!-- <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-4" id="btn-show-more">Show Less</button> -->
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID Barang</th>
                        <th>Nama barang</th>
                        <th>Stok</th>
                        <th>Terjual</th>
                        <th>Pendapatan</th>
                        <th>Pembelian</th>
                        <th>Laba/Rugi</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($laba as $data): ?> 
                    <tr>
                        <td><?=$data['IdBarang']?></td>
                        <td><?=$data['NamaBarang']?></td>
                        <td><?=$data['Stok']?></td>
                        <td><?=$data['TotalTerjual']?></td>
                        <td><?='Rp '.number_format($data['TotalPendapatan'],'0',',','.');?></td>
                        <td><?='Rp '.number_format($data['TotalPembelian'],'0',',','.');?></td>
                        <td><?='Rp '.number_format($data['Laba'],'0',',','.');?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Content Row -->
</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->