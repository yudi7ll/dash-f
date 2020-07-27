const CONFIG = {
    headers: {
        'Content-Type': 'text/html',
        'X-Requested-With': 'XMLHttpRequest'
    }
}
const BASEURL = document.location.origin;

async function infiniteSroll() {
    let page = 2;
    let isLoading = false;
    const SITEURL = BASEURL + "/api/post?page=";
    const loading = $('#loading');
    const noData = $('#no-data');

    $(window).scroll(() => {
        if($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
            load_more();
        }
    });

    async function load_more() {
        noData.hide();
        loading.show();

        if (!isLoading) {
            isLoading = true;

            try {
                let res = await fetch(SITEURL + page, CONFIG);
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

$(window).ready(async function () {
    await infiniteSroll();
});
