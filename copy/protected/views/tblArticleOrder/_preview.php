<?php
/* @var $this TblArticleOrderController */
/* @var $model TblArticleOrder */
/* @var $form CActiveForm */
?>


<div class="row flow  step_2">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-article-order-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
	
	<div class="">
				<h1><span class="step">3</span>Review Order</h1>
	</div>
	
	<div class="">
		
		<div class="progress-bar">
			<div class="progress-bar-value" style="width:60%;"></div>
		</div>	
		
	</div>
	
	<div class="">
			</div>	

	<?php echo $form->errorSummary($model); ?>

	<div class="clearfix orderdetails narrow">
		<?php echo $form->labelEx($model,'content_type'); ?>
		<?php echo $form->dropDownList($model,'content_type',array('1'=>'Article',
'2'=>'Press Release',
'3'=>'Web Page',
'4'=>' Blog',
'5'=>'Review',
'6'=>'Product Description',
'7'=>'Social Media',
'8'=>'Misc')); ?>
		<?php echo $form->error($model,'content_type'); ?>
	</div>

	<div class="clearfix orderdetails narrow">
		<label><?php echo $form->labelEx($model,'words'); ?></label>
		<?php echo $form->textField($model,'words',array('size'=>6,'maxlength'=>6,'readonly'=>true)); ?>
		<?php echo $form->error($model,'words'); ?>
	</div>

	<div class="clearfix orderdetails narrow">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->dropDownList($model,'subject',array('1'=>'Accountancy
','2'=>'Advertising
','3'=>'Advice
','4'=>'Aeronautics and Aerospace
','5'=>'Agriculture
','6'=>'Animals
','7'=>'Anthropology and Archaeology
','8'=>'Antiques and Collectibles
','9'=>'Art
 ','10'=>'Artificial Life
 ','11'=>'Astronomy
 ','12'=>'Auctions
 ','13'=>'Audio
 ','14'=>'Aviation
 ','15'=>'Awards
 ','16'=>'Bathroom
 ','17'=>'Beauty
 ','18'=>'Bedroom
 ','19'=>'Bibliographies
','20'=>'Bingo
','21'=>'Biographies
','22'=>'Biology
','23'=>'Blogs
','24'=>'Books and Literature
','25'=>'Building and Construction
','26'=>'Business
','27'=>'Calendar
','28'=>'Career and Vocational
','29'=>'Careers 
','30'=>'Cars
','31'=>'Casinos
','32'=>'Catering and Food
','33'=>'Charity
','34'=>'Chemicals
','35'=>'Chemistry
','36'=>'Children
','37'=>'Clairvoyance
','38'=>'Classifieds
','39'=>'Cleaning
','40'=>'Clothing
','41'=>'Comedy
','42'=>'Communication
','43'=>'Competitions
','44'=>'Computers
','45'=>'Conferences and Events
','46'=>'Cooking
','47'=>'Crafts
','48'=>'Crime
','49'=>'Dance
','50'=>'Dating
','51'=>'Death
','52'=>'Debt Advice
','53'=>'Design
','54'=>'Dictionaries
','55'=>'Disabilities
','56'=>'DIY
','57'=>'Driving Schools
','58'=>'Ecology
','59'=>'eCommerce
','60'=>'Economics
','61'=>'Education
','62'=>'Electronics
','63'=>'Emergency Services
','64'=>'Energy
','65'=>'Engineering
','66'=>'Entertainment
','67'=>'Environment and Nature
','68'=>'Etiquette
','69'=>'Family
','70'=>'Fancy Dress
','71'=>'FAQs
','72'=>'Fashion
','73'=>'Films
','74'=>'Finance
','75'=>'Financial
','76'=>'First Aid
','77'=>'Flags
','78'=>'Flights
','79'=>'Flowers
','80'=>'Folklore
','81'=>'Food and Drink
','82'=>'For Sale
','83'=>'Forensics
','84'=>'Furniture
','85'=>'Gaming
','86'=>'Genealogy
','87'=>'General
','88'=>'Geography
','89'=>'Geology and Geophysics
','90'=>'Gifts
','91'=>'Glasses
','92'=>'Government
','93'=>'Graphics
','94'=>'Guides
','95'=>'Hardware
','96'=>'Health
','97'=>'Health and Fitness
','98'=>'History
','99'=>'Hobbies
 ','100'=>'Holidays
 ','101'=>'Home and Garden
 ','102'=>'Hotels
 ','103'=>'Humanities
 ','104'=>'Instruments
 ','105'=>'Insurance
 ','106'=>'Intellectual Property
 ','107'=>'Interior Design
 ','108'=>'Internet
 ','109'=>'Jewelry
 ','110'=>'Journals
 ','111'=>'Kitchen
 ','112'=>'Language and Linguistics
 ','113'=>'Law
 ','114'=>'Legal
 ','115'=>'Legislation
 ','116'=>'Leisure
 ','117'=>'Library
 ','118'=>'Literacy
 ','119'=>'Loans
 ','120'=>'Lyrics
 ','121'=>'Magazines
 ','122'=>'Magic
 ','123'=>'Management
 ','124'=>'Maps
 ','125'=>'Marketing
 ','126'=>'Martial Arts
 ','127'=>'Mathematics
 ','128'=>'Measurements and Units
 ','129'=>'Medicine
 ','130'=>'Men
 ','131'=>'Mental Health
 ','132'=>'Merchandise
 ','133'=>'Meteorology
 ','134'=>'Midwifery
 ','135'=>'Military
 ','136'=>'Mobile Phones
 ','137'=>'Money
 ','138'=>'Mortgages
 ','139'=>'Motorcycles
 ','140'=>'Movies
 ','141'=>'Multimedia
 ','142'=>'Museums, Galleries, and Centers
 ','143'=>'Music
 ','144'=>'News
 ','145'=>'Nursing
 ','146'=>'Nutrition
 ','147'=>'Office Products
 ','148'=>'Other
 ','149'=>'Outdoors
 ','150'=>'Outsourcing
 ','151'=>'Patents
 ','152'=>'People
 ','153'=>'Performing Arts
 ','154'=>'Perfume
 ','155'=>'Pets
 ','156'=>'Pharmacy
 ','157'=>'Philanthropy
 ','158'=>'Photography
 ','159'=>'Physics
 ','160'=>'Poker
 ','161'=>'Policy
 ','162'=>'Politics
 ','163'=>'Printers
 ','164'=>'Privacy
 ','165'=>'Private Investigation
 ','166'=>'Programming
 ','167'=>'Property
 ','168'=>'Psychology
 ','169'=>'Public Health and Safety
 ','170'=>'Publications
 ','171'=>'Quotes
 ','172'=>'Radio
 ','173'=>'Reference
 ','174'=>'Relationships
 ','175'=>'Religion
 ','176'=>'Reviews
 ','177'=>'Sales
 ','178'=>'Science
 ','179'=>'Search Engine Optimization
 ','180'=>'Seasonal
 ','181'=>'Security
 ','182'=>'Sexual Health
 ','183'=>'Shopping 
 ','184'=>'Society
 ','185'=>'Software
 ','186'=>'Space
 ','187'=>'Sport
 ','188'=>'Sports
 ','189'=>'Standards
 ','190'=>'Statistics
 ','191'=>'Stocks and Shares
 ','192'=>'Storage
 ','193'=>'Support Groups
 ','194'=>'Surveys
 ','195'=>'Tax
 ','196'=>'Taxes
 ','197'=>'Technology
 ','198'=>'Technology
 ','199'=>'Telecommunications
','200'=>'Television
','201'=>'Theatre
','202'=>'Time
','203'=>'Tools
','204'=>'Toys and Games
','205'=>'Traffic and Road Conditions
','206'=>'Training
','207'=>'Translation
','208'=>'Transportation
','209'=>'Travel
','210'=>'Travel
','211'=>'TV
','212'=>'TV
','213'=>'Video
','214'=>'Weather
','215'=>'Weddings
','216'=>'White goods
','217'=>'Work')); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="clearfix orderdetails narrow">
		<?php echo $form->labelEx($model,'branded_generic'); ?>
		<?php echo $form->dropDownList($model,'branded_generic',array('1'=>'Branded ','2'=>'Generic')); ?>
		<?php echo $form->error($model,'branded_generic'); ?>
	</div>

	<div class="clearfix orderdetails narrow">
		<?php echo $form->labelEx($model,'keywords'); ?>
		<?php echo $form->textField($model,'keywords',array('size'=>50,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'keywords'); ?>
	</div>

	
		<?php echo $form->hiddenField($model,'attach_file_path',array('size'=>60,'maxlength'=>500)); ?>
		

	<div class="clearfix orderdetails narrow">
		<?php echo $form->labelEx($model,'additional_info'); ?>
		<?php echo $form->textField($model,'additional_info',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'additional_info'); ?>
	</div>

	<div class="clearfix orderdetails narrow">
		<?php echo $form->labelEx($model,'Review'); ?>
		<?php echo $form->textField($model,'Review',array('id'=>'txtFirst')); ?>
		<?php echo $form->error($model,'Review'); ?>
	
	</div>
		<?php echo $form->hiddenField($model,'status'); ?>
		

	
		<?php echo $form->hiddenField($model,'date_created'); ?>
		

	
		<?php echo $form->hiddenField($model,'Deadline'); ?>
		

	
		<?php echo $form->hiddenField($model,'date_completed'); ?>
		

	
		<?php echo $form->hiddenField($model,'Writer'); ?>
		
		<?php echo $form->hiddenField($model,'owner'); ?>
		
	
		<?php // echo $form->hiddenField($model,'payment_id'); ?>
		
	
	<div class="nav-buttons" style="text-align:center; width:70%;margin-top:30px;">
			
			 $<?php echo $form->textField($model,'cost', array('readonly'=>true,'size'=>20,'style'=>'border:0px;font-size:20px;')); ?> <span id="times" style="display:none;">*</span> <span id="txtSecond" style="font-size:16px;"></span>   <?php echo CHtml::submitButton($model->isNewRecord ? 'Place Order' : 'Place Order',array('class'=>'btn success step_continue')); ?>
	</div>
<script>
	$(document).ready(function() {
    $('#txtFirst').keyup(function(e) {
        var txtVal = $(this).val();
        $('#txtSecond').html(txtVal);
		$('#times').show();
    });
    
});
	</script>

<?php $this->endWidget(); ?>

</div><!-- form -->

