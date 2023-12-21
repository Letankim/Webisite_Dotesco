document.addEventListener('click', ()=> {
    const menu = document.querySelector('.navbar-collapse.collapse.show');
    if(menu) {
        menu.classList.remove('show');
    }
});

// show pop up
const contactBtn = document.querySelectorAll('.contact_link'),
    popUp = document.querySelector('.pop-up'),
    closeBtn = document.querySelector(".btn-close-pop-up"),
    overlay = document.querySelector('.overlay');
if(popUp) {
    contactBtn.forEach(function(item) {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            popUp.classList.add("active");
            overlay.classList.add("active");
        })
    })
    closeBtn.addEventListener('click', function() {
        popUp.classList.remove("active");
        overlay.classList.remove("active");
    })
    overlay.addEventListener('click', function() {
        popUp.classList.remove("active");
        overlay.classList.remove("active");
    })
}
// drop down
const btnDropDow = document.querySelectorAll('.drop_down_category');
if( btnDropDow) {
    btnDropDow.forEach(function(item) {
        item.addEventListener('click', function(e) {
            const listNav = item.parentElement.parentElement.querySelector(".list_nav_left");
            if(listNav.classList.contains("active")) {
                listNav.classList.remove("active");
                item.querySelector('i').setAttribute('class',"bx bxs-chevron-down");
            } else {
                listNav.classList.add("active");  
                item.querySelector('i').setAttribute('class',"bx bxs-chevron-up");
            }
        })
    })
}