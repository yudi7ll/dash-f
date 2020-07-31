const CONFIG = {
    headers: {
        'Content-Type': 'text/html',
        'X-Requested-With': 'XMLHttpRequest'
    }
}
const BASEURL = document.location.origin;
const SITEURL = BASEURL + "/api/post?page=";

let page = 2;
let isLoading = false;
const loading = document.getElementById('loading');
const noData = document.getElementById('no-data');

window.addEventListener('scroll', () => {
    if (document.body.scrollHeight - window.scrollY <= 700) {
        load_more();
    }
});

async function load_more() {
    noData.style.display = 'none';
    loading.style.display = 'block';

    if (!isLoading) {
        isLoading = true;

        try {
            let res = await fetch(SITEURL + page, CONFIG);
            res = await res.text();

            if (!res) {
                noData.style.display = 'block';
                return;
            }

            document.getElementById('postcard').innerHTML += res;
            page++;
        } catch(e) {
            noData.style.display = 'block';
        } finally {
            loading.style.display = 'none';
            isLoading = false;
        }
    }
}
