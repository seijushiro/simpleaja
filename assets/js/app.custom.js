$(function() {
    $('.datatable_default').DataTable({
        pageLength: 5,
        responsive: true,
        info: false,
        searching: true,
        paging:   true,
        bLengthChange: false

    });
});

$(function() {
    $('#datatable').DataTable({
        pageLength: 10,
        responsive: true,
        info: false,
        "sDom": 'rtip',
        columnDefs: [{
            targets: -1,
            orderable: false
        }]
    });

    var table = $('#datatable').DataTable();
    $('#key-search').on('keyup', function() {
        table.search(this.value).draw();
    });
    $('#type-filter').on('change', function() {
        table.column(4).search($(this).val()).draw();
    });
});

$(function() {
    var url = window.location.pathname.split("/");
    var url_getdata = location.protocol + '//' + location.host + "/" + url[1]+ "/" + url[2]+'/getData';
    $('#datatable_serverside').DataTable({
        pageLength: 10,
        responsive: true,
        info: false,
        processing: true,
        serverSide: true,
        "order": [],
        "sDom": 'rtip',
        "ajax": {
            "url": url_getdata ,
            "type": "POST"
        },      
        columnDefs: [{
            targets: -1,
            orderable: false
        }]
    });


    var table = $('#datatable_serverside').DataTable();
    $('#key-search').on('keyup', function() {
        table.search(this.value).draw();
    });
});

$(function() {
    $('.datatable_unsorted').DataTable({
        pageLength: 10,
        responsive: true,
        info: false,
        "sDom": 'rtip',
        columnDefs: [{
            targets: -1,
            orderable: false
        }],
        orderFixed:[ 0, 'asc' ]
    });
});    


$(function() {
    $('.datatable_select').DataTable({
        lengthChange: false,
        responsive: true,
        searching: false,
        info: false,
        pagingType: "full"            

    });

    var table = $('.datatable_select').DataTable();
    $('.datatable_select tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
});


  