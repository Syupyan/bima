


<div class="content-wrapper container">

    <div class="page-heading">
    <h3><?= $title ?></h3>
    </div>
    <div class="page-content">

        <!-- Main content -->
    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary" href="<?= base_url('admin/tambah-prodi'); ?>"><i
                        class="fas fa-fw fa-plus"></i> Tambah Data</a>

            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Prodi</th>
                            <th>Nama Lain Prodi</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no=1; foreach ($Prodi as $pr): ?>
                        <tr>
                            <th><?= $no++ ?></th>
                            <td><?= $pr['nama_prodi'] ?></td>
                            <td><?= $pr['nama_lain_prodi'] ?></td>
                            <td><?= $pr['jurusan'] ?></td>
                           
                            <td>

                                <a title="Edit Prodi"
                                    href="<?= base_url('admin/edit-prodi/').$pr['id_prodi'] ?>"
                                    class="btn btn-primary"><i class="fas fa-fw fa-edit"></i></a>
                                    <?php
                                    $cek_prodi = $this->db->select('*')
                                    ->from('tbl_pengguna')
                                    ->where('prodi_id',$pr['id_prodi'])
                                    ->get()->num_rows();
                                    $cek_prodi_mhs = $this->db->select('*')
                                    ->from('tbl_mahasiswa')
                                    ->where('prodi_id',$pr['id_prodi'])
                                    ->get()->num_rows();
                                    
                                    ?>
                                    <?php if($cek_prodi < 1){ ?>
                                    <?php if($cek_prodi_mhs < 1){ ?>

                                <a title="Hapus Prodi"
                                    href="<?= base_url('admin/Master_Prodi/delete_prodi/').$pr['id_prodi'] ?>"
                                    class="btn btn-danger btn-hapus" onclick="return confirm('Yakin ?')"><i
                                        class="fas fa-fw fa-trash"></i></a>
                                    <?php } ?>
                                    <?php } ?>
                            </td>
                        </tr>

                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->
    <!-- /.content -->
    </div>

</div>
