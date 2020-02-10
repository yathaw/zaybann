$(document).ready(function() 
{
	getSubcategoryId();

	function getSubcategoryId()
	{
		var subcategoryid=$('#subcategoryid').val();

		getItem(subcategoryid);

		$('.listgroup_'+subcategoryid).toggleClass('active');
	}

	$('.list-group #subcategoryList').click(function(){
		var id = $(this).data('id');

		getItem(id);

		$('.list-group-item.active').removeClass('active');
		$('.listgroup_'+id).toggleClass('active');

	});

		

	function getItem(subcategoryid)
	{
		if (subcategoryid) 
		{
			$.ajax({ 
				type: "GET",                                     
      			url: 'getItem?id='+subcategoryid,
      			success: function(response)
      			{                    
		            // $("#responsecontainer").html(response); 
		            // console.log(response);
			        var html ='';

					var itemObjArray = JSON.parse(response); 

					console.log(itemObjArray);

					if(itemObjArray.length > 0)
					{
			            $.each(itemObjArray,function (i,v) 
						{
							html += `<div class="col-lg-4 col-md-4 col-sm-6 portfolio-item">
										<div class="card h-100">
										<a href="#">
						                	<img class="card-img-top" src="${v.photo}" alt="" style="height: 200px;object-fit:cover;">
						                </a>
									
										<div class="card-body">
					                		<h6 class="card-title">
					                    		<a href="#" class="secondary"> ${v.codeno} </a>
					                  		</h6>`;

					        if(v.discount)
					        {
					        	html += `<p class="font-weight-lighter d-inline"> <del>  ${v.price} Ks </del>  </p>
					                	<h4 class="text-danger d-inline">  ${v.discount} Ks </h4>`;

					        }
					         
					        else
					        {
					        	html += `<h4 class="text-danger"> ${v.price} Ks </h4>`;
					        }
					                  
					        html += `</div>

									<div class="card-footer bg-transparent">
			                  			<a href="javascript:void(0)" class="btn btn-secondary btn-block" style="background-color: #673AB7; border-color: #673AB7"> 
			                    			<i class="fas fa-shopping-cart pr-3"></i> Add To Cart 
			                  			</a>
			               			</div> </div> </div>`; 


						});
			        }

			        else
			        {
			        	html += `<h3> There is no item in our database. </h3>`;
			        }

					console.log(html);

					$('#itemDiv').html(html);

		        } 
      		});  
		}



	}

});