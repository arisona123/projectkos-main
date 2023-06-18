const  flashData = $('.flash-data').data('flashdata');

if(flashData){
    Swal.fire({
        icon: 'success',
        title: flashData,
        text:'',
        showClass: {
          popup: 'animate__animated animate__jackInTheBox'
        },
        hideClass: {
          popup: 'animate__animated animate__fadeOutDown'
        },
      })
};

const  flashData_pass = $('.flash-data-pass').data('flashdata');

if(flashData_pass){
    Swal.fire({
        icon: 'warning',
        title: flashData_pass,
        showConfirmButton: true,
        showClass: {
          popup: 'animate__animated animate__jackInTheBox'
        },
        hideClass: {
          popup: 'animate__animated animate__fadeOutDown'
        },
        
      })
};

// delete

$('.hapus').on('click', function(e){

  e.preventDefault();
  const href = $(this).attr('href');
  const  flashData = $('.data').data('data');

  Swal.fire({
    showClass: {
      popup: 'animate__animated animate__jackInTheBox'
    },
    hideClass: {
      popup: 'animate__animated animate__fadeOutDown'
    },
  title: 'Apakah anda yakin?',
  text: flashData,
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yaa!',
  cancelButtonText: 'Tidak!',
 
  }).then((result) => {
    if (result.isConfirmed) {
      document.location.href = href;
    }
  })
});

// konfirmasi
$('.konfirmasi').on('click', function(e){

  e.preventDefault();
  const  flashData = $('.data').data('confirm');

  Swal.fire({
  title: 'Apakah anda yakin?',
  text: flashData,
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yaa!',
  cancelButtonText: 'Tidak!',
  showClass: {
    popup: 'animate__animated animate__jackInTheBox'
  },
  hideClass: {
    popup: 'animate__animated animate__fadeOutDown'
  },
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById("confirm").submit();
    }
  })
});