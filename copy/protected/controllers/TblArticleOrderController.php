<?php

class TblArticleOrderController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/admin';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('second','order','create','index','view','pay','paypalreturn','preview'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
			
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		/*if(Yii::app()->user->isGuest)
		{
			$this->redirect(array("/user/registration"));
		} */
		
		$model=new TblArticleOrder;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	

		if(isset($_POST['TblArticleOrder']))
		{
			$_POST['TblArticleOrder']['owner'] = Yii::app()->user->id; 
			$model->attributes=$_POST['TblArticleOrder'];
			
			if($model->save())
				$this->redirect(array('second','id'=>$model->ID));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblArticleOrder']))
		{
			$model->attributes=$_POST['TblArticleOrder'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	public function actionPreview($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblArticleOrder']))
		{
			$model->attributes=$_POST['TblArticleOrder'];
			if($model->save())
				$this->redirect(array('pay','id'=>$model->ID));
		}

		$this->render('preview',array(
			'model'=>$model,
		));
	}
	
	
	public function actionPay($id)
	{
		$model=$this->loadModel($id);
		$user=new User;
		//receive payment made
		// load cost from model
		// display  paypal
		if(Yii::app()->user->isGuest)
		{
			$this->redirect(array("/user/registration/$model->ID"));
		} 
		$model->owner = Yii::app()->user->id; 
		$model->status = 1; 
		$model->save();
		//$this->render('update',array(
		//	'model'=>$model,
		$e=new ExpressCheckout;
	    
	      $products=array(
		  
			    '0'=>array(
				      'NAME'=>'#'.$model->ID,
				      'AMOUNT'=>$model->cost,
				      'QTY'=>$model->Review
				      ),
			   
	
			    );
                         /*Optional */
                   $shipping_address=array(
    
			'FIRST_NAME'=>$user->username,
			'LAST_NAME'=>'',
			'EMAIL'=>$user->email,
			'MOB'=>'',
			'ADDRESS'=>'', 
			'SHIPTOSTREET'=>'',
			'SHIPTOCITY'=>'',
			'SHIPTOSTATE'=>'',
			'SHIPTOCOUNTRYCODE'=>'',
			'SHIPTOZIP'=>''
                                          ); 
    
		    $e->setShippingInfo($shipping_address); // set Shipping info Optional
		    
		    $e->setCurrencyCode("USD");//set Currency (USD,HKD,GBP,EUR,JPY,CAD,AUD)
		    
		    $e->setProducts($products); /* Set array of products*/
		    
		    $e->setShippingCost(0.0);/* Set Shipping cost(Optional) */
		    
		    
		    $e->returnURL=Yii::app()->createAbsoluteUrl("tblArticleOrder/paypalreturn");
    
            $e->cancelURL=Yii::app()->createAbsoluteUrl("tblArticleOrder/create");
		    
		    $result=$e->requestPayment(); 
		    
		    /*
		      The response format from paypal for a payment request
	        Array
		(
		    [TOKEN] => EC-9G810112EL503081W
		    [TIMESTAMP] => 2013-12-12T10:29:35Z
		    [CORRELATIONID] => 67da94aea08c3
		    [ACK] => Success
		    [VERSION] => 65.1
		    [BUILD] => 8725992
		)
	            */
      
    
		if(strtoupper($result["ACK"])=="SUCCESS")
		  {
			/*redirect to the paypal gateway with the given token */
			header("location:".$e->PAYPAL_URL.$result["TOKEN"]);
		  }	
	}
	
	public function actionPaypalreturn()
          {
              /*
                here paypal will send you the following 2 parameters
              $_REQUEST[token] => EC-59C81234SW941750C
	      $_REQUEST[PayerID] => ZW3KSL2H557XC
	      
               */	
               /* You need to do 2 more final steps to complete the user payment. ie 
                  1.get the payment details from payment &
                  2.make doPayment api call to paypal to complete the payment 
               */
                 $e=new ExpressCheckout;
		 $paymentDetails=$e->getPaymentDetails($_REQUEST['token']); //1.get payment details by using the given token
		 
		 /*
		   Below you can see a sample format of a successfull payment details response from paypal
		      Array
			    (
				[TOKEN] => EC-73B51491U8895353R
				[CHECKOUTSTATUS] => PaymentActionNotInitiated
				[TIMESTAMP] => 2013-12-12T11:03:09Z
				[CORRELATIONID] => b812d7a367878
				[ACK] => Success
				[VERSION] => 65.1
				[BUILD] => 8725992
				[EMAIL] => sirini_1313434856_per@gmail.com
				[PAYERID] => ZW3KSL2H557XC
				[PAYERSTATUS] => verified
				[FIRSTNAME] => Test
				[LASTNAME] => User
				[COUNTRYCODE] => US
				[SHIPTONAME] => Test User
				[SHIPTOSTREET] => 1 Main St
				[SHIPTOCITY] => San Jose
				[SHIPTOSTATE] => CA
				[SHIPTOZIP] => 95131
				[SHIPTOCOUNTRYCODE] => US
				[SHIPTOCOUNTRYNAME] => United States
				[ADDRESSSTATUS] => Confirmed
				[CURRENCYCODE] => USD
				[AMT] => 1800.00
				[ITEMAMT] => 1800.00
				[SHIPPINGAMT] => 0.00
				[HANDLINGAMT] => 0.00
				[TAXAMT] => 0.00
				[INSURANCEAMT] => 0.00
				[SHIPDISCAMT] => 0.00
				[L_NAME0] => p1
				[L_NAME1] => p2
				[L_NAME2] => p3
				[L_QTY0] => 2
				[L_QTY1] => 2
				[L_QTY2] => 2
				[L_TAXAMT0] => 0.00
				[L_TAXAMT1] => 0.00
				[L_TAXAMT2] => 0.00
				[L_AMT0] => 250.00
				[L_AMT1] => 300.00
				[L_AMT2] => 350.00
				[L_ITEMWEIGHTVALUE0] =>    0.00000
				[L_ITEMWEIGHTVALUE1] =>    0.00000
				[L_ITEMWEIGHTVALUE2] =>    0.00000
				[L_ITEMLENGTHVALUE0] =>    0.00000
				[L_ITEMLENGTHVALUE1] =>    0.00000
				[L_ITEMLENGTHVALUE2] =>    0.00000
				[L_ITEMWIDTHVALUE0] =>    0.00000
				[L_ITEMWIDTHVALUE1] =>    0.00000
				[L_ITEMWIDTHVALUE2] =>    0.00000
				[L_ITEMHEIGHTVALUE0] =>    0.00000
				[L_ITEMHEIGHTVALUE1] =>    0.00000
				[L_ITEMHEIGHTVALUE2] =>    0.00000
				[PAYMENTREQUEST_0_CURRENCYCODE] => USD
				[PAYMENTREQUEST_0_AMT] => 1800.00
				[PAYMENTREQUEST_0_ITEMAMT] => 1800.00
				[PAYMENTREQUEST_0_SHIPPINGAMT] => 0.00
				[PAYMENTREQUEST_0_HANDLINGAMT] => 0.00
				[PAYMENTREQUEST_0_TAXAMT] => 0.00
				[PAYMENTREQUEST_0_INSURANCEAMT] => 0.00
				[PAYMENTREQUEST_0_SHIPDISCAMT] => 0.00
				[PAYMENTREQUEST_0_INSURANCEOPTIONOFFERED] => false
				[PAYMENTREQUEST_0_SHIPTONAME] => Test User
				[PAYMENTREQUEST_0_SHIPTOSTREET] => 1 Main St
				[PAYMENTREQUEST_0_SHIPTOCITY] => San Jose
				[PAYMENTREQUEST_0_SHIPTOSTATE] => CA
				[PAYMENTREQUEST_0_SHIPTOZIP] => 95131
				[PAYMENTREQUEST_0_SHIPTOCOUNTRYCODE] => US
				[PAYMENTREQUEST_0_SHIPTOCOUNTRYNAME] => United States
				[PAYMENTREQUEST_0_ADDRESSSTATUS] => Confirmed
				[L_PAYMENTREQUEST_0_NAME0] => p1
				[L_PAYMENTREQUEST_0_NAME1] => p2
				[L_PAYMENTREQUEST_0_NAME2] => p3
				[L_PAYMENTREQUEST_0_QTY0] => 2
				[L_PAYMENTREQUEST_0_QTY1] => 2
				[L_PAYMENTREQUEST_0_QTY2] => 2
				[L_PAYMENTREQUEST_0_TAXAMT0] => 0.00
				[L_PAYMENTREQUEST_0_TAXAMT1] => 0.00
				[L_PAYMENTREQUEST_0_TAXAMT2] => 0.00
				[L_PAYMENTREQUEST_0_AMT0] => 250.00
				[L_PAYMENTREQUEST_0_AMT1] => 300.00
				[L_PAYMENTREQUEST_0_AMT2] => 350.00
				[L_PAYMENTREQUEST_0_ITEMWEIGHTVALUE0] =>    0.00000
				[L_PAYMENTREQUEST_0_ITEMWEIGHTVALUE1] =>    0.00000
				[L_PAYMENTREQUEST_0_ITEMWEIGHTVALUE2] =>    0.00000
				[L_PAYMENTREQUEST_0_ITEMLENGTHVALUE0] =>    0.00000
				[L_PAYMENTREQUEST_0_ITEMLENGTHVALUE1] =>    0.00000
				[L_PAYMENTREQUEST_0_ITEMLENGTHVALUE2] =>    0.00000
				[L_PAYMENTREQUEST_0_ITEMWIDTHVALUE0] =>    0.00000
				[L_PAYMENTREQUEST_0_ITEMWIDTHVALUE1] =>    0.00000
				[L_PAYMENTREQUEST_0_ITEMWIDTHVALUE2] =>    0.00000
				[L_PAYMENTREQUEST_0_ITEMHEIGHTVALUE0] =>    0.00000
				[L_PAYMENTREQUEST_0_ITEMHEIGHTVALUE1] =>    0.00000
				[L_PAYMENTREQUEST_0_ITEMHEIGHTVALUE2] =>    0.00000
				[PAYMENTREQUESTINFO_0_ERRORCODE] => 0
			    )
		    */
		    if($paymentDetails['ACK']=="Success")
		    {
			$ack=$e->doPayment($paymentDetails);  //2.Do payment
			
			echo "<pre>";
			print_r($ack);
			echo "</pre>";
		    }
		    
		    /*
		      Below you can see a sample successfull response of a payment process from paypal
		     Array
			  (
			      [TOKEN] => EC-1AG000796M3683304
			      [SUCCESSPAGEREDIRECTREQUESTED] => false
			      [TIMESTAMP] => 2013-12-12T11:57:17Z
			      [CORRELATIONID] => 89a33a155e512
			      [ACK] => Success
			      [VERSION] => 65.1
			      [BUILD] => 8725992
			      [TRANSACTIONID] => 7S255873FM437633X
			      [TRANSACTIONTYPE] => expresscheckout
			      [PAYMENTTYPE] => instant
			      [ORDERTIME] => 2013-12-12T11:57:17Z
			      [AMT] => 1800.00
			      [FEEAMT] => 52.50
			      [TAXAMT] => 0.00
			      [CURRENCYCODE] => USD
			      [PAYMENTSTATUS] => Completed
			      [PENDINGREASON] => None
			      [REASONCODE] => None
			      [PROTECTIONELIGIBILITY] => Eligible
			      [INSURANCEOPTIONSELECTED] => false
			      [SHIPPINGOPTIONISDEFAULT] => false
			      [PAYMENTINFO_0_TRANSACTIONID] => 7S255873FM437633X
			      [PAYMENTINFO_0_TRANSACTIONTYPE] => expresscheckout
			      [PAYMENTINFO_0_PAYMENTTYPE] => instant
			      [PAYMENTINFO_0_ORDERTIME] => 2013-12-12T11:57:17Z
			      [PAYMENTINFO_0_AMT] => 1800.00
			      [PAYMENTINFO_0_FEEAMT] => 52.50
			      [PAYMENTINFO_0_TAXAMT] => 0.00
			      [PAYMENTINFO_0_CURRENCYCODE] => USD
			      [PAYMENTINFO_0_PAYMENTSTATUS] => Completed
			      [PAYMENTINFO_0_PENDINGREASON] => None
			      [PAYMENTINFO_0_REASONCODE] => None
			      [PAYMENTINFO_0_PROTECTIONELIGIBILITY] => Eligible
			      [PAYMENTINFO_0_PROTECTIONELIGIBILITYTYPE] => ItemNotReceivedEligible,UnauthorizedPaymentEligible
			      [PAYMENTINFO_0_ERRORCODE] => 0
			      [PAYMENTINFO_0_ACK] => Success
			  )
		    
		    */
		    
          }
	public function actionSecond($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblArticleOrder']))
		{
			$model->attributes=$_POST['TblArticleOrder'];
			if($model->save())
				$this->redirect(array('preview','id'=>$model->ID));
		}

		$this->render('second',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('TblArticleOrder');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblArticleOrder('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblArticleOrder']))
			$model->attributes=$_GET['TblArticleOrder'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionOrder()
	{
		$model=new TblArticleOrder('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblArticleOrder']))
			$model->attributes=$_GET['TblArticleOrder'];
		if(isset($_GET['TblArticleOrder']))
			$model->attributes=$_GET['TblArticleOrder'];
			
		$this->render('admin',array(
			'model'=>$model,
		));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TblArticleOrder the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TblArticleOrder::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TblArticleOrder $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-article-order-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
