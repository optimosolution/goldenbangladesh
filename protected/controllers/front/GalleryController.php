<?php

class GalleryController extends Controller {

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
                'actions' => array('index', 'category', 'dynamicthana'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('new'),
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
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionNew() {
        $model = new Gallery;

        $path = Yii::app()->basePath . '/../uploads/gallery';
        if (!is_dir($path)) {
            mkdir($path);
        }

        if (isset($_POST['Gallery'])) {
            $model->attributes = $_POST['Gallery'];

            $model->created_on = new CDbExpression('NOW()');
            $model->created_by = Yii::app()->user->id;
            $model->published = 0;
            //$model->district = District::getDistrictBYUserid(Yii::app()->user->id);
            //$model->thana = Thana::getThanaBYUserid(Yii::app()->user->id);
            if ($model->validate()) {
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
                    Yii::app()->user->setFlash('info', 'New picture has been uploaded and waiting for approval. ');
                    $this->redirect(array('category',));
                }
            }
        }

        $this->render('new', array(
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

        if (isset($_POST['Gallery'])) {
            $model->attributes = $_POST['Gallery'];
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
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
    public function actionIndex($id) {
        if (Yii::app()->SESSION['district'] == 0) {
            $criteria = new CDbCriteria(array(
                'order' => 'created_on DESC, id DESC',
                'condition' => 'category_id=' . $id . ' AND published = 1',
            ));
        } else {
            $criteria = new CDbCriteria(array(
                'order' => 'created_on DESC, id DESC',
                'condition' => 'category_id=' . $id . ' AND published = 1 AND district=' . Yii::app()->SESSION['district'],
            ));
        }
        $dataProvider = new CActiveDataProvider('Gallery', array(
            'criteria' => $criteria,
        ));

        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionCategory() {
        $this->render('category');
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
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
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