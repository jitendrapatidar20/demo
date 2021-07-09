<!-- BEGIN PAGE HEADER-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
    <script> var site_url = "<?php echo $this->base; ?>"; </script>

<script>
 $(document).ready(function() {

   $("#AllocationListLegalAgencyId").select2({
    width: '100%',
    placeholder: "Select state",
    allowClear: false
});

 });
</script>

<script>
                                                          $( function() {
                                                          $( "#ScannedDate" ).datepicker({
   dateFormat: 'yy-mm-dd'
});
                                                          
                                                          } );
                                                        </script>

<script>
 $(document).ready(function() {

   $("#AllocationListStatus").select2({
    width: '100%',
    placeholder: "Select ",
    allowClear: false
});

 });
</script>


<script>  
$(document).ready(function(){
  if ($('#AllocationListStatus option:selected').val() == 'NOT-REQUIRED')
      {
      $("#getvalue").show();
    }
    $('#AllocationListStatus').on('change', function() {
      if ( this.value == 'NOT-REQUIRED')
      {
        $("#getvalue").show();
      }
      else
      {
        $("#getvalue").hide();
      }
    });
});
</script>

<script>  
$(document).ready(function(){
  
    $('#Showalerts').on('click', function() {
    
    var alertvalue=$('#AllocationListStatus option:selected').val();
    //alert(alertvalue);
    
    //alert(remarkvalue);
    
      if ($('#AllocationListStatus option:selected').val() == 'NOT-REQUIRED')
      {
     // var remarkvalue=$('#AllocationListLegalTeamRemark').val();
      if ($('#AllocationListLegalTeamRemark').val() == ''){
       // alert("In IFFFFFFFF");
        alert("Fill Remarks");
    return false;
      }
     
     
      }
    
    
      else
      {
     // alert("Hii");
     // return false;
        //$("#getvalue").hide();
      }
    });
});
</script>

<script>
 $(document).ready(function() {

   $("#AllocationListStatus").select2({
    width: '100%',
    placeholder: "Select Status",
    allowClear: false
});

 });
</script>



 <script>
$(document).ready(function(){
  
  //avascript has the function split associated to string object that can help you:


//alert(lastsegment);
  
 
    //var indvisual=$("#testlan").val();
    
    $.ajax({
        
          type:"GET",
          url :site_url+"/LegalAgency/getlegalName",
           //   dataType: 'json',
          //data : "getdetail="+lastsegment ,
          async: false,
          success : function(response) {
          var values =  jQuery.parseJSON(response);
          // alert(response);
        $.each(values, function(i, d) {
          //alert(d.LegalAgency.name);
          //console.log(d.a.branch_desc);
               //var div_data+="<option value="+d.a.branch_id+">"+d.a.branch_desc+"</option>";
            //salert(div_data);
            //$(div_data).appendTo('#UserBranch'); 
          
                    // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
          
          $('#AllocationListLegalAgencyId').append('<option value="' + d.LegalAgency.id+ '">' + d.LegalAgency.name + '</option>');
                });
        
       //alert(JSON.stringify(response));
          
        

            //alert(obj.deal_no);
    
      
      
      //alert(d[0][deal_loan_amount]);
       //document.getElementById('AllocationListDealNo').value = values[0]['a'].deal_no;
       //document.getElementById('AllocationListCustomerName').value = values[0][0].full_name;
       //document.getElementById('AllocationListAmount').value = values[0]['a'].deal_loan_amount;
       //document.getElementById('AllocationListDealOmniStatus').value = values[0]['a'].rec_status;
 
        // xhttp.setRequestHeader("Content-type", "application/json");
    //xhttp.send("Your JSON Data Here");
        
      
          },
      error: function(request, status, error){
                alert("Error: Could not delete");
            },
            
          
});
});



