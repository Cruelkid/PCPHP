<?php

class StudentListController extends CController
{
    public function actionRenderEditModalScore($group_id)
    {
        $rawStudentList = Yii::app()->student->getStudentList($group_id);
        $studentList = [];
        foreach ($rawStudentList as $student) {
            $studentList[] = [
                'id' => $student['id'],
                'name' => $student['first_name'],
                'surname' => $student['last_name'],
                'photo_url' => $student['photo_url'],
                'incoming_test' => $student['incoming_test'],
                'entry_score' => $student['entry_score'],
                'approved_by' => $student['approved_by'],
            ];
        }

        $group = Yii::app()->group->getGroup($group_id);

        $dataArray = [
            'groupName' => $group['groupName'],
            'groupDirection' => $group['groupDirection'],
            'studentList' => $studentList
            ];
        $this->renderPartial('studentScore', $dataArray);
    }
}
