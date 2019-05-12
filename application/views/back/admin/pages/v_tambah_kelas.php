<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Kelas
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= site_url('admin')?>"><i class="fa fa-dashboard"></i> Tambah Kelas</a></li>
      </ol>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Input Kelas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="<?= site_url('input_kelas')?>" method="POST">
                    <div class="form-group">
                        <label>ID Kelas</label>
                        <input type="text" class="form-control" name="id_kelas" placeholder="ID Kelas">
                    </div>
                    
                    <div class="form-group">
                        <label>Kelas</label>
                        <input type="text" class="form-control" name="kelas" placeholder="Kelas">
                    </div>
                    
                    <div class="form-group">
                      <label>Jurusan</label>
                        <select class="form-control" name="kateg" id="kateg">
                            <option value="" disabled selected>Pilih Jurusan</option>
                                <?php foreach ($kategori as $row) {
                                    echo '<option value="'.$row->id_kategoriK.'">'.$row->nama_kategori.'</option>';
                                } ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>Jumlah Siswa</label>
                        <input type="text" class="form-control" name="jumlah_siswa" placeholder="Jumlah Siswa">
                    </div>

                    <div class="form-group">
                        <label>Wali Kelas</label>
                        <select class="form-control" name="wali">
                            <option value="" disabled selected>Pilih Wali Kelas</option>
                            <?php foreach ($guru as $val) {
                                    echo '<option value="'.$val->nip.'">'.$val->nama_guru.'</option>';
                                } ?>
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