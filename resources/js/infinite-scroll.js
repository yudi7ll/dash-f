'use strict';

const params = window.location.search.replace('?', '&');
const SITE_URL = BASE_URL + API_URL;

let page = 1;
let isLoading = false;
const loadingEl = document.getElementById('loading');
const noDataEl = document.getElementById('no-data');

// define displayBlock method
document.__proto__.__proto__.__proto__.displayBlock = function() {
    this.style.display = 'block';
}

// define displayHide method
document.__proto__.__proto__.__proto__.displayHide = function() {
    this.style.display = 'none';
}

async function load_more() {
    noDataEl.displayHide();
    loadingEl.displayBlock();

    if (!isLoading) {
        const URL = SITE_URL + page + params;
        isLoading = true;

        try {
            let res = await fetch(URL, CONFIG);
            res = await res.text();

            if (!res) {
                return noDataEl.displayBlock();
            }

            // increment the page var
            page++;

            // append to the page
            document.getElementById('postcard').innerHTML += res;
        } catch(e) {
            noDataEl.displayBlock();
        } finally {
            loadingEl.displayHide();
            isLoading = false;
        }
    }
}

// handle the scroll event
load_more();
window.addEventListener('scroll', () => {
    if (document.body.scrollHeight - window.scrollY <= 700) {
        load_more();
    }
});
