<!DOCTYPE html>
<html>
<body>

<h2>Handler response</h2>
<?php
if($_POST['usr'] == 'admin' && $_POST['pwd'] == '123')
{
	show_welcome($_POST['usr']);
}
else
{
	show_error();
}

function show_welcome($username){
?>
<p>Welcome: <b>
<?php echo $username;?>
</b></p>
<?php
}
function show_error()
{
	echo '<p>WRONG USERNAME OR PASSWORD</p>';
}
?>
</body>
</html>