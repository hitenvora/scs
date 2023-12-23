var table = $('#product-table').DataTable( {
    'autoWidth': true,
    'scrollX': true,
    pageLength: 10,
    language: { 
        search: '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M17.5 17.5L13.875 13.875M15.8333 9.16667C15.8333 12.8486 12.8486 15.8333 9.16667 15.8333C5.48477 15.8333 2.5 12.8486 2.5 9.16667C2.5 5.48477 5.48477 2.5 9.16667 2.5C12.8486 2.5 15.8333 5.48477 15.8333 9.16667Z" stroke="#5E5873" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        searchPlaceholder: "Search" ,
        oPaginate: {
            sNext: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
            sPrevious: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        },
    },
} );



// row order change
$(document).ready(function () {
    $("#product-table").on("click", "#moveUp", function () {
        var row = $(this).closest("tr");
        if (row.index() > 0) {
            row.insertBefore(row.prev());
        }
    });

    $("#product-table").on("click", "#moveDown", function () {
        var row = $(this).closest("tr");
        if (row.index() < $("#product-table tbody tr").length - 1) {
            row.insertAfter(row.next());
        }
    });
});
  