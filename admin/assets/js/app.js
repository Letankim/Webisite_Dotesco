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
            let confirmDelete = confirm("Are you sure you want to delete this item?");
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
                location.reload();
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
            location.reload();
        });
    }
}