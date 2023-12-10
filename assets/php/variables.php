<?php 
// Web Host Connections
// $Domain = 'flt4als2023.000webhostapp.com';//Domain Name
// $dbHost = 'localhost';                   //phpMyAdmin Host name

// $dbName = 'id20925946_flt4als';          //database name
// $dbUser = 'id20925946_projectflt4als';   //database username
// $dbPass = 'password@flt4alsDatabase';    //database password

$Domain = 'localhost/FLT4ALS_E-Learning_System';  //Domain Name
$dbHost = 'localhost';                          //phpMyAdmin Host name

$dbName = 'flt4als_e_learning_system';          //database name
$dbUser = 'root';                               //database username
$dbPass = '';                                   //database password
$connectionStatus = '';

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// https://mui.com/material-ui/material-icons/?query=date

if ($conn->connect_error) {
    ?><script>
    alert("Connection Failed, <?php echo $conn->connect_error?>");
    </script><?php
    //die("Connection failed: " . $conn->connect_error);
    $connectionStatus = 'Connection Failed';
    exit();
}else{
    $connectionStatus = 'Connection Success';
}

date_default_timezone_set('Asia/Manila'); 
//$CurrentDate = date("l, F j, Y " );
//date_format($date,"Y/m/d H:i:s"); ==> 2013/03/15 00:00:00
$CurrentDate = date("F j, Y");
$CurrentMonth = date("F");
$CurrentTime = date("h : i : A" );

$CurrentUser = '';


$Circle_logo = 'http://'.$Domain.'/assets/img/logo/logo_crl_wht.png';
$Long_logo = 'http://'.$Domain.'/assets/img/logo/logo_big_wht.png';

$Chatbot_logo = 'http://'.$Domain.'/assets/img/users/chatbot.png';
$UserIcon = 'http://'.$Domain.'/assets/img/users/new.png';

$Page_Home = 'http://'.$Domain.'/index.php';
$Page_About = 'http://'.$Domain.'/about.php';
$Page_Help = 'http://'.$Domain.'/help.php';
$Page_Login = 'http://'.$Domain.'/login.php';

$CSS_File_Material_dashboard ='material-dashboard_v7.3.css';

$Image_Directory = "http://".$Domain."/assets/img/logo/";
$Images_Directory = "http://".$Domain."/assets/img/";

$Tables_Directory = "http://".$Domain."/pages/tables/";
$Items_Directory = "http://".$Domain."/pages/items/";
$Forms_Directory = "http://".$Domain."/pages/forms/";
$Document_Directory = "http://".$Domain."/pages/documents/";

$Php_Directory = "http://".$Domain."/assets/php/";

$Config_file = $Php_Directory."config.php"; 
$Logo_file_long_blk = $Image_Directory."logo_big_blk.png"; 

$Learnings = $Items_Directory."learning.php"; 

$Student_Dashboard = 'http://'.$Domain.'/student.php';
$Student_Profile = 'http://'.$Domain.'/student.php';
$Student_Learning = $Items_Directory."learning.php";
$Student_Assessment = $Items_Directory."assessment.php";
$Student_Assessment_Score_Board = $Items_Directory."assessment_score_board.php";
$Student_Help = $Forms_Directory.'std_help.php';

$Student_FLT_LS1E = $Forms_Directory."std_flt_ls1e.php";
$Student_Review_LS1E = $Document_Directory."std_review_ls1e.php";

$Student_FLT_LS1F = $Forms_Directory."std_flt_ls1f.php";
$Student_Review_LS1F = $Document_Directory."std_review_ls1f.php";

$Student_FLT_LS2 = $Forms_Directory."std_flt_ls2.php";
$Student_Review_LS2 = $Document_Directory."std_review_ls2.php";

$Student_FLT_LS3 = $Forms_Directory."std_flt_ls3.php";
$Student_Review_LS3 = $Document_Directory."std_review_ls3.php";

$Student_FLT_LS4 = $Forms_Directory."std_flt_ls4.php";
$Student_Review_LS4 = $Document_Directory."std_review_ls4.php";

$Student_FLT_LS5 = $Forms_Directory."std_flt_ls5.php";
$Student_Review_LS5 = $Document_Directory."std_review_ls5.php";

$Student_FLT_LS6 = $Forms_Directory."std_flt_ls6.php";
$Student_Review_LS6 = $Document_Directory."std_review_ls6.php";

