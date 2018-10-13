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


class html
{
    public static function generateTable($records)
    {
        $count = 0;
        $table = "";
        foreach ($records as $record) {
            if ($count == 0) {
                $table .= "<html><body><table>";
                $array = $record->returnArray();
                $fields = array_keys($array);
                $table .= "<tr>";
                foreach ($fields as $field) {
                    $table = "<th>" . $field . "</th>";
                    $count = 1;
                }
                $table .= "</tr>";
            }
            $array = $record->returnArray();
            $values = array_values($array);
            $table .= "<tr>";
            foreach ($values as $value) {
                $table .= "<td>" . $value . "</td>";
            }
            $table .= "</tr>";
        }
        $table .= "</table></body></html>";
        return $table;
    }
}


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

class record{

    public function_construct(Array $fieldNames=null,$values=null){
        $record =array_combine($fieldNames,$values);

        foreach($record as $property=>$value);
{
    $this-> CreateProperty($property, $value)
}

public function returnArray(){
        $array=($array) $this;
        public function createProperty($name='FirstName',$value='Gordon'){
            $this->{$name}=$value;
    }

}

class recordFactory{
    public static function create(Array $fieldNames=null,Array $values=null){
       $record=new record($fieldNames,$values);
       return $record;
    }

}
