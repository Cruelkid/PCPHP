<?php
/** @var CController $this */
$cache = Yii::app()->cache;
$tabParameters = [
    'groupId' => $cache['groupId'],
    'groupName' => $cache['groupName'],
    'groupLocationId' => $cache['groupLocationId'],
    'groupLocationName' => $cache['groupLocationName'],
    'groupDirectionId' => $cache['groupDirectionId'],
    'groupDirectionName' => $cache['groupDirectionName'],
    'groupStartDate' => $cache['groupStartDate'],
    'groupFinishDate' => $cache['groupFinishDate'],
    'groupBudger' => $cache['groupBudger'],
    'groupExperts' => $cache['groupExperts'],
    'groupTeachers' => $cache['groupTeachers'],
];


$this->renderPartial("//site/groupArea/{$tabViewer}", $tabParameters);
