const param = document.location.pathname.split('/')[3];
const navLink = document.getElementById('navigationLink');


// mobile nav
navLink.children['option-' + param].selected = true;
navLink.addEventListener('change', e => {
    document.location.href = e.target.value;
});

// desktop nav
document.getElementById(param).classList.add('active');
