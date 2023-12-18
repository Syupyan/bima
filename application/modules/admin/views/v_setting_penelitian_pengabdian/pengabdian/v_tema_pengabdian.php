<div class="content-wrapper container">

    <div class="page-heading">
        <h3><?= $title ?></h3>
        <a class="btn btn-danger" href="<?= base_url('admin/data-setting-Pengabdian'); ?>"><i
                                    class="fas fa-fw fa-arrow-left"></i> Kembali</a>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-15">
                <div class="row">
                    <div class="col-12 col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tambah Tema</h4>
                            </div>
                            <div class="card-body">
                            <form method="POST" class="form"
                                    action="<?= base_url('admin/Setting_Penelitian_Pengabdian/add_tema_pengabdian') ?>" data-parsley-validate>
                                    <table class='table table-bordered'>
                                        <tr>
                                            <td><label>Tema Pengabdian</label></td>
                                            <td>
                                                    <div class="position-relative">
                                                        <input  name="tema_pengabdian" type="text" class="form-control datetimepicker"
                                                            placeholder="Tema Pengabdian" id="tanggal_lahir"
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
                                <h4>Tema Pengabdian</h4>
                            </div>
                            <div class="card-body">
                            <table class="table table-bordered" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tema Pengabdian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no=1; foreach ($tema_pengabdian as $tp): ?>
                        <tr>
                            <th><?= $no++ ?></th>
                            <td><?= $tp['tema_pengabdian'] ?></td>
                            <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalScrollable<?= $tp['id_tema'] ?>"><i
                                            class="fas fa-fw fa-edit"></i></button>
                            <a title="Hapus"
                                    href="<?= base_url('admin/Setting_Penelitian_Pengabdian/delete_tema_pengabdian/').$tp['id_tema'] ?>"
                                    class="btn btn-danger btn-hapus" onclick="return confirm('Yakin ?')"><i
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
<?php $no=1; foreach ($tema_pengabdian as $tp){ ?>
<!--scrolling content Modal -->
<div class="modal fade" id="exampleModalScrollable<?= $tp['id_tema'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Tema Pengabdian</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" class="form" enctype="multipart/form-data"
                    action="<?= base_url('admin/Setting_Penelitian_Pengabdian/update_tema_pengabdian') ?>" data-parsley-validate>
                    <div class="form-group">
                        <label>Tema Pengabdian</label>
                        <input hidden type="text" name="id_tema" value="<?= $tp['id_tema'] ?>" class="form-control"></input>
                        <input type="text" name="tema_pengabdian" value="<?= $tp['tema_pengabdian'] ?>" class="form-control"></input>
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
