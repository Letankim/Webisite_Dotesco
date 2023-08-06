const mainImg = document.querySelector(".main-product-img"),
    allImageProduct = document.querySelectorAll(".image-product-item");

if(mainImg) {
    allImageProduct.forEach(function(item) {
        item.addEventListener("click", function() {
            mainImg.src = item.src;
            const currentImg = document.querySelector(".image-product-item.active");
            currentImg.classList.remove("active");
            item.classList.add('active');
        });
    })
}