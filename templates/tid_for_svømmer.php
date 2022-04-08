<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tid for svømmer</title>
    <link rel="stylesheet" href="{{ url_for('static', filename='css/style.css') }}">
    <link rel="stylesheet" href="{{ url_for('static', filename='css/dropdown.css') }}">
  </head>
  <body>
    <header style="height: 150px; background-color: white;">
      <div class="row">
        <div class="column" style="width: 105.42px;">
          <a href="index.html"><img src="{{ url_for('static', filename='uploads/Asker_SK_Logo.jpg') }}" class="profile-img" style="height: 150px;"></a>
        </div>
        <div class="column" style="width: 1052.49px; text-align: center; margin-top: 50px;">
          <h1>Tid for svømmer</h1>
        </div>
        <div class="column" style="width: 105.42px;">
          <a href="index.html"><img src="{{ url_for('static', filename='uploads/Asker_SK_Logo.jpg') }}" class="profile-img" style="height: 150px;"></a>
        </div>
      </div>
    </header>
    <main style="padding-top: 350px;">
      <script>
        function swimmerDisplay(result){
          // get the data from the database
          fetch('/userdata/'+ result)
            .then(response => response.json())
            .then(data => 
              {
                console.log(data)

                //display on page

                document.getElementById("tableBody").innerHTML = ""
                document.getElementById("spanSwimmer").innerHTML = data[0].name;

                // Find a <table> element with id="myTable":
                var table = document.getElementById("resultsTable");


                for (let i = 0; i < data.length; i++) { 
                  var row = table.insertRow(i+1);

                  var cell1 = row.insertCell(0);
                  var cell2 = row.insertCell(1);
                  var cell3 = row.insertCell(2);
                  var cell4 = row.insertCell(3);
                  var cell5 = row.insertCell(4);

                  cell1.innerHTML = data[i].date;
                  cell2.innerHTML = data[i].event;
                  cell3.innerHTML = data[i].pool;
                  cell4.innerHTML = data[i].time;
                  cell5.innerHTML = data[i].points;
                  
              }

              }
            );
        }
      </script>
      <div class="container">
		    <form id="myForm" name="form">
        <div class="dropdown">
          <button class="dropbtn">Swimmers</button>
          <div class="dropdown-content">
          {%for swimmer in swimmers%}
            <input type="button" name="{{swimmer.id}}" value="{{swimmer.name}}" onClick="swimmerDisplay({{swimmer.id}})">
          {%endfor%}
          </div>
        </div>
		    <div class="display">
          <div class="row">
            <div class="user">

              <h1>Swimmer: <span id="spanSwimmer"></span></h1>

              <table id="resultsTable">
              <thead>
              <tr>
                <th>Date</th>
                <th>Event</th> 
                <th>Pool</th>
                <th>Time</th>
                <th>Points</th>
              </tr>
              </thead>
              <tbody id="tableBody">
              <tr>
              </tr>
              </tbody>
            </table>
            </div>
          </div>
        </div>
        
        </form>
      </div>
    </main>
  </body>
</html>






<?php
    $sql = "SELECT * FROM long_course_events;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            
        }
    }
?>
