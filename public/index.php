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
class csv{
    static public function getRecords ($filename){
        $file=fopen($filename,"r");
        $fieldNames =array();

        $count=0;

        while ( ! feof($file)){

            $record=fgetcsv($file);
            if($count==0){
                $fieldNames=$record;
            }else{
                $records[]=recordFactory::create($fieldNames,$record);
            }
            $count++;
        }
        fclose($file);
        return $records;
    }
}

class record{}
class recordFactory{}