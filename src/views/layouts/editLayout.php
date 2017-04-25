<?php

namespace coolname\Hw4\src\views\layouts;
use coolname\Hw4\src\configs\Config;
use coolname\Hw4\src\views\mainView;


class editLayout extends mainView {

    function __construct($hashCodes){
        $this->renderHeader();
        $this->renderBody($hashCodes);
        $this->renderFooter();
    }

    function renderBody($hashCodes){
        ?>
        <h1 style="display: inline;"> <a href="index.php?c=landing&m=landingView"> Web Sheets</a> : </h1>
        <h1 style="display: inline;" id="webSheetName"><?php echo $_REQUEST['webSheetName'] ?></h1><br>
        <?php
            $hashr = ''; $hashe = ''; $hashf = '';
            if(!isset($_REQUEST['arg1'])) {
                $hashr = '&arg1='.$hashCodes['r'];
                $hashe = '&arg1='.$hashCodes['e'];
                $hashf = '&arg1='.$hashCodes['f'];
            }
        ?>
        <label id="editURL"> Edit Url:</label><input type="text" name="editURL" value="<?php echo 'localhost'.$_SERVER['REQUEST_URI'].$hashr;?>"/><br/>
        <label id="readURL"> Read Url:</label><input type="text" name="readURL" value="<?php echo 'localhost'.$_SERVER['REQUEST_URI'].$hashe;?>"/><br/>
        <label id="fileURL"> File Url:</label><input type="text" name="fileURL" value="<?php echo 'localhost'.$_SERVER['REQUEST_URI'].$hashf;?>"/><br/>

        <div id="spreadSheet">
            <script>
                var sheet = new Spreadsheet('spreadSheet', '[[""]]', {"mode":"write"});
                sheet.draw();
            </script>
        </div>

        <?php
    }
}
?>
