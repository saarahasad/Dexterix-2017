<?php
    include('db_connection.php');

 /* print "<pre>";
    print_r($_POST);
    print "</pre>";*/
    $name1=$_POST['name1'];
    $usn1=$_POST['usn1'];
    $phone1=$_POST['phone1'];
    $email1=$_POST['email1'];
    $dep1=$_POST['dep1'];
    $sem1=$_POST['sem1'];
    $sec1=$_POST['sec1'];
    $name2=$_POST['name2'];
    $usn2=$_POST['usn2'];
    $dep2=$_POST['dep2'];
    $sem2=$_POST['sem2'];
    $sec2=$_POST['sec2'];
    $name3=$_POST['name3'];
    $usn3=$_POST['usn3'];
    $dep3=$_POST['dep3'];
    $sem3=$_POST['sem3'];
    $sec3=$_POST['sec3'];
    $name4=$_POST['name4'];
    $usn4=$_POST['usn4'];
    $dep4=$_POST['dep4'];
    $sem4=$_POST['sem4'];
    $sec4=$_POST['sec4'];

    $name5=$_POST['name5'];
    $usn5=$_POST['usn5'];
    $dep5=$_POST['dep5'];
    $sem5=$_POST['sem5'];
    $sec5=$_POST['sec5'];
      
    $name6=$_POST['name6'];
    $usn6=$_POST['usn6'];
    $dep6=$_POST['dep6'];
    $sem6=$_POST['sem6'];
    $sec6=$_POST['sec6'];

    $name7=$_POST['name7'];
    $usn7=$_POST['usn7'];
    $dep7=$_POST['dep7'];
    $sem7=$_POST['sem7'];
    $sec7=$_POST['sec7'];
    
    $event=$_POST['event'];
        $tid=$_POST['tid'];

    $team=7;
     $query ="INSERT INTO Groups(  `feid` ,  `group` ) VALUES ('$event', $team)";
    $flagAdd=mysqli_query($dbHandle,$query);

    include('db_connection.php');

   $rowSQL = mysqli_query($dbHandle,"select max(gid) FROM Groups ;");
    $row = mysqli_fetch_array( $rowSQL );
    $largestNumber = $row['max(gid)'];
    print $largestNumber;
    
    include('db_connection.php');


    $query2="insert into Dexterix.Participants values('$largestNumber','$event','$team','$name1','$usn1','$phone1','$email1','$dep1','$sem1','$sec1','$tid');";
    $flagAdd=mysqli_query($dbHandle,$query2);
  
    include('db_connection.php');

    $query3 ="insert into Dexterix.Participants  values('$largestNumber','$event','$team','$name2','$usn2','','','$dep2','$sem2','$sec2','$tid');";
    $flagAdd=mysqli_query($dbHandle,$query3);
   
    include('db_connection.php');

    $query4 ="insert into Dexterix.Participants  values('$largestNumber','$event','$team','$name3','$usn3','','','$dep3','$sem3','$sec3','$tid');";
    $flagAdd=mysqli_query($dbHandle,$query4);
   
    include('db_connection.php');

    $query5 ="insert into Dexterix.Participants  values('$largestNumber','$event','$team','$name4','$usn4','','','$dep4','$sem4','$sec4','$tid');";
    $flagAdd=mysqli_query($dbHandle,$query5);

    include('db_connection.php');

    $query6 ="insert into Dexterix.Participants  values('$largestNumber','$event','$team','$name5','$usn5','','','$dep5','$sem5','$sec5','$tid');";
    $flagAdd=mysqli_query($dbHandle,$query6);
   
    include('db_connection.php');

    $query7 ="insert into Dexterix.Participants  values('$largestNumber','$event','$team','$name6','$usn6','','','$dep6','$sem6','$sec6','$tid');";
    $flagAdd=mysqli_query($dbHandle,$query7);

    include('db_connection.php');

    $query8 ="insert into Dexterix.Participants  values('$largestNumber','$event','$team','$name7','$usn7','','','$dep7','$sem7','$sec7','$tid');";
    $flagAdd=mysqli_query($dbHandle,$query8);
   
      if($flagAdd)
    {
        
                $to = $email1;
                $subject = "Dexterix 2017" ;
                $body = "<h3>Greetings from CODE </h3>
                <p> Thanks for registering to participate in DexteriX 2017 organised by CODE. This email confirms your registration. Please report at the specified venue on time
                on the specified dates during the event on 3rd and 4th November 2017 at Atria 
                Institute of Technology.</p>
                <p>For any queries contact,</p>
                <ul>
                   <li>Husna Sabir Azeez (CSE): +91 72594 80016</li>
        <li>Prashanth R (ISE): +91 78991 34556</li>
        <li>Ranjitha V (Civil): +91 96322 77672</li>
        <li>Nishanth J (Mech): +91 72041 38936</li>
        <li>Pradipta Kashyap (ECE): +91 87539 69862</li>
                </ul>
                    </br>
                    <p>We look forward to have you with us at DexteriX ‘17.</p>
                    </br>
                    <p>Sincerely,</p>
                    <p>CODE. </p>";

                $headers = 'From: DEXTERIX 2017 no-reply@dexterix.com' . "\r\n" ;
                $headers .='Reply-To: '. $to . "\r\n" ;
                $headers .='X-Mailer: PHP/' . phpversion();
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";   
            if(mail($to, $subject, $body,$headers)) {
                echo('<br>'."Email Sent ;D ".'</br>');
                    header("Location: registration_successful.html");
                    } 
                    else 
                    {header("Location: registration_failed.html");
                    echo("<p>Email Message delivery failed...</p>");
                    }
                    exit(0);
    }
    else{
header("Location: registration_failed.html");
        print "Error:".mysqli_error($dbHandle); 
    }
    ?>