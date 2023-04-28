<?php 
        @ob_end_clean();
        session_start();
        //to redirect if dircect url used
        if(!isset($_SERVER['HTTP_REFERER'])){
                // redirect them to your desired location
                header('location:../index.html');
                exit;
    }
    ?>

        <?php include("header.php") ?>
        <section class="u-align-center u-clearfix u-image u-shading u-section-1" src="" data-image-width="3362" data-image-height="2177" id="sec-f76f">
                <div class="u-clearfix u-sheet u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1">
                <?php
                        $fullname = $_SESSION['fullname'];
                       echo ("<h1 class='u-text u-text-default u-title u-text-1'>Hallo ".$fullname."</h1>");
                ?>
                </div>
        </section>
        <?php include("footer.php") ?>
