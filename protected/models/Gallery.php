<?php

/**
 * This is the model class for table "{{gallery}}".
 *
 * The followings are the available columns in table '{{gallery}}':
 * @property string $id
 * @property integer $district
 * @property integer $thana
 * @property integer $category_id
 * @property string $picture
 * @property string $caption
 * @property string $details
 * @property string $created_on
 * @property integer $created_by
 * @property integer $hits
 * @property integer $published
 */
class Gallery extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Gallery the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{gallery}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('district,category_id,published', 'required'),
            array('district, thana, category_id, created_by, hits, published', 'numerical', 'integerOnly' => true),
            array('caption', 'length', 'max' => 100),
            array('details', 'length', 'max' => 250),
            array('picture', 'file', 'types' => 'jpg,jpeg,gif,png', 'allowEmpty' => true, 'minSize' => 2, 'maxSize' => 1024 * 1024 * 5, 'tooLarge' => 'The file was larger than 5MB. Please upload a smaller file.', 'wrongType' => 'File format was not supported.', 'tooSmall' => 'File size was too small or empty.'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('created_on,picture', 'safe'),
            array('id, district, thana, category_id, caption, details, created_on, created_by, hits, published', 'safe', 'on' => 'search'),
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
            'district' => 'District',
            'thana' => 'Thana',
            'category_id' => 'Category',
            'picture' => 'Picture',
            'caption' => 'Caption',
            'details' => 'Details',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'hits' => 'Hits',
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
        $criteria->compare('district', $this->district);
        $criteria->compare('thana', $this->thana);
        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('picture', $this->picture, true);
        $criteria->compare('caption', $this->caption, true);
        $criteria->compare('details', $this->details, true);
        $criteria->compare('created_on', $this->created_on, true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('hits', $this->hits);
        $criteria->compare('published', $this->published);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 50,
            ),
        ));
    }

    public static function getCategoryName($id) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('title')
                ->from('{{gallery_category}}')
                ->where('id=:id', array(':id' => $id))
                ->queryScalar();
        if ($returnValue <= '0') {
            $returnValue = 'No parent!';
        } else {
            $returnValue = $returnValue;
        }
        return $returnValue;
    }

}