$Teacher_Dashboard = 'http://'.$Domain.'/teacher.php';
$Teacher_Student = $Items_Directory."tchr_students.php";
$Teacher_FLT_Results = $Tables_Directory."tchr_flt_result.php";
$Teacher_FLT_LSS = $Document_Directory."std_flt_lss.php";
$Teacher_LS_Modules = $Items_Directory."tchr_ls_modules.php";
$Teacher_FLT_PIS = $Forms_Directory."tch_check_pis.php";
$Teacher_FLT_LS1E = $Forms_Directory."tch_check_ls1e.php";
$Teacher_FLT_LS1F = $Forms_Directory."tch_check_ls1f.php";
$Teacher_FLT_LS2 = $Forms_Directory."tch_check_ls2.php";
$Teacher_FLT_LS3 = $Forms_Directory."tch_check_ls3.php";
$Teacher_FLT_LS4 = $Forms_Directory."tch_check_ls4.php";
$Teacher_FLT_LS5 = $Forms_Directory."tch_check_ls5.php";
$Teacher_FLT_LS6 = $Forms_Directory."tch_check_ls6.php";

$Admin_Dashboard = 'http://'.$Domain.'/admin.php';
$Admin_Student_PIS = $Forms_Directory."adm_student_pis.php";
$Admin_Employee_Data = $Forms_Directory."adm_employee_data.php";
$Admin_Student_Reset_Pass = $Forms_Directory."std_reset_pass.php";
$Admin_Employee_Reset_Pass = $Forms_Directory."empl_reset_pass.php";


$backToTopBtn='
    <button onclick="topFunction()" id="backToTopBtn" title="Go to top" class="shadow">
        <i class="material-icons p-3">arrow_upward</i>
    </button>

    <script> // Back to top BTN
        // Get the button
        let mybutton = document.getElementById("backToTopBtn");
        let mainContainer = document.getElementById("mainContainer");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};
        mainContainer.onscroll = function() {scrollFunction()};

        function scrollFunction() {
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50 || mainContainer.scrollTop > 50) {
            mybutton.style.display = "block";
            // console.log("btn=show");
        } else {
            mybutton.style.display = "none";
            // console.log("btn=hide");
        }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;


        mainContainer.scrollTop = 0;
        }
    </script>
';


$TopNav='
    <div class="position-absolute z-index-10 top-0 px-3 my-2 w-100">
        <div class="row">
            <div class="col-12">
                <nav class="navbar w-100 navbar-expand-lg bg-white border-radius-lg z-index-3 shadow">
                    <div class="container-fluid ps-1 pe-0">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3" href="'.$Page_Home.'">
                            <img src="'.$Logo_file_long_blk.'" height="25px" alt="">
                        </a>
                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse" id="navigation">
                            <ul class="nav nav-pills bg-white w-100 p-1 d-flex justify-content-end" role="tablist">
                                <li class="nav-item mx-1">
                                    <a href="'.$Page_Home.'" class="nav-link">
                                    <i class="material-icons text-lg position-relative">home</i>
                                    <span class="ms-1">Home</span>
                                    </a>
                                </li>
                                <li class="nav-item mx-1">
                                    <a href="'.$Page_About.'" class="nav-link">
                                    <i class="material-icons text-lg position-relative">info</i>
                                    <span class="ms-1">About</span>
                                    </a>
                                </li>
                                <li class="nav-item mx-1">
                                    <a href="'.$Page_Help.'" class="nav-link">
                                    <i class="material-icons text-lg position-relative">info</i>
                                    <span class="ms-1">Help</span>
                                    </a>
                                </li>
                                <li class="nav-item mx-1">
                                    <a href="'.$Page_Login.'" class="nav-link">
                                    <i class="material-icons text-lg position-relative">login</i>
                                    <span class="ms-1">Login</span>
                                    </a>
                                </li>
                                <li class="nav-item  mx-1 d-none">
                                    <a href="'.$Page_Login.'" class="nav-link">
                                    <i class="material-icons text-lg position-relative">person</i>
                                    <span class="ms-1">'.$CurrentUser.'</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
';

$Footer='
    <div id="footer" class="row">
        <img class="img-responsive m-0" src="images/logo/deped-als.png" alt="#" />
    </div>
';

