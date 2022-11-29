function configtable(texto) {
    var exportbtn = [
        'pageLength',
        {
            extend: 'colvis',
            text: '<i class="fas fa-list-ul"></i>'
        },
        {
            extend: 'collection',
            autoClose: true,
            text: '<i class="far fa-save fa-lg"></i></span> ',
            buttons: [{
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                },
                title: 'Lista de ' + texto,
                text: '<i class="fas fa-print fa-lg"></i> Imprimir',
            },
            {
                extend: 'csv',
                title: 'Lista de ' + texto,
                text: '<i class="far fa-file-excel fa-lg"></i> Exportar csv',
            },
            {
                extend: 'excel',
                title: 'Lista de ' + texto,
                text: '<i class="far fa-file-excel fa-lg"></i> Exportar a Excel',
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: ':visible'
                },
                title: 'Lista de ' + texto,
                orientation: 'landscape',
                text: '<i class="far fa-file-pdf fa-lg"></i> Exportar a PDF',
            }
            ]
        }
    ];

    $.extend(true, $.fn.dataTable.defaults, {
        "table-layout": 'fixed',
        language: {
            url: "js/datatables-es.json",
            searchPlaceholder: "Buscar...",
            buttons: {
                pageLength: {
                    _: "%d ",
                    '-1': "Todos"
                }
            }
        },
        pageLength: 15,
        stateSave: true,
        responsive: true,
        colReorder: true,
        dom: 'B<"tooltablas">frtip',
        lengthMenu: [
            [15, 25, 50, 100, -1],
            ['15 Registros', '25 Registros', '50 Registros', '100 Registros', 'Mostrar todos']
        ],

        buttons: exportbtn,
    });
}
