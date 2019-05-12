<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mata Pelajaran
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= site_url('admin')?>"><i class="fa fa-dashboard"></i> Mata Pelajaran</a></li>
      </ol>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Input Mata Pelajaran</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="<?= site_url('input_mapel')?>" method="POST">
                    <!-- <div class="form-group">
                        <label>ID Mata Pelajaran</label>
                        <input type="text" class="form-control" name="id_mapel" placeholder="ID Mata Pelajaran">
                    </div> -->

                    <div class="form-group">
                        <label>Nama Mata Pelajaran</label>
                        <input type="text" class="form-control" name="nama_mapel" placeholder="Nama Mata Pelajaran">
                    </div>
                    
                    <div class="form-group">
                        <label>KKM</label>
                        <input type="text" class="form-control" name="kkm" placeholder="KKM">
                    </div>

                    <div class="form-group pull-right">
                        <button type="submit" class="btn btn-primary">Simpan &nbsp;<i class="fa fa-send-o"></i></button>
                    </div>
                </form>

            </div>
        </div>
    </section>
</div>