<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="cuha.php" method="post">
<select id="sel_id" name="sel_id"  onchange="this.form.submit();">
<option value="-1">Select</option>
<option value="6">kasper </option> 
<option value="13">adad </option> 
<option value="14">3204 </option>          
</select>
</form>
<p id="demo"></p>   
<script>
var elements = document.getElementById(sel_id);
document.write(elements);

</script>
</body>
</html>