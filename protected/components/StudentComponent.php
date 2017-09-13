<?php

class StudentComponent extends CApplicationComponent
{
    public function importCsv($filename)
    {
        $file = fopen($filename, "r");
        while (($emapData = fgetcsv($file, 10000, ",")) !== false) {
            if ($this->validate($emapData)) {
                $command = Yii::app()->db->createCommand("INSERT into students(first_name, last_name, photo_url, english_lvl, group_id, incoming_test, entry_score, approved_by, cv_url) values('$emapData[0]', '$emapData[1]', '$emapData[2]', '$emapData[3]', '$emapData[4]', '$emapData[5]', '$emapData[6]', '$emapData[7]', '$emapData[8]')");
                $command->execute();
            } else {
                throw new Exception("File is invalid", 1);
            }
        }
        fclose($file);
    }

    public function importTxt($filename)
    {
        $file = fopen($filename, "r");
        while (!feof($file)) {
            $data = explode(", ", fgets($file));
            if ($this->validate($data)) {
                $command = Yii::app()->db->createCommand("INSERT into students(first_name, last_name, photo_url, english_lvl, group_id, incoming_test, entry_score, approved_by, cv_url) values('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$data[7]', '$data[8]')");
                $command->execute();
            } else {
                throw new Exception("File is invalid", 1);
            }
        }
        fclose($file);
    }

    public function validate($arr)
    {
        if (!count($arr) < 9) {
            return false;
        }
        return (is_string($arr[0])
            && is_string($arr[1])
            && is_string($arr[2])
            && is_numeric($arr[3])
            && is_numeric($arr[4])
            && is_numeric($arr[5])
            && is_numeric($arr[6])
            && is_string($arr[7])
            && is_string($arr[8]));
    }
}
