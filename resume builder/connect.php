<?php
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $addr=$_POST['addr'];
    $city=$_POST['city'];
    $zip=$_POST['zip'];
    $ctry=$_POST['ctry'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $employer=$_POST['employer'];
    $jobtitle=$_POST['jobtitle'];
    $empcity=$_POST['empcity'];
    $empstate=$_POST['empstate'];
    $startdate=$_POST['startdate'];
    $enddate=$_POST['enddate'];
    $jobdecreption=$_POST['jobdecreption'];
    $school=$_POST['school'];
    $schoolstate=$_POST['schoolstate'];
    $schoolcity=$_POST['schoolcity'];
    $degree=$_POST['degree'];
    $fos=$_POST['fos'];
    $graduationdate=$_POST['graduationdate'];
    $skills=$_POST['skills'];
    $level=$_POST['level'];
    $summary=$_POST['summary'];

    //Database Connection
    $conn=new mysqli('localhost','root','','resume');
    if($conn->connect_error)
    {
        die('Connection Failed : '.$conn->connection_error);
    }
    else
    {
        $stmt=$conn->prepare("insert into personal(fname, lname, addr, city, zip, ctry, email, phone) values(?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssissi",$fname,$lname,$addr,$city,$zip,$ctry,$email,$phone);
        $stmt->execute();
        $stmt->close();
        //$conn->close();

        $stmt2=$conn->prepare("insert into education(school,schoolstate,schoolcity,degree,fos,graduationdate) values(?,?,?,?,?,?)");
        $stmt2->bind_param("sssssi",$school,$schoolstate,$schoolcity,$degree,$fos,$graduationdate);
        $stmt2->execute();
        $stmt2->close();
        //$conn->close();

        $stmt3=$conn->prepare("insert into experience(employer,jobtitle,empcity,empstate,startdate,enddate,jobdecreption) values(?,?,?,?,?,?,?)");
        $stmt3->bind_param("ssssiis",$employer,$jobtitle,$empcity,$empstate,$startdate,$enddate,$jobdecreption);
        $stmt3->execute();
        $stmt3->close();
        //$conn->close();

        $stmt4=$conn->prepare("insert into skills(skills,level) values(?,?)");
        $stmt4->bind_param("ss",$skills,$level);
        $stmt4->execute();
        $stmt4->close();
        //$conn->close();

        $stmt5=$conn->prepare("insert into summary(summary) values(?)");
        $stmt5->bind_param("s",$summary);
        $stmt5->execute();
        echo "Successfull";
        $stmt5->close();
        $conn->close();
    }
?>