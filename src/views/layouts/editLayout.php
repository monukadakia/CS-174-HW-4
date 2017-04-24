<?php

require_once __DIR__."/../mainView.php";

class editLayout extends mainView {

    function __construct(){
        $this->renderHeader();
        $this->renderBody();
        $this->renderFooter();
    }

    function renderBody(){
        ?>
        <h1> <a href="index.php"> Web Sheets: Name of Sheet </a></h1>

        <label id="editURL"> Edit Url:</label><input type="text" name="editURL"/>
        <label id="readURL"> Read Url:</label><input type="text" name="readURL"/>
        <label id="fileURL"> File Url:</label><input type="text" name="fileURL"/>


        <?php
    }
}
?>