<div class="page-heading">
    <section class="section">
        <div class="card">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('delete')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('delete'); ?>
                </div>
            <?php endif; ?>
            <div class="card-header">
                <h3 class="card-title float-start"><?= $getlayanan['nama_layanan'] ?></h3>
                <div class="card-tools float-end">
                    <a href="<?= base_url('admin/tambahPaket/' . $getlayanan['slug_nama']); ?>" class="btn btn-primary btn-flat btn-sm ">
                        <i class="bi-regular bi-plus">Tambah Data</i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Nama Paket</th>
                            <th>Harga Paket</th>
                            <th>Potongan Harga</th>
                            <th width='500px'>Detail Paket</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($getPaket as $key) { ?>
                            <tr>
                                <td><?= $key['nama_paket']; ?></td>
                                <td><?= $key['harga_paket']; ?></td>
                                <td><?= $key['potongan_paket']; ?></td>
                                <td><?= $key['detail_paket']; ?></td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="<?= base_url('admin/editLayanan/' . $key['paket_id']) ?>">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm " href="<?= base_url('admin/deleteLayanan/' . $key['paket_id'] . "/?aksi=hapus&layanan_id=" . $key['layanan_id']) ?>" onclick="return confirm('Yakin ingin menghapus data ini??')">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php }; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>