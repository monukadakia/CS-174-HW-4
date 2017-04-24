<?php
/**
 * Created by PhpStorm.
 * User: yashparikh
 * Date: 4/23/17
 * Time: 4:58 PM
 */

namespace coolname\Hw4\src\views;

class mainView
{
    function renderHeader()
    {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Web Sheets</title>
            <script type="text/javascript" src="/../Hw4/src/resources/spreadsheet.js"></script>

        </head>
        <body>
        <?php
    }

    function renderFooter()
    {
        ?>
        </body>
        </html>
        <?php
    }
}
?>