
<section class="content">
		<div class="container-fluid">
				<ol class="breadcrumb breadcrumb-bg-pink">
						<li class="active"><a href="javascript:void(0);">จัดการ User</a></li>
				</ol>


				<!-- Basic Examples -->
				<div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="card">
										<div class="header">
												<h2>
														ข้อมูล User

														<div class="pull-right">
															<a href="<?=base_url();?>agent/userForm"><button type="button" class="btn btn-primary btn-lg waves-effect">สร้าง User</button></a>
														</div>
												</h2>



												<div class="clearfix"></div>

										</div>


										<div class="body">
												<div class="table-responsive">
														<table class="table table-bordered table-striped table-hover dataTable" id="userData">
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
																	<?php for ($i=0; $i<count($userData); $i++) { ?>
																		<tr>
																				<td><?=$userData[$i]["userID"];?></td>
																				<td><?=$userData[$i]["username"];?></td>
																				<td><?=$userData[$i]["password"];?></td>
																				<td><?=$userData[$i]["name"];?></td>
																				<td><?=$userData[$i]["surname"];?></td>
																				<td><?=$userData[$i]["telephone"];?></td>
																				<td align="right">
																					<?php
																						if ($userData[$i]["active"] == 1) {
																					?>
																							<button type="button" class="btn bg-pink waves-effect btn-xs" onclick="deactive(<?=$userData[$i]["userID"];?>)">ปิดการใช้งาน</button>
																					<?php
																						} else {
																					?>
																							<button type="button" class="btn btn-info waves-effect btn-xs" onclick="active(<?=$userData[$i]["userID"];?>)">เปิดการใช้งาน</button>
																					<?php
																						}
																					?>
																					<button type="button" class="btn btn-warning waves-effect btn-xs" onclick="edit(<?=$userData[$i]["userID"];?>);">แก้ไข</button>
																					<button type="button" class="btn btn-danger waves-effect btn-xs" onclick="delid(<?=$userData[$i]["userID"];?>);">ลบ</button>
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
			$('#userData').DataTable({
					responsive: true,
					"columnDefs": [ {
					"targets": [6],
					"orderable": false
					} ]
			});
	});

	function edit(id)
	{
		window.location = "<?=base_url();?>agent/userForm/"+id;
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
						userID: id
					};

					$('.page-loader-wrapper').fadeIn();
					var request = $.ajax({
						url: "<?=base_url();?>agent/userFormDelete",
						method: "POST",
						data: formData,
						dataType: "html"
					});

					request.done(function( result ) {
						$('.page-loader-wrapper').fadeOut();
						swal("ลบเรียบร้อย!", "ข้อมูลถูกลบโดยสมบูรณ์.", "success");
						setTimeout(function () {
		            window.location = "<?=base_url();?>agent/manageuser";
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
			userID: id
		};

		$('.page-loader-wrapper').fadeIn();
		var request = $.ajax({
			url: "<?=base_url();?>agent/userFormActive",
			method: "POST",
			data: formData,
			dataType: "html"
		});

		request.done(function( result ) {
			setTimeout(function () {
					$('.page-loader-wrapper').fadeOut();
					window.location = "<?=base_url();?>agent/manageuser";
			}, 50);
		});

		request.fail(function( jqXHR, textStatus ) {
			showNotification("alert-danger", "ไม่สามารถทำรายการได้ กรุณาลองใหม่ !!", "bottom", "right", "", "");
		});
	}

	function deactive(id)
	{
		var formData = {
			userID: id
		};

		$('.page-loader-wrapper').fadeIn();
		var request = $.ajax({
			url: "<?=base_url();?>agent/userFormDeActive",
			method: "POST",
			data: formData,
			dataType: "html"
		});

		request.done(function( result ) {
			setTimeout(function () {
					$('.page-loader-wrapper').fadeOut();
					window.location = "<?=base_url();?>agent/manageuser";
			}, 50);
		});

		request.fail(function( jqXHR, textStatus ) {
			showNotification("alert-danger", "ไม่สามารถทำรายการได้ กรุณาลองใหม่ !!", "bottom", "right", "", "");
		});
	}


</script>
