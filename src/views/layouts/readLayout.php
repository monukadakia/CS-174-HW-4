<?php

require_once __DIR__."/../mainView.php";

class readLayout extends mainView {

    function __construct(){
        $this->renderHeader();
        $this->renderBody();
        $this->renderFooter();
    }

    function renderBody(){
        ?>
        <h1> <a href="index.php"> Web Sheets: title of Sheet </a></h1>

        <label id="fileURL"> File Url:</label><input type="text" name="fileURL"/>
        <?php
    }
}
?>