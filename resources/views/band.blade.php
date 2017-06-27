<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
	.form-horizontal .form-group {
     margin-right: 0px; 
     margin-left: 0px;
     height: 30px;
   }
   .form-horizontal{
   	padding-top: 10px;
   }
   label {
    font-size: 16px;
   }
   input[type="text"]{
   	font-size: 16px;
   }
	</style>
</head>
<body>
	<form class="form-horizontal">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">绑定的手机</label>
				<div class="col-sm-9">
				<input type="text" id="phone" placeholder="phone" class="col-xs-10 col-sm-5">
				</div>
	</div>
	<div class="space-4"></div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">附加信息</label>
				<div class="col-sm-9">
				<input type="text" id="content" placeholder="content" class="col-xs-10 col-sm-5">
				</div>
	</div>
	<div class="col-md-offset-3 col-md-9">
		<button class="btn btn-info" type="button" id="band_btn"><i class="icon-ok bigger-110"></i>绑定</button>
		
	</div>
	</form>

</body>

	<script type="text/javascript">
		$("#band_btn").click(function(argument) {
			var phone = $("#phone").val();
			var content = $("#content").val();
			 $.ajax({
			 	type:"get",
			 	url:"Service/band/"+phone+"/"+content,
			 	dataType:"json",
			 	success: function (data) {
			 		alert(data.message);
			 	}
			 })
		})

	</script>

</html>