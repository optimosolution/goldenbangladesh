<?php

/**
 * This is the model class for table "{{eminent_people}}".
 *
 * The followings are the available columns in table '{{eminent_people}}':
 * @property string $id
 * @property string $full_name
 * @property string $address
 * @property string $phone
 * @property string $mobile
 * @property string $email
 * @property string $website
 * @property integer $eminent_type
 * @property string $life_style
 * @property string $rationale
 * @property integer $uploader_id
 * @property string $profile_picture
 * @property integer $published
 */
class EminentPeople extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return EminentPeople the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{eminent_people}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('full_name,district', 'required'),
            array('eminent_type, uploader_id', 'numerical', 'integerOnly' => true),
            array('address', 'length', 'max' => 255),
            array('phone, mobile, email', 'length', 'max' => 100),
            array('website', 'length', 'max' => 150),
            array('thana,life_style, rationale,profile_picture,published', 'safe'),
            array('profile_picture', 'file', 'types' => 'jpg, jpeg, gif, png', 'allowEmpty' => true, 'minSize' => 2, 'maxSize' => 1024 * 1024 * 5, 'tooLarge' => 'The file was larger than 500KB. Please upload a smaller file.', 'wrongType' => 'File format was not supported.', 'tooSmall' => 'File size was too small or empty.'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, full_name, address, phone, mobile, email, website, eminent_type, life_style, rationale, uploader_id,published', 'safe', 'on' => 'search'),
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
            'full_name' => 'Name',
            'district' => 'District',
            'thana' => 'Thana',
            'address' => 'Address',
            'phone' => 'Phone',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'website' => 'Website',
            'eminent_type' => 'Eminent Type',
            'life_style' => 'Life Style',
            'rationale' => 'Rationale',
            'uploader_id' => 'Uploader',
            'profile_picture' => 'Picture',
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
        $criteria->alias = 't';
        //$criteria->condition = 't.published=1';

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.full_name', $this->full_name, true);
        $criteria->compare('t.address', $this->address, true);
        $criteria->compare('t.phone', $this->phone, true);
        $criteria->compare('t.mobile', $this->mobile, true);
        $criteria->compare('t.email', $this->email, true);
        $criteria->compare('t.website', $this->website, true);
        $criteria->compare('t.eminent_type', $this->eminent_type);
        $criteria->compare('t.life_style', $this->life_style, true);
        $criteria->compare('t.rationale', $this->rationale, true);
        $criteria->compare('t.uploader_id', $this->uploader_id);
        $criteria->compare('t.published', $this->published);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 20,
            ),
            'sort' => array('defaultOrder' => 't.full_name ASC')
        ));
    }

    public function search_index() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        $criteria->alias = 't';
        if (Yii::app()->SESSION['district'] == 0) {
            $criteria->condition = 't.published=1';
        } else {
            $criteria->condition = 't.published=1 AND t.district=' . Yii::app()->SESSION['district'];
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.full_name', $this->full_name, true);
        $criteria->compare('t.district', $this->district);
        $criteria->compare('t.thana', $this->thana);
        $criteria->compare('t.address', $this->address, true);
        $criteria->compare('t.phone', $this->phone, true);
        $criteria->compare('t.mobile', $this->mobile, true);
        $criteria->compare('t.email', $this->email, true);
        $criteria->compare('t.website', $this->website, true);
        $criteria->compare('t.eminent_type', $this->eminent_type);
        $criteria->compare('t.life_style', $this->life_style, true);
        $criteria->compare('t.rationale', $this->rationale, true);
        $criteria->compare('t.uploader_id', $this->uploader_id);
        $criteria->compare('t.published', $this->published);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 20,
            ),
            'sort' => array('defaultOrder' => 't.full_name ASC')
        ));
    }

}