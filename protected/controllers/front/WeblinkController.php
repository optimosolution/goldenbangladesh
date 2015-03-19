<?php

class WeblinkController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'dynamicthana'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('new', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $model = new Weblink('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Weblink']))
            $model->attributes = $_GET['Weblink'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

    public function actionNew() {
        $model = new Weblink;

        if (isset($_POST['Weblink'])) {
            $model->attributes = $_POST['Weblink'];
            $model->created_on = new CDbExpression('NOW()');
            $model->created_by = Yii::app()->user->id;
            $model->published = 0;
            //$model->district = District::getDistrictBYUserid(Yii::app()->user->id);
            //$model->thana = Thana::getThanaBYUserid(Yii::app()->user->id);
            if ($model->save()) {
                Yii::app()->user->setFlash('info', 'Weblink has been created and waiting for approval. ');
                $this->redirect(array('index'));
            }
        }

        $this->render('new', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Weblink::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'weblink-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionDynamicthana() {
        $data = Thana::model()->findAll('district_id= ' . (int) $_POST['Weblink']['district'] . ' AND published=1');
        $data = CHtml::listData($data, 'id', 'title');
        foreach ($data as $id => $value) {
            echo CHtml::tag('option', array('value' => $id), CHtml::encode($value), true);
        }
    }

}
