<?php

namespace coolname\Hw4\src\views\layouts;

use coolname\Hw4\src\views\mainView;


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
        $urlf = 'localhost/Hw4/index.php?c=file&m=fileLayout&webSheetName='.$_REQUEST['webSheetName'].'&arg1='.$hashCodes['f'];
        ?>

        <label id="fileURL"> File Url:</label><input type="text" name="fileURL" value="<?php echo $urlf;?>"/><br/>
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