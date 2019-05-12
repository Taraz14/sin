<?php
  foreach ($siswa_nisn as $key) {
      $nama = $key->nama_siswa;
      $nisn = $key->nisn;
      $kelas = $key->nama_kelas;
  }
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $title?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= site_url('guru')?>"><i class="fa fa-dashboard"></i> Input Nilai Siswa</a></li>
      </ol>
    </section>
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-xs-6">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Input Nilai Siswa / <small><?= $nama?></small></h3><br/>
              </div>

              <!-- /.box-header -->
              <div class="box-body">
                <form class="form-horizontal" action="<?= site_url('inputNilai_proses/'.$nisn)?>" method="POST">
                    <input type="hidden" name="nisn" value="<?= $nisn ?>">
                    <input type="hidden" name="kelas" value="<?= $kelas ?>">


                    <div class="row container-fluid">
                      <div class="form-group">
                        <div class="col-sm-4">
                          <label>Semester</label>
                          <select class="form-control" name="semester">
                            <option disabled selected>Pilih Semester</option>
                              <?php foreach ($semester as $val) {
                                echo '<option value="'.$val->id_semester.'">'.$val->semester.'</option>';
                              }?>
                          </select>
                        </div>
                        <div class="col-sm-4">
                            <label>Tahun Ajaran</label>
                            <input type="text" class="form-control input-sm" name="ajar">
                        </div>
                      </div>
                      <hr/> 
                      <div class="form-group">
                        <div class="col-sm-4">
                          <label>Sikap</label>
                          <select class="form-control" name="sikap">
                            <option disabled selected>Pilih sikap</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                          </select>
                        </div>
                        <div class="col-sm-4">
                          <label>Kompetensi</label>
                          <select class="form-control" name="kompetensi">
                            <option disabled selected>Pilih Kompetensi</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-sm-4">
                          <label>Keterampilan</label>
                          <select class="form-control" name="keterampilan">
                            <option value="" disabled selected>Nilai Keterampilan</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                          </select>
                        </div>
                      </div>

                      <table class="table">
                        <thead>
                          <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Nama Mapel</th>
                            <th class="text-center">Nilai Mapel</th>
                            <th class="text-center">Tugas</th>
                            <th class="text-center">UTS</th>
                            <th class="text-center">UAS</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                              $no = 0; 
                              foreach ($mapel as $val) { 
                              $no++;      
                          ?>
                              <tr>
                                  <td><?= $no.'.';?></td>
                                  <td><?= $val->nama_mapel ?></td>
                                  <td><input type="text" class="form-control input-sm" name="pelajaran<?= $val->id_mapel ?>"></td>
                                  <td><input type="text" class="form-control input-sm" name="tugas<?= $val->id_mapel ?>"></td>
                                  <td><input type="text" class="form-control input-sm" name="uts<?= $val->id_mapel ?>"></td>
                                  <td><input type="text" class="form-control input-sm" name="uas<?= $val->id_mapel ?>"></td>
                              </tr>
                          <?php 
                              } 
                          ?>
                        </tbody>
                      </table>
                        
                      <label>Catatan Wali Kelas</label>
                      <textarea class="form-control" name="catatan" placeholder="Catatan Wali Kelas"></textarea>
                    </div>
                    <hr/>
                        <div class="pull-right">
                          <a href="<?= site_url('data_siswa')?>" class="btn btn-danger">Batal</a>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->