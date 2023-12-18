
<?php            
                            $cek_user = $this->db->select('*')
													->from('tbl_penelitian')
													->where('id_penelitian', $penelitian)
													->where('nip_nik_ketua', $user_login_data['nip_nik'])
													->get()->row_array();
                   ?>
            <?php if(isset($cek_user)){ ?>

<div class="content-wrapper container">

    <div class="page-heading">
    <h3><?= $title ?></h3>
    <a class="btn btn-danger" href="<?= base_url('dosen/data-penelitian-laporan/').$penelitian; ?>"><i
                            class="fas fa-fw fa-arrow-left"></i> Kembali</a>
    </div>
    <div class="page-content">

        <!-- Main content -->
    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
            <a class="btn btn-primary" href="<?= base_url('dosen/tambah-logbook-penelitian/').$penelitian; ?>"><i
                            class="fas fa-fw fa-plus"></i> Tambah Data</a> 
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Tempat Kegiatan</th>
                            <th>Dokumen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no=1; foreach ($logbook as $logbook): ?>
                        <tr>
                            <th><?= $no++ ?></th>
                            <td><?= $logbook['tanggal'] ?></td>
                            <td><?= $logbook['waktu'] ?></td>
                            <td><?= $logbook['tempat_kegiatan'] ?></td>
                            <td>            <a title="Dokumen logbook" class="btn btn-primary" href="<?= base_url('dosen/dokumen-logbook-penelitian/').$logbook['id_logbook']; ?>"><i
                            class="fas fa-fw fa-plus"></i> Dokumen</a> </td>
                            <?php
                                    $cek_logbook = $this->db->select('*')
                                    ->from('tbl_dokumen_logbook')
                                    ->where('logbook_id',$logbook['id_logbook'])
                                    ->get()->num_rows();
                                    
                                    ?>
                            <td>
                            <?php if($cek_logbook < 1){ ?>
                            <a title="Hapus logbook"
                                                    href="<?= base_url('dosen/Penelitian/delete_logbook_1/').$logbook['id_logbook'] ?>"
                                                    class="btn btn-danger btn-hapus"
                                                    onclick="return confirm('Yakin ?')"><i
                                                        class="fas fa-fw fa-trash"></i></a>
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




<?php } ?>