<?php

namespace coolname\Hw4\src\views\layouts;
use coolname\Hw4\src\views\mainView;

require_once __DIR__."/../mainView.php";
require_once __DIR__."/../../controllers/editController.php";


class editLayout extends mainView {

    function __construct(){
        $this->renderHeader();
        $this->renderBody();
        $this->renderFooter();
    }

    function renderBody(){
        ?>
        <h1> <a href="index.php"> Web Sheets: Name of Sheet </a></h1>

        <label id="editURL"> Edit Url:</label><input type="text" name="editURL"/><br/>
        <label id="readURL"> Read Url:</label><input type="text" name="readURL"/><br/>
        <label id="fileURL"> File Url:</label><input type="text" name="fileURL"/><br/>


        <?php
    }
}
?>