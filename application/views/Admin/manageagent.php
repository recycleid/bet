
<section class="content">
		<div class="container-fluid">
				<ol class="breadcrumb breadcrumb-bg-pink">
						<li class="active"><a href="javascript:void(0);">จัดการ Agent</a></li>
				</ol>


				<!-- Basic Examples -->
				<div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="card">
										<div class="header">
												<h2>
														ข้อมูล Agent

														<div class="pull-right">
															<a href="<?=base_url();?>admin/agentForm"><button type="button" class="btn btn-primary btn-lg waves-effect">สร้าง Agent</button></a>
														</div>
												</h2>



												<div class="clearfix"></div>

										</div>


										<div class="body">
												<div class="table-responsive">
														<table class="table table-bordered table-striped table-hover dataTable" id="agentData">
																<thead>
																		<tr>
																				<th>รหัส</th>
																				<th>username</th>
																				<th>password</th>
																				<th>name</th>
																				<th>surname</th>
																				<th>telephone</th>
																				<th>วันที่สร้าง</th>
																				<th>วันหมดอายุ</th>
																				<th></th>
																		</tr>
																</thead>
																<tbody>
																	<?php for ($i=0; $i<count($agentData); $i++) { ?>
																		<tr>
																				<td><?=$agentData[$i]["agentID"];?></td>
																				<td><?=$agentData[$i]["username"];?></td>
																				<td><?=$agentData[$i]["password"];?></td>
																				<td><?=$agentData[$i]["name"];?></td>
																				<td><?=$agentData[$i]["surname"];?></td>
																				<td><?=$agentData[$i]["telephone"];?></td>
																				<td><?=$agentData[$i]["createDate"];?></td>
																				<td><?=$agentData[$i]["expireDate"];?></td>
																				<td align="right">
																					<?php
																						if ($agentData[$i]["active"] == 1) {
																					?>
																							<button type="button" class="btn bg-pink waves-effect btn-xs" onclick="deactive(<?=$agentData[$i]["agentID"];?>)">ปิดการใช้งาน</button>
																					<?php
																						} else {
																					?>
																							<button type="button" class="btn btn-info waves-effect btn-xs" onclick="active(<?=$agentData[$i]["agentID"];?>)">เปิดการใช้งาน</button>
																					<?php
																						}
																					?>
																					<button type="button" class="btn btn-warning waves-effect btn-xs" onclick="edit(<?=$agentData[$i]["agentID"];?>);">แก้ไข</button>
																					<button type="button" class="btn btn-danger waves-effect btn-xs" onclick="delid(<?=$agentData[$i]["agentID"];?>);">ลบ</button>
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
					"targets": [7],
					"orderable": false
					} ]
			});
	});

	function edit(id)
	{
		window.location = "<?=base_url();?>admin/agentForm/"+id;
	}

	function delid(id)
	{

			swal({
					title: "ต้องการลบจริงๆใช่ไหม?",
					text: "หากลบแล้วไม่สามารถกู้กลับมาได้นะ!",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "ลบเลย",
					cancelButtonText: "ไม่ลบดีกว่า!",
					closeOnConfirm: false
			}, function () {
					var formData = {
						agentID: id
					};

					$('.page-loader-wrapper').fadeIn();
					var request = $.ajax({
						url: "<?=base_url();?>admin/agentFormDelete",
						method: "POST",
						data: formData,
						dataType: "html"
					});

					request.done(function( result ) {
						$('.page-loader-wrapper').fadeOut();
						swal("ลบเรียบร้อย!", "ข้อมูลถูกลบโดยสมบูรณ์.", "success");
						setTimeout(function () {
		            window.location = "<?=base_url();?>admin/manageagent";
		        }, 2000);

					});

					request.fail(function( jqXHR, textStatus ) {
						$('.page-loader-wrapper').fadeOut();
						showNotification("alert-danger", "ไม่สามารถลบได้ กรุณาลองใหม่ !!", "bottom", "right", "", "");
					});


			});
	}

	function active(id)
	{
		var formData = {
			agentID: id
		};

		$('.page-loader-wrapper').fadeIn();
		var request = $.ajax({
			url: "<?=base_url();?>admin/agentFormActive",
			method: "POST",
			data: formData,
			dataType: "html"
		});

		request.done(function( result ) {
			setTimeout(function () {
					$('.page-loader-wrapper').fadeOut();
					window.location = "<?=base_url();?>admin/manageagent";
			}, 50);
		});

		request.fail(function( jqXHR, textStatus ) {
			showNotification("alert-danger", "ไม่สามารถทำรายการได้ กรุณาลองใหม่ !!", "bottom", "right", "", "");
		});
	}

	function deactive(id)
	{
		var formData = {
			agentID: id
		};

		$('.page-loader-wrapper').fadeIn();
		var request = $.ajax({
			url: "<?=base_url();?>admin/agentFormDeActive",
			method: "POST",
			data: formData,
			dataType: "html"
		});

		request.done(function( result ) {
			setTimeout(function () {
					$('.page-loader-wrapper').fadeOut();
					window.location = "<?=base_url();?>admin/manageagent";
			}, 50);
		});

		request.fail(function( jqXHR, textStatus ) {
			showNotification("alert-danger", "ไม่สามารถทำรายการได้ กรุณาลองใหม่ !!", "bottom", "right", "", "");
		});
	}


</script>
