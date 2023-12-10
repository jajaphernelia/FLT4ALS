<!DOCTYPE html>
<?php 
  include '../../assets/php/variables.php';
  include '../../assets/php/config.php';

  LoggedInRequired($Domain, "student");

  $DbTestPeriod = GetCloseTestPeriodID($conn);
  $TestPeriod = '--';
  if ($DbTestPeriod == 'active'){
      $TestPeriod = $ActiveTestPeriod;
  } else {
      $TestPeriod = 'Closed';
  }
?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/logo/logo_crl_wht.png">
  <title>
    FLT4ALS | Help
  </title>
  <!-- plugins -->
  <?=$PagesPlugins?>

  
<script>
function botMsgContainer(msg){
  return '<div class="d-flex justify-content-start align-items-start mb-2 pe-8"><img src="<?=$Chatbot_logo?>" height="25px" class="me-2 mt-1"><span class="w-80 bg-info text-md text-white border border-radius-lg py-1 px-2">' + msg + '</span></div>';
}
  
function userMsgContainer(msg){
  return '<div class="d-flex justify-content-end align-items-start mb-2 ps-8"><span class="bg-success text-md text-white border border-radius-lg py-1 px-2">' + msg + '</span><img src="<?=$userProfileIcon?>" height="25px" class="border border-radius-xl ms-2 mt-1"></div>';
}

faqs = {
  "Hello" : "Hi there!"
  <?php if ($List_Faqs->num_rows>0){ 
    while ($faqs_data=$List_Faqs-> fetch_assoc()){ ?>
  , "<?=$faqs_data['question']?>" : "<?=$faqs_data['response']?>"
  <?php } } ?>
};

function Chatbot(chatBox) {
  // chatBox = document.getElementById("chatBox").value;
  chatConvo = document.getElementById("chatConvo");
  // chatBox= "";
  chatConvo.innerHTML += userMsgContainer(chatBox);
  
  if (chatBox in faqs) {
    chatConvo.innerHTML += botMsgContainer(faqs[chatBox]);
  } else {
    chatConvo.innerHTML += botMsgContainer("Sorry, I can't understand your question.");
  }
  hideAllFaqs();
}
</script>

<style>
  #question {
    cursor: pointer;
  }
  #question:hover {
    color: red;
  }

</style>

