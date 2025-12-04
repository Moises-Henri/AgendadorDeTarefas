$(document).ready(function(){
    
    $('.btn-login').click(function(e){
        e.preventDefault()
       var dados = $('#form-login').serialize()
       $.ajax({
        type: 'POST',
        dataType: 'JSON',
        assync: true,
        data: dados,
        url: 'backend/model/user/login.php',
        success: function (dados){
            Swal.fire({
                icon: dados.type,
                title: "SysTask",
                text: dados.message
            });
        }
       })
    })

})