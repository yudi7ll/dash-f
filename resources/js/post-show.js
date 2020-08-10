import $ from 'jquery';

// add attribute loading=lazy to img
document.querySelectorAll('img')
    .forEach(e => e.setAttribute('loading', 'lazy'));

// like the article
$('#like-form input[name="isLiked"]').val() && liked();

$('#like-form').on('submit', e => {
    e.preventDefault();
    // toggle first for feedback
    toggle();

    $.ajax({
        url: e.target.action,
        method: e.target._method.value,
        data: {
            _token: e.target._token.value,
            user_id: e.target.user_id.value,
        },
        error: toggle,
        success: res => {
            res.is_liked ? liked() : unlike();
            $('#likes-total').html(res.likes_count);
        },
    })
});

function liked() {
    $('#liked').show();
    $('#notLiked').hide();
}
function unlike() {
    $('#liked').hide();
    $('#notLiked').show();
}
function toggle() {
    $('#liked').toggle();
    $('#notLiked').toggle();
}
