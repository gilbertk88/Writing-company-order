<?php

/**
 * This is the model class for table "transaction_detail".
 *
 * The followings are the available columns in table 'transaction_detail':
 * @property string $id
 * @property string $transaction_id
 * @property string $account_id
 * @property string $type
 * @property integer $ammount
 */
class TransactionDetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tran the static model class
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
		return 'transaction_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('account_id, type, ammount,transaction_id', 'required'),
			array('ammount', 'numerical', 'integerOnly'=>true),
			array('account_id', 'length', 'max'=>20),
			array('type', 'length', 'max'=>6),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, account_id, type, ammount', 'safe', 'on'=>'search'),
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
			'Transaction'=>array($this::BELONGS_TO,'Transaction','transaction_id'),
			'Account'=>array($this::BELONGS_TO,'Account','account_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'account_id' => 'Account',
			'type' => 'Type',
			'ammount' => 'Ammount',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('account_id',$this->account_id,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('ammount',$this->ammount);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
