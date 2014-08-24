var data_table = 'gps_ugyfelkapu_elemek';

$(document).ready(function () {
        $('#PersonTableContainer').jtable({
            title: 'Termékek karbantartása',
            actions: {
                listAction: 'jtable/dat_termekek.php?action=list&data_table='+data_table,
				createAction: 'jtable/dat_termekek.php?action=create&data_table='+data_table,
				updateAction: 'jtable/dat_termekek.php?action=update&data_table='+data_table
				//deleteAction: 'jtable/dat_felhasznalok.php?action=delete&data_table='+data_table
            },
            fields: {
                sorszam: {
                    key: true,
                    list: false
                },
                cikkszam: {
                    title: 'Cikkszám',
                    width: '15%'
                },
                megnevezes: {
                    title: 'Megnevezés',
                    width: '55%'
                },
                kiszereles: {
                    title: 'Kiszerelés',
                    width: '15%'
                },
                mennyisegiegyseg: {
                    title: 'Mennyiségiegység',
                    width: '15%'
                }
            }
        });
        $('#PersonTableContainer').jtable('load');
    });
    
    