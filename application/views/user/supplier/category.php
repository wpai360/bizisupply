<?php 

if($this->session->flashdata('msg')){
	echo '<p class="text-success">'.$this->session->flashdata('msg').'</p>';
}
?>
<style>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</style>

<p class="text-success"></p>

<p class="chexk-all"><input type="checkbox" id="checkAll" value="check all" />Select All</p>
<!-- <button class="btn btn-info" data-toggle="modal" data-target="#myModal">Add New Category+</button> -->
<div>
<table>
<tr><td>Sno</td><td>Super Category</td><td>Category Name</td><td>Action </td></tr>
<?php 
$i= 1;
 foreach ($category as $value){
	 
	 //echo "<pre>"; print_r($value); 
	  $checked='';
	 foreach ($categorySelected as $key => $categorySelectedVal) {

     	$catIDs = $categorySelectedVal->cat_id;
	
	    $typeIDs = $categorySelectedVal->type_id;

		if( $catIDs ==  $value['id'] &&  $typeIDs == $value['tid'] ){  
		    // die('dffdfdfd');
		
            $checked.= "checked";
                   }else{
					   
					unset($checked);   
	   
				   }
            
			}
		
	echo "<tr><td>".$i."</td><td>".$value['name']."</td>";
    echo "<td>".$value['catname']."</td><td><input type='checkbox' 
   attrCat=".$value['name']." attrCatId=".$value['id']."  name='checkCat' attrTypeId =".$value['tid']." value=".$value['name']." $checked ></td></tr>";
	
	
     
$i++;	
}
?>
</table>

</div>
<form id="catSave" method="POST">
	<button type="submit" class="getRes btn btn-success" value="Save">Save</button>
	
			<input type="hidden" name="new" class="new" />
			<input type="hidden" name="type_id" class="type_id"  id="type_id" value="" />
			<input type="hidden" name="category_id" class="category_id" id="category_id" value="" />
			<input type="hidden" name="combine" class="combine" />
			

		</form>
			

		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title text-center">Add New Category</h4>
					</div>
					<form id ="addCat">
						<div class="modal-body">
							<p><label>Name :</label> 
								<input type="text" class="categoryName form-control"  onkeyup="checkCategoryStatus(this)" name="cat" style="text-transform:uppercase" required/>
								

							</p>
							<span class="errCat"></span>
							<div class="modal-footer d-flex justify-content-center">
								<input type="hidden" class="addH">
								<button type="submit" class="btn btn-success">Add</button>
							</div>
						</div>
					</form>
				</div>

			</div>
		</div>

		<script type="text/javascript">


function checkExist(arr,val){
	var added=false;
$.map(arr, function(elementOfArray, indexInArray) {
 if (elementOfArray.id == productID) {
   elementOfArray.price = productPrice;
   added = true;
 }
});
if (!added) {
  arr.push(val)
}
}


			$("#checkAll").change(function () {
				$("input:checkbox").prop('checked', $(this).prop("checked"));
			});

			$(document).ready( function (){


				$('#catSave').submit( function (e){
					e.preventDefault();
					var newCat =[];
					var combine =[];
					var category_id =[];
					var type_id =[];
					var checked = [];
					var cats_IDs =[];
					
					
					
					$("input:checkbox[name=checkCat]:checked").each(function(){

						var cat = $(this).attr('attrCat');
						
                        var catId = $(this).attr('attrCatId');
						var typeId = $(this).attr('attrTypeId');

						var cats_ID = category_id.push(catId);
						 
						var types_ID = type_id.push(typeId);
						
						var ct_ID = $('#category_id').val(cats_ID);
						var ty_ID = $('#type_id').val(types_ID);

					


						var typ = $(this).val();

						combine.push({[cat] : typ});
						  if(catId){
						  	//checkExist(category_id,catId);
                           }

                        if(typeId){
						  //	checkExist(type_id,typeId);
                          }
						if($(this).parents('tr').attr('attrclass')){
							console.log($(this).parents('tr').attr('attrclass'));
							if(newCat.indexOf(cat) == -1){
							newCat.push(cat);
						}
						}


					});
					if(combine.length){
						$('.combine').val(JSON.stringify(combine));
						if(newCat.length){
						$('.new').val(JSON.stringify(newCat));
					    }
					    if(category_id.length){
						$('.category_id').val(JSON.stringify(category_id));
					    }
					    if(type_id.length){
						$('.type_id').val(JSON.stringify(type_id));
					    }

					}else{
						e.preventDefault();
						swal({
							type: 'error',
							title: 'Oops...',
							text: 'Please select a category or create new one.'
						})

					}

					var cat_ID = $('#category_id').val();
          			var type_id = $('#type_id').val();
					//alert(cat_ID);
					//alert(type_id);

					$.ajax({
		              type: 'POST',
		              url : "<?php echo base_url('user/users/saveSupCategoryAjax');?>",
		              data : { cats_ID : cat_ID, types_ID : type_id },
		              dataType: 'json',
		              success : function (result){
		              	console.log(result);
		              	if(result.status ==1){
		              		$('.text-success').html(result.msg);
		              		window.location.href = result.redirect_url;
		              	}
		              }
		            });

				});

				$('button[data-target="#myModal"').click( function (){
					$('.categoryName').val('');
					$('.addH').val('');
					 $('.errCat').text('');	

				});
			});

			function checkCategoryStatus(e){
				var cat = $('.categoryName').val();
				cat = cat.toUpperCase();
				$.ajax({
					type:'POST',
					url:"<?php echo base_url('user/users/checkCategory');?>", 
					data:{category: cat},
					success:function(msg){
						console.log(msg);
						if(msg){
							$('.errCat').text('Category already Exists');
						}else{
							$('tr').each(function(){
								if($(this).attr('attrClass')){
									
									if($(this).attr('attrClass') == $('.categoryName').val().toUpperCase()){
										$('.errCat').text('You have already added this category');
									}else{
										$('.errCat').text('');	
									}	
								}
							});
						}
					}
				});
			}

		</script>