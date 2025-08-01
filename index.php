<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Document</title>
    <style>
.first-section{
    display: flex;
    flex-direction: row;
    background-color:  #3498db;
    padding-bottom: 30px;
}
.first-section .img-box{
    border: 2px white;
    margin-top: 40px;
    margin-left: 140px;
    width: 450px;
    height: 450px;
    border-radius: 50%;
    overflow: hidden;
}
.first-section .about-section{
    width: 450px;
    font-size: 18px;
    margin-top: 90px;
    margin-left: 60px;
    color: white;
    
}
.first-section h1{
    font-size: 45px;
}
.first-section button{
     background-color: white;
            border: 2px solid white;
            border-radius: 20px;
            color: #2b9cc8;
            height: 40px;
            width: 200px;
            margin-top: 20px;
            font-size: 20px;
}
.first-section .about-section h3{
    margin-top: 20px;
}
.first-section .about-section p{
    margin-top: 20px;
}

.second-section{
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
            color: #2b9cc8;
            
            background-color: white;
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
        .second-section h2{
            font-size: 20px;
            padding-top: 20px;
            color: #3498db;
        }
        .divs:hover .second-section h2{
         color: white;
        }

       .third-section{
            display: flex;
            flex-direction: column;
            background-color: #2b9cc8;
            padding: 50px 50px;
        } 
        .third-section .upper-div{
            text-align: center;
            color: white;
        }
        .upper-div h2{
            font-size: 40px;
        }
        .third-section .lower-div{
            display: flex;
            flex-direction: row;
        }
        .lower-div .child-lower-divs{
            border: 2px solid white;
            border-radius: 20px;
            color: white;
            padding: 10px;
            text-align: center;
            margin: 10px;
        }
       .lower-div .child-lower-divs button{
            background-color: white;
            border: 2px solid white;
            border-radius: 20px;
            color: #2b9cc8;
            height: 40px;
            width: 200px;
        }
        .forth-section{
            display: flex;
            flex-direction: column;
            background-color: white;
            padding: 50px 20px;
        }
        .forth-section .upper-div{
            text-align: center;
            color: #2b9cc8;
            margin-bottom: 50px;
        }
         .forth-section .lower-div{
            display: flex;
            flex-direction: row;
            background-color: #2b9cc8;
        }
        .forth-section .lower-div .child-lower-divs{
            padding: 50px;
        }
        .footer{
            display: flex;
            flex-direction: row;
            background-color: white;
            padding: 50px;
        }
        .footer  .child-lower-divs{
            display: flex;
            flex-direction: column;
            color: #2b9cc8;
            width: 300px;
        }
    </style>
</head>
<body>
    <section class="first-section">
           <div class="img-box">
            <img src="images/doctor.jpg" width="100%" height="100%">
        </div>
        <div class="about-section">
            <h1>Welcome to Hospital Management System</h1>
            <h3>About This System</h3>
            <p>This system allows patients to book appointments, doctors to manage prescriptions, and admins to control all activities.</p>
             <button>Learn More</button>
        </section>
   <section>
    <div class="second-section">
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
   </section>
   <section class="third-section">
    <div class="upper-div">
        <h2>Meet Our Doctors</h2>
        <p>Meet our dedicated team of experienced doctors committed to providing compassionate and personalized care.</p>
        <p> With expertise across various specialties, they work together to ensure your health and well-being.</p>
    </div>
    <div class="lower-div">
        <div class="child-lower-divs">
            <h2>Dr. Ayesha Khan</h2>
            <p>Specialist in Pediatric Care, ensuring the health and well-being of children.</p>
            <button>Get A Free Consulation</button>
        </div>
        <div class="child-lower-divs">
            <h2>Dr. Ahmed Raza</h2>
            <p>Expert Cardiologist focused on heart health and advanced cardiac treatments.</p>
             <button>Get A Free Consulation</button>
        </div>
        <div class="child-lower-divs">
            <h2>Dr. Fatima Malik </h2>
            <p>Skilled Gynecologist providing compassionate care for women’s health.</p>
             <button>Get A Free Consulation</button>
        </div>

    </div>
     <div class="lower-div">
        <div class="child-lower-divs">
            <h2>Dr. Usman Siddiqui  </h2>
            <p>Orthopedic Surgeon specializing in bone and joint care.</p>
             <button>Get A Free Consulation</button>
        </div>
        <div class="child-lower-divs">
            <h2>Dr. Mariam Zafar</h2>
            <p>Dermatologist offering skin care treatments and cosmetic procedures.</p>
             <button>Get A Free Consulation</button>
        </div>
        <div class="child-lower-divs">
            <h2>Dr. Fatima Malik </h2>
            <p>Skilled Gynecologist providing compassionate care for women’s health.</p>
             <button>Get A Free Consulation</button>
        </div>

    </div>
   </section>

   <section class="forth-section">
<div class="upper-div">
        <h2>Our services</h2>
        <p>Our hospital offers a wide range of medical services designed to meet the needs of every patient with care and precision. </p>
        <p> From emergency care to specialized treatments, we are committed to your health and well-being.</p>
    </div>
    <div class="lower-div">
        <div class="child-lower-divs">
            <img src="images/doctor4.jpg" alt="">
        <h2>24/7 Emergency Care</h2>
            <p>Our emergency department is open round-the-clock to handle all critical situations.Staffed by experienced doctors and nurses, we ensure fast and effective care during emergencies.Equipped with modern technology, we are prepared for trauma, cardiac events, and more.</p>
            <button>More About This Service</button>
        </div>
        <div class="child-lower-divs">
            <img src="images/doctor7.jpg" alt="">
            <h2>Outpatient Consultation</h2>
            <p>We offer easy and quick appointments with highly qualified specialists across all departments.Whether it’s a general check-up or a follow-up, our doctors provide focused and personalized care.Our goal is to help you recover fast and maintain a healthy lifestyle.</p>
             <button>More About This Service</button>
        </div>
        <div class="child-lower-divs">
            <img src="images/doctor1.jpg" alt="">
            <h2> Diagnostic Lab Services</h2>
            <p>Our in-house laboratory provides accurate and timely diagnostic tests using the latest equipment.From blood tests to imaging scans, we ensure precise results for effective treatment planning.All tests are conducted under strict hygiene and quality control standards</p>
             <button>More About This Service</button>
        </div>

    </div>
     <div class="lower-div">
        <div class="child-lower-divs">
            <img src="images/doctor5.jpg" alt="">
            <h2>Pharmacy Services</h2>
            <p>Our fully stocked pharmacy provides all prescribed medicines under one roof for your convenience.We ensure the availability of authentic and approved medications at all times.Pharmacists are available to assist with guidance and dosage instructions.</p>
             <button>More About This Service</button>
        </div>
        <div class="child-lower-divs">
            <img src="images/doctor3.jpg" alt="">
            <h2> Surgical Procedures</h2>
            <p>We perform a wide range of surgical operations, from minor to major procedures, with expert care.Our surgical team follows strict safety protocols in modern, sterile operation theaters.We prioritize patient safety, comfort, and a smooth post-surgery recovery process.</p>
             <button>More About This Service</button>
        </div>
        <div class="child-lower-divs">
            <img src="images/doctor6.jpg" alt="">
            <h2> Maternity & Childcare</h2>
            <p>We offer complete prenatal, delivery, and postnatal care in a warm and supportive environment.Our team includes experienced gynecologists, pediatricians, and nurses.From birth plans to newborn care, we ensure both mother and baby are in safe hands.</p>
             <button>More About This Service</button>
        </div>
    </div>
   </section>

   <section class="footer">
     <div class="child-lower-divs">
            <h2>City Hospital</h2>
            <p>City Hospital is committed to providing modern, reliable, and affordable healthcare solutions.Our system helps hospitals manage operations efficiently and serve patients better.</p>
        </div>
        <div class="child-lower-divs">
            <h2>Privacy</h2>
            <p>Privacy Policy</p>
            <p>Cookie Policy</p>
            <p>Patient Data Policy</p>
            <p>DMCA</p>
        </div>
        <div class="child-lower-divs">
            <h2>Legal</h2>
            <p>Terms & Conditions</p>
            <p>Terms of Use</p>
         </div>
         <div class="child-lower-divs">
            <h2>Follow Us</h2>
            <p>Facebook</p>
            <p>X (Twitter)</p>
            <p>Instagram</p>
            <p>YouTube</p>
            <p>LinkedIn</p>
        </div>

   </section>
</body>
</html>
<?php include 'includes/footer.php'; ?>