<?php
session_start();
$duckCount = array("Freud"=>0, "Scarface"=>0, "Super"=>0, "1000"=>0, "Giant"=>0,
                    "Tech"=>0, "Workout"=>0, "Spock"=>0, "Ninja"=>0);
$duckCost = array("Freud"=>9.95, "Scarface"=>9.95, "Super"=>9.95, "1000"=>1995.00, "Giant"=>120000.00,
                    "Tech"=>9.95, "Workout"=>9.95, "Spock"=>9.95, "Ninja"=>14.95);
$_SESSION['duck_Count'] = $duckCount;
$_SESSION['duck_Cost'] = $duckCost;
?>

 <!DOCTYPE html>
 <html>
 <head>
   <title>Week 03 Prove - PHP Shopping Cart</title>
   <link rel="stylesheet" type="text/css" href="week03.css">
<!--   <script type="text/javascript" src="week03.js"></script>-->
 </head>
 <body class="page">
   <form action="viewCart.php" id="viewCart" method="post">
   <div class="heading">
     <h1>Welcome to the Rubber Duck Emporium</h1>
     <h4>The Ultimate Source for Your Rubber Ducks Needs</h4>
   </div>
   <div class="selections">
     <a href="../assignmentList.html">Return To Assignment List</a><br/>
   </div>
   <form action="viewCart.php" id="viewCart" method="post">
   <input type="submit" value="View Cart">
   <div class="merchandiseLeft">
     <img class="merchandiseImg" src="FreudDuck.jpg" alt="Freud Duck">
     <h2>Sigmund Freud Duck</h2>
     <h3>$9.95</h3>
     <p class="merchandiseDesc">Spend bath time talking out your problems with everyone's favorite
       psychiatrist. All of your secrets will be safe with this duck and
       sometimes a nice hot bath is much more comfortable than the phychiatrist
       couch.</p>
       <label for"countFreudDuck">Order Quantity:
         <input type="text" name="countFreudDuck" size="3" value="0">
       </label>
       <br/>
     <img class="merchandiseImg" src="scarfaceDuck.jpg" alt="Scarface Duck">
     <h2>Scarface Duck</h2>
     <h3>$9.95</h3>
     <p class="merchandiseDesc">Say hello to everyone's favorite little friend.  Bath time can be
       more exciting with this new little friend of yours.</p>
     <label for"countScarfaceDuck">Order Quantity:
       <input type="text" name="countScarfaceDuck" size="3" value="0">
     </label>
     <br/>
     <img class="merchandiseImg" src="superDuck.jpg" alt="Super Duck">
     <h2>Super Duck</h2>
     <h3>$9.95</h3>
     <p class="merchandiseDesc">Everyone's favorite super hero from Krypton disguised
     as a duck.  Enjoy bath time even more now as this heroic duck saves your
     other toys from peril and almost certain doom.</p>
     <label for"countSuperDuck">Order Quantity:
       <input type="text" name="countSuperDuck" size="3" value="0">
     </label>
     <br/>
     <img class="merchandiseImg" src="1000ducks.jpg" alt="1000 Ducks">
     <h2>1000 Ducks</h2>
     <h3>$1995.00</h3>
     <p class="merchandiseDesc">Sometimes one duck isn't enough.  This impressive floating armada of
       ducks will be sure to satisfy even Ernie's need to make bath time more fun.</p>
     <label for"count1000Duck">Order Quantity:
       <input type="text" name="count1000Duck" size="3" value="0">
     </label>
     <br/>
     <img class="merchandiseImg" src="giantDuck.jpg" alt="Giant Duck">
     <h2>Gigantic Duck</h2>
     <h3>$120,000</h3>
     <p class="merchandiseDesc">This insanely large duck isn't likely to fit in
       your bath tub, or even through your front door.  This is the type of duck
       you take a bath with if your tub is a nearby lake.  This is the type of duck
       you terrorize local boaters with.</p>
     <label for"countGiantDuck">Order Quantity:
       <input type="text" name="countGiantDuck" size="3" value="0">
     </label>
     <br/>
   </div>
   <div class="merchandiseRight">
     <img class="merchandiseImg" src="techSupportDuck.jpg" alt="Tech Support Duck">
     <h2>Tech Support Duck</h2>
     <h3>$9.95</h3>
     <p class="merchandiseDesc">A great duck in and out of the bath.  This duck
     will help solve any problems whether it is helping you figure out how to use
     the newest tech device or if you just need to do some rubber duck debugging
     on your CS313 homework.</p>
     <label for"countTechDuck">Order Quantity:
       <input type="text" name="countTechDuck" size="3" value="0">
     </label>
     <br/>
     <img class="merchandiseImg" src="workoutDuck.jpg" alt="Workout Duck">
     <h2>Workout Duck</h2>
     <h3>$9.95</h3>
     <p class="merchandiseDesc">The perfect partner for helping you keep that new
     years resolution to lose a few pounds.  Take this duck for a run or a swim and
     then into the bath for a nice relaxing soak afterward.</p>
     <label for"countWorkoutDuck">Order Quantity:
       <input type="text" name="countWorkoutDuck" size="3" value="0">
     </label>
     <br/>
     <img class="merchandiseImg" src="spockDuck.jpg" alt="Mr. Spock Duck">
     <h2>Mr. Spock Duck</h2>
     <h3>$9.95</h3>
     <p class="merchandiseDesc">This duck will make bath time more logical. The
     pointy eared science officer is a great addition to any bath time as long as
     you don't try to argue with him.</p>
     <label for"countSpockDuck">Order Quantity:
       <input type="text" name="countSpockDuck" size="3" value="0">
     </label>
     <br/>
     <img class="merchandiseImg" src="ninjaDucks.jpg" alt="Ninja Ducks">
     <h2>Ninja Warrior Ducks</h2>
     <h3>$14.95</h3>
     <p class="merchandiseDesc">This collection of ninja warrior ducks will put
     any turtles to shame.  Make bath time more fun as these ninja's fight their
     way through any danger.</p>
     <label for"countNinjaDuck">Order Quantity:
       <input type="text" name="countNinjaDuck" size="3" value="0">
     </label>
     <br/>
   </div>
 </form>
 </body>
</html>
