<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
</head>
<body>

<div id="container">
	<h1>Play the Quiz!</h1>
    
    <form method="post" action="<?php echo base_url();?>quiz/resultsDisplay">
       
    
    <?php foreach($questions as $row) { ?>
    
    <?php 
        // Shuffle the answer options
        $ans_array = array($row->question_option_1, $row->question_option_2, $row->question_option_3, $row->question_answer);
        shuffle($ans_array); 
    ?>
    
    <p><?=$row->question_text?></p>
    
    <!-- Displaying answer options -->
    <input type="radio" name="questionID<?=$row->q_num?>" value="<?=$ans_array[0]?>" required> <?=$ans_array[0]?><br>
    <input type="radio" name="questionID<?=$row->q_num?>" value="<?=$ans_array[1]?>"> <?=$ans_array[1]?><br>
    <input type="radio" name="questionID<?=$row->q_num?>" value="<?=$ans_array[2]?>"> <?=$ans_array[2]?><br>
    <input type="radio" name="questionID<?=$row->q_num?>" value="<?=$ans_array[3]?>"> <?=$ans_array[3]?><br>
    
    <?php } ?>
    
    <br><br>
    <input type="submit" value="Submit!">
    
    </form>
    
</div>

</body>
</html>
