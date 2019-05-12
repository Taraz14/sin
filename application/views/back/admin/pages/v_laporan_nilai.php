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
        $ajaran = $nil->tahun_ajaran;
        $wali = $nil->nama_guru;
        $catatan = $nil->catatan;
        
    }

?>

<style>
#print {
  /* background-color: #ddd; */
  /* color: black; */
  /* text-align: center; */
  transition: 0.4s;
}

#print:hover {
  background-color: #605CA8;
  /* border-radius: 5px; */
  color: white;
}
</style>

<style>
@media print {
    @page {
        size: portrait;
        margin: 0;
    }

    p { 
        display : flex;
        page-break-before:always;
    }
      
      /* .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6,
      .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
           float: left;               
      } */

      .col-sm-12 {
           width: 100%;
      }

      .col-sm-11 {
           width: 91.66666666666666%;
      }

      .col-sm-10 {
           width: 83.33333333333334%;
      }

      .col-sm-9 {
            width: 75%;
      }

      .col-sm-8 {
            width: 66.66666666666666%;
      }

       .col-sm-7 {
            width: 58.333333333333336%;
       }

       .col-sm-6 {
            width: 50%;
       }

       .col-sm-5 {
            width: 41.66666666666667%;
       }

       .col-sm-4 {
            width: 33.33333333333333%;
       }

       .col-sm-3 {
            width: 25%;
       }

       .col-sm-2 {
              width: 16.666666666666664%;
       }

       .col-sm-1 {
              width: 8.333333333333332%;
        }            
}

</style>

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
            <div class="col-xs-8">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Laporan Nilai Siswa / <small><?= $nama_siswa?></small></h3>
                        <button type="button" class="btn btn-default pull-right" onclick="printDiv('printableArea')" value="Cetak Rapor" target="_blank" id="print"><i class="fa fa-print"></i> Cetak Rapor</button><br/>
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
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; !important">Mata Pelajaran</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle; !important">KKM</th>
                                    <th colspan="2" class="text-center">Nilai/Mapel</th>
                                    <th colspan="2" class="text-center">Tugas</th>
                                    <th colspan="2" class="text-center">UTS</th>
                                    <th colspan="2" class="text-center">UAS</th>
                                </tr>
                                <tr>
                                    <th class="text-center">Nilai</th>
                                    <th class="text-center">Predikat</th>
                                    <th class="text-center">Nilai</th>
                                    <th class="text-center">Predikat</th>
                                    <th class="text-center">Nilai</th>
                                    <th class="text-center">Predikat</th>
                                    <th class="text-center">Nilai</th>
                                    <th class="text-center">Predikat</th>
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
                                                <td class="text-center">'.$val->predikat_nilai.'</td>
                                                <td class="text-left">'.$val->tugas.'</td>
                                                <td class="text-center">'.$val->predikat_tugas.'</td>
                                                <td class="text-left">'.$val->uts.'</td>
                                                <td class="text-center">'.$val->predikat_uts.'</td>
                                                <td class="text-left">'.$val->uas.'</td>
                                                <td class="text-center">'.$val->predikat_uas.'</td>
                                            </tr>';
                                    }
                                ?>
                                <tr>
                                    <th colspan="2" class="text-center">Rata-Rata</th>
                                    <!-- <td class="text-left"></td> -->
                                    <td colspan="2" class="text-left"><label><?= $permat?></td></label>
                                    <td colspan="2" class="text-left"><label><?= $avgtugas?></td></label>
                                    <td colspan="2" class="text-left"><label><?= $avguts?></td></label>
                                    <td colspan="2" class="text-left"><label><?= $avguas?></td></label>
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

