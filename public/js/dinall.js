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
        scrollY: '70vh'
    });
});
$(document).ready(function () {
    $('#tableInputBarang').DataTable({

        scrollY: true
    });
});

$(document).ready(function () {

    $(function () {
        $("#tanggal").datepicker({
            dateFormat: 'yy-mm-dd',

        });
    });
})



$(document).ready(function (e) {
    $('.btnEditPinjamAlat').click(function (e) {
        // e.preventDefault();
        // console.log('dinall');

    });
});
$(document).ready(function (e) {
    $('.btnAddForm').click(function (e) {
        e.preventDefault();
        // console.log('dinall');
        $('.formTambah').append(`<tr>
        <td>
            <input type="text" class="form-control" name="naBar[]" placeholder="Nama Barang">
        </td>
        <td>
            <input type="text" class="form-control" name="merk[]" placeholder="Merk">
        </td>
        <td>
            <input type="text" class="form-control" name="sN[]" placeholder="Serial Number">
        </td>
        <td>
            <input type="text" class="form-control" name="jumlah[]" placeholder="Jumlah">
        </td>
        <td>
            <button type="button" class="btn btn-danger btnHapusForm"><i class="fa-solid fa-trash"></i></button>
        </td>
    </tr>`);

    });
});
$(document).on('click', '.btnHapusForm', function (e) {
    e.preventDefault();
    $(this).parents('tr').remove();
});
$(document).on('click', '.btnHapusFormEdit', function (e) {
    e.preventDefault();
  
    let id = $(this).val();

    alert(id);

    // $ajax({
    //     method:"POST",
    //     url: "/peminjaman_alat/edit/PJM-0002"+id,
    //     data: {
    //         'id':id
    //     },
    //     success: function (response){
    //         alert("sukses");
    //     }

    // });
    $(this).parents('tr').remove();
});





