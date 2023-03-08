<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<?php 
ob_start();
session_start();

//USED to redirect to previous page after logging in
$_SESSION['CurrentPage'] = "survey_page.php";
$_SESSION['CurrentTab'] = "";

unset($_SESSION['keywords']);

if (isset($_SESSION['UserID']) && isset($_SESSION['Username'])) {
  $login = TRUE;
} else {
  $login = FALSE;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/output.css">
    <link rel = "icon" href = "./img/logo.png" type = "image/x-icon">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <link rel = "icon" href = "./img/logo.png" type = "image/x-icon">

    <link rel="stylesheet" href="./dist/bootstrap.css">
    <script defer src="https://unpkg.com/alpinejs@3.10.5/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <!-- FOR MODALS-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
      <script defer src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">
    <title>Survey</title>
</head>
<!--class="bg-[url('../img/mainBG.png')] bg-no-repeat bg-cover"-->

<body class="bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-blue-700 via-blue-900 to-black">
    <div class="flex flex-col h-screen justify-between">
    <header class="bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-blue-700 via-blue-900 to-black shadow-md border-2 border-black  flex items-center justify-between px-8 py-4">
        <h1 class="w-3/12">
          <a href="home_page.php">    
              <svg viewBox="0 0 240 30.5" class="h-8 w-auto text-white hover:text-orange-500 duration-100">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0 0 5.733 8.5995 5.733 8.5995 28.6651 14.3325 28.6651 14.3325 5.733 22.9321 5.733 22.9321 0 0 0M28.6651 0 28.6651 17.1991C28.6651 22.9321 28.6651 25.7986 32.9649 28.6651L41.5644 28.6651C45.8642 25.7986 45.8642 25.7986 45.8642 17.1991L45.8642 0 40.1312 0 40.1312 17.1991C40.1312 20.0656 40.1312 22.9321 37.2647 22.9321 34.3981 22.9321 34.3981 20.0656 34.3981 17.1991L34.3981 0 28.6651 0M53.0305 0 51.5972 28.6651 57.3303 28.6651 57.3303 17.1991 61.63 17.1991 65.9298 28.6651 71.6628 28.6651 67.3631 17.1991C70 14 70 12 70 9L70 6C70 1 65.9298 0 60.1967 0L60.1967 4.2998C63.0633 4.2998 64.4966 4.2998 64.4966 5.733L64.4966 10.0328C64.4966 12.8994 63.0633 12.8994 60.1967 12.8994L57.3303 12.8994 57.3303 4.2998 60.1967 4.2998 60.1967 0 51.5972 0 51.5972 28.6651 M 90.1184 3.0217 L 90.1184 0 C 80.8854 0 74.842 6.0434 74.842 15.2764 L 81.7891 15.3033 C 81.8092 7.6406 83.742 5.7617 90.0358 5.3121 Z M 74.842 15.2764 L 81.7891 15.3033 C 81.8246 23.085 83.7122 25.0245 90.0306 25.3617 L 90.1184 30.5527 C 80.8854 30.5527 74.842 24.5093 74.842 15.2764 M 90.0102 25.383 L 90.1184 30.5527 C 100.8622 30.5527 105.3947 24.5093 105.3947 15.2764 L 98.1355 15.1745 C 98.1077 23.085 96.272 24.9726 90.051 25.383 Z M 98.2988 15.2965 L 105.3947 15.2764 C 105.3947 6.0434 99.3514 0 90.1184 0 L 90.0569 5.3121 C 96.1663 5.7818 98.1557 7.7021 98.196 15.3167 M 81.7074 33.0251 L 90.1184 42.8074 Z L 89.9879 31.8501 L 90.1184 42.8074 Z M 99.6123 31.6822 L 89.8763 32.4652 L 90.1184 42.8074 L 99.2203 31.6259 M 92.5468 5.5513 L 92.4687 15.2764 C 90.7899 16.7872 90.7899 16.7872 90.7899 21.4876 S 91.6292 19.9768 91.6292 19.9768 C 91.6292 18.298 91.6292 16.7872 92.4687 16.7872 C 93.1401 16.7872 92.4687 19.1374 93.1401 22.8306 C 93.9795 19.1374 93.1401 16.7872 93.9795 16.7872 C 94.6509 16.7872 94.6509 17.6265 94.6509 19.1374 S 94.6509 19.9768 95.4903 22.8306 C 95.4903 19.1374 96.3297 15.9479 93.9795 15.2764 L 93.8993 5.8539 M 87.6572 25.0939 C 87.7682 23.5021 87.7682 19.4732 87.7682 15.2764 C 90.1184 13.7655 90.1184 12.9262 90.1184 11.4153 C 90.1184 9.9045 90.1184 8.3937 87.7682 7.7221 L 86.2574 7.7221 C 84.075 8.3937 84.075 9.9045 84.075 11.4153 C 84.075 12.9262 84.075 13.7655 86.2574 15.2764 L 86.3988 24.8261 Z" fill="currentColor"></path>
            </svg>
            </a>
        </h1>

          <!-- buttons --->
          <div class="w-3/12 flex justify-end">               
              <ul>
                <li class="py-1 nav font-semibold text-lg text-white hover:text-orange-500 duration-200 cursor-pointer active">
                  <!-- DROPDOWN -->
                    <div x-data="{ dropdownOpen: false }" class="inline">
                      <a @click="dropdownOpen = !dropdownOpen" class="cursor-pointer">
                        <?php 
                          if($login == TRUE) {
                            echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 26" stroke-width="1.5" stroke="currentColor" class="h-8 text-white hover:text-orange-500 duration-200 inline items-end mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>';
                            echo $_SESSION['FirstName']; 
                          } else {
                            echo '<a href="login.php">Login </a>'; 
                          }
                        ?>
                      </a>

                      <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

                      <div x-show="dropdownOpen" class="absolute right-8 mt-3 py-2 w-32 bg-gray-100 rounded-md shadow-xl z-20">
                            <a href="settings.php" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-orange-500 hover:text-white">
                                Settings
                            </a>
                            <a id="favorites" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-orange-500 hover:text-white">
                                Favorites
                            </a>
                            <a href="logout.php" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-orange-500 hover:text-white">
                                Sign Out   
                            </a>
                      </div>
                    </div>
                </li>
              </ul>
            </a>        
          </div>
    </header>

    <!---CHECK IF ONE CHECKBOX IS TICKED-->
    <script type="text/javascript">
      $(document).ready(function () {
          $('#checkBtnTypes').click(function() {
            checked = $("input[type=checkbox]:checked").length;
      
            if(!checked) {
              alert("You must select at least one option.");
              return false;
            } else {
              foodTypeProceed();
            }
      
          });
      });

      $(document).ready(function () {
          $('#checkBtnTaste').click(function() {
            checked = $("input[type=checkbox]:checked").length;
      
            if(!checked) {
              alert("You must select at least one option.");
              return false;
            } else {
              foodTasteProceed();
            }
      
          });
      });
      
      </script>
    
    <main class="">
    <section class="overflow-hidden text-gray-700 ">
            <div class="container px-1 pt-4 pb-10 mx-auto lg:pt-2 lg:px-2">
            <!-- breadcrumbs-->
            <nav class="py-2 rounded-md w-full">
            <ol class="list-reset flex">
                <li><a href="home_page.php" class="text-orange-400 hover:text-orange-500">Home</a></li>
                <li><span class="text-white mx-2">/</span></li>
                <li class="text-white">Survey</li>
                
            </ol>
            </nav>

            <!-- BOOKMARK MODAL START-->
            <?php
              $database_review = $_SESSION['DatabaseName'] . '_reviews';

             
                if ($login){
                  $user_database = $_SESSION['Username'];
                  //lower case
                  $user_database = strtolower($user_database);
                  $conn = new mysqli('localhost','root','','turo');
                  $sql_favorites = "SELECT * FROM $user_database";
                  $result_favorites = mysqli_query($conn, $sql_favorites);
  
                  $j = 0;
                  $_SESSION['BookmarkCode'] = array();
                  $_SESSION['BookmarkAlias'] = array();
                  
                  if ($result_favorites->num_rows > 0) {
                    
                    while($row = mysqli_fetch_assoc($result_favorites)) {
                    
                      $col1=$row['restaurant_bookmark'];
                      array_push($_SESSION['BookmarkCode'],$col1);    
                      $col2=$row['restaurant_alias'];
                      array_push($_SESSION['BookmarkAlias'],$col2); 
                  }
                  }
              ?>
  
              <!-- MODAL FOR FAVORITES -->
              <div id="favorites_modal" class="modal " tabindex="-1" role="dialog">
                  <div class="modal-dialog modal-dialog-centered modal-sm " role="document">
                    <div class="modal-content  pb-10 bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-blue-700 via-blue-900 to-black relative hover:shadow-lg hover:shadow-orange-500 ">
                        <div class="modal-header ">
                          <h5 class="modal-title text-xl font-bold text-white ">
                               Favorites
                          </h5>
                          <button onClick="close_option()" type="button" class="close text-xl font-bold text-white"  data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="mx-6 pb-1 modal-body bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-blue-700 via-blue-900 relative shadow-lg">
                          <h5 class="text-gray-200 text-lg font-semibold -mt-2 text-center pb-2 underline underline-offset-4">Bookmarked Restaurant(s)</h5>
                          <form method="POST">
                            <input class="hidden" type="text" id="resultbookmark" name="resultbookmark">
  
                            <!-- DISPLAY ALL BOOKMARKED RESTAURANT-->
                            <?php 
                              for($j; $j < count($_SESSION['BookmarkAlias']) ; $j++) {
                            ?>
                            
                            <!-- Index should always be equal to 0-->
                            <button id="b<?php echo $j;?>" name="submit" type="submit" class="rounded-lg flex gap-x-4 pt-1 w-full hover:bg-yellow-600 hover:drop-shadow-lg cursor-pointer 
                            text-center fas fa-star text-warning pl-2 text-xl text-white pb-1">
                            <?php echo $_SESSION['BookmarkAlias'][$j]?>
                            </button>     
                          <?php
                            }
                          ?>
                          </form>
                          <!---->
                          <!--UNUSED DESIGN-->
                          <?php
                          /*
                          <div class="rounded-lg grid grid-cols-6 mx-4 pt-1 hover:bg-yellow-600 cursor-pointer">
                            <div class="text-center"><i class="fas fa-star text-warning mt-1"></i></div>
                            <div class="col-span-5"><p class="text-lg text-white pb-1">Ying Yang fu</p></div>
                          </div>
                          */
                          ?>
                        </div>
                    </div>
                  </div>
              </div>
  
              <!-- CLOSING IF LOG-INed -->
              <?php
               }
              ?>
              <script>
                 $('#favorites').click(function(){
                  $('#favorites_modal').modal('show');
                });
  
              </script>
  
              <script type="text/javascript">
                const buttons = document.getElementsByTagName("button");
                const resultbookmark = document.getElementById("resultbookmark");
  
                const buttonHovered = e => { 
                    var name = `${e.target.id}`;
                    name = name.substring(1);
                    document.getElementById("resultbookmark").value = name;
  
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (xhttp.readyState == 4 && xhttp.status == 200) {
                      
                        }
                    };
                    xhttp.open("POST", "./restaurant_overview.php", true);
                    xhttp.send(); 
                }   
                for (let button of buttons) {
                    button.addEventListener("mouseover", buttonHovered);
                }
              </script>
  
              <?php
                if (isset($_POST['submit'])) {
                  $int = (is_numeric($_POST['resultbookmark']) ? (int)$_POST['resultbookmark'] : -1);
                  $index = $int;
  
                  echo "<h1>".$index."</h1>";
                  $RestaurantID = $_SESSION['BookmarkCode'][$index];
                  $_SESSION['DatabaseName'] = $RestaurantID;
  
                  if (isset($_SESSION['DatabaseName'])) {
                      header("Location: restaurant_overview.php");
                      exit();
                  }
                }
            ?>
  
              <!-- YELLOW COLOR OF STAR-->
             <style>
                .star-light {
                  color:#e9ecef;
                }
  
                .text-warning {
                  color:#ffc107!important
                }
                a.text-warning:focus,a.text-warning:hover {
                  color:#d39e00!important
                }
              </style>
      <!---->   
  
            <!-- END CODE FOR BOOKMARKS-->




            <h1 class="text-gray-200 pb-2">Note: <span class="font-semibold" >Refreshing the page will restart the survey.</span></h1>
            <div class="shadow-xl pt-10 bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-blue-700 via-blue-900 to-black ">
                
                <div class="text-center">
                  <h2 id="q-text" class="font-bold text-5xl text-white">Are you in hurry?</h2>
                  <div class="py-20">
                    <div id="q1">
                      <button onClick="q1T()" class="m-4 w-2/12 py-3 bg-yellow-600 leading-tight uppercase rounded-lg shadow-md border-t-2 border-orange-400 hover:border-yellow-400 hover:bg-yellow-500 hover:shadow-xl focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out font-medium text-2xl text-center text-gray-100 hover:text-white">Yes</button>
                      <button onClick="q1F()" class="m-4 w-2/12 py-3 bg-yellow-600 leading-tight uppercase rounded-lg shadow-md border-t-2 border-orange-400 hover:border-yellow-400 hover:bg-yellow-500 hover:shadow-xl focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out font-medium text-2xl text-center text-gray-100 hover:text-white">No</button>
                    </div>



                    <div id="q2" class="hidden">
                      <button onClick="q2a1()" class="m-4 w-4/12 py-3 bg-yellow-600 leading-tight uppercase rounded-lg shadow-md border-t-2 border-orange-400 hover:border-yellow-400 hover:bg-yellow-500 hover:shadow-xl focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out font-medium text-2xl text-center text-gray-100 hover:text-white">Solo (1)</button>
                      <br>
                      <button onClick="q2a2()" class="m-4 w-4/12 py-3 bg-yellow-600 leading-tight uppercase rounded-lg shadow-md border-t-2 border-orange-400 hover:border-yellow-400 hover:bg-yellow-500 hover:shadow-xl focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out font-medium text-2xl text-center text-gray-100 hover:text-white">Duo (2)</button>
                      <br>
                      <button onClick="q2a3()" class="m-4 w-4/12 py-3 bg-yellow-600 leading-tight uppercase rounded-lg shadow-md border-t-2 border-orange-400 hover:border-yellow-400 hover:bg-yellow-500 hover:shadow-xl focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out font-medium text-2xl text-center text-gray-100 hover:text-white">Family/Buddies (3+)</button>
                      <br>
                      <button onClick="q2a4()" class="m-4 w-4/12 py-3 bg-yellow-600 leading-tight uppercase rounded-lg shadow-md border-t-2 border-orange-400 hover:border-yellow-400 hover:bg-yellow-500 hover:shadow-xl focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out font-medium text-2xl text-center text-gray-100 hover:text-white">Groups (10+)</button>
                    </div>
                    
                    <!--FOOD TASTE PREFERENCES-->
                    <div id="q3_T" class="hidden form-group">
                      <div class="grid grid-cols-4 ml-40 text-left">
                          <div class="form-check mb-3">
                            <input required id="type-checkbox_1" onclick="ChangeCheckboxLabel_1(this)" class="accent-yellow-500 h-6 w-6 focus:outline-none transition duration-200 mt-2 align-top bg-no-repeat bg-center bg-contain float-left mr-3 cursor-pointer" type="checkbox" value="" >
                            <label id="type-checkbox_1-unchecked" class="form-check-label inline-block font-medium text-4xl text-gray-100" for="flexCheckDefault">
                              Chicken
                            </label>
                            <label id="type-checkbox_1-checked" class="form-check-label hidden font-bold text-4xl text-yellow-500 " for="flexCheckDefault">
                              Chicken
                            </label>
                          </div>

                          <div class="form-check">
                            <input required id="type-checkbox_2" onclick="ChangeCheckboxLabel_2(this)" class="accent-yellow-500 h-6 w-6 focus:outline-none transition duration-200 mt-2 align-top bg-no-repeat bg-center bg-contain float-left mr-3 cursor-pointer" type="checkbox" value="" >
                            <label id="type-checkbox_2-unchecked" class="form-check-label inline-block font-medium text-4xl text-gray-100" for="flexCheckDefault">
                              Beef
                            </label>
                            <label id="type-checkbox_2-checked" class="form-check-label hidden font-bold text-4xl text-yellow-500 " for="flexCheckDefault">
                              Beef
                            </label>
                          </div>

                          <div class="form-check">
                            <input required id="type-checkbox_3" onclick="ChangeCheckboxLabel_3(this)" class="accent-yellow-500 h-6 w-6 focus:outline-none transition duration-200 mt-2 align-top bg-no-repeat bg-center bg-contain float-left mr-3 cursor-pointer" type="checkbox" value="" >
                            <label id="type-checkbox_3-unchecked" class="form-check-label inline-block font-medium text-4xl text-gray-100" for="flexCheckDefault">
                              Pork
                            </label>
                            <label id="type-checkbox_3-checked" class="form-check-label hidden font-bold text-4xl text-yellow-500 " for="flexCheckDefault">
                              Pork
                            </label>
                          </div>


                           <div class="form-check">
                            <input required id="type-checkbox_4" onclick="ChangeCheckboxLabel_4(this)" class="accent-yellow-500 h-6 w-6 focus:outline-none transition duration-200 mt-2 align-top bg-no-repeat bg-center bg-contain float-left mr-3 cursor-pointer" type="checkbox" value="" >
                            <label id="type-checkbox_4-unchecked" class="form-check-label inline-block font-medium text-4xl text-gray-100" for="flexCheckDefault">
                              Seafood
                            </label>
                            <label id="type-checkbox_4-checked" class="form-check-label hidden font-bold text-4xl text-yellow-500 " for="flexCheckDefault">
                              Seafood
                            </label>
                          </div>

                          <div class="form-check">
                            <input required id="type-checkbox_5" onclick="ChangeCheckboxLabel_5(this)" class="accent-yellow-500 h-6 w-6 focus:outline-none transition duration-200 mt-2 align-top bg-no-repeat bg-center bg-contain float-left mr-3 cursor-pointer" type="checkbox" value="" >
                            <label id="type-checkbox_5-unchecked" class="form-check-label inline-block font-medium text-4xl text-gray-100" for="flexCheckDefault">
                              Vegetables
                            </label>
                            <label id="type-checkbox_5-checked" class="form-check-label hidden font-bold text-4xl text-yellow-500 " for="flexCheckDefault">
                              Vegetables
                            </label>
                          </div>

                           <div class="form-check">
                            <input required id="type-checkbox_6" onclick="ChangeCheckboxLabel_6(this)" class="accent-yellow-500 h-6 w-6 focus:outline-none transition duration-200 mt-2 align-top bg-no-repeat bg-center bg-contain float-left mr-3 cursor-pointer" type="checkbox" value="" >
                            <label id="type-checkbox_6-unchecked" class="form-check-label inline-block font-medium text-4xl text-gray-100" for="flexCheckDefault">
                              Soup
                            </label>
                            <label id="type-checkbox_6-checked" class="form-check-label hidden font-bold text-4xl text-yellow-500 " for="flexCheckDefault">
                              Soup
                            </label>
                          </div>

                          <div class="form-check">
                            <input required id="type-checkbox_7" onclick="ChangeCheckboxLabel_7(this)" class="accent-yellow-500 h-6 w-6 focus:outline-none transition duration-200 mt-2 align-top bg-no-repeat bg-center bg-contain float-left mr-3 cursor-pointer" type="checkbox" value="" >
                            <label id="type-checkbox_7-unchecked" class="form-check-label inline-block font-medium text-4xl text-gray-100" for="flexCheckDefault">
                              Pasta/Noodles
                            </label>
                            <label id="type-checkbox_7-checked" class="form-check-label hidden font-bold text-4xl text-yellow-500 " for="flexCheckDefault">
                              Pasta/Noodles
                            </label>
                          </div>

                          <div class="form-check">
                            <input required id="type-checkbox_8" onclick="ChangeCheckboxLabel_8(this)" class="accent-yellow-500 h-6 w-6 focus:outline-none transition duration-200 mt-2 align-top bg-no-repeat bg-center bg-contain float-left mr-3 cursor-pointer" type="checkbox" value="" >
                            <label id="type-checkbox_8-unchecked" class="form-check-label inline-block font-medium text-4xl text-gray-100" for="flexCheckDefault">
                              Dessert
                            </label>
                            <label id="type-checkbox_8-checked" class="form-check-label hidden font-bold text-4xl text-yellow-500 " for="flexCheckDefault">
                              Dessert
                            </label>
                          </div>
                        </div>
                        <br>
                        <button id="checkBtnTypes" class="mt-20 w-2/12 py-3 bg-yellow-600 leading-tight uppercase rounded-lg shadow-md border-t-2 border-orange-400 hover:border-yellow-400 hover:bg-yellow-500 hover:shadow-xl focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out font-medium text-2xl text-center text-gray-100 hover:text-white">Continue</button>
                      
                    </div>

                    <div id="q4_T" class="hidden">
                      <button onClick="q4T_a1()" class="m-4 w-3/12 py-3 bg-yellow-600 leading-tight uppercase rounded-lg shadow-md border-t-2 border-orange-400 hover:border-yellow-400 hover:bg-yellow-500 hover:shadow-xl focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out font-medium text-2xl text-center text-gray-100 hover:text-white">Light</button>
                      <br>
                      <button onClick="q4T_a2()" class="m-4 w-3/12 py-3 bg-yellow-600 leading-tight uppercase rounded-lg shadow-md border-t-2 border-orange-400 hover:border-yellow-400 hover:bg-yellow-500 hover:shadow-xl focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out font-medium text-2xl text-center text-gray-100 hover:text-white">Average</button>
                      <br>
                      <button onClick="q4T_a3()" class="m-4 w-3/12 py-3 bg-yellow-600 leading-tight uppercase rounded-lg shadow-md border-t-2 border-orange-400 hover:border-yellow-400 hover:bg-yellow-500 hover:shadow-xl focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out font-medium text-2xl text-center text-gray-100 hover:text-white">Heavy</button>

                    </div>
     
                    <!--FOOD TASTE PREFERENCES-->
                    <div id="q3_F" class="hidden form-group text-center align-center">
                        <div class="grid grid-cols-5"> 
                            <div></div>
                            <div></div>
                            
                          <div class="form-check mb-3 inline-block text-left pl-4 pb-1">
                            <input required id="taste-checkbox_1" onclick="ChangeCheckboxLabel_1(this)" class="accent-yellow-500 h-6 w-6 focus:outline-none transition duration-200 mt-2 align-top bg-no-repeat bg-center bg-contain float-left mr-3 cursor-pointer" type="checkbox" value="" >
                            <label id="taste-checkbox_1-unchecked" class="pl-3 form-check-label inline-block font-medium text-4xl text-gray-100" for="flexCheckDefault">
                                Sweet
                            </label>
                            <label id="taste-checkbox_1-checked" class="pl-3 form-check-label hidden font-bold text-4xl text-yellow-500 " for="flexCheckDefault">
                                Sweet
                            </label>
                          </div>

                          <div></div>
                          <div></div>
                          <div></div>
                          <br>
                          <div class="form-check inline-block text-left pl-5 pb-4">
                            
                            <input required id="taste-checkbox_2" onclick="ChangeCheckboxLabel_2(this)" class="accent-yellow-500 h-6 w-6 focus:outline-none transition duration-200 mt-2 align-top bg-no-repeat bg-center bg-contain float-left mr-3 cursor-pointer" type="checkbox" value="" >
                            <label id="taste-checkbox_2-unchecked" class="pl-3 form-check-label inline-block font-medium text-4xl text-gray-100" for="flexCheckDefault">
                                Spicy
                            </label>
                            <label id="taste-checkbox_2-checked" class="pl-3 form-check-label hidden font-bold text-4xl text-yellow-500 " for="flexCheckDefault">
                                Spicy
                            </label>
                          </div>

                          <div></div>
                          <div></div>
                          <div></div>
                          <br>
                          <div class="form-check inline-block text-left pl-5 pb-4">
                            <input required id="taste-checkbox_3" onclick="ChangeCheckboxLabel_3(this)" class="accent-yellow-500 h-6 w-6 focus:outline-none transition duration-200 mt-2 align-top bg-no-repeat bg-center bg-contain float-left mr-3 cursor-pointer" type="checkbox" value="" >
                            <label id="taste-checkbox_3-unchecked" class="pl-3 form-check-label inline-block font-medium text-4xl text-gray-100" for="flexCheckDefault">
                                Bitter
                            </label>
                            <label id="taste-checkbox_3-checked" class="pl-3 form-check-label hidden font-bold text-4xl text-yellow-500 " for="flexCheckDefault">
                                Bitter
                            </label>
                          </div>

                          <div></div>
                          <div></div>
                          <div></div>
                          <br>
                          <div class="form-check inline-block text-left pl-5 pb-4">
                            <input required id="taste-checkbox_4" onclick="ChangeCheckboxLabel_4(this)" class="accent-yellow-500 h-6 w-6 focus:outline-none transition duration-200 mt-2 align-top bg-no-repeat bg-center bg-contain float-left mr-3 cursor-pointer" type="checkbox" value="" >
                            <label id="taste-checkbox_4-unchecked" class="pl-3 form-check-label inline-block font-medium text-4xl text-gray-100" for="flexCheckDefault">
                                Sour
                            </label>
                            <label id="taste-checkbox_4-checked" class="pl-3 form-check-label hidden font-bold text-4xl text-yellow-500 " for="flexCheckDefault">
                                Sour
                            </label>
                          </div>

                          <div></div>
                          <div></div>
                          <div></div>
                          <br>
                          <div class="form-check inline-block text-left pl-5">
                            <input required id="taste-checkbox_5" onclick="ChangeCheckboxLabel_5(this)" class="accent-yellow-500 h-6 w-6 focus:outline-none transition duration-200 mt-2 align-top bg-no-repeat bg-center bg-contain float-left mr-3 cursor-pointer" type="checkbox" value="" >
                            <label id="taste-checkbox_5-unchecked" class="pl-3 form-check-label inline-block font-medium text-4xl text-gray-100" for="flexCheckDefault">
                                Salty
                            </label>
                            <label id="taste-checkbox_5-checked" class="pl-3 form-check-label hidden font-bold text-4xl text-yellow-500 " for="flexCheckDefault">
                                Salty
                            </label>
                          </div>

                            <div class="col-span-5 -mt-5">
                            <button id="checkBtnTaste" class="mt-20 w-2/12 py-3 bg-yellow-600 leading-tight uppercase rounded-lg shadow-md border-t-2 border-orange-400 hover:border-yellow-400 hover:bg-yellow-500 hover:shadow-xl focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out font-medium text-2xl text-center text-gray-100 hover:text-white">Continue</button>
                            </div>
                        </div>
                    </div>

                    <div id="q4_F" class="hidden">
                      <button onClick="q4_F()" name="American" class="m-4 w-3/12 py-3 bg-yellow-600 leading-tight uppercase rounded-lg shadow-md border-t-2 border-orange-400 hover:border-yellow-400 hover:bg-yellow-500 hover:shadow-xl focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out font-medium text-2xl text-center text-gray-100 hover:text-white">American</button>
                      <br>
                      <button onClick="q4_F()" name="Chinese" class="m-4 w-3/12 py-3 bg-yellow-600 leading-tight uppercase rounded-lg shadow-md border-t-2 border-orange-400 hover:border-yellow-400 hover:bg-yellow-500 hover:shadow-xl focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out font-medium text-2xl text-center text-gray-100 hover:text-white">Chinese</button>
                      <br>
                      <button onClick="q4_F()" name="Filipino" class="m-4 w-3/12 py-3 bg-yellow-600 leading-tight uppercase rounded-lg shadow-md border-t-2 border-orange-400 hover:border-yellow-400 hover:bg-yellow-500 hover:shadow-xl focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out font-medium text-2xl text-center text-gray-100 hover:text-white">Filipino</button>
                      <br>
                      <button onClick="q4_F()" name="Japanese" class="m-4 w-3/12 py-3 bg-yellow-600 leading-tight uppercase rounded-lg shadow-md border-t-2 border-orange-400 hover:border-yellow-400 hover:bg-yellow-500 hover:shadow-xl focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out font-medium text-2xl text-center text-gray-100 hover:text-white">Japanese</button>
                      <br>
                      <button onClick="q4_F()" name="Mexican" class="m-4 w-3/12 py-3 bg-yellow-600 leading-tight uppercase rounded-lg shadow-md border-t-2 border-orange-400 hover:border-yellow-400 hover:bg-yellow-500 hover:shadow-xl focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out font-medium text-2xl text-center text-gray-100 hover:text-white">Mexican</button>
                    </div> 

                    <div id="q5_F" class="hidden">
                      <button onClick="q5_F()" name="200" class="m-4 w-3/12 py-3 bg-yellow-600 leading-tight uppercase rounded-lg shadow-md border-t-2 border-orange-400 hover:border-yellow-400 hover:bg-yellow-500 hover:shadow-xl focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out font-medium text-2xl text-center text-gray-100 hover:text-white">P200 - P399</button>
                      <br>
                      <button onClick="q5_F()" name="400" class="m-4 w-3/12 py-3 bg-yellow-600 leading-tight uppercase rounded-lg shadow-md border-t-2 border-orange-400 hover:border-yellow-400 hover:bg-yellow-500 hover:shadow-xl focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out font-medium text-2xl text-center text-gray-100 hover:text-white">P400 - P600</button>
                      <br>
                      <button onClick="q5_F()" name="600" class="m-4 w-3/12 py-3 bg-yellow-600 leading-tight uppercase rounded-lg shadow-md border-t-2 border-orange-400 hover:border-yellow-400 hover:bg-yellow-500 hover:shadow-xl focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out font-medium text-2xl text-center text-gray-100 hover:text-white">P600 - P800</button>
                      <br>
                      <button onClick="q5_F()" name="800" class="m-4 w-3/12 py-3 bg-yellow-600 leading-tight uppercase rounded-lg shadow-md border-t-2 border-orange-400 hover:border-yellow-400 hover:bg-yellow-500 hover:shadow-xl focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out font-medium text-2xl text-center text-gray-100 hover:text-white">P800 - P1000</button>
                    </div> 
                    
                    <!--SUBMIT ANSWERS-->
                        <div id="q_submit" class="hidden">
                        <form method="POST">
                            <input class="hidden" id="keyword_list" name="keyword_list" type="text">
                            <button onClick="submit_answer()" type="submit" name="submit" class=" w-3/12 py-3 bg-yellow-600 leading-tight uppercase rounded-lg shadow-md border-t-2 border-orange-400 hover:border-yellow-400 hover:bg-yellow-500 hover:shadow-xl focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out font-medium text-2xl text-center text-gray-100 hover:text-white">Proceed</button>
                        </form>
                    </div>
                
                </div>


                
                
                
            </div>
        </div>

    </section>
    </main>

    <?php 
        if (isset($_POST['submit'])) {
            $keywords_result = $_POST['keyword_list'];
            $keywords_array = explode(" ", $keywords_result);

            //ARRAY FOR SEARCH IN RECOMMENDATION
            $_SESSION['keywords'] = $keywords_array;
            header("Location: recommendation.php");
        }
    
    ?>



    <!--footer Section-->
    <footer class="bg-gray-800 dark:bg-gray-900 mt-auto">
      <div class="mx-auto max-w-5xl px-4 py-2 sm:px-6 lg:px-8">
        <div class="flex justify-center pt-4">
          <svg viewBox="0 0 110 30.5" class="h-8 w-auto text-gray-200">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0 0 5.733 8.5995 5.733 8.5995 28.6651 14.3325 28.6651 14.3325 5.733 22.9321 5.733 22.9321 0 0 0M28.6651 0 28.6651 17.1991C28.6651 22.9321 28.6651 25.7986 32.9649 28.6651L41.5644 28.6651C45.8642 25.7986 45.8642 25.7986 45.8642 17.1991L45.8642 0 40.1312 0 40.1312 17.1991C40.1312 20.0656 40.1312 22.9321 37.2647 22.9321 34.3981 22.9321 34.3981 20.0656 34.3981 17.1991L34.3981 0 28.6651 0M53.0305 0 51.5972 28.6651 57.3303 28.6651 57.3303 17.1991 61.63 17.1991 65.9298 28.6651 71.6628 28.6651 67.3631 17.1991C70 14 70 12 70 9L70 6C70 1 65.9298 0 60.1967 0L60.1967 4.2998C63.0633 4.2998 64.4966 4.2998 64.4966 5.733L64.4966 10.0328C64.4966 12.8994 63.0633 12.8994 60.1967 12.8994L57.3303 12.8994 57.3303 4.2998 60.1967 4.2998 60.1967 0 51.5972 0 51.5972 28.6651 M 90.1184 3.0217 L 90.1184 0 C 80.8854 0 74.842 6.0434 74.842 15.2764 L 81.7891 15.3033 C 81.8092 7.6406 83.742 5.7617 90.0358 5.3121 Z M 74.842 15.2764 L 81.7891 15.3033 C 81.8246 23.085 83.7122 25.0245 90.0306 25.3617 L 90.1184 30.5527 C 80.8854 30.5527 74.842 24.5093 74.842 15.2764 M 90.0102 25.383 L 90.1184 30.5527 C 100.8622 30.5527 105.3947 24.5093 105.3947 15.2764 L 98.1355 15.1745 C 98.1077 23.085 96.272 24.9726 90.051 25.383 Z M 98.2988 15.2965 L 105.3947 15.2764 C 105.3947 6.0434 99.3514 0 90.1184 0 L 90.0569 5.3121 C 96.1663 5.7818 98.1557 7.7021 98.196 15.3167 M 81.7074 33.0251 L 90.1184 42.8074 Z L 89.9879 31.8501 L 90.1184 42.8074 Z M 99.6123 31.6822 L 89.8763 32.4652 L 90.1184 42.8074 L 99.2203 31.6259 M 92.5468 5.5513 L 92.4687 15.2764 C 90.7899 16.7872 90.7899 16.7872 90.7899 21.4876 S 91.6292 19.9768 91.6292 19.9768 C 91.6292 18.298 91.6292 16.7872 92.4687 16.7872 C 93.1401 16.7872 92.4687 19.1374 93.1401 22.8306 C 93.9795 19.1374 93.1401 16.7872 93.9795 16.7872 C 94.6509 16.7872 94.6509 17.6265 94.6509 19.1374 S 94.6509 19.9768 95.4903 22.8306 C 95.4903 19.1374 96.3297 15.9479 93.9795 15.2764 L 93.8993 5.8539 M 87.6572 25.0939 C 87.7682 23.5021 87.7682 19.4732 87.7682 15.2764 C 90.1184 13.7655 90.1184 12.9262 90.1184 11.4153 C 90.1184 9.9045 90.1184 8.3937 87.7682 7.7221 L 86.2574 7.7221 C 84.075 8.3937 84.075 9.9045 84.075 11.4153 C 84.075 12.9262 84.075 13.7655 86.2574 15.2764 L 86.3988 24.8261 Z" fill="currentColor"></path>
          </svg>
        </div>
    
        <p
          class="mx-auto mt-4 max-w-md pb-2 text-center leading-relaxed text-gray-100 dark:text-gray-400"
        >
        Turo is the most handy way to find your favorite restaurant that will satisfy your appetite. Turo website is possibly made for locating different cuisines around Mall of Asia.
        </p>
    
        <nav class="mt-2" aria-labelledby="footer-navigation">
          <h2 class="sr-only" id="footer-navigation">Footer navigation</h2>
    
          <ul class="flex flex-wrap justify-center gap-6 md:gap-8 lg:gap-12">
            <li> <a class="text-white transition hover:text-gray-700/75 dark:text-white dark:hover:text-white/75" href="about_us.html" > About Us</a> </li>
            <li> <a class="text-white transition hover:text-gray-700/75 dark:text-white dark:hover:text-white/75" href="/" > Contact Us </a> </li>
            
          </ul>
        </nav>
    
        <ul class="mt-2 flex py-4 justify-center gap-6 md:gap-8">
          <li>
            <a href="https://www.facebook.com/" rel="noreferrer" target="_blank" class="text-gray-400 transition hover:text-gray-700/75 dark:text-white dark:hover:text-white/75">
              <span class="sr-only">Facebook</span>
              <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true" >
                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
              </svg>
            </a>
          </li>
    
          <li>
            <a href="https://www.instagram.com/" rel="noreferrer" target="_blank" class="text-gray-400 transition hover:text-gray-700/75 dark:text-white dark:hover:text-white/75" >
              <span class="sr-only">Instagram</span>
              <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true" >
                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
              </svg>
            </a>
          </li>
    
          <li>
            <a href="https://www.twitter.com/" rel="noreferrer" target="_blank" class="text-gray-400 transition hover:text-gray-700/75 dark:text-white dark:hover:text-white/75" >
              <span class="sr-only">Twitter</span>
              <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true" >
                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
              </svg>
            </a>
          </li>
        </ul>
      </div>
    </footer>

