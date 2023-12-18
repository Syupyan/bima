<div class="content-wrapper container">

    <div class="page-heading">
        <h3><?= $title ?></h3>
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
                                    action="<?= base_url('admin/Tema_Penelitian_Pengabdian/add_tema_penelitian') ?>" data-parsley-validate>
                                    <table class='table table-bordered'>
                                        <tr>
                                            <td><label>Tema Penelitian</label></td>
                                            <td>
                                                    <div class="position-relative">
                                                        <input  name="tema_penelitian" type="text" class="form-control datetimepicker"
                                                            placeholder="Tema Penelitian" id="tanggal_lahir"
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
                                <h4>Tema Penelitian</h4>
                            </div>
                            <div class="card-body">
                            <table class="table table-bordered" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tema Penelitian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no=1; foreach ($tema_penelitian as $tp): ?>
                        <tr>
                            <th><?= $no++ ?></th>
                            <td><?= $tp['tema_penelitian'] ?></td>
                            <td><a title="Hapus"
                                    href="<?= base_url('admin/Tema_Penelitian_Pengabdian/delete_tema/').$tp['id_tema'] ?>"
                                    class="btn btn-danger btn-hapus" onclick="return confirm('Yakin ?')"><i
                                        class="fas fa-fw fa-trash"></i></a></td>
                           
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

