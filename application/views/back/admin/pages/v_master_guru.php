<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Master Guru
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= site_url('admin')?>"><i class="fa fa-dashboard"></i> Master Guru</a></li>
      </ol>
    </section>
    <section class="content">
        <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">List Data Guru</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
               <table class="table table-bordered" id="master_guru">
                  <thead>
                    <tr>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Jenis Kelamin</th>
                        <th>Nomor Telp.</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th style="width:60px">Aksi</th>
                    </tr>
                  </thead>
               </table>
            </div>
        </div>

    </section>
</div>

<script type="text/javascript">
var guruTable;

$(document).ready(function() {
  getDataTableGuru()
  function getDataTableGuru(nip){
    guruTable = $('#master_guru').DataTable({
        'processing' : true,
        'serverSide' : true,
        'order'      : [],
        oLanguage: {
            sLengthMenu: "_MENU_",
          },
        'ajax'       : {
            url      : site_url + 'back/admin/master_guru/datatables',
            data     : {
                nip : nip
            }
        },

        responsive   : true,
        'dom'        : '<lf<t>ip>'
    })
  }
});

  function reload_table(){
      guruTable.ajax.reload(null,false); //reload datatable ajax 
  } 

  function delete_guru(nip)
  {
      if(confirm('Yakin hapus Guru?'))
      {
          // ajax delete data to database
          $.ajax({
              url : "<?php echo site_url('back/admin/master_guru/ajax_delete_row')?>/"+nip,
              type: "POST",
              dataType: "JSON",
              success: function(data)
              {
                  //if success reload ajax table
                  // $('#modal_form').modal('hide');
                  reload_table();
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                  alert('Error deleting data');
              }
          });
  
      }
  }
</script>