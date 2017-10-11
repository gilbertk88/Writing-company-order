<?php

/**
 * This is the model class for table "{{article_order}}".
 *
 * The followings are the available columns in table '{{article_order}}':
 * @property string $ID
 * @property integer $content_type
 * @property string $words
 * @property string $subject
 * @property integer $branded_generic
 * @property string $keywords
 * @property string $attach_file_path
 * @property string $additional_info
 * @property integer $status
 * @property string $date_created
 * @property string $Deadline
 * @property string $date_completed
 * @property string $Writer
 * @property string $Review
 * @property integer $owner
 * @property integer $cost
 * @property integer $payment_status
 *
 * The followings are the available model relations:
 * @property ContentType $contentType
 * @property GenericBranded $brandedGeneric
 */
class TblArticleOrder extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{article_order}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('words, subject, branded_generic, status, date_created, Writer, Review, owner, payment_status', 'required'),
			array('content_type, branded_generic, status, owner, payment_id', 'numerical', 'integerOnly'=>true),
			array('cost', 'numerical'),
			array('words', 'length', 'max'=>6),
			array('subject', 'length', 'max'=>140),
			array('keywords', 'length', 'max'=>250),
			array('attach_file_path, additional_info', 'length', 'max'=>500),
			array('Writer', 'length', 'max'=>50),
			array('Review', 'length', 'max'=>150),
			array('Deadline, date_completed', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, content_type, words, subject, branded_generic, keywords, attach_file_path, additional_info, status, date_created, Deadline, date_completed, Writer, Review, owner, cost, payment_id', 'safe', 'on'=>'search'),
		);
	}
	
	public function defaultScope()
	{         
				//if(!Yii::app()->user->isAdmin())
				if(!Yii::app()->user->isGuest && 'pay'!==Yii::app()->controller->action->id)
				{ return array(
					'condition'=>'owner='.Yii::app()->user->id,         
				);     }
	}   

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'contentType' => array(self::BELONGS_TO, 'ContentType', 'content_type'),
			'brandedGeneric' => array(self::BELONGS_TO, 'GenericBranded', 'branded_generic'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'content_type' => 'Content Type',
			'words' => 'How many words do you require?',
			'subject' => 'Article subject',
			'branded_generic' => 'Will it be Branded or Generic',
			'keywords' => 'Enter keywords(separate with a coma)',
			'attach_file_path' => 'Attach File Path',
			'additional_info' => 'Additional Info to the writer',
			'status' => 'Article process status',
			'date_created' => 'Date Created',
			'Deadline' => 'Deadline',
			'date_completed' => 'Date Completed',
			'Writer' => 'Writer',
			'Review' => 'Number of articles',
			'owner' => 'Owner',
			'cost' => 'Cost',
			'payment_id' => 'Payment Status',
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

		$criteria->compare('ID',$this->ID,true);
		$criteria->compare('content_type',$this->content_type);
		$criteria->compare('words',$this->words,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('branded_generic',$this->branded_generic);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('attach_file_path',$this->attach_file_path,true);
		$criteria->compare('additional_info',$this->additional_info,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('Deadline',$this->Deadline,true);
		$criteria->compare('date_completed',$this->date_completed,true);
		$criteria->compare('Writer',$this->Writer,true);
		$criteria->compare('Review',$this->Review,true);
		$criteria->compare('owner',$this->owner);
		$criteria->compare('cost',$this->cost);
		//$criteria->compare('payment_id',$this->payment_id);
		/*$criteria->with=array('owner');
		$criteria->together = true;
		$criteria->condition = "tbl_article_order.owner='".Yii::app()->user->id."'";*/

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblArticleOrder the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function contenttype() {
	
	return CHtml::dropDownList($model,$this->content_type,array('1'=>'Article',
			'2'=>'Press Release',
			'3'=>'Web Page',
			'4'=>' Blog',
			'5'=>'Review',
			'6'=>'Product Description',
			'7'=>'Social Media',
			'8'=>'Misc',));
	}
}
