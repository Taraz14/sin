<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kelas Detail
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= site_url('admin')?>"><i class="fa fa-dashboard"></i> Kelas Detail</a></li>
      </ol>
    </section>
    <section class="content">
        <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">List Siswa Satu Kelas</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
               <table class="table table-bordered" id="Kelas_detail">
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
                <div class="form-group">
                    <a class="btn btn-default" href="<?= site_url('master_kelas')?>"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                </div>
            </div>
        </div>
    </section>
    </div>