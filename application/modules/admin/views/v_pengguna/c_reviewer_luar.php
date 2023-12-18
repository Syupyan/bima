<div class="content-wrapper container">

    <div class="page-heading">
        <h3><?= $title ?></h3>
    </div>
    <div class="page-content">

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <a class="btn btn-danger" href="<?= base_url('admin/master-pengguna-luar'); ?>"><i
                                    class="fas fa-fw fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="col-auto">
                            <span data-bs-toggle="modal" data-bs-target="#inputModal1">
                                <i class="zmdi zmdi-help-outline"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" class="form" action="<?= base_url('admin/Master_Pengguna/add_user_luar') ?>"
                        data-parsley-validate>
                        <div class="row">
                            <table class='table table-bordered'>
                                <tr>
                                    <td><label for="Nidn_Nidk">NIP/NIK</label></td>
                                    <td>
                                        <div class="position-relative">
                                            <input name="nip_nik" type="number" class="form-control" placeholder="NIP/NIK"
                                                id="Nidn_Nidk" data-parsley-required="true">

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="Nidn_Nidk">NIDN</label></td>
                                    <td>
                                        <div class="position-relative">
                                            <input name="nidn" type="number" class="form-control" placeholder="NIDN"
                                                id="Nidn_Nidk" data-parsley-required="true">

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="nama">Nama</label></td>
                                    <td>
                                        <div class="position-relative">
                                            <input name="nama" type="text" class="form-control" placeholder="Nama"
                                                id="nama" data-parsley-required="true">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="Password">Password</label></td>
                                    <td>
                                        <div class="position-relative">
                                            <input name="password" type="password" class="form-control"
                                                placeholder="Password" id="Password" data-parsley-required="true">
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

<div class="modal fade" id="inputModal1" tabindex="-1" role="dialog" aria-labelledby="inputModal1Label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inputModal1Label">Penjelasan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                </div>
                <p class="explanation-text">NIP/NIK tidak boleh sama dengan data NIP/NIK lama !</p>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
