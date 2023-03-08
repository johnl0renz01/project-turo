

<?php 
//KEEP DATA IN FORWARD BUTTON
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");

ob_start();
session_start();

//USED to redirect to previous page after logging in
$_SESSION['CurrentPage'] = "restaurant_overview.php";
if ($_SESSION['count'] === 2) {
  echo("<meta http-equiv='refresh' content='0.04'>");
}

$_SESSION['count'] = 1;

if (isset($_SESSION['UserID']) && isset($_SESSION['Username'])) {
  $login = TRUE;
} else {
  $login = FALSE;
}

if (isset($_SESSION['DatabaseName'])) {
  $currentdatabase = $_SESSION["DatabaseName"];
}

$_SESSION['CurrentID']="";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/output.css">
    <link rel="stylesheet" href="./dist/bootstrap.css">
    <link rel = "icon" href = "./img/logo.png" type = "image/x-icon">

    <script defer src="https://unpkg.com/alpinejs@3.10.5/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <!-- FOR MODALS-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    
    <!-- REMOVABLE/ IDK WHAT SIDE EFFECT -->
    <!--<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>-->

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">
    <title>Restaurant</title>
</head>
<!--class="bg-[url('../img/mainBG.png')] bg-no-repeat bg-cover"-->

<body>
  <div> 
    <header class="bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-blue-700 via-blue-900 to-black shadow-md border-2 border-black  flex items-center justify-between px-8 py-4">
        <!-- logo -->
        <h1 class="w-3/12">
            <a href="home_page.php">
              <svg viewBox="0 0 240 30.5" class="h-8 w-auto text-white hover:text-orange-500 duration-200">
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

    
    <main class="bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-blue-700 via-blue-900 to-black ">
      <section class="overflow-hidden text-gray-700">
        <div class="container px-1 pt-4 pb-10 mx-auto lg:pt-2 lg:px-2">
          <!-- breadcrumbs-->
          <nav class="py-2 rounded-md w-full">
            <ol class="list-reset flex text-orange-400 ">
                <li><a href="home_page.php" class="hover:text-orange-500">Home</a></li>
                <li><span class="text-white mx-2">/</span></li>
                <li>
                <form method="POST">
                  <button class="hover:text-orange-500 cursor-pointer" 
                  name="<?php 
                    if ($_SESSION['PreviousLink'] === "search"){
                      echo "search";
                    }
                    else if ($_SESSION['PreviousLink'] === "recommendation"){
                      echo "recommendation";
                    }
                    else if ($_SESSION['PreviousLink'] === "randomized"){
                      echo "randomized";
                    }         
                  ?>">     
                    <?php         
                      if ($_SESSION['Previous'] === "Search"){
                        echo "Search";
                      }
                      else if ($_SESSION['Previous'] === "Recommendation"){
                        echo "Recommendation";
                      }
                      else if ($_SESSION['Previous'] === "Randomized"){
                        echo "Randomized";
                      }
                    ?>
                  </button>
                </form>
              </li>      
              
              <?php
                $count = 1;
                if($_SESSION['Previous'] === ""){
                  $count = 0;
                }
                for ($i=0; $i<$count; $i++) {
              ?>
              <li><span class="text-white mx-2"><?php if($_SESSION['Previous'] === ""){}else{ echo "/";}?></span></li>
              <?php
                } 
              ?>
              <li class="text-white">Overview</li>
            </ol>
          </nav>

          <br><!--SPACING-->  
          <!--Image  Section -->
          <?php
            $currentdatabase = $_SESSION['DatabaseName'];
            $conn = new mysqli('localhost','root','','turo');
            $sql = "SELECT * FROM $currentdatabase ORDER BY RowID ASC";
            $result = mysqli_query($conn, $sql);

            $_SESSION['RestoDishes'] = array();
            $_SESSION['RestoInfluence'] = array();
            $_SESSION['RestoPrice'] = array();
            $_SESSION['RestoImg'] = array();
            $_SESSION['RestoMenu'] = array();

            if ($result->num_rows > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                if ($row['RestaurantName'] != NULL) {
                  $_SESSION['RestaurantName'] = $row['RestaurantName'];
                }
                if ($row['CuisineType'] != NULL) {
                  $_SESSION['CuisineType'] = $row['CuisineType'];
                }

                if ($row['RestoAddress'] != NULL) {
                  $_SESSION['RestoAddress'] = $row['RestoAddress'];
                }

                if ($row['RestoTime'] != NULL) {
                  $_SESSION['RestoTime'] = $row['RestoTime'];
                }

                if ($row['RestoDirection'] != NULL) {
                  $_SESSION['RestoDirection'] = $row['RestoDirection'];
                }
                
                $c1=$row['RestoDishes'];
                array_push($_SESSION['RestoDishes'],$c1);     
                $c2=$row['RestoInfluence'];
                array_push($_SESSION['RestoInfluence'],$c2); 
                $c3=$row['RestoPrice'];
                array_push($_SESSION['RestoPrice'],$c3); 
                $c4=$row['RestoImg'];
                array_push($_SESSION['RestoImg'],$c4); 
                $c5=$row['RestoMenu'];
                array_push($_SESSION['RestoMenu'],$c5); 
              
              
              }
            }

          ?>


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


            <!-- MODAL FOR REVIEW -->
          <div id="review_modal" class="modal " tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content  bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-blue-700 via-blue-900 to-black relative hover:shadow-lg hover:shadow-orange-500 ">
                      <div class="modal-header ">
                        <h5 class="modal-title  text-xl font-bold text-white ">
                          <?php   
                            if ($_SESSION['EditValid'] === "TRUE"){
                              $_SESSION['EditValid'] = "TRUE";
                              $_SESSION['EditMode'] = "TRUE";
                              $edit_review = TRUE;
                              
                              $current_user = $_SESSION['Username'];
                              $sql_edit = "SELECT * FROM $database_review WHERE review_username = '$current_user'";
                              $result = mysqli_query($conn, $sql_edit);

                              if ($result->num_rows > 0) {
                                $row = mysqli_fetch_assoc($result);
                                if ($row['review_username'] === $current_user) {
                                  $_SESSION['CurrentID'] = $row['review_id'];
                                  $_SESSION['RatingStars'] = $row['review_rating'];
                                  $_SESSION['Title'] = $row['review_title'];
                                  $_SESSION['Content'] = $row['review_context'];
                                }
                              } else {
                                $_SESSION['RatingStars'] = 0;
                                $_SESSION['Title'] = "";
                                $_SESSION['Content'] = "";
                              }

                              
                            } else {
                              $edit_review = FALSE;
                              $_SESSION['EditMode'] = "FALSE";
                            }

                            if ($edit_review === TRUE){echo "Edit Review";} else{echo "Add Review";} ?>
                                                      
                           
                        </h5>
                        <button onClick="close_option()" type="button" class="close text-xl font-bold text-white"  data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body  text-center bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-blue-700 via-blue-900">
                        <h4 class="text-center mt-2 mb-4">
                                <i class="text-3xl fas fa-star star-light submit_star mr-1 cursor-pointer" id="submit_star_1" data-rating="1"></i>
                                <i class="text-3xl fas fa-star star-light submit_star mr-1 cursor-pointer" id="submit_star_2" data-rating="2"></i>
                                <i class="text-3xl fas fa-star star-light submit_star mr-1 cursor-pointer" id="submit_star_3" data-rating="3"></i>
                                <i class="text-3xl fas fa-star star-light submit_star mr-1 cursor-pointer" id="submit_star_4" data-rating="4"></i>
                                <i class="text-3xl fas fa-star star-light submit_star mr-1 cursor-pointer" id="submit_star_5" data-rating="5"></i>
                        </h4>

                        <!-- LOAD STARS (IF EDIT IS ENABLED)-->
                        <script type='text/javascript'>
                            //.detect is in edit review button to detect ratings
                            $(document).ready(function(){
                              var rating_data = <?php echo(json_encode($_SESSION['RatingStars'])); ?>;
                              $(document).on('click', '.detect', function(){
                                $("[data-rating='<?php echo $_SESSION['RatingStars'];?>").click();
                                for(var count = 1; count <= rating_data; count++)
                                  {
                                    $('#submit_star_'+count).addClass('text-warning');
                                  
                                  }
                                  
                              })
                          });
                        </script>
                        <!------------------------------------>

                        <div class="form-group p-2">
                          <input autocomplete="off" type="text" name="review_title" id="review_title" class="p-2 form-control w-full font-medium text-black rounded-md" placeholder="Enter Title Here" maxlength="50"
                          value="<?php if($edit_review){echo $_SESSION['Title'];}else{echo '';}?>"
                          />
                        </div>
                        <div class="form-group p-2">
                          <textarea autocomplete="off" name="review_context" id="review_context" class="p-2 form-control h-52 w-full rounded-md" placeholder="Type Review Here" maxlength="300"><?php if($edit_review){echo $_SESSION['Content'];}else{echo '';}?></textarea>           
                        </div>
                        <div class="form-group text-center mt-4 mb-2">

                        <!--REFRESH PAGE USING FORM and POST-->
                          <form method="POST" class="px-2">
                            <button type="submit" class="w-full  px-6 py-2 border-2 border-red-600 text-black font-medium text-xs leading-tight uppercase rounded-lg bg-gradient-to-r from-orange-300 to-yellow-600 hover:from-red-500 hover:to-yellow-500  shadow-md hover:shadow-orange-400/50" id="save_review">Submit</button>
                          </form>
                        </div>
                      </div>
                  </div>
                </div>
            </div>

            <!-- MODAL FOR SHARE -->

            <div id="share_modal" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                  <div class="modal-content bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-blue-700 via-blue-900 to-black relative hover:shadow-lg hover:shadow-orange-500 ">
                      <div class="modal-header">
                        <h5 class="modal-title  text-xl font-bold text-white ">
                            Share to...
                        </h5>
                        <button type="button" class="close text-xl font-bold text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-blue-700 via-blue-900">
                        
                        <div class="sharing-buttons mt-2 flex flex-wrap">
                          <a class="border-2 duration-200 ease inline-flex items-center mb-1 mr-1 transition p-3 rounded-lg text-white border-orange-600 bg-orange-600 hover:bg-orange-700 hover:border-orange-700 w-full" target="_blank" rel="noopener" href="https://facebook.com/sharer/sharer.php?u=facebook.com" aria-label="Share on Facebook" draggable="false">
                            <svg aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6">
                              <title>Facebook</title>
                              <path d="M379 22v75h-44c-36 0-42 17-42 41v54h84l-12 85h-72v217h-88V277h-72v-85h72v-62c0-72 45-112 109-112 31 0 58 3 65 4z">
                              </path>
                            </svg>
                            &#160 Share to Facebook
                          </a>
                        </div>
                        <!--FACEBOOK ENDS-->
                        <!--Twitter Starts-->
                        <div class="sharing-buttons mt-2 flex flex-wrap">
                          <a class="border-2 duration-200 ease inline-flex items-center mb-1 mr-1 transition p-3 rounded-lg text-white border-orange-600 bg-orange-600 hover:bg-orange-700 hover:border-orange-700 w-full" target="_blank" rel="noopener" href="https://twitter.com/intent/tweet?url=&amp;text=" aria-label="Share on Twitter" draggable="false">
                            <svg aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6">
                              <title>Twitter</title>
                              <path d="m459 152 1 13c0 139-106 299-299 299-59 0-115-17-161-47a217 217 0 0 0 156-44c-47-1-85-31-98-72l19 1c10 0 19-1 28-3-48-10-84-52-84-103v-2c14 8 30 13 47 14A105 105 0 0 1 36 67c51 64 129 106 216 110-2-8-2-16-2-24a105 105 0 0 1 181-72c24-4 47-13 67-25-8 24-25 45-46 58 21-3 41-8 60-17-14 21-32 40-53 55z">
                              </path>
                            </svg>
                            &#160 Share to twitter
                          </a>
                        </div>
                        <!--Twitter Ends-->
                        <!--Instagram START-->
                        <div class="flex mt-2 justify-wrap">
                          <a href="http://www.instagram.com" target="_blank" data-mdb-ripple="true" data-mdb-ripple-color="light" class="border-2 duration-200 ease inline-flex items-center mb-1 mr-1 transition p-3 rounded-lg text-white border-orange-600 bg-orange-600 hover:bg-orange-700 hover:border-orange-700 w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6">
                              <path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                            </svg>
                            &#160 Share to Instagram
                        </a>
                        </div>
                        <!--Instagram ENDS-->
                        <!--Email Starts-->
                        <div class="sharing-buttons mt-2 flex flex-wrap">
                          <a class="border-2 duration-200 ease inline-flex items-center mb-1 mr-1 transition p-3 rounded-lg text-white border-orange-600 bg-orange-600 hover:bg-orange-700 hover:border-orange-700 w-full" target="_blank" rel="noopener" href="mailto:?subject=&amp;body=" aria-label="Share by Email" draggable="false">
                            <svg aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6">
                              <title>Email</title>
                              <path d="M464 64a48 48 0 0 1 29 86L275 314c-11 8-27 8-38 0L19 150a48 48 0 0 1 29-86h416zM218 339c22 17 54 17 76 0l218-163v208c0 35-29 64-64 64H64c-35 0-64-29-64-64V176l218 163z">
                              </path>
                            </svg>
                            &#160 Share to Email
                          </a>
                        </div>


                      </div>
                  </div>
                </div>
            </div>


          <div class="flex flex-wrap -m-1 md:-m-2">
            <div class="flex flex-wrap w-1/2">
              <div class="w-full p-1 md:p-2">
                <a href="<?php echo "./img/Restaurant Pics/"; echo $_SESSION['RestaurantName']; echo " Pics/"; echo $_SESSION['RestoImg'][0]; echo ".png"; ?>" data-fancybox="gallery1">
                  <img alt="gallery" class="inline-block object-cover object-center w-50 h-full rounded-lg"
                    src="<?php echo "./img/Restaurant Pics/"; echo $_SESSION['RestaurantName']; echo " Pics/"; echo $_SESSION['RestoImg'][0]; echo ".png"; ?>">
                </a>
              </div>
            </div>
            <div class="flex flex-wrap w-1/2">
              <div class="w-1/2 p-1 md:p-2">
                <a href="<?php echo "./img/Restaurant Pics/"; echo $_SESSION['RestaurantName']; echo " Pics/"; echo $_SESSION['RestoImg'][1]; echo ".png"; ?>" data-fancybox="gallery1">
                  <img alt="gallery" class="inline-block object-cover object-center w-full h-full rounded-lg"
                    src="<?php echo "./img/Restaurant Pics/"; echo $_SESSION['RestaurantName']; echo " Pics/"; echo $_SESSION['RestoImg'][1]; echo ".png"; ?>">
                </a>
              </div>
              <div class="w-1/2 p-1 md:p-2">
                <a href="<?php echo "./img/Restaurant Pics/"; echo $_SESSION['RestaurantName']; echo " Pics/"; echo $_SESSION['RestoImg'][2]; echo ".png"; ?>" data-fancybox="gallery1">
                  <img alt="gallery" class="inline-block object-cover object-center  w-full h-full rounded-lg"
                    src="<?php echo "./img/Restaurant Pics/"; echo $_SESSION['RestaurantName']; echo " Pics/"; echo $_SESSION['RestoImg'][2]; echo ".png"; ?>">
                </a>
              </div>
              <div class="w-1/2 p-1 md:p-2">
                <a href="<?php echo "./img/Restaurant Pics/"; echo $_SESSION['RestaurantName']; echo " Pics/"; echo $_SESSION['RestoImg'][3]; echo ".png"; ?>" data-fancybox="gallery1">
                  <img alt="gallery" class="inline-block object-cover object-center  w-full h-full rounded-lg"
                    src="<?php echo "./img/Restaurant Pics/"; echo $_SESSION['RestaurantName']; echo " Pics/"; echo $_SESSION['RestoImg'][3]; echo ".png"; ?>">
                </a>
              </div>
              <div class="w-1/2 p-1 md:p-2">
                <a href="<?php echo "./img/Restaurant Pics/"; echo $_SESSION['RestaurantName']; echo " Pics/"; echo $_SESSION['RestoImg'][4]; echo ".png"; ?>" data-fancybox="gallery1">
                  <img alt="gallery" class="inline-block object-cover object-center w-full h-full rounded-lg"
                    src="<?php echo "./img/Restaurant Pics/"; echo $_SESSION['RestaurantName']; echo " Pics/"; echo $_SESSION['RestoImg'][4]; echo ".png"; ?>">
                </a>
              </div>
            </div>
          </div>
          <br>
          

          <?php
            $edit_review = FALSE; 
          ?>
          

          <div class="grid grid-cols-2">
              <div class="flex justify-start">
                <h2 class="pr-2 font-medium leading-tight text-4xl mt-0 mb-2 text-white"><?php echo $_SESSION['RestaurantName'];?> <span class="text-gray-400">—</span></h2>
                <p class="pt-1 text-4xl font-medium text-yellow-400 ">
                  <span id="average_rating">0.0</span>
                  <span class="sr-only"> Average review score </span>
                </p>
          
                <div class="ml-3 mt-2.5">
                  <div class="-ml-1 flex">
                    <i class="fas fa-star star-light mr-1 main_star "></i>
                    <i class="fas fa-star star-light mr-1 main_star"></i>
                    <i class="fas fa-star star-light mr-1 main_star"></i>
                    <i class="fas fa-star star-light mr-1 main_star"></i>
                    <i class="fas fa-star star-light mr-1 main_star"></i>
                  </div>
                  <p class="-ml-1 text-xs text-gray-100">Based on <span id="total_review">0</span> reviews</p>
                </div>

            </div>
              <div class="mt-2 grid grid-cols-3 gap-x-2">
                <div>
                  <button 
                  <?php 
                    if (isset($_SESSION['UserID']) && isset($_SESSION['Username'])) {
                      
                      $current_user = $_SESSION['Username'];
                      $sql = "SELECT * FROM $database_review WHERE review_username = '$current_user'";
                      $result = mysqli_query($conn, $sql);
                      if ($result->num_rows > 0) {
                        $_SESSION['EditValid'] = "TRUE";
                        $edit_review = TRUE;
                        $_SESSION['EditMode'] = "TRUE";
                      } else {
                        $_SESSION['EditValid'] = "FALSE";
                        $edit_review = FALSE;
                        $_SESSION['EditMode'] = "FALSE";
                      }
                    }
                  ?>  
                  name="<?php if($edit_review === TRUE){echo "edit_review";} else{echo "add_review";} ?>" 
                  id="<?php if($edit_review === TRUE){echo "edit_review";} else{echo "add_review";} ?>" 
                  title="
                  <?php if (isset($_SESSION['Username'])){}else{echo "You need to be logged-in to add a review.";}?>" 
                  type="button" class='detect w-full py-3 text-xs leading-tight uppercase rounded-full shadow-md 
                  <?php if (isset($_SESSION['Username'])){echo "font-medium text-white hover:bg-orange-600 hover:shadow-lg focus:bg-orange-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-orange-600 active:shadow-lg transition duration-150 ease-in-out";}
                  else {echo "font-bold text-gray-200";} ?>
                  <?php if (isset($_SESSION['Username'])){echo "bg-orange-500";}else{ echo "bg-gray-500 cursor-default";}?>' 
                  <?php if (isset($_SESSION['Username'])){
                      
                  }else{echo " disabled ";}?>
                  >
                  <div class="ml-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 2 30 30" stroke-width="1.5" stroke="currentColor" class="absolute ml-14 w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                    </svg>
                    <span>
                    <?php 
                      if ($edit_review === TRUE) {
                        echo "Edit Review";
                      } else {
                        echo "Add Review";
                      }     
                    ?>                 
                    </span>
                  </div>
                  </button>    
                </div>

                <?php 
                  if (isset($_SESSION['Username'])){
                    $bookmarked = "FALSE";
                    $aliastally = 0;
                    for($aliastally; $aliastally < count($_SESSION['BookmarkCode']) ; $aliastally++) {
                      if ($_SESSION['BookmarkCode'][$aliastally] === $currentdatabase){
                        $bookmarked = "TRUE";
                      }
                    }
                  }
                ?>

                <div>
                  <form method="POST">
                    <button type="submit" id="<?php if ($bookmarked === "TRUE"){ echo "delete_bookmark";}else{echo "add_bookmark";}?>" 
                    name="<?php if ($bookmarked === "TRUE"){ echo "delete_bookmark";}else{echo "add_bookmark";}?>" 
                    title="<?php if (isset($_SESSION['Username'])){}else{echo "You need to be logged-in to bookmark a restaurant";}?>" type="button" class='w-full py-3 font-bold text-xs leading-tight uppercase rounded-full shadow-md 
                    <?php if (isset($_SESSION['Username'])){echo "text-gray-700 hover:bg-yellow-600 hover:shadow-lg hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out";}
                    else {echo "text-gray-200";} ?>
                    <?php if (isset($_SESSION['Username'])){

                      

                      if ($bookmarked === "TRUE"){
                      /*
                      $sql_bookmark = "SELECT * FROM $user_database WHERE restaurant_bookmark='$currentdatabase'";
                      $result_bookmark = mysqli_query($conn, $sql_bookmark);

                      if ($result_bookmark->num_rows > 0) {
                        $row = mysqli_fetch_assoc($result_bookmark);
                        if ($row['restaurant_bookmark'] === $currentdatabase) {
                          echo "bg-yellow-600";
                        }
                      */
                        echo "bg-yellow-400 hover:bg-yellow-500";
                      } else {
                        echo "bg-gray-200 hover:bg-gray-300";
                      }

                    } else { echo "bg-gray-500 cursor-default";}?>' 
                    <?php if (isset($_SESSION['Username'])){}else{echo " disabled ";}?>
                    >
                    <div class="ml-4">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 2 30 30" stroke-width="1.5" stroke="currentColor" class="absolute ml-14 w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                      </svg>
                      <span>Bookmark</span>
                    </div>
                    </button>
                  </form>
                </div>


                <?php    
                    if (isset($_POST['delete_bookmark'])) {  
                        $query = "DELETE FROM $user_database WHERE restaurant_bookmark='$currentdatabase'";  
                        $run = mysqli_query($conn,$query);  
                        echo("<meta http-equiv='refresh' content='0.04'>");
                    } 

                    else if (isset($_POST['add_bookmark'])) {
                        $alias = $_SESSION['RestaurantName'];
                        $query = "INSERT INTO  $user_database (restaurant_bookmark, restaurant_alias) VALUES ('$currentdatabase', '$alias')";  
                        $run = mysqli_query($conn,$query); 
                        echo("<meta http-equiv='refresh' content='0.04'>");
                    }
                ?>  

                <div>
                  <button name="share" id="share" type="button" class="w-full py-3 bg-gray-200 text-gray-700 font-bold text-xs leading-tight uppercase rounded-full shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out">
                  <div class="ml-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 2 30 30" stroke-width="1.5" stroke="currentColor" class="absolute ml-16 w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z" />
                    </svg>
                    <span>Share</span>
                  </div>
                  </button>       
                </div>           
              </div>
          </div>

          

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

          <script>

            $(document).ready(function(){

              // SHARE MODAL
              $('#share').click(function(){

                  $('#share_modal').modal('show');

              });

              var rating_data = 0;

                $('#add_review').click(function(){

                    $('#review_modal').modal('show');

                });

                $('#edit_review').click(function(){

                  $('#review_modal').modal('show');

                });

                $(document).on('mouseenter', '.submit_star', function(){

                    var rating = $(this).data('rating');

                    reset_background();

                    for(var count = 1; count <= rating; count++)
                    {

                        $('#submit_star_'+count).addClass('text-warning');

                    }

                });

                function reset_background()
                {
                    for(var count = 1; count <= 5; count++)
                    {

                        $('#submit_star_'+count).addClass('star-light');

                        $('#submit_star_'+count).removeClass('text-warning');

                    }
                }

                $(document).on('mouseleave', '.submit_star', function(){

                    reset_background();

                    for(var count = 1; count <= rating_data; count++)
                    {

                        $('#submit_star_'+count).removeClass('star-light');

                        $('#submit_star_'+count).addClass('text-warning');
                    }

                });

                $(document).on('click', '.submit_star', function(){

                    rating_data = $(this).data('rating');

                });

                $('#save_review').click(function(){

                    var review_title = $('#review_title').val();
                    var review_context = $('#review_context').val();
                    

                    if (rating_data == 0) {
                        alert("Please Leave a Rating.");
                        return false;
                    } 

                    else if(review_title == '' || review_context == '')
                    {
                        alert("Please Fill Both Field.");
                        return false;
                    }
                    else
                    {
                        $.ajax({
                            url:"submit_rating.php",
                            method:"POST",
                            data:{rating_data:rating_data, review_title:review_title, review_context:review_context},
                            success:function(data)
                            {
                                $('#review_modal').modal('hide');
                                load_rating_data();
                                alert(data);
                            }
                        })
                    }

                });

                load_rating_data();

                function load_rating_data()
                {
                    $.ajax({
                        url:"submit_rating.php",
                        method:"POST",
                        data:{action:'load_data'},
                        dataType:"JSON",
                        success:function(data)
                        {
                            $('#average_rating').text(data.average_rating);
                            $('#total_review').text(data.total_review);

                            var count_star = 0;

                            $('.main_star').each(function(){
                                count_star++;
                                if(Math.ceil(data.average_rating) >= count_star)
                                {
                                    $(this).addClass('text-warning');
                                    $(this).addClass('star-light');
                                }
                            });
                        }
                    })
                }

            });

            </script>

          <p class="text-base font-light leading-relaxed mt-0 mb-0 text-white">
           <?php echo $_SESSION['CuisineType'];?><br>
           <?php echo $_SESSION['RestoAddress'];?><br>
           <?php echo $_SESSION['RestoTime'];?>
          </p>
      
          <!--Declation for tabs-->
          <div class="tabs-group mt-4" id="tabs_area">
            <div class="tabs-container" >
              <form method="POST" class="inline-flex w-full">
                <div class="tabs p-0" id="overview">
                  <button name="overview" class="w-full h-full text-white p-4" type="submit">
                    Overview
                  </button>
                </div>
                <div class="tabs p-0" id="review">
                  <button name="review" class="w-full h-full text-white p-4" type="submit">
                    Review
                  </button>
                </div>
                <div class="tabs p-0" id="menu">
                  <button name="menu" class="w-full h-full text-white p-4" type="submit">
                    Menu
                  </button>
                </div>
                <div class="tabs p-0" id="direction"> 
                  <button name="direction" class="w-full h-full text-white p-4" type="submit">
                    Direction
                  </button>
                </div>
              </form>
    
                <div class="indicator"></div>
            </div>
            <!--Tab content Section-->
            <div class="tab-content">
              <hr class="mb-4">
                <!-- TAB CONTENT FOR OVERVIEW-->
                <div class="tab-content-item">
                  <h1 class="font-bold text-white text-2xl">About this Place</h1>
                  <section>
                  <div class="grid grid-cols-4 text-left">
                      <div class="p-2">
                          <h3 class="text-orange-400 text-xl">Cuisine</h3>
                          <p class="text-white"><?php echo $_SESSION['CuisineType'];?></p>
                      </div>
                      <div class="p-2">
                          <h3 class="text-orange-400 text-xl">
                              Popular Dishes
                          </h3>
                          
                          <p class="text-white pr-2">
                            <?php for($i=0; $i < count($_SESSION['RestoDishes']) ; $i++) { 
                                if ($_SESSION['RestoDishes'][$i] != NULL){
                                  if ($i > 0) {
                                    echo ", ";
                                  }  
                                  echo $_SESSION['RestoDishes'][$i];  
                                }
                              }?> 
                          </p>
                      </div>
                      <div class="p-2">
                          <h3 class="text-orange-400 text-xl">
                              People Say This Place Is Known Fors
                          </h3>
                          <p class="text-white">
                            <?php for($i=0; $i < count($_SESSION['RestoInfluence']) ; $i++) { 
                                if ($_SESSION['RestoInfluence'][$i] != NULL){
                                  if ($i > 0) {
                                    echo ", ";
                                  }  
                                  echo $_SESSION['RestoInfluence'][$i];  
                                }
                              }?> 
                          </p>
                      </div>
                      <div class="p-2">
                          <h3 class="text-orange-400 text-xl">
                              Average Cost
                          </h3>
                          <p class="text-white">
                            <?php for($i=0; $i < count($_SESSION['RestoPrice']) ; $i++) { 
                                if ($_SESSION['RestoPrice'][$i] != NULL){
                                  if ($i > 0) {
                                    echo ""; //ADD COMMA IF NECESSARY
                                  }  
                                  echo $_SESSION['RestoPrice'][$i];  
                                  echo '<br>';
                                }
                              }?> 
                          </p>
                      </div>
                  </div>
                  </section>


                </div>
                <!--TAB CONTENT FOR REVIEW-->
                <div class="tab-content-item">
                  <section >
                    <div class="max-w-full  backdrop-blur-sm">
                      
                      <h2 class=" font-bold text-2xl text-orange-400">Customer Reviews</h2>          
                      <div>
                        <span class="text-white text-md mr-2">Sort By:</span>
                        <form method="POST">
                          <button type="submit" id="star_all" name="star_all" class=" border-2 border-gray-400 w-1/12 py-1 mt-3 text-sm leading-tight  shadow-md font-medium text-gray-200 hover:bg-yellow-600/50 hover:shadow-lg hover:text-white hover:border-yellow-600/50 focus:text-white focus:border-yellow-600/75 focus:bg-yellow-600/75 focus:shadow-lg">
                            All Stars
                          </button>
                          <button type="submit" id="star5" name="star5" class=" border-2 border-gray-400 w-1/12 py-1 mt-3 text-sm leading-tight  shadow-md font-medium text-white hover:bg-yellow-600/50 hover:shadow-lg hover:border-yellow-600/50 focus:border-yellow-600/75 focus:bg-yellow-600/75 focus:shadow-lg">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                          </button>
                          <button type="submit" id="star4" name="star4" class=" border-2 border-gray-400 w-1/12 py-1 mt-3 text-sm leading-tight  shadow-md font-medium text-white hover:bg-yellow-600/50 hover:shadow-lg hover:border-yellow-600/50 focus:border-yellow-600/75 focus:bg-yellow-600/75 focus:shadow-lg">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                          </button>
                          <button type="submit" id="star3" name="star3" class=" border-2 border-gray-400 w-1/12 py-1 mt-3 text-sm leading-tight  shadow-md font-medium text-white hover:bg-yellow-600/50 hover:shadow-lg hover:border-yellow-600/50 focus:border-yellow-600/75 focus:bg-yellow-600/75 focus:shadow-lg">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                          </button>
                          <button type="submit" id="star2" name="star2" class=" border-2 border-gray-400 w-1/12 py-1 mt-3 text-sm leading-tight  shadow-md font-medium text-white hover:bg-yellow-600/50 hover:shadow-lg hover:border-yellow-600/50 focus:border-yellow-600/75 focus:bg-yellow-600/75 focus:shadow-lg">
                            
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                          </button>
                          <button type="submit" id="star1" name="star1" class=" border-2 border-gray-400 w-1/12 py-1 mt-3 text-sm leading-tight  shadow-md font-medium text-white hover:bg-yellow-600/50 hover:shadow-lg hover:border-yellow-600/50 focus:border-yellow-600/75 focus:bg-yellow-600/75 focus:shadow-lg">
                            
                            <i class="fas fa-star text-warning"></i>
                          </button>
                        </form>
                      </div>

                      <div class="mt-7 grid grid-cols-1 gap-x-16 gap-y-4 lg:grid-cols-1">

                      

                      <!--LOOPING-->
                       <?php
                            $conn_review = new mysqli('localhost','root','','turo');


                            $sql_review = "SELECT * FROM $database_review  ORDER BY datetime DESC";
                            $result_review = mysqli_query($conn_review, $sql_review);


                            

                            if(isset($_POST['star_all'])){
                              $sql_review = "SELECT * FROM $database_review  ORDER BY datetime DESC";
                              $result_review = mysqli_query($conn_review, $sql_review);
                             

                            }

                            else if(isset($_POST['star5'])){
                              $sql_review = "SELECT * FROM $database_review  WHERE review_rating=5 ORDER BY datetime DESC";
                              $result_review = mysqli_query($conn_review, $sql_review);
                              
                            }

                            else if(isset($_POST['star4'])){
                              $sql_review = "SELECT * FROM $database_review  WHERE review_rating=4 ORDER BY datetime DESC";
                              $result_review = mysqli_query($conn_review, $sql_review);
                             
                            }

                            else if(isset($_POST['star3'])){
                              $sql_review = "SELECT * FROM $database_review  WHERE review_rating=3 ORDER BY datetime DESC";
                              $result_review = mysqli_query($conn_review, $sql_review);
                            
                            }

                            else if(isset($_POST['star2'])){
                              $sql_review = "SELECT * FROM $database_review  WHERE review_rating=2 ORDER BY datetime DESC";
                              $result_review = mysqli_query($conn_review, $sql_review);
                         
                            }

                            else if(isset($_POST['star1'])){
                              $sql_review = "SELECT * FROM $database_review  WHERE review_rating=1 ORDER BY datetime DESC";
                              $result_review = mysqli_query($conn_review, $sql_review);
                       
                            }

                            $history = $_SESSION['history'];

                            if ($result_review->num_rows> 0) {
                              while($row = mysqli_fetch_assoc($result_review)) {

                                $_SESSION['ReviewName'] = $row['review_fullname'];
                                $_SESSION['ReviewTitle'] = $row['review_title'];
                                $_SESSION['ReviewContext'] = $row['review_context'];
                                $_SESSION['ReviewRating'] = $row['review_rating'];
                                $_SESSION['DateTime'] = date(' jS F, Y', $row["datetime"]);

                        ?>
                        <blockquote>
                          <header class="sm:flex sm:items-center">
                            <div class="ml-1 flex">
                              <?php
                                $star_limit = $_SESSION['ReviewRating'];
                              
                                for ($star = 1; $star <= 5; $star++) {
                                  if ($star <= $star_limit) {
                                    echo "<i class='fas fa-star text-warning mr-1'></i>";
                                  } else {
                                    echo "<i class='fas fa-star star-light mr-1'></i>";
                                  }
                                }
                              ?>
                            </div>
                          

                            <p class="font-medium sm:ml-4 sm:mt-0  text-orange-400">
                              <?php
                                  echo $_SESSION['ReviewTitle'];
                              ?>
                            </p>
                          </header>
                  
                          <p class="mt-2 text-white bg-gray-600 p-3 rounded-2xl">
                            <?php
                                echo $_SESSION['ReviewContext'];  
                            ?>
                          </p>
                          
                          <footer class="ml-3 mt-2 mb-6">
                            <p class="text-xs text-gray-200">
                              <?php
                                echo $_SESSION['ReviewName'];
                                echo " - ";
                                echo $_SESSION['DateTime'];
                              ?>
                            </p>
                          </footer>

                          <?php
                              }
                            }
                          ?>
                        </blockquote>

                  
                      </div>
                    </div>
                  </section>
                </div>

                <!--TAB CONTENT FOR MENU-->
                <div class="tab-content-item" id="tab_menu" tabindex='1'>
                <section>
                  <?php
                    $limit = 0;
                    for ($i = 0; $i < count($_SESSION['RestoMenu']); $i++) { 
                      if ($_SESSION['RestoMenu'][$i] != NULL){
                        $limit ++;
                      }
                    }
                    ?>
                    <ul class="grid <?php echo "grid-cols-"; echo $limit;?> gap-2">
                    <?php
                    for ($i = 0; $i < count($_SESSION['RestoMenu']); $i++) { 
                      if ($_SESSION['RestoMenu'][$i] != NULL){
                      ?>
                        <li>
                          <a href="<?php echo "./img/Menu/"; echo $_SESSION['RestaurantName']; echo " Pics/"; echo $_SESSION['RestoMenu'][$i]; echo ".png"; ?>" class="fancybox hover:brightness-50 ease-in duration-200" data-fancybox="gallery2">
                            <img alt="gallery" class="block object-cover object-center h-full w-full rounded-lg "
                              src="<?php echo "./img/Menu/"; echo $_SESSION['RestaurantName']; echo " Pics/"; echo $_SESSION['RestoMenu'][$i]; echo ".png"; ?>">
                            </a>
                        </li>
                    <?php
                      }
                    }
                    
                    ?>
                    </ul>
                   
                  </section>
                </div>
                <!--TAB CONTENT FOR DIRECTION-->
                <div class="tab-content-item">
                  <iframe src="<?php echo $_SESSION['RestoDirection'];?>" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
          </div>
        </div>
                
        </div>
        
      </section>

      <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
      </script>


      <?php

        if(isset($_POST['overview'])){
          $_SESSION['CurrentTab'] = "overview";
          echo("<meta http-equiv='refresh' content='0.04'>");
        }

        if(isset($_POST['review'])){
          $_SESSION['CurrentTab'] = "review";
          echo("<meta http-equiv='refresh' content='0.04'>");
        }

        if(isset($_POST['menu'])){
          $_SESSION['CurrentTab'] = "menu";
          echo("<meta http-equiv='refresh' content='0.04'>");

        }

        if(isset($_POST['direction'])){
          $_SESSION['CurrentTab'] = "direction";
          echo("<meta http-equiv='refresh' content='0.04'>");
        }


      ?>

      <script>
        /*
      // after dom is loaded
      $(function() {
        // scroll all the way down
        $('html, body').scrollTop($(document).height() - $(window).height());
      });
      */
      </script>


      <!-- LOAD CURRENT TAB IN REFRESH-->
      <script type="text/javascript">
        //SCROLL TO CONTENTS TAB
        $('html, body').animate({scrollTop: $('#tabs_area').offset().top}, 0.0000001);
        var tab = "#" + "<?php echo $_SESSION['CurrentTab'];?>";

        jQuery(function(){
          jQuery(tab).click();
          
      }); 
      </script>

        <script>
            const allTabsGroup = document.querySelectorAll(".tabs-group");
    
            allTabsGroup.forEach((tabsGroup) => {
                for (let i = 0; i < tabsGroup.children.length; i++) {
                    const tabs = tabsGroup.children[i].querySelectorAll('.tabs');
                    const tabContent = tabsGroup.children[i].querySelectorAll('.tab-content-item');
                    const indicator = tabsGroup.children[i].querySelector('.indicator');
                    const tabsContainer = tabsGroup.children[0];
                    const content = tabsGroup.children[1].querySelectorAll('.tab-content-item');
    
                    if (indicator) {
                        indicator.classList.add('bg-orange-500', 'h-1', 'absolute', 'bottom-0', 'left-0', 'transition-all', 'duration-200');
                        indicator.style.width = `${100 / tabs.length}%`;
                    }
    
                    if (tabsContainer) {
                        tabsContainer.classList.add('relative', 'flex', 'flex-row', 'items-center', 'justify-center');
                    }
    
                    if (content) {
                        content.forEach((item) => {
                            item.classList.add('hidden', 'relative');
                        });
                        content[0].classList.remove('hidden');
                    }
    
                    const updateContent = (old, index) => {
                        let oldContent = content[old / 100];
                        let newContent = content[index];
                        if ((old / 100) === index) return;
    
                        if (oldContent && newContent) {
                            oldContent.classList.add('absolute', 'opacity-0', 'transition-all', 'duration-200');
                            newContent.classList.add('absolute', 'opacity-0', 'transition-all', 'duration-200');
    
                            setTimeout(() => {
                                oldContent.classList.remove('absolute', 'opacity-0', 'transition-all', 'duration-200');
                                oldContent.classList.add('hidden');
    
                                newContent.classList.add('!opacity-100');
    
                                newContent.classList.remove('!left-0', '!opacity-100', 'absolute', 'opacity-0', 'transition-all', 'duration-200');
                                newContent.classList.remove('hidden');
                            }, 200);
                        }
                    }
    
                    tabs.forEach((tab, index) => {
                        tab.classList.add('p-4', 'text-center', 'w-full', 'cursor-pointer', 'transition-all', 'duration-200', 'hover:bg-orange-400');
                        tab.addEventListener('click', () => {
                            let old = (String(indicator.style.transform || 'translateX(0%)').split('translateX(')).filter(Boolean).join('').split('%)')[0];
                            indicator.style.transform = `translateX(${index * 100}%)`;
                            updateContent(old, index);
                        })
                    });
    
                }
            });
        </script>
    </main>

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
  </div>
</body>
</html>


<?php

if (isset($_POST['search'])) {
  header("Location: search_page.php");
  exit;
}

else if (isset($_POST['recommendation'])) {
  header("Location: recommendation.php");
  exit;
}

else if(isset($_POST['randomized'])) {
  header("Location: randomized.php");
  exit;
}
  

