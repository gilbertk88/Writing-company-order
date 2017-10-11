<?php

/**
 * This is the model class for table "Account".
 *
 * The followings are the available columns in table 'Account':
 * @property string $id
 * @property string $name
 * @property string $parent_id
 */
class Account extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Account the static model class
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
		return 'Account';
	}
	 
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, parent_id,Type', 'required'),
			array('name', 'length', 'max'=>32),
			array('parent_id', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, parent_id', 'safe', 'on'=>'search'),
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
			"Child"=>array($this::HAS_MANY,"Account","parent_id"),
			"MParent"=>array($this::BELONGS_TO,"Account","parent_id"),
			"TransactionDetails"=>array($this::HAS_MANY,"TransactionDetail","account_id"),
		);
	}
	public function getAllSubTransaction()
	{
		$myTransaction = $this->TransactionDetails;
		foreach($this->Child as $ac)
		{
			$myTransaction = array_merge($myTransaction,$ac->AllSubTransaction);
		}
		return $myTransaction;
	}
	public function getBalance(){
		$sum = 0;
		foreach($this->TransactionDetails as $trans){
			$sum += $trans->ammount;
		}
		return $sum;
	}

	public function getAccountTree($date=null)
	{
		$table = "";
		$child = "";
		$class = "folder";
		if(count($this->Child)==0)
		$class="file";
		$sum = 0;
		foreach($this->Child as $t){
			//$table.=$this->renderPartial("_treeview",array("node"=>$t));
			$child.=$t->getAccountTree($date);
			$sum+=$t->getBalance();
		}
		$sum+=$this->getBalance();
		if($this->parent_id==0)
		$table = "<tr data-tt-id=".$this->id."><td> <span class=\"".$class."\">".CHtml::link($this->name,array("account/view","id"=>$this->id))."</span></td><td>".$sum."</td></tr>";
		else
		$table = "<tr data-tt-id=".$this->id." data-tt-parent-id=\"".$this->parent_id."\"><td> <span class=\"".$class."\">".CHtml::link($this->name,array("account/view","id"=>$this->id))."</span></td><td>".$sum."</td></tr>";
		
		
		return $table.$child;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'parent_id' => 'Parent',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('parent_id',$this->parent_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
