    <!DOCTYPE html>
	<html lang="en">
	<!--begin::Head-->
	<head><base href="../"/>
		<title>Admin-Panel</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="Admin/assets/media/logos/favicon.ico" />
		<!--begin::Fonts(mandatory for all pages)-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
		<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<!--end::Fonts-->
		<!--begin::Vendor Stylesheets(used for this page only)-->
		<link href="Admin/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<link href="Admin/assets/plugins/custom/vis-timeline/vis-timeline.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="Admin/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="Admin/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="Admin/assets/js/myjs.js"></script>
		<script src="Admin/assets/js/myjsajax.js"></script>
		<!--end::Global Stylesheets Bundle-->
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" class="header align-items-stretch mb-5 mb-lg-10" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
						<!--begin::Container-->
						<div class="container-xxl d-flex align-items-center">
							<!--begin::Heaeder menu toggle-->
							<div class="d-flex topbar align-items-center d-lg-none ms-n2 me-3" title="Show aside menu">
								<div class="btn btn-icon btn-active-light-primary btn-custom w-30px h-30px w-md-40px h-md-40px" id="kt_header_menu_mobile_toggle">
									<i class="ki-duotone ki-abstract-14 fs-1">
										<span class="path1"></span>
										<span class="path2"></span>
									</i>
								</div>
							</div>
							<!--end::Heaeder menu toggle-->
							<!--begin::Header Logo-->
							<div class="header-logo me-5 me-md-10 flex-grow-1 flex-lg-grow-0">
								<a href="Admin/dashboard.php">
									<img alt="Logo" src="Admin/assets/media/logos/demo2.png" class="logo-default h-25px" />
									<img alt="Logo" src="Admin/assets/media/logos/demo2-sticky.png" class="logo-sticky h-25px" />
								</a>
							</div>
							<!--end::Header Logo-->
							<!--begin::Wrapper-->
							<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
								<!--begin::Navbar-->
								<div class="d-flex align-items-stretch" id="kt_header_nav">
									<!--begin::Menu wrapper-->
									<div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
										<!--begin::Menu-->
										<div class="menu menu-rounded menu-column menu-lg-row menu-active-bg menu-title-gray-700 menu-state-primary menu-arrow-gray-400 fw-semibold my-5 my-lg-0 align-items-stretch px-2 px-lg-0" id="#kt_header_menu" data-kt-menu="true">
											<!--begin:Menu item-->
											
											<div  data-kt-menu-placement="bottom-start" class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
												<a href="Admin/dashboard.php" class="menu-link py-3">
													<span class="menu-title">Dashboards</span>
													<span class="menu-arrow d-lg-none"></span>
													
												</a>
											</div>
										
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-0 me-lg-2">
												<!--begin:Menu link-->
												<a href="Admin/allstudent.php" class="menu-link py-3">
													<span class="menu-title">View Students</span>
													<span class="menu-arrow d-lg-none"></span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div  data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
												<!--begin:Menu link-->
												<a href="Admin/payment.php" class="menu-link py-3">
													<span class="menu-title">Payment History</span>
													<span class="menu-arrow d-lg-none"></span>
												</a>
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div  data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
												<!--begin:Menu link-->
												<a href="Admin/expense.php" class="menu-link py-3">
													<span class="menu-title">Expense</span>
													<span class="menu-arrow d-lg-none"></span>
												</a>
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
												<!--begin:Menu link-->
												<a href="Admin/loans.php" class="menu-link py-3">
													<span class="menu-title">Loan</span>
													<span class="menu-arrow d-lg-none"></span>
												</a>
											</div>
											<!--end:Menu item-->
										</div>
										<!--end::Menu-->
									</div>
									<!--end::Menu wrapper-->
								</div>
								<!--end::Navbar-->
								<!--begin::Toolbar wrapper-->
								<div class="topbar d-flex align-items-stretch flex-shrink-0">
									<!--begin::Search-->
									<div class="d-flex align-items-stretch ms-1 ms-lg-3">
										<!--begin::Search-->
										<div id="kt_header_search" class="header-search d-flex align-items-stretch" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="menu" data-kt-menu-trigger="auto" data-kt-menu-overflow="false" data-kt-menu-permanent="true" data-kt-menu-placement="bottom-end">
											<!--begin::Search toggle-->
											<div class="d-flex align-items-center" data-kt-search-element="toggle" id="kt_header_search_toggle">
												<div class="btn btn-icon btn-active-light-primary btn-custom w-30px h-30px w-md-40px h-md-40px">
													<i class="ki-duotone ki-magnifier fs-1">
														<span class="path1"></span>
														<span class="path2"></span>
													</i>
												</div>
											</div>
											<!--end::Search toggle-->
											<!--begin::Menu-->
											<div data-kt-search-element="content" class="menu menu-sub menu-sub-dropdown p-7 w-325px w-md-375px">
												<!--begin::Wrapper-->
												<div data-kt-search-element="wrapper">
													<!--begin::Form-->
													<form data-kt-search-element="form" class="w-100 position-relative mb-3" autocomplete="off">
														<!--begin::Icon-->
														<i class="ki-duotone ki-magnifier fs-2 text-gray-500 position-absolute top-50 translate-middle-y ms-0">
															<span class="path1"></span>
															<span class="path2"></span>
														</i>
														<!--end::Icon-->
														<!--begin::Input-->
														<input type="text" class="search-input form-control form-control-flush ps-10" name="search" value="" placeholder="Search..." data-kt-search-element="input" />
														<!--end::Input-->
														<!--begin::Spinner-->
														<span class="search-spinner position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-1" data-kt-search-element="spinner">
															<span class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
														</span>
														<!--end::Spinner-->
														<!--begin::Reset-->
														<span class="search-reset btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 d-none" data-kt-search-element="clear">
															<i class="ki-duotone ki-cross fs-2 fs-lg-1 me-0">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
														</span>
														<!--end::Reset-->	
                                                    </form>
                                                </div>
											</div>
											<!--end::Menu-->
										</div>
										<!--end::Search-->
									</div>
									<!--end::Search-->
									
									<!--begin::Theme mode-->
									<div class="d-flex align-items-center ms-1 ms-lg-3">
										<!--begin::Menu toggle-->
										<a href="#" class="btn btn-icon btn-active-light-primary btn-custom w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
											<i class="ki-duotone ki-night-day theme-light-show fs-1">
												<span class="path1"></span>
												<span class="path2"></span>
												<span class="path3"></span>
												<span class="path4"></span>
												<span class="path5"></span>
												<span class="path6"></span>
												<span class="path7"></span>
												<span class="path8"></span>
												<span class="path9"></span>
												<span class="path10"></span>
											</i>
											<i class="ki-duotone ki-moon theme-dark-show fs-1">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</a>
										<!--begin::Menu toggle-->
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
											<!--begin::Menu item-->
											<div class="menu-item px-3 my-0">
												<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
													<span class="menu-icon" data-kt-element="icon">
														<i class="ki-duotone ki-night-day fs-2">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
															<span class="path4"></span>
															<span class="path5"></span>
															<span class="path6"></span>
															<span class="path7"></span>
															<span class="path8"></span>
															<span class="path9"></span>
															<span class="path10"></span>
														</i>
													</span>
													<span class="menu-title">Light</span>
												</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3 my-0">
												<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
													<span class="menu-icon" data-kt-element="icon">
														<i class="ki-duotone ki-moon fs-2">
															<span class="path1"></span>
															<span class="path2"></span>
														</i>
													</span>
													<span class="menu-title">Dark</span>
												</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3 my-0">
												<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
													<span class="menu-icon" data-kt-element="icon">
														<i class="ki-duotone ki-screen fs-2">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
															<span class="path4"></span>
														</i>
													</span>
													<span class="menu-title">Profile</span>
												</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</div>
									<!--end::Theme mode-->
									<!--begin::User-->
									<div class="d-flex align-items-center me-lg-n2 ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
										<!--begin::Menu wrapper-->
										<div class="btn btn-icon btn-active-light-primary btn-custom w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
											<img class="h-30px w-30px rounded" src="Admin/assets/media/avatars/300-2.jpg" alt="" />
										</div>
										<!--begin::User account menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<div class="menu-content d-flex align-items-center px-3">
													<!--begin::Avatar-->
													<div class="symbol symbol-50px me-5">
														<img alt="Logo" src="Admin/assets/media/avatars/300-2.jpg" />
													</div>
													<!--end::Avatar-->
													<!--begin::Username-->
													<div class="d-flex flex-column">
														<div class="fw-bold d-flex align-items-center fs-5">Max Smith
														<span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span></div>
														<a href="#" class="fw-semibold text-muted text-hover-primary fs-7">max@kt.com</a>
													</div>
													<!--end::Username-->
												</div>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu separator-->
											<div class="separator my-2"></div>
											<!--end::Menu separator-->
											<!--begin::Menu item-->
											<div class="menu-item px-5">
												<a href="../../demo2/dist/account/overview.html" class="menu-link px-5">My Profile</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::User account menu-->
										<!--end::Menu wrapper-->
									</div>
									<!--end::User -->
									<!--begin::Aside mobile toggle-->
									<!--end::Aside mobile toggle-->
								</div>
								<!--end::Toolbar wrapper-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
				


					<!--start::Modal-->
					<div class="modal fade " id="addstudentmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
						<div class="modal-dialog modal-lg" style="max-width: 90%; !important" role="document">
						  <div class="modal-content">
							<div class="modal-header">
							  <h5 class="modal-title" id="exampleModalLabel">New Student</h5>
							  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<div class="row p-2">
									<div class=" col-6">
									<div class="p-2">
											<i class="fa-solid fa-1 text-dark"></i>
											<h3 class="text-dark mt-2">Details</h3>
											<p class="text-muted mb-0">Student Information</p>
											
											
											<form action="#" method="POST" target="_blank" class="p-5">
												<input type="hidden" name="type" value="export" />
												<div class="mb-5">
													<label class="form-label fs-6 fw-bold text-muted">Phone</label>
													<input type="text" name="studentnum" id="studentNum" class=" fw-bold form-control custom-select" style="background-color: #f8f9fa;
													border: 1px solid #ced4da;font-size: 16px;"  />
												</div>
		
												<div class="mb-5">
													<label class="form-label fs-6 fw-bold text-muted">Name</label>
													<input type="text" name="studentname" id="studentName" class=" fw-bold form-control custom-select" style="background-color: #f8f9fa;
													border: 1px solid #ced4da;font-size: 16px;"  />
												</div>
	
												<div class="mb-5">
													<div class="row">
														<div class="col-6">
															<label class="form-label fs-6 fw-bold text-muted">Date of Birth</label>
															<input type="date" name="studentdob" id="studentDob" class=" fw-bold form-control custom-select" style="background-color: #f8f9fa;
															border: 1px solid #ced4da;font-size: 16px;" />
														</div>
														<div class="col-6">
															<label class="form-label text-muted fs-6 fw-bold ">Gender</label>
															<select name="studentgender" id="studentgender" class=" fw-bold form-control  custom-select" style="background-color: #f8f9fa;
															border: 1px solid #ced4da;font-size: 16px;">
																<option selected disabled value >--gender--</option>
																<option value="male" >Male</option>
																<option value="female" >Female</option>
																<option value="other" >Other</option>
															</select>
														</div>
													</div>
												</div>
												
												<div class="mb-5">
													<label class="form-label fs-6 fw-bold text-muted">Guardian Phone No</label>
													<input type="text" name="studentguardian" id="studentGuardian" class=" fw-bold text-muted form-control custom-select" style="background-color: #f8f9fa;
													border: 1px solid #ced4da;font-size: 16px;" />
												</div>
												<div class="mb-5">
													<label class="form-label fs-6 fw-bold text-muted">College name</label>
													<input type="text" name="studentcollege" id="studentCollege" class=" fw-bold form-control custom-select" style="background-color: #f8f9fa;
													border: 1px solid #ced4da;font-size: 16px;" placeholder="( optional )"/>
												</div>
												<div class="mb-5">
													<div class="row">
														<div class="col-6">
															<label class="form-label fs-6 fw-bold text-muted">SSC Roll</label>
															<input type="text" name="studentsscroll" id="studentSSCRoll" class=" fw-bold form-control custom-select" style="background-color: #f8f9fa;
															border: 1px solid #ced4da;font-size: 16px;" placeholder="( optional )"/>
														</div>
														<div class="col-6">
															<label class="form-label fs-6 fw-bold text-muted">HSC Roll</label>
															<input type="text" name="studenthscroll" id="studentHSCRollr" class=" fw-bold form-control custom-select" style="background-color: #f8f9fa;
															border: 1px solid #ced4da;font-size: 16px;" placeholder="( optional )"/>
																
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
									<div class="col-6">
										<div class="p-2">
											<div class="row p-2">
												<i class="fa-solid fa-2 text-dark"></i>
												<h3 class="text-dark mt-2">Course</h3>
												<p class="text-muted mb-0">Course & Batch Information</p>
												<form action="#" method="POST" target="_blank" class="p-5">
													<input type="hidden" name="type" value="export" />
													<div class="mb-5">
														<label class="form-label fs-6 text-muted fw-bold ">Course</label>
															<select name="studentcourse" id="studentCourse" class=" fw-bold  form-control custom-select" style="background-color: #f8f9fa;
																border: 1px solid #ced4da;font-size: 16px;">
																<option selected disabled value >--select course--</option>
																<option value="c1" >course 1</option>
																<option value="c2" >course 2 </option>
																<option value="c3" >course 3</option>
															</select>
													</div>
													<div class="mb-5">
														<label class="form-label text-muted fs-6 fw-bold ">Batch</label>
															<select name="studentbatch" id="studentBatch" class=" fw-bold  form-control custom-select" style="background-color: #f8f9fa;
																border: 1px solid #ced4da;font-size: 16px;">
																<option selected disabled value >--select batch--</option>
																<option value="c1" >batch  1</option>
																<option value="c2" >batch 2 </option>
																<option value="c3" >batch 3</option>
															</select>
													</div>
												</form>
											</div>
											<div class="separator border-gray-200"></div>
											<div class="row p-2">
												<i class="fa-solid fa-3 text-dark "></i>
												<h3 class="text-dark mt-2">Payment</h3>
												<p class="text-muted mb-0">Student payment</p>
												<div id="paymentamount"></div>
												<div class="mb-5">
													<div class="row p-2">
														<div class="col-6">
															<label class="form-label fs-6 fw-bold text-muted">Deposit</label>
															<input type="number" name="studentdeposit" id="studentDeposit" class=" fw-bold form-control custom-select" style="background-color: #f8f9fa;
															border: 1px solid #ced4da;font-size: 16px;" />
														</div>
														<div class="col-6">
															<label class="form-label fs-6 fw-bold text-muted">Due</label>
															<input type="text" name="studentDue" id="studentDue" class=" fw-bold form-control custom-select" style="background-color: #f8f9fa;
															border: 1px solid #ced4da;font-size: 16px;" />
														</div>
													</div>
												</div> 
												<div class="mb-5">
													<div class="row" id="studentDueDate">	
													</div>
												</div>
												<div class="mb-5">
													<label class="form-label fs-6 fw-bold text-muted">Issued by</label>
													<input type="text" name="studentissue" id="studentIssue" class=" fw-bold form-control custom-select" style="background-color: #f8f9fa;
													border: 1px solid #ced4da;font-size: 16px;" />
												</div> 
											</div>
										</div>
									</div>									
								</div>
							</div>
							<div class="modal-footer">
							  <button type="button" class="btn btn-primary">Confirm Admission</button>
							</div>
						  </div>
						</div>
					  </div>


  </header>
 


