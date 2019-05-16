$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var Password={
    reset:function(){

    },
    change:function(id){
        var current=$('[name=currentPassword]').val();
        var newPassword=$('[name=password]').val();
        var confirmPassword=$('[name=passwordConfirm]').val();
        Password.match(newPassword,confirmPassword);
        $.ajax({
            url         :   '/password/change',
            dataType    :   'json',
            type        :   'post',
            data        :   {
                'id'        :   id,
                'current'   :   current,
                '_token'    :   token,
                'new'       :   newPassword,
                'confirm'   :   confirmPassword
            },
            success:function(data){
                console.log(data);
            }
        });
    },
    match:function(newPassword,confirmPassword){
        if(newPassword!==confirmPassword){
            $('[name=passwordConfirm]').parent('div').addClass('has-error');
        }else{
            $('[name=passwordConfirm]').parent('div').addClass('has-success').removeClass('has-error');
        }
    }
};

$('[name=passwordConfirm]').keypress(function(){
    Password.match($('[name=password]').val(),$('[name=passwordConfirm]').val());
});