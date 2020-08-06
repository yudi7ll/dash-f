const param = new URLSearchParams(window.location.search).get('page');
const navLink = document.getElementById('navigationLink');

if (! param) {
    document.location.search = '?page=profile';
}

// mobile nav
navLink.querySelector(`option[value=${param}]`).selected = true;
navLink.addEventListener('change', () => {
    document.getElementById('pageForm').submit();
});

// desktop nav
document.getElementById(param).classList.add('active');

// TODO: prevent user from leaving when input is changed except submitting form

// if the form input is changed then set isDirty to true
// document
//     .querySelectorAll('form input')
//     .forEach(el => {
//         el.addEventListener('change', () => window.onbeforeunload = function () {
//             return "";
//         });
//     });
//
// document
//     .querySelector('form button[type="submit"]')
//     .addEventListener('click', () => {
//
//         window.onbeforeunload = null;
//     });

// prevent user from leaving the page
// window.onbeforeunload = function() {
//     return isDirty ? "" : null;
// }
