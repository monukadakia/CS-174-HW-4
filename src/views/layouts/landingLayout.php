<?php

require_once __DIR__."/../mainView.php";

class landingLayout extends mainView {

    function __construct(){
        $this->renderHeader();
        $this->renderBody();
        $this->renderFooter();
    }

    function renderBody(){
        ?>
        <h1> <a href="index.php"> Web Sheets </a></h1>

        <input type="text" name="webSheetName"/>
        <button>Go</button>
        <?php
    }
}
?>