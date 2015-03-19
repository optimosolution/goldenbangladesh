<?php

/**
 * This is the model class for table "{{user_profile}}".
 *
 * The followings are the available columns in table '{{user_profile}}':
 * @property integer $id
 * @property integer $user_id
 * @property string $profile_picture
 * @property integer $country_id
 * @property integer $state_id
 * @property integer $city_id
 * @property integer $district_id
 * @property integer $thana_id
 * @property string $address
 * @property string $mobile
 * @property string $phone
 * @property string $fax
 * @property string $website
 * @property string $expiry
 * @property string $birth_date
 * @property string $fathers_name
 * @property string $mothers_name
 * @property integer $blood_group
 * @property integer $gender
 * @property string $spouse_name
 * @property integer $relegion
 * @property string $permanent_address
 * @property integer $profession
 * @property string $designation
 * @property string $organization
 * @property string $office_address
 * @property string $highest_degree
 * @property string $field_of_activity
 * @property string $past_work_details
 * @property string $awards
 * @property string $social_activities
 * @property string $family_details
 * @property string $country_visited
 * @property string $memorable_events
 * @property string $hobby
 * @property string $interest
 * @property string $career_objective
 * @property string $computer_skill
 * @property string $training
 * @property string $other_activities
 * @property string $job_experience
 * @property integer $present_salary
 * @property integer $expected_salary
 * @property string $looking_for
 * @property string $available_for
 * @property string $previous_activities
 * @property string $present_plan
 * @property integer $user_type
 * @property integer $hear_about_us
 * @property integer $reference_id
 */
