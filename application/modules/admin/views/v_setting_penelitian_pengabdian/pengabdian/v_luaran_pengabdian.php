<div class="content-wrapper container">
    <div class="page-heading">
        <h3><?= $title ?></h3>
        <a class="btn btn-danger" href="<?= base_url('admin/data-setting-pengabdian'); ?>"><i
                class="fas fa-fw fa-arrow-left"></i> Kembali</a>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-15">
                <div class="row">
                    <div class="col-12 col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tambah Luaran Wajib Pengabdian</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" class="form"
                                    action="<?= base_url('admin/Setting_Penelitian_Pengabdian/add_luaran_wajib_pengabdian') ?>"
                                    data-parsley-validate>
                                    <table class='table table-bordered'>
                                        <tr>
                                            <td><label>Luaran Wajib Pengabdian</label></td>
                                            <td>
                                                <div class="position-relative">
                                                    <input name="nama_luaran_wajib" type="text"
                                                        class="form-control datetimepicker" placeholder="Luaran Wajib"
                                                        data-parsley-required="true">
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>Luaran Wajib Pengabdian</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Luaran Wajib</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $no=1; foreach ($luaran_usulan_wajib as $tp): ?>
                                        <tr>
                                            <th><?= $no++ ?></th>
                                            <td><?= $tp['nama_luaran_wajib'] ?></td>
                                            <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalScrollable<?= $tp['id_luaran'] ?>"><i
                                            class="fas fa-fw fa-edit"></i></button>  
                                            <a title="Hapus"
                                                    href="<?= base_url('admin/Setting_penelitian_Pengabdian/delete_luaran_wajib_pengabdian/').$tp['id_luaran'] ?>"
                                                    class="btn btn-danger btn-hapus"
                                                    onclick="return confirm('Yakin ?')"><i
                                                        class="fas fa-fw fa-trash"></i></a>
                                                    </td>
                                        </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tambah Luaran Tambahan Pengabdian</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" class="form"
                                    action="<?= base_url('admin/Setting_Penelitian_Pengabdian/add_luaran_tambahan_pengabdian') ?>"
                                    data-parsley-validate>
                                    <table class='table table-bordered'>
                                        <tr>
                                            <td><label>Luaran Tambahan Pengabdian</label></td>
                                            <td>
                                                <div class="position-relative">
                                                    <input name="nama_luaran_tambahan" type="text"
                                                        class="form-control datetimepicker"
                                                        placeholder="Luaran Tambahan" data-parsley-required="true">
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>Luaran Tambahan Pengabdian</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="table2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Luaran Tambahan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $no=1; foreach ($luaran_usulan_tidak_wajib as $tp): ?>
                                        <tr>
                                            <th><?= $no++ ?></th>
                                            <td><?= $tp['nama_luaran_tambahan'] ?></td>
                                            <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalScrollable1<?= $tp['id_luaran'] ?>"><i
                                            class="fas fa-fw fa-edit"></i>
                                    </button>  
                                            <a title="Hapus"
                                                    href="<?= base_url('admin/Setting_Penelitian_Pengabdian/delete_luaran_tambahan_pengabdian/').$tp['id_luaran'] ?>"
                                                    class="btn btn-danger btn-hapus"
                                                    onclick="return confirm('Yakin ?')"><i
                                                        class="fas fa-fw fa-trash"></i></a>
                                                    </td>
                                        </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>

<?php $no=1; foreach ($luaran_usulan_wajib as $tp){ ?>
<!--scrolling content Modal -->
<div class="modal fade" id="exampleModalScrollable<?= $tp['id_luaran'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Luaran Wajib</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" class="form" enctype="multipart/form-data"
                    action="<?= base_url('admin/Setting_Penelitian_Pengabdian/update_luaran_wajib_pengabdian') ?>" data-parsley-validate>
                    <div class="form-group">
                        <label>Luaran wajib</label>
                        <input hidden type="text" name="id_luaran" value="<?= $tp['id_luaran'] ?>" class="form-control"></input>
                        <input type="text" name="nama_luaran_wajib" value="<?= $tp['nama_luaran_wajib'] ?>" class="form-control"></input>
                    </div>
                    <?= get_csrf() ?>
                    <div class="modal-footer">
        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
        </div>
        </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php $no=1; foreach ($luaran_usulan_tidak_wajib as $tp){ ?>
<!--scrolling content Modal -->
<div class="modal fade" id="exampleModalScrollable1<?= $tp['id_luaran'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Luaran Tambahan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" class="form" enctype="multipart/form-data"
                    action="<?= base_url('admin/Setting_Penelitian_Pengabdian/update_luaran_tambahan_pengabdian') ?>" data-parsley-validate>
                    <div class="form-group">
                        <label>Luaran Tambahan</label>
                        <input hidden type="text" name="id_luaran" value="<?= $tp['id_luaran'] ?>" class="form-control"></input>
                        <input type="text" name="nama_luaran_tambahan" value="<?= $tp['nama_luaran_tambahan'] ?>" class="form-control"></input>
                    </div>
                    <?= get_csrf() ?>
                    <div class="modal-footer">
        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
        </div>
        </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>