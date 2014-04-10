<?php

/**
 * This is the model class for table "blog".
 *
 * The followings are the available columns in table 'blog':
 * @property integer $id
 * @property string $image
 * @property integer $active
 * @property string $date_input
 * @property string $date_update
 * @property string $insert_by
 * @property string $last_update_by
 */
class Blog extends CActiveRecord
{
	public $year;
	public $month;
	public $writer_name;
	public $tag;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Blog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'blog';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('active', 'required'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('image, insert_by, last_update_by', 'length', 'max'=>255),
			array('title, slug, content, meta_setting, meta_title, meta_key, meta_desc, tag', 'safe'),

			// array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>FALSE, 'on'=>'insert'),
			// array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>TRUE, 'on'=>'update'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('title ,id, active, date_input, date_update, insert_by, last_update_by', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'images'=>array(self::HAS_MANY, 'BlogImage', 'blog_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'active' => 'Active',
			'date_input' => 'Date Input',
			'date_update' => 'Date Update',
			'insert_by' => 'Insert By',
			'last_update_by' => 'Last Update By',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->select = "t.*";

		$criteria->compare('id',$this->id);
		$criteria->compare('active',$this->active);
		$criteria->compare('date_input',$this->date_input,true);
		$criteria->compare('date_update',$this->date_update,true);
		$criteria->compare('insert_by',$this->insert_by,true);
		$criteria->compare('last_update_by',$this->last_update_by,true);

		$criteria->compare('title',$this->title, true);

		$criteria->order = "date_input DESC";

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function getData($slug, $languageId=1)
	{
		$criteria=new CDbCriteria;

		$criteria->select = "t.*, tb_user.initial as writer_name";
		$criteria->join = "
		LEFT JOIN tb_user ON tb_user.email=t.insert_by
		";
		$criteria->addCondition('t.slug = :slug');
		$criteria->params = array(
			':slug'=>$slug,
		);

		$model = Blog::model()->find($criteria);

		return $model;
	}

	public function getDataDesc($id, $languageId=1)
	{
		$criteria=new CDbCriteria;

		$criteria->addCondition('language_id = :language_id');
		$criteria->addCondition('blog_id = :id');
		$criteria->params = array(
			':language_id'=>$languageId,
			':id'=>$id,
		);

		$model = BlogDescription::model()->find($criteria);

		return $model;
	}

	public function getAllData($limit = false, $id = false, $languageId=1)
	{
		$criteria=new CDbCriteria;

		$criteria->select = "t.*, tb_user.initial as writer_name";
		$criteria->join = "
		LEFT JOIN tb_user ON tb_user.email=t.insert_by
		";

		$params = array();

		if ($id !== false) {
			$criteria->limit = $limit;
			$criteria->addCondition('t.id != :id');
			$params[':id'] = $id;
		}

		$criteria->order = "date_input DESC";
		$criteria->params = $params;

		if ($limit !== false) {
			$criteria->limit = $limit;
		}

		$model = Blog::model()->findAll($criteria);

		return $model;
	}

	public function getAllDataByDate($month = '', $year = '', $tag = '', $limit = false, $id = false, $languageId=1)
	{
		$criteria=new CDbCriteria;

		$params = array();

		$criteria->select = "t.*, tb_user.initial as writer_name";
		$criteria->join = "
		LEFT JOIN tb_user ON tb_user.email=t.insert_by
		LEFT JOIN blog_tag ON blog_tag.blog_id=t.id
		";
		$criteria->group = "t.id";

		if ($id !== false) {
			$criteria->limit = $limit;
			$criteria->addCondition('t.id != :id');
			$params[':id'] = $id;
		}

		if ($month != '' AND $year != '') {
			$criteria->addCondition('MONTH(date_input) = :month');
			$criteria->addCondition('YEAR(date_input) = :year');
			$params[':month'] = $month;
			$params[':year'] = $year;
		}

		if ($tag != '') {
			$criteria->addCondition('blog_tag.slug = :tag');
			$params[':tag'] = $tag;
		}

		$criteria->addCondition('active = 1');
		$criteria->order = "date_input DESC";
		$criteria->params = $params;

		$count=Blog::model()->count($criteria);
    	$pages=new CPagination($count);

		if ($limit !== false) {
	    	$pages->pageSize=$limit;
		}
	    $pages->applyLimit($criteria);

		$model = Blog::model()->findAll($criteria);

		return array(
			'data'=>$model,
			'pages'=>$pages,
			'jml'=>$jml,
		);
	}

	public function getMenu($languageId=1)
	{
		$criteria=new CDbCriteria;

		$criteria->select = "YEAR(t.date_input) as `year`, MONTH(t.date_input) as `month`, t.date_input";

		$params = array();

		$criteria->addCondition('active = 1');
		$criteria->order = "date_input DESC";
		$criteria->params = $params;

		$model = Blog::model()->findAll($criteria);

		$data = array();

		foreach ($model as $key => $value) {
			$data[$value->year][$value->month] = $value->date_input;
		}

		return $data;
	}
	public function getTag()
	{
		$criteria = new CDbCriteria;
		$criteria->group = 'tag';
		$model = BlogTag::model()->findAll($criteria);
		$data = array();
		foreach ($model as $key => $value) {
			$data[] = '"'.$value->tag.'"';
		}
		return implode(',', $data);
	}
	public function getTagData($id)
	{
		$criteria = new CDbCriteria;
		$criteria->group = 'tag';
		$criteria->addCondition('blog_id = :blog_id');
		$params = array();
		$params[':blog_id'] = $id;
		$criteria->params = $params;
		$model = BlogTag::model()->findAll($criteria);
		$data = array();
		foreach ($model as $key => $value) {
			$data[] = $value->tag;
		}
		return implode(',', $data);
	}
	public function getTagArray()
	{
		$criteria = new CDbCriteria;
		$criteria->group = 'tag';
		$model = BlogTag::model()->findAll($criteria);
		$data = array();
		foreach ($model as $key => $value) {
			$data[] = array(
				'tag'=>$value->tag,
				'slug'=>$value->slug,
			);
		}
		return $data;
	}

}