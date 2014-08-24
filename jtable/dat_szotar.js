var data_table = 'merlegek_szotar';

$(document).ready(function () {
        $('#PersonTableContainer').jtable({
            title: 'Szótár karbantartása',
            actions: {
                listAction: 'jtable/dat_szotar.php?action=list&data_table='+data_table,
				createAction: 'jtable/dat_szotar.php?action=create&data_table='+data_table,
				updateAction: 'jtable/dat_szotar.php?action=update&data_table='+data_table,
				deleteAction: 'jtable/dat_szotar.php?action=delete&data_table='+data_table
            },
            fields: {
                id: {
                    key: true,
                    list: false
                },
                hu: {
                    title: 'hu',
                    width: '29%'
                },
				en: {
                    title: 'en',
                    width: '29%'
                },
				ro: {
                    title: 'ro',
                    width: '29%'
                },
				megjegyzes: {
                    title: 'megjegyzés',
                    width: '13%'
                }
            }
        });
        $('#PersonTableContainer').jtable('load');
    });
    
    