<!-- Print -->
    <section class="content" id="printableArea" style="display:none">
        <div class="row invoice-info">
        <br/>
        <br/>
            <div class="col-sm-8">
                <table width="100%">
                    <tr>
                        <td>Nama Sekolah</td>
                        <td>:</td>
                        <td>SMA Muhammadiyah Pleret</td>
                        <td>NISN</td>
                        <td>:</td>
                        <td><?= $nis ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>Kanggotan, Pleret, Bantul, 55791</td>
                        <td>Kelas</td>
                        <td>:</td>
                        <td><?= $kelas; ?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?= $nama_siswa ?></td>
                        <td>Semester</td>
                        <td>:</td>
                        <td><?= $semester; ?></td>
                    </tr>
                    <tr>
                        <td>NIS</td>
                        <td>:</td>
                        <td><?= $nis?></td>
                        <td>Tahun Ajaran</td>
                        <td>:</td>
                        <td><?= $ajaran; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <br/>
        <br/>
        <label>Pengetahuan</label>
        <table width="100%" border="1">
            <thead>
                <tr>
                    <th rowspan="2" class="text-center" style="vertical-align: middle; !important">Mata Pelajaran</th>
                    <th rowspan="2" class="text-center" style="vertical-align: middle; !important">KKM</th>
                    <th colspan="2" class="text-center">Nilai/Mapel</th>
                    <th colspan="2" class="text-center">Tugas</th>
                    <th colspan="2" class="text-center">UTS</th>
                    <th colspan="2" class="text-center">UAS</th>
                </tr>
                <tr>
                    <th class="text-center">Nilai</th>
                    <th class="text-center">Predikat</th>
                    <th class="text-center">Nilai</th>
                    <th class="text-center">Predikat</th>
                    <th class="text-center">Nilai</th>
                    <th class="text-center">Predikat</th>
                    <th class="text-center">Nilai</th>
                    <th class="text-center">Predikat</th>
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
                                <td class="text-center">'.$val->kkm.'</td>
                                <td class="text-center">'.$val->nilai.'</td>
                                <td class="text-center">'.$val->predikat_nilai.'</td>
                                <td class="text-center">'.$val->tugas.'</td>
                                <td class="text-center">'.$val->predikat_tugas.'</td>
                                <td class="text-center">'.$val->uts.'</td>
                                <td class="text-center">'.$val->predikat_uts.'</td>
                                <td class="text-center">'.$val->uas.'</td>
                                <td class="text-center">'.$val->predikat_uas.'</td>
                            </tr>';
                    }
                ?>
                <tr>
                    <th colspan="2" class="text-center">Rata-Rata</th>
                    <!-- <td class="text-left"></td> -->
                    <td colspan="2" class="text-left" style="padding-left:10px"><label><?= $permat?></td></label>
                    <td colspan="2" class="text-left" style="padding-left:10px"><label><?= $avgtugas?></td></label>
                    <td colspan="2" class="text-left" style="padding-left:10px"><label><?= $avguts?></td></label>
                    <td colspan="2" class="text-left" style="padding-left:10px"><label><?= $avguas?></td></label>
                </tr>
            </tbody>
        </table>
        <br/>
        <br/>
        <label>Tabel Interval Predikat berdasarkan KKM</label>
        <table width="100%" border="1">
            <thead>
                <tr>
                    <th rowspan="2" class="text-center" style="vertical-align: middle !important;">KKM</th>
                    <th colspan="4" class="text-center">Predikat</th>
                </tr>
                <tr>
                    <td class="text-center">D = Kurang</td>
                    <td class="text-center">C = Cukup</td>
                    <td class="text-center">B = Baik</td>
                    <td class="text-center">A = Sangat Baik</td>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td class="text-center">62</td>
                    <td class="text-center">n < 62</td>
                    <td class="text-center">62 &le; n &le; 74</td>
                    <td class="text-center">75 &le; n &le; 87</td>
                    <td class="text-center">n &ge; 88</td>
                </tr>
            </tbody>
        </table>
        <br/>
        <br/>
        <br/>
        <div class="col-sm-12">
            <table width="100%">
                <tr>
                    <td class="text-center" width="50%">Wali Kelas</td>
                    <td class="text-center">Kepala Sekolah</td>
                </tr>
                <tr style="height:65px">
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-center"  width="50%">Tempat/tgl<br/><?= $wali ?></td>
                    <td class="text-center">Dra. Tin Martini ST<br/>NIP.000000000</td>
                </tr>
            </table>
        </div>
    <!-- </section>
    <section class="content" id="printableArea" style="page-break-before:always;"> -->
    <p style="page-break-before:always;"></p>
    <br/>
    <br/>
    <div class="row invoice-info">
            <div class="col-sm-8">
                <table width="100%">
                    <tr>
                        <td>Nama Sekolah</td>
                        <td>:</td>
                        <td>SMA Muhammadiyah Pleret</td>
                        <td>NISN</td>
                        <td>:</td>
                        <td><?= $nis ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>Kanggotan, Pleret, Bantul, 55791</td>
                        <td>Kelas</td>
                        <td>:</td>
                        <td><?= $kelas; ?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?= $nama_siswa ?></td>
                        <td>Semester</td>
                        <td>:</td>
                        <td><?= $semester; ?></td>
                    </tr>
                    <tr>
                        <td>NIS</td>
                        <td>:</td>
                        <td><?= $nis?></td>
                        <td>Tahun Ajaran</td>
                        <td>:</td>
                        <td><?= $ajaran; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <br/>
        <br/>
        <div class="col-sm-12">
            <label>Perilaku</label>
            <table width="100%" border="1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Jenis Prestasi</th>
                        <th class="text-center">Predikat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td width="25%">Sikap</td>
                        <td class="text-center" width="75%"><?= $sikap?></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td width="25%">Kompetensi</td>
                        <td class="text-center" width="75%"><?= $kompeten?></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td width="25%">Keterampilan</td>
                        <td class="text-center" width="75%"><?= $keterampilan?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br/>
        <div class="col-sm-12">
            <label>Absensi</label>
            <table width="100%" border="1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Alasan Ketidakhadiran</th>
                        <th class="text-center">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td width="25%">Sakit</td>
                        <td class="text-center" width="75%">Hari</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td width="25%">Ijin</td>
                        <td class="text-center" width="75%">Hari</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td width="25%">Tanpa Keterangan</td>
                        <td class="text-center" width="75%">Hari</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br/>
        <div class="col-sm-12">
            <label>Catatan Wali Kelas</label>
            <table width="100%" border="1">
                <td style="padding-left:10px"><?= $catatan ?></td>
            </table>
        </div>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <div class="col-sm-12">
            <table width="100%">
                <tr>
                    <td class="text-center" width="50%">Wali Kelas</td>
                    <td class="text-center">Kepala Sekolah</td>
                </tr>
                <tr style="height:65px">
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-center"  width="50%">Tempat/tgl<br/><?= $wali ?></td>
                    <td class="text-center">Dra. Tin Martini ST<br/>NIP.000000000</td>
                </tr>
            </table>
        </div>
    </section>
</div>
<!-- </div> -->

<script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
<!-- /.content-wrapper -->