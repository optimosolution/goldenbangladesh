<?php

/**
 * This is the model class for table "{{youtube}}".
 *
 * The followings are the available columns in table '{{youtube}}':
 * @property string $id
 * @property string $youtube_id
 * @property integer $published
 */
class Youtube extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Youtube the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{youtube}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('youtube_id, district, published,featured', 'required'),
            array('published', 'numerical', 'integerOnly' => true),
            array('youtube_id', 'length', 'max' => 100),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('thana,created_on,created_by', 'safe'),
            array('id, youtube_id, published,district,thana,featured', 'safe', 'on' => 'search'),
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
            'youtube_id' => 'Youtube ID',
            'published' => 'Published',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'district' => 'District',
            'thana' => 'Thana',
            'featured' => 'Featured',
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
        $criteria->compare('youtube_id', $this->youtube_id, true);
        $criteria->compare('published', $this->published);
        $criteria->compare('created_on', $this->created_on);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('district', $this->district);
        $criteria->compare('thana', $this->thana);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}