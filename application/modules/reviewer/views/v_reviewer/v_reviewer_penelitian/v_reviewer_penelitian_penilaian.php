


<div class="content-wrapper container">

    <div class="page-heading">
    <h3><?= $title ?></h3>
    </div>
    <div class="page-content">

    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-danger" href="<?= base_url('reviewer/usulan-penelitian'); ?>"><i class="fas fa-fw fa-arrow-left"></i> Kembali</a>
                <a target="_blank" href="<?= base_url('user/User/download_file/pdf_proyek/').$penelitianku['subtansi_usulan'] ?>" class="btn btn-info">Subtansi Usulan</a> 
            </div>
            <div class="card-body">
            <form role="form" action="<?= base_url('reviewer/Data_Reviewer/add_nilai_reviewer_penelitian') ?>"
                        method="post" data-parsley-validate>
                                <div class="row">
                                <div class="form-group">
                            <table class="table table-bordered" id="table3">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kriteria Penilaian</th>
                                        <th>Bobot</th>
                                        <th>Skor</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <td>Kualitas Topik Penelitian
                                            <p>a. Inovasi dan kebaruan topik</p>
                                            <p>b. Kedalaman pemahaman peneliti terhadap topik</p>
                                            <p>c. Kesesuaian dengan RIP Politala</p>
                                            <p>d. Keselarasan dengan road map penelitian pengusul</p>
                                        </td>
                                        <td><input type="text" id="bobot_1" readonly value="25" class="form-control"
                                                name="bobot[]"></input></td>
                                                <input hidden type="text" value="0" class="form-control"
                                                name="pengabdian_id[]"></input>
                                        <td> <select name="skor[]" id="skor_1" class="form-select">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                            </select></td>
                                        <input hidden type="text" value="<?= $penelitianku['id_penelitian'] ?>"
                                            name="penelitian_id[]" placeholder="Judul" class="form-control">
                                        <td><input readonly type="text" id="hasil_1" class="form-control" name="nilai[]"></input></td>
                                    </tr>
                                    <tr>
                                        <th>2</th>
                                        <td>Perumusan Masalah
                                            <p>a. Kedalaman dan komplekstasi permasalahan</p>
                                            <p>b. Kemampuan melakukan problematisasi</p>
                                            <p>c. Tujuan dan manfaat penelitian</p>
                                            <p>d. Urgensi topik peneitian dalam pemecahan masalah</p>
                                        </td>
                                        <td><input type="text" id="bobot_2" readonly value="20" class="form-control"
                                                name="bobot[]"></input></td>
                                                <input hidden type="text" value="0" class="form-control"
                                                name="pengabdian_id[]"></input>
                                        <td> <select name="skor[]" id="skor_2" class="form-select">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                            </select></td>
                                        <input hidden type="text" value="<?= $penelitianku['id_penelitian'] ?>"
                                            name="penelitian_id[]" placeholder="Judul" class="form-control">
                                        <td><input readonly type="text" id="hasil_2" class="form-control" name="nilai[]"></input></td>
                                    </tr>
                                    <tr>
                                        <th>3</th>
                                        <td>Metode Penelitian
                                            <p>a. Ketepatan dan kesesuaian metode yang digunakan</p>
                                            <p>b. Detail dan kelengkapan metode yang disampaikan</p>
                                            <p>c. Kebaruan dan tingkat kompleksitas metode</p>
                                            <p>d. Kelayakan sumber daya dalam penggunaan metode</p>
                                        </td>
                                        <td><input type="text" id="bobot_3" readonly value="25" class="form-control"
                                                name="bobot[]"></input></td>
                                                <input hidden type="text" value="0" class="form-control"
                                                name="pengabdian_id[]"></input>
                                        <td> <select name="skor[]"id="skor_3" class="form-select">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                            </select></td>
                                        <input hidden type="text" value="<?= $penelitianku['id_penelitian'] ?>"
                                            name="penelitian_id[]" placeholder="Judul" class="form-control">
                                        <td><input readonly type="text" id="hasil_3" class="form-control" name="nilai[]"></input></td>
                                    </tr>
                                    <tr>
                                        <th>4</th>
                                        <td>Perumusan Masalah
                                            <p>a. Kesesuaian waktu</p>
                                            <p>b. Kemampuan melakukan problematisasi</p>
                                            <p>c. Kelayakan dan kesesuaian personalia pengusul</p>
                                        </td>
                                        <td><input type="text" id="bobot_4" readonly value="15" class="form-control"
                                                name="bobot[]"></input></td>
                                                <input hidden type="text" value="0" class="form-control"
                                                name="pengabdian_id[]"></input>
                                        <td> <select name="skor[]" id="skor_4" class="form-select">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                            </select></td>
                                        <input hidden type="text" value="<?= $penelitianku['id_penelitian'] ?>"
                                            name="penelitian_id[]" placeholder="Judul" class="form-control">
                                        <td><input readonly type="text" id="hasil_4" class="form-control" name="nilai[]"></input></td>
                                    </tr>
                                    <tr>
                                        <th>5</th>
                                        <td>Peluang Luaran Penelitian
                                            <p>a. Publikasi Ilmiah</p>
                                            <p>b. Pengembangan Ilmu</p>
                                            <p>c. Pengayaan bahan ajar</p>
                                        </td>
                                        <td><input type="text" id="bobot_5" readonly value="15" class="form-control"
                                                name="bobot[]"></input></td>
                                                <input hidden type="text" value="0" class="form-control"
                                                name="pengabdian_id[]"></input>
                                        <td> <select name="skor[]" id="skor_5" class="form-select">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                            </select></td>
                                        <input hidden type="text" value="<?= $penelitianku['id_penelitian'] ?>"
                                            name="penelitian_id[]" placeholder="Judul" class="form-control">
                                        <td><input readonly type="text" id="hasil_5" class="form-control" name="nilai[]"></input></td>
                                    </tr>

                                </tbody>
                                <tfoot>
    <tr>
      <td>Total</td>
      <td></td>
      <td ><input type="text" class="form-control" readonly value="100"></td>
      <td></td>
      <td><input id="total-hasil" type="text" readonly class="form-control"></td>
    </tr>
  </tfoot>
                            </table>
                            <hr>
                            <p>Keterangan</p>
                            <p>Skor: 1, 2, 3, 5, 6, 7 (1 = buruk, 2 = sangat kurang, 3 = kurang, 5 = cukup, 6 = baik, 7 = sangat baik)</p>
                            <hr>
                            <div class="form-group">
                                <label>Komentar Penilaian</label><br>
                                <input hidden type="text" value="<?= $penelitianku['id_penelitian'] ?>"
                                            name="penelitian_id_1" class="form-control">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                    name="komentar_penelitian" data-parsley-required="true"></textarea>
                            </div>
                        </div>

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

 
 
