<?php
class AccountController extends Controller
{
	public function actionIndex()
	{
		//echo Yii::getPathOfAlias('Accounting.assets');die();		
		$this->render('index');
	}
	public function actionView($id)
	{
		$model = Account::model()->findByPk($id);
		$this->render('view',array('model'=>$model));
	}
	public function actionCreate()
	{
		$model = new Account();
		if(isset($_POST['Account'])){
			$model->attributes = $_POST['Account'];
			$model->Type = $model->MParent->Type;			
			//var_dump($model->attributes);die();
			if($model->save())
			{
				$this->redirect(array('account/index'));
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
