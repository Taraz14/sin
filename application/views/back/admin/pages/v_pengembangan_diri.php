<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengembangan Diri
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= site_url('admin')?>"><i class="fa fa-dashboard"></i> Pengembangan Diri</a></li>
      </ol>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Input Pengembangan Diri</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <form action="<?= site_url('input_absensi')?>" method="POST">
                    <div class="form-group">
                        <label>Siswa</label>
                        <select class="form-control" name="siswa" id="siswa">
                            <option value="" disabled selected>Pilih Siswa</option>
                                <?php foreach ($siswa as $row) {
                                    echo '<option value="'.$row->nisn.'">'.$row->nisn.' | '.$row->nama_siswa.'</option>';
                                } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kegiatan</label>
                        <input type="text" class="form-control" name="kegiatan" placeholder="Jenis Kegiatan">
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <select class="form-control" name="semester" id="semester">
                            <option value="" disabled selected>Pilih Keterangan</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                                
                    <div class="form-group pull-right">
                        <button type="submit" class="btn btn-primary">Simpan &nbsp;<i class="fa fa-send-o"></i></button>
                    </div>

                </form>

            </div>

        </div>
    </section>

</div>