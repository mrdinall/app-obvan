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
            // dateFormat: 'yy-mm-dd',
            dateFormat: 'dd/mm/yy',

        });
    });
})

//validation from php
// $(document).ready(function (e) {
//     $('.btnAddForm').click(function (e) {
//         e.preventDefault();
//         // console.log('dinall');
//         $('.formTambah').append(`<tr>
//         <td>
//             <input type="text" class="form-control <?= (validation_show_error('naBar.*') ? 'is-invalid' : null); ?>" name="naBar[]" placeholder="Nama Barang">
//         </td>
//         <td>
//             <input type="text" class="form-control" name="merk[]" placeholder="Merk">
//         </td>
//         <td>
//             <input type="text" class="form-control" name="sN[]" placeholder="Serial Number">
//         </td>
//         <td>
//             <input type="text" class="form-control" name="jumlah[]" placeholder="Jumlah">
//         </td>
//         <td>
//             <button type="button" class="btn btn-danger btnHapusForm"><i class="fa-solid fa-trash"></i></button>
//         </td>
//     </tr>`);

//     });
// });
//validation from javascript

$(function()
	{
      // Add Row

    
		$(".btnAddForm").click(function()
		{
			addnewrow();
            renumberRows();
		});
      
      // Remove Row
      	$("body").delegate('.btnHapusForm','click',function()
		{
			$(this).parent().parent().remove();
            renumberRows();
            // $(this).parents('tr').remove();
		});	
      
       
    });
	function addnewrow()
	{
        let tr= `<tr>
        <td class="rownumber">
        
        </td>
        <td>
            <input type="text" required id="dinall-js-${$('.rownumber').last().text()}" class="form-control" name="naBar[]" placeholder="Nama Barang">
        </td>
        <td>
            <input type="text" required class="form-control" name="merk[]" placeholder="Merk">
        </td>
        <td>
            <input type="text" required class="form-control" name="sN[]" placeholder="Serial Number">
        </td>
        <td>
            <input type="text" required id="dinall-js-jumlah-" class="form-control" name="jumlah[]" placeholder="Jumlah">
        </td>
        <td>
            <button type="button" required class="btn btn-danger btnHapusForm"><i class="fa-solid fa-trash"></i></button>
        </td>
    </tr>`;
    $('.formTambah').append(tr);
	};

    function renumberRows() {
        $(".formTambah").children().children().each(function(i, v) {
          $(this).find(".rownumber").text(i + 1);
        });
      }




// $("#formAdd").validate();
// addValidationRules();
// function addValidationRules() {
//     $(".in").each((i, e) => {
//         $(e).rules("add", {
//             required: true
//         })
//     });
// }


// $("#formAdd").validate()

// $('[name^="naBar"]').each(function() {
//     $(this).rules('add', {
//         required: true
    
//     });
// });

// $("#formAdd").validate();
// $('[name^="naBar"]').each(function() {
//     $(this).rules('add', {
//         required: true,
//         minlength: 2,
//         messages: {
//             required: "Enter Reg Number",
//             minlength: "Enter at least {0} characters",
//         }
//     })
// });
     


// $(document).on('click', '.btnHapusForm', function (e) {
    // e.preventDefault();
    // $('.output').val('');
    // let counter = $('.output').length;
    // $('.output').attr('value', ''); 
    // $('.output').text(''); 
    // $('.output').text(counter-1); 
    // $('.output').text(counter-1); 
   

//     $(this).parents('tr').remove();
// });





$(document).on('click', '.btnHapusFormEdit', function (e) {
    e.preventDefault();
    let a = $("#idGetForJs").val();
    let id = $(this).val();

    if(id!== ''){
        Swal.fire({
            title: 'Yakin Hapus Data Ini?',
            
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok, Hapus!'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({                    
                    // url: "/peminjaman_alat/edit/PJM-0001/"+id,
                    url: `/peminjaman_alat/edit/${a}/${id}`,
                    type: "POST",
                    dataType: "JSON",
                    success: function (response) {
                        alert("Data deleted successfuly");
                       
                    }
                });
    
            $(this).parents('tr').remove();
            }
          })
    
}
else{
    $(this).parents('tr').remove();
}

});

$(document).ready(function (e) {
    $('.btnAddFormEdit').click(function (e) {
        e.preventDefault();
        // console.log('dinall');
        $('.formTambahEdit').append(`<tr>
        <td>
            <input type="text" required class="form-control" name="naBarEditUpdate[]" placeholder="Nama Barang">
        </td>
        <td>
            <input type="text" required class="form-control" name="merkEditUpdate[]" placeholder="Merk">
        </td>
        <td>
            <input type="text" required class="form-control" name="sNEditUpdate[]" placeholder="Serial Number">
        </td>
        <td>
            <input type="text" required class="form-control" name="jumlahEditUpdate[]" placeholder="Jumlah">
        </td>
        <td>
            <button type="button" required class="btn btn-danger btnHapusFormEdit"><i class="fa-solid fa-trash"></i></button>
        </td>
    </tr>`);

    });
});



// $(document).ready(function () {

//     $('.btnHapusFormEdit').click(function (e) {
//         e.preventDefault();

//         confirmDialog = confirm("Are you sure you want to delete?");
//         if(confirmDialog)
//         {
//             var id = $(this).val();
//             alert(id);
     


//         }

//     });
// });

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





