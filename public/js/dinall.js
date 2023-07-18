// $(document).ready(function() {
//     $('#dinallTable').DataTable( {
//         dom: 'Bfrtip',
//         scrollX: true,
//         buttons: [
//             'copy', 'csv', 'excel', 'pdf', 'print'
//         ]
//     } );
// } );
$(document).ready(function () {
    $('#dinallTable').DataTable({
        scrollX: true,
      
        scrollCollapse: true,
        scrollY: '50vh'
    });
});

