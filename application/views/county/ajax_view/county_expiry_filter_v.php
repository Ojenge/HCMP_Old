<style>
	.filter{
	width: 98%;
	height:7em;
	/*border: 1px solid black;*/
	margin:auto;	
	}
	.filter h2{
		background: #b4cbe2; /* Old browsers */
		color: #fff;
		padding: 4px;
		
	}
	.graph_content{
	width: 99%;
	height:400px;
	border: 1px solid black;
	margin:auto;	
	}
</style>
<div  class='label label-info'>Below are the expiries in the county :Select filter Options</div
<div class="filter">
	<h2>
<select id="commodity_filter">
<option value="null">--select commodity--</option>
<?php
foreach($c_data as $data):
		$commodity_name=$data['drug_name'];	
		$commodity_id=$data['id'];
		echo "<option value='$commodity_id'>$commodity_name</option>";
endforeach;
?>
</select>	
<select id="year_filter" class="input-small">
	<option value="2014" selected="selected">--select year--</option>
	<option value="2014">2014</option>
	<option value="2013">2013</option>

</select>	

<select name="month" id="month_filter" class="input-small">
<option value="01" selected="selected">--select month--</option>
<option value="01">Jan</option>
<option value="02">Feb</option>
<option value="03">Mar</option>
<option value="04">Apr</option>
<option value="05">May</option>
<option value="06">Jun</option>
<option value="07">Jul</option>
<option value="08">Aug</option>
<option value="09">Sep</option>
<option value="10">Oct</option>
<option value="11">Nov</option>
<option value="12">Dec</option>
</select>
<select id="district_filter">
<option selected="selected" value="null">Select Sub-county</option>
<?php
foreach($district_data as $district_):
		$district_id=$district_->id;
		$district_name=$district_->district;	
		echo "<option value='$district_id'>$district_name</option>";
endforeach;
?>
</select> 

<div id="facilities" style="vertical-align: baseline;
display: inline-block; white-space: nowrap; position:inherit;
margin-left: 0.2em;margin-right: 0.2em">
<select id="facility_filter">
<option value="0">--select facility--</option>
<option value="null" selected="selected">All</option>
</select>	
</div>

<select id="plot_value_filter">
<option selected="selected" value="packs">Select Plot value</option>
<option value="packs">Packs</option>
<option value="units">Units</option>
<option value="ksh">KSH</option>
</select> 
<button class="btn btn-small btn-success" id="filter" name="filter" style="margin-left: 1em;">Filter <i class="icon-filter"></i></button> 
	<!--<a class="link" data-toggle="modal" data-target="#supplyplanModal" href="#">View Supply Plan</a>-->

	</h2>
</div>

<div class="graph_content">
	
</div>

<script>
	
	$(document).ready(function() {
	$(function() {
		$("#facilities").hide();
		$("#district_filter").change(function() {
		var option_value=$(this).val();
		
		if(option_value=='null'){
		$("#facilities").hide('slow');	
		}
		else{
  var drop_down='';
  var hcmp_facility_api = "<?php echo base_url(); ?>/report_management/get_facility_json_data/"+$("#district_filter").val();
  $.getJSON( hcmp_facility_api ,function( json ) {
     $("#facility_filter").html('<option value="null" selected="selected">--select facility--</option>');
      $.each(json, function( key, val ) {
      	drop_down +="<option value='"+json[key]["facility_code"]+"'>"+json[key]["facility_name"]+"</option>";	
      });
      $("#facility_filter").append(drop_down);
    });
		

		$("#facilities").show('slow');		
		}

		});
		
		$("#filter").click(function() {
		
	
        var url = "<?php echo base_url().'report_management/get_county_cost_of_expiries_new/'?>"+
        $("#year_filter").val()+
        "/"+$("#month_filter").val()+      
         "/"+$("#district_filter").val()+
        "/"+$("#commodity_filter").val()+
        "/"+$("#plot_value_filter").val()+    
          "/"+ $("#facility_filter").val();
        
		ajax_supply(url,'.graph_content');
		
          });

		
		function ajax_supply (url,div){

	    var url =url;
	    var loading_icon="<?php echo base_url().'Images/loading.gif' ?>";
	    $.ajax({
          type: "POST",
          url: url,
          beforeSend: function() {
             $(div).html("");           
             $(div).html("<img style='margin-left:45%;margin-top:10%;' src="+loading_icon+">");
           
          },
          success: function(msg) {
            $(div).html("");
            $(div).html(msg);           
          }
        });
         
}
		
		
		});
  });
</script>