const overplayPersonal = document.querySelector(".overlay-personal");
const boxShowChangePassword = document.querySelector(".change-password");
const boxShowChangeInformation = document.querySelector(".change-information");
const showPopup = (ele)=> {
    if(ele == 'password') {
        boxShowChangePassword.classList.add("active");
    } else {
        boxShowChangeInformation.classList.add("active");
    }
    overplayPersonal.classList.add('active');
}

const closePopup = ()=> {
    overplayPersonal.classList.remove('active');
    boxShowChangePassword.classList.remove("active");
    boxShowChangeInformation.classList.remove("active");
}