<?php 
include '../include/db.php';

if (! empty($_POST["cval"]))
{
	$cat = $_POST['cval'];
	$query = "select * from colour WHERE id='$cat' and is_dlt=0";
	$r = mysqli_query($con,$query);
	$prr = mysqli_fetch_array($r);
	// {
		 $sub_name = $prr['name'];
		$sc_id = $prr['id'];
		?>
		<span style="background: <?php echo $sub_name; ?>;display: block;width:37px;height:37px;" id="set_co"></span>
<?php 	
}
?>