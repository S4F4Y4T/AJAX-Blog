const err  = document.querySelector('.err');

$(document).ready(() => {

    //login request
    $('#login').on('submit', function(event){
    event.preventDefault();
        $.ajax({
            url: BASE + "user/login",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: res => {
            res = JSON.parse(res);
            $('.err').html(res.message);
            if(res.message.indexOf('Success') > -1){
                window.location = 'home';
            }
            },
            error: err => {
                console.log(err)
            }
        })
    })

    //registration request

    $('#registerBtn').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url: BASE + "user/auth",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: res => {
            res = JSON.parse(res);
            $('.err').html(res.message)
            },
            error: err => {
                console.log(err)
            }
        })
    })

});  