</body>


<script type="text/javascript">
    var inHurry = false;
    var keywords = "";
    const button_selection = document.getElementsByTagName("button");

    const buttonClicked = e => { 
        var name = `${e.target.name}`;
        keywords += name + " ";

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
        
            }
        };
        xhttp.open("POST", "./restaurant_overview.php", true);
        xhttp.send(); 
    }   
    for (let button of button_selection) {
        button.addEventListener("click", buttonClicked);
    }
           

// First Question
    function q1T() {
        document.getElementById("q2").style.display = "block";
        document.getElementById("q1").style.display = "none";
        document.getElementById("q-text").textContent = "How many people are you?";
        inHurry = true;
        //keywords.push("asdad");
        //alert(keywords[0]);
    }

    function q1F() {
        document.getElementById("q2").style.display = "block";
        document.getElementById("q1").style.display = "none";
        document.getElementById("q-text").textContent = "How many people are you?";
    }

 
// Second Question

    
    function q2a1() {
        if (inHurry) { 
            document.getElementById("q3_T").style.display = "block"; 
            document.getElementById("q-text").textContent = "Pick food types:";
        } 
        else { 
            document.getElementById("q3_F").style.display = "block";
            document.getElementById("q-text").textContent = "Pick your taste preference"; 
        
        }

        //Add selected keyword
        keywords += "1 ";
        //alert(keywords[1]);

        document.getElementById("q2").style.display = "none";
    }

    function q2a2() {
        if (inHurry) { 
            document.getElementById("q3_T").style.display = "block"; 
            document.getElementById("q-text").textContent = "Pick food types:";
        } 
        else { 
            document.getElementById("q3_F").style.display = "block";
            document.getElementById("q-text").textContent = "Pick your taste preference";  
        
        }

        //Add selected keyword
        keywords += "2 ";

        document.getElementById("q2").style.display = "none";
    }

    function q2a3() {
        if (inHurry) { 
            document.getElementById("q3_T").style.display = "block"; 
            document.getElementById("q-text").textContent = "Pick food type(s):";
        } 
        else { 
            document.getElementById("q3_F").style.display = "block";
            document.getElementById("q-text").textContent = "Pick your taste preference"; 
        
        }

        //Add selected keyword
        keywords += "3 ";

        document.getElementById("q2").style.display = "none";
    }

    function q2a4() {
        if (inHurry) { 
            document.getElementById("q3_T").style.display = "block"; 
            document.getElementById("q-text").textContent = "Pick food types:";
        } 
        else { 
            document.getElementById("q3_F").style.display = "block";
            document.getElementById("q-text").textContent = "Pick your taste preference"; 
        
        }

        //Add selected keyword
        keywords += "4 ";

        document.getElementById("q2").style.display = "none";
    }
