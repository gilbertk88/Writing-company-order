<?php
/* @var $this TblArticleOrderController */
/* @var $model TblArticleOrder */
/* @var $form CActiveForm */
?>

	<!-- container -->
	<div class="container">
		<div class="content">
	    	<!-- flash -->
	    	<div class="row flash">
	    		<div class="span16">
	    			 	    		</div>
	    	</div>   

<div class="row flow step_1">
	
	<div class="span16">
	
		<h1><span class="step">1</span>What type of content do you need?</h1>

	</div>
	
	<div class="span16">
		
		<div class="progress-bar">
			<div class="progress-bar-value" style="width:20%;"></div>
		</div>	
		
	</div>
	
	<div class="span16">
				</div>
	
	<div class="span16">
		<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'JobStep1Form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>t,
)); ?>
		
		
		<div class="clearfix">	
		  				
		  	<div class="job_type type_1 selected even">
			  	<ul class="inputs-list">
		    		<li>
		         		 <label>
			            	<?php echo $form->radioButton($model, 'content_type', array('value'=>1,'uncheckValue'=>null,'id'=>'JobJobTypeId1')); ?> 
			            	<span>Article</span>
		          		</label>
			    	</li>
			  	</ul>
			</div>
			
						
		  	<div class="job_type type_2 ">
			  	<ul class="inputs-list">
		    		<li>
		         		 <label>
			            	<?php echo $form->radioButton($model, 'content_type', array('value'=>2,'uncheckValue'=>null,'id'=>'JobJobTypeId2')); ?>  
			            	<span>Press Release</span>
		          		</label>
			    	</li>
			  	</ul>
			</div>
			
						
		  	<div class="job_type type_3  even">
			  	<ul class="inputs-list">
		    		<li>
		         		 <label>
			            	<?php echo $form->radioButton($model, 'content_type', array('value'=>3,'uncheckValue'=>null,'id'=>'JobJobTypeId3')); ?>  
			            	<span>Web Page</span>
		          		</label>
			    	</li>
			  	</ul>
			</div>
			
						
		  	<div class="job_type type_4 ">
			  	<ul class="inputs-list">
		    		<li>
		         		 <label>
			            	<?php echo $form->radioButton($model, 'content_type', array('value'=>4,'uncheckValue'=>null,'id'=>'JobJobTypeId4')); ?>
			            	<span>Blog</span>
		          		</label>
			    	</li>
			  	</ul>
			</div>
			
						
		  	<div class="job_type type_6  even">
			  	<ul class="inputs-list">
		    		<li>
		         		 <label>
			            	<?php echo $form->radioButton($model, 'content_type', array('value'=>5,'uncheckValue'=>null,'id'=>'JobJobTypeId5')); ?>
			            	<span>Review</span>
		          		</label>
			    	</li>
			  	</ul>
			</div>
			
						
		  	<div class="job_type type_7 ">
			  	<ul class="inputs-list">
		    		<li>
		         		 <label>
			            	<?php echo $form->radioButton($model, 'content_type', array('value'=>6,'uncheckValue'=>null,'id'=>'JobJobTypeId6')); ?>
			            	<span>Product Description</span>
		          		</label>
			    	</li>
			  	</ul>
			</div>
			
						
		  	<div class="job_type type_8  even">
			  	<ul class="inputs-list">
		    		<li>
		         		 <label>
			            	<?php echo $form->radioButton($model, 'content_type', array('value'=>7,'uncheckValue'=>null,'id'=>'JobJobTypeId7')); ?>
			            	<span>Social Media</span>
		          		</label>
			    	</li>
			  	</ul>
			</div>
			
						
		  	<div class="job_type type_5 ">
			  	<ul class="inputs-list">
		    		<li>
		         		 <label>
			            	<?php echo $form->radioButton($model, 'content_type', array('value'=>8,'uncheckValue'=>null,'id'=>'JobJobTypeId8')); ?>
			            	<span>Misc</span>
		          		</label>
			    	</li>
			  	</ul>
			</div>
			
						
     	</div>
		
	  	<div class="clearfix enterwords">	  		
			<div class="input">
				$<?php echo $form->textField($model, 'cost', array('value'=>18, 'size'=>3,'class'=>'cost','readonly'=>true,'style'=>'border:0px;font-size:20px;')); ?> 
				<?php echo $form->textField($model,'words',array('class'=>'wordcount', 'size'=>6,'maxlength'=>6,'value'=>'500', 'id'=>'0JobWords')); ?>	 	
				
				<span class="help-block">How many words do you require? <span class="questionHelp word-guide">&nbsp;</span></span>		 	
			</div>
     	</div>	  		

		<div class="nav-buttons">
			
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Continue' : 'Save',array('class'=>'btn success step_continue')); ?>
			
			<!-- <span class="or"><span>or</span></span>
			
			<a href="" class="btn">Place bulk order</a>			
			<br/> -->
			
			<span class="step_fields_loading" style="display:none;">
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/copif/7842667/img/indicator1dbd.gif?1392219066" alt="" />			</span>
			
			
        </div>	
        
		</form>		
	</div>

</div>


<!-- Brief help -->
<div class="modal hide fade" id="modal-word-guide">
	
	<div class="modal-header">
      	<a class="close" href="#">×</a>
      	<h4>How many words should I choose?</h4>
    </div>
    <div class="modal-body">
		<table class="zebra-striped">
			<thead>
				<tr>
				<th>Type of copy</th>
				<th>Recommended words</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Article</td>
					<td>500</td>
				</tr>
				<tr>
					<td>Press Release</td>
					<td>400</td>
				</tr>
				<tr>
					<td>Web Page</td>
					<td>400</td>
				</tr>
				<tr>
					<td>Blog Post</td>
					<td>400</td>
				</tr>
				<tr>
					<td>Review</td>
					<td>200</td>
				</tr>
				<tr>
					<td>Product Description</td>
					<td>150</td>
				</tr>
				
			</tbody>
		</table>
	</div>