$PageFooter='
    <!-- footer -->
    <footer class="footer position-absolute py-4 w-100 bg-gradient-secondary">
    <div class="container">
        <div class="row d-flex justify-content-center p-0">
        <div class="col-12 m-0 p-0 mb-2 text-center">
            <img class="" src="'.$Long_logo.'" width="200px" alt="" >
        </div>
        </div>
        <div class="row align-items-center justify-content-center">
        <div class="col-12">
            <div class="copyright text-center text-sm text-white">
            Copyright © <script> document.write(new Date().getFullYear()) </script>. All Rights Reserved
            </div>
        </div>
        </div>

        <hr class="text-white">
        <div class="row  d-flex align-items-start justify-content-lg-center">
        <div class="col-md-12 text-sm text-light text-center mb-1 text-uppercase">
            Developed by
        </div>
        <div class="col-md-12 text-lg text-white text-center mb-1 text-uppercase font-weight-bold">
            Code of Duty
        </div>
        <div class="col-md-2 col-sm-12 text-sm text-white text-center mb-2">
            Mary Chaylze R. Ignacio
        </div>
        <div class="col-md-2 col-sm-12 text-sm text-white text-center mb-2">
            Catherine Nicole M. Perez
        </div>
        <div class="col-md-2 col-sm-12 text-sm text-white text-center mb-2">
            Jenelle S. Pimentel
        </div>
        <div class="col-md-2 col-sm-12 text-sm text-white text-center mb-2">
            Mariah Carmella P. Santander
        </div>
        <div class="col-md-2 col-sm-12 text-sm text-white text-center mb-2">
            Rhiyen Lee Soriano
        </div>
        </div>
    </div>
    </footer>

    '.$backToTopBtn.'
';

$PageScripts='
    <!--   Core JS Files  czc -->
    <script src="../../assets/js/core/popper.min.js"></script>
    <script src="../../assets/js/core/bootstrap.min.js"></script>
    <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <!-- <script src="../../assets/js/material-dashboard.min.js?v=3.0.0"></script> -->
';

$MainPageScripts='
    <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
      
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/material-dashboard.min.js?v=3.0.0"></script>
';

$MainPagePlugins='
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/'.$CSS_File_Material_dashboard.'" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
';

$PagesPlugins='
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../../assets/css/'.$CSS_File_Material_dashboard.'" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
';

$ModalPlugins='
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
';  

$StudentNavigation='
    <div class="nav-wrapper position-relative end-0 mt-2">
        <ul class="nav nav-pills nav-fill p-1 bg-transparent border-radius-sm shadow-none" role="tablist">
        <li class="nav-item px-1 mb-2">
            <a class="w-100 d-flex align-items-center justify-content-center py-1 shadow-none border border-sedondary border-radius-lg" href="'.$Student_Dashboard.'" class="nav-link">
            <i class="material-icons text-lg position-relative">person</i>
            <span class="ms-1">My Profile</span>
            </a>
        </li>
        <li class="nav-item px-1 mb-2">
            <a class="w-100 d-flex align-items-center justify-content-center py-1 shadow-none border border-sedondary border-radius-lg" href="'.$Student_Learning.'" class="nav-link">
            <i class="material-icons text-lg position-relative">book</i>
            <span class="ms-1">Learnings</span>
            </a>
        </li>
        <li class="nav-item px-1 mb-2">
            <a class="w-100 d-flex align-items-center justify-content-center py-1 shadow-none border border-sedondary border-radius-lg" href="'.$Student_Assessment.'" class="nav-link">
            <i class="material-icons text-lg position-relative">book</i>
            <span class="ms-1">Assessments</span>
            </a>
        </li>
        <li class="nav-item px-1 mb-2">
            <a class="w-100 d-flex align-items-center justify-content-center py-1 shadow-none border border-sedondary border-radius-lg" href="'.$Student_Help.'" class="nav-link">
            <i class="material-icons text-lg position-relative">info</i>
            <span class="ms-1">Help</span>
            </a>
        </li>
        <li class="nav-item px-1 mb-2">
            <form action="'.$Config_file.'" method="POST">
            <button class="w-100 d-flex align-items-center bg-transparent justify-content-center py-1 shadow-none border border-sedondary border-radius-lg" type="submit" name="logout" class="nav-link">
                <i class="material-icons text-lg position-relative">logout</i>
                <span class="ms-1">Logout</span>
            </button>
            </form>     
        </li>
        </ul>
    </div>
