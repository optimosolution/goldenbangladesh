<?php

/**
 * This is the model class for table "{{directory_category}}".
 *
 * The followings are the available columns in table '{{directory_category}}':
 * @property string $id
 * @property integer $parent
 * @property string $title
 * @property string $details
 * @property integer $created_by
 * @property string $created_on
 * @property integer $published
 */
class DirectoryCategory extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return DirectoryCategory the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{directory_category}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, created_on', 'required'),
            array('parent, created_by, published', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 250),
            array('details', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, parent, title, details, created_by, created_on, published', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'parent' => 'Parent',
            'title' => 'Title',
            'details' => 'Details',
            'created_by' => 'Created By',
            'created_on' => 'Created On',
            'published' => 'Published',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('parent', $this->parent);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('details', $this->details, true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('created_on', $this->created_on, true);
        $criteria->compare('published', $this->published);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 50,
            ),
        ));
    }

    public static function getCategory() {
        $return = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{directory_category}}')
                ->where('published=1 AND (parent=0 OR  parent IS NULL)')
                ->order('title')
                ->queryAll();
        echo '<select id="DirectoryCategory_parent" name="DirectoryCategory[parent]" class="span5">';
        echo '<option value="">--select--</option>';
        foreach ($return as $key => $values) {
            echo '<option value="' . $values["id"] . '">' . $values["title"] . '</option>';
            $returns = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('{{directory_category}}')
                    ->where('published=1 AND parent=' . $values["id"])
                    ->order('title')
                    ->queryAll();
            foreach ($returns as $key => $valuess) {
                echo '<option value="' . $valuess["id"] . '">--' . $valuess["title"] . '</option>';
                $returns3 = Yii::app()->db->createCommand()
                        ->select('*')
                        ->from('{{directory_category}}')
                        ->where('published=1 AND parent=' . $valuess["id"])
                        ->order('title')
                        ->queryAll();
                foreach ($returns3 as $key => $valuess3) {
                    echo '<option value="' . $valuess3["id"] . '">---' . $valuess3["title"] . '</option>';
                }
            }
        }
        echo '</select>';
    }

    public static function getCategoryUpdate($catid) {
        $return = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{directory_category}}')
                ->where('published=1 AND (parent=0 OR  parent IS NULL)')
                ->order('title')
                ->queryAll();
        echo '<select id="DirectoryCategory_parent" name="DirectoryCategory[parent]" class="span5">';
        echo '<option value="">--select--</option>';
        foreach ($return as $key => $values) {
            if ($catid == $values["id"]) {
                echo '<option selected="selected" value="' . $values["id"] . '">' . $values["title"] . '</option>';
            } else {
                echo '<option value="' . $values["id"] . '">' . $values["title"] . '</option>';
            }
            $returns = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('{{directory_category}}')
                    ->where('published=1 AND parent=' . $values["id"])
                    ->order('title')
                    ->queryAll();
            foreach ($returns as $key => $valuess) {
                if ($catid == $valuess["id"]) {
                    echo '<option selected="selected" value="' . $valuess["id"] . '">--' . $valuess["title"] . '</option>';
                } else {
                    echo '<option value="' . $valuess["id"] . '">--' . $valuess["title"] . '</option>';
                }
                $returns3 = Yii::app()->db->createCommand()
                        ->select('*')
                        ->from('{{directory_category}}')
                        ->where('published=1 AND parent=' . $valuess["id"])
                        ->order('title')
                        ->queryAll();
                foreach ($returns3 as $key => $valuess3) {
                    if ($catid == $valuess3["id"]) {
                        echo '<option selected="selected" value="' . $valuess3["id"] . '">---' . $valuess3["title"] . '</option>';
                    } else {
                        echo '<option value="' . $valuess3["id"] . '">---' . $valuess3["title"] . '</option>';
                    }
                }
            }
        }
        echo '</select>';
    }

    public static function getDirectoryCategory($id) {
        $value = DirectoryCategory::model()->findByAttributes(array('id' => $id));
        if (empty($value->title)) {
            return 'Root';
        } else {
            return $value->title;
        }
    }

}