<?php

namespace coolname\Hw4\src\views\layouts;
use coolname\Hw4\src\views\mainView;


class landingLayout extends mainView {

    function __construct(){
        $this->renderHeader();
        $this->renderBody();
        $this->renderFooter();
    }

    function renderBody(){
        ?>
        <h1> <a href="index.php"> Web Sheets </a></h1>

        <form id="form" onsubmit="return checkInput();">
            <input type="hidden" name="c" value="edit"/>
            <input type="hidden" name="m" value="editLayout"/>
            <input type="text" id="sheetName" name="webSheetName"/>
            <button>Go</button>
        </form>

        <script type="text/javascript">
            function checkInput(){
                var input = document.getElementById("sheetName").value;
                var reg = /[^A-Za-z0-9 ]/;
                if(!input.match(reg)){
                    return true;
                }
                else{
                    alert("name and hash codes should not involve non-(alphanumeric or space) characters");
                    location.reload();
                    return false;
                }
            }
        </script>

        <?php
    }
}
?>
