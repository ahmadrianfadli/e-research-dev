    <?php
	$aksesaplikasi = [];
	if (isset($_SESSION['aksesaplikasi'])) {
		$aksesaplikasi = explode(',', $_SESSION['aksesaplikasi']);
	}
	?>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    	<a href="./dashboard" class="brand-link">
    		<span class="brand-text font-weight-light">RSUD <strong class="font-weight-bold">Pasar Minggu</strong></span>
    	</a>


    	<div class="sidebar">
    		<div class="user-panel mt-2 pb-1 mb-2 d-flex">
    			<div class="image">
    				<?php echo $avatar; ?>
    			</div>
    			<div class="info">
    				<a class="d-block">Logged in as::</a>
    				<strong>
    					<a href="./dashboard" class="d-block text-truncate"><?php echo $this->session->userdata('nama'); ?></a>
    				</strong>
    			</div>
    		</div>

    		<div class="form-inline">
    			<div class="input-group" data-widget="sidebar-search">
    				<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
    				<div class="input-group-append">
    					<button class="btn btn-sidebar">
    						<i class="fas fa-search fa-fw"></i>
    					</button>
    				</div>
    			</div>
    		</div>

    		<nav class="mt-2">
    			<ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
    				<li class="nav-item">
    					<a href="./dashboard" class="nav-link <?php if ($this->uri->segment(1) == "dashboard") {
																	echo "active";
																} ?>">
    						<i class="fas fa-tachometer-alt nav-icon"></i>
    						<p class="text">Dashboard</p>
    					</a>
    				</li>
    				<?php if ($_SESSION['jenisuser'] != 'JLEV11' && $_SESSION['jenisuser'] != 'JLEV16') { ?>
    					<li class="nav-item has-treeview <?php if ($this->uri->segment(1) == "rj" || $this->uri->segment(1) == "ri") {
																echo "menu-open";
															} ?>">
    						<a href="#" class="nav-link <?php if ($this->uri->segment(1) == "rj" || $this->uri->segment(1) == "ri") {
															echo "active";
														} ?>">
    							<i class="fas fa-file-signature nav-icon"></i>
    							<p>
    								E-Klaim BPJS
    								<i class="right fas fa-angle-left"></i>
    							</p>
    						</a>

    						<ul class="nav nav-treeview">
    							<li class="nav-item">
    								<a href="./rj" class="nav-link <?php if ($this->uri->segment(1) == "rj") {
																		echo "active";
																	} ?>">
    									<i class="fa-solid fa-wheelchair nav-icon"></i>
    									<p>Rawat Jalan</p>
    								</a>
    							</li>
    							<li class="nav-item">
    								<a href="./ri" class="nav-link <?php if ($this->uri->segment(1) == "ri") {
																		echo "active";
																	} ?>">
    									<i class="fa-solid fa-bed-pulse nav-icon"></i>
    									<p>Rawat Inap</p>
    								</a>
    							</li>
    						</ul>
    					</li>
    				<?php } ?>
    				<?php if ($_SESSION['jenisuser'] === 'JLEV11' || $_SESSION['jenisuser'] === 'JLEV1' || $_SESSION['jenisuser'] === 'JLEV6' || $_SESSION['jenisuser'] === 'JLEV14' || $_SESSION['jenisuser'] === 'JLEV16') { ?>
    					<li class="nav-item">
    						<a href="./upload" class="nav-link <?php if ($this->uri->segment(1) == "upload") {
																	echo "active";
																} ?>">
    							<i class="fas fa-cloud-upload-alt nav-icon"></i>
    							<p class="text">Upload</p>
    						</a>
    					</li>
    				<?php } ?>
    				<?php if ($_SESSION['jenisuser'] === 'JLEV1' || $_SESSION['jenisuser'] === 'JLEV6' || $_SESSION['jenisuser'] === 'JLEV7' || $_SESSION['jenisuser'] === 'JLEV11' || $_SESSION['jenisuser'] === 'JLEV14' || in_array('ERESEARCHRJ', $aksesaplikasi)) { ?>
    					<li class="nav-item">
    						<a href="./ranap" class="nav-link <?php if ($this->uri->segment(1) == "ranap") {
																	echo "active";
																} ?>">
    							<i class="fas fa-cloud-upload-alt nav-icon"></i>
    							<p class="text">Diagnosa Pasien Ranap</p>
    						</a>
    					</li>
    				<?php } ?>
    			</ul>
    		</nav>
    	</div>
    </aside>