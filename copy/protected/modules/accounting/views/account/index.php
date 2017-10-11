<?php
/* @var $this DefaultController */
$cs = Yii::app()->getClientScript();
//$cs->publish($this->module->assetsUrl."css/jquery.treetable.js"); 
$this->breadcrumbs=array(
	$this->module->id,
);
$cs->registerScriptFile($this->module->assetsUrl."/js/jquery.treetable.js");
$cs->registerCssFile($this->module->assetsUrl."/css/jquery.treetable.css");
$cs->registerCssFile($this->module->assetsUrl."/css/jquery.treetable.theme.default.css");
$cs->registerCssFile($this->module->assetsUrl."/css/screen.css");
?>
<h1>General Ledger</h1>

<a href="<?php echo $this->createUrl("create");?>" class="btn"><span class="icon-plus-sign"></span>Tambah Akun</a>
<a href="<?php echo $this->createUrl("transaction/create");?>" class="btn"><span class="icon-plus-sign"></span>Tambah Transaksi</a>
<table id="testTable" style="font-size:12px">
	<?php
	$accs = Account::model()->findAll("parent_id=0");
	foreach($accs as $acc){
		echo $acc->getAccountTree();
	} 
	?>
</table>
<script>
	$(document).ready(function()
	{
		$("#testTable").treetable({ expandable: true });
	});
</script>
