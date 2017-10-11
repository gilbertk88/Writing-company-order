<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		//echo Yii::getPathOfAlias('Accounting.assets');die();		
		$this->render('index');
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
