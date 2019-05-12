<?php
  foreach ($avg as $val) {
    $permat = round($val->avnilai, 2);
    $avgtugas = round($val->avgtugas, 2);
    $avguts = round($val->avguts, 2);
    $avguas = round($val->avguas, 2); 
  }

  foreach ($pribadi as $val) {
    $sikap = $val->sikap;
    $kompeten = $val->kompetensi;
    $keterampilan = $val->keterampilan;
    $catatan = $val->catatan;
  }
?>
<style>
  .form-div { 
    margin-top: 100px; 
    border: 1px solid #e0e0e0; 
  }

  #profileDisplay { 
    display: block; 
    height: 185px; 
    width: 185px; 
    margin: 0px auto; 
    border-radius: 50%; 
  }

</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Data & Nilai</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= site_url('admin')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      </ol>
    </section>
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-xs-4">
              <div class="box box-danger">
                <div class="box-header">
                  <h3 class="box-title">Data</h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                <?php echo form_open_multipart('upload_poto');?>
                  <div class="text-center">
                    <?php if($profile->foto == NULL){ ?>
                      <img src="<?= base_url('assets/dist/img/nophoto.png') ?>" onClick="triggerClick()" style="cursor:pointer" id="profileDisplay"/>
                      <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
                      <p class="help-block">Max 256px</p>
                    <?php } else{ ?>
                      <img src="<?= base_url('assets/dist/img/profile/'.$profile->foto) ?>" onClick="triggerClick()" style="cursor:pointer" id="profileDisplay"/>
                      <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
                      <p class="help-block">Max 256px</p>
                    <?php } ?>
                  </div>
                  <!-- <input type="file" name="foto"> -->
                  <br/>
                  <div class="col-xs-12 text-center">
                    <input type="submit" class="btn btn-success btn-sm" name="upload_foto" value="Simpan">
                  </div>
                </form>

                  <div class="col-xs-12">
                    <table class="table">
                      <tbody>
                        <?php
                          foreach ($nisn as $val) { ?>
                            <tr>
                              <td>Nisn</td>
                              <td>:</td>
                              <td><?= $val->nisn ?></td>
                            </tr>
                            <tr>
                              <td>Nama</td>
                              <td>:</td>
                              <td><?= $val->nama_siswa ?></td>                            
                            </tr>
                            <tr>
                              <td>Kelas</td>
                              <td>:</td>
                              <td><?= $val->nama_kelas ?></td>                            
                            </tr>
                            <tr>
                              <td>TTL</td>
                              <td>:</td>
                              <td><?= $val->tempat_lahir ?>/<?= $val->tanggal_lahir?></td>                            
                            </tr>
                            <tr>
                              <td>Agama</td>
                              <td>:</td>
                              <td><?= $val->agama ?></td>                            
                            </tr>
                            <tr>
                              <td>Jenis Kelamin</td>
                              <td>:</td>
                              <td><?= $val->jenis_kelamin ?></td>                            
                            </tr>
                            <tr>
                              <td>Alamat</td>
                              <td>:</td>
                              <td><?= $val->alamat ?></td>                            
                            </tr>
                            <tr>
                              <td>Telp.</td>
                              <td>:</td>
                              <td><?= $val->telepon ?></td>                            
                            </tr>
                            <tr>
                              <td>Nama Ayah/Ibu</td>
                              <td>:</td>
                              <td><?= $val->nama_ayah ?>/<?= $val->nama_ibu ?></td>                            
                            </tr>
                            <tr>
                              <td>Tahun Ajaran</td>
                              <td>:</td>
                              <td><?= $val->tahun_ajaran ?></td>                            
                            </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>
        
        <!-- </div>
        <div class="row"> -->

          <div class="col-xs-8">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Nilai</h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                  <form>
                  <?php if(empty($belum_dinilai->nisn)){ ?>
                  <div class="col-xs-12 text-center">
                    <p class="help-block">Belum Ada Nilai</p>
                  </div>
                  <?php } else {?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th rowspan="2" class="text-center" style="vertical-align: middle; !important">Mata Pelajaran</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle; !important">KKM</th>
                                <th colspan="2" class="text-center">Nilai/Mapel</th>
                                <th colspan="2" class="text-center">Tugas</th>
                                <th colspan="2" class="text-center">UTS</th>
                                <th colspan="2" class="text-center">UAS</th>
                            </tr>
                            <tr>
                                <th class="text-center">Nilai</th>
                                <th class="text-center">Predikat</th>
                                <th class="text-center">Nilai</th>
                                <th class="text-center">Predikat</th>
                                <th class="text-center">Nilai</th>
                                <th class="text-center">Predikat</th>
                                <th class="text-center">Nilai</th>
                                <th class="text-center">Predikat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 0;
                                foreach ($nilai as $val) {
                                    $no++;
                                    echo '
                                        <tr>
                                            <td>'.$no.'.'.$val->nama_mapel.'</td>
                                            <td class="text-left">'.$val->kkm.'</td>
                                            <td class="text-left">'.$val->nilai.'</td>
                                            <td class="text-center">'.$val->predikat_nilai.'</td>
                                            <td class="text-left">'.$val->tugas.'</td>
                                            <td class="text-center">'.$val->predikat_tugas.'</td>
                                            <td class="text-left">'.$val->uts.'</td>
                                            <td class="text-center">'.$val->predikat_uts.'</td>
                                            <td class="text-left">'.$val->uas.'</td>
                                            <td class="text-center">'.$val->predikat_uas.'</td>
                                        </tr>';
                                }
                            ?>
                            <tr>
                                <th colspan="2" class="text-center">Rata-Rata</th>
                                <td colspan="2" class="text-left"><label><?= $permat?></td></label>
                                <td colspan="2" class="text-left"><label><?= $avgtugas?></td></label>
                                <td colspan="2" class="text-left"><label><?= $avguts?></td></label>
                                <td colspan="2" class="text-left"><label><?= $avguas?></td></label>
                            </tr>
                        </tbody>
                      </table>
                      <br/>
                      <table class="table">
                          <tr>
                              <td width="25%">Sikap</td>
                              <td class="text-left" width="75%">: <?= $sikap?></td>
                          </tr>
                          <tr>
                              <td width="25%">Kompetensi</td>
                              <td class="text-left" width="75%">: <?= $kompeten?></td>
                          </tr>
                          <tr>
                              <td width="25%">Keterampilan</td>
                              <td class="text-left" width="75%">: <?= $keterampilan?></td>
                          </tr>
                      </table>
                      <label>Catatan Wali Kelas *</label>
                      <table class="table">
\                       <td><?= $catatan ?></td>
                      </table>
                      <?php } ?>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </section>

</div>
<!-- /.content-wrapper -->
<script>
  function triggerClick(e) {
    document.querySelector('#profileImage').click();
  }
  function displayImage(e) {
    if (e.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e){
        document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
      }
      reader.readAsDataURL(e.files[0]);
    }
  }
  </script>