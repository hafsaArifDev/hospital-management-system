<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>index.php</title>
    <style>
        .main-section{
            display: flex;
            flex-direction: column;
    background-color: #efefef;
    height: 200px;
    width: 100%;
    margin: 0px;
    padding: 0px;
}
.heading {
    padding: 20px , 50px;
    text-align: center;
    color: #3498db;
    font-size: 43px;
}
.img{
    background: url("images/image1.jpeg");
}
p{
     text-align: center;
    
}
.hero-section{
    display: flex;
    flex-direction: row;
    color: #3498db;
}
.image{
 height: 100%;
 width: 100%;
 padding-left: 400px;
}
.sec3{
            display: flex;
            font-size: 20px;
            flex-direction: row;
            border-color: #2b9cc8;
            
            justify-content: space-evenly;
            text-align: center;
            padding-top: 50px;
            transition: all 0.7s;
            overflow: hidden;
        }
        .divs{
            padding: 10PX;
            border: 2px #2b9cc8;
            height: 250px;
            
            background-color: gainsboro;
            padding: 40px;
            font-size: 10px;
        }
        .divs:hover{
    
        border-color: #2b9cc8;
        background-color: #2b9cc8;
        color: white;
        
        }
        .fa{
            font-size: 50px;
            color: #2b9cc8;
        }
        .divs:hover .fa-envelope{
            color: white;
        }
        .divs:hover .fa-globe{
            color: white;
        }
        .divs:hover .fa-home{
            color: white;
        }
        .divs:hover .fa-book{
            color: white;
        }
        h2{
            font-size: 20px;
            padding-top: 20px;
            color: #3498db;
        }
    </style>
</head>
<body class="main-section">
  <div class="hero-section">
<h1 class="heading">Welcome to Hospital Management System</h1>
<div class="img"></div>
<p>This system allows patients to book appointments, doctors to manage prescriptions, and admins to control all activities.</p>
<div class="image">
    <img src="images/doctor.jpg" alt="image">
</div>
</div>
<div class="sec3">
        <div class="divs">
            <i class="fa fa-envelope"></i>
            <h2>Patient Management</h2>
            <p>Manage patient registrations, appointments, medical records, and communication through a secure and user-friendly portal.</p>
        </div>
        <div class="divs">
            <i class="fa fa-globe"></i>
            <h2>Staff Management</h2>
            <p>Organize staff schedules, roles, and performance to ensure smooth day-to-day hospital operations.</p>
        </div>
        <div class="divs">
            <i class="fa fa-home"></i>
            <h2> Report Management</h2>
            <p>Generate, store, and access detailed medical and financial reports for efficient record-keeping and analysis.</p>
        </div>
        <div class="divs">
            <i class="fa fa-book"></i>
            <h2>Case Management</h2>
            <p>Easily track and manage patient cases, treatment plans, and medical history in one centralized system.</p>
        </div>
        </div>
        
</body>
</html>

<?php include 'includes/footer.php'; ?>
