<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="mainAssets.css">
</head>
<style>
    .userTitle {
        background-color: #48A4C8;
        margin: none;
        padding: none;
    }



    .uInfo {
        display: inline-block;
        background-color: #48A4C8;
        padding: 1%;
        border-radius: 7px;
        width: max-content;
        /* margin-left: 50%; */
        text-align: left;
    }
</style>

<body onload="task()">
    <?php
    include 'nav.php';
    ?>
    <p id="test"></p>
    <div align="center">
        <div class="uInfo">
            <h2 id="title">
            </h2>
            <img width="70" height="70" align="right" id="pic" src="" alt="Icon">
            <h3 id="tempD">
                Current Temp
            </h3>
            <div id="feels">

            </div>

            <h5 id="score">
                Max, Min
                </h4>
                <h6 id="desc">
                    Conditions
                </h6>
                <h6 id="rec">
		Score Recomendation
                </h6>

        </div>
    </div>
    <p>
    <table align="center" class="table table-hover table-dark " style="width:fit-content">
        <thead>
            <tr>
                <th scope="col">Day</th>
                <th scope="col">Conditions</th>
                <th scope="col">Temperature</th>
                <th scope="col">Humidity</th>
                <th scope="col">Run Index</th>
            </tr>
        </thead>
        <tbody id="Date">

        </tbody>
    </table>
    </p>
    <div align="center">
        <em>Considers temperature, humidity, conditions, and wind speed when determining a score. <br>This score should not be taken as a primary factor when deciding to run.</em>
    </div>
</body>
<script>
    function task() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPos)

        } else {
            // x.innerHTML = "Could not get location!"
        }

        function showPos(position) {
            lat = position.coords.latitude;
            long = position.coords.longitude;
            var dis = document.getElementById('Date');
            var requestOptions = {
                method: 'GET',
                redirect: 'follow'
            };
            //current conditions
            fetch(`https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${long}&exclude=minutely,hourly,daily&units=imperial&appid=REDACTED`, requestOptions)
                .then(data => data.json())
                .then(current => {
                    document.getElementById('title').innerHTML = current.name;
                    document.getElementById('tempD').innerHTML = Math.round(current.main.temp) + "°F";
                    document.getElementById('feels').innerHTML = "Feels like " + Math.round(current.main.feels_like) + "°F";
                    document.getElementById('score').innerHTML = "High: " + Math.round(current.main.temp_max) + "°F" + " Low: " + Math.round(current.main.temp_min) + "°F"
                    document.getElementById('desc').innerHTML = current.weather[0].description;
                    document.getElementById('pic').setAttribute('src', `https://openweathermap.org/img/wn/${current.weather[0].icon}.png`);
                    currentScore = score(current.main.temp, current.main.humidity, current.wind.speed, current.weather[0].description);
                    report = ""
                    if (currentScore >= 3.5 && currentScore <= 5) {
                        report = "Conditions are great for a run"
                    } else if (currentScore >= 2.5 && currentScore <= 3) {
                        report = "Conditions are fair for a run"
                    } else if (currentScore <= 2) {
                        report = "Conditions are poor for a run. That is no excuse for a rest day. Good luck!"
                    }
                    document.getElementById('rec').innerHTML = report;
                    card = document.getElementById('uInfo');




                });
            fetch(`https://api.openweathermap.org/data/2.5/onecall?lat=${lat}&lon=${long}&exclude=current,minutely,hourly,alerts&units=imperial&appid=83c6a0ddb12231d074bdb7fbbcb673f2`, requestOptions)
                .then(response => response.json())
                .then(result => {

                        for (let k = 0; k < result.daily.length; k++) {
                            var row = document.createElement("tr");
                            var col = document.createElement("td");
                            var dayName = new Date(result.daily[k].dt * 1000).toLocaleDateString("en", {
                                weekday: "long",
                            });
                            var date = new Date(result.daily[k].dt)
                            col.innerText = dayName;
                            row.append(col);
                            //condition
                            var conCol = document.createElement("td");
                            conCol.innerHTML = `<img src='https://openweathermap.org/img/wn/${result.daily[k].weather[0].icon}.png'>`;
                            row.append(conCol);
                            //temp
                            var col2 = document.createElement("td");
                            col2.innerHTML = Math.round(result.daily[k].temp.day) + " °F";
                            row.append(col2);

                            //humidity
                            var col3 = document.createElement("td");
                            col3.innerHTML = result.daily[k].humidity + "%";
                            row.append(col3);




                            var col4 = document.createElement('td');
                            prospectScore = score(result.daily[k].temp.day, result.daily[k].humidity, result.daily[k].wind_speed, result.daily[k].weather[0].description);
                            if (prospectScore >= 4) {
                                col4.innerHTML = `<font color='green'>${prospectScore}</font>`;
                            } else if (prospectScore >= 2.5 && prospectScore <= 3.5) {
                                col4.innerHTML = `<font color='yellow'>${prospectScore}</font>`;
                            } else if (prospectScore <= 2) {
                                col4.innerHTML = `<font color='red'>${prospectScore}</font>`;
                            }
                         
                            row.append(col4);


                            dis.append(row);
                        }


                    }

                )
                .catch(error => console.log('error', error));


        }

        function score(temp, humidity, wind, desc) {
            var index = 0;
            if (temp >= 30 && temp <= 75) {
                index += 1;
            }
            if (humidity < 50 && temp < 50) {
                index += 1;
            }
            if (wind < 10) {
                index += 1;
            }

            switch (desc) {
                case "few clouds":
                    index += 2;
                    break;
                case "clear sky":
                    index += 2;
                    break;
                case "Mist":
                    index += 1;
                    break;
                case "Fog":
                    index += 1;
                    break;
                case "scattered clouds":
                    index += 1.5;
                    break;
                case "broken clouds":
                    index += 1.5;
                    break;
                case "overcast clouds":
                    index += 1.5;
                    break;
                case "light rain":
                    index += 1;
                    break;
                case "moderate rain":
                    index += 0.5;
                    break;
                case "light snow":
                    index += 1;
                    break;
                case "Snow":
                    index += 0.5;
                    break;
                case "Haze":
                    index += 1;
                    break

            }
            return index;
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</html>
