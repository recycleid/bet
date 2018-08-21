
<section class="content">
		<div class="container-fluid">
				<ol class="breadcrumb breadcrumb-bg-pink">
						<li class="active"><a href="javascript:void(0);">ต่ออายุ Agent</a></li>
				</ol>


				<!-- Basic Examples -->
				<div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="card">
										<div class="header">
												<h2>
														ข้อมูลการต่ออายุ Agent
												</h2>



												<div class="clearfix"></div>

										</div>


										<div class="body">
												<div class="table-responsive">
														<table class="table table-bordered table-striped dataTable" id="agentData">
																<thead>
																		<tr>
																				<th>วันที่ทำรายการ</th>
																				<th>agentID</th>
																				<th>ชื่อ-นามสกุล</th>
																				<th>เบอร์โทรศัพท์</th>
																				<th>จำนวนวัน</th>
																				<th>จำนวนเงิน</th>
																				<th>สลิป</th>
																				<th>สถานะ</th>
																				<th></th>
																		</tr>
																</thead>
																<tbody>
																	<?php
																		for ($i=0; $i<count($ssData); $i++) {

																			$status = "-";
																			$trColor = "";
																			if ($ssData[$i]["status"] == "0") {
																				$status = "ยกเลิกรายการ";
																				$trColor = "bg-red";
																			} else if ($ssData[$i]["status"] == "1") {
																				$status = "รอการยืนยัน";
																				$trColor = "bg-teal";
																			} else if ($ssData[$i]["status"] == "2") {
																				$status = "ต่ออายุเรียบร้อย";
																				$trColor = "bg-cyan";
																			} else {
																				$status = "-";
																			}


																	?>
																		<tr class="<?=$trColor;?>">
																				<td><?=date("d M Y H:i:s",strtotime($ssData[$i]["createDate"]));?></td>
																				<td><?=$ssData[$i]["agentID"];?></td>
																				<td><?=$ssData[$i]["name"]." ".$ssData[$i]["surname"];?></td>
																				<td><?=$ssData[$i]["telephone"];?></td>
																				<td><?=$ssData[$i]["days"];?></td>
																				<td><?=number_format($ssData[$i]["rate"]);?></td>
																				<td><a href="javascript:void(0)" onclick="seeSlip('<?=date("d M Y H:i:s",strtotime($ssData[$i]["createDate"]));?>','<?=$ssData[$i]["slip"];?>')"><i class="material-icons">description</i></a></td>
																				<td><?=$status;?></td>
																				<td align="right">
																					<?php
																					if ($ssData[$i]["status"] == "1") {
																					?>
																						<button type="button" class="btn bg-indigo waves-effect" onclick="Approve(<?=$ssData[$i]["subscriptionID"];?>);">อนุมัติ</button>
																						<button type="button" class="btn btn-danger waves-effect" onclick="noApprove(<?=$ssData[$i]["subscriptionID"];?>);">ยกเลิกรายการ</button>
																					<?php
																					}
																					?>
																				</td>
																		</tr>
																	<?php } ?>
																</tbody>
														</table>
												</div>
										</div>
								</div>
						</div>
				</div>
				<!-- #END# Basic Examples -->

		</div>
</section>


<script type="text/javascript">
	$( document ).ready(function() {
			$('#agentData').DataTable({
					responsive: true,
					"columnDefs": [ {
					"targets": [8],
					"orderable": false
					} ]
			});
	});

	function Approve(id)
	{

			swal({
					title: "ยืนยันการต่ออายุ?",
					text: "ตรวจสอบสลิปให้ดีๆก่อนนะ!",
					type: "info",
					showCancelButton: true,
					confirmButtonColor: "#2b982b",
					confirmButtonText: "ต่ออายุ",
					cancelButtonText: "ตรวจสอบอีกรอบ",
					closeOnConfirm: false
			}, function () {
					var formData = {
						subscriptionID: id
					};

					$('.page-loader-wrapper').fadeIn();
					var request = $.ajax({
						url: "<?=base_url();?>admin/renewSubscription",
						method: "POST",
						data: formData,
						dataType: "html"
					});

					request.done(function( result ) {
						$('.page-loader-wrapper').fadeOut();
						swal("ต่ออายุเรียบร้อย!", "ลองตรวจสอบข้อมูลดู.", "success");
						setTimeout(function () {
		            window.location = "<?=base_url();?>admin/managesubscript";
		        }, 2000);

					});

					request.fail(function( jqXHR, textStatus ) {
						$('.page-loader-wrapper').fadeOut();
						showNotification("alert-danger", "ไม่สามารถทำราการได้ กรุณาลองใหม่ !!", "bottom", "right", "", "");
					});


			});
	}

	function noApprove(id)
	{

			swal({
					title: "ยืนยันการยกเลิกรายการ?",
					text: "ตรวจสอบข้อมูลดีๆก่อนนะ!",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "ยกเลิกรายการ",
					cancelButtonText: "ตรวจสอบอีกรอบ",
					closeOnConfirm: false
			}, function () {
					var formData = {
						subscriptionID: id
					};

					$('.page-loader-wrapper').fadeIn();
					var request = $.ajax({
						url: "<?=base_url();?>admin/cancelSubscription",
						method: "POST",
						data: formData,
						dataType: "html"
					});

					request.done(function( result ) {
						$('.page-loader-wrapper').fadeOut();
						swal("ยกเลิกรายการเรียบร้อย!", "ลองตรวจสอบข้อมูลดู.", "success");
						setTimeout(function () {
		            window.location = "<?=base_url();?>admin/managesubscript";
		        }, 2000);

					});

					request.fail(function( jqXHR, textStatus ) {
						$('.page-loader-wrapper').fadeOut();
						showNotification("alert-danger", "ไม่สามารถทำราการได้ กรุณาลองใหม่ !!", "bottom", "right", "", "");
					});


			});
	}

	function seeSlip(title,image)
	{
		swal({
        title: "",
        text: "<img src='<?=base_url();?>"+image+"'>",
				html: true
    });
	}


</script>
