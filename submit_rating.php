

<?php
session_start();
//submit_rating.php

$database_review = $_SESSION['DatabaseName'] . "_reviews";
$connect = new PDO("mysql:host=localhost;dbname=turo", "root", "");
$conn = mysqli_connect('localhost','root','','turo');


if(isset($_POST["rating_data"]))
{
	if ($_SESSION['EditMode'] === "TRUE"){
		$id = $_SESSION["CurrentID"];
		$r_username = $_SESSION["Username"];
		$r_fullname = $_SESSION["Fullname"];
		$r_data = $_POST["rating_data"];
		$r_title = $_POST["review_title"];
		$r_context = $_POST["review_context"];
	

		$d_time = time();
	}
	
	$data = array(
		':review_username'		=>	$_SESSION["Username"],
		':review_fullname'		=>	$_SESSION["Fullname"],
		':review_title'			=>	$_POST["review_title"],
		':review_rating'		=>	$_POST["rating_data"],
		':review_context'		=>	$_POST["review_context"],
		':datetime'				=>	time()
	);

	if ($_SESSION['EditMode'] === "TRUE") {

		$queryedit = mysqli_query($conn, "UPDATE $database_review SET review_username='$r_username' , review_fullname='$r_fullname' , review_rating='$r_data' , review_title='$r_title', review_context='$r_context' , datetime='$d_time' WHERE review_id='$id'");
		echo "Your Review & Rating Successfully Edited";


	} else {
		$query = "
		INSERT INTO $database_review 
		(review_username, review_fullname, review_rating, review_title, review_context, datetime) 
		VALUES (:review_username, :review_fullname, :review_rating, :review_title, :review_context, :datetime)
		";
		$statement = $connect->prepare($query);

		$statement->execute($data);
		echo "Your Review & Rating Successfully Submitted";
		
	}

}

if(isset($_POST["action"]))
{
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

	


	$query = "
	SELECT * FROM $database_review
	ORDER BY review_id DESC
	";

	$result = $connect->query($query, PDO::FETCH_ASSOC);

	foreach($result as $row)
	{
		$review_content[] = array(
			'user_name'		=>	$row["review_title"],
			'user_review'	=>	$row["review_context"],
			'rating'		=>	$row["review_rating"],
			'datetime'		=>	date(' jS F, Y', $row["datetime"])
		);

		if($row["review_rating"] == '5')
		{
			$five_star_review++;
		}

		if($row["review_rating"] == '4')
		{
			$four_star_review++;
		}

		if($row["review_rating"] == '3')
		{
			$three_star_review++;
		}

		if($row["review_rating"] == '2')
		{
			$two_star_review++;
		}

		if($row["review_rating"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["review_rating"];

	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);
	
	

}


?>