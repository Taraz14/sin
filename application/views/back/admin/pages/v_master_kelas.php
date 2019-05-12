<style type="text/css" media="screen">
    .a{
        cursor: pointer;
        color: #333333;
    }
    .test{
        width:50px;
        float:right;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Master Kelas
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= site_url('admin')?>"><i class="fa fa-dashboard"></i> Master Kelas</a></li>
      </ol>
    </section>
    <section class="content">
        <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">List Semua Kelas</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
               <table class="table table-bordered" id="master_kelas">
                  <thead>
                    <tr>
                        <th>ID.</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Jumlah Siswa</th>
                    </tr>
                  </thead>
               </table>
            </div>
        </div>
    </section>
    
    <!-- Modal -->
    <div class="modal fade" id="detail_nilai" tabindex="-1" role="dialog" aria-labelledby="detail_nilaiTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="detail_nilaiTitle">Data Siswa kelas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="table-responsive">
                    <table id="detail_table" class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                            <tr>
                              <th>NISN</th>
                              <th>Nama</th>
                            </tr>
                        </thead>                             
                    </table>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
</div>