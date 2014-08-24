var data_table = 'loretta_meretek';

$(document).ready(function () {
        $('#PersonTableContainer').jtable({
            title: 'Méretek karbantartása',
            actions: {
                listAction: 'jtable/dat_meretek.php?action=list&data_table='+data_table,
				createAction: 'jtable/dat_meretek.php?action=create&data_table='+data_table,
				updateAction: 'jtable/dat_meretek.php?action=update&data_table='+data_table
				//deleteAction: 'jtable/dat_meretek.php?action=delete&data_table='+data_table
            },
            fields: {
                sorszam: {
                    key: true,
                    list: false
                },
                meret: {
                    title: 'Méret',
                    width: '90%'
                }
            }
        });
        $('#PersonTableContainer').jtable('load');
    });
    
    