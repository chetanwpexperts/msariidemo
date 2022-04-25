<?php
/** database connection **/
$mysqli = new mysqli("localhost","root","","demo");

// Check connection
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}
/**
* get students **/
$phaseId = isset($_GET['id']) ? $_GET['id'] : "";
$sql = "SELECT id, name FROM phase WHERE id = '".$phaseId."'";
$st = $mysqli->query($sql);
$phase = '';
if ($st->num_rows > 0) 
{
	// output data of each row
	$phase = $st->fetch_assoc();
}

/**
* get students **/
$sql = "SELECT id, name FROM phase";
$st = $mysqli->query($sql);
$phases = array();
if ($st->num_rows > 0) 
{
	// output data of each row
	while($row = $st->fetch_assoc()) 
	{
		$phases[] = $row;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Dummy</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="//code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-lg">
    <div class="">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
					<div class="col-sm-8">
					<p>&nbsp;</p>
					<h2>Phase:  <b><font color="#2972b1"><?php echo ucfirst($phase['name']);?></font></b></h2> </div>
					<p>&nbsp;</p>
					
				</div>
				<p>&nbsp;</p>
				<div class="row">
					<div class="col-md-12">
						<table class="table table-bordered src-table1">
							<thead>
								<tr>
									<th>Id</th>
									<th>Phase Name</th>
								</tr>
							</thead>
							<tbody>
							<?php 
							if(count($phases) > 0)
							{
								$totalphases = count($phases);
								$i = 1;
								foreach($phases as $phase)
								{
									?>
									<tr id="check_<?php echo $i;?>" data-total-record="<?php echo $totalphases;?>" data-tr-id_<?php echo $i;?>="<?php echo $phase['id'];?>" data-name-<?php echo $i;?>="<?php echo $phase['name'];?>">
										<td><?php echo $phase['id'];?></td>
										<td><a href="phase_view.php?id=<?php echo $phase['id'];?>"><?php echo $phase['name'];?></a></td>
									</tr>
									<?php
									$i++;
								}
							}
							?>     
							</tbody>
						</table>
					</div>
					
				</div>
			</div>
		</div>  
	</div>
</div>
</body>
</html>