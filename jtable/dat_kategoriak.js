var data_table = 'alombutor_galeriacsop';

$(document).ready(function () {
        $('#PersonTableContainer').jtable({
            title: 'Kategóriák karbantartása',
			sorting: true,
			defaultSorting: 'szulo ASC',
            actions: {
                listAction: 'jtable/dat_kategoriak.php?action=list&data_table='+data_table,
				createAction: 'jtable/dat_kategoriak.php?action=create&data_table='+data_table,
				updateAction: 'jtable/dat_kategoriak.php?action=update&data_table='+data_table,
				deleteAction: 'jtable/dat_kategoriak.php?action=delete&data_table='+data_table
            },
            fields: {
                sorszam: {
                    key: true,
                    list: false
                },
                felirat_hu: {
                    title: 'felirat',
                    width: '80%'
                },
				sorrendszam: {
                    title: 'sorrend',
                    width: '20%'
                },
            }
        });
        $('#PersonTableContainer').jtable('load');
    });
    
    