<script>
var totalHasil = 0;

document.getElementById("bobot_1").addEventListener("input", updateHasil_1);
document.getElementById("skor_1").addEventListener("change", updateHasil_1);

function updateHasil_1() {
  var bobot_1 = parseInt(document.getElementById("bobot_1").value);
  var skor_1 = parseInt(document.getElementById("skor_1").value);
  var hasil_1 = bobot_1 * skor_1;
  document.getElementById("hasil_1").value = hasil_1;

  updateTotalHasil();
}


document.getElementById("bobot_2").addEventListener("input", updateHasil_2);
document.getElementById("skor_2").addEventListener("change", updateHasil_2);

function updateHasil_2() {
  var bobot_2 = parseInt(document.getElementById("bobot_2").value);
  var skor_2 = parseInt(document.getElementById("skor_2").value);
  var hasil_2 = bobot_2 * skor_2;
  document.getElementById("hasil_2").value = hasil_2;

  updateTotalHasil();
}

document.getElementById("bobot_3").addEventListener("input", updateHasil_3);
document.getElementById("skor_3").addEventListener("change", updateHasil_3);

function updateHasil_3() {
  var bobot_3 = parseInt(document.getElementById("bobot_3").value);
  var skor_3 = parseInt(document.getElementById("skor_3").value);
  var hasil_3 = bobot_3 * skor_3;
  document.getElementById("hasil_3").value = hasil_3;

  updateTotalHasil();
}

document.getElementById("bobot_4").addEventListener("input", updateHasil_4);
document.getElementById("skor_4").addEventListener("change", updateHasil_4);

function updateHasil_4() {
  var bobot_4 = parseInt(document.getElementById("bobot_4").value);
  var skor_4 = parseInt(document.getElementById("skor_4").value);
  var hasil_4 = bobot_4 * skor_4;
  document.getElementById("hasil_4").value = hasil_4;

  updateTotalHasil();
}

document.getElementById("bobot_5").addEventListener("input", updateHasil_5);
document.getElementById("skor_5").addEventListener("change", updateHasil_5);

function updateHasil_5() {
  var bobot_5 = parseInt(document.getElementById("bobot_5").value);
  var skor_5 = parseInt(document.getElementById("skor_5").value);
  var hasil_5 = bobot_5 * skor_5;
  document.getElementById("hasil_5").value = hasil_5;

  updateTotalHasil();
}

function updateTotalHasil() {
  var hasil_1 = parseInt(document.getElementById("hasil_1").value);
  var hasil_2 = parseInt(document.getElementById("hasil_2").value);
  var hasil_3 = parseInt(document.getElementById("hasil_3").value);
  var hasil_4 = parseInt(document.getElementById("hasil_4").value);
  var hasil_5 = parseInt(document.getElementById("hasil_5").value);

  totalHasil = hasil_1 + hasil_2 + hasil_3 + hasil_4 + hasil_5;

  document.getElementById("total-hasil").value = totalHasil;
}
  </script>
  