
<section class="content">
		<div class="container-fluid">
				<ol class="breadcrumb breadcrumb-bg-pink">
						<li><a href="<?=base_url();?>admin/manageadmin">ผู้จัดการระบบ</a></li>
						<li class="active"><a href="javascript:void(0);">ฟอร์มผู้จัดการระบบ</a></li>
				</ol>


				<!-- Basic Examples -->
				<div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="card">
										<div class="header">
												<h2>
														ฟอร์มผู้จัดการระบบ
												</h2>



												<div class="clearfix"></div>

										</div>


										<div class="body">
											<div class="row clearfix">
													<div class="col-md-4">
															<div class="input-group">
																	<span class="input-group-addon">รหัส</span>
																	<div class="form-line disabled">
																			<input type="text" id="txtid" name="txtid" class="form-control" placeholder="ID" disabled value="<?php if (count($adminData) > 0) { echo $adminData[0]["adminID"]; } ?>">
																	</div>

															</div>

															<div class="input-group">
																	<span class="input-group-addon">ชื่อ</span>
																	<div class="form-line">
																			<input type="text" id="txtname" name="txtname" class="form-control" placeholder="ชื่อ" value="<?php if (count($adminData) > 0) { echo $adminData[0]["name"]; } ?>">
																	</div>
																	<span class="input-group-addon" id="txtname_validate" style="color:red;">กรุณากรอกชื่อ</span>
															</div>

															<div class="input-group">
																	<span class="input-group-addon">นามสกุล</span>
																	<div class="form-line">
																			<input type="text" id="txtsurname" name="txtsurname" class="form-control" placeholder="นามสกุล" value="<?php if (count($adminData) > 0) { echo $adminData[0]["surname"]; } ?>">
																	</div>
																	<span class="input-group-addon" id="txtsurname_validate" style="color:red;">กรุณากรอกนามสกุล</span>
															</div>

															<div class="input-group">
																	<span class="input-group-addon">เบอร์โทรศัพท์</span>
																	<div class="form-line">
																			<input type="text" id="txttel" name="txttel" class="form-control" placeholder="เบอร์โทรศัพท์" value="<?php if (count($adminData) > 0) { echo $adminData[0]["telephone"]; } ?>">
																	</div>
																	<span class="input-group-addon" id="txttel_validate" style="color:red;">กรุณากรอกเบอร์โทรศัพท์</span>
															</div>

															<div class="input-group">
																	<span class="input-group-addon">Username</span>
																	<div class="form-line">
																			<input type="text" id="txtusername" name="txtusername" class="form-control" placeholder="Username" value="<?php if (count($adminData) > 0) { echo $adminData[0]["username"]; } ?>">
																	</div>
																	<span class="input-group-addon" id="txtusername_validate" style="color:red;">กรุณากรอก Username</span>
															</div>

															<div class="input-group">
																	<span class="input-group-addon">Password</span>
																	<div class="form-line">
																			<input type="password" id="txtpassword" name="txtpassword" class="form-control" placeholder="Password" value="<?php if (count($adminData) > 0) { echo $adminData[0]["password"]; } ?>">
																	</div>
																	<span class="input-group-addon" id="txtpassword_validate" style="color:red;">กรุณากรอก Password</span>
															</div>

															<div class="input-group">
																	<span class="input-group-addon">Re-Password</span>
																	<div class="form-line">
																			<input type="password" id="txtrepassword" name="txtrepassword" class="form-control" placeholder="Re-Password" value="<?php if (count($adminData) > 0) { echo $adminData[0]["password"]; } ?>">
																	</div>
																	<span class="input-group-addon" id="txtrepassword_validate" style="color:red;">กรุณากรอก Re-Password</span>
															</div>

															<hr>

															<button type="button" class="btn btn-success btn-lg waves-effect" onclick="save();">บันทึก</button>
													</div>
											</div>
										</div>
								</div>
						</div>
				</div>

		</div>
</section>

<div id="alert-area">

</div>

<script type="text/javascript">
	$( document ).ready(function() {
		hide_allvalidate();
	});



	function hide_allvalidate()
	{
		$("#txtname_validate").hide();
		$("#txtsurname_validate").hide();
		$("#txttel_validate").hide();
		$("#txtusername_validate").hide();
		$("#txtpassword_validate").hide();
		$("#txtrepassword_validate").hide();
	}

	function save()
	{
		var validate = 0;

		$("#txtname_validate").hide();
		if ($("#txtname").val() == "") {
			$("#txtname_validate").show();
			validate = 1;
		}

		$("#txtsurname_validate").hide();
		if ($("#txtsurname").val() == "") {
			$("#txtsurname_validate").show();
			validate = 1;
		}

		$("#txttel_validate").hide();
		if ($("#txttel").val() == "") {
			$("#txttel_validate").show();
			validate = 1;
		}

		$("#txtusername_validate").hide();
		if ($("#txtusername").val() == "") {
			$("#txtusername_validate").show();
			validate = 1;
		}

		$("#txtpassword_validate").hide();
		if ($("#txtpassword").val() == "") {
			$("#txtpassword_validate").show();
			validate = 1;
		}

		$("#txtrepassword_validate").hide();
		if ($("#txtrepassword").val() == "") {
			$("#txtrepassword_validate").show();
			validate = 1;
		}

		$("#txtrepassword_validate").html("กรุณากรอก Re-Password");
		if ($("#txtrepassword").val() != $("#txtpassword").val()) {
			$("#txtrepassword_validate").html("กรุณากรอก Password ให้ตรงกัน");
			$("#txtrepassword_validate").show();
			validate = 1;
		}



		if (validate == 1) {
			return false;
		}

		var formData = {
			adminID: $("#txtid").val(),
			username: $("#txtusername").val(),
			password: $("#txtpassword").val(),
			name: $("#txtname").val(),
			surname: $("#txtsurname").val(),
			telephone: $("#txttel").val()
		};

		$('.page-loader-wrapper').fadeIn();
		var request = $.ajax({
		  url: "<?=base_url();?>admin/adminFormSave",
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
			$('.page-loader-wrapper').fadeOut();
			showNotification("alert-danger", "ไม่สามารถบันทึกได้นะ !!", "bottom", "right", "", "");
		});


	}

	function showNotification(colorName, text, placementFrom, placementAlign, animateEnter, animateExit) {
	    if (colorName === null || colorName === '') { colorName = 'bg-black'; }
	    if (text === null || text === '') { text = 'Turning standard Bootstrap alerts'; }
	    if (animateEnter === null || animateEnter === '') { animateEnter = 'animated fadeInDown'; }
	    if (animateExit === null || animateExit === '') { animateExit = 'animated fadeOutUp'; }
	    var allowDismiss = true;

	    $.notify({
	        message: text
	    },
	        {
	            type: colorName,
	            allow_dismiss: allowDismiss,
	            newest_on_top: true,
	            timer: 1000,
	            placement: {
	                from: placementFrom,
	                align: placementAlign
	            },
	            animate: {
	                enter: animateEnter,
	                exit: animateExit
	            },
	            template: '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' + (allowDismiss ? "p-r-35" : "") + '" role="alert">' +
	            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
	            '<span data-notify="icon"></span> ' +
	            '<span data-notify="title">{1}</span> ' +
	            '<span data-notify="message">{2}</span>' +
	            '<div class="progress" data-notify="progressbar">' +
	            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
	            '</div>' +
	            '<a href="{3}" target="{4}" data-notify="url"></a>' +
	            '</div>'
	        });
	}
</script>
