<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    public $userData;

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = 'application.views.layouts.column1';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'users' => array('*'),
                'actions' => array('login'),
            ),
            array('allow',
                'users' => array('@'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function init() {
        /*
          //if you want to use reflection
          $reflection = new ReflectionClass('scholarshipController');
          $methods = $reflection->getMethods();
          //uncomment this if you want to get the class methods with more details
          print "<pre>";
          print_r($methods);
          print "</pre>";
          //uncomment this if you want to get the class methods
          //print_r(get_class_methods($class));

         */
        //Yii::app()->theme = Yii::app()->user->getCurrentTheme();
        //Yii::app()->theme = 'teacher';
        //parent::init();
    }

    public function beforeAction($action) {
        if (empty(Yii::app()->session['district'])) {
            Yii::app()->session['district'] = 0;
        }
        return parent::beforeAction($action);
    }

    public function firstNwords($str, $n) {
        return preg_replace('/((\b\w+\b.*?){' . $n . '}).*$/s', '$1', $str);
    }

    public function strip_html_tags($string) {

        $string = str_replace("\r", ' ', $string);
        $string = str_replace("\n", ' ', $string);
        $string = str_replace("\t", ' ', $string);
        $pattern = '/<[^>]*>/';
        $string = preg_replace($pattern, ' ', $string);
        $string = trim(preg_replace('/ {2,}/', ' ', $string));

        return $string;
    }

    public function text_cut($text, $length = 200, $dots = true) {
        $text = trim(preg_replace('#[\s\n\r\t]{2,}#', ' ', $text));
        $text_temp = $text;
        while (substr($text, $length, 1) != " ") {
            $length++;
            if ($length > strlen($text)) {
                break;
            }
        }
        $text = substr($text, 0, $length);
        return $text . ( ( $dots == true && $text != '' && strlen($text_temp) > $length ) ? '...' : '');
    }

    public function get_categories($parent_id) {
        $rValue = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{content_category}}')
                ->where('parent_id=' . $parent_id . ' AND published=1 ')
                ->order('title ASC')
                ->queryAll();
        echo '<table class="table table-bordered table-striped table-hover">';
        echo '<tbody>';
        foreach ($rValue as $key => $values) {
            echo '<tr>';
            echo '<td>';
            echo CHtml::link($values["title"], array('content/category', 'id' => $values["id"]), array());
            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    }

    public function get_problem_categories($parent_id) {
        $rValue = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{content_category}}')
                ->where('parent_id=' . $parent_id . ' AND published=1 ')
                ->order('id ASC')
                ->queryAll();
        echo '<fieldset>';
        echo '<legend><div class="fieldset_title">' . $this->get_category_name(3) . '</div></legend>';
        echo '<ul class="nav nav-list">';
        foreach ($rValue as $key => $values) {
            echo '<li>';
            echo CHtml::link('<i class="icon-tasks"></i> ' . $values["title"], array('/content/index', 'id' => $values["id"]), array());
            echo '</li>';
        }
        echo '<ul>';
        echo '</fieldset>';
    }

    public function get_porjoton($catid) {
        if (Yii::app()->SESSION['district'] == 0) {
            $rValue = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('{{content}}')
                    ->where('catid=' . $catid . ' AND state=1')
                    ->order('created DESC')
                    ->limit('6')
                    ->queryAll();
        } else {
            $rValue = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('{{content}}')
                    ->where('catid=' . $catid . ' AND state=1 AND district=' . Yii::app()->SESSION['district'])
                    ->order('created DESC')
                    ->limit('6')
                    ->queryAll();
        }
        echo '<fieldset>';
        echo '<legend><div class="fieldset_title">' . $this->get_category_name($catid) . '</div></legend>';
        echo '<ul class="nav nav-list">';
        foreach ($rValue as $key => $values) {
            echo '<li>';
            echo CHtml::link('<i class="icon-circle-arrow-right"></i> ' . $values["title"], array('/content/view', 'id' => $values["id"]), array());
            echo '</li>';
        }
        echo '<ul>';
        echo '</fieldset>';
    }

    public function get_news($catid) {
        if (Yii::app()->SESSION['district'] == 0) {
            $rValue = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('{{content}}')
                    ->where('catid=' . $catid . ' AND state=1 ')
                    ->limit('10')
                    ->order('created DESC')
                    ->queryAll();
        } else {
            $rValue = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('{{content}}')
                    ->where('catid=' . $catid . ' AND state=1 AND district=' . Yii::app()->SESSION['district'])
                    ->limit('10')
                    ->order('created DESC')
                    ->queryAll();
        }

        foreach ($rValue as $key => $values) {
            echo '<div class="new-update clearfix">';
            echo '<i class="icon-ok-sign"></i>';

            echo '<div class="update-done">';
            echo CHtml::link($values["title"], array('/content/view', 'id' => $values["id"]), array());
            echo '<span>' . substr($values["introtext"], 0, 200) . '...</span>';
            echo '</div>';
            echo '<div class="update-date"><span class="update-day">' . date("j", strtotime($values["created"])) . '</span>' . date("M", strtotime($values["created"])) . '</div>';
            echo '</div>';
        }
    }

    public function get_static_content($content_id) {
        $value = Yii::app()->db->createCommand()
                ->select('introtext')
                ->from('{{content}}')
                ->where('id=' . $content_id)
                ->queryScalar();
        return '<span style="font-size:16px;line-height:25px;">' . $value . "</span>";
    }

    public function get_category_name($id) {
        $value = Yii::app()->db->createCommand()
                ->select('title')
                ->from('{{content_category}}')
                ->where('id=' . $id)
                ->queryScalar();
        return $value;
    }

    public function getFullname() {
        if (Yii::app()->user->id) {
            $fullName = Yii::app()->db->createCommand()
                    ->select('CONCAT(u.first_name, " ",u.last_name) as firstlast')
                    ->from('{{user}} u')
                    ->where('u.id=:id', array(':id' => Yii::app()->user->id))
                    ->queryScalar();
        } else {
            $fullName = 'Guest';
        }
        return $fullName;
    }

    public function getDirectoryCategory() {
        $array = Yii::app()->db->createCommand()
                ->select('id, title')
                ->from('{{directory_category}}')
                ->where('published=1 AND (parent=0 OR parent IS NULL)')
                ->order('title ASC')
                ->queryAll();
        foreach ($array as $key => $values) {
            echo '<p class="registration_sub_title">' . CHtml::link(CHtml::encode($values["title"]) . ' (' . $this->countListing($values['id']) . ')', array("/edirectory/category", "id" => $values['id'])) . '</p>';
            $string = Yii::app()->db->createCommand()
                    ->select('id, title')
                    ->from('{{directory_category}}')
                    ->where('published=1 AND parent=' . $values['id'])
                    ->order('title ASC')
                    ->queryAll();
            echo '<ul class="nav nav-pills">';
            foreach ($string as $key => $value) {
                echo '<li>';
                echo CHtml::link($value['title'] . ' (' . $this->countListing($value['id']) . ')', array('/edirectory/category', 'id' => $value['id']));
                echo '</li>';
            }
            echo '</ul>';
        }
    }

    public function getDirectoryCatbyID($id) {
        $string = Yii::app()->db->createCommand()
                ->select('id, title')
                ->from('{{directory_category}}')
                ->where('published=1 AND parent=' . $id)
                ->order('title ASC')
                ->queryAll();
        echo '<ul class="nav nav-pills">';
        foreach ($string as $key => $value) {
            echo '<li>';
            echo CHtml::link($value['title'] . ' (' . $this->countListing($value['id']) . ')', array('/edirectory/category', 'id' => $value['id']));
            echo '</li>';
        }
        echo '</ul>';
    }

    public function countListing($catid) {
        if (Yii::app()->SESSION['district'] == 0) {
            $string = Yii::app()->db->createCommand()
                    ->select('COUNT(*)')
                    ->from('{{directory}}')
                    ->where('published=1 AND category=' . $catid)
                    ->queryScalar();
        } else {
            $string = Yii::app()->db->createCommand()
                    ->select('COUNT(*)')
                    ->from('{{directory}}')
                    ->where('published=1 AND category=' . $catid . ' AND district=' . Yii::app()->SESSION['district'])
                    ->queryScalar();
        }
        return $string;
    }

    public function get_advertisement_170($catid) {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{banner}}')
                ->where('published=1 AND catid=' . $catid)
                ->order('created_on DESC')
                ->queryAll();

        foreach ($array as $key => $values) {
            echo '<div style="margin-bottom:5px;">';
            $banner = CHtml::image(Yii::app()->baseUrl . '/uploads/banners/' . $values['banner'], $values['name'], array("width" => 170, 'title' => $values['name']));
            echo CHtml::link($banner, $values['clickurl'], array('target' => '_blank'));
            echo '</div>';
        }
    }

    public function get_advertisement_215($catid) {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{banner}}')
                ->where('published=1 AND catid=' . $catid)
                ->order('created_on DESC')
                ->queryAll();

        foreach ($array as $key => $values) {
            echo '<div style="margin-bottom:5px;">';
            $banner = CHtml::image(Yii::app()->baseUrl . '/uploads/banners/' . $values['banner'], $values['name'], array("width" => 215, 'title' => $values['name']));
            echo CHtml::link($banner, $values['clickurl'], array('target' => '_blank'));
            echo '</div>';
        }
    }

    public function get_advertisement_270($catid) {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{banner}}')
                ->where('published=1 AND catid=' . $catid)
                ->order('created_on DESC')
                ->queryAll();

        foreach ($array as $key => $values) {
            echo '<div style="margin-bottom:5px;">';
            $banner = CHtml::image(Yii::app()->baseUrl . '/uploads/banners/' . $values['banner'], $values['name'], array("width" => 270, 'title' => $values['name']));
            echo CHtml::link($banner, $values['clickurl'], array('target' => '_blank'));
            echo '</div>';
        }
    }

    public function get_advertisement_326($catid) {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{banner}}')
                ->where('published=1 AND catid=' . $catid . ' AND district=' . Yii::app()->SESSION['district'])
                ->order('created_on DESC')
                ->queryAll();

        foreach ($array as $key => $values) {
            echo '<div style="margin-bottom:5px;">';
            $banner = CHtml::image(Yii::app()->baseUrl . '/uploads/banners/' . $values['banner'], $values['name'], array("width" => 326, 'title' => $values['name']));
            echo CHtml::link($banner, $values['clickurl'], array('target' => '_blank'));
            echo '</div>';
        }
    }

    public function get_advertisement_670($catid) {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{banner}}')
                ->where('published=1 AND catid=' . $catid)
                ->order('created_on DESC')
                ->queryAll();

        foreach ($array as $key => $values) {
            echo '<div style="margin-bottom:5px;">';
            $banner = CHtml::image(Yii::app()->baseUrl . '/uploads/banners/' . $values['banner'], $values['name'], array("width" => 670, 'title' => $values['name']));
            echo CHtml::link($banner, $values['clickurl'], array('target' => '_blank'));
            echo '</div>';
        }
    }

    public function get_web_links() {
        if (Yii::app()->SESSION['district'] == 0) {
            $array = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('{{weblink}}')
                    ->where('published=1')
                    ->limit('10')
                    ->order('rand()')
                    ->queryAll();
        } else {
            $array = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('{{weblink}}')
                    ->where('published=1 AND district=' . Yii::app()->SESSION['district'])
                    ->limit('10')
                    ->order('rand()')
                    ->queryAll();
        }
        echo '<fieldset>';
        echo '<legend><div class="fieldset_title">Weblinks</div></legend>';
        echo '<ul class="nav nav-list">';
        foreach ($array as $key => $values) {
            echo '<li>' . CHtml::link('<i class="icon-share-alt"></i> ' . $values['title'], $values['click_url'], array('class' => '', 'target' => '_blank')) . '</li>';
        }
        echo '</ul>';
        echo '</fieldset>';
    }

    public function get_blog_latest() {
        if (Yii::app()->SESSION['district'] == 0) {
            $array = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('{{blog}}')
                    ->where('state=1')
                    ->limit('5')
                    ->order('created DESC, id DESC')
                    ->queryAll();
        } else {
            $array = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('{{blog}}')
                    ->where('state=1 AND district=' . Yii::app()->SESSION['district'])
                    ->limit('5')
                    ->order('created DESC, id DESC')
                    ->queryAll();
        }
        echo '<fieldset>';
        echo '<legend><div class="fieldset_title">Latest Blog</div></legend>';
        echo '<ul class="nav nav-list">';
        foreach ($array as $key => $values) {
            echo '<li>' . CHtml::link('<i class="icon-minus"></i> ' . $values['title'], array('/blog/view', 'id' => $values['id']), array('class' => '', 'target' => '_blank')) . '</li>';
        }
        echo '</ul>';
        echo '</fieldset>';
    }

    public function get_problem_latest() {
        if (Yii::app()->SESSION['district'] == 0) {
            $array = Yii::app()->db->createCommand()
                    ->select('id,title')
                    ->from('{{content}}')
                    ->where('state=1 AND catid IN (SELECT id from {{content_category}} WHERE parent_id=3)')
                    ->limit('5')
                    ->order('created DESC, id DESC')
                    ->queryAll();
        } else {
            $array = Yii::app()->db->createCommand()
                    ->select('id,title')
                    ->from('{{content}}')
                    ->where('state=1 AND catid IN (SELECT id from {{content_category}} WHERE parent_id=3) AND district=' . Yii::app()->SESSION['district'])
                    ->limit('5')
                    ->order('created DESC, id DESC')
                    ->queryAll();
        }
        echo '<fieldset>';
        echo '<legend><div class="fieldset_title">Problem & Possibility</div></legend>';
        echo '<ul class="nav nav-list">';
        foreach ($array as $key => $values) {
            echo '<li>' . CHtml::link('<i class="icon-minus"></i> ' . $values['title'], array('/content/view', 'id' => $values['id']), array('class' => '', 'target' => '_blank')) . '</li>';
        }
        echo '</ul>';
        echo '</fieldset>';
    }

    // Get slide banner
    public function get_banner($catid) {
        $i = 1;
        if (Yii::app()->session['district'] == 0) {
            $array = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('{{banner}}')
                    ->where('published=1 AND catid=4')
                    ->order('created_on DESC')
                    ->queryAll();
        } else {
            $array = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('{{banner}}')
                    ->where('published=1 AND catid=' . $catid . ' AND district=' . Yii::app()->session['district'])
                    ->order('created_on DESC')
                    ->queryAll();
        }

        echo '<div id="myCarousel" class="carousel slide">';
        echo '<div class="carousel-inner">';
        foreach ($array as $key => $values) {
            if ($i == 1) {
                echo '<div class="active item">';
            } else {
                echo '<div class="item">';
            }
            $banner = CHtml::image(Yii::app()->baseUrl . '/uploads/banners/' . $values['banner'], $values['name'], array("width" => 1170, 'title' => $values['name']));
            echo CHtml::link($banner, $values['clickurl'], array('target' => '_blank'));
            echo '</div>';
            $i++;
        }
        echo '</div>';
        echo '<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>';
        echo '<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>';
        echo '</div>';
    }

    public function get_district() {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{district}}')
                ->where('published=1')
                ->order('title ASC')
                ->queryAll();
        echo '<fieldset>';
        echo '<legend><div class="fieldset_title">District home page</div></legend>';
        echo '<ul class="nav nav-pills">';
        foreach ($array as $key => $values) {
            echo '<li>' . CHtml::link($values['title'], array('/site/district', 'id' => $values['id']), array('class' => '', 'target' => '_blank')) . '</li>';
        }
        echo '</ul>';
        echo '</fieldset>';
    }

    public function get_district_home($district_id) {
        $content_id = Yii::app()->db->createCommand()
                ->select('id')
                ->from('{{content}}')
                ->where('district=' . $district_id)
                ->limit(1)
                ->queryScalar();

        $value = Yii::app()->db->createCommand()
                ->select('introtext')
                ->from('{{content}}')
                ->where('district=' . $district_id)
                ->limit(1)
                ->queryScalar();
        $data = $this->text_cut(htmlspecialchars_decode(CHtml::encode($this->strip_html_tags($value))), 2000);
        $data .= CHtml::link('Read more', array('/content/view', 'id' => $content_id), array('class' => ''));
        return '<p style="font-size:16px;line-height:25px">' . $data . "</p>";
    }

    public function get_directory_category() {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{directory_category}}')
                ->where('published=1 AND parent IS NOT NULL')
                ->limit('10')
                ->order('rand()')
                ->queryAll();
        echo '<fieldset>';
        echo '<legend><div class="fieldset_title">Directory Category</div></legend>';
        echo '<ul class="nav nav-list">';
        foreach ($array as $key => $values) {
            echo '<li>' . CHtml::link('<i class="icon-arrow-right"></i> ' . $values['title'], array('/edirectory/category', 'id' => $values['id']), array('class' => '', 'target' => '_blank')) . '</li>';
        }
        echo '</ul>';
        echo '</fieldset>';
    }

    public function get_directory_latest() {
        if (Yii::app()->SESSION['district'] == 0) {
            $array = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('{{directory}}')
                    ->where('published=1')
                    ->limit('10')
                    ->order('rand()')
                    ->queryAll();
        } else {
            $array = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('{{directory}}')
                    ->where('published=1 AND district=' . Yii::app()->SESSION['district'])
                    ->limit('10')
                    ->order('rand()')
                    ->queryAll();
        }
        echo '<fieldset>';
        echo '<legend><div class="fieldset_title">Directory listing</div></legend>';
        echo '<ul class="nav nav-list">';
        foreach ($array as $key => $values) {
            echo '<li>' . CHtml::link('<i class="icon-minus"></i> ' . $values['title'], array('/edirectory/view', 'id' => $values['id']), array('class' => '', 'target' => '_blank')) . '</li>';
        }
        echo '</ul>';
        echo '</fieldset>';
    }

    public function get_directory_related($catid) {
        if (Yii::app()->SESSION['district'] == 0) {
            $array = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('{{directory}}')
                    ->where('published=1 AND category=' . $catid)
                    ->limit('10')
                    ->queryAll();
        } else {
            $array = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('{{directory}}')
                    ->where('published=1 AND category=' . $catid . ' AND district=' . Yii::app()->SESSION['district'])
                    ->limit('10')
                    ->queryAll();
        }
        echo '<fieldset>';
        echo '<legend><div class="fieldset_title">Related listing</div></legend>';
        echo '<ul class="nav nav-list">';
        foreach ($array as $key => $values) {
            echo '<li>' . CHtml::link('<i class="icon-minus"></i> ' . $values['title'], array('/edirectory/view', 'id' => $values['id']), array('class' => '', 'target' => '_blank')) . '</li>';
        }
        echo '</ul>';
        echo '</fieldset>';
    }

    public function get_fullname() {
        if (Yii::app()->user->id) {
            $value = User::model()->findByAttributes(array('id' => Yii::app()->user->id));
            return $value->name;
        } else {
            return Yii::app()->user->name;
        }
    }

    public function get_blog_categories() {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{blog_category}}')
                ->where('published=1')
                ->order('title')
                ->queryAll();
        echo '<fieldset>';
        echo '<legend><div class="fieldset_title">Blog categories</div></legend>';
        echo '<ul class="nav nav-pills">';
        foreach ($array as $key => $values) {
            echo '<li style="margin-right:10px;">' . CHtml::link('<i class="icon-th-large"></i> ' . $values['title'], array('/blog/category', 'id' => $values['id'])) . '</li>';
        }
        echo '</ul>';
        echo '</fieldset>';
    }

    public function get_gallery_category() {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{gallery_category}}')
                ->where('published=1')
                ->limit('5')
                ->order('rand()')
                ->queryAll();
        echo '<fieldset>';
        echo '<legend><div class="fieldset_title">Gallery</div></legend>';
        echo '<ul class="nav nav-list">';
        foreach ($array as $key => $values) {
            echo '<li>' . CHtml::link('<i class="icon-th-large"></i> ' . $values['title'], array('/gallery/index', 'id' => $values['id']), array('class' => '', 'target' => '_blank')) . '</li>';
        }
        echo '</ul>';
        echo '</fieldset>';
    }

    public function getUserPicture($uid) {
        $value = Yii::app()->db->createCommand()
                ->select('profile_picture')
                ->from('{{user_profile}}')
                ->where('user_id=' . $uid)
                ->queryScalar();
        if (!empty($value)) {
            echo '<div class="thumbnail">' . CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $value, 'Profile Picture', array('alt' => 'Profile Picture', 'width' => '160', 'title' => 'Profile Picture')) . '</div>';
        } else {
            echo '<div class="thumbnail">' . CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/default.jpg', 'Profile Picture', array('alt' => 'Profile Picture', 'width' => '160', 'title' => 'Profile Picture')) . '</div>';
        }
    }

    public function getEminentPicture($id) {
        $value = Yii::app()->db->createCommand()
                ->select('profile_picture')
                ->from('{{eminent_people}}')
                ->where('id=' . $id)
                ->queryScalar();
        if (!empty($value)) {
            echo '<div class="thumbnail">' . CHtml::image(Yii::app()->baseUrl . '/uploads/eminent_people/' . $value, 'Profile Picture', array('alt' => 'Profile Picture', 'width' => '160', 'title' => 'Profile Picture')) . '</div>';
        } else {
            echo '<div class="thumbnail">' . CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/default.jpg', 'Profile Picture', array('alt' => 'Profile Picture', 'width' => '160', 'title' => 'Profile Picture')) . '</div>';
        }
    }

    public function getPicture($type_id) {
        if (Yii::app()->SESSION['district'] == 0) {
            $array = Yii::app()->db->createCommand()
                    ->select('user_id,profile_picture')
                    ->from('{{user_profile}}')
                    ->where('user_type=' . $type_id)
                    ->limit('6')
                    ->order('rand()')
                    ->queryAll();
        } else {
            $array = Yii::app()->db->createCommand()
                    ->select('user_id,profile_picture')
                    ->from('{{user_profile}}')
                    ->where('user_type=' . $type_id . ' AND district_id=' . Yii::app()->SESSION['district'])
                    ->limit('6')
                    ->order('rand()')
                    ->queryAll();
        }
        echo '<div class="inner_title">' . UserType::get_user_type($type_id) . '</div>';
        echo '<div class="row-fluid">';
        foreach ($array as $key => $values) {
            $filePath = Yii::app()->basePath . '/../uploads/profile_picture/' . $values['profile_picture'];
            if ((is_file($filePath)) && (file_exists($filePath))) {
                $banner = CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $values['profile_picture'], $values['user_id'], array("class" => "img-rounded",));
            } else {
                $banner = CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/default.jpg', $values['user_id'], array("class" => "img-rounded",));
            }
            echo '<div class="span2" style="height:100px;overflow:hidden;">' . CHtml::link($banner, array('/user/view', 'id' => $values['user_id']), array('rel' => 'tooltip', 'title' => User::get_user_name($values['user_id']))) . '</div>';
        }
        echo '</div>';
    }

    public function getEminentPeople() {
        if (Yii::app()->SESSION['district'] == 0) {
            $array = Yii::app()->db->createCommand()
                    ->select('id,full_name,profile_picture')
                    ->from('{{eminent_people}}')
                    ->where('published=1 AND profile_picture IS NOT NULL')
                    ->limit('6')
                    ->order('rand()')
                    ->queryAll();
        } else {
            $array = Yii::app()->db->createCommand()
                    ->select('id,full_name,profile_picture')
                    ->from('{{eminent_people}}')
                    ->where('published=1 AND profile_picture IS NOT NULL AND district=' . Yii::app()->SESSION['district'])
                    ->limit('6')
                    ->order('rand()')
                    ->queryAll();
        }
        echo '<div class="inner_title">Eminent People</div>';
        echo '<div class="row-fluid">';
        foreach ($array as $key => $values) {
            $filePath = Yii::app()->basePath . '/../uploads/eminent_people/' . $values['profile_picture'];
            if ((is_file($filePath)) && (file_exists($filePath))) {
                $banner = CHtml::image(Yii::app()->baseUrl . '/uploads/eminent_people/' . $values['profile_picture'], $values['full_name'], array("class" => "img-rounded",));
            } else {
                $banner = CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/default.jpg', $values['full_name'], array("class" => "img-rounded",));
            }
            echo '<div class="span2" style="height:100px;overflow:hidden;">' . CHtml::link($banner, array('/eminentPeople/view', 'id' => $values['id']), array('rel' => 'tooltip', 'title' => $values['full_name'])) . '</div>';
        }
        echo '</div>';
    }

    public function get_youtube_video() {
        if (Yii::app()->SESSION['district'] == 0) {
            $value = Yii::app()->db->createCommand()
                    ->select('youtube_id')
                    ->from('{{youtube}}')
                    ->where('featured=1')
                    ->limit('1')
                    ->order('created_on DESC')
                    ->queryScalar();
        } else {
            $value = Yii::app()->db->createCommand()
                    ->select('youtube_id')
                    ->from('{{youtube}}')
                    ->where('district=' . Yii::app()->SESSION['district'])
                    ->limit('1')
                    ->order('created_on DESC')
                    ->queryScalar();
        }
        return $value;
    }

}