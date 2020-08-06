import $ from 'jquery';

// add attribute loading=lazy to img
document.querySelectorAll('img')
    .forEach(e => e.setAttribute('loading', 'lazy'));

// like the article
$('#like-form').on('submit', e => {
    e.preventDefault();

    const data = {
        _token: e.target._token.value,
    }

    $.ajax({
        url: e.target.action,
        method: e.target._method.value,
        data,
        success: res => {
            console.log(res);
        }
    })
});
