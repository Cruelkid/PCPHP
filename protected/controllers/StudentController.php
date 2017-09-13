<?php

class StudentsController extends BaseController
{
    public function actionUpload()
    {
        $model = new FileUpload();
        $form = new CForm('application.views.site.uploadForm', $model);
        
        if ($form->submitted('submit') && $form->validate()) {
            if (CUploadedFile::getInstance($form->model, 'file')->getExtensionName() == "csv") {
                $form->model->file = CUploadedFile::getInstance($form->model, 'file');
                $component = Yii::app()->getComponent('Student');
                $component->importCsv($form->model->file->getTempName());
                $this->redirect(['upload']);
            } else if (CUploadedFile::getInstance($form->model, 'file')->getExtensionName() == "txt") {
                $form->model->file = CUploadedFile::getInstance($form->model, 'file');
                $component = Yii::app()->getComponent('Student');
                $component->importTxt($form->model->file->getTempName());
                $this->redirect(['upload']);
            }
        }
        $this->render('upload', ['form' => $form]);
    }
}