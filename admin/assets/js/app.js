const btnShowForm = document.querySelector('.btn-show-form-add'),
    formAdd = document.querySelector('.form-add');
if(btnShowForm) {
    btnShowForm.addEventListener('click', function(){
        formAdd.classList.toggle("active");
        if(formAdd.classList.contains("active")) {
            btnShowForm.innerHTML = "Ẩn box thêm";
        } else {
            btnShowForm.innerHTML = "Thêm mới";
        }
    })
}


//  delete button click
const deleteBtn = document.querySelectorAll(".deleteBtn");

if(deleteBtn) {
    deleteBtn.forEach(function(item) {
        item.addEventListener("click", function(e) {
            let confirmDelete = confirm("Bạn có chắc muốn xóa nó?");
            if(confirmDelete) {
                item.parentElement.querySelector(".deleteSubmit").click();
            }
        });
    })
}
// ajax
function deleteByCheck(typeDelete) {
    const checkList = document.querySelectorAll('.check-item');
    const listChecked = [];
    checkList.forEach(function(item) {
        if(item.checked) {
            listChecked.push(item.value);
        }
    });
    const numberOfDelete = listChecked.length;
    if(numberOfDelete > 0) {
        if(confirm(`Bạn có chắc muốn xóa ${numberOfDelete} mục này?`)) {
            $.ajax({
                url: `./view/delete/deleteByCheck${typeDelete}.php`,
                type: 'POST',
                dataType: 'html',
                data: {
                    'dataDelete[]': listChecked,
                    numberOfDelete: numberOfDelete,
                    isAll: false
                }
            }).done(function (response) {
                let currentURL = window.location.href;
                let url = new URL(currentURL);
                let params = new URLSearchParams(url.search);
                let pageValue = params.get('page');
                let queryPosition = currentURL.indexOf('?');
                let baseURL = queryPosition !== -1 ? currentURL.slice(0, queryPosition) : currentURL;
                if(response == "true") {
                    window.location.href = baseURL + "?page=" + pageValue + "&status=success";
                } else {
                    window.location.href = baseURL + "?page=" + pageValue + "&status=fail";
                }
                window.reload();
            });
        }
    }
}


function deleteAll(typeDelete) {
    const listChecked = [1, 2];
    if(confirm(`Bạn có chắc muốn xóa tất cả mục này?`)) {
        $.ajax({
            url: `./view/delete/deleteByCheck${typeDelete}.php`,
            type: 'POST',
            dataType: 'html',
            data: {
                'dataDelete[]': listChecked,
                numberOfDelete: -1,
                isAll: true
            }
        }).done(function (response) {
            let currentURL = window.location.href;
                let url = new URL(currentURL);
                let params = new URLSearchParams(url.search);
                let pageValue = params.get('page');
                let queryPosition = currentURL.indexOf('?');
                let baseURL = queryPosition !== -1 ? currentURL.slice(0, queryPosition) : currentURL;
                if(response == "true") {
                    window.location.href = baseURL + "?page=" + pageValue + "&status=success";
                } else {
                    window.location.href = baseURL + "?page=" + pageValue + "&status=fail";
                }
                window.reload();
        });
    }
}