<!-- footer -->
    <div class='footer'>
        <div class='wthree-copyright'>
            <p>©
                <?php
                    echo date("Y");
                ?> 
            DOTESCO. All rights reserved | &COPY;Copy right by Letankim</p>
        </div>
    </div>
    <!-- / footer -->
    <script src='./assets/js/bootstrap.js'></script>
    <script src='./assets/js/toast.js'></script>
    <script src='./assets/js/scripts.js'></script>
    <script src='./assets/js/jquery.nicescroll.js'></script> 
    <script src='./assets/js/jquery.scrollTo.js'></script>
    <script src='./assets/js/app.js'></script>
    <?php
        if(isset($_GET['status']) && $_GET['status']) {
            if($_GET['status'] == 'success') {
                $message = isset($_GET['message']) ? $_GET['message'] : "Thực hiện thành công";
                ?>
                <script>
                    showSuccess("<?=$message?>");
                </script>
                <?php
            } else {
                $message = isset($_GET['message']) ? $_GET['message'] : "Thực hiện thất bại";
            ?>
                <script>
                    showError("<?=$message?>");
                </script>
            <?php
            }
        }
    ?>
</body>
</html>