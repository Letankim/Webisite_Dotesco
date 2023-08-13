
        <div class="container col-lg-9 col-12 col-sm-12 col-md-7">
            <div class="title_header">
                <h2 class="title_content">
                    <span class = "background_main"> Giới thiệu</span>
                </h2>
            </div>
            <div class="introduction-details" style="overflow: hidden;">
                <p>
                    <!-- render from database -->
                    <?=$introduction['content']?>
                </p>
            </div>
        </div>
    </div>
</section>
<?php
    echo "<script>
    const title = document.querySelector('title');
    title.innerHTML = 'Giới thiệu';
    </script>";
?>
    