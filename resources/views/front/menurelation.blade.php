<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.4 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- start: HEAD -->
<head>
	<title>EA DOCUMENT REPOSITORY</title>
	<!-- start: META -->
	<meta charset="utf-8" />
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- end: META -->
	<!-- start: MAIN CSS -->
	<link rel="stylesheet" href="{{ URL::asset('css/theme/plugins/bootstrap/css/bootstrap.min.css') }}" >
	<link rel="stylesheet" href="{{ URL::asset('css/theme/plugins/font-awesome/css/font-awesome.min.css') }}" >
	<link rel="stylesheet" href="{{ URL::asset('css/theme/fonts/style.css') }}" >
	<link rel="stylesheet" href="{{ URL::asset('css/theme/css/main.css') }}" >
	<link rel="stylesheet" href="{{ URL::asset('css/theme/css/main-responsive.css') }}" >
	<link rel="stylesheet" href="{{ URL::asset('css/theme/plugins/iCheck/skins/all.css') }}" >
	<link rel="stylesheet" href="{{ URL::asset('css/theme/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css') }}" >
	<link rel="stylesheet" href="{{ URL::asset('css/theme/plugins/perfect-scrollbar/src/perfect-scrollbar.css') }}" >
	<link rel="stylesheet" href="{{ URL::asset('css/theme/css/theme_light.css') }}" >
	<link rel="stylesheet" href="{{ URL::asset('css/theme/css/print.css') }}" >
		<link rel="shortcut icon" href="{{ URL::asset('images/kmutnb.ico') }}" />

		<!--[if IE 7]>
		<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome-ie7.min.css">
		<![endif]-->
		<!-- end: MAIN CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body>
		<div class="page-container container">
			<div class="form-group">
				<center>{!! Html::image('images\banner.jpg') !!}</center>
			</div>
			<div style="text-align:center">
				@include('front.topnav')
			</div> 
			<div class="container">

				<!-- start: PAGE CONTENT -->
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<!-- start: RESPONSIVE TABLE PANEL -->
						<div class="panel panel-default">
							<div style="height: 50px;padding:0" class="panel-heading">
							<center><div style="font-size:33px;">ตารางแสดงความสัมพันธ์</div></center>
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<!-- Start: table content -->
									<form method="post" action="viewrelation" target="_blank">
										<center><table>
											<th><center>ข้อมูลตั้งต้น</center></th><th width="35"></th><th><center>ข้อมูลเปรียบเทียบ</center></th>
											<tr height=1><td>&nbsp;</td></tr>
											<tr>
												<td>
													<select name="frst" onChange="myFunction(this.value)" class="form-control">
														<option value="">เลือกข้อมูลตั้งต้น</option>
														<option value="b">กระบวนการ</option>
														<option value="a">ระบบสารสนเทศ</option>
														<option value="d">ข้อมูล</option>
														<option value="t">เทคโนโลยี</option>
													</select>
												</td><td></td>
												<td>
													<select name="scnd" id="second-list" class="demoInputBox form-control">
														<option value="">เลือกข้อมูลเปรียบเทียบ</option>
													</select>
												</td>
											</tr>
											<tr><td>&nbsp;</td></tr>
											<tr><td colspan="3">
											<center>
											<button type="submit" value="submit1" class=" btn btn-success" name="submit" 
											onclick="return val(frst.value,scnd.value);">เรียกดูตาราง</button>&nbsp;&nbsp;&nbsp;&nbsp;
											<button type="submit" value="submit2" class=" btn btn-primary" name="submit" 
											onclick="return val(frst.value,scnd.value);">ดาวน์โหลดเป็น Excel</button>
											</center>
											</td>
											</tr>
										</table></center>
										<input type="hidden" name="_token" value="{{csrf_token()}}" >
									</form>
									<!-- End: table content -->
								</div>
							</div>
						</div>
						<!-- end: RESPONSIVE TABLE PANEL -->
					</div>
				</div>
				<!-- end: PAGE CONTENT-->
			</div>
		</div>
		<!-- end: PAGE -->
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="{{ URL::asset('css/theme/plugins/jQuery-lib/2.0.3/jquery.min.js') }}"></script>
		<!--<![endif]-->
		<script src="{{ URL::asset('css/theme/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js') }}"></script>
		<script src="{{ URL::asset('css/theme/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
		<script src="{{ URL::asset('css/theme/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}"></script>
		<script src="{{ URL::asset('css/theme/plugins/blockUI/jquery.blockUI.js') }}"></script>
		<script src="{{ URL::asset('css/theme/plugins/iCheck/jquery.icheck.min.js') }}"></script>
		<script src="{{ URL::asset('css/theme/plugins/perfect-scrollbar/src/jquery.mousewheel.js') }}"></script>
		<script src="{{ URL::asset('css/theme/plugins/perfect-scrollbar/src/perfect-scrollbar.js') }}"></script>
		<script src="{{ URL::asset('css/theme/plugins/less/less-1.5.0.min.js') }}"></script>
		<script src="{{ URL::asset('css/theme/plugins/jquery-cookie/jquery.cookie.js') }}"></script>
		<script src="{{ URL::asset('css/theme/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js') }}"></script>
		<script src="{{ URL::asset('css/theme/js/main.js') }}"></script>

		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
			});
			function val(frst,scnd){
				if(frst==''||scnd==''){
					alert('โปรดเลือกข้อมูลแสดงความสัมพันธ์ให้ถูกต้อง');
					return false;
				}
			}
			function myFunction(val) {
				if(val==''){
					document.getElementById("second-list").innerHTML = 
					"<option value=''>เลือกข้อมูลเปรียบเทียบ</option>";
				}
				if(val=='b'){
					document.getElementById("second-list").innerHTML = 
					"<option value=''>เลือกข้อมูลเปรียบเทียบ</option>"+
					"<option value='d'>ข้อมูล</option>"+
					"<option value='a'>ระบบสารสนเทศ</option>"+
					"<option value='dp'>หน่วยงานที่เกี่ยวข้อง</option>";
				}
				if(val=='a'){
					document.getElementById("second-list").innerHTML = 
					"<option value=''>เลือกข้อมูลเปรียบเทียบ</option>"+
					"<option value='b'>กระบวนการ</option>"+
					"<option value='d'>ข้อมูล</option>"+
					"<option value='la'>ภาษาที่พัฒนา</option>"+
					"<option value='db'>ฐานข้อมูล</option>"+
					"<option value='ser'>เครื่องแม่ข่าย</option>"+
					"<option value='c'>บริษัทที่พัฒนา</option>"+
					"<option value='dp'>หน่วยงานที่เกี่ยวข้อง</option>";
				}
				if(val=='d'){
					document.getElementById("second-list").innerHTML = 
					"<option value=''>เลือกข้อมูลเปรียบเทียบ</option>"+
					"<option value='b'>กระบวนการ</option>"+
					"<option value='st'>การจัดเก็บ</option>"+
					"<option value='a'>ระบบสารสนเทศ</option>"+
					"<option value='dp'>หน่วยงานที่เกี่ยวข้อง</option>";
				}
				if(val=='t'){
					document.getElementById("second-list").innerHTML = 
					"<option value=''>เลือกข้อมูลเปรียบเทียบ</option>"+
					"<option value='a'>ระบบสารสนเทศ</option>"+
					"<option value='br'>ยี่ห้อ</option>"+
					"<option value='lo'>สถานที่ตั้ง</option>";
				}
			}
		</script>
	</body>
	<!-- end: BODY -->
	</html>
