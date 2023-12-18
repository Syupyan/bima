


<div class="content-wrapper container">

    <div class="page-heading">
    <h3><?= $title ?></h3>
    </div>
    <div class="page-content">

    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-danger" href="<?= base_url('admin/master-prodi'); ?>"><i class="fas fa-fw fa-arrow-left"></i> Kembali</a>

            </div>
            <div class="card-body">
                            <form method="POST" class="form" action="<?= base_url('admin/Master_Prodi/add_prodi') ?>" data-parsley-validate>
                                <div class="row">
                            <table class='table table-bordered'>
                            <tr>
                                 <td ><label for="Nidn_Nidk">Nama Prodi</label></td>
                                 <td>
                                                <div class="position-relative">
                                                    <input name="nama_prodi" type="text" class="form-control"
                                                        placeholder="Nama Prodi" id="Nidn_Nidk" data-parsley-required="true">
                                        
                                            </div>
                                 </td>
                             </tr>
                             <tr>
                                 <td ><label for="nama">Nama Lain Prodi</label></td>
                                 <td>
                                                <div class="position-relative">
                                                    <input name="nama_lain_prodi" type="text" class="form-control"
                                                        placeholder="Nama Lain Prodi" id="nama" data-parsley-required="true">
                                
                                            </div>
                                 </td>
                             </tr>
                             <tr>
                                 <td width=190 class="text-bold">Jurusan</td>
                                 <td>
                                 <div class="input-group">
                                        <select name="jurusan" class="form-select" id="inputGroupSelect02" data-parsley-required="true">
                                  <option>Komputer dan Bisnis</option>
                                  <option>Teknologi Rekayasa Industri</option>
                                  <option>Teknologi Industri Pertanian</option>
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

 