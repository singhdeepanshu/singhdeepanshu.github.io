<?php
	require_once('../dbConfig.php');

$mysqli_conn = new Connection();
$mysqli_conn->connect();

if(!empty($_POST["keyword"])) {
$query ="SELECT id,name FROM events_list WHERE name like '%" . $_POST["keyword"] . "%' ORDER BY name LIMIT 0,6";
$result = $mysqli_conn->get($query);
if(!empty($result)) {
?>
<ul id="events-list">
<?php
foreach($result as $event) {
?>
<li onClick="selectEvent('<?php echo $event["name"]; ?>','<?php echo $event["id"]; ?>');"><?php echo $event["name"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>