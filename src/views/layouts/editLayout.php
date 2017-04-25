<?php

namespace coolname\Hw4\src\views\layouts;
use coolname\Hw4\src\views\mainView;



class editLayout extends mainView {

    function __construct(){
        $this->renderHeader();
        $this->renderBody();
        $this->renderFooter();
    }

    function renderBody(){
        ?>
        <h1 style="display: inline;"> <a href="index.php?c=landing&m=landingView"> Web Sheets</a> : </h1>
        <h1 style="display: inline;" id="webSheetName"><?php echo $_REQUEST['webSheetName'] ?></h1><br>

        <label id="editURL"> Edit Url:</label><input type="text" name="editURL"/><br/>
        <label id="readURL"> Read Url:</label><input type="text" name="readURL"/><br/>
        <label id="fileURL"> File Url:</label><input type="text" name="fileURL"/><br/>

        <div id="spreadSheet">
            <script>
                var sheet = new Spreadsheet('spreadSheet', '[["Tom"],["Sally"]]', {"mode":"write"});
                sheet.draw();
            </script>
        </div>

        <?php
    }
}
?>
