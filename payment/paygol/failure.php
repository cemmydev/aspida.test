<?php

include_once("../../GameEngine/config.php");

include_once("../../GameEngine/Village.php");

header("refresh:3;url=/dorf1.php" );

?>



<!DOCTYPE html>

<html>

<?php include("../../Templates/html.php");?>

<body class="v35 <?=$database->bodyClass($_SERVER['HTTP_USER_AGENT']); ?> perspectiveResources">



<script type="text/javascript">



    window.ajaxToken = 'de3768730d5610742b5245daa67b12cd';



</script>



<div id="background">

    <div id="headerBar"></div>

    <div id="bodyWrapper">

        <div id="header">

            <?php

            include("../../Templates/topheader.php");

            ?>

        </div>

        <div id="center">

            <?php

           // include("../Templates/sideinfo.php");?>

		   <div id="sidebarBeforeContent" class="sidebar beforeContent"></div>		   

            <div id="contentOuterContainer">				

                <?php  include("../../Templates/res.php");      ?>

                <div class="contentTitle">

					<a id="closeContentButton" class="contentTitleButton" href="dorf1.php">&nbsp;</a>

                    <a id="answersButton" class="contentTitleButton" href="http://t4.answers.travian.com/index.php?aid=106#go2answer" target="_blank">&nbsp;</a>

				</div>

                <div class="contentContainer">

                    <div id="content" class="hero_editor">

						<h1 class="titleInHeader">PayGol Checkout</h1>

						<div class="boxes boxesColor gray adventureStatusMessage">

						<div class="boxes-tl"></div>

						<div class="boxes-tr"></div>

						<div class="boxes-tc"></div>

						<div class="boxes-ml"></div>

						<div class="boxes-mr"></div>

						<div class="boxes-mc"></div>

						<div class="boxes-bl"></div>

						<div class="boxes-br"></div>

						<div class="boxes-bc"></div>

						<div class="boxes-contents"> You have cancelled the process. </div></div>

						

						<h4 class="spacer"><img class="chest" src="../../img/treasure-box1.png" alt="PayGol Checkout" /></h4>

					</div>

                <div class="clear"></div>

                </div>

            </div>

            <div id="ce"></div>

		</div>
</body>
</html>