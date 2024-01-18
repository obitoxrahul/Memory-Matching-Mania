<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name='viewport' content='width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0' />
    <title>Memory Matching Maina</title>
    <link rel="shortcut icon" href="img/favion.png" type="image/jpg">
    <link rel="stylesheet" href="gamestyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="gamescript.js"></script>
</head>
<body>
    
    <div id="ol">
        <center>
        <div id="inst">
            <h3>Welcome !</h3>
            Instruction For Game <br><br>
            <li>Make pairs of similiar blocks by flipping them.</li>
            <li>To flip a block you can click on it.</li>
            <li>If two blocks you clicked are similar then you will get +2, if wrong you will get -1.</li>
            <p style="font: size 18px;">Default Score will be 100</p>
        </div></center>
        <button onclick="start()">start</button>
    </div>
    <div style="height: 8px;"></div>
    <div id="title">
        <span id="logo">MEMORY MATCHING MANIA</span>
    </div>
    <div id="title" style="height: 60px;">
         <p class="scoreCard" style="font: size 20px;">Score : <span id="score" class="score"></span></p>
    </div>
    <div class="container">
        <center>
        <div class="blockleft">
            <div class="cardCont" id="cardCont">
                <?php
                    for($x=0; $x<4;$x++)
                    {
                        for ($y=0; $y<4; $y++) { 
                            echo '<div class="cell closed"
                            data-color=""
                            id="'.$x.$y.'"></div>';
                        }
                    }
                ?>
            </div>
        </div>
       </center>
    </div>
    <center>
        <div class="blockright">
           <p class="button"><input type="button" value="Reset" id="reset" class="myButton reset"></p>
           <input type="button" value="complete" class="myButton" style="display:none" onclick="javascript:complete();">
        </div>
     </center>
   <div class="submitForm">
      <form type="" method="POST" id="submitScoreForm" action="form.php">
		<h2>Well Done! <br/>You have scored <span class="score"></span>!!</h2>
		<p>Submit your score</p>
		<p><input type="text" name="fullname" placeholder="Full Name" ></p>
		<p><input type="email" name="email" placeholder="Email" ></p>
		<input type="hidden" name="score" id="scoreVal" value="" >
		<input type="hidden" name="appid" value="memory-game" >
		<p class="button"><input type="submit" value="Submit" id="submitScore"  class="myButton">
		<input type="button" value="Reset" class="resetForm myButton" >
		</p>
    </div>
    <div class="submitFormResponse "></div>
</body>
</html>