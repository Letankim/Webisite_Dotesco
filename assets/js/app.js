document.addEventListener('click', ()=> {
    const menu = document.querySelector('.navbar-collapse.collapse.show');
    if(menu) {
        menu.classList.remove('show');
    }
})

