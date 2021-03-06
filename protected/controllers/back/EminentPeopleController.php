<?php

class EminentPeopleController extends BackEndController {

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
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('admin', 'delete', 'create', 'update', 'dynamicthana'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'create', 'update', 'dynamicthana'),
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
        $model = new EminentPeople;

        $path = Yii::app()->basePath . '/../uploads/eminent_people';
        if (!is_dir($path)) {
            mkdir($path);
        }

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['EminentPeople'])) {
            $model->attributes = $_POST['EminentPeople'];
            if ($model->validate()) {
                //Picture upload script
                if (@!empty($_FILES['EminentPeople']['name']['profile_picture'])) {
                    $model->profile_picture = $_POST['EminentPeople']['profile_picture'];

                    if ($model->validate(array('profile_picture'))) {
                        $model->profile_picture = CUploadedFile::getInstance($model, 'profile_picture');
                    } else {
                        $model->profile_picture = '';
                    }
                    $model->profile_picture->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->profile_picture)));
                    $model->profile_picture = time() . '_' . str_replace(' ', '_', strtolower($model->profile_picture));
                }
                if ($model->save()) {
                    Yii::app()->user->setFlash('success', 'Eminent People has been created successfully');
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

        $previuosFileName = $model->profile_picture;
        $path = Yii::app()->basePath . '/../uploads/eminent_people';
        if (!is_dir($path)) {
            mkdir($path);
        }

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['EminentPeople'])) {
            $model->attributes = $_POST['EminentPeople'];
            if ($model->validate()) {
                //Picture upload script
                if (@!empty($_FILES['EminentPeople']['name']['profile_picture'])) {
                    $model->profile_picture = $_POST['EminentPeople']['profile_picture'];

                    if ($model->validate(array('profile_picture'))) {
                        $myFile = $path . '/' . $previuosFileName;
                        //if (!empty($previuosFileName)) {
                        //if (!file_exists($myFile)) {
                        //unlink($myFile);
                        //}
                        $model->profile_picture = CUploadedFile::getInstance($model, 'profile_picture');
                    } else {
                        $model->profile_picture = '';
                    }
                    $model->profile_picture->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->profile_picture)));
                    $model->profile_picture = time() . '_' . str_replace(' ', '_', strtolower($model->profile_picture));
                } else {
                    $model->profile_picture = $previuosFileName;
                }
                if ($model->save()) {
                    Yii::app()->user->setFlash('success', 'Eminent People has been updated successfully');
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
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('EminentPeople');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new EminentPeople('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['EminentPeople'])) {
            $model->attributes = $_GET['EminentPeople'];
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return EminentPeople the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = EminentPeople::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param EminentPeople $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'eminent-people-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionDynamicthana() {
        $data = Thana::model()->findAll('district_id= ' . (int) $_POST['EminentPeople']['district'] . ' AND published=1');
        $data = CHtml::listData($data, 'id', 'title');
        foreach ($data as $id => $value) {
            echo CHtml::tag('option', array('value' => $id), CHtml::encode($value), true);
        }
    }

}