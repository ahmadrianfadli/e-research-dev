var idleTime = 0;


function timeoutlogin(){
    $.ajax({
        url:url+"index.php/login/timeoutlogin",
        method:"GET",
        success:function(data){
            window.location.href = "lockscreen";
        }
    })
}

$(document).ready(function () {
    //Increment the idle time counter every minute.
    var idleInterval = setInterval(timerIncrement, 60000); // 1 minute

    //Zero the idle timer on mouse movement.
    $(this).mousemove(function (e) {
        idleTime = 0;
    });
    $(this).keypress(function (e) {
        idleTime = 0;
    });
});

function timerIncrement() {
    idleTime = idleTime + 1;

    if (idleTime > 28) { // 30 minutes
        Swal.fire('Information!','I will close in 1 minutes.','info');
        reload();   
    }
};

function reload() {
    setInterval(function(){ timeoutlogin(); }, 60000);
  }