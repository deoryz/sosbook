<?php

/**
 * This is the model class for table "sosbook".
 *
 * The followings are the available columns in table 'sosbook':
 * @property integer $id
 * @property string $slug
 * @property integer $category_id
 * @property string $title
 * @property string $content
 * @property string $date_input
 * @property string $date_update
 * @property string $insert_by
 * @property string $last_update_by
 * @property string $meta_title
 * @property string $meta_desc
 * @property string $meta_key
 * @property string $image
 * @property integer $active
 */
class Sosbook extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sosbook';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('url, slug, category_id, title, content, meta_title, meta_desc, meta_key, active', 'required'),
			array('category_id, active', 'numerical', 'integerOnly'=>true),
			array('slug, title, insert_by, last_update_by, meta_title, meta_desc, meta_key', 'length', 'max'=>200),
			array('image', 'length', 'max'=>255),
			array('url', 'url'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, slug, category_id, title, content, date_input, date_update, insert_by, last_update_by, meta_title, meta_desc, meta_key, image, active', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'slug' => 'Slug',
			'category_id' => 'Category',
			'title' => 'Title',
			'content' => 'Content',
			'date_input' => 'Date Input',
			'date_update' => 'Date Update',
			'insert_by' => 'Insert By',
			'last_update_by' => 'Last Update By',
			'meta_title' => 'Meta Title',
			'meta_desc' => 'Meta Desc',
			'meta_key' => 'Meta Key',
			'image' => 'Image',
			'active' => 'Active',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('date_input',$this->date_input,true);
		$criteria->compare('date_update',$this->date_update,true);
		$criteria->compare('insert_by',$this->insert_by,true);
		$criteria->compare('last_update_by',$this->last_update_by,true);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_desc',$this->meta_desc,true);
		$criteria->compare('meta_key',$this->meta_key,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sosbook the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
