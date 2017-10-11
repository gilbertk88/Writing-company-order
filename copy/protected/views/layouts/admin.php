<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo CHtml::encode(Yii::app()->name); ?> | The Leading Website Copywriting Service</title>
	<meta name="description" content="Quick, quality content from approved UK copywriters. Order online in seconds!">
	
	<!-- Bootstrap -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/bootadmin/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/bootadmin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/bootadmin/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/bootadmin/assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootadmin/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/copif/7842667/css/dashboarda392.css?1412340740" />

<script src="<?php echo Yii::app()->request->baseUrl; ?>/copif/7842667/js/jquery.min.js"></script>

</head>

<body>
	<div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
      
	  <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#"><img src="<?php echo Yii::app()->Request->baseUrl; ?>/bootadmin/images/writer.png" style="border: solid 1px grey; border-radius:3px; height:38px; width:;"></a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?php echo Yii::app()->user->name; ?><i class="caret"></i>

                                </a>
                                
								<?php $this->widget('zii.widgets.CMenu',array(
				'htmlOptions' => array(
                    'class'=>'dropdown-menu',
                        ),
			
			'items'=>array(
				array('label'=>'Profile', 'url'=>array('/user/profile')),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
                            </li>
                        </ul>
                        <ul class="nav">
                           <?php $this->widget('zii.widgets.CMenu',array(
				'htmlOptions' => array(
                    'class'=>'nav navbar-nav pull-right dropdown-toggle',
                        ),
			
			'items'=>array(
				array('label'=>'New Order', 'url'=>array('/tblArticleOrder/create')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				//array('label'=>'Login', 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest),
				//array('label'=>'Register', 'url'=>array('/user/registration'), 'visible'=>Yii::app()->user->isGuest),
				//array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
				<?php $this->widget('zii.widgets.CMenu',array(
				'htmlOptions' => array(
                    'class'=>'nav nav-list bs-docs-sidenav nav-collapse collapse',
                        ),
			
			'items'=>array(
				array('label'=>'New Order', 'url'=>array('/tblArticleOrder/create')),
					
			),
		)); ?>
					<?php $this->widget('zii.widgets.CMenu',array(
				'htmlOptions' => array(
                    'class'=>'nav nav-list bs-docs-sidenav nav-collapse collapse',
                        ),
			
			'items'=>array(
				//array('label'=>'New Order', 'url'=>array('/tblArticleOrder/create')),
				array('label'=>'View My Orders', 'url'=>array('/tblArticleOrder/order')),
				/*array('label'=>'In Progress', 'url'=>array('/tblArticleOrder/order?TblArticleOrder%5BID%5D=&TblArticleOrder%5Bcontent_type%5D=&TblArticleOrder%5Bwords%5D=&TblArticleOrder%5Bsubject%5D=&TblArticleOrder%5Bbranded_generic%5D=&TblArticleOrder%5Bkeywords%5D=&TblArticleOrder%5Battach_file_path%5D=&TblArticleOrder%5Badditional_info%5D=&TblArticleOrder%5Bstatus%5D=1&TblArticleOrder%5Bdate_created%5D=&TblArticleOrder%5BDeadline%5D=&TblArticleOrder%5Bdate_completed%5D=&TblArticleOrder%5BWriter%5D=&TblArticleOrder%5BReview%5D=&TblArticleOrder%5Bowner%5D=&TblArticleOrder%5Bcost%5D=&TblArticleOrder%5Bpayment_id%5D=&yt0=Search')),
				array('label'=>'Pending Feedback', 'url'=>array('/tblArticleOrder/order?TblArticleOrder%5BID%5D=&TblArticleOrder%5Bcontent_type%5D=&TblArticleOrder%5Bwords%5D=&TblArticleOrder%5Bsubject%5D=&TblArticleOrder%5Bbranded_generic%5D=&TblArticleOrder%5Bkeywords%5D=&TblArticleOrder%5Battach_file_path%5D=&TblArticleOrder%5Badditional_info%5D=&TblArticleOrder%5Bstatus%5D=1&TblArticleOrder%5Bdate_created%5D=&TblArticleOrder%5BDeadline%5D=&TblArticleOrder%5Bdate_completed%5D=&TblArticleOrder%5BWriter%5D=&TblArticleOrder%5BReview%5D=&TblArticleOrder%5Bowner%5D=&TblArticleOrder%5Bcost%5D=&TblArticleOrder%5Bpayment_id%5D=&yt0=Search')),
				array('label'=>'Completed', 'url'=>array('/tblArticleOrder/order?TblArticleOrder%5BID%5D=&TblArticleOrder%5Bcontent_type%5D=&TblArticleOrder%5Bwords%5D=&TblArticleOrder%5Bsubject%5D=&TblArticleOrder%5Bbranded_generic%5D=&TblArticleOrder%5Bkeywords%5D=&TblArticleOrder%5Battach_file_path%5D=&TblArticleOrder%5Badditional_info%5D=&TblArticleOrder%5Bstatus%5D=1&TblArticleOrder%5Bdate_created%5D=&TblArticleOrder%5BDeadline%5D=&TblArticleOrder%5Bdate_completed%5D=&TblArticleOrder%5BWriter%5D=&TblArticleOrder%5BReview%5D=&TblArticleOrder%5Bowner%5D=&TblArticleOrder%5Bcost%5D=&TblArticleOrder%5Bpayment_id%5D=&yt0=Search')),
				//array('label'=>'View orders', 'url'=>array('/tblArticleOrder/order')),*/
			),
		)); ?>
		<?php $this->widget('zii.widgets.CMenu',array(
				'htmlOptions' => array(
                    'class'=>'nav nav-list bs-docs-sidenav nav-collapse collapse',
                        ),
			
			'items'=>array(
				array('label'=>'My Profile', 'url'=>array('/user/profile')),
				array('label'=>'Settings', 'url'=>array('/user/profile/edit')),
				array('label'=>'Change Password', 'url'=>array('/user/profile/changepassword')),
					
			),
		)); ?>
		
                </div>
                
                <!--/span-->
                <div class="span9" id="content">
                    <div class="row-fluid">


	<?php echo $content; ?>
	</div>
            </div>
            <hr>
			<div style="float:left; width:100%;">
            <footer>
                <p>&copy; Principal Writers 2015</p>
            </footer>
			</div>
        </div>
        <!--/.fluid-container-->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootadmin/vendors/jquery-1.9.1.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootadmin/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootadmin/vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootadmin/assets/scripts.js"></script>
        <script>
        $(function() {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        });
        </script>
    </body>

</html>