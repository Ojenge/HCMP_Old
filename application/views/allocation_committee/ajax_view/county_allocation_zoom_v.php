<SCRIPT LANGUAGE="Javascript" SRC="<?php echo base_url();?>Scripts/FusionCharts/FusionCharts.js"></SCRIPT>
<script src="<?php echo base_url().'Scripts/accordion.js'?>" type="text/javascript"></script> 
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>Scripts/jquery.dataTables.js"></script>
		<style type="text/css" title="currentStyle">
			
			@import "<?php echo base_url(); ?>DataTables-1.9.3 /media/css/jquery.dataTables.css";
			.user2{
	width:70px;
	
	text-align: center;
	}
		</style>				
				<script type="text/javascript" charset="utf-8">
			
			$(function() {
		  $.fn.slideFadeToggle = function(speed, easing, callback) {
				return this.animate({
					opacity : 'toggle',
					height : 'toggle'
				}, speed, easing, callback);
			};

			$('.accordion').accordion({
				defaultOpen : 'section1',
				cookieName : 'nav',
				speed : 'medium',
				animateOpen : function(elem, opts) {//replace the standard slideUp with custom function
					elem.next().slideFadeToggle(opts.speed);
				},
				animateClose : function(elem, opts) {//replace the standard slideDown with custom function
					elem.next().slideFadeToggle(opts.speed);
				}
			});		
				
		var chart = new FusionCharts("<?php echo base_url()."scripts/FusionCharts/Bar2D.swf"?>","ChartId", "100%", "70%", "0", "1" );
		var url = '<?php echo base_url()."rtk_management/facility_ownership_bar_chart/$bar_chart/$county_id"?>'; 
		chart.setDataURL(url);
		chart.render("chart");

		var chart = new FusionCharts("<?php echo base_url()."scripts/FusionCharts/Doughnut2D.swf"?>", "ChartId", "100%", "70%", "0", "0");
		var url = '<?php echo base_url()."rtk_management/facility_ownership_doghnut/$doghnut/$county_id"?>'; 
		chart.setDataURL(url);
		chart.render("chart1");
		
		var chart = new FusionCharts("<?php echo base_url()."scripts/FusionCharts/Bar2D.swf"?>","ChartId", "100%", "70%", "0", "1" );
		var url = '<?php echo base_url()."rtk_management/get_reporting_rate_national_bar/$bar_chart/$county_id"?>'; 
		chart.setDataURL(url);
		chart.render("chart2");

		var chart = new FusionCharts("<?php echo base_url()."scripts/FusionCharts/Doughnut2D.swf"?>", "ChartId", "100%", "100%", "0", "0");
		var url = '<?php echo base_url()."rtk_management/get_reporting_rate_national_doghnut/$doghnut/$county_id"?>'; 
		chart.setDataURL(url);
		chart.render("chart3");
		
		var chart = new FusionCharts("<?php echo base_url()."scripts/FusionWidgets/Charts/HLinearGauge.swf"?>", "ChartId", "100%", "10%", "0", "0");
		var url = '<?php echo base_url()."rtk_management/get_allocation_rate_national_hlineargauge//"?>'; 
		chart.setDataURL(url);
		chart.render("chart4");

				/* Build the DataTable with third column using our custom sort functions */
				$('#example').dataTable( {
					"bJQueryUI": true,
					"bPaginate": false} );
					
					
					$( "#allocate" )
			.button()
			.click(function() {
				  $('#myform').submit();
				
});	
								
			} );
			
			</script>
	<style>
	.chart_content{
		margin:0 auto;
		margin-left: 0px;
	}
	.multiple_chart_content{
		float:left; 
	}
</style>
<style>
.leftpanel{
    	width: 17%;
    	height:auto;
    	float: left;
    }

.alerts{
	width:95%;
	height:auto;
	background: #E3E4FA;	
	padding-bottom: 2px;
	padding-left: 2px;
	margin-left:0.5em;
	-webkit-box-shadow: 0 8px 6px -6px black;
	   -moz-box-shadow: 0 8px 6px -6px black;
	        box-shadow: 0 8px 6px -6px black;
	
}
    
    .dash_menu{
    width: 100%;
    float: left;
    height:auto; 
    -webkit-box-shadow: 2px 3px 5px#888;
	box-shadow: 2px 3px 5px #888; 
	margin-bottom:3.2em; 
    }
    
    .dash_main{
    width: 80%;
   min-height:100%;
height:1400px;
    float: left;
    -webkit-box-shadow: 2px 2px 6px #888;
	box-shadow: 2px 2px 6px #888; 
    margin-left:0.75em;
    margin-bottom:0em;
    
    }
    .dash_notify{
    width: 15.85%;
    float: left;
    padding-left: 2px;
    height:450px;
    margin-left:8px;
    -webkit-box-shadow: 2px 2px 6px #888;
	box-shadow: 2px 2px 6px #888;
    
    }
    
