var darkmode = 'darkmodeoff';

$('#darkmode').click(function(){
    if(darkmode==='darkmodeon'){
        $('body').removeClass('dark-mode');
        $('#icondarkmode').removeClass('fas fa-cloud-sun text-warning');
        $('#icondarkmode').addClass('fas fa-moon');
        darkmode = 'darkmodeoff';
    }else{
        $('body').addClass('dark-mode');
        $('#icondarkmode').removeClass('fas fa-moon');
        $('#icondarkmode').addClass('fas fa-cloud-sun text-warning');
        darkmode = 'darkmodeon';
    }
});

toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}