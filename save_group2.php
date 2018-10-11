<?php
    include('db_connection.php');

   print "<pre>";
    print_r($_POST);
    print "</pre>";
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
    $event=$_POST['event'];
        $tid=$_POST['tid'];

    $team=2;

     $query ="INSERT INTO Groups(  `eid_fk` ,  `group` ) VALUES ('$event', $team)";
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
                    <li>Sachin K P on +919611836318 (ISE)</li>
                    <li>Gowri Dixit on +918310652631 (CSE)</li>
                    <li>Prashanth V on +919663770961 (ECE)</li>
                    <li>Vibhav on +919902351146 (Civil)</li>
                    <li>Sudharshan on +918892339380 (Mechanical)</li>
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
                    {
                    echo("<p>Email Message delivery failed...</p>");
                    }
                    exit(0);
            }
    else{
        print "Error:".mysql_error(); 
    }
    ?>

