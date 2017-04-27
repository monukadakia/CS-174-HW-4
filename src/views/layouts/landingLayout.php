<?php

namespace coolname\Hw4\src\views\layouts;
use coolname\Hw4\src\views\mainView;


class landingLayout extends mainView {

    function __construct(){
        $this->renderHeader();
        $this->renderBody();
        $this->renderFooter();
    }

    function renderBody(){
        ?>
        <h1> <a href="index.php"> Web Sheets </a></h1>

        <form>
            <input type="hidden" name="c" value="edit"/>
            <input type="hidden" name="m" value="editLayout"/>
            <input type="text" name="webSheetName"/>
            <button>Go</button>
        </form>


        <?php
    }
}
?>
