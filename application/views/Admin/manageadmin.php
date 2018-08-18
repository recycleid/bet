
<section class="content">
		<div class="container-fluid">
				<ol class="breadcrumb breadcrumb-bg-pink">
						<li class="active"><a href="javascript:void(0);">ผู้จัดการระบบ</a></li>
				</ol>


				<!-- Basic Examples -->
				<div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="card">
										<div class="header">
												<h2>
														ข้อมูลผู้จัดการระบบ

														<div class="pull-right">
															<a href="<?=base_url();?>admin/adminForm"><button type="button" class="btn btn-primary btn-lg waves-effect">สร้างผู้จัดการระบบ</button></a>
														</div>
												</h2>



												<div class="clearfix"></div>

										</div>


										<div class="body">
												<div class="table-responsive">
														<table class="table table-bordered table-striped table-hover dataTable" id="adminData">
																<thead>
																		<tr>
																				<th>รหัส</th>
																				<th>username</th>
																				<th>password</th>
																				<th>name</th>
																				<th>surname</th>
																				<th>telephone</th>
																				<th></th>
																		</tr>
																</thead>
																<tbody>
																	<?php for ($i=0; $i<count($adminData); $i++) { ?>
																		<tr>
																				<td><?=$adminData[$i]["adminID"];?></td>
																				<td><?=$adminData[$i]["username"];?></td>
																				<td><?=$adminData[$i]["password"];?></td>
																				<td><?=$adminData[$i]["name"];?></td>
																				<td><?=$adminData[$i]["surname"];?></td>
																				<td><?=$adminData[$i]["telephone"];?></td>
																				<td align="right">
																					<?php
																						if ($adminData[$i]["active"] == 1) {
																					?>
																							<button type="button" class="btn bg-pink waves-effect btn-xs" onclick="deactive(<?=$adminData[$i]["adminID"];?>)">ปิดการใช้งาน</button>
																					<?php
																						} else {
																					?>
																							<button type="button" class="btn btn-info waves-effect btn-xs" onclick="active(<?=$adminData[$i]["adminID"];?>)">เปิดการใช้งาน</button>
																					<?php
																						}
																					?>
																					<button type="button" class="btn btn-warning waves-effect btn-xs" onclick="edit(<?=$adminData[$i]["adminID"];?>);">แก้ไข</button>
																					<button type="button" class="btn btn-danger waves-effect btn-xs" onclick="delid(<?=$adminData[$i]["adminID"];?>);">ลบ</button>
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
			$('#adminData').DataTable({
					responsive: true,
					"columnDefs": [ {
					"targets": [6],
					"orderable": false
					} ]
			});
	});

	function edit(id)
	{
		window.location = "<?=base_url();?>admin/adminForm/"+id;
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
						adminID: id
					};

					$('.page-loader-wrapper').fadeIn();
					var request = $.ajax({
						url: "<?=base_url();?>admin/adminFormDelete",
						method: "POST",
						data: formData,
						dataType: "html"
					});

					request.done(function( result ) {
						$('.page-loader-wrapper').fadeOut();
						swal("ลบเรียบร้อย!", "ข้อมูลถูกลบโดยสมบูรณ์.", "success");
						setTimeout(function () {
		            window.location = "<?=base_url();?>admin/manageadmin";
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
			adminID: id
		};

		$('.page-loader-wrapper').fadeIn();
		var request = $.ajax({
			url: "<?=base_url();?>admin/adminFormActive",
			method: "POST",
			data: formData,
			dataType: "html"
		});

		request.done(function( result ) {
			setTimeout(function () {
					$('.page-loader-wrapper').fadeOut();
					window.location = "<?=base_url();?>admin/manageadmin";
			}, 50);
		});

		request.fail(function( jqXHR, textStatus ) {
			showNotification("alert-danger", "ไม่สามารถทำรายการได้ กรุณาลองใหม่ !!", "bottom", "right", "", "");
		});
	}

	function deactive(id)
	{
		var formData = {
			adminID: id
		};

		$('.page-loader-wrapper').fadeIn();
		var request = $.ajax({
			url: "<?=base_url();?>admin/adminFormDeActive",
			method: "POST",
			data: formData,
			dataType: "html"
		});

		request.done(function( result ) {
			setTimeout(function () {
					$('.page-loader-wrapper').fadeOut();
					window.location = "<?=base_url();?>admin/manageadmin";
			}, 50);
		});

		request.fail(function( jqXHR, textStatus ) {
			showNotification("alert-danger", "ไม่สามารถทำรายการได้ กรุณาลองใหม่ !!", "bottom", "right", "", "");
		});
	}


</script>
