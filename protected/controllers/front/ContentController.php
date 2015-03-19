<?php

class ContentController extends Controller {

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
                'actions' => array('new', 'create', 'update', 'admin', 'delete'),
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
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        Yii::app()->clientScript->registerMetaTag($this->getMetaTagDesc($id), 'description');
        Yii::app()->clientScript->registerMetaTag($this->getMetaTagKey($id), 'keywords');

        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function getMetaTagDesc($id) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('metadesc')
                ->from('{{content}}')
                ->where('id=:id', array(':id' => $id))
                ->queryScalar();

        return $returnValue;
    }

    public function getMetaTagKey($id) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('metakey')
                ->from('{{content}}')
                ->where('id=:id', array(':id' => $id))
                ->queryScalar();

        return $returnValue;
    }

    public function actionNew() {
        $model = new Content;

        if (isset($_POST['Content'])) {
            $model->attributes = $_POST['Content'];
            $model->created = new CDbExpression('NOW()');
            $model->created_by = Yii::app()->user->id;
            $model->state = 0;
            //$model->district = District::getDistrictBYUserid(Yii::app()->user->id);
            //$model->thana = Thana::getThanaBYUserid(Yii::app()->user->id);
            if (empty($model->alias)) {
                $model->alias = str_replace(' ', '-', strtolower($model->title));
            } else {
                $model->alias = str_replace(' ', '-', strtolower($model->alias));
            }

            if ($model->save()) {
                Yii::app()->user->setFlash('info', 'Problem & Possibility has been created and waiting for approval. ');
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('new', array(
            'model' => $model,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Content;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Content'])) {
            $model->attributes = $_POST['Content'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Content'])) {
            $model->attributes = $_POST['Content'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex($id) {
        $criteria = new CDbCriteria(array(
            'order' => 'created DESC, id DESC',
            'condition' => 'catid=' . $id . ' AND state = 1',
        ));
        $dataProvider = new CActiveDataProvider('Content', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 20,
            ),
        ));

        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Content('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Content']))
            $model->attributes = $_GET['Content'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Content::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'content-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionDynamicthana() {
        $data = Thana::model()->findAll('district_id= ' . (int) $_POST['Content']['district'] . ' AND published=1');
        $data = CHtml::listData($data, 'id', 'title');
        foreach ($data as $id => $value) {
            echo CHtml::tag('option', array('value' => $id), CHtml::encode($value), true);
        }
    }

}
