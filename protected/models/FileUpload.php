<?php
 
class FileUpload extends CFormModel
{
    public $file;

    public function rules()
    {
        return [
            [
            	'file',
            	'file',
            	'allowEmpty' => false,
            	'types' => 'txt, csv',
            	'wrongType' => "Sorry, only csv and txt file are allowed to upload."],
        ];
    }
}