class UserProfile extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return UserProfile the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{user_profile}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, district_id, thana_id', 'required', 'on' => 'insert'),
            array('user_id', 'unique'),
            array('user_id, country_id, state_id, city_id, district_id, thana_id, blood_group, gender, relegion, profession, present_salary, expected_salary, user_type', 'numerical', 'integerOnly' => true),
            array('profile_picture, address', 'length', 'max' => 255),
            array('mobile, phone, fax, fathers_name, mothers_name, spouse_name, designation, organization, looking_for, available_for', 'length', 'max' => 100),
            array('website,u_degree,u_institute,u_subject,c_degree,c_institute,c_subject,s_degree,s_institute,s_subject', 'length', 'max' => 150),
            array('u_passing_year,c_passing_year,s_passing_year', 'length', 'max' => 20),
            array('highest_degree, field_of_activity, country_visited, memorable_events, hobby, interest', 'length', 'max' => 250),
            array('expiry, birth_date, permanent_address, office_address, past_work_details, awards, social_activities, family_details, career_objective, computer_skill, training, other_activities, job_experience, previous_activities, present_plan, hear_about_us, reference_id', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, user_id, profile_picture, country_id, state_id, city_id, district_id, thana_id, address, mobile, phone, fax, website, expiry, birth_date, fathers_name, mothers_name, blood_group, gender, spouse_name, relegion, permanent_address, profession, designation, organization, office_address, highest_degree, field_of_activity, past_work_details, awards, social_activities, family_details, country_visited, memorable_events, hobby, interest, u_degree,u_institute,u_subject,u_passing_year,c_degree,c_institute,c_subject,c_passing_year,s_degree,s_institute,s_subject,s_passing_year, career_objective, computer_skill, training, other_activities, job_experience, present_salary, expected_salary, looking_for, available_for, previous_activities, present_plan, user_type', 'safe', 'on' => 'search'),
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
            'user_id' => 'User',
            'profile_picture' => 'Profile Picture',
            'country_id' => 'Country',
            'state_id' => 'State',
            'city_id' => 'City',
            'district_id' => 'District',
            'thana_id' => 'Thana',
            'address' => 'Address',
            'mobile' => 'Mobile',
            'phone' => 'Phone',
            'fax' => 'Fax',
            'website' => 'Website',
            'expiry' => 'Expiry',
            'birth_date' => 'Birth Date',
            'fathers_name' => 'Fathers Name',
            'mothers_name' => 'Mothers Name',
            'blood_group' => 'Blood Group',
            'gender' => 'Gender',
            'spouse_name' => 'Spouse Name',
            'relegion' => 'Relegion',
            'permanent_address' => 'Permanent Address',
            'profession' => 'Profession',
            'designation' => 'Designation',
            'organization' => 'Organization',
            'office_address' => 'Office Address',
            'highest_degree' => 'Highest Degree',
            'field_of_activity' => 'Field Of Activity',
            'past_work_details' => 'Past Work Details',
            'awards' => 'Awards',
            'social_activities' => 'Social Activities',
            'family_details' => 'Family Details',
            'country_visited' => 'Country Visited',
            'memorable_events' => 'Memorable Events',
            'hobby' => 'Hobby',
            'interest' => 'Interest',
            'u_degree' => 'Degree',
            'u_institute' => 'Institute',
            'u_subject' => 'Subject',
            'u_passing_year' => 'Passing Year',
            'c_degree' => 'Degree',
            'c_institute' => 'Institute',
            'c_subject' => 'Group',
            'c_passing_year',
            's_degree' => 'Degree',
            's_institute' => 'Institute',
            's_subject' => 'Group',
            's_passing_year' => 'Passing Year',
            'career_objective' => 'Career Objective',
            'computer_skill' => 'Computer Skill',
            'training' => 'Training',
            'other_activities' => 'Other Activities',
            'job_experience' => 'Job Experience',
            'present_salary' => 'Present Salary',
            'expected_salary' => 'Expected Salary',
            'looking_for' => 'Looking For',
            'available_for' => 'Available For',
            'previous_activities' => 'Previous Activities',
            'present_plan' => 'Present Plan',
            'user_type' => 'User Type',
            'hear_about_us' => 'How did you hear about us?',
            'reference_id' => 'Reference User ID',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('profile_picture', $this->profile_picture, true);
        $criteria->compare('country_id', $this->country_id);
        $criteria->compare('state_id', $this->state_id);
        $criteria->compare('city_id', $this->city_id);
        $criteria->compare('district_id', $this->district_id);
        $criteria->compare('thana_id', $this->thana_id);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('mobile', $this->mobile, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('fax', $this->fax, true);
        $criteria->compare('website', $this->website, true);
        $criteria->compare('expiry', $this->expiry, true);
        $criteria->compare('birth_date', $this->birth_date, true);
        $criteria->compare('fathers_name', $this->fathers_name, true);
        $criteria->compare('mothers_name', $this->mothers_name, true);
        $criteria->compare('blood_group', $this->blood_group);
        $criteria->compare('gender', $this->gender);
        $criteria->compare('spouse_name', $this->spouse_name, true);
        $criteria->compare('relegion', $this->relegion);
        $criteria->compare('permanent_address', $this->permanent_address, true);
        $criteria->compare('profession', $this->profession);
        $criteria->compare('designation', $this->designation, true);
        $criteria->compare('organization', $this->organization, true);
        $criteria->compare('office_address', $this->office_address, true);
        $criteria->compare('highest_degree', $this->highest_degree, true);
        $criteria->compare('field_of_activity', $this->field_of_activity, true);
        $criteria->compare('past_work_details', $this->past_work_details, true);
        $criteria->compare('awards', $this->awards, true);
        $criteria->compare('social_activities', $this->social_activities, true);
        $criteria->compare('family_details', $this->family_details, true);
        $criteria->compare('country_visited', $this->country_visited, true);
        $criteria->compare('memorable_events', $this->memorable_events, true);
        $criteria->compare('hobby', $this->hobby, true);
        $criteria->compare('interest', $this->interest, true);
        $criteria->compare('career_objective', $this->career_objective, true);
        $criteria->compare('computer_skill', $this->computer_skill, true);
        $criteria->compare('training', $this->training, true);
        $criteria->compare('other_activities', $this->other_activities, true);
        $criteria->compare('job_experience', $this->job_experience, true);
        $criteria->compare('present_salary', $this->present_salary);
        $criteria->compare('expected_salary', $this->expected_salary);
        $criteria->compare('looking_for', $this->looking_for, true);
        $criteria->compare('available_for', $this->available_for, true);
        $criteria->compare('previous_activities', $this->previous_activities, true);
        $criteria->compare('present_plan', $this->present_plan, true);
        $criteria->compare('user_type', $this->user_type);
        $criteria->compare('hear_about_us', $this->hear_about_us);
        $criteria->compare('reference_id', $this->reference_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function get_fathers_name($user_id) {
        $value = UserProfile::model()->findByAttributes(array('user_id' => $user_id));
        if (empty($value->fathers_name)) {
            return 'Not set!';
        } else {
            return $value->fathers_name;
        }
    }

    public static function get_mothers_name($user_id) {
        $value = UserProfile::model()->findByAttributes(array('user_id' => $user_id));
        if (empty($value->mothers_name)) {
            return 'Not set!';
        } else {
            return $value->mothers_name;
        }
    }

    public static function get_profession($user_id) {
        $value = UserProfile::model()->findByAttributes(array('user_id' => $user_id));
        if (empty($value->profession)) {
            return 'Not set!';
        } else {
            return $value->profession;
        }
    }

    public static function get_user_id($user_id) {
        $title = UserProfile::model()->findByAttributes(array('user_id' => $user_id));
        return $title;
    }

}