#accordion {
    width: 300px;
    margin: 50px auto;
    float:left;
    margin-left:0.45em;
}
.collapsible,
.page_collapsible,
.accordion {
    margin: 0;
    padding:5%;
    height:15px;
    border-top:#f0f0f0 1px solid;
    background: #cccccc;
    font:normal 1.3em 'Trebuchet MS',Arial,Sans-Serif;
    text-decoration:none;
    text-transform:uppercase;
	background: #29527b; /* Old browsers */
     border-radius: 0.5em;
     color: #fff; }
.accordion-open,
.collapse-open {
	background: #289909; /* Old browsers */    
    color: #fff; }
.accordion-open span,
.collapse-open span {
    display:block;
    float:right;
    padding:10px; }
.accordion-open span,
.collapse-open span {
    background:url('<?php echo base_url()?>Images/minus.jpg') center center no-repeat; }
.accordion-close span,
.collapse-close span {
    display:block;
    float:right;
    background:url('<?php echo base_url()?>Images/plus.jpg') center center no-repeat;
    padding:10px; }
div.container {
    width:auto;
    height:auto;
    padding:0;
    margin:0; }
div.content {
    background:#f0f0f0;
    margin: 0;
    padding:10px;
    font-size:.9em;
    line-height:1.5em;
    font-family:"Helvetica Neue", Arial, Helvetica, Geneva, sans-serif; }
div.content ul, div.content p {
    padding:0;
    margin:0;
    padding:3px; }
div.content ul li {
    list-style-position:inside;
    line-height:25px; }
div.content ul li a {
    color:#555555; }
code {
    overflow:auto; }
.accordion h3.collapse-open {}
.accordion h3.collapse-close {}
.accordion h3.collapse-open span {}
.accordion h3.collapse-close span {}   
</style>
<div class="leftpanel">

<div class="dash_menu">  
<!-- <h3 class="accordion" class="ajax-call" id="facility_list">Facility List<span></span><h3>
<div class="container">
 </div>-->
<h3 class="accordion" id="section1" >Allocation Rate<span></span></h3>
	<div  style="width:100%; height: 30%" id="chart4"></div>
<div class="container">
	
	<table class="data-table" style="margin-left: 0px;">
		<thead>
		<tr>
			<td>Counties</td><td><h4> Reporting Facilities | No. Allocated Facilities</h4></td>
		</tr>
		</thead>
		<tbody>
		<?php 
		
		echo $table_data;
		
		
		?>

		</tbody>
	</table>
	
</div>


</div>

</div>
<div class="dash_main" id = "dash_main">
<div id="notification">Allocation Rate: <?php echo $county_name." Reporting Facilities $county_allocation_rate[total_reporting_facilities] : No. Allocated Facilities  $county_allocation_rate[total_facilities_allocated_in_county]"; ?></div>
	
<div style="overflow: scroll;">

<?php $attributes = array( 'name' => 'myform', 'id'=>'myform');
	 echo form_open('rtk_management/rtk_allocation_form_data/'.$county_id,$attributes); ?>
		<table id="example" width="100%">
					<thead>
					<tr>
						<th><b>MFL</b></th>
						<th><b>Facility Name</b></th>
						<th><b>Owner</b></th>
						<th><b>Commodity</b></th>
						<th><b>Quantity Received</b></th>
						<th><b>Quantity Consumed</b></th>
						<th><b>End balance</b></th>
						<th><b>Quantity Requested</b></th>
						<th><b>Quantity Allocated</b></th>
						<th><b>Quantity Issued(From KEMSA)</b></th>
											    
					</tr>
					</thead>
					<tbody>
		<?php 
			echo $table_body;
			
		 ?>
							
				</tbody>
				</table>
				
		<?php  echo form_close();
		?>	
		<button class="btn btn-primary" id="allocate" >Allocate</button>
		</div>	
		</div>	