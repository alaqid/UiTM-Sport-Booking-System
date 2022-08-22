<?php

require_once 'dbconfig.php';

//session_start(); 

//	if (!isset($_SESSION['userID'])) {
//	$_SESSION['msg'] = "You must log in first";
//	header('location: page-login.php');
//	}

$bookingID = $_GET["bookingID"];

$query = "SELECT * FROM facility";
$sql="SELECT * FROM booking_records where bookingID =$bookingID ";

$result1 = mysqli_query($db,$query);
$result = mysqli_query($db,$sql);


while($rows=mysqli_fetch_assoc($result)){
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Facility Booking </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <!-- Daterange picker -->
    <link href="./vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Clockpicker -->
    <link href="./vendor/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
    <!-- asColorpicker -->
    <link href="./vendor/jquery-asColorPicker/css/asColorPicker.min.css" rel="stylesheet">
    <!-- Material color picker -->
    <link href="./vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet" href="./vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="./vendor/pickadate/themes/default.date.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="./vendor/select2/css/select2.min.css">

    <link href="./vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
        function chk() {
            var facy = document.getElementById('single-select').value;
            var bookdate = document.getElementById('datepicker').value;
            var booktime = document.getElementById('booktime').value;
            var bookingID = document.getElementById('bookingID').value;

            $.ajax({
                type: "post",
                url: "hi11.php",
                data: {
                    facy: facy,
                    bookdate: bookdate,
                    booktime: booktime,
                    bookingID: bookingID
                },
                cache: false,
                success: function (html) {
                    $('#msg').html(html);
                }
            });
            return false;
        }
    </script>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="#" class="brand-logo">
                <img class="logo-abbr" src="./images/logo.png" alt="">
                <img class="logo-compact" src="./images/logo-text.png" alt="">
                <img class="brand-title" src="./images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <h4>Facility Booking </h4>
                        </div>

                        <ul class="navbar-nav header-right">

                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="fa fa-user"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">

                                    <a href="./logout.php" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-form"></i><span class="nav-text">Booking</span></a>
                        <ul aria-expanded="false">
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Booking</a>
                                <ul aria-expanded="false">
                                    <li><a href="./booking_facility.php">Facility</a></li>
                                    <li><a href="./booking_equipment.php">Equipment</a></li>

                                </ul>
                            </li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Booking Records</a>
                                <ul aria-expanded="false">
                                    <li><a href="user_booking_records_upcoming.php">Upcoming Booking</a></li>
                                    <li><a href="user_booking_records_ongoing.php">Ongoing Booking</a></li>
                                    <li><a href="user_booking_records_past.php">Past Booking</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Profile</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./app-profile.php">View Profile</a></li>
                            <li><a href="./profile-edit.php">Edit Profile</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Add Event to Google Calendar </h4>

                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Booking Records</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Upcoming Booking</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Add to Google Calendar</a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- row -->


                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-7">
                        <div class="card">
                            <div class="card-body">
                                <form method="post">
                                    <p id="br" style="margin-left:70% ;">*Please Authorize your Google Account to add
                                        events into your Google Calendar
                                    </p>

                                    
                                    <button class="btn btn-info" id="authorize_button"
                                        style="display: none; margin-left:85% ;">Authorize</button>
                                    <button id="signout_button" style="display: none;">Sign Out</button>
                                    <div class="mb-4">
                                        <h4 class="card-title">Facility/Equipment</h4>
                                    </div>
                                    <input disabled type="text" class="form-control" id="eventdesc" name="eventdesc"
                                        value="<?php echo $rows['item_name']; ?>">
                                    <br>
                                    <h4 class="card-title">Date</h4>
                                    <input disabled type="date" class="form-control" id="bookdate" name="bookdate"
                                        value="<?php echo $rows['bookdate']; ?>"> <br><br>
                                    <h4 class="card-title">Start</h4>
                                    <input disabled type="time" class="form-control" id="booktime" name="booktime"
                                        value="<?php echo $rows['booktime']; ?>">
                                    <br><br>
                                    <h4 class="card-title">End</h4>
                                    <input disabled type="time" class="form-control" id="booktime_end"
                                        name="booktime_end" value="<?php echo $rows['booktime_end']; ?>"><br><br>
                                    <input name="serial" id="serial" class="serial-no" type="hidden" name="fname"
                                        placeholder="111111" maxlength="6" size="6">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModalLong">
                                        Add to Google Calendar
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Google Calendar</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure to add event to your Google Calendar?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button class="btn btn-info" id="addToCalendar"
                                                        style="margin-left:42%;margin-top:3%" type="submit"
                                                        name="booking" class="btnSubmit">Add to Google Calendar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">UiTM Perlis</a> 2021</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>



    <!-- Daterangepicker -->
    <!-- momment js is must -->
    <script src="./vendor/moment/moment.min.js"></script>
    <script src="./vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- clockpicker -->
    <script src="./vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
    <!-- asColorPicker -->
    <script src="./vendor/jquery-asColor/jquery-asColor.min.js"></script>
    <script src="./vendor/jquery-asGradient/jquery-asGradient.min.js"></script>
    <script src="./vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
    <!-- Material color picker -->
    <script src="./vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- pickdate -->
    <script src="./vendor/pickadate/picker.js"></script>
    <script src="./vendor/pickadate/picker.time.js"></script>
    <script src="./vendor/pickadate/picker.date.js"></script>



    <!-- Daterangepicker -->
    <script src="./js/plugins-init/bs-daterange-picker-init.js"></script>
    <!-- Clockpicker init -->
    <script src="./js/plugins-init/clock-picker-init.js"></script>
    <!-- asColorPicker init -->
    <script src="./js/plugins-init/jquery-asColorPicker.init.js"></script>
    <!-- Material color picker init -->
    <script src="./js/plugins-init/material-date-picker-init.js"></script>
    <!-- Pickdate -->
    <script src="./js/plugins-init/pickadate-init.js"></script>

    <script src="./vendor/select2/js/select2.full.min.js"></script>
    <script src="./js/plugins-init/select2-init.js"></script>

    <script src="./vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="./js/plugins-init/sweetalert.init.js"></script>

</body>
<?php 

}
?>
<script type="text/javascript">
    // Client ID and API key from the Developer Console
    var CLIENT_ID = '728638435165-iu4v0d61ee17qopopp1ubvk346jfa3il.apps.googleusercontent.com';
    //var API_KEY = 'AIzaSyBXXxupUQLF_amHUcrO1jgwVm7NfA7mqYM';
    var API_KEY = 'AIzaSyBXXxupUQLF_amHUcrO1jgwVm7NfA7mqYM';

    // Array of API discovery doc URLs for APIs used by the quickstart
    var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest"];

    // Authorization scopes required by the API; multiple scopes can be
    // included, separated by spaces.
    var SCOPES = "https://www.googleapis.com/auth/calendar";

    var authorizeButton = document.getElementById('authorize_button');
    var br = document.getElementById('br');
    var af = document.getElementById('af');
    var signoutButton = document.getElementById('signout_button');
    var addToCalendar = document.getElementById('addToCalendar');




    /**
     *  On load, called to load the auth2 library and API client library.
     */

    function handleClientLoad() {
        gapi.load('client:auth2', initClient);

    }

    /**
     *  Initializes the API client library and sets up sign-in state
     *  listeners.
     */
    function initClient() {
        gapi.client.init({
            apiKey: API_KEY,
            clientId: CLIENT_ID,
            discoveryDocs: DISCOVERY_DOCS,
            scope: SCOPES
        }).then(function () {
            // Listen for sign-in state changes.
            gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);

            // Handle the initial sign-in state.
            updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
            authorizeButton.onclick = handleAuthClick;
            signoutButton.onclick = handleSignoutClick;
            addToCalendar.onclick = handleAddClick;

        }, function (error) {
            appendPre(JSON.stringify(error, null, 2));
        });
    }

    /**
     *  Called when the signed in status changes, to update the UI
     *  appropriately. After a sign-in, the API is called.
     */
    function updateSigninStatus(isSignedIn) {
        if (isSignedIn) {
            authorizeButton.style.display = 'none';
            signoutButton.style.display = 'none';
            addToCalendar.style.display = 'block'

            /* document.getElementById("myDiv").style.display = "block";*/
            listUpcomingEvents();
        } else {
            authorizeButton.style.display = 'block';

            signoutButton.style.display = 'none';

            ;
        }
    }

    /**
     *  Sign in the user upon button click.
     */
    function handleAuthClick(event) {
        gapi.auth2.getAuthInstance().signIn();
    }

    /**
     *  Sign out the user upon button click.
     */
    function handleSignoutClick(event) {
        gapi.auth2.getAuthInstance().signOut();
    }

    function handleAddClick(event) {

        alert("Your event was added to the calendar.");

        getUserInput();
        createEvent(getUserInput());

    }


    function getUserInput() {
        var date = document.getElementById('bookdate').value;
        var startTime = document.getElementById('booktime').value;
        var endTime = document.getElementById('booktime_end').value;
        var eventDesc = document.getElementById('eventdesc').value;

        // check input values, they should not be empty
        if (date == "" || startTime == "" || endTime == "" || eventDesc == "") {
            alert("All your input fields should have a meaningful value.");
            return
        } else

            return {
                'date': date,
                'startTime': startTime,
                'endTime': endTime,
                'eventTitle': eventDesc
            }


    }

    /**
     * Append a pre element to the body containing the given message
     * as its text node. Used to display the results of the API call.
     *
     * @param {string} message Text to be placed in pre element.
     */
    function appendPre(message) {
        var pre = document.getElementById('content');
        var textContent = document.createTextNode(message + '\n');
        pre.appendChild(textContent);
    }

    /**
     * Print the summary and start datetime/date of the next ten events in
     * the authorized user's calendar. If no events are found an
     * appropriate message is printed.
     */
    function listUpcomingEvents() {
        gapi.client.calendar.events.list({
            'calendarId': 'primary',
            'timeMin': (new Date()).toISOString(),
            'showDeleted': false,
            'singleEvents': true,
            'maxResults': 10,
            'orderBy': 'startTime'
        }).then(function (response) {
            var events = response.result.items;
            appendPre('Upcoming events:');

            if (events.length > 0) {
                for (i = 0; i < events.length; i++) {
                    var event = events[i];
                    var when = event.start.dateTime;
                    if (!when) {
                        when = event.start.date;
                    }
                    appendPre(event.summary + ' (' + when + ')')
                }
            } else {
                appendPre('No upcoming events found.');
            }
        });
    }

    function loadNextSeqToForm() {
        var nextValue = sessionStorage.getItem("next1") != null ? sessionStorage.getItem("next1") : 111111;
        document.getElementById("serial").value = formatToSixCharacters(nextValue);
        sessionStorage.setItem("next1", parseInt(nextValue) + 1)
    }

    function formatToSixCharacters(num) {
        var numStr = num + "";
        if (numStr.length < 6) {
            var zeros = 6 - numStr.length;
            for (var i = 1; i <= zeros; i++) {
                numStr = "0" + numStr;
            }
        }
        return numStr;
    }

    function createEvent(eventData) {
        var autoid = document.getElementById("serial").value;

        // First create resource that will be send to server.
        var resource = {
            'id': autoid,
            "summary": eventData.eventTitle,
            "start": {
                "dateTime": new Date(eventData.date + " " + eventData.startTime).toISOString()
            },
            "end": {
                "dateTime": new Date(eventData.date + " " + eventData.endTime).toISOString()
            }
        };

        // create the request


        var request = gapi.client.calendar.events.insert({

            'calendarId': 'primary',

            'resource': resource


        });


        // execute the request and do something with response
        request.execute(function (resp) {
            console.log(resp);

            alert("Your event was added to the calendar.");
        });
    }
</script>

<script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()"
    onreadystatechange="if (this.readyState === 'complete') this.onload()">
</script>

</html>