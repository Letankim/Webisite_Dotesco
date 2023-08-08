// validate form
// validation form
const username = document.getElementById('username'),
    email = document.getElementById('email'),
    password = document.getElementById('password'),
    submitBtn = document.querySelector('.btn.btn-primary');
const messageUsername = "Tên đăng nhập phải chứa ít nhất 5 kí tự và nhiều nhất 30 kí tự không cách",
    messageEmail = "Email không hợp lệ. Ví dụ: username@gmail.com",
    messagePassword = "Mật khẩu từ 8 kí tự không cách";
// array to save all input to check, message show error of each and a string regex to check 
if(submitBtn) {
    const inputsToValidate = [
        { element: username, message: messageUsername, regex: /^[a-zA-Z]{5,30}$/},
        { element: password, message: messagePassword, regex: /^[0-9a-zA-Z#$%&*@!]{8,}$/},
        { element: email, message: messageEmail, regex: /^[^\s@]+@[^\s@]+\.[^\s@]{2,4}$/}
    ];
    
    // for each item in array input check when blur and when enter in input again clear show error
    inputsToValidate.forEach(function(item) {
        item.element.addEventListener('blur', function() {
            checkInput(item.element, item.message, item.regex);
        })
        item.element.addEventListener('input', function() {
            const parentNode = item.element.parentElement;
            parentNode.querySelector('.message_error').innerHTML = "";
        })
    })
    
    // check error of element if no match with regex call function show error and return false
    // else return true and call function show success
    function checkInput(ele, message, regex) {
        let messageError = '';
        if(ele.value.trim() == "") {
            messageError = `${ele.name} là bắt buộc`;
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
            if(!checkInput(item.element, item.message, item.regex)){
                isValid = false;
            }
        })
        if(!isValid) {
            e.preventDefault();
        }
    })
}