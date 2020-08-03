'use strict';

const SITEURL = BASEURL + "/api/posts?page=";

let page = 2;
let isLoading = false;
const loadingEl = document.getElementById('loading');
const noDataEl = document.getElementById('no-data');

// define show method
document.__proto__.__proto__.__proto__.show = function() {
    return this.style.display = 'block';
}

// define hide method
document.__proto__.__proto__.__proto__.hide = function() {
    return this.style.display = 'none';
}

async function load_more() {
    noDataEl.hide();
    loadingEl.show();

    if (!isLoading) {
        isLoading = true;

        try {
            let res = await fetch(SITEURL + page, CONFIG);
            res = await res.text();

            if (!res) {
                return noDataEl.show();
            }

            // increment the page var
            page++;

            // append to the page
            document.getElementById('postcard').innerHTML += res;
        } catch(e) {
            noDataEl.show();
        } finally {
            loadingEl.hide();
            isLoading = false;
        }
    }
}

// handle the scroll event
window.addEventListener('scroll', () => {
    if (document.body.scrollHeight - window.scrollY <= 700) {
        load_more();
    }
});
