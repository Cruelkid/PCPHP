<?php

class GroupComponent extends CApplicationComponent
{
    public function getList($locationNames)
    {
        $locationsIdList = $this->checkLocations($locationNames);

        $criteria = new CDbCriteria();
        $criteria->alias = 'group';
        $criteria->addInCondition('location_id', $locationsIdList);
        /** @var Group[] $rows */
        $rows = Group::model()->with('direction')->findAll($criteria);

        $result = [];
        $groupList = [];
        $locationNameList = [];
        if (empty($rows)) {
            return $result;
        }
        foreach ($rows as $row) {
            $groupList[] = [
                'group_id' => $row->id,
                'group_name' => $row->name,
                'group_location' => $row->getRelated('location')->full_name,
                'direction_name' => $row->getRelated('direction')->name,
                'start_date' => $row->start_date,
                'budget' => $row->budget,
                'direction_id' => $row->getRelated('direction')->id,
                'group_location_id' => $row->getRelated('location')->id,
                'finish_date' => $row->finish_date,
            ];
            $locationName = $row->getRelated('location')->full_name;
            if (array_search($locationName, $locationNameList, true) === false) {
                $locationNameList[] = $locationName;
            }
        }
        $result = [$groupList, $locationNameList];

        return $result;
    }

    public function checkLocations($locationNames)
    {
        if ($locationNames === Yii::app()->user->location || $locationNames === '') {
            $locations = [Yii::app()->user->location];
        } else {
            $locationNames = json_encode($locationNames);
            $locations = $this->getLocationsId($locationNames);
        }
        return empty($locations) ? [] : $locations;
    }

    public function getLocationsId($locationNames)
    {
        $locationIdList = [];
        $locationNames = explode(',', $locationNames);

        $criteria = new CDbCriteria();
        $criteria->select = 'id, full_name';
        $locationList = Locations::model()->findAll($criteria);

        foreach ($locationNames as $locationName) {
            $locationName = preg_replace('/[^A-Za-z0-9\-]/', '', $locationName);
            foreach ($locationList as $location) {
                if ($locationName === $location->full_name) {
                    $locationIdList[] = $location->id;
                }
            }
        }

        return $locationIdList;
    }

    public function getMyList()
    {
        $userId = Yii::app()->user->id;

        $criteria = new CDbCriteria();
        $criteria->alias = 'user_group';
        $criteria->condition = "$userId = {$criteria->alias}.user_id";
        /** @var UserGroup[] $rows */
        $rows = UserGroup::model()->with('group')->findAll($criteria);

        $result = [];
        if (empty($rows)) {
            return $result;
        }
        foreach ($rows as $row) {
            $result[] = [
                'group_id' => $row->getRelated('group')->id,
                'group_name' => $row->getRelated('group')->name,
                'group_location' => $row->getRelated('group')->getRelated('location')->full_name,
                'direction_name' => $row->getRelated('group')->getRelated('direction')->name,
                'start_date' => $row->getRelated('group')->start_date,
                'budget' => $row->getRelated('group')->budget,
                'direction_id' => $row->getRelated('group')->getRelated('direction')->id,
                'group_location_id' => $row->getRelated('group')->getRelated('location')->id,
                'finish_date' => $row->getRelated('group')->finish_date,
            ];
        }

        return $result;
    }

    public function createGroup()
    {
        $requestBody = file_get_contents('php://input');

        if (empty($requestBody)) {
            throw new CHttpException(400, 'Invalid data');
        }
        $data = json_decode($requestBody, true);

        $group = new Group();
        $group->setAttribute('name', $data['name']);
        $group->setAttribute('location_id', $data['location_id']);
        $group->setAttribute('direction_id', $data['direction_id']);
        $group->setAttribute('start_date', $data['start_date']);
        $group->setAttribute('finish_date', $data['finish_date']);
        $group->setAttribute('budget', $data['budget']);

        if (!$group->validate()) {
            throw new CHttpException(400, 'Invalid data');
        }
        $group->save();
        $groupId = $group->id;

        $groupTeachers = $data['teachers'];
        foreach ($groupTeachers as $value) {
            $teacher = new Teacher();
            $teacher->setAttribute('group_id', $groupId);
            $teacher->setAttribute('user_id', $value);
            $teacher->save();
        }

        $experts = $data['experts'];
        if (!empty($experts)) {
            foreach ($experts as $person) {
                $expert = new Expert();
                $expert->group_id = $groupId;
                $expert->name = $person;
                $expert->save();
            }
        }
    }

    public function deleteGroup($id)
    {
        $groupId = $id;

        if (!$groupId) {
            throw new CHttpException(400, 'Invalid data');
        }

        $group = new Group();
        $group->findByPk($groupId)->delete();
    }

