<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">






  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

</head>
<body>

<div id="container">
	<h1>Play the Quiz!</h1>
    
    <?php $score =0; ?>
    
      <?php $array1= array(); ?>
      <?php $array2= array(); ?>    
      <?php $array3= array(); ?>
      <?php $array4= array(); ?>
      <?php $array5= array(); ?>
      <?php $array6= array(); ?>
      <?php $array7= array(); ?>
      <?php $array8= array(); ?>
      
         <?php foreach($checks as $checkans) { ?>
               <?php array_push($array1, $checkans); } ?>
               
               
        <?php foreach($results as $res) { ?>
               <?php array_push($array2, $res->question_answer); 
			         array_push($array3, $res->q_num); 
			         array_push($array4, $res->question_text); 
			         array_push($array5, $res->question_option_1); 
			         array_push($array6, $res->question_option_2); 
			         array_push($array7, $res->question_option_3); 
					      array_push($array8, $res->question_answer); 
			   } ?>
               
               
           <?php 
		       for ($x=0; $x <10; $x++) { ?>
 
    <form method="post" action="<?php echo base_url();?>quiz/addHistory">  
  
    
    <p><?=$array3[$x]?>.<?=$array4[$x]?></p>
    

      <?php if ($array2[$x]!=$array1[$x]) { ?>
      
           <p><span style="background-color: #FF9C9E"><?=$array1[$x]?></span></p>
           <p><span style="background-color: #ADFFB4"><?=$array2[$x]?></span></p>
           
      <?php } else { ?>
      
           <p><span style="background-color: #ADFFB4"><?=$array1[$x]?></span></p>
           
           <?php $score = $score + 1; ?>
      
    <?php } } ?>
    
    <br><br>
    
    <h2>Your Score: </h2>
      <h1><?=$score?>/10</h1>
      <input type="text" id="score" name="score" value="<?php echo $score;?>" style="visibility: hidden;">
      
    
    <input type="submit" value="Give Review">

    
    </form>
    
</div>

</body>
<script>
// $(document).ready(function() {  

//   $("#rev").click(function(event) {

//       $("#data").load(location.href + " #data");
//       var redirectUrl2 = "http://localhost/CI/quiz/addReviewView";
//       window.location.href = redirectUrl2;

//   });




// });
  </script>
</html>