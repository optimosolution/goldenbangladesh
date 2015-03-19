<?php

class GalleryController extends BackEndController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    
    protected function beforeAction($action) {
        $access = $this->checkAccess(Yii::app()->controller->id, Yii::app()->controller->action->id);
        if ($access == 1) {
            return true;
        } else {
            Yii::app()->user->setFlash('error', "You are not authorized to perform this action!");
            $this->redirect(array('/site/noaccess'));
        }
    }

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
                'actions' => array('index', 'view', 'dynamicthana'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'admin', 'delete'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('create', 'update', 'admin', 'delete'),
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
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Gallery;

        $path = Yii::app()->basePath . '/../uploads/gallery';
        if (!is_dir($path)) {
            mkdir($path);
        }

        if (isset($_POST['Gallery'])) {
            $model->attributes = $_POST['Gallery'];
            if ($model->validate()) {
                $model->created_on = new CDbExpression('NOW()');
                $model->created_by = Yii::app()->user->id;
                //Picture upload script
                if (@!empty($_FILES['Gallery']['name']['picture'])) {
                    $model->picture = $_POST['Gallery']['picture'];

                    if ($model->validate(array('picture'))) {
                        $model->picture = CUploadedFile::getInstance($model, 'picture');
                    } else {
                        $model->picture = '';
                    }
                    $model->picture->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->picture)));
                    $model->picture = time() . '_' . str_replace(' ', '_', strtolower($model->picture));
                }
                if ($model->save()) {
                    Yii::app()->user->setFlash('success', 'Saved successfully');
                    $this->redirect(array('view', 'id' => $model->id));
                }
            }
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

        $previuosFileName = $model->picture;
        $path = Yii::app()->basePath . '/../uploads/gallery';
        if (!is_dir($path)) {
            mkdir($path);
        }

        if (isset($_POST['Gallery'])) {
            $model->attributes = $_POST['Gallery'];
            if ($model->validate()) {
                //Picture upload script
                if (@!empty($_FILES['Gallery']['name']['picture'])) {
                    $model->picture = $_POST['Gallery']['picture'];

                    if ($model->validate(array('picture'))) {
                        $myFile = $path . '/' . $previuosFileName;
                        if (file_exists($myFile)) {
                            unlink($myFile);
                        }
                        $model->picture = CUploadedFile::getInstance($model, 'picture');
                    } else {
                        $model->picture = '';
                    }
                    $model->picture->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->picture)));
                    $model->picture = time() . '_' . str_replace(' ', '_', strtolower($model->picture));
                } else {
                    $model->picture = $previuosFileName;
                }
                if ($model->save()) {
                    Yii::app()->user->setFlash('success', 'Saved successfully');
                    $this->redirect(array('view', 'id' => $model->id));
                }
            }
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
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Gallery');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Gallery('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Gallery']))
            $model->attributes = $_GET['Gallery'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Gallery the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Gallery::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Gallery $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'gallery-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionDynamicthana() {
        $data = Thana::model()->findAll('district_id= ' . (int) $_POST['Gallery']['district'] . ' AND published=1');
        $data = CHtml::listData($data, 'id', 'title');
        foreach ($data as $id => $value) {
            echo CHtml::tag('option', array('value' => $id), CHtml::encode($value), true);
        }
    }

}
