import 'bootstrap';

window.CONFIG = {
    headers: {
        'Content-Type': 'text/html',
        'X-Requested-With': 'XMLHttpRequest'
    }
}

window.BASE_URL = document.location.origin;
window.API_URL = '/api/posts?page=';
