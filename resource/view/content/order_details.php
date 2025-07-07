<?php
## ===*=== [C]ALLING CONTROLLER ===*=== ##

## ===*=== [O]BJECT DEFINED ===*=== ##
$eloquent = new Eloquent;

	

##

## ===*=== [F]ETCH ORDERED ITEMS DATA ===*=== ##

$columnName["1"] = "order_items.product_id ";
$columnName["2"] = "order_items.prod_quantity ";
$columnName["3"] = "products.product_name";
$columnName["4"] = "products.product_master_image";
$columnName["5"] = "products.product_price";
$columnName["6"] = "order_item_status";
$columnName["7"] = "order_items.id";
$tableName["MAIN"] = "order_items";
$joinType = "INNER";
$tableName["1"] = "products";
$tableName["2"] = "orders";
$onCondition["1"] = ["order_items.product_id", "products.id"];
$onCondition["2"] = ["order_items.id", "orders.id"];
$whereValue["order_items.customer_id"] = $_SESSION['SSCF_login_id'];
$orderdetailsResult = $eloquent->selectJoinData($columnName, $tableName, $joinType, $onCondition, @$whereValue);
## ===*=== [F]ETCH ORDERED ITEMS DATA ===*=== ##
?>

<!--=*= DETAIL ORDER SECTION START =*=-->
<div class="wrapper">
	<div class="row">
		<div class="col-sm-12">
			<ul class="breadcrumb panel">
			</ul>
			<section class="panel">
             <header class="panel-heading">
					<h2>ORDER DETAILS</h2>
				</header>
				<div class="panel-body">
					<div class="adv-table">

					<?php
					if(!empty($orderdetailsResult[0]["product_id"])){

					

					?>
						<table class="display table table-bordered table-striped" id="dynamic-table">
							<thead>
								<tr>
									<th style="width: 3%"> # </th>
									<th style="width: 7%"> Item ID </th>
									<th style="width: 25%"> Item Name </th>
									<th style="width: 10%"> Item Image </th>
									<th style="width: 10%"> Item Price </th>
									<th style="width: 10%"> Item Qty. </th>
                                    <th style="width: 10%"> Status </th>
                                    <th style="width: 20%"> Action </th>
								</tr>
							</thead>
							<tbody>
								<?php 
									#== DETAILS ORDER DATA TABLE
									$n = 1;
									foreach ($orderdetailsResult as $eachRow) 
									{
                                        if($eachRow["order_item_status"]=="Pending"){
										echo '
										<tr class="gradeA">
                                        
											<td>'. $n .'</td>
                                           
											<td>'. $eachRow["product_id"] .'</td>
											<td id="data"><a href="product.php?id='. $eachRow['product_id'] .'">'. $eachRow["product_name"] .'</a></td>
											<td class="center">
												<a target="_blank" href="'. $GLOBALS['PRODUCT_DIRECTORY'] . $eachRow["product_master_image"] .'"> 
													<img src="'. $GLOBALS['PRODUCT_DIRECTORY'] . $eachRow["product_master_image"] .'" class="img-circle" style="border: 1px outset green; height: 48px; width: 45px;"/>
												</a>
											</td>
											<td>'. $eachRow["product_price"] .' INR</td>
											<td>'. $eachRow["prod_quantity"] .'</td>
                                            <td>'. $eachRow["order_item_status"] .'</td>
                                           
                                           <td class="center">
											<a data-id="'. $eachRow['product_id'] .'" class="btn btn-danger btn-xs deleteButton" href="#deleteModal" style="width: 76px;" data-toggle="modal">
												<i class="fa fa-trash-o"></i> Cancel
											</a>
										</td>
                                            </form>
										</tr>
										';
										$n++;
									}
                                    else if ($eachRow["order_item_status"]=="Cancelled")
                                    {
                                        echo '
										<tr class="gradeA">
                                        
											<td>'. $n .'</td>
                                           
											<td>'. $eachRow["product_id"] .'</td>
											<td id="data"><a href="product.php?id='. $eachRow['product_id'] .'">'. $eachRow["product_name"] .'</a></td>
											<td class="center">
												<a target="_blank" href="'. $GLOBALS['PRODUCT_DIRECTORY'] . $eachRow["product_master_image"] .'"> 
													<img src="'. $GLOBALS['PRODUCT_DIRECTORY'] . $eachRow["product_master_image"] .'" class="img-circle" style="border: 1px outset green; height: 48px; width: 45px;"/>
												</a>
											</td>
											<td>'. $eachRow["product_price"] .' INR</td>
											<td>'. $eachRow["prod_quantity"] .'</td>
                                            <td>'. $eachRow["order_item_status"] .'</td>
                                           
                                           <td class="center">
											<a href="product.php?id='. $eachRow['product_id'] .'" class="btn btn-dark btn-xs "  style="width: 30px;" >
												<i class="fa fa-trash-o"></i> Re-Order
											</a>
                                            <a data-id="'. $eachRow['product_id'] .'" class="btn btn-danger btn-xs deleteButton my-2" href="#deleteModal" style="width: 30px;" data-toggle="modal">
												<i class="fa fa-trash-o"></i> Cancel
											</a>
										</td>
                                            </form>
										</tr>
										';
										$n++;   

                                    }
                                else{
                                    echo '
                                    <tr class="gradeA">
                                    
                                        <td>'. $eachRow["product_id"] .'</td>
                                        <td id="data"><a href="product.php?id='. $eachRow['product_id'] .'">'. $eachRow["product_name"] .'</a></td>
                                        <td class="center">
                                            <a target="_blank" href="'. $GLOBALS['PRODUCT_DIRECTORY'] . $eachRow["product_master_image"] .'"> 
                                                <img src="'. $GLOBALS['PRODUCT_DIRECTORY'] . $eachRow["product_master_image"] .'" class="img-circle" style="border: 1px outset green; height: 48px; width: 45px;"/>
                                            </a>
                                        </td>
                                        <td>'. $eachRow["product_price"] .' INR</td>
                                        <td>'. $eachRow["prod_quantity"] .'</td>
                                        <td>'. $eachRow["order_item_status"] .'</td>
                                       
                                       <td class="center">
                                        <a data-id="'. $eachRow['product_id'] .'" class="btn btn-dark btn-xs "  style="width: 76px;" >
                                            <i class="fa fa-trash-o"></i> Completed
                                        </a>
                                    </td>
                                        </form>
                                    </tr>
                                    ';
                                    $n++;   



                                }
                                }
								?> 
								
		
						</table>
						<?php
					}
					else{
						echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
										Oops! No Orders Yet!<a href="index.php"><button type="button" class="btn btn-secondary btn-sm mx-3">Order Now</button></a>
										
									</div>';

					}
					?>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>

<div class="modal small fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"> Delete order? </h4>
			</div>
			<div class="modal-body">
				<h5> Are you sure you want to delete this order? </h5>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default"data-dismiss="modal" aria-hidden="true"> Cancel </button> 
				<a href="order_details.php" class="btn btn-danger" id="modalDelete"> Delete </a>
			</div>
		</div>
	</div>
</div>
<!--=*= DETAIL ORDER SECTION END =*=-->						
<script type="text/javascript">
	$('.deleteButton').click(function(){
		var id = $(this).data('id');
		
		$('#modalDelete').attr('href','dashboard.php?did='+id);
	})
</script>	