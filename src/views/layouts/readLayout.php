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
        <h1> <a href="index.php"> Web Sheets: title of Sheet </a></h1>
        <?php
        $hashf = '';
        if(!isset($_REQUEST['arg1'])) {
            $hashf = '&arg1='.$hashCodes['f'];
        }
        ?>

        <label id="fileURL"> File Url:</label><input type="text" name="fileURL" value="<?php echo 'localhost'.$_SERVER['REQUEST_URI'].$hashf;?>"/><br/>
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