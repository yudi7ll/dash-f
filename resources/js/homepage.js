const config = {
    headers: {
        'Content-Type': 'text/html',
        'X-Requested-With': 'XMLHttpRequest'
    }
}
const BASEURL = document.location.origin;

async function infiniteSroll() {
    let page = 1;
    let isLoading = false;
    const SITEURL = BASEURL + "/api/post?page=";
    const loading = $('#loading');
    const noData = $('#no-data');

    load_more();

    $(window).scroll(() => {
        if($(window).scrollTop() + $(window).height() >= $(document).height() - 200) {
            load_more();
        }
    });

    async function load_more() {
        noData.hide();
        loading.show();

        if (!isLoading) {
            isLoading = true;

            try {
                let res = await fetch(SITEURL + page, config);
                res = await res.text();

                if (!res) {
                    noData.show();
                    return;
                }

                $('#postcard').append(res);
                page++;
            } catch(e) {
                noData.show();
            } finally {
                loading.hide();
                isLoading = false;
            }
        }
    }
}

async function popular() {
    const url = BASEURL + '/api/populars';
    const res = await fetch(url, config);

    $('#sidebar').html(await res.text());
}

async function tags() {
    const url = BASEURL + '/api/tagscard';
    const res = await fetch(url, config)

    $('#tagscard').html(await res.text());
}

$(window).ready(async function () {
    await infiniteSroll();
    await popular();
    await tags();
});
