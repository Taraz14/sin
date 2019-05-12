$(function(){
    getDataTableKelas();
    getKelasDetail();

    function getDataTableKelas(id_kelas){
        var kelasTable = $('#master_kelas').DataTable({
            'searching'  : false,
            'processing' : true,
            'serverSide' : true,
            'order'      : [],
            'ajax'       : {
                url      : site_url + 'back/admin/master_kelas/datatables',
                data     : {
                    id_kelas : id_kelas
                }
            },

            responsive   : true,
            'dom'        : '<lf<t>ip>'
        })
    }

    function getKelasDetail(id_kelas){
        var kelasDetail = $('#Kelas_detail').DataTable({
            'searching'  : false,
            'processing' : true,
            'serverSide' : true,
            'order'      : [],
            'ajax'       : {
                url      : site_url + 'back/admin/kelas_detail/datatables',
                data     : {
                    id_kelas : id_kelas
                }
            },

            responsive   : true,
            'dom'        : '<lf<t>ip>'
        })
    }

    getDataSiswa_admin();
    function getDataSiswa_admin(nisn){
        $('#dataSiswa_admin').DataTable({
            'searching'  : true,
            'processing' : true,
            'serverSide' : true,
            'order'      : [],
            oLanguage: {
                sLengthMenu: "_MENU_",
             },
            'ajax'       : {
                url      : site_url + 'back/admin/Data_siswa/datatables',
                data     : {
                    nisn : nisn
                }
            },

            responsive   : true,
            'dom'        : '<lf<t>ip>'
        })
    }

    $('#nisn').on('change', function(){
        var nisn = $('#nisn').val();
        if(nisn !== ''){
            $('#dataSiswa_admin').DataTable().destroy();
            getDataSiswa_admin(nisn);
        }
        else{
            $('#dataSiswa_admin').DataTable().destroy();
            getDataSiswa_admin();
        }
    });

});

