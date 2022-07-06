<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<title>Live Table</title>
</head>
<body>
	<form class="form" method="post" action="process.php">
		<div style="display:flex; flex-direction: row;">
			<input type="text" id="img" name="img" placeholder="Img">
			<input type="text" id="name" name="name" placeholder="Name">
			<input type="text" id="email" name="email" placeholder="Email">
			<input type="text" id="department" name="department" placeholder="Department">
			<input type="text" id="position" name="position" placeholder="Position">
		</div>
		<button style="width:100px" class="btn btn-primary">Add</button>
		<h3>Fill all fields!</h3>
	</form>
	<section>

  <h1>Live Table</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>IMG</th>
          <th>Name</th>
          <th>Email</th>
          <th>Department</th>
          <th>Position</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody class="tbody">

      </tbody>
    </table>
  </div>
</section>

<div class="made-with-love">
  Made with
  <i>♥</i> by
  <a target="_blank">Selçuk</a>
</div>
<script>
	$(document).ready(function () {
  	$("form").submit(function (event) {
    var formData = {
	  img: $("#img").val(),
      name: $("#name").val(),
      email: $("#email").val(),
      department: $("#department").val(),
      position: $("#position").val()
    };

    $.ajax({
      type: "POST",
      url: "process.php",
      data: formData,
      dataType: "json",
      encode: true,
    }).done(function (data) {
      	console.log(data);
		if (data.success) {
			$("h3").css("color","transparent");
			$("input").val("");
			$(".tbody")
			.append(
			`<tr>
			<td>`+data["img"]+`</td>
			<td>`+data["name"]+`</td>
			<td>`+data['email']+`</td>
			<td>`+data["department"]+`</td>
			<td>`+data["position"]+`</td>
			</tr>`);
		}else{
			$("h3").css("color","red");
		}
    });

    event.preventDefault();
  });
});
</script>

</body>
</html>
