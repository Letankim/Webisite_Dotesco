<?php
    $content = $introduction == null ? "" : $introduction->getContent();
?>
        <div class="container col-lg-9 col-12 col-sm-12 col-md-7">
            <div class="title_header">
                <h2 class="title_content">
                    <span class = "background_main"> Giới thiệu</span>
                </h2>
            </div>
            <div class="introduction-details" style="color: #000;overflow: hidden;">
                <p>
                    <!-- render from database -->
                    <?=$content?>
                </p>
            </div>
        </div>
    </div>
</section>
<script>
    const title = document.querySelector('title');
    title.innerHTML = 'Giới thiệu';
</script>
    