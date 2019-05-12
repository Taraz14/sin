$(function(){
    getDataSiswa_guru();
    function getDataSiswa_guru(nisn){
        $('table.display').DataTable({
            'searching'  : true,
            'processing' : true,
            'serverSide' : true,
            'order'      : [],
            oLanguage: {
                sLengthMenu: "_MENU_",
             },
            'ajax'       : {
                url      : site_url + 'back/guru/G_data_siswa/datatables',
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
            $('table.display').DataTable().destroy();
            getDataSiswa_guru(nisn);
        }
        else{
            $('table.display').DataTable().destroy();
            getDataSiswa_guru();
        }
    });
})