';

$OptionsMonths='
    <option value="01">January</option>
    <option value="02">February</option>
    <option value="03">March</option>
    <option value="04">April</option>
    <option value="05">May</option>
    <option value="06">June</option>
    <option value="07">July</option>
    <option value="08">August</option>
    <option value="09">September</option>
    <option value="10">October</option>
    <option value="11">November</option>
    <option value="12">December</option>
';

$OptionsDays='
    <option value="01">01</option>
    <option value="02">02</option>
    <option value="03">03</option>
    <option value="04">04</option>
    <option value="05">05</option>
    <option value="06">06</option>
    <option value="07">07</option>
    <option value="08">08</option>
    <option value="09">09</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
    <option value="16">16</option>
    <option value="17">17</option>
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
    <option value="21">21</option>
    <option value="22">22</option>
    <option value="23">23</option>
    <option value="24">24</option>
    <option value="25">25</option>
    <option value="26">26</option>
    <option value="27">27</option>
    <option value="28">28</option>
    <option value="29">29</option>
    <option value="30">30</option>
    <option value="31">31</option>
';

$OptionsYears='
    <option value="1940">1940</option>
    <option value="1941">1941</option>
    <option value="1942">1942</option>
    <option value="1943">1943</option>
    <option value="1944">1944</option>
    <option value="1945">1945</option>
    <option value="1946">1946</option>
    <option value="1947">1947</option>
    <option value="1948">1948</option>
    <option value="1949">1949</option>
    <option value="1950">1950</option>
    <option value="1951">1951</option>
    <option value="1952">1952</option>
    <option value="1953">1953</option>
    <option value="1954">1954</option>
    <option value="1955">1955</option>
    <option value="1956">1956</option>
    <option value="1957">1957</option>
    <option value="1958">1958</option>
    <option value="1959">1959</option>
    <option value="1960">1960</option>
    <option value="1961">1961</option>
    <option value="1962">1962</option>
    <option value="1963">1963</option>
    <option value="1964">1964</option>
    <option value="1965">1965</option>
    <option value="1966">1966</option>
    <option value="1967">1967</option>
    <option value="1968">1968</option>
    <option value="1969">1969</option>
    <option value="1970">1970</option>
    <option value="1971">1971</option>
    <option value="1972">1972</option>
    <option value="1973">1973</option>
    <option value="1974">1974</option>
    <option value="1975">1975</option>
    <option value="1976">1976</option>
    <option value="1977">1977</option>
    <option value="1978">1978</option>
    <option value="1979">1979</option>
    <option value="1980">1980</option>
    <option value="1981">1981</option>
    <option value="1982">1982</option>
    <option value="1983">1983</option>
    <option value="1984">1984</option>
    <option value="1985">1985</option>
    <option value="1986">1986</option>
    <option value="1987">1987</option>
    <option value="1988">1988</option>
    <option value="1989">1989</option>
    <option value="1990">1990</option>
    <option value="1991">1991</option>
    <option value="1992">1992</option>
    <option value="1993">1993</option>
    <option value="1994">1994</option>
    <option value="1995">1995</option>
    <option value="1996">1996</option>
    <option value="1997">1997</option>
    <option value="1998">1998</option>
    <option value="1999">1999</option>
    <option value="2000">2000</option>
    <option value="2001">2001</option>
    <option value="2002">2002</option>
    <option value="2003">2003</option>
    <option value="2004">2004</option>
    <option value="2005">2005</option>
    <option value="2006">2006</option>
    <option value="2007">2007</option>
    <option value="2008">2008</option>
    <option value="2009">2009</option>
    <option value="2010">2010</option>
    <option value="2011">2011</option>
    <option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
    <option value="2016">2016</option>
    <option value="2017">2017</option>
    <option value="2018">2018</option>
    <option value="2019">2019</option>
    <option value="2020">2020</option>
    <option value="2021">2021</option>
    <option value="2022">2022</option>
    <option value="2023">2023</option>
';


$RealtimeDataLoader='
    <script type="text/javascript"> 
    function loadRealTimeData(TargetID, SourceLocation, RefreshRate) {
        setInterval(function(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(TargetID).innerHTML = this.responseText;
        }
        };
        xhttp.open("GET", "assets/php/"+SourceLocation, true);
        xhttp.send();

        },1000 * RefreshRate);
        
        }
    </script>
