<div class="content-wrapper container">

    <div class="page-heading">
        <h3><?= $title ?></h3>
    </div>
    <div class="page-content">

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-danger" href="<?= base_url('admin/master-mahasiswa'); ?>"><i
                            class="fas fa-fw fa-arrow-left"></i> Kembali</a>

                </div>
                <div class="card-body">
                    <form method="POST" class="form" action="<?= base_url('admin/Master_Mahasiswa/update_mhs') ?>"
                        data-parsley-validate>
                        <div class="row">
                            <table class='table table-bordered'>
                                <input hidden name="id_mhs" type="text" class="form-control"
                                    placeholder="Nama Lain Prodi" value="<?= $mahasiswa['id_mhs'] ?>" id="nama"
                                    data-parsley-required="true">
                                <tr>
                                    <td><label for="Nidn_Nidk">NIM</label></td>
                                    <td>
                                        <div class="position-relative">
                                            <input name="nim" type="number" class="form-control" placeholder="NIM"
                                                value="<?= $mahasiswa['nim'] ?>" id="Nidn_Nidk"
                                                data-parsley-required="true">

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="nama">Nama</label></td>
                                    <td>
                                        <div class="position-relative">
                                            <input name="nama" type="text" class="form-control" placeholder="Nama"
                                                value="<?= $mahasiswa['nama'] ?>" id="nama"
                                                data-parsley-required="true">

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="tanggal_lahir">Tanggal Lahir</label></td>
                                    <td>
                                        <div class="position-relative">
                                            <?php
                $tanggal_lahir = date('Y-m-d', strtotime($mahasiswa['tanggal_lahir']));
            ?>
                                            <input name="tanggal_lahir" type="text" class="form-control"
                                                placeholder="Tanggal Lahir" value="<?= $tanggal_lahir ?>"
                                                id="tanggal_lahir" data-parsley-required="true">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td width=190 class="text-bold">Prodi</td>
                                    <td>
                                        <div class="input-group">
                                            <select name="prodi_id" class="form-select" id="inputGroupSelect02"
                                                data-parsley-required="true">
                                                <?php foreach ($prodi as $pr): ?>
                                                <option value="<?= $pr['id_prodi'] ?>" <?php echo $pr['id_prodi'] == $mahasiswa['prodi_id'] ? 'selected' : ''; ?>><?= $pr['nama_prodi'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <label class="input-group-text" for="inputGroupSelect02">Pilihan</label>
                                        </div>
                                    </td>
                                </tr>
                        </div>
                        </table>

                        <br>
                        <?= get_csrf() ?>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>

</div>
