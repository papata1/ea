
<!DOCTYPE html>
<html>
<body>

<form method="post" action="viewrelation">
	<label>Frist:</label>
	<select name="frst" onChange="myFunction(this.value)" class="form-control">
		<option value="">Select Frist</option>
		<option value="b">business</option>
		<option value="a">application</option>
		<option value="d">data</option>
		<option value="t">technology</option>
	</select>


		<label>Second:</label>
		<select name="scnd" id="second-list" class="demoInputBox" >
			<option value="">Select Second</option>
		</select>
<button type='submit' value='submit' class='btn btn-success' >Submit</button>
<input type="hidden" name="_token" value="{{csrf_token()}}" >
</form>
	<script>
		function myFunction(val) {
			if(val==''){
				document.getElementById("second-list").innerHTML = 
		"<option value=''>Select Second</option>";
			}
			if(val=='b'){
				document.getElementById("second-list").innerHTML = 
		"<option value=''>Select second1</option>"+
		"<option value='a'>application</option>"+
		"<option value='d'>data</option>"+
		"<option value='t'>technology</option>";
			}
			if(val=='a'){
				document.getElementById("second-list").innerHTML = 
		"<option value=''>Select second2</option>"+
		"<option value='b'>business</option>"+
		"<option value='d'>data</option>"+
		"<option value='t'>technology</option>";
			}
			if(val=='d'){
				document.getElementById("second-list").innerHTML = 
		"<option value=''>Select second3</option>"+
		"<option value='b'>business</option>"+
		"<option value='a'>application</option>"+
		"<option value='t'>technology</option>";
			}
			if(val=='t'){
				document.getElementById("second-list").innerHTML = 
		"<option value=''>Select second4</option>"+
		"<option value='b'>business</option>"+
		"<option value='a'>application</option>"+
		"<option value='d'>data</option>"
			}
		}
	</script>

</body>
</html>
