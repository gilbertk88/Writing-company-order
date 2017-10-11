<?php

class TransactionController extends Controller
{
	public function actionIndex()
	{
		//echo Yii::getPathOfAlias('Accounting.assets');die();		
		$this->render('index');
	}
	public function actionView($id)
	{
		$model = Transaction::model()->findByPk($id);
		$this->render('view',array('model'=>$model));
	}
	public function actionCreate()
	{
		$model = new Transaction();
		//var_dump();die();
		if(isset($_POST["Transaction"]))
		{
			//var_dump($_POST);die();
			$model->attributes = $_POST["Transaction"];
			
			if($_POST["Transaction"]["image"]!="")
			$model->image = CUploadedFile::getInstance($model,'image');
			$model->creator_id = Yii::app()->user->id;
			//var_dump($_POST);die();
						
			if($model->save())
            {
				//var_dump($model->attributes);die();
			
				if($_POST["Transaction"]["image"]!="")
                $model->image->saveAs($this->module->params["uploadPath"].$model->image);
				for($i=0;$i<count($_POST["TransactionDetail"]["ammount"]);$i++){
					if($_POST["TransactionDetail"]["ammount"][$i]==0){
						continue;
					}
					$td = new TransactionDetail();
					$td->transaction_id = $model->id;
					$td->account_id = $_POST["TransactionDetail"]["account_id"][$i];
					$td->type = $_POST["TransactionDetail"]["Type"][$i];
					$td->ammount = $_POST["TransactionDetail"]["ammount"][$i];
					if(!$td->save()){
						var_dump($td->errors);
						die();
					}
				}	
                // redirect to success page
				//var_dump($model->attributes);die();
				$this->redirect(array('transaction/index'));
            }
            else
            {
				var_dump($model->errors);die();
			}
		}
		$this->render('form',array("model"=>$model));
	}
	/**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }
    public function accessRules() {
        return array(
			array('allow',
				'actions'=>array('index'),
				'users'=>array('@'),
			),
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'update', 'create', 'delete', 'admin'),
                'roles' => array('admin'),
            ),
            array('allow',
                'actions' => array('profile'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
 
	public function actionAdmin(){
		var_dump(Account::model()->findAll());
	}
}