//FOOD TYPE PREFERENCE
    function foodTypeProceed() {
        if (inHurry) { 
            document.getElementById("q4_T").style.display = "block"; 
            document.getElementById("q-text").textContent = "How strong do you eat?";
        } 
        else { 
            document.getElementById("q4_F").style.display = "block";
            document.getElementById("q-text").textContent = "Which food cuisine do you prefer?"; 
        }
        document.getElementById("q3_T").style.display = "none";
    }




//TASTE PREFERENCE

    //Option 1
    function ChangeCheckboxTaste_1(ckbx) {
    var box = ckbx.id;
    if(ckbx.checked) {
        keywords += "Sweet ";
        document.getElementById(box+"-checked").style.display = "inline-block";
        document.getElementById(box+"-unchecked").style.display = "none";
    }
    else {
            keywords = keywords.replace('Sweet ','');
        document.getElementById(box+"-checked").style.display = "none";
        document.getElementById(box+"-unchecked").style.display = "inline-block";
    }
    }


    //Option 2
    function ChangeCheckboxTaste_2(ckbx) {
    var box = ckbx.id;
    if(ckbx.checked) {
        keywords += "Spicy ";
        document.getElementById(box+"-checked").style.display = "inline-block";
        document.getElementById(box+"-unchecked").style.display = "none";
    }
    else {
        keywords = keywords.replace('Spicy ','');
        document.getElementById(box+"-checked").style.display = "none";
        document.getElementById(box+"-unchecked").style.display = "inline-block";
    }
    }


    //Option 3
    function ChangeCheckboxTaste_3(ckbx) {
    var box = ckbx.id;
    if(ckbx.checked) {
        keywords += "Bitter ";
        document.getElementById(box+"-checked").style.display = "inline-block";
        document.getElementById(box+"-unchecked").style.display = "none";
    }
    else {
        keywords = keywords.replace('Bitter ','');
        document.getElementById(box+"-checked").style.display = "none";
        document.getElementById(box+"-unchecked").style.display = "inline-block";
    }
    }


    //Option 4
    function ChangeCheckboxTaste_4(ckbx) {
    var box = ckbx.id;
    if(ckbx.checked) {
        keywords += "Sour ";
        document.getElementById(box+"-checked").style.display = "inline-block";
        document.getElementById(box+"-unchecked").style.display = "none";
    }
    else {
        keywords = keywords.replace('Sour ','');
        document.getElementById(box+"-checked").style.display = "none";
        document.getElementById(box+"-unchecked").style.display = "inline-block";
    }
    }


    //Option 5
    function ChangeCheckboxTaste_5(ckbx) {
    var box = ckbx.id;
    if(ckbx.checked) {
        keywords += "Salty ";
        document.getElementById(box+"-checked").style.display = "inline-block";
        document.getElementById(box+"-unchecked").style.display = "none";
    }
    else {
        keywords = keywords.replace('Salty ','');
        document.getElementById(box+"-checked").style.display = "none";
        document.getElementById(box+"-unchecked").style.display = "inline-block";
    }
    }

