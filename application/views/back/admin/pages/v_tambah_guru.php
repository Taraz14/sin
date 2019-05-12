<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Guru
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= site_url('admin')?>"><i class="fa fa-dashboard"></i> Tambah Guru</a></li>
      </ol>
    </section>
    <section class="content">
        <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Input Data Guru</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="<?= site_url('input_guru')?>" method="POST">
                <!-- text input -->
                <div class="form-group col-sm-6">
                  <label>NIP</label>
                  <input type="text" class="form-control" name="nip" placeholder="nip">
                </div>

                <div class="form-group col-sm-6">
                  <label>Nama Guru</label>
                  <input type="text" class="form-control" name="nama" placeholder="Nama Guru">
                </div>

                <div class="form-group col-sm-6">
                  <label>Kelas</label>
                  <select class="form-control" name="kelas">
                    <?php foreach ($kelas as $val) {
                        echo '<option value="'.$val->id_kelas.'">'.$val->nama_kelas.'</option>';
                    } ?>
                  </select>
                </div>

                 <!-- textarea -->
                 <div class="form-group col-sm-6">
                  <label>Alamat</label>
                  <textarea class="form-control" rows="4" name="alamat" placeholder="Alamat Asal"></textarea>
                </div>

                <div class="form-group col-sm-6">
                  <label>Status</label>
                  <input type="text" class="form-control" name="status" placeholder="Status">
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

                <div class="form-group col-sm-6">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Email">
                </div>

                <div class="form-group col-sm-6">
                  <label>Jabatan</label>
                  <input type="text" class="form-control" name="jabatan" placeholder="Jabatan">
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