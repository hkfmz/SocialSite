<style type="text/css">
	#text{
		background-color: #D8D8D8;
		padding: 10px;
	    border-radius: 10px;
	    padding-top: 3px;
	    padding-bottom: 3px;
	    width: 90%;
	}

	.chat {
  width: 100%;
  margin-bottom: 40px;
 align-content: left;
 text-align: left;
 align-items: left;
  background: #fff;
max-height: 450px;
 overflow-y: scroll;
}
</style>

			
			
			<div class="chat"><?php 
			$con = mysqli_connect("localhost", "root", "", "chat");
function formatDate($date){
	return date('g:i a', strtotime($date));
}


$query = " SELECT * FROM chat ORDER BY date DESC";
$run = mysqli_query($con, $query);

	while ($row =mysqli_fetch_array($run, MYSQLI_BOTH)) {
		

		?>
		
			<tr align="center">
				<!-- <span style="color:green;"><?php echo $row['name']; ?></span> <br> -->
				<div id="text"> <span style="color:black; margin-left: 8px; font-weight: bold;"><?php echo ucfirst($row['name'])." :  </span><span style='color:black'>". $row['msg']; ?></span>
				<span style="float:right;"><?php echo formatDate($row['date']); echo "&nbsp&nbsp&nbsp&nbsp&nbsp"; ?></span></div><br>
				
			</tr>

		
		<?php
	}


?>
</div>