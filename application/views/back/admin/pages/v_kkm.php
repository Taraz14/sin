<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kriteria Kelulusan Minimal
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= site_url('admin')?>"><i class="fa fa-dashboard"></i> KKM</a></li>
      </ol>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Input Mata KKM</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="<?= site_url('input_kkm')?>" method="POST">
                    <div class="form-group">
                        <label>Nilai KKM</label>
                        <input type="text" class="form-control" name="nilai_kkm" placeholder="Nilai KKM">
                    </div>

                    <div class="form-group">
                        <label>Mata Pelajaran</label>
                        <select class="form-control" name="mapel" id="mapel">
                            <option value="" disabled selected>Pilih Mata Pelajaran</option>
                                <?php foreach ($mapel as $row) {
                                    echo '<option value="'.$row->id_mapel.'">'.$row->nama_mapel.'</option>';
                                } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tahun Ajaran</label>
                        <input type="text" class="form-control" name="tahun_ajaran" placeholder="Tahun Ajaran">
                    </div>

                    <div class="form-group pull-right">
                        <button type="submit" class="btn btn-primary">Simpan &nbsp;<i class="fa fa-send-o"></i></button>
                    </div>
                </form>

            </div>
        </div>
    </section>
</div>