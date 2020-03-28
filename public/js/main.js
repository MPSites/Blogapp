$(document).ready(function(){
    $('.cat_link').click(function(e){
        e.preventDefault();

        var id = $(this).data('id');

        $.ajax({
            url: BASE_URL + "/post/category/" +id,
            method: "GET",
            success: function (posts) {
                var html = "";
                for(var post of posts){
                    html+= printPosts(post);
                }
                $("#post-area").html(html);
            },
            error: function(xhr,status,error){
                console.log(xhr);
            }
        })
    })
});

function printPosts(post){
    return `<div class="blog-post">
                <h2 class="blog-post-title">${post.title}</h2>
                <p class="blog-post-meta">${post.added_on} by <em class="bl">${post.full_name}</em></p>

                <p>${post.details}</p>
                <a href="/post/${post.post_id}" name="posts">Continue reading</a>
                <hr>
            </div>`;
}