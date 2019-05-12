<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sikap
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= site_url('admin')?>"><i class="fa fa-dashboard"></i> Sikap</a></li>
      </ol>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Input Sikap</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <form action="<?= site_url('input_sikap')?>" method="POST">
                    <div class="form-group">
                        <label>Siswa</label>
                        <select class="form-control" name="siswa" id="siswa">
                            <option value="" disabled selected>Pilih Siswa</option>
                                <?php foreach ($siswa as $row) {
                                    echo '<option value="'.$row->nisn.'">'.$row->nisn.' | '.$row->nama_siswa.'</option>';
                                } ?>
                        </select>
                    </div>
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Aspek</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td><input type="hidden" name="jdisiplin" value="Kedisiplinan">Kedisiplinan</td>
                                <td>
                                    <select class="form-control" name="disiplin">
                                        <option value="" disabled selected>Pilih Keterangan</option>
                                        <option value="kurang">Kurang</option>
                                        <option value="cukup">Cukup</option>
                                        <option value="baik">Baik</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td><input type="hidden" name="jbersih" value="Kebersihan">Kebersihan</td>
                                <td>
                                    <select class="form-control" name="kebersihan">
                                        <option value="" disabled selected>Pilih Keterangan</option>
                                        <option value="kurang">Kurang</option>
                                        <option value="cukup">Cukup</option>
                                        <option value="baik">Baik</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td><input type="hidden" name="jsehat" value="Kesehatan">Kesehatan</td>
                                <td>
                                    <select class="form-control" name="kesehatan">
                                        <option value="" disabled selected>Pilih Keterangan</option>
                                        <option value="kurang">Kurang</option>
                                        <option value="cukup">Cukup</option>
                                        <option value="baik">Baik</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td><input type="hidden" name="jkompe" value="Kompetitif">Kompetitif</td>
                                <td>
                                    <select class="form-control" name="kompetitif">
                                        <option value="" disabled selected>Pilih Keterangan</option>
                                        <option value="kurang">Kurang</option>
                                        <option value="cukup">Cukup</option>
                                        <option value="baik">Baik</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="form-group pull-right">
                        <button type="submit" class="btn btn-primary">Simpan &nbsp;<i class="fa fa-send-o"></i></button>
                    </div>

                </form>

            </div>

        </div>
    </section>

</div>