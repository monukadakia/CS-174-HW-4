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

        echo "&lt;"."?xml version='1.0' encoding='UTF-8'?>"."<br/>";
        echo "&lt;"."!DOCTYPE spreadsheet SYSTEM 'spreadsheet.dtd' >"."<br/>";


        $this->indent =  str_repeat('&nbsp;', 10);

        $this->sheetStartTag = $this->makeStartTag("spreadsheet");
        $this->sheetEndTag = $this->makeEndTag("spreadsheet");
        $this->rowStartTag = $this->rowStartTag.$this->makeStartTag("row");
        $this->rowEndTag = $this->makeEndTag("row");
        $this->columnStartTag = $this->indent.$this->indent.$this->makeStartTag("column");
        $this->columnEndTag = $this->makeEndTag("column");


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

        echo $this->getColumnHeader(count($data[0]));

        for($row = 1; $row < count($data) + 1; $row++) {
            echo $this->indent.$this->rowStartTag."<br/>".$this->columnStartTag.$row.$this->columnEndTag."<br/>";
            echo $this->getColumnData($data[$row - 1]);
        }

        echo $this->sheetEndTag;
    }

    function makeStartTag($tagName){
        return "&lt;".$tagName."&gt;";
    }

    function makeEndTag($tagName){
        return "&lt;"."/".$tagName."&gt;";
    }

    function getColumnHeader($num_of_column){
        $currentRow = $this->indent.$this->rowStartTag."<br/>".$this->columnStartTag."".$this->columnEndTag."<br/>";

        for($i = 0; $i < $num_of_column; $i++){
            $currentRow.= $this->columnStartTag.chr($i + 65).$this->columnEndTag."<br/>";
        }

        return $currentRow.$this->indent.$this->rowEndTag."<br/>";
    }
    
    function getColumnData($dataFields){
        $currentRow = "";
        for($i = 0; $i < count($dataFields); $i++) {
            $currentRow .= $this->columnStartTag . $dataFields[$i] . $this->columnEndTag . "<br/>";
        }
        return $currentRow.$this->indent.$this->rowEndTag."<br/>";
    }

    function spreadSheetRowXML($rowData){
        $currentRow = $this->rowStartTag;

        foreach ($rowData as $columnData){
            $currentRow.= $this->columnStartTag.$columnData.$this->columnEndTag;
        }

        return $currentRow.$this->rowEndTag."<br/>";
    }

}
