var data_table = 'loretta_hirlevelre';

$(document).ready(function () {
        $('#PersonTableContainer').jtable({
            title: 'Hírlevélre feliratkozók karbantartása',
            actions: {
                listAction: 'jtable/dat_hirlevelre.php?action=list&data_table='+data_table,
				createAction: 'jtable/dat_hirlevelre.php?action=create&data_table='+data_table,
				updateAction: 'jtable/dat_hirlevelre.php?action=update&data_table='+data_table
				//deleteAction: 'jtable/dat_hirlevelre.php?action=delete&data_table='+data_table
            },
            fields: {
                sorszam: {
                    key: true,
                    list: false
                },
				status: {
                    title: 'Státusz',
                    width: '20%'
                },
                email: {
                    title: 'Email',
                    width: '80%'
                }
            }
        });
        $('#PersonTableContainer').jtable('load');
    });
    
    