</head>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<body class="bg-gray-200">
  <!-- Navbar -->
  <?=$TopNav?>
  <!-- End Navbar -->
  
  <main id="mainContainer" class="main-content mt-6 pt-4">
    <div class="container-fluid mb-0 p-0">
      <div class="row d-flex justify-content-between px-4 m-0">
        <div class="col-xl-3 col-sm-12 m-0">
          <div class="row mt-1 mb-4 bg-white pt-3 pb-1 border-radius-lg shadow-secondary">
            <div class="col-md-12 col-sm-12 mb-2">
                <div class="card card-body h-100 shadow-none border border-sedondary border-radius-lg">
                    <div class="card-body px-0 pt-2 pb-0">
                        <div class="row">
                        <div class="col-auto">
                            <div class="avatar avatar-xl position-relative">
                            <img src="<?=$userProfileIcon?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                            </div>
                        </div>
                        <div class="col-lg-9 my-auto">
                            <div class="h-100">
                            <h5 class="mb-1">
                                <?=$_SESSION['StudentName']?>
                            </h5>
                            <p class="mb-0 text-mb mb-0 text-capitalize">
                                LRN: <?=$_SESSION['StudentLRN']?>
                            </p>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 mb-2">
                <div class="card card-body h-100 shadow-none border border-sedondary border-radius-lg">
                <div class="card-body px-0 pt-2 pb-0">
                    <div class="icon icon-lg icon-shape bg-gradient-success text-center border-radius-md position-absolute">
                    <i class="material-icons opacity-10">date_range</i>
                    </div>
                    <div class="text-end pt-1">
                    <p class="text-lg mb-0 text-capitalize">Current School Year</p>
                    <h4 class="mb-0 ps-5">S.Y. <?=$ActiveSchoolYear?></h4>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 mb-2">
                <div class="card card-body h-100 shadow-none border border-sedondary border-radius-lg">
                <div class="card-body px-0 pt-2 pb-0">
                    <div class="icon icon-lg icon-shape bg-gradient-info text-center border-radius-md position-absolute">
                    <i class="material-icons opacity-10">local_library</i>
                    </div>
                    <div class="text-end pt-1">
                    <p class="text-lg mb-0 text-capitalize">Current Test Period</p>
                    <h4 class="mb-0 ps-5"><?=$TestPeriod?></h4>
                    </div>
                </div>
                </div>
            </div>
            
            <div class="col-12 mb-2">
                <?=$StudentNavigation?>
            </div>
          </div>
        </div>
        
        <div class="col-xl-5 col-sm-12 mb-4">
          <div class="card p-0">
            <div class="card-header bg-info py-3 px-3 d-flex justify-content-start align-items-center mb-3">
              <img src="<?=$Chatbot_logo?>" alt="logo" height="35px">
              <h3 class="text-white ms-2 mb-0 text-capitalize font-weight-bold">FLT4ALS Chatbot </h3>
            </div>
            <div class="card-body px-4 overflow-auto" style="height: 650px;">
              <div class="d-flex justify-content-start align-items-start pe-8">
                <img src="<?=$Chatbot_logo?>" height="25px" class="me-2 mt-1">
                <span class="bg-info text-white text-md border border-secondary border-radius-lg mb-2 py-1 px-2">
                  Welcome to FLT4ALS Chatbot! <br>
                   How may I help you? <br>
                </span>
              </div>
              <div id="chatConvo">
              </div>
            </div>

            <div class="card-footer px-3 py-2">
              <div id="Faqs" style="max-height: 150px; display: none; position: absolute; bottom: 60px; left:0px" 
                class="overflow-auto px-3 py-2 w-100">
                <?php $List_Quest = GetAllData($conn, 'tbl_chat_msg');
                  if ($List_Quest->num_rows>0){ 
                  while ($user_question=$List_Quest-> fetch_assoc()){
                ?>
                  <div id="db_faqs" class="input-group input-group-outline mb-1 ">
                    <input id="question" 
                      readonly
                      class="bg-white form-control border-radius-sm"
                      value ="<?=$user_question['question']?>"
                      type="text" 
                      onclick="setTimeout(Chatbot(this.value), 30000);">
                  </div>
                <?php } } ?>
              </div>

              <button type="button" name="" value="" class="d-none btn bg-gradient-info btn-md mb-0 d-flex align-items-center">
                <i class="material-icons text-sm">play_arrow</i> &nbsp Send
              </button>
              <div class="input-group input-group-outline mb-3">
                <input 
                  id="userInput" 
                  onkeyup = "search()"
                  placeholder="Type here..." 
                  class="bg-light form-control border-radius-sm"
                  type="text">
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-sm-12 mb-5 p-0 h-100">
          <div class="card p-0 bg-transparent shadow-none">
            <div class="card-header p-0 bg-transparent d-flex justify-content-center align-items-start mb-2">
              <h3 class="text-secondary m-0 text-capitalize font-weight-bold">Frequently Asked Questions </h3>
            </div>
            <div class="card-body p-0 pe-2 overflow-auto" style="max-height: 750px;" >
              <div id="Faqs" class="overflow-auto m-2">
                <?php $List_Quest = GetAllData($conn, 'tbl_chat_msg');
                  if ($List_Quest->num_rows>0){ 
                  while ($user_question=$List_Quest-> fetch_assoc()){
                ?>
                  <p  id="question" class="border border-secondary border-radius-xl p-2 mb-2 mt-0 mx-0" 
                    onclick="setTimeout(Chatbot(this.innerText), 30000);">
                    <?=$user_question['question']?>
                  </p>
                <?php } } ?>
              </div>
            </div>
            
            <div class="card-footer py-2">

            </div>
          </div>
        </div>
      </div>

      <!-- footer -->
      <?=$PageFooter?>
    </div>

  <?=$PageScripts?>
  </main>
<script>
function search() {
  var input, filter, FaqsList, li, a, i, txtValue;
  input = document.getElementById("userInput");
  filter = input.value.toUpperCase();
  FaqsList = document.getElementById("Faqs");
  question = FaqsList.getElementsByTagName("div");

  FaqsList.style.display = "";

  if (input.value == "" || input.value == " "  || input.value == null){
    FaqsList.style.display = "none";
  }
  for (i = 0; i < question.length; i++) {
    console.log("searching....");
    a = question[i].getElementsByTagName("input")[0];
    txtValue = a.textContent || a.innerText || a.value;
    // console.log(txtValue);

    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      question[i].style.display = "";
    } else {
      question[i].style.display = "none";
    }
  }
}

function hideAllFaqs() {
  console.log("hide");

  document.getElementById("Faqs").style.display = "none";
}
</script>
</body>

</html>