<?php

class BackEndController extends CController {

    public $userData;
    public $layout = 'application.views.layouts.main';
    public $menu = array();
    public $breadcrumbs = array();

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'users' => array('*'),
                'actions' => array('login'),
            ),
            array('allow',
                'users' => array('@'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function init() {
        /*
          //if you want to use reflection
          $reflection = new ReflectionClass('scholarshipController');
          $methods = $reflection->getMethods();
          //uncomment this if you want to get the class methods with more details
          print "<pre>";
          print_r($methods);
          print "</pre>";
          //uncomment this if you want to get the class methods
          //print_r(get_class_methods($class));

         */
    }

    public function checkAccess($controller, $action) {
        $val = Yii::app()->db->createCommand()
                ->select('access')
                ->from('{{acl}}')
                ->where('LOWER(controller)="' . $controller . '" AND LOWER(actions)="' . $action . '" AND group_id=' . Yii::app()->user->group)
                ->queryScalar();
        if (empty($val)) {
            $val = 1;
        } else {
            $val = $val;
        }
        return $val;
    }

    /**
     * get user full name from user id
     * @return type integer value
     */
    public function getUserNameByID($id) {
        $name = Yii::app()->db->createCommand()
                ->select('name')
                ->from('{{user_admin}} u')
                ->where('u.id=:id', array(':id' => $id))
                ->queryScalar();
        return $name;
    }

    /**
     * get user full name from session
     * @return type integer value
     */
    public function getUserName() {
        $name = Yii::app()->db->createCommand()
                ->select('name')
                ->from('{{user_admin}} u')
                ->where('u.id=:id', array(':id' => Yii::app()->user->id))
                ->queryScalar();
        return $name;
    }

}