
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pendaftaran Siswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= site_url('admin')?>"><i class="fa fa-dashboard"></i> Pendaftaran Siswa</a></li>
      </ol>
    </section>
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Input Data Siswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="<?= site_url('input_siswa')?>" method="POST">
                <!-- text input -->
                <div class="form-group col-sm-6">
                  <label>NISN</label>
                  <input type="text" class="form-control" name="nisn" placeholder="NISN">
                </div>

                <div class="form-group col-sm-6">
                  <label>Nama Siswa</label>
                  <input type="text" class="form-control" name="nama" placeholder="Nama Siswa">
                </div>

                <div class="form-group col-sm-6">
                  <label>Kelas</label>
                  <select class="form-control" name="kelas">
                    <option disabled selected>Pilih Kelas</option>
                    <?php 
                      foreach ($kelas as $val) {
                        echo '<option value="'.$val->id_kelas.'">'.$val->nama_kelas.'</option>';
                      }
                    ?>
                  </select>
                </div>

                 <!-- textarea -->
                 <div class="form-group col-sm-6">
                  <label>Alamat</label>
                  <textarea class="form-control" rows="4" name="alamat" placeholder="Alamat Asal"></textarea>
                </div>

                <!-- select -->
                <div class="form-group col-sm-6">
                  <label>Agama</label>
                  <select class="form-control" name="agama">
                    <option>Islam</option>
                    <option>Kristen</option>
                    <option>Katolik</option>
                    <option>Hindu</option>
                    <option>Budha</option>
                  </select>
                </div>

                <div class="form-group col-sm-6">
                  <label>Tanggal Lahir</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" name="birth" id="datepicker" data-date-format="yyyy-mm-dd">
                  </div>
                  <!-- /.input group -->
                </div>

                <!-- radio -->
                <div class="form-group col-sm-6">
                  <label>Jenis Kelamin</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="jk" id="optionsRadios1" value="laki-laki" checked>
                        Laki-Laki
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="jk" id="optionsRadios2" value="perempuan">
                        Perempuan
                    </label>
                  </div>
                </div>

                <!-- phone mask -->
                <div class="form-group col-sm-6">
                  <label>Nomor Telepon</label>

                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-phone"></i>
                    </div>
                    <input type="text" class="form-control" name="telp" id="customer_phone" value="">
                    
                  </div>
                  <!-- /.input group -->
                  <input type="checkbox" id="phone_mask" checked><span id="descr" for="phone_mask"><small> Diawali kode negara</small></span>
                </div>
                <!-- /.form group -->

                <div class="form-group col-sm-6">
                  <label>Tempat Lahir</label>
                  <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
                </div>

                <div class="form-group col-sm-6">
                  <label>No KK</label>
                  <input type="text" class="form-control" name="nokk" placeholder="Nomor KK">
                </div>

                <div class="form-group col-sm-6">
                  <label>Nama Ayah</label>
                  <input type="text" class="form-control" name="ayah" placeholder="Nama Ayah">
                </div>

                <div class="form-group col-sm-6">
                  <label>Nama Ibu</label>
                  <input type="text" class="form-control" name="ibu" placeholder="Nama Ibu">
                </div>

                <div class="form-group col-sm-6">
                  <label>Tahun Ajaran</label>
                  <input type="text" class="form-control" name="ajaran" placeholder="Tahun Ajaran">
                </div>

                <div class="pull-right">
                  <button type="submit" class="btn btn-success">Submit &nbsp;<i class="fa fa-send"></i></button>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </section>

</div>
<!-- /.content-wrapper -->