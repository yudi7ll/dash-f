require('./bootstrap');

document.location.pathname === '/' && require('./homepage');

$('#tags-input').selectize({
    delimiter: ',',
    persist: false,
    create: function(input) {
        return {
            value: input,
            text: input
        }
    }
});

async function tags() {
    const url = BASEURL + '/api/tagscard';
    const res = await fetch(url, config)

    $('#tagscard').html(await res.text());
}