//FOOD TASTE PROCEED

    function foodTasteProceed() {
        document.getElementById("q3_T").style.display = "block";
        document.getElementById("q-text").textContent = "Pick food types:"; 
        document.getElementById("q3_F").style.display = "none";
    }


//CHECKBOX AREA  //CHECKBOX AREA//CHECKBOX AREA//CHECKBOX AREA//CHECKBOX AREA//CHECKBOX AREA//CHECKBOX AREA//CHECKBOX AREA//CHECKBOX AREA

    //Option 1
    function ChangeCheckboxLabel_1(ckbx) {
    var box = ckbx.id;
    if(ckbx.checked) {
        keywords += "Chicken ";
        document.getElementById(box+"-checked").style.display = "inline-block";
        document.getElementById(box+"-unchecked").style.display = "none";
    }
    else {
            keywords = keywords.replace('Chicken ','');
        document.getElementById(box+"-checked").style.display = "none";
        document.getElementById(box+"-unchecked").style.display = "inline-block";
    }
    }


    //Option 2
    function ChangeCheckboxLabel_2(ckbx) {
    var box = ckbx.id;
    if(ckbx.checked) {
        keywords += "Beef ";
        document.getElementById(box+"-checked").style.display = "inline-block";
        document.getElementById(box+"-unchecked").style.display = "none";
    }
    else {
        keywords = keywords.replace('Beef ','');
        document.getElementById(box+"-checked").style.display = "none";
        document.getElementById(box+"-unchecked").style.display = "inline-block";
    }
    }


    //Option 3
    function ChangeCheckboxLabel_3(ckbx) {
    var box = ckbx.id;
    if(ckbx.checked) {
        keywords += "Pork ";
        document.getElementById(box+"-checked").style.display = "inline-block";
        document.getElementById(box+"-unchecked").style.display = "none";
    }
    else {
        keywords = keywords.replace('Pork ','');
        document.getElementById(box+"-checked").style.display = "none";
        document.getElementById(box+"-unchecked").style.display = "inline-block";
    }
    }


    //Option 4
    function ChangeCheckboxLabel_4(ckbx) {
    var box = ckbx.id;
    if(ckbx.checked) {
        keywords += "Seafood ";
        document.getElementById(box+"-checked").style.display = "inline-block";
        document.getElementById(box+"-unchecked").style.display = "none";
    }
    else {
        keywords = keywords.replace('Seafood ','');
        document.getElementById(box+"-checked").style.display = "none";
        document.getElementById(box+"-unchecked").style.display = "inline-block";
    }
    }


    //Option 5
    function ChangeCheckboxLabel_5(ckbx) {
    var box = ckbx.id;
    if(ckbx.checked) {
        keywords += "Vegetables ";
        document.getElementById(box+"-checked").style.display = "inline-block";
        document.getElementById(box+"-unchecked").style.display = "none";
    }
    else {
        keywords = keywords.replace('Vegetables ','');
        document.getElementById(box+"-checked").style.display = "none";
        document.getElementById(box+"-unchecked").style.display = "inline-block";
    }
    }


    //Option 6
    function ChangeCheckboxLabel_6(ckbx) {
    var box = ckbx.id;
    if(ckbx.checked) {
        keywords += "Soup ";
        document.getElementById(box+"-checked").style.display = "inline-block";
        document.getElementById(box+"-unchecked").style.display = "none";
    }
    else {
        keywords = keywords.replace('Soup ','');
        document.getElementById(box+"-checked").style.display = "none";
        document.getElementById(box+"-unchecked").style.display = "inline-block";
    }
    }

