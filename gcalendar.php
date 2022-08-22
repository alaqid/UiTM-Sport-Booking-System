<head>
  <meta charset="utf-8">


  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>
<style>
  /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
  #map {
    height: 50%;
    align: center;
    width: 100%;
    margin-left: auto;
    margin-right: auto;
  }


  .note {
    text-align: center;
    height: 80px;
    background: -webkit-linear-gradient(left, #0072ff, #8811c5);
    color: #fff;
    font-weight: bold;
    line-height: 80px;
  }

  .form-content {
    padding: 5%;
    border: 1px solid #ced4da;
    margin-bottom: 2%;
  }

  .form-control {
    border-radius: 1.5rem;
  }

  .btnSubmit {
    border: none;
    border-radius: 1.5rem;
    padding: 1%;
    width: 20%;
    cursor: pointer;
    background: #0062cc;
    color: #fff;
  }
</style>

<?php

$stud_id = '';
if (isset($_POST['stud_id'])) {
    $stud_id = $_POST['stud_id'];
}

$url = "http://localhost/Hep/student/" . $stud_id;

$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);


	
$result = json_decode($response);


?>

<body onload="loadNextSeqToForm()">
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">UiTM Sport System</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="home.html">Home</a></li>

        <li><a href="serach_list.php">Booking List</a></li>

      </ul>
    </div>
  </nav>

  <div class="container register-form" style="margin-top:5%">


    <div class="form">
      <div class="note">
        <p>Form to Booking Facilities</p>

      </div>
      <div id="map"></div>

      <div id="myDiv" class="form-content">
        <h1 id="result" style="margin-left:38%"></h1>
        <p id="br" style="margin-left:70% ;">*Please Authorize before choose date and time </p>

        <button id="authorize_button" style=" margin-left:85% ;">Authorize</button>
        <button id="signout_button" style="display: none;">Sign Out</button>
        <form action="" method="POST">
          <div class="row" style="margin-top:5%">


            <div class="col-md-6">
              <div class="form-group">
                <input type="hidden" id="scd" style="margin-left:38%" value="" name="facilities"></input>

                <label for="">Student ID</label><br>


                <input type="text" class="form-control" name="stud_id" value="<?php
							if($result ==  "")
							{
								echo " ";
							}
							else
							{
								echo $result->{'stud_id'}; 
							}
							
							
							;?>">
                <span> <button style="margin-left:75%;margin-top:2%" type="submit" name="submit"
                    class="btnSubmit">Find</button></span>
              </div>


              <div class="form-group">
                <label for="">Student Name</label>
                <input type="text" class="form-control" name="stud_name" value="<?php
							if($result ==  "")
							{
								echo " ";
							}
							else
							{
								echo $result->{'stud_name'}; 
							}
							
							
							;?>">
              </div>
              <div class="form-group">
                <label for="">Student Phone</label>
                <input type="text" class="form-control" name="stud_phone" value="<?php 
							
							if($result ==  "")
							{
								echo " ";
							}
							else
							{
								echo $result->{'stud_phone'}; 
							}
							
							?>">
              </div>

              <div class="form-group">
                <label for="">Student Email</label>
                <input type="text" class="form-control" name="stud_email" value="<?php 
							
						if($result ==  "")
							{
								echo " ";
							}
							else
							{
								echo $result->{'stud_email'}; 
							}
							
							?>">
              </div>


            </div>

            <div class="col-md-6">





              <div class="form-group">
                <label for="">Select a date:</label>
                <input type="date" id="date" class="form-control" name="b_date">

              </div>
              <div class="form-group">
                <label for="">Start time</label>
                <input type="time" id="start" class="form-control" name="b_startTime">
              </div>

              <div class="form-group">
                <label for="">End time</label>
                <input type="time" id="end" class="form-control" name="b_endTime">
              </div>

              <div class="form-group">
                <label for="">Description:</label>
                <input type="text" id="event" class="form-control" name="b_desc">
              </div>






            </div>

          </div>


          <button id="addToCalendar" formaction="booking_create.php" style="margin-left:42%;margin-top:3%" type="submit"
            name="booking" class="btnSubmit">Booking</button>
      </div>
      <input name="serial" id="serial" class="serial-no" type="hidden" name="fname" placeholder="111111" maxlength="6"
        size="6">

    </div>
    </form>
  </div>
</body>

<script type="text/javascript">
  // Client ID and API key from the Developer Console
  var CLIENT_ID = '728638435165-iu4v0d61ee17qopopp1ubvk346jfa3il.apps.googleusercontent.com';
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

    getUserInput();
    createEvent(getUserInput());

  }


  function getUserInput() {
    var date = document.getElementById('bookdate').value;
    var startTime = document.getElementById('booktime').value;
    var endTime = document.getElementById('end').value;
    var eventDesc = document.getElementById('event').value;

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


<script>
  window.addEventListener('load', () => {


    const name = sessionStorage.getItem('NAME');



    document.getElementById('result').innerHTML = name;
    document.getElementById('scd').value = name;



  })
</script>

<script type="text/javascript">
  var add = sessionStorage.getItem('ADD');

  var map;

  function getData() {
    $.ajax({
      url: "map_geocode_api.php?add=" + add,
      async: true,
      dataType: 'json',
      success: function (data) {
        console.log(data);
        //load map
        init_map(data);
      }
    });
  }

  function init_map(data) {
    var map_options = {
      zoom: 17,
      center: new google.maps.LatLng(data['latitude'], data['longitude'])
    }
    map = new google.maps.Map(document.getElementById("map"), map_options);
    marker = new google.maps.Marker({
      map: map,
      position: new google.maps.LatLng(data['latitude'], data['longitude'])
    });
    infowindow = new google.maps.InfoWindow({
      content: data['formatted_address']
    });
    google.maps.event.addListener(marker, "click", function () {
      infowindow.open(map, marker);
    });
    infowindow.open(map, marker);
  }
</script>

<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-pK84Vi2SoieyADiOkSUg2goXeaSJt1M&callback=getData">
</script>