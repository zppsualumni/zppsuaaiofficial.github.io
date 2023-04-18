
<!--calendar-->



<div id="layoutSidenav_nav">
	<nav class="sidenav shadow-right" style="background-color: #800000;">
		<div class="sidenav-menu">
			<?php if (isset($_SESSION["login_type"]) && $_SESSION["login_type"] == 1): ?>
				<div class="nav accordion" id="accordionSidenav">
					<!-- Sidenav Menu Heading (Account)-->
					<!-- * * Note: * * Visible only on and above the sm breakpoint-->
					<div class="sidenav-menu-heading d-sm-none text-white">Admin Menu</div>
					<div class="mobile-container container" style="margin-top: 15px; display: none;">
						<hr style="display: none" class="nav-hr mt-0 mb-4" />
					</div>
					<div class="mobile-header-set sidenav-menu-heading text-white">Admin Menu</div>

					<a class="nav-link text-white" href="index.php?page=home" data-bs-toggle="collapse" data-bs-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
						<div class="nav-link-icon"><i data-feather="activity"></i></div>
						Dashboard
						<div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
					</a>
					<a class="nav-link text-white" href="index.php?page=users">
						<div class="nav-link-icon"><i data-feather="user"></i></div>
						Users
					</a>
					<a class="nav-link text-white" href="index.php?page=site_settings">
						<div class="nav-link-icon"><i data-feather="settings"></i></div>
						System Settings
					</a>
					<a class="nav-link text-white" href="print_report.php" class="btn bg-maroon text-white">
						<div class="nav-link-icon"><i data-feather="printer"></i></div>
						Print Report
					</a>

					<a class="nav-link text-white mt-2">
						<div class="nav-link-icon"><i data-feather="calendar"></i></div>
						<span id="date_now"></span>
					</a>

					<script>
						const months = ["January","February","March","April","May","June","July","August","September","October","November","December"];

						const d = new Date();
						let month = months[d.getMonth()];
						document.getElementById("date_now").innerHTML = `${month} ${d.getDate()}, ${d.getFullYear()}`;
					</script>

				</div>
			<?php endif; ?>
		</div>
		<!-- Sidenav Footer-->
		<div class="sidenav-footer">
			<div class="sidenav-footer-content">
				<div class="sidenav-footer-subtitle text-white">Logged in as:</div>
				<div class="sidenav-footer-title text-white"><?php echo $_SESSION['login_name'] ?></div>
			</div>
		</div>
	</nav>
</div>