//q4_F
    function q4_F() {
        document.getElementById("q4_T").style.display = "block";
        document.getElementById("q4_F").style.display = "none";
        document.getElementById("q-text").textContent = "How strong do you eat?";
    }

//q5_F

function q5_F() {
    document.getElementById("q_submit").style.display = "block";
    document.getElementById("q5_F").style.display = "none";
    document.getElementById("q-text").textContent = "Click proceed to see recommended restaurants.";
}

//FOR IN HURRY (TRUE)
//CHECKBOX AREA  //CHECKBOX AREA//CHECKBOX AREA//CHECKBOX AREA//CHECKBOX AREA//CHECKBOX AREA//CHECKBOX AREA//CHECKBOX AREA//CHECKBOX AREA

    //Option 1
    function ChangeCheckboxLabel_1(ckbx) {
    var box = ckbx.id;
    if(ckbx.checked) {
        keywords += "Chicken ";
        document.getElementById(box+"-checked").style.display = "inline-block";
        document.getElementById(box+"-unchecked").style.display = "none";
    }
    else {
            keywords = keywords.replace('Chicken ','');
        document.getElementById(box+"-checked").style.display = "none";
        document.getElementById(box+"-unchecked").style.display = "inline-block";
    }
    }


    //Option 2
    function ChangeCheckboxLabel_2(ckbx) {
    var box = ckbx.id;
    if(ckbx.checked) {
        keywords += "Beef ";
        document.getElementById(box+"-checked").style.display = "inline-block";
        document.getElementById(box+"-unchecked").style.display = "none";
    }
    else {
        keywords = keywords.replace('Beef ','');
        document.getElementById(box+"-checked").style.display = "none";
        document.getElementById(box+"-unchecked").style.display = "inline-block";
    }
    }


    //Option 3
    function ChangeCheckboxLabel_3(ckbx) {
    var box = ckbx.id;
    if(ckbx.checked) {
        keywords += "Pork ";
        document.getElementById(box+"-checked").style.display = "inline-block";
        document.getElementById(box+"-unchecked").style.display = "none";
    }
    else {
        keywords = keywords.replace('Pork ','');
        document.getElementById(box+"-checked").style.display = "none";
        document.getElementById(box+"-unchecked").style.display = "inline-block";
    }
    }


    //Option 4
    function ChangeCheckboxLabel_4(ckbx) {
    var box = ckbx.id;
    if(ckbx.checked) {
        keywords += "Seafood ";
        document.getElementById(box+"-checked").style.display = "inline-block";
        document.getElementById(box+"-unchecked").style.display = "none";
    }
    else {
        keywords = keywords.replace('Seafood ','');
        document.getElementById(box+"-checked").style.display = "none";
        document.getElementById(box+"-unchecked").style.display = "inline-block";
    }
    }


    //Option 5
    function ChangeCheckboxLabel_5(ckbx) {
    var box = ckbx.id;
    if(ckbx.checked) {
        keywords += "Vegetables ";
        document.getElementById(box+"-checked").style.display = "inline-block";
        document.getElementById(box+"-unchecked").style.display = "none";
    }
    else {
        keywords = keywords.replace('Vegetables ','');
        document.getElementById(box+"-checked").style.display = "none";
        document.getElementById(box+"-unchecked").style.display = "inline-block";
    }
    }


    //Option 6
    function ChangeCheckboxLabel_6(ckbx) {
    var box = ckbx.id;
    if(ckbx.checked) {
        keywords += "Soup ";
        document.getElementById(box+"-checked").style.display = "inline-block";
        document.getElementById(box+"-unchecked").style.display = "none";
    }
    else {
        keywords = keywords.replace('Soup ','');
        document.getElementById(box+"-checked").style.display = "none";
        document.getElementById(box+"-unchecked").style.display = "inline-block";
    }
    }


    //Option 7
    function ChangeCheckboxLabel_7(ckbx) {
    var box = ckbx.id;
    if(ckbx.checked) {
        keywords += "Pasta ";
        keywords += "Noodles ";
        document.getElementById(box+"-checked").style.display = "inline-block";
        document.getElementById(box+"-unchecked").style.display = "none";
    }
    else {
        keywords = keywords.replace('Pasta ','');
        keywords = keywords.replace('Noodles ','');
        document.getElementById(box+"-checked").style.display = "none";
        document.getElementById(box+"-unchecked").style.display = "inline-block";
    }
    }

    //Option 8
    function ChangeCheckboxLabel_8(ckbx) {
    var box = ckbx.id;
    if(ckbx.checked) {
        keywords += "Dessert ";
        document.getElementById(box+"-checked").style.display = "inline-block";
        document.getElementById(box+"-unchecked").style.display = "none";
    }
    else {
        keywords = keywords.replace('Dessert ','');
        document.getElementById(box+"-checked").style.display = "none";
        document.getElementById(box+"-unchecked").style.display = "inline-block";
    }

    }


