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

                document.getElementById("spanSwimmer").innerHTML = data.name;
                document.getElementById("spanEvent").innerHTML = data.event;
                document.getElementById("spanTime").innerHTML = data.time;
                document.getElementById("spanPoints").innerHTML = data.points;
                document.getElementById("spanDate").innerHTML = data.date;
                document.getElementById("spanPool").innerHTML = data.pool;
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
              <p>Swimmer: <span id="spanSwimmer"></span></p>
              <p>Event: <span id="spanEvent"></span></p>
              <p>Time: <span id="spanTime"></span></p>
              <p>Points: <span id="spanPoints"></span></p>
              <p>Date: <span id="spanDate"></span></p>
              <p>Pool: <span id="spanPool"></span></p>
            </div>
          </div>
        </div>
        
        </form>
      </div>
    </main>
  </body>
</html>
