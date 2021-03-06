<?= view('_partial/_header'); ?>
<?= view('_partial/_sidebar'); ?>

<div class="main-content" id="panel">
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-10 col-10">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item">Master Data</li>
                                <li class="breadcrumb-item"><a href="">Transaksi Peminjaman</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Card stats -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Transaksi Peminjaman </h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="/pinjam/tambah" class="btn btn-sm btn-primary"><i class="ni ni-fat-add"></i> Tambah Peminjaman</a>
                            </div>
                        </div>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort">#</th>
                                    <th scope="col" class="sort">Tanggal Pinjam</th>
                                    <th scope="col" class="sort">Tanggal Kembali</th>
                                    <th scope="col" class="sort">Nama Barang</th>
                                    <th scope="col" class="sort text-center">Jumlah</th>
                                    <th scope="col" class="sort">Status</th>
                                    <th scope="col" class="sort">aksi</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php $i = 0;
                                foreach ($dataTransaksi as $trs) { ?>
                                    <tr>
                                        <th><?= ++$i; ?></th>
                                        <td><?= $trs['tgl_pinjam']; ?></td>
                                        <td><?= $trs['tgl_kembali']; ?></td>
                                        <td><?= $trs['nama_barang']; ?></td>
                                        <td class="text-center"><?= $trs['jumlah']; ?></td>
                                        <?php if ($trs['status'] == '0') { ?>
                                            <td class="text-left">
                                                <span class="badge badge-dot mr-4">
                                                    <i class="bg-yellow"></i>
                                                    <span class="status text-yellow">Menunggu Konfirmasi</span>
                                                </span>
                                            </td>
                                        <?php } elseif ($trs['status'] == '1') { ?>
                                            <td class="text-left">
                                                <span class="badge badge-dot mr-4">
                                                    <i class="bg-green"></i>
                                                    <span class="status">Dipinjam</span>
                                                </span>
                                            </td>
                                        <?php } elseif ($trs['status'] == '2') { ?>
                                            <td class="text-left">
                                                <span class="badge badge-dot mr-4">
                                                    <i class="bg-info"></i>
                                                    <span class="status text-info">Dikembalikan</span>
                                                </span>
                                            </td>
                                        <?php } elseif ($trs['status'] == '3') { ?>
                                            <td class="text-left">
                                                <span class="badge badge-dot mr-4">
                                                    <i class="bg-warning"></i>
                                                    <span class="status">Ditolak</span>
                                                </span>
                                            </td>
                                        <?php } ?>

                                        <td class="text-center">
                                            <div class="dropdown">
                                                <?php if ($trs['status'] != 2 && $trs['status'] != 0 && $trs['approved'] == '1') { ?>
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                <?php } ?>
                                                <?php if ($trs['status'] == '1') { ?>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <form action="<?= base_url('pinjam/pinjam_kembali/' . $trs['id_peminjaman']) ?>" method="post">
                                                            <input type="hidden" name="kode_barang" value="<?= $trs['kode_barang']; ?>">
                                                            <input type="hidden" name="jumlah" value="<?= $trs['jumlah'] ?>">
                                                            <input type="hidden" name="id_peminjaman" value="<?= $trs['id_peminjaman']; ?>">
                                                            <button type="submit" class="dropdown-item"><i class="fa fa-arrow-left"></i>Kembalikan</button>
                                                        </form>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Card footer -->
                    <div class="card-footer py-4">
                        <nav aria-label="...">

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('_partial/_footer'); ?>