<?php
/* @var $this TblArticleOrderController */
/* @var $model TblArticleOrder */
/* @var $form CActiveForm */
?>
<!-- container -->
	<div class="container">
			      
	    <!-- Main  area -->
		<div class="content">
	    	<!-- flash -->
	    	<div class="row flash">
	    		<div class="span16">
	    			 	    		</div>
	    	</div>
			
			<!-- render view -->
			<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-article-order-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->errorSummary($model); ?>

		<?php echo $form->hiddenField($model,'content_type'); ?>
		
		<?php //echo $form->textField($model,'words',array('size'=>6,'maxlength'=>6)); ?>
		
		<?php echo $form->hiddenField($model,'date_created'); ?>
		
		<?php echo $form->hiddenField($model,'cost'); ?>
		
		<?php echo $form->hiddenField($model,'payment_status'); ?>
			
<div class="row flow step_2">
	
	<div class="span16">
				<h1><span class="step">2</span>Create your article brief</h1>
	</div>
	
	<div class="span16">
		
		<div class="progress-bar">
			<div class="progress-bar-value" style="width:40%;"></div>
		</div>	
		
	</div>
	
	<div class="span16">
			</div>	
	
	<div class="span16">
	
		<form action="./Order content   Step 2_files/Order content   Step 2.htm" id="JobStep2Form" enctype="multipart/form-data" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div><div class="clearfix orderdetails narrow left">		  	
	<label class="required-label">What subject would you like the article to cover?</label>
	<div class="input">
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
</div>	


<div class="clearfix orderdetails narrow">		  	
	<label>Would you like the article to be branded or generic?</label>
	<div class="input">
	
		<?php echo $form->dropDownList($model,'branded_generic',array('1'=>'Branded ','2'=>'Generic')); ?>
		<?php echo $form->error($model,'branded_generic'); ?>
		
			<span class="help-inline questionHelp tipHover" data-content="Branded pieces are written from the perspective of a particular brand, generic pieces don&#39;t mention any brand specifically. " data-original-title="Branded or generic?">&nbsp;</span>
	</div> 
	
	<div class="input content_brand" style="display:none;">
		<br>
		</div>
</div>


<!-- <div class="clearfix orderdetails narrow left">		  	
	<label>What is the purpose of the article?</label>
	<div class="input">
		<select name="data[0][Job][content_purpose]" class="xlarge chzn-select chzn-done" id="0JobContentPurpose" style="display: none;">
<option value="persuade">Persuade</option>
<option value="inform">Inform</option>
<option value="entertain">Entertain</option>
</select><div id="0JobContentPurpose_chzn" class="chzn-container chzn-container-single" style="width: 270px;"><a href="javascript:void(0)" class="chzn-single"><span>Persuade</span><div><b></b></div></a><div class="chzn-drop" style="left: -9000px; width: 268px; top: 25px;"><div class="chzn-search"><input type="text" autocomplete="off" style="width: 233px;"></div><ul class="chzn-results"><li id="0JobContentPurpose_chzn_o_0" class="active-result result-selected" style="">Persuade</li><li id="0JobContentPurpose_chzn_o_1" class="active-result" style="">Inform</li><li id="0JobContentPurpose_chzn_o_2" class="active-result" style="">Entertain</li></ul></div></div>	</div> 
</div> -->


<div class="clearfix orderdetails narrow">		  	
	<label class="">Would you like to include keywords?</label>
	<div class="input">
		<?php echo $form->textField($model,'keywords',array('size'=>40,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'keywords'); ?>	</div>
</div>	

<div class="clearfix orderdetails other-details narrow left">		  	
	<label>Do you have any additional information for the writer?</label>
	<div class="input">
		<?php echo $form->textField($model,'additional_info',array('size'=>40,'maxlength'=>500,'rows'=>'5','class'=>'large tip','id'=>'brief','cols'=>'30' )); ?>
		<?php echo $form->error($model,'additional_info'); ?>
			</div>
</div>
	

<!-- <div class="clearfix orderdetails files narrow">		  	
	<label>Attach a file</label>
	<div class="input">
		<input type="file" name="data[0][JobAttachment][file][0]" class="xlarge private_file" id="0JobAttachmentFile0">		<span class="help-block add_more">Max 10mb <a id="addFile">Click here</a> to add another</span>
	</div>	 	
</div> -->
		


<script type="text/javascript">
$(document).ready(function() {
	
	/***********************************
	* Braned or non branded
	***********************************/
	// Toggle brand input 
	$('#0JobContentTone').change(function() {
		if($(this).val() == 'branded') {
			$('.content_brand').fadeIn();
		} else {
			$('.content_brand').fadeOut();
		}
	});
	
	// Show brand box if set by default
	var JobContentTone = $('#0JobContentTone').val();
	if(JobContentTone == 'branded') {
		$('.content_brand').show();
	}
	
});
</script>	
 


		<div class="nav-buttons">
			
			<!-- <a href="https://uk.copify.com/jobs/step_1" class="btn nudge-right">Go back</a>			
			<span class="or"><span>or</span></span> -->
			
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Preview your brief' : 'Preview',array('class'=>'btn success step_continue')); ?>
			
			<?php $this->endWidget(); ?>

	
			<br>
			
			<span class="step_fields_loading" style="display:none;">
				<img src="./Order content   Step 2_files/indicator.gif" alt="">			</span>
			
	    </div>	
		
		</form>		
		<hr>
		
	</div>

	
</div>	


<!-- Validation errors -->
<div class="modal hide fade" id="order_errors">
	<div class="modal-header error">
      	<a class="close" href="https://uk.copify.com/jobs/step_2#">×</a>
      	<h4>Woopsy</h4>
    </div>
    <div class="modal-body">
		<div class="alert-message block-message error">
			<ul class="order_errors"></ul>
		</div>
	</div>
</div>



<!-- Preview and edit the breif -->
<div class="modal hide fade" id="brief_preview">
    <div class="modal-body order-preview">
		<table>
			<tbody>
				<tr>
					<th><strong>Order</strong></th>
					<th>
						<span>
							<section class="editable order-name" id="name" title="Click to edit"></section>
						</span>
					</th>
				</tr>
				<tr>
					<td><strong>Brief</strong></td>
					<td>	
						<span>						
							<section class="editable order-brief" id="brief" title="Click to edit"></section>
						</span>	
					</td>
				</tr>
			</tbody>
		</table>	
	</div>
	<div class="modal-footer">
		<span class="confirm_brief_loading" style="display:none;">
			<img src="./Order content   Step 2_files/indicator.gif" alt="">        </span>
		<div class="step_2_file_progress hide"></div>
      	<a class="btn primary success continue-step" href="#">Confirm brief</a>
		<a class="btn primary finish-editing" style="display:none;" href="#">Finish editing</a>
      	<a class="btn secondary cancel_brief_modal" href="#">Cancel</a>
		<span class="help-inline read-carefully">Please read the brief carefully before moving to next step.</span>
    </div>
</div>


			
	    </div>

	</div>
	
</div>

	


<div style="display:none;">





</div>