</div>


<!-- locale warning -->
<div class="modal hide fade" id="wrong-locale-modal-validation"></div>
<script type="text/javascript">
	$(document).ready(function() {
		$.getJSON('/locations/locale.json' , function(result) {
			if(result.message == 'switch') {
				$.ajax({
					url: "/users/switch_locale/"+result.response,
					type: 'GET',
					dataType: 'html',
					success: function(modal) {
						$('#wrong-locale-modal-validation').html(modal);
						$('#wrong-locale-modal-validation').modal({
							show: true,
		    				keyboard: true,
		    				backdrop: true
						});
					}
				});	
				
			}
			
		});
	});
</script>
	
<script type="text/javascript">

	// Return value of given URL param name 
	function getURLParameter(name) {
	    return decodeURI(
	        (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]
	    );
	}
	
	function IsNumeric(input) {
	    return (input - 0) == input && (input+'').replace(/^\s+|\s+$/g, "").length > 0;
	}
	
	function getCost() {
		
		var words = $('#TblArticleOrder_words').val();
		
		var budget_id = $('#0JobJobBudgetId').val();
		
		$('.wordcount').addClass('loading');
		
		setTimeout(function(){
			
			$.ajax({
				url:'/job_budgets/quote_words/'+words+'/'+budget_id+'/.json',
				type: 'GET',
				//async: true,
				success: function(data){
					var cost = data.response.cost;
					var client_deadline = data.response.client_deadline_estimate;
					var status = data.status;
					var message = data.message;
					$('.wordcount').removeClass('loading');
					if(status == 'success') {
						$('#shopping-cart .estimated-cost').html(cost);
						$('#shopping-cart .estimated-delivery').html(client_deadline);
					} else {
						//console.log(message);
					}
				}
			});
		
		} , 600);
	}

	$(document).ready(function() {
		
		
		// on change event on word count
		$("#TblArticleOrder_words").keyup(function() {
			getCost();
		});
		
		// Bind click to chunky buttons
		$(".job_type").click(function() {
			
			// Remove active class and checked state from all by default
			$(".job_type").removeClass('selected');
			$(".job_type").find('input[type=radio]').attr('checked', false);

			// Add active to this button
			$(this).addClass('selected');
			
			// add checked to the current buttons radio
			var clicked = $(this).find('input[type=radio]');
			clicked.attr('checked', true);
			
			// switch word count when different types clicked
			var jt = clicked.val(); // job type id (jt)
			if(jt == 1) {
				$('.wordcount').val('500'); // Article
				$('.cost').val('18');
			}
			else if(jt == 2) {
				$('.wordcount').val('400'); // PR
				$('.cost').val('15');
			}
			else if(jt == 3) {
				$('.wordcount').val('400'); // web
				$('.cost').val('15');
			}
			else if(jt == 4) {
				$('.wordcount').val('400'); // blog
				$('.cost').val('15');
			}
			else if(jt == 5) {
				$('.wordcount').val('400'); // misc
				$('.cost').val('15');
			}
			else if(jt == 6) {
				$('.wordcount').val('200'); // review
				$('.cost').val('8');
			}
			else if(jt == 7) {
				$('.wordcount').val('150'); // prod
				$('.cost').val('6');
			}
			else if(jt == 8) {
				$('.wordcount').val('100'); // social
				$('.cost').val('5');
			}
			
			// Update costs and turnaround
			getCost();
			
		});
		
		// Show spinner
		$('.step_continue').click(function() {
			$('.step_fields_loading').show();
		});


		// Show reccomended word counts
		$('.word-guide').click(function() {
			$('#modal-word-guide').modal({
				show: true,
				keyboard: true,
				backdrop: true
			});
        });

		// Ridiculous hack for shitty IE10 not supoporting conditional CSS anymore	
		if ($.browser.msie && $.browser.version == 10) {
 			$(".wordcount").css({'padding': '1px', 'font-size': '24px'});
		}	
		
		// If we have URL param type just show thew relevant signup
		var job_type_id = getURLParameter('job_type_id');	
		
		// Already have a signup type in URL?
		if(job_type_id != 'null' && IsNumeric(job_type_id)) {
			// Trigger a click on the given id
			var optionToTrigger = $('#JobStep1Form').find('#JobJobTypeId' + job_type_id);
			// Does it exists?
			if (optionToTrigger.length > 0) {
				optionToTrigger.trigger( "click" );
			}
		}	

	});

</script>
			
	    </div>

	</div>
	
</div>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/copif/7842667/js/jquery.placeholder.minc934.js?1392219067"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/copif/7842667/js/jquery.copify4660.js?1393329342"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/copif/7842667/js/bootstrap-modal1dbd.js?1392219066"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/copif/7842667/js/bootstrap-alerts1dbd.js?1392219066"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/copif/7842667/js/bootstrap-twipsy1dbd.js?1392219066"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/copif/7842667/js/bootstrap-popover1dbd.js?1392219066"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/copif/7842667/js/bootstrap-dropdown1dbd.js?1392219066"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/copif/7842667/js/bootstrap-scrollspy1dbd.js?1392219066"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/copif/7842667/js/bootstrap-tabs1dbd.js?1392219066"></script>

	



<div style="display:none;">




</div>
<?php $this->endWidget(); ?></br></br>