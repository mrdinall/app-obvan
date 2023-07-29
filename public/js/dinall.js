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


    $(this).parents('tr').remove();
});

$(document).ready(function (e) {
    $('.btnAddFormEdit').click(function (e) {
        e.preventDefault();
        // console.log('dinall');
        $('.formTambahEdit').append(`<tr>
        <td>
            <input type="text" class="form-control" name="naBarEditUpdate[]" placeholder="Nama Barang">
        </td>
        <td>
            <input type="text" class="form-control" name="merkEditUpdate[]" placeholder="Merk">
        </td>
        <td>
            <input type="text" class="form-control" name="sNEditUpdate[]" placeholder="Serial Number">
        </td>
        <td>
            <input type="text" class="form-control" name="jumlahEditUpdate[]" placeholder="Jumlah">
        </td>
        <td>
            <button type="button" class="btn btn-danger btnHapusFormEdit"><i class="fa-solid fa-trash"></i></button>
        </td>
    </tr>`);

    });
});



// $(document).ready(function edit($id) {

// });
// function edit(id_pinjam) {
//     $.ajax({
//         type: "post",
//         // url: "<?= site_url('peminjaman_alat/formedit')?>",
//         // url  : "<?php echo base_url(); ?>/PeminjamanAlat/formedit",
//         url: "/peminjaman_alat/formedit",
//         data: {
//             id_pinjam: id_pinjam

//         },
//         dataType: "json",
//         success: function (response) {
//             if (response.sukses) {
//                 $('.viewmodal').html(response).show();
//                 $('#modaledit').modal('show');
//             }
//         },
//         error: function (xhr, ajaxOptions, thrownError) {
//             alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
//         }
//     });
// }
// function hapus(name){
//     Swal.fire({
//         title: 'Are you sure?',
//         text: "You won't be able to revert this!",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Yes, delete it!'
//       }).then((result) => {
//         if (result.isConfirmed) {
//             // $.ajax({
//             //     type: "post",
//             //     // url: "<?= site_url('peminjaman_alat/formedit')?>",
//             //     // url  : "<?php echo base_url(); ?>/PeminjamanAlat/formedit",
//             //     url: "/peminjaman_alat/hapus",
//             //     data: {
//             //         id: 'id'
        
//             //     },
//             //     dataType: "json",
//             //     success: function (response) {
                    
//             //           console.log('sukses');
                    
//             //     },
//             //     error: function (xhr, ajaxOptions, thrownError) {
//             //         alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
//             //     }
//             // });

//             $.ajax({
//                 method: "POST",
//                 url: "some.php",
//                 data: { name: "John", location: "Boston" }
//               })
//                 .done(function( msg ) {
//                   alert( "Data Saved: " + msg );
//                 });
        
        
        
        
//         //   Swal.fire(
//         //     'Deleted!',
//         //     'Your file has been deleted.',
//         //     'success'
//         //   )
//         }
//       })
    
// }





