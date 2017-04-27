<?php

namespace coolname\Hw4\src\views\layouts;
use coolname\Hw4\src\configs\Config;
use coolname\Hw4\src\views\mainView;


class editLayout extends mainView {

    function __construct($hashCodes, $data){
        $this->renderHeader();
        $this->renderBody($hashCodes, $data);
        $this->renderFooter();
    }

    function renderBody($hashCodes, $data){
        ?>

        <h1 style="display: inline;"> <a href="index.php"> Web Sheets</a> : </h1>
        <h1 style="display: inline;" id="webSheetName"><?php echo $_REQUEST['webSheetName'] ?></h1><br>
        <?php
            $url = 'localhost/Hw4/index.php?c=';
            $hashr = ''; $hashe = ''; $hashf = '';
            if(!isset($_REQUEST['arg1'])) {
                $hashr = '&arg1='.$hashCodes['r'];
                $hashe = '&arg1='.$hashCodes['e'];
                $hashf = '&arg1='.$hashCodes['f'];
            }
        ?>
        <label id="editURL"> Edit Url:</label><input type="text" name="editURL" value="<?php echo $url.'edit&webSheetName='.$_REQUEST['webSheetName'].$hashe;?>"/><br/>
        <label id="readURL"> Read Url:</label><input type="text" name="readURL" value="<?php echo $url.'read&webSheetName='.$_REQUEST['webSheetName'].$hashr;?>"/><br/>
        <label id="fileURL"> File Url:</label><input type="text" name="fileURL" value="<?php echo $url.'file&webSheetName='.$_REQUEST['webSheetName'].$hashf;?>"/><br/>

        <div id="spreadSheet">
            <script>
                var sheet = new Spreadsheet('spreadSheet', <?php echo json_encode($data);?>, {"mode":"write"});
                sheet.draw();
            </script>
        </div>

        <?php
    }
}
?>
