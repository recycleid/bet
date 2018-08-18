<!-- #Top Bar -->
<section>
		<!-- Left Sidebar -->
		<aside id="leftsidebar" class="sidebar">

				<?php
				if (isset($userData["id"])) {
 				?>
				<!-- User Info -->
				<div class="user-info">
						<div class="image">
								<img src="<?=base_url();?>resource/images/user.png" width="48" height="48" alt="User" />
						</div>
						<div class="info-container">
								<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$userData["name"]." ".$userData["surname"];?></div>
								<div class="email"><?=$userData["role"];?></div>
								<div class="btn-group user-helper-dropdown">
										<i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
										<ul class="dropdown-menu pull-right">
												<li><a href="<?=base_url();?>Home/logout"><i class="material-icons">input</i>ออกจากระบบ</a></li>
										</ul>
								</div>
						</div>
				</div>
				<!-- #User Info -->
				<?php
				}
				?>

				<!-- Menu -->
				<div class="menu">
						<ul class="list">
								<li class="header">เมนู</li>
								<li <?php if($menu == "หน้าแรก") { echo "class='active'"; } ?>>
										<a href="<?=base_url();?>">
												<i class="material-icons">home</i>
												<span>หน้าแรก</span>
										</a>
								</li>
								<li>
										<a href="<?=base_url();?>Login">
												<i class="material-icons">account_box</i>
												<span>เข้าสู่ระบบ</span>
										</a>
								</li>
								<li>
										<a href="#">
												<i class="material-icons">attach_money</i>
												<span>ราคาบอลสเต็ป</span>
										</a>
								</li>
								<li <?php if($menu == "ผลบอล") { echo "class='active'"; } ?>>
										<a href="<?=base_url();?>Home/ballresult">
												<i class="material-icons">brightness_1</i>
												<span>ผลบอล</span>
										</a>
								</li>
								<li>
										<a href="#">
												<i class="material-icons">casino</i>
												<span>คาสิโน</span>
										</a>
								</li>
								<li>
										<a href="#">
												<i class="material-icons">phone_in_talk</i>
												<span>ติดต่อเรา</span>
										</a>
								</li>

								<?php
								if (isset($userData["id"])) {
								?>

								<?php
								if (($userData["role"] == "Agent") || ($userData["role"] == "Administrator")) {
								?>

								<li class="header">Agent</li>
								<li>
										<a href="#">
												<i class="material-icons">person</i>
												<span>รับทรัพย์</span>
										</a>
								</li>

								<?php
								}
								?>

								<?php
								if ($userData["role"] == "Administrator") {
								?>

								<li class="header">Admin</li>
								<li <?php if($menu == "ผู้จัดการระบบ") { echo "class='active'"; } ?>>
										<a href="<?=base_url();?>admin/manageadmin">
												<i class="material-icons">dashboard</i>
												<span>ผู้จัดการระบบ</span>
										</a>
								</li>

								<?php
								}
								?>

								<?php
								}
								?>

						</ul>
				</div>
				<!-- #Menu -->
				<!-- Footer -->
				<div class="legal">
						<div class="copyright">
								&copy; 2018 <a href="javascript:void(0);">InvisibleX</a>.
						</div>
						<div class="version">
								<b>Version: </b> 1.0.0
						</div>
				</div>
				<!-- #Footer -->
		</aside>
		<!-- #END# Left Sidebar -->

</section>
