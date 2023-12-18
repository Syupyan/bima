<?php foreach($penelitianku as $penelitianku){ ?>
<?php if($penelitianku['status_aktif'] == 'Draft'){ ?>
<div class="content-wrapper container">

    <div class="page-heading">
        <h3><?= $title ?></h3>
    </div>
    <div class="page-content">

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-danger"
                        href="<?= base_url('dosen/tambah-penelitian/2/').$penelitianku['id_penelitian']; ?>"><i
                            class="fas fa-fw fa-arrow-left"></i> Kembali</a>

                </div>
                <div class="card-body">
                    <form role="form" action="<?= base_url('dosen/Penelitian/add_penelitian_3') ?>" method="post"
                        enctype="multipart/form-data" class="f1" data-parsley-validate>
                        <div class="f1-steps">
                            <div class="f1-progress">
                                <div class="f1-progress-line" data-now-value="12.5" data-number-of-steps="4"
                                    style="width: 12.5%;"></div>
                            </div>
                            <div class="f1-step">
                                <div class="f1-step-icon active"><i class="fa fa-user"></i></div>
                                <p>Identitas Usulan Penelitian</p>
                            </div>
                            <div class="f1-step">
                                <div class="f1-step-icon"><i class="fa fa fa-user-group"></i></div>
                                <p>Identitas Ketua dan Anggota</p>
                            </div>
                            <div class="f1-step active">
                                <div class="f1-step-icon"><i class="fa fa-file"></i></div>
                                <p>Subtansi Usulan</p>
                            </div>
                            <div class="f1-step">
                                <div class="f1-step-icon"><i class="fa fa-check"></i></div>
                                <p>Konfirmasi Usulan</p>
                            </div>
                        </div>



                        <fieldset>
                            <label for="">1.4 Subtansi Usulan </label>
                            <input hidden type="text" value="<?= $penelitianku['id_penelitian'] ?>" name="id_penelitian"
                                placeholder="" class="f1-first-name form-control" id="f1-first-name">
                            <div class="form-group">
                                <label>Download Template</label>
                                <div class="position-relative">
                                    <a href="<?= base_url('user/User/download_file/template/').$setting['template_subtansi_penelitian'] ?>"
                                        class="btn btn-info"><i class="fas fa-fw fa-download"></i> Download</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Upload Subtansi Usulan</label>
                                <p style="color:red;">*PDF, DOC, DOCX</p>
                                <input hidden type="text" value="<?= $penelitianku['id_penelitian'] ?>"
                                    name="id_penelitian" placeholder="" class="f1-first-name form-control"
                                    id="f1-first-name">

                                <?php if ($penelitianku['subtansi_usulan'] != 'usulan') { ?>
                                <table class="table table-bordered">
                                    <tr>
                                        <td>File telah diunggah:</td>
                                        <td>
                                            <a target="_blank"
                                                href="<?= base_url('user/User/download_file/pdf_proyek/').$penelitianku['subtansi_usulan'] ?>"
                                                class="btn btn-info">Download</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ubah File:</td>
                                        <td>
                                            <input type="file" class="form-control" id="subtansi_usulan"
                                                name="subtansi_usulan" style="display: none;"></input>
                                            <button type="button" class="btn btn-secondary"
                                                onclick="toggleFileUpload()">Ubah File</button>
                                        </td>
                                    </tr>
                                </table>
                                <?php } else { ?>
                                <input type="file" id="subtansi_usulan" placeholder="Upload Lampiran"
                                    name="subtansi_usulan" class="form-control"  data-parsley-required="true"></input>
                                <?php } ?>
                            </div>

                            <script>
                            function toggleFileUpload() {
                                var fileInput = document.getElementById("subtansi_usulan");
                                if (fileInput.style.display === "none") {
                                    fileInput.style.display = "block";
                                } else {
                                    fileInput.style.display = "none";
                                }
                            }
                            </script>


                            <?php } ?>
                            <div class="f1-buttons">
                                <button type="submit" class="btn btn-submit">Selanjutnya</button>
                            </div>
                        </fieldset>

                    </form>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>

</div>
<?php } ?>