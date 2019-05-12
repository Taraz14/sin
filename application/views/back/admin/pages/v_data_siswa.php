<style>
#nisn, #nisn option {
  font-family: Consolas, monospace;
}
</style>  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Siswa
        <small>Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= site_url('guru')?>"><i class="fa fa-dashboard"></i> Data Siswa</a></li>
      </ol>
    </section>
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">List Data Siswa</h3>
              </div>

              <!-- /.box-header -->
              <div class="box-body">
              <form>
                <div class="col-sm-2">
                    <select class="form-control input-sm" name="nisn" id="nisn">
                        <option value="" disabled selected>Nisn</option>
                            <?php foreach ($nisn as $row) {
                                echo '
                                      <option value="'.$row->nisn.'">'.$row->nisn.'&nbsp; - &nbsp;'.$row->nama_siswa.'</option>';
                            } ?>
                    </select>
                </div>

                <table class="table table-bordered table-hover display" id="dataSiswa_admin">
                  <thead>
                    <tr>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Kelas</th>
                        <th>Tahun Ajaran</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                </table>
                </form>
              </div>
            </div>
          </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->