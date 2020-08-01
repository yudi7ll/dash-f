const param = document.location.pathname.split('/')[3];

document.getElementById(param).classList.add('active');
