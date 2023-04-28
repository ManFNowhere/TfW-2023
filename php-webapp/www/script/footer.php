<?php
@ob_end_clean();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//to redirect if dircect url used
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../index.html');
    exit;
}?>

<footer class="u-align-center u-clearfix u-footer u-grey-70 u-footer" id="sec-1d0f">
        <div class="u-clearfix u-sheet u-sheet-1">
            <p class="u-small-text u-text u-text-variant u-text-1">powered by Hochschule Bremerhaven</p>
        </div>
    </footer>
    </body>

</html>