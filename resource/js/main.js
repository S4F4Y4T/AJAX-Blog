const BASE="http://localhost/rest/app/api/",err=document.querySelector(".err");$(document).ready(()=>{function n(n){$.ajax({url:BASE+"post/getPost/get/"+n,method:"GET",success:t=>{t=JSON.parse(t),n+=1,t.forEach(n=>{$(".post-container").html($(".post-container").html()+`<div class="post-body"><h3>${n.title.substr(0,30)}<span class='remove' id='delete' postid=${n.postid}>Delete</span></h3><div class='post-block'><div class='img-box'><img src='${BASE}../../images/${n.image}' alt=""></div><p>${n.body.substr(0,200)}</p></div></div>`)})},error:n=>{console.log(n)}})}function t(n){$.ajax({url:BASE+"post/home_pagination/get/"+n,method:"GET",success:n=>{$(".pagination").html(n)},error:n=>{console.log(n)}})}$("#login").on("submit",function(n){n.preventDefault();$.ajax({url:BASE+"user/login/post",method:"POST",data:new FormData(this),contentType:!1,processData:!1,success:n=>{n=JSON.parse(n),$(".err").html(n.message),n.message.indexOf("Success")>-1&&(window.location="home")},error:n=>{console.log(n)}})});$("#register").on("submit",function(n){n.preventDefault();$.ajax({url:BASE+"user/auth/post",method:"POST",data:new FormData(this),contentType:!1,processData:!1,success:n=>{n=JSON.parse(n),$(".err").html(n.message)},error:n=>{console.log(n)}})});t();n();$("#post").on("submit",function(i){i.preventDefault();$.ajax({url:BASE+"post/addPost/post",method:"POST",data:new FormData(this),contentType:!1,processData:!1,success:i=>{i=JSON.parse(i),$(".err").html(i.message),$("#title").val(""),$("#post_body").val(""),$(".post-container").html(""),n(),$(".paginaion").html(""),t()},error:n=>{console.log(n)}})});$(document).on("click",".remove",()=>{if(confirm("Are You Sure")){const i=$(".remove").attr("postid");$.ajax({url:BASE+"post/delPost/delete/"+i,method:"DELETE",success:i=>{i=JSON.parse(i),$(".err").html(i.message),$(".post-container").html(""),n(),$(".paginaion").html(""),t()}})}});$(document).on("click",".pager",i=>{const r=i.target.getAttribute("id");$(".post-container").html("");n(r);t(r)});$.ajax({url:BASE+"user/profile/get",method:"GET",success:n=>{$("#email").val(JSON.parse(n)[0].email)},error:n=>{console.log(n)}});$("#update_profile").on("submit",function(n){n.preventDefault();$.ajax({url:BASE+"user/updtPfl/post",method:"POST",data:new FormData(this),contentType:!1,processData:!1,success:n=>{$(".err").html(JSON.parse(n).message)},error:n=>{console.log(n)}})})});

//***unimified version***//
/*
const BASE =  'http://localhost/rest/app/api/';
const err      = document.querySelector('.err');

$(document).ready(() => {

    //login request
    $('#login').on('submit', function(event){
    event.preventDefault();
        $.ajax({
            url: BASE + "user/login/post",
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

    $('#register').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url: BASE + "user/auth/post",
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

    pagination();
    fetch();

    //insert post
    $('#post').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url: BASE + "post/addPost/post",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: res => {
                res = JSON.parse(res);
                $('.err').html(res.message);
                $('#title').val('');
                $('#post_body').val(''); 

                $('.post-container').html('');
                fetch();
                $('.paginaion').html('');
                pagination();
            },
            error: err => {
                console.log(err)
            }
        })
    })
    

    //get post
    function fetch(page){
        $.ajax({
            url: BASE + "post/getPost/get/"+page,
            method: 'GET',
            success: res => {
                res = JSON.parse(res);
                page += 1;
                (res).forEach((post) => {
                    $('.post-container').html(
                        $('.post-container').html() + `<div class="post-body"><h3>${(post.title).substr(0,30)}<span class='remove' id='delete' postid=${post.postid}>Delete</span></h3><div class='post-block'><div class='img-box'><img src='${ BASE }../../images/${post.image}' alt=""></div><p>${(post.body).substr(0,200)}</p></div></div>`          
                    );
                
                });
            },
            error: err => {
                console.log(err)
            }
        })
    }

    $(document).on('click',".remove",() => {
            //delete post
        if(confirm('Are You Sure')){
            const id = $('.remove').attr('postid');

            $.ajax({
                url: BASE + "post/delPost/delete/"+id,
                method:'DELETE',
                success: res => {
                    res = JSON.parse(res);
                    $('.err').html(res.message);

                    $('.post-container').html('');
                    fetch();
                    $('.paginaion').html('');
                    pagination();
                }
            })
            
        }
    })
    
    //pagination
    function pagination(page){
        
        $.ajax({
            url: BASE + "post/home_pagination/get/"+page,
            method: 'GET',
            success: res => {
                $('.pagination').html(res);
            },
            error: err => {
                console.log(err)
            }
        })
    }

    
    $(document).on('click','.pager',(e) => {
        const page = (e.target).getAttribute('id');
        $('.post-container').html('');
        fetch(page);
        pagination(page)
    })



    //update page
    $.ajax({
        url: BASE + "user/profile/get",
        method: 'GET',
        success: res => {
            
            $('#email').val(JSON.parse(res)[0].email)
        },
        error: err => {
            console.log(err)
        }
    })

    //update email
    $('#update_profile').on('submit', function(event){
        event.preventDefault();
        $.ajax({
        url: BASE + "user/updtPfl/post",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: res => {
        $('.err').html((JSON.parse(res).message));
        },
        error: err => {
            console.log(err)
        }
        })
    })

});  
*/