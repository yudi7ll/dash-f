const param = new URLSearchParams(window.location.search).get('page');
const navLink = document.getElementById('navigationLink');

// mobile nav
navLink.querySelector(`option[value=${param}]`).selected = true;
navLink.addEventListener('change', () => {
    document.getElementById('pageForm').submit();
});

// desktop nav
document.getElementById(param).classList.add('active');
