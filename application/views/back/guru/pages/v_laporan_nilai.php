<?php 
    foreach ($nisn as $val) {
        $nis = $val->nisn;
        $nama_siswa = $val->nama_siswa;
        $kelas = $val->nama_kelas;
    }

    foreach ($avg as $av) {
        $permat = round($av->avnilai, 2);
        $avgtugas = round($av->avgtugas, 2);
        $avguts = round($av->avguts, 2);
        $avguas = round($av->avguas, 2);
    }

    foreach($nilai as $nil){
        // $jurusan = $nil->kelas;
        $semester = $nil->semester;
        $tugas = $nil->tugas;
        $uts = $nil->uts;
        $uas = $nil->uas;
        $sikap = $nil->sikap;
        $kompeten = $nil->kompetensi;
        $keterampilan = $nil->keterampilan;
    }

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lapaoran Nilai Siswa
        <small>Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= site_url('guru')?>"><i class="fa fa-dashboard"></i> Laporan Nilai Siswa</a></li>
      </ol>
    </section>
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-6">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Laporan Nilai Siswa / <small><?= $nama_siswa?></small></h3><br/>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table">
                            <tr>
                                <td>NISN</td>
                                <td class="text-left">: <?= $nis?></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td class="text-left">: <?= $nama_siswa?></td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td class="text-left">: <?= $kelas?></td>
                            </tr>
                            <tr>
                                <td>Semester</td>
                                <td class="text-left">: <?= $semester?></td>
                            </tr>
                        </table>
                        <br/>
                        <small>Nilai</small>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Mata Pelajaran</th>
                                    <th>KKM</th>
                                    <th>Nilai/Mapel</th>
                                    <th>Tugas</th>
                                    <th>UTS</th>
                                    <th>UAS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 0;
                                    foreach ($mapel as $val) {
                                        $no++;
                                        echo '
                                            <tr>
                                                <td>'.$no.'.'.$val->nama_mapel.'</td>
                                                <td class="text-left">'.$val->kkm.'</td>
                                                <td class="text-left">'.$val->nilai.'</td>
                                                <td class="text-left">'.$val->tugas.'</td>
                                                <td class="text-left">'.$val->uts.'</td>
                                                <td class="text-left">'.$val->uas.'</td>
                                            </tr>';
                                    }
                                ?>
                                <tr>
                                    <th colspan="2" class="text-center">Rata-Rata</th>
                                    <!-- <td class="text-left"></td> -->
                                    <td class="text-left"><label><?= $permat?></td></label>
                                    <td class="text-left"><label><?= $avgtugas?></td></label>
                                    <td class="text-left"><label><?= $avguts?></td></label>
                                    <td class="text-left"><label><?= $avguas?></td></label>
                                </tr>
                            </tbody>
                        </table>
                        <br/>
                        <table class="table">
                            <tr>
                                <td width="25%">Sikap</td>
                                <td class="text-left" width="75%">: <?= $sikap?></td>
                            </tr>
                            <tr>
                                <td width="25%">Kompetensi</td>
                                <td class="text-left" width="75%">: <?= $kompeten?></td>
                            </tr>
                            <tr>
                                <td width="25%">Keterampilan</td>
                                <td class="text-left" width="75%">: <?= $keterampilan?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->