</script>
<script>
$(document).ready(function(){
    $('.add_more').click(function(e){
        e.preventDefault();
        $(this).before("<input name='file[]' type='file' />");
    });
});</script>
<script>
$('body').on('click', '#upload', function(e){
        e.preventDefault();
        var formData = new FormData($(this).parents('form')[0]);

        $.ajax({
            url: site_url+'/DocumentUpload/uploadDocument',
            type: 'POST',
            xhr: function() {
                var myXhr = $.ajaxSettings.xhr();
                return myXhr;
            },
            success: function (data) {
                alert("Data Uploaded: "+data);
            },
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
});
</script>

<div class="row-fluid">
     <div class="span12">
          <!-- BEGIN PAGE TITLE & BREADCRUMB-->
          <h3 class="page-title">
               Allocation List
         
         
          </h3>
          <ul class="breadcrumb">
      <li><i class="icon-home"></i> 
        <?php echo $this->Html->link('Home', array('controller' => 'dashboard', 'action' => 'index', 'admin' => true), array('escape' => false)); ?> 
        <i class="icon-angle-right"></i>
      </li>
      <li>Edit <?php echo __('Allocation List'); ?>                    </li>
    </ul>

          <!-- END PAGE TITLE & BREADCRUMB-->
           <?php echo $this->Session->flash(); ?>
     </div>
    
     
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE HEADER-->
     <div class="row-fluid">
    
     <?php echo $this->Session->flash();
  echo $getdealNo['AllocationList']['deal_no'];?>
  
     <div class="span12">
          <!-- BEGIN SAMPLE FORM PORTLET-->
          <div class="portlet box blue">
               
               <div class="portlet-title">
                    <h4><i class="icon-reorder"></i>Allocation Detail</h4>
          
            <input type="hidden" name="deal_num" value="<?php echo ($ae); ?>" id="id4">
                   
                
               </div>
          <form   action="/otc_pdd/admin/AllocationList/edit/" method="POST">
               <div class="portlet-body form">
                  
           <div></div>
          
            
        <input name="id" type="hidden" value="<?=$this->data['AllocationList']['id']?>"/>
            <div class="row-fluid">
        
        
        <div class="span4">
        <div class="form-group">
        <label> Deal No</label>
        <input type="text" name="deal_no"  class="m-wrap span12" readonly="readonly" placeholder="Deal No" value="<?=$this->data['AllocationList']['deal_no']?>" />
        </div>
        </div>
        
        <div class="span4">
        <div class="form-group">
        <label> Loan No</label>
        <input type="text" name="loan_no"  class="m-wrap span12" readonly="readonly" placeholder="Loan No" value="<?=strtoupper($this->data['AllocationList']['loan_no'])?>" />
        </div>
        </div>
        <div class="span4">
        <div class="form-group">
        <label> Customer Name</label>
        <input type="text" name="customer_name"  class="m-wrap span12" readonly="readonly" placeholder="Customer Name" value="<?=strtoupper($this->data['AllocationList']['customer_name'])?>" />
        </div>
        </div>  
          </div>
              
          
          
            <div class="row-fluid">
            <div class="span4">
        <div class="form-group">
        <label> Deal amount</label>
        <input type="text" name="amount"  class="m-wrap span12" readonly="readonly" placeholder="Deal Amount" value="<?=strtoupper($this->data['AllocationList']['amount'])?>"></input>
        </div>
        </div>  
            <div class="span4">
        <div class="form-group">
        <label> Deal Status</label>
        <input type="text" name="deal_omni_status"  class="m-wrap span12" readonly="readonly" placeholder="Deal Status" value="<?=strtoupper($this->data['AllocationList']['deal_omni_status'])?>" />
        </div>
        </div>  
              
              
              <div class="span4">
        <div class="form-group">
        <label> Allocated To</label>
        <?php if ($this->data['AllocationList']['legal_agency_id']==null) { ?>
        <select name="legal_agency_id" value="" class="m-wrap span12" placeholder="Allocated To" id="AllocationListLegalAgencyId">
        
        <option value="">Select</option>
        <option value="<?=strtoupper($this->data['AllocationList']['legal_agency_id'])?>"><?=strtoupper($this->data['LegalAgency']['name'])?></option>
              </select>
              <?php } else { ?>
              
              <select name="legal_agency_id" value="" class="m-wrap span12" placeholder="Allocated To" id="AllocationListLegalAgencyId">
        
        <option value="<?=strtoupper($this->data['AllocationList']['legal_agency_id'])?>"><?=strtoupper($this->data['LegalAgency']['name'])?></option>
        
        </select>
        <?php } ?>
        
        </div>
        </div>    
          </div>    
          
              <div class="row-fluid">
              <div class="span4">
        <div class="form-group">
        <label> Doc Handover /Scanned Date</label>
        <input type="text" name="handover_date" data-date-format="mm-dd-yyyy" value="<?=strtoupper($this->data['AllocationList']['handover_date'])?>" class="m-wrap span12"  placeholder="Handover Date" id="ScannedDate" />
        </div>
        </div>
        
        
            <div class="span4">
        <div class="form-group">
       
        <label> Status</label>
        <?php if ($this->data['AllocationList']['status']=='PENDING') { ?>
        <select  name="status" value="" class="m-wrap span12"  placeholder="Select Status">
        <option value="">Select</option>
        <option value="LEGAL INITIATED">LEGAL INITIATED</option>
        <option value="NOT-REQUIRED">NOT-REQUIRED</option>
        </select>
        <?php } else { ?>
        
        <select  name="status" value="" class="m-wrap span12" readonly="readonly" placeholder="Select Status" value="<?=strtoupper($this->data['AllocationList']['status'])?>">
            
        <option><?=strtoupper($this->data['AllocationList']['status'])?></option>
        
        </select>
        <?php } ?>
        </div>
              </div>  
              
              <div class="span4">
        <div class="form-group">
        <label>Old Deal No</label>
          <input type="text" name="old_deal_no" value="" class="m-wrap span12" placeholder="Old Deal No" />
      
        </div>
        </div>
              
        </div>
          
              
          
           <div class="row-fluid">
          <div class="span6">
          <div class="form-group">
        <label>Legal Agency Remark</label>
        <textarea name="remarks" value="<?=strtoupper($this->data['AllocationList']['remarks'])?>"  class="m-wrap span12" placeholder="Legal   Remark"><?=strtoupper($this->data['AllocationList']['remarks'])?></textarea>
        </div>
          </div>
          
          <div class="span6">
          <div class="form-group">
        <label>Legal  Team Remark</label>
        <textarea name="legal_team_remark"   class="m-wrap span12" ><?=strtoupper($this->data['AllocationList']['legal_team_remark'])?></textarea>
        </div>
          </div>
          
           <div class="span4">
          <form enctype="multipart/form-data" action="upload.php" method="post">
          <input name="all_id" value="<?=strtoupper($this->data['AllocationList']['id'])?>" type="hidden">
          <input name="file[]" type="file" />
          <button type="button"  class="add_more btn btn-primary">Add More Files</button>
          <input type="button" class="btn btn-success" id="upload" value="Upload File" />
            </form>
        </div>
          <!--<div class="span4">
          <div class="form-group" >
          <label>Upload</label>
          <input class="m-wrap span12" type="file" name="image" >
          </div></div>
          
          <div class="span4" id="">
          <div class="form-group" >
          <div class="span4" id="showupload">
          <button type="button" class="btn blue" id="getbtn">DOWNLOAD</button>
          
            
          
        
          
          
        </div>
          </div></div>-->
          
          </div>
          
          
            
           
          
          
          
          
                   <div class="row-fluid">
   <div class="span12">
    <div class='form-actions' style='padding-left: 20px;'>
  <button type="submit" class="btn blue" onClick="window.location.href='/otc_pdd/admin/AllocationList/edit'">SAVE</button>
   
   <button type="button" class="btn default" onClick="window.location.href='/otc_pdd/admin/AllocationList/'" after="</div>">Cancel</button>
   </div> 
  
   </div>
   </div>
                   
               </div>
          </div>
          <!-- END SAMPLE FORM PORTLET-->



     </div>
     </div>
  </form>
   