//q4_T
    function q4T_a1(){
        if (inHurry) { 
            document.getElementById("q_submit").style.display = "block"; 
            document.getElementById("q-text").textContent = "Click proceed to see recommended restaurants.";
        } 
        else { 
            document.getElementById("q5_F").style.display = "block"; 
            document.getElementById("q-text").textContent = "What is your ideal price range per meal?";
        }

        keywords += "Light ";
        document.getElementById("q4_T").style.display = "none";

    }

    function q4T_a2(){
        if (inHurry) { 
            document.getElementById("q_submit").style.display = "block"; 
            document.getElementById("q-text").textContent = "Click proceed to see recommended restaurants.";
        } 
        else { 
            document.getElementById("q5_F").style.display = "block"; 
            document.getElementById("q-text").textContent = "What is your ideal price range per meal?";
        }

        keywords += "Average ";
        document.getElementById("q4_T").style.display = "none";

    }
    

    function q4T_a3(){
        if (inHurry) { 
            document.getElementById("q_submit").style.display = "block"; 
            document.getElementById("q-text").textContent = "Click proceed to see recommended restaurants.";
        } 
        else { 
            document.getElementById("q5_F").style.display = "block"; 
            document.getElementById("q-text").textContent = "What is your ideal price range per meal?";
        }
        keywords += "Heavy ";

        document.getElementById("q4_T").style.display = "none";

    }


//SUBMIT FOR IN HURRY
    function submit_answer(){
        document.getElementById("keyword_list").value = keywords; 
    }





</script>

</html>
