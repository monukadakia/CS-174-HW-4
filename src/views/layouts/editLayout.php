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

            $urle = $_SERVER['REQUEST_URI'];
            if(!isset($_REQUEST['arg1'])) {
                $urle = 'localhost/Hw4/index.php?c=edit&m=editLayout&webSheetName=' . $_REQUEST['webSheetName'] . '&arg1=' . $hashCodes['e'];
            }

            $urlr = 'localhost/Hw4/index.php?c=read&m=readLayout&webSheetName='.$_REQUEST['webSheetName'].'&arg1='.$hashCodes['r'];
            $urlf = 'localhost/Hw4/index.php?c=file&m=fileLayout&webSheetName='.$_REQUEST['webSheetName'].'&arg1='.$hashCodes['f'];

        ?>
        <label style="display:inline-block;padding-top:20px;" id="editURL"> Edit Url:</label><input style="display:inline;" type="text" name="editURL" value="<?php echo $urle;?>"/><br/>
        <label id="readURL"> Read Url:</label><input type="text" name="readURL" value="<?php echo $urlr;?>"/><br/>
        <label id="fileURL"> File Url:</label><input type="text" name="fileURL" value="<?php echo $urlf;?>"/><br/>

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
