<style>
@media print {
      .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6,
      .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
           float: left;               
      }

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
        Rapor
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= site_url('admin')?>"><i class="fa fa-dashboard"></i> Rapor</a></li>
      </ol>
    </section>
    <section class="content">

        <div class="col-sm-12">
            <div class="col-sm-3">
                Nama Peserta Didik
            </div>
            <div class="col-sm-3">
                <span class="text-left">: LISNAWATI</span>
            </div>
            <div class="col-sm-3">
                Kelas
            </div>
            <div class="col-sm-3">
                <span class="text-left">: X</span>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-3">
                Nomor Induk
            </div>
            <div class="col-sm-3">
                <span class="text-left">: 939</span>
            </div>
            <div class="col-sm-3">
                Semester
            </div>
            <div class="col-sm-3">
                <span class="text-left">: 2/Genap</span>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-3">
                Nama Sekolah
            </div>
            <div class="col-sm-3">
                <span class="text-left">: SMA MUHAMMADDIYAH P</span>
            </div>
            <div class="col-sm-3">
                Tahun Ajaran
            </div>
            <div class="col-sm-3">
                <span class="text-left">: 2014/2015</span>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center" rowspan="3">No.</th>
                    <th class="text-center" rowspan="3">Komponen</th>
                    <th class="text-center" rowspan="3">KKM</th>
                    <th class="text-center" colspan="4">Nilai Hasil Belajar</th>
                    <th class="text-center" rowspan="3">Sikap</th>
                    <th class="text-center" rowspan="3">Pencapaian Kompetensi</th>
                    
                </tr>
                <tr>
                    <th class="text-center" colspan="2">Pengetahuan</th>
                    <th class="text-center" colspan="2">Praktik</th>
                </tr>
                <tr>
                    <th class="text-center">Angka</th>
                    <th class="text-center">Huruf</th>
                    <th class="text-center">Angka</th>
                    <th class="text-center">Huruf</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>A.</td>
                    <td>Mata Pelajaran</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>1.</td>
                    <td>Pendidikan Agama</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>a. Alqur'an Hadist</td>
                    <td>77</td>
                    <td>85</td>
                    <td>Delapan Lima</td>
                    <td>86</td>
                    <td>Delapan Enam</td>
                    <td>B</td>
                    <td>Tuntas</td>
                </tr>
                <tr>
                    <td></td>
                    <td>b. Aqidah</td>
                    <td>77</td>
                    <td>79</td>
                    <td>Tujuh Sembilan</td>
                    <td></td>
                    <td></td>
                    <td>A</td>
                    <td>Tuntas</td>
                </tr>
            </tbody>
        </table>
    </section>

</div>
<script type="text/javascript">
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>