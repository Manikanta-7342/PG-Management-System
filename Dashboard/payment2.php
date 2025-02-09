<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HotePayant Dashboard - Payments</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../assets/css/tailwind.output.css" />
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

     <!-- Nucleo Icons -->
  <link href="css of billing/nucleo-icons.css" rel="stylesheet" />
  <link href="css of billing/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/billing.css" rel="stylesheet" />


    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="../assets/js/init-alpine.js"></script>
    <?php include('session.php');?>
  </head>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen}"
    >
      <!-- Desktop sidebar -->
      <aside
        class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0"
      >
        <div class="py-4 text-gray-500 dark:text-gray-400">
          <a
            class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
            href="dashstu2.php"
          >
            Hote Payant
          </a>
          <ul class="mt-6">
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="dashstu2.php"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                  ></path>
                </svg>
                <span class="ml-4">Student Dashboard</span>
              </a>
            </li>
          </ul>
          <?php
                require '../DatabaseConnection/dbcon.php';
                $mail=$_SESSION['email'];
                $query2 =mysqli_query($conn,"SELECT user_id FROM `user` where `user_email`='$mail'  ") or die ($conn->error);
                $row2=mysqli_fetch_array($query2);
                $us_id=$row2['user_id'];
                $query2 =mysqli_query($conn,"SELECT * FROM user u,user_details us,link l,pg p where u.user_email='$mail' and us.user_id=u.user_id and us.pg_id=l.pg_id  ") or die ($conn->error);
                $numberofrows=$query2->num_rows;
                $row2=mysqli_fetch_array($query2);
                if($numberofrows==0){
                  
                }
                 else{?>
          <ul>
            <li class="relative px-6 py-3">
                <span
                class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="payment2.php"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"
                  ></path>
                </svg>
                <span class="ml-4">Payments</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
                <a
                  class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  href="issue2.php"
                >
                  <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                    ></path>
                  </svg>
                  <span class="ml-4">Issues</span>
                </a>
              </li>
          </ul><?php }?>
          <div class="px-6 my-6">
            </div>
        </div>
      </aside>
      <!-- Mobile sidebar -->
      <!-- Backdrop -->
      <div
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
      ></div>
      <aside
        class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform -translate-x-20"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-x-20"
        @click.away="closeSideMenu"
        @keydown.escape="closeSideMenu"
      >
        <div class="py-4 text-gray-500 dark:text-gray-400">
          <a
            class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
            href="dashstu2.php"
          >
            Hote Payant
          </a>
              <ul class="mt-6">
                <li class="relative px-6 py-3">
                  <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="dashstu2.php"
                  >
                    <svg
                      class="w-5 h-5"
                      aria-hidden="true"
                      fill="none"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                      ></path>
                    </svg>
                    <span class="ml-4">Student Dashboard</span>
                  </a>
                </li>
              </ul>
              <?php
                require '../DatabaseConnection/dbcon.php';
                $mail=$_SESSION['email'];
                
                $query11 =mysqli_query($conn,"SELECT * FROM user u,user_details us,link l,pg p where u.user_email='$mail' and us.user_id=u.user_id and us.pg_id=l.pg_id  ") or die ($conn->error);
                $numberofrows=$query11->num_rows;
                if($numberofrows==0){
                  
                }
                 else{?>
              <ul>
                
                <li class="relative px-6 py-3">
                    <a
                      class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      href="issue2.php"
                    >
                      <svg
                        class="w-5 h-5"
                        aria-hidden="true"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                        ></path>
                      </svg>
                      <span class="ml-4">Issues</span>
                    </a>
                  </li>
          <ul><?php }?>
          </ul>
          <div class="px-6 my-6"> 
          </div>
        </div>
      </aside>
      <div class="flex flex-col flex-1">
        <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
          <div
            class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300"
          >
            <!-- Mobile hamburger -->
            <button
              class="p-1 -ml-1 mr-5 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
              @click="toggleSideMenu"
              aria-label="Menu"
            >
              <svg
                class="w-6 h-6"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  fill-rule="evenodd"
                  d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </button>
            <!-- Search input -->
            <div class="flex justify-center flex-1 lg:mr-32">
              <div
                class="relative w-full max-w-xl mr-6 focus-within:text-purple-500"
              >
                <div class="absolute inset-y-0 flex items-center pl-2">
                  
                </div>
                
              </div>
            </div>
            <ul class="flex items-center flex-shrink-0 space-x-6">
              
              <!-- Notifications menu -->
              <li class="relative">
                <button
                  class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-purple"
                  @click="toggleNotificationsMenu"
                  @keydown.escape="closeNotificationsMenu"
                  aria-label="Notifications"
                  aria-haspopup="true"
                >
                  <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"
                    ></path>
                  </svg>
                  <!-- Notification badge -->
                  <span
                    aria-hidden="true"
                    class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full dark:border-gray-800"
                  ></span>
                </button>
                <template x-if="isNotificationsMenuOpen">
                  <ul
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    @click.away="closeNotificationsMenu"
                    @keydown.escape="closeNotificationsMenu"
                    class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:text-gray-300 dark:border-gray-700 dark:bg-gray-700"
                    aria-label="submenu"
                  >
                   
                    <li class="flex">
                      <a
                        class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="#"
                      >
                        <span>Remainders</span>
                        <span
                          class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600"
                        >
                          2
                        </span>
                      </a>
                    </li>
                    
                  </ul>
                </template>
              </li>
              <!-- Profile menu -->
              <!-- <li class="relative"> -->
                <button
                  class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
                  @click="toggleProfileMenu"
                  @keydown.escape="closeProfileMenu"
                  aria-label="Account"
                  aria-haspopup="true"
                >
                  <a
                  class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                  href="../login.php"
                  >
                  <svg
                    class="w-4 h-4 mr-3"
                    aria-hidden="true"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    >
                    <path
                      d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                    ></path>
                  </svg>
                  <span>Log out</span>
                </a>
                </button>
                
            </ul>
          </div>
        </header>
        <main class="h-full pb-1 overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
              style="margin-top:0.5em; margin-bottom: 0.5em;"
            >
              Payments
            </h2>
            

            <!-- General elements -->
            <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
              Billing<br><hr>
            </h4>
                <div class="row">
                  <div class="col-lg-8">
                    <div class="row">
                      <div class="col-xl-6 mb-xl-0 mb-4">
                        <div class="card bg-transparent shadow-xl">
                          <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                            <span class="mask bg-gradient-dark"></span>
                            <div class="card-body1 position-relative z-index-1 p-3">
                              <i class="fas fa-wifi text-white p-2"></i>
                              <h5 class="text-white mt-4 mb-5 pb-2">4562&nbsp;&nbsp;&nbsp;1122&nbsp;&nbsp;&nbsp;4594&nbsp;&nbsp;&nbsp;7852</h5>
                              <div class="d-flex">
                                <div class="d-flex">
                                  <div class="me-4">
                                    <p class="text-white text-sm opacity-8 mb-0">Card Holder</p>
                                    <h6 class="text-white mb-0">Suresh K</h6>
                                  </div>
                                  <div>
                                    <p class="text-white text-sm opacity-8 mb-0">Expires</p>
                                    <h6 class="text-white mb-0">11/22</h6>
                                  </div>
                                </div>
                                <div class="ms-auto w-10 d-flex align-items-end justify-content-end">
                                  <img class="w-60 mt-2" src="../assets/images/mastercard.png" alt="logo">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-6">
                        <div class="row">
                          <div class="col-md-6 mt-md-0 mt-4">
                            <div class="card">
                              <div class="card-header mx-4 p-3 text-center">
                                <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                  <i class="fas fa-landmark opacity-10"></i>
                                </div>
                              </div>
                              <?php
                require '../DatabaseConnection/dbcon.php';
                $mail=$_SESSION['email'];
                $query2 =mysqli_query($conn,"SELECT user_id FROM `user` where `user_email`='$mail'  ") or die ($conn->error);
                $row2=mysqli_fetch_array($query2);
                $us_id=$row2['user_id'];
                $query2 =mysqli_query($conn,"SELECT * FROM user u,user_details us,link l,pg p where u.user_email='$mail' and us.user_id=u.user_id and us.pg_id=l.pg_id  ") or die ($conn->error);
                $numberofrows=$query2->num_rows;
                $row2=mysqli_fetch_array($query2);
                if($numberofrows==0){

                }
                 ?>
                              <div class="card-body pt-0 p-3 text-center">
                                <h6 class="text-center mb-0">Rent</h6>
                                <span class="text-xs1"><?php echo $row2['sharing_type'] ?></span>
                                <hr class="horizontal dark my-3">
                                <h5 class="mb-0">₹<?php echo $row2['amt_per_person'] ?>/-</h5>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6 mt-md-0 mt-4">
                            <div class="card">
                              <div class="card-header mx-4 p-3 text-center">
                                <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                  <i class="fab fa-paypal opacity-10"></i>
                                </div>
                              </div>
                              <div class="card-body pt-0 p-3 text-center">
                                <h6 class="text-center mb-0">Advance</h6>
                                <span class="text-xs1"><?php echo $row2['duration'] ?></span>
                                <hr class="horizontal dark my-3">
                                <h5 class="mb-0">₹<?php echo $row2['advance_amt'] ?>/-</h5>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12 mb-lg-0 mb-4">
                        <div class="card mt-4">
                          <div class="card-header pb-0 p-3">
                            <div class="row">
                              <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0">Payment Method</h6>
                              </div>
                              <div class="col-6 text-end">
                                  <form method="post">
                                  <button name="pay" value="Pay" class="btn-home px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                    Pay
                                  </button></form>
                                  <?php
                                    require '../DatabaseConnection/dbcon.php';
                                    if(isset($_POST['pay'])){
                                      $conn->query("UPDATE user_details set pay_status='Payed'") or die ($conn->error);
                                      ?><script></script>
                                      <?php
                                    }
                                   ?>
                                
                              </div>
                            </div>
                          </div>
                          <div class=" p-3 mb-md-0 mt-4 row text-sm" style="padding-left:0.5em;">
                                      <label
                                        class=" text-gray-600 dark:text-gray-400 mb-0"
                                      >
                                        <input
                                          type="radio"
                                          class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                          name="accountType"
                                          value="personal"
                                        />
                                        <span class="ml-2">Net Banking </span>
                                        <br><input
                                          type="radio"
                                          class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                          name="accountType"
                                          value="personal"
                                        />
                                        <span class="ml-2">UPI </span>
                                        <br><input
                                          type="radio"
                                          class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                          name="accountType"
                                          value="personal"
                                        />
                                        <span class="ml-2">Credit Card </span>
                                        <br><input
                                          type="radio"
                                          class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                          name="accountType"
                                          value="personal"
                                        />
                                        <span class="ml-2">Debit Card </span>
                                      </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="card h-100">
                      <div class="card-header pb-0 p-3">
                        <div class="row">
                          <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Invoices</h6>
                          </div>
                          <div class="col-6 text-end">
                            <button class="btn btn-outline-primary btn-sm mb-0">View All</button>
                          </div>
                        </div>
                      </div>
                      <div class="card-body p-3 pb-0">
                        <ul class="list-group">
                          <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                              <h6 class="mb-1 text-dark font-weight-bold text-sm1">March, 01, 2020</h6>
                              <span class="text-xs">#MS-415646</span>
                            </div>
                            <div class="d-flex align-items-center text-sm1">
                              ₹6000
                              <button class="btn btn-link text-dark text-sm1 mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                            </div>
                          </li>
                          <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                              <h6 class="text-dark mb-1 font-weight-bold text-sm1">February, 10, 2021</h6>
                              <span class="text-xs">#RV-126749</span>
                            </div>
                            <div class="d-flex align-items-center text-sm1">
                              ₹6000
                              <button class="btn btn-link text-dark text-sm1 mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                            </div>
                          </li>
                          <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                              <h6 class="text-dark mb-1 font-weight-bold text-sm1">April, 05, 2021</h6>
                              <span class="text-xs">#FB-212562</span>
                            </div>
                            <div class="d-flex align-items-center text-sm1">
                              ₹6000
                              <button class="btn btn-link text-dark text-sm1 mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                            </div>
                          </li>
                          <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                              <h6 class="text-dark mb-1 font-weight-bold text-sm1">June, 25, 2021</h6>
                              <span class="text-xs">#QW-103578</span>
                            </div>
                            <div class="d-flex align-items-center text-sm1">
                              ₹6000
                              <button class="btn btn-link text-dark text-sm1 mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                            </div>
                          </li>
                          <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                            <div class="d-flex flex-column">
                              <h6 class="text-dark mb-1 font-weight-bold text-sm1">March, 01, 2021</h6>
                              <span class="text-xs">#AR-803481</span>
                            </div>
                            <div class="d-flex align-items-center text-sm1">
                              ₹12000
                              <button class="btn btn-link text-dark text-sm1 mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-7 mt-4 mb-0 p-3">
                    <div class="card">
                      <div class="card-header pb-01">
                        <h6 class="mb-0">Billing Information</h6>
                      </div>
                      <div class="card-body">
                        <ul class="list-group ">
                          <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column ">
                              <h6 class="mb-3 text-sm1">Krishna R</h6>
                              <span class="mb-2 text-xs">Designation: <span class="text-dark font-weight-bold ms-sm-2">Manager</span></span>
                              <span class="mb-2 text-xs">Email Address: <span class="text-dark ms-sm-2 font-weight-bold">KrishnaR@venupg.com</span></span>
                              <span class="text-xs">UTR Number: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
                            </div>
                          </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
          </div>
        </main>
      </div>
    </div>
    <script>
      function pay()
      {
        alert("Payment Succesfull!!");
      }
    </script>
  </body>
</html>