';

$PageRealtimeDataLoader='
    <script type="text/javascript"> 
    function loadRealTimeData(TargetID, SourceLocation, RefreshRate) {
        setInterval(function(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(TargetID).innerHTML = this.responseText;
        }
        };
        xhttp.open("GET", "../../assets/php/"+SourceLocation, true);
        xhttp.send();

        },1000 * RefreshRate);
        
        }
    </script>
';


$TeacherNav='
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="">
                <img src="'.$Long_logo.'" class="navbar-brand-img h-100" alt="main_logo">
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link text-white" href="'.$Teacher_Dashboard.'">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">dashboard</i>
                </div>
                <span class="nav-link-text ms-1">Dashboard</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white" href="'.$Teacher_Student.'">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">school</i>
                </div>
                <span class="nav-link-text ms-1">Students</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white" href="'.$Teacher_FLT_Results.'">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">bar_chart</i>
                </div>
                <span class="nav-link-text ms-1">FLT Result</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link active bg-info text-white" href="'.$Teacher_LS_Modules.'">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">book</i>
                </div>
                <span class="nav-link-text ms-1">Learning Modules</span>
            </a>
            </li>
            <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">FLT Response</h6>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white" href="'.$Teacher_FLT_PIS.'">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">book</i>
                </div>
                <span class="nav-link-text ms-1 overflow-hidden">Student P.I.S</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white" href="'.$Teacher_FLT_LS1E.'">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">book</i>
                </div>
                <span class="nav-link-text ms-1 overflow-hidden">LS1 Com. Skills (English)</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white" href="'.$Teacher_FLT_LS1F.'">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">book</i>
                </div>
                <span class="nav-link-text ms-1 overflow-hidden">LS1 Com. Skills (Filipino)</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white" href="'.$Teacher_FLT_LS2.'">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">book</i>
                </div>
                <span class="nav-link-text ms-1 overflow-hidden">LS2 Scientific Literacy and Critical Thinking</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white" href="'.$Teacher_FLT_LS3.'">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">book</i>
                </div>
                <span class="nav-link-text ms-1 overflow-hidden">LS3 Mathematics and Problem Solving Skills</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white" href="'.$Teacher_FLT_LS4.'">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">book</i>
                </div>
                <span class="nav-link-text ms-1 overflow-hidden">LS4 Life & Career</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white" href="'.$Teacher_FLT_LS5.'">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">book</i>
                </div>
                <span class="nav-link-text ms-1 overflow-hidden">LS5 Understanding the Self & Society</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white" href="'.$Teacher_FLT_LS6.'">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">book</i>
                </div>
                <span class="nav-link-text ms-1 overflow-hidden">LS6 Digital Citizenship</span>
            </a>
            </li>
        </ul>
        </div>
        <div class="sidenav-footer position-absolute w-100 bottom-0 ">
            <div class="mx-3">
                <form action="" method="POST">
                <button class="btn bg-gradient-primary mt-4 w-100" type="submit" name="logout">
                <i class="material-icons opacity-10">logout</i>&nbsp&nbsp
                    Logout
                </button>
                </form>
            </div>
        </div>`
    </aside>
';

$AdminNav='
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="">
            <img src="'.$Long_logo.'" class="navbar-brand-img h-100" alt="main_logo">
        </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link text-white" href="'.$Admin_Dashboard.'">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">dashboard</i>
                </div>
                <span class="nav-link-text ms-1">Dashboard</span>
            </a>
            </li>
            <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Users</h6>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white" href="'.$Admin_Student_PIS.'">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">school</i>
                </div>
                <span class="nav-link-text ms-1 overflow-hidden">Students</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white" href="'.$Admin_Employee_Data.'">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">person</i>
                </div>
                <span class="nav-link-text ms-1 overflow-hidden">Teacher and Admins</span>
            </a>
            </li>
        </ul>
        </div>
        <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <form action="" method="POST">
            <button class="btn bg-gradient-primary mt-4 w-100" type="submit" name="logout">
            <i class="material-icons opacity-10">logout</i>&nbsp&nbsp
                Logout
            </button>
            </form>
        </div>
        </div>
    </aside>
';


$backToTopBtn='


';

?>