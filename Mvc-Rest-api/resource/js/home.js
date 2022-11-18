const err  = document.querySelector('.err');

$(document).ready(() => {
    pagination(1);
    fetch(1);
});

//insert post
$('#post').on('submit', function(event){
    event.preventDefault();
    $.ajax({
        url: BASE + "post/addPost",
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
            fetch(1);
            $('.paginaion').html('');
            pagination(1);
        },
        error: err => {
            console.log(err)
        }
    })
})


//get post
function fetch(page){
    $.ajax({
        url: BASE + "post/getPost/"+page,
        method: 'GET',
        success: res => {
            res = JSON.parse(res);

            if(Object.keys(res[0]).length > 0){
                page += 1;
                (res).forEach((post) => {
                    $('.post-container').html(
                        $('.post-container').html() + `<div class="post-body"><h3>${(post.title).substr(0,30)}<span class='remove' id='delete' postid=${post.postid}>Delete</span></h3><div class='post-block'><div class='img-box'><img src='${BASE}images/${post.image}' alt=""></div><p>${(post.body).substr(0,200)}</p></div></div>`
                    );

                });
            }
        },
        error: err => {
            console.log(err);
        }
    })
}

$(document).on('click',".remove",() => {
    //delete post
    if(confirm('Are You Sure')){
        const id = $('.remove').attr('postid');

        $.ajax({
            url: BASE + "post/delPost/"+id,
            method:'DELETE',
            success: res => {
                res = JSON.parse(res);
                $('.err').html(res.message);

                $('.post-container').html('');
                fetch(1);
                $('.paginaion').html('');
                pagination(1);
            }
        })

    }
})

//pagination
function pagination(page){

    $.ajax({
        url: BASE + "post/home_pagination/"+page,
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
    url: BASE + "user/profile",
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
        url: BASE + "user/updtPfl",
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