<?php
/**
 * Created by PhpStorm.
 * User: yashparikh
 * Date: 4/26/17
 * Time: 1:26 AM
 */

namespace coolname\Hw4\src\views\layouts;


class fileLayout
{
    private $data;
    private $indent;
    private $sheetStartTag;
    private $sheetEndTag;
    private $rowStartTag;
    private $rowEndTag;
    private $columnStartTag;
    private $columnEndTag;


    function __construct($data)
    {

        $this->sheetStartTag = $this->makeStartTag("spreadsheet");
        $this->sheetEndTag = $this->makeEndTag("spreadsheet");
        $this->rowStartTag = $this->makeStartTag("row");
        $this->rowEndTag = $this->makeEndTag("row");
        $this->columnStartTag = $this->makeStartTag("column");
        $this->columnEndTag = $this->makeEndTag("column");

        $this->indent =  str_repeat('&nbsp;', 10);

        $this->data = $data;

        if($data==""){
            $this->default_XML();
        } else {
            $this->displayXML(json_decode($this->data));
        }
    }

    function default_XML(){

        echo $this->sheetStartTag;
        echo "<br/>";
        echo $this->spreadSheetRowXML(["", "A"]);
        echo $this->spreadSheetRowXML(["1", ""]);

        echo $this->sheetEndTag;

    }
    function displayXML($data){
        echo $this->sheetStartTag;
        echo "<br/>";


        echo $this->getFirstRowXML(count($data[0]));
    }

    function makeStartTag($tagName){
        return "&lt;".$tagName."&gt;";
    }

    function makeEndTag($tagName){
        return "&lt;"."/".$tagName."&gt;";
    }

    function getFirstRowXML($num_of_column){
        $currentRow = $this->indent.$this->rowStartTag.$this->columnStartTag."".$this->columnEndTag."<br/>";

        for($i = 0; $i < $num_of_column; $i++){
            $currentRow.= $this->columnStartTag.chr($i + 65).$this->columnEndTag."<br/>";
        }

        return $currentRow.$this->rowEndTag."<br/>";
    }

    function spreadSheetRowXML($rowData){
        $currentRow = $this->indent.$this->rowStartTag;

        foreach ($rowData as $columnData){
            $currentRow.= $this->columnStartTag.$columnData.$this->columnEndTag;
        }

        return $currentRow.$this->rowEndTag."<br/>";
    }

}
