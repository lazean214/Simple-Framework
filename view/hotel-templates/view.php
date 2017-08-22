<?php include('view/header.php'); ?>
<?php

if($arg){
	foreach($_SESSION['hotels'] as $one => $two){
		if(array_key_exists($arg, $two)){
			foreach($two as $k => $v){
				foreach( $v as $rows => $row){
					if($row->hotelId == $arg){
						//var_dump($row);
						$details = json_decode($row->room_details);
?>



<div class="page-banner"></div>
<div class="negative-space my-5">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<img class="card-img-top img-fluid" src="<?php echo $row->thumb; ?>" alt="Card image cap">
					<div class="card-body bg-danger">
						<h4 class="card-title text-light"><?php echo $row->hotel_name; ?></h4>
						<div class="d-flex justify-content-between text-light">
							<div class="w-100"><small><?php echo $row->Address ?></small></div>
						</div>
						<div class="d-flex justify-content-between text-light">
							<div class="p-6">Per Night</div>
							<div class="p-6"><strong><?php echo $details[0]->Currency ?> <?php echo $details[0]->ItemPrice ?></strong> </div>
						</div>
						<div class="d-flex justify-content-between text-light">
							<div class="p-6">Room Type</div>
							<div class="p-6"><strong><?php echo $details[0]->Description ?></strong></div>
						</div>
						<div class="d-flex justify-content-between text-light">
							<div class="p-6">Meal</div>
							<div class="p-6"><strong><?php echo $details[0]->Meals->Basis ?></strong></div>
						</div>
						<div class="d-flex justify-content-between text-light">
							<div class="p-6">Booking Date</div>
							<div class="p-6"><strong><?php echo $details[0]->startDate ?></strong></div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="row my-3">
			<div class="col-md-8 my-4">
				<div>
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" href="#description" role="tab" data-toggle="tab"><i class="fa fa-file-text"></i> DESCRIPTION</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#options" role="tab" data-toggle="tab"><i class="fa fa-cogs"></i> Room Options</a>
						</li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade show active" id="description">
							<h4>About <?php echo $row->hotel_name; ?></h4>
							<p><?php echo $row->desc ?></p>
							<div class="row">
								<div class="col">
									<h4>Hotel Facilities</h4>
									<?php 
							$hotelFac = json_decode($row->hotel_facilities); 
						echo "<ul>";						  
						foreach( $hotelFac as $fac){
							echo "<li>" .$fac. "</li>";
						}
						echo "</ul>";
									?>
								</div>
								<div class="col">
									<h4>Room Amenities</h4>
									<?php 
						$amenities = json_decode($row->room_facilities); 
						echo "<ul>";						  
						foreach( $amenities as $amen){
							echo "<li>" .$amen. "</li>";
						}
						echo "</ul>";
									?></div>
							</div>
							<h4>Cancellation Policy</h4>
							<ul>
								<li><?php echo $details[0]->Conditions[0] ?></li>
								<li><?php echo $details[0]->Conditions[1] ?></li>
								<li><?php echo $details[0]->Conditions[2] ?></li>
							</ul>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="options">
							<?php 
										$cat = count($row->room_categories);			
						foreach($row->room_categories as $roomK => $roomV){ ?>
							<div class="card mb-3">
								<div class="card-header bg-facebook">
									<strong><?php echo $roomV->Description ?></strong>
									<span class="pull-right text-light btn btn-danger btn-sm"><strong><?php echo $roomV->Currency ?> <?php echo $roomV->ItemPrice ?></strong></span>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-6">
											<div class="d-flex justify-content-between">
												<div class="p-6">Availability</div>
												<div class="p-6"><?php echo $roomV->Confirmation ?></div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="d-flex justify-content-between">
												<div class="p-6">Board Base</div>
												<div class="p-6"><?php echo $roomV->Meals->Basis ?></div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="d-flex justify-content-between">
												<div class="p-6">Date</div>
												<div class="p-6">
													<?php
							$fDate = date_create($roomV->HotelRoomPrices->DateRange->FromDate);
																		   $tDate = date_create($roomV->HotelRoomPrices->DateRange->FromDate);
																		   $fromDate = date_format($fDate, 'F d, Y');
																		   $toDate = date_format($tDate, 'F d, Y');
																		   echo $fromDate ?> - <?php echo $toDate ?>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="d-flex justify-content-between">
												<div class="p-6">&nbsp;</div>
												<div class="p-6">
													<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#<?php echo str_replace(" ", "-", $roomV->Description) . "_" . str_replace(" ", "-", $roomV->Meals->Basis) ?>">Cancellation Policy</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- Modal -->
								<div class="modal fade" id="<?php echo str_replace(" ", "-", $roomV->Description) . "_" . str_replace(" ", "-", $roomV->Meals->Basis) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Cancellation Policy</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<ul>
													<?php 
																			   $conditions = $roomV->ChargeConditions->ChargeCondition[0]->Condition; 
																		   foreach($conditions as $k => $v){ 
																			   $frm = date_create($v->FromDate);
																			   if ($v->ToDate)
																			   { $to = date_create($v->ToDate);}
																			  
																			   $frmDate = date_format($frm, 'F d, Y');
																			   $toDate = date_format($to, 'F d, Y');
													?>
													<li>From <?php echo $frmDate ?>
														<?php if ($v->ChargeAmount == ''){
														echo "NO Cancellation Fee.";
													}else{
														echo " to " . $toDate . ", Cancellation fee is ". $v->Currency . " " . $v->ChargeAmount;
													} ?>
														<?php echo $v->Currency ?> <?php echo $v->ChargeAmount ?></li>
													<?php } ?>
												</ul>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>

			</div>
			<div class="col-md-4">
				<div class="social my-2">
					<div class="d-inline-block hidden-sm hidden-xs">
						<i class="fa fa-share-alt" title="Share"></i>
					</div>
					<div class="d-inline-block bg-facebook rounded">
						<i class="fa fa-facebook"></i>
					</div>
					<div class="d-inline-block bg-google">
						<i class="fa fa-google-plus"></i>
					</div>
					<div class="d-inline-block bg-twitter">
						<i class="fa fa-twitter"></i>
					</div>
					<div class="d-inline-block bg-vk">
						<i class="fa fa-vk"></i>
					</div>
					<div class="d-inline-block bg-tumblr">
						<i class="fa fa-tumblr"></i>
					</div>
					<div class="d-inline-block bg-whatsapp">
						<i class="fa fa-whatsapp"></i>
					</div>
				</div>
				<div class="card card-body my-3">
					<h4 class="card-title">Hotel Booking Search</h4>
					<div id="siteloader"></div>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
					<script>$("#siteloader").html('<object data="https://southtravels.com/widget" style="height: 550px; width: 100%;" />');</script>
				</div>
			</div>
		</div>
	</div>
</div>	
<?php						
					}
				}
			}
		}
	}
}
?>
<?php include('view/footer.php'); ?>