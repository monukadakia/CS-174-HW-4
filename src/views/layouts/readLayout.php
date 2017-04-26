<?php

namespace coolname\Hw4\src\views\layouts;

use coolname\Hw4\src\views\mainView;

require_once __DIR__."/../mainView.php";

class readLayout extends mainView {

    function __construct($hashCodes,$data){
        $this->renderHeader();
        $this->renderBody($hashCodes,$data);
        $this->renderFooter();
    }

    function renderBody($hashCodes,$data){
        ?>
        <h1 style="display: inline;"> <a href="index.php"> Web Sheets</a> : </h1>
        <h1 style="display: inline;" id="webSheetName"><?php echo $_REQUEST['webSheetName'] ?></h1><br>
        <?php
        $url = 'localhost/Hw4/index.php?c=';
        $hashf = '';
        if(!isset($_REQUEST['arg1'])) {
            $hashf = '&arg1='.$hashCodes['f'];
        }
        ?>

        <label id="fileURL"> File Url:</label><input type="text" name="fileURL" value="<?php echo $url.'file&webSheetName='.$_REQUEST['webSheetName'].$hashf;?>"/><br/>
        <div id="spreadSheet">
            <script>
                var sheet = new Spreadsheet('spreadSheet', <?php echo json_encode($data);?>);
                sheet.draw();
            </script>
        </div>
        <?php
    }
}
?>