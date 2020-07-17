$(window).ready(function () {
    let page = 1;
    let isLoading = false;
    const SITEURL = document.location.origin + "?page=";
    const loading = $('#loading');
    const noData = $('#no-data');

    load_more();

    $(window).scroll(() => {
        if($(window).scrollTop() + $(window).height() >= $(document).height()) {
            load_more();
        }
    });

    async function load_more() {
        noData.hide();
        loading.show();

        const config = {
            headers: {
                'Content-Type': 'text/html',
                'X-Requested-With': 'XMLHttpRequest'
            }
        }

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
});