    public function editGroup()
    {
        $requestBody = file_get_contents('php://input');

        if (empty($requestBody)) {
            throw new CHttpException(400, 'Invalid data');
        }
        $data = json_decode($requestBody, true);

        $idGroup = $data['id'];
        $model = new Group();
        $group = $model->findByPk($idGroup);

        $group->setAttribute('name', $data['name']);
        $group->setAttribute('location_id', $data['location_id']);
        $group->setAttribute('direction_id', $data['direction_id']);
        $group->setAttribute('start_date', $data['start_date']);
        $group->setAttribute('finish_date', $data['finish_date']);
        $group->setAttribute('budget', $data['budget']);

        if (!$group->validate()) {
            throw new CHttpException(400, 'Invalid data');
        }
        $group->update();

        $criteria = new CDbCriteria();
        $criteria->alias = 'user_group';
        $criteria->condition = "$idGroup = {$criteria->alias}.group_id";
        $rows = UserGroup::model()->with('group')->findAll($criteria);
        foreach ($rows as $row) {
            $row->delete();
        }

        $groupTeachers = $data['teachers'];
        foreach ($groupTeachers as $value) {
            $teacher = new Teacher();
            $teacher->setAttribute('group_id', $idGroup);
            $teacher->setAttribute('user_id', $value);
            $teacher->save();
        }

        $criteria = new CDbCriteria();
        $criteria->alias = 'group_experts';
        $criteria->condition = "$idGroup = {$criteria->alias}.group_id";
        $rows = Expert::model()->findAll($criteria);
        foreach ($rows as $row) {
            $row->delete();
        }

        $experts = $data['experts'];
        if (!empty($experts)) {
            foreach ($experts as $person) {
                $expert = new Expert();
                $expert->group_id = $idGroup;
                $expert->name = $person;
                $expert->save();
            }
        }
    }

    public function cacheSelectedGroup($selectedgroup)
    {
        $selectedGroup = explode(',', $selectedgroup);
        $cache = Yii::app()->cache;
        $cache['groupId'] = $selectedGroup[0];
        $cache['groupName'] = $selectedGroup[1];
        $cache['groupLocationId'] = $selectedGroup[2];
        $cache['groupLocationName'] = $selectedGroup[3];
        $cache['groupDirectionId'] = $selectedGroup[4];
        $cache['groupDirectionName'] = $selectedGroup[5];
        $cache['groupStartDate'] = $selectedGroup[6];
        $cache['groupFinishDate'] = $selectedGroup[7];
        $cache['groupBudget'] = $selectedGroup[8];
        $experts = $this->getExperts($selectedGroup[0]);

        if (!empty($experts)) {
            $experts = implode(', ', $experts);
        } else {
            $experts = '';
        }
        $cache['groupExperts'] = $experts;

        $teachers = $this->getTeachers($selectedGroup[0]);
        foreach ($teachers as $teacher) {
            $groupTeachers[] = $teacher['teacher_first_name'] . " " . $teacher['teacher_last_name'];
        }

        if (!empty($groupTeachers)) {
            $groupTeachers = implode(', ', $groupTeachers);
        } else {
            $groupTeachers = '';
        }
        $cache['groupTeachers'] = $groupTeachers;

        return ['groupCached' => true];
    }

    public function getExperts($groupId)
    {
        $criteria = new CDbCriteria();
        $criteria->alias = 'expert';
        $criteria->condition = "{$criteria->alias}.group_id = $groupId";
        $rows = Expert::model()->findAll($criteria);

        $experts = [];
        if (empty($rows)) {
            return $experts;
        }
        foreach ($rows as $row) {
            $experts[] = $row->name;
        }
        return $experts;
    }

    public function getTeachers($groupId)
    {
        $criteria1 = new CDbCriteria();
        $criteria1->alias = 'user_group';
        $criteria1->condition = "{$criteria1->alias}.group_id = $groupId";
        $rows1 = UserGroup::model()->findAll($criteria1);

        $groupUsers = [];
        if (empty($rows1)) {
            return $rows1;
        }

        foreach ($rows1 as $row) {
            $groupUsers[] = $row->user_id;
        }

        $criteria2 = new CDbCriteria();
        $criteria2->alias = 'user_role';
        $criteria2->addInCondition("{$criteria2->alias}.user_id", $groupUsers);
        $criteria2->addCondition("roles.name = 'teacher'", "AND");
        $rows2 = UserRole::model()->with('roles')->with('users')->findAll($criteria2);

        $teachers = [];
        if (empty($rows2)) {
            return $rows2;
        }
        foreach ($rows2 as $row2) {
            $teachers[] = [
                'teacher_first_name' => $row2->getRelated('users')->first_name,
                'teacher_last_name' => $row2->getRelated('users')->last_name,
            ];
        }
        return $teachers;
    }
}
