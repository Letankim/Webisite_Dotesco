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