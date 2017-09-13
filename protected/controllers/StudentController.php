<?php

class StudentsController extends BaseController
{
    public function actionUpload()
    {
        $model = new FileUpload();
        $form = new CForm('application.views.site.uploadForm', $model);
        $uploadedFile = CUploadedFile::getInstance($form->model, 'file');
        
        if ($form->submitted('submit') && $form->validate()) {
            $form->model->file = $uploadedFile;
            $component = Yii::app()->getComponent('Student');
            if ($uploadedFile->getExtensionName() == "csv") {
                $component->importCsv($form->model->file->getTempName());
            } else if ($uploadedFile->getExtensionName() == "txt") {
                $component->importTxt($form->model->file->getTempName());
            }
            $this->redirect(['upload']);
        }
        $this->render('upload', ['form' => $form]);
    }
}
