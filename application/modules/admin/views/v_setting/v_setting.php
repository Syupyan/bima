<div class="content-wrapper container">

    <div class="page-heading">
        <h3><?= $title ?></h3>
    </div>
    <div class="page-heading">
        <h4>Template Header</h4>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-12 col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Title</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" class="form"
                                    action="<?= base_url('admin/Setting/update_setting_title') ?>"
                                    data-parsley-validate>
                                    <table class='table table-bordered'>
                                        <tr>
                                            <td><label>Title Header</label></td>
                                            <td>
                                                <div class="position-relative">
                                                    <input value="<?= $setting['title_header'] ?>" name="title_header"
                                                        type="text" class="form-control" placeholder="Title Header"
                                                        id="tanggal_lahir" data-parsley-required="true">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>Title Footer</label></td>
                                            <td>
                                                <div class="position-relative">
                                                    <input value="<?= $setting['title_footer'] ?>" name="title_footer"
                                                        type="text" class="form-control" placeholder="Title Footer"
                                                        id="tanggal_lahir" data-parsley-required="true">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>Title Url</label></td>
                                            <td>
                                                <div class="position-relative">
                                                    <input value="<?= $setting['title_url'] ?>" name="title_url"
                                                        type="text" class="form-control" placeholder="Title Url"
                                                        id="tanggal_lahir" data-parsley-required="true">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>Title Login</label></td>
                                            <td>
                                                <div class="position-relative">
                                                    <input value="<?= $setting['title_login'] ?>" name="title_login"
                                                        type="text" class="form-control" placeholder="Title Login"
                                                        id="tanggal_lahir" data-parsley-required="true">
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
                                <h4>Panduan BIMA</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" class="form"
                                    action="<?= base_url('admin/Setting/update_setting_panduan') ?>"
                                    data-parsley-validate>
                                    <table class='table table-bordered'>
                                        <tr>
                                            <td><label>Panduan</label></td>
                                            <td>
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <textarea class="form-control" id="default" rows="3"
                                                            name="panduan_bima"
                                                            data-parsley-required="true"><?= $setting['panduan_bima'] ?></textarea>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>Nomor WhatsApp</label></td>
                                            <td>
                                                <div class="position-relative">
                                                    <input value="<?= $setting['nomor_whatsapp'] ?>"
                                                        name="nomor_whatsapp" type="text" class="form-control"
                                                        placeholder="Nomor Whatsapp" id="tanggal_lahir"
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
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Upload File</h4>
                    </div>
                    <div class="card-body py-1 px-3">
                        <div class="d-flex align-items-center">
                            <form method="POST" class="form"
                                action="<?= base_url('admin/Setting/update_setting_file') ?>"
                                enctype="multipart/form-data" data-parsley-validate>
                                <td><label for="Nidn_Nidk">Upload File Panduan</label><small class="text-muted">( Pdf )</small></td>
                                <div class="position-relative">
                                    <input name="file_panduan" type="file" class="form-control" placeholder="NIM"
                                        id="Nidn_Nidk" data-parsley-required="true">
                                </div><br>
                                <div class="position-relative text-center">
                                    <a href="<?= base_url('user/User/download_file/template/').$setting['file_panduan'] ?>"
                                        class="btn btn-danger">Download</a>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Upload</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="page-heading">
        <h4>Template Usulan</h4>
    </div>
        <section class="row">
            <div class="col-12 col-lg-12">
                <div class="row">

                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    </div>
                                    <form method="POST" class="form"
                                        action="<?= base_url('admin/Setting/update_setting_file_subtansi_penelitian') ?>"
                                        enctype="multipart/form-data" data-parsley-validate>
                                        <td><label for="Nidn_Nidk">Upload File Subtansi Penelitian</label><small class="text-muted">( Doc, Docx )</small></td>
                                        <div class="position-relative">
                                            <input name="template_subtansi_penelitian" type="file" class="form-control"
                                                placeholder="NIM" id="Nidn_Nidk" data-parsley-required="true">
                                        </div><br>
                                        <div class="position-relative text-center">
                                            <a href="<?= base_url('user/User/download_file/template/').$setting['template_subtansi_penelitian'] ?>"
                                                class="btn btn-danger">Download</a>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Upload</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    </div>
                                    <form method="POST" class="form"
                                        action="<?= base_url('admin/Setting/update_setting_file_subtansi_pengabdian') ?>"
                                        enctype="multipart/form-data" data-parsley-validate>
                                        <td><label for="Nidn_Nidk">Upload File Subtansi Pengabdian</label><small class="text-muted">( Doc, Docx )</small></td>
                                        <div class="position-relative">
                                            <input name="template_subtansi_pengabdian" type="file" class="form-control"
                                                placeholder="NIM" id="Nidn_Nidk" data-parsley-required="true">
                                        </div><br>
                                        <div class="position-relative text-center">
                                            <a href="<?= base_url('user/User/download_file/template/').$setting['template_subtansi_pengabdian'] ?>"
                                                class="btn btn-danger">Download</a>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Upload</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <div class="page-heading">
        <h4>Template Import</h4>
    </div>
        <section class="row">
            <div class="col-12 col-lg-12">
                <div class="row">

                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    </div>
                                    <form method="POST" class="form"
                                        action="<?= base_url('admin/Setting/update_setting_file_import_pengguna') ?>"
                                        enctype="multipart/form-data" data-parsley-validate>
                                        <td><label for="Nidn_Nidk">Upload File Import Pengguna</label><small class="text-muted">( xls, xlsx )</small></td>
                                        <div class="position-relative">
                                            <input name="template_import_pengguna" type="file" class="form-control"
                                                placeholder="NIM" id="Nidn_Nidk" data-parsley-required="true">
                                        </div><br>
                                        <div class="position-relative text-center">
                                            <a href="<?= base_url('user/User/download_file/template/').$setting['template_import_pengguna'] ?>"
                                                class="btn btn-danger">Download</a>
                                        </div>

                                        <br>
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Upload</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    </div>
                                    <form method="POST" class="form" action="<?= base_url('admin/Setting/update_setting_file_import_mahasiswa') ?>" enctype="multipart/form-data" data-parsley-validate>
                                        <td><label>Upload File Import Mahasiswa</label><small class="text-muted">( xls, xlsx )</small></td>
                                        <div class="position-relative">
                                            <input name="template_import_mahasiswa" type="file" class="form-control"
                                                placeholder="NIM" id="Nidn_Nidk" data-parsley-required="true">
                                        </div><br>
                                        <div class="position-relative text-center">
                                            <a href="<?= base_url('user/User/download_file/template/').$setting['template_import_mahasiswa'] ?>"
                                                class="btn btn-danger">Download</a>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Upload</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        
        <div class="page-heading">
            <h4>Maksimal Anggota Dosen Penelitian dan Pengabdian</h4>
        </div>
        <section class="row">
            <div class="col-12 col-lg-12">
                <div class="row">

                    <div class="col-12 col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Anggota Dosen Penelitian</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" class="form"
                                    action="<?= base_url('admin/Setting/update_setting_anggota_penelitian') ?>"
                                    data-parsley-validate>
                                    <table class='table table-bordered'>
                                        <tr>
                                            <td><label>Anggota Dosen</label></td>
                                            <td>
                                                <div class="position-relative">
                                                    <input value="<?= $setting['maksimal_anggota_dosen_penelitian'] ?>" name="maksimal_anggota_dosen_penelitian"
                                                        type="number" class="form-control" placeholder="Maksimal Anggota Dosen"
                                                        id="tanggal_lahir" data-parsley-required="true">
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

                    <div class="col-12 col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Anggota Dosen Pengabdian</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" class="form"
                                    action="<?= base_url('admin/Setting/update_setting_anggota_pengabdian') ?>"
                                    data-parsley-validate>
                                    <table class='table table-bordered'>
                                        <tr>
                                            <td><label>Anggota Dosen</label></td>
                                            <td>
                                                <div class="position-relative">
                                                    <input value="<?= $setting['maksimal_anggota_dosen_pengabdian'] ?>" name="maksimal_anggota_dosen_pengabdian"
                                                        type="number" class="form-control" placeholder="Maksimal Anggota Dosen"
                                                        id="tanggal_lahir" data-parsley-required="true">
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

                </div>
            </div>
        </section>
    </div>

</div>