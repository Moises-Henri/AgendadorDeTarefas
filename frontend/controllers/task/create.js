$(document).ready(function(){

    $('.btn-new').click(function(e){
        e.preventDefault()
        $('#modal-task').modal('show')
    })

    $('.btn-save').click(function(e){
        e.preventDefault()
        var dados = $('#form-task').serialize()
        console.log(dados)
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            async: true,
            data: dados,
            url: '../../backend/model/task/create.php',
            success: function(dados){
                Swal.fire({
                    icon: dados.type,
                    title: "SysTask",
                    text: dados.message,
                });
                $('#modal-task').modal('hide')
                $('#form-task')[0].reset()
 
            }
        })
    })

})
