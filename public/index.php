<?php
/**
 * Created by PhpStorm.

 */

main::start("project.csv");
class main {
    public static function start ($filename){
        $records=csv::getRecords($filename);
        $table =html::generateTable($records);
        echo $table;
    }
}


class html{}
class csv{}

class record{}
class recordFactory{}