document.addEventListener('click', ()=> {
    const menu = document.querySelector('.navbar-collapse.collapse.show');
    if(menu) {
        menu.classList.remove('show');
    }
});

// validate form
// validation form
const name = document.getElementById('name'),
    email = document.getElementById('email'),
    phone = document.getElementById('phone'),
    comment = document.getElementById('message'),
    submitBtn = document.querySelector('.btn.btn-primary');
const messageName = "Tên phải chứa ít nhất 2 kí tự và nhiều nhất 30 kí tự",
    messageEmail = "Email không hợp lệ. Ví dụ: username@gmail.com",
    messagePhone = "Số điện thoại phải gồm 10 chữ số và không có khoảng trắng",
    messageComment = "Nội dung tin nhắn phải ít nhất 20 kí tự.";
// array to save all input to check, message show error of each and a string regex to check 
if(submitBtn) {
    const inputsToValidate = [
        { element: name, error: "Tên" ,message: messageName, regex: /^.{2,30}$/},
        { element: phone, error: "SĐT",message: messagePhone, regex: /^(0|\+84)[0-9]{9}$/},
        { element: email, error: "Email",message: messageEmail, regex: /^[^\s@]+@[^\s@]+\.[^\s@]{2,4}$/},
        { element: comment, error: "Tin nhắn",message: messageComment, regex: /^[\s\S]{20,}$/}
    ];
    
    // for each item in array input check when blur and when enter in input again clear show error
    inputsToValidate.forEach(function(item) {
        item.element.addEventListener('blur', function() {
            checkInput(item.element, item.message, item.regex, item.error);
        })
        item.element.addEventListener('input', function() {
            const parentNode = item.element.parentElement;
            parentNode.querySelector('.message_error').innerHTML = "";
        })
    })
    
    // check error of element if no match with regex call function show error and return false
    // else return true and call function show success
    function checkInput(ele, message, regex, error) {
        let messageError = '';
        if(ele.value.trim() == "") {
            messageError = `${error} là bắt buộc`;
        } else if(!ele.value.match(regex)) {
            messageError = message;
        } else {
            messageError = "";
        }
    
        if(messageError.trim().length != 0) {
            showErrorMessage(ele,messageError);
            return false;
        } else {
            handleSuccess(ele);
            return true;
        }
    }
    
    //  function show message on each input when have a error
    function showErrorMessage(element, message) {
        const parentNode = element.parentElement;
        parentNode.querySelector('.message_error').innerHTML = message;
    }
    //  function handle message when input is valid
    function handleSuccess(element) {
        const parentNode = element.parentElement;
        parentNode.querySelector('.message_error').innerHTML = "";
    }
    //  handle submit event check if all input pass. send data else not send
    submitBtn.addEventListener('click', function(e) {
        let isValid = true;
        inputsToValidate.forEach(function(item) {
            if(!checkInput(item.element, item.message, item.regex, item.error)){
                isValid = false;
            }
        })
        if(!isValid) {
            e.preventDefault();
        }
    })
}

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
    closeBtn.addEventListener('click', function(e) {
        popUp.classList.remove("active");
        overlay.classList.remove("active");
    })
    overlay.addEventListener('click', function(e) {
        popUp.classList.remove("active");
        overlay.classList.remove("active");
    })
}

