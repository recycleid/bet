
<section class="content">
		<div class="container-fluid">
				<ol class="breadcrumb breadcrumb-bg-pink">
						<li class="active"><a href="javascript:void(0);">ต่ออายุ Agent</a></li>
				</ol>


				<!-- Basic Examples -->
				<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								<div class="card">
										<div class="header">
												<h2>
														อัตราค่าต่อสมาชิก
												</h2>
												<div class="clearfix"></div>

										</div>


										<div class="body">
											<div class="row clearfix">
												<table class="table">
													<thead>
														<th><center>จำนวนวัน</center></th>
														<th><center>ราคา</center></th>
													</thead>

													<tbody>
														<?php for($i=0; $i<count($rate); $i++) { ?>
															<tr>
																<td align="center"><?=$rate[$i]["days"];?></td>
																<td align="center"><?=number_format($rate[$i]["rate"]);?></td>
															</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>
										</div>
								</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
								<div class="card">
										<div class="header">
												<h2>
														ต่อสมาชิก
												</h2>
												<div class="clearfix"></div>

										</div>


										<div class="body">
											<div class="row clearfix">
												<form id="frmsubscription" name="subscription" method="post" enctype="multipart/form-data">
												<div class="col-md-12">
													<div class="input-group">
															<span class="input-group-addon">เบอร์ติดต่อ</span>
															<div class="form-line">
																	<input type="text" id="txttel" name="txttel" class="form-control" placeholder="เบอร์ติดต่อ" value="<?=$userData["telephone"];?>" >
															</div>
															<span class="input-group-addon" id="txttel_validate" style="color:red;">กรุกรุณากรอกเบอร์โทรศัพท์</span>
													</div>

													<div class="input-group">
															<span class="input-group-addon">จำนวนวัน</span>

																<select class="form-control show-tick" id="seldays" name="seldays">
																	<?php for($i=0; $i<count($rate); $i++) { ?>
																		<option value="<?=$rate[$i]['rate'];?>"><?=$rate[$i]["days"];?></option>
																	<?php } ?>
																</select>

													</div>

													<div class="input-group">
															<span class="input-group-addon">ราคา</span>

															<div class="form-line disabled">
																	<input type="text" id="txtrate" name="txtrate" class="form-control" placeholder="ราคา" readonly="readonly" value="5,000"  >
															</div>

													</div>

													<div class="input-group">
															<span class="input-group-addon">สลิป</span>

															<div class="form-line">
																	<input type="file" id="txtslip" name="txtslip" class="form-control"  accept="image/x-png,image/gif,image/jpeg"  >
															</div>
															<span class="input-group-addon" id="txtslip_validate" style="color:red;">กรุณาอัพโหลด Slip</span>

													</div>



												</div>

												<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"></div>

												<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
													<button type="button" class="btn bg-blue btn-block btn-lg waves-effect" onclick="save();">ต่ออายุ</button>
												</div>


												</form>
											</div>
										</div>
								</div>
						</div>
				</div>

				<div id="testpix"></div>
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
		$("#txttel_validate").hide();
		$("#txtslip_validate").hide();
	}

	function save()
	{
		var validate = 0;

		$("#txttel_validate").hide();
		if ($("#txttel").val() == "") {
			$("#txttel_validate").show();
			validate = 1;
		}

		$("#txtslip_validate").hide();
		if ($("#txtslip").val() == "") {
			$("#txtslip_validate").show();
			validate = 1;
		}


		if (validate == 1) {
			return false;
		}


		var formData = new FormData();
		formData.append('agentID', <?=$this->session->userdata("id");?>);
		formData.append('days', $("seldays").html());
		formData.append('rate', $("txtrate").val());
		formData.append('slip', $('#txtslip')[0].files[0]);

		$('.page-loader-wrapper').fadeIn();
		var request = $.ajax({
		  url: "<?=base_url();?>agent/saveSubsciption",
		  method: "POST",
		  data: formData,
			processData: false,
      contentType: false,
      cache: false,
		  dataType: "html",
			enctype: "multipart/form-data"
		});

		request.done(function( result ) {
			setTimeout(function () {
				$('.page-loader-wrapper').fadeOut();
				//window.location = "<?=base_url();?>agent/subscription";
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
