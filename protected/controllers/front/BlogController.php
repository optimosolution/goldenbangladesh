<?php

class BlogController extends Controller {

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
            'postOnly + delete', // we only allow deletion via POST request
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
                'actions' => array('index', 'view', 'category'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('new', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array(''),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        Yii::app()->db->createCommand('UPDATE {{blog}} SET hits = hits+1 WHERE id=' . $id)->execute();
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionNew() {
        $model = new Blog;

        if (isset($_POST['Blog'])) {
            $model->attributes = $_POST['Blog'];
            $model->created = new CDbExpression('NOW()');
            $model->created_by = Yii::app()->user->id;
            $model->state = 0;
            $model->district = District::getDistrictBYUserid(Yii::app()->user->id);
            $model->thana = Thana::getThanaBYUserid(Yii::app()->user->id);
            if (empty($model->alias)) {
                $model->alias = str_replace(' ', '-', strtolower($model->title));
            } else {
                $model->alias = str_replace(' ', '-', strtolower($model->alias));
            }

            if ($model->save()) {
                Yii::app()->user->setFlash('info', 'Blog has been created and waiting for approval. ');
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('new', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id) {

        $model = $this->loadModel($id);

        if (isset($_POST['Blog'])) {
            $model->attributes = $_POST['Blog'];
            $model->modified = new CDbExpression('NOW()');
            $model->modified_by = Yii::app()->user->id;
            if (empty($model->alias)) {
                $model->alias = str_replace(' ', '-', strtolower($model->title));
            } else {
                $model->alias = str_replace(' ', '-', strtolower($model->alias));
            }
            if ($model->save()) {
                Yii::app()->user->setFlash('info', 'Blog has been updated. ');
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        if (Yii::app()->SESSION['district'] == 0) {
            $criteria = new CDbCriteria(array(
                'order' => 'created DESC, id DESC',
                'condition' => 'state = 1',
            ));
        } else {
            $criteria = new CDbCriteria(array(
                'order' => 'created DESC, id DESC',
                'condition' => 'state = 1 AND district=' . Yii::app()->SESSION['district'],
            ));
        }
        $dataProvider = new CActiveDataProvider('Blog', array(
            'criteria' => $criteria,
        ));

        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Lists all models.
     */
    public function actionCategory($id) {
        if (Yii::app()->SESSION['district'] == 0) {
            $criteria = new CDbCriteria(array(
                'order' => 'created DESC, id DESC',
                'condition' => 'catid=' . $id . ' AND state = 1',
            ));
        } else {
            $criteria = new CDbCriteria(array(
                'order' => 'created DESC, id DESC',
                'condition' => 'catid=' . $id . ' AND state = 1 AND district=' . Yii::app()->SESSION['district'],
            ));
        }
        $dataProvider = new CActiveDataProvider('Blog', array(
            'criteria' => $criteria,
        ));

        $this->render('category', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Blog the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Blog::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Blog $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'blog-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}