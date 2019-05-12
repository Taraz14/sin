<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Absensi
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= site_url('admin')?>"><i class="fa fa-dashboard"></i> Absensi</a></li>
      </ol>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Input Absensi</h3>
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
                        <label>Semester</label>
                        <select class="form-control" name="semester" id="semester">
                            <option value="" disabled selected>Pilih Semester</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Sakit</label>
                        <input type="text" class="form-control" name="sakit" placeholder="Sakit">
                    </div>

                    <div class="form-group">
                        <label>Ijin</label>
                        <input type="text" class="form-control" name="ijin" placeholder="Ijin">
                    </div>

                    <div class="form-group">
                        <label>Tanpa Keterangan</label>
                        <input type="text" class="form-control" name="tk" placeholder="Tanpa Keterangan">
                    </div>

                    <div class="form-group pull-right">
                        <button type="submit" class="btn btn-primary">Simpan &nbsp;<i class="fa fa-send-o"></i></button>
                    </div>
                </form>

            </div>
        </div>
    </section>
</div>