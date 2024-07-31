require('./bootstrap');



let Swal = require('sweetalert2');
const Toast = Swal.mixin({
    toast: true,
    position: "center-start",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    }
});



document.addEventListener('livewire:load',()=>{
    Livewire.on('toast',(type,message)=>{
        Toast.fire({
            icon: type,
            title: message
        });
    });

    Livewire.on('sweet',(type,message)=>{
        Swal.fire({
            position: "bottom-end",
            icon: type,
            title: message,
            showConfirmButton: false,
            timer: 1500
        });
    })
});
