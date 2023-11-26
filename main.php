<?php
  $cName = $_POST['cityName'];
  
  if(empty($_POST["cityName"])){
    echo "Enter City Name";
  }
  else{
    $city=$_POST["cityName"];
    $api_key = "46fbb95566a18fa33ab3f3356a87a5e2";
    $url = "https://api.openweathermap.org/data/2.5/forecast?q=$city&appid=$api_key&units=metric";
    $content = file_get_contents($url);
    //print_r($content);
    $data = json_decode($content, true); 

    // echo $data["list"][0]["main"]["temp"]. "&deg;C<br>",
    //      $data["list"][8]["main"]["temp"]. "&deg;C<br>",
    //      $data["list"][16]["main"]["temp"]. "&deg;C<br>",
    //      $data["list"][24]["main"]["temp"]. "&deg;C<br>";

    //echo "Temp Max: " . $data["list"][0]["main"]["temp"]. "&deg;C<br>" , "Temp Max: " . $data["list"][8]["main"]["temp"]. "&deg;C<br>";

    // echo "<h1>Weather Forecasr of " . $city . " for 5 days is:</h1> <br>" 
    // . "Date & Time: " . $data["list"][0]["dt_txt"] . " Temperature: "  . $data["list"][0]["main"]["temp"]. "&deg;C <br>"
    // . "Date & Time: " . $data["list"][8]["dt_txt"] . " Temperature: "  . $data["list"][0]["main"]["temp"]. "&deg;C <br>"
    // . "Date & Time: " . $data["list"][16]["dt_txt"] . " Temperature: "  . $data["list"][0]["main"]["temp"]. "&deg;C <br>"
    // . "Date & Time: " . $data["list"][24]["dt_txt"] . " Temperature: "  . $data["list"][0]["main"]["temp"]. "&deg;C <br>"
    // . "Date & Time: " . $data["list"][32]["dt_txt"] . " Temperature: "  . $data["list"][0]["main"]["temp"]. "&deg;C <br>";
    $currentTime = time();
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";
  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
    <title>Weather Forecast</title>
  </head>
  <body>
      <div class="page-content page-container" id="page-content">
        <div class="padding">
          <div class="row container d-flex justify-content-center">
              <div class="col-lg-8 grid-margin stretch-card">
                    <!--weather card-->
                    <div class="card card-weather">
                        <div class="card-body">
                          <div class="weather-date-location">
                            <h3>
                              <!-- Day -->
                              <?php
                                $day = date("l", $currentTime);
                                echo $day;
                              ?>
                            </h3>
                            <p class="text-gray">
                              <span class="weather-date">
                                <h6>
                                <?php
                                  echo date("F j, Y, g:i a");
                                ?>
                                </h6>  
                              </span>
                              <span class="weather-location">
                                <h6>
                                  <?php
                                    print_r($data["city"]["name"]);
                                  ?>, 
                                  <?php
                                    print_r($data["city"]["country"]);
                                  ?>
                                </h6>
                              </span>
                            </p>
                          </div>
                          <div class="weather-data d-flex">
                            <div class="mr-auto">
                              <h4 class="display-3">
                                <?php
                                  print_r($data["list"][0]["main"]["temp"]);
                                ?>
                                <span class="symbol">&deg;</span>C
                              </h4>
                              <?php
                                print_r($data["list"][0]["weather"][0]["description"]);
                              ?>
                              <?php
                                $icon = $data["list"][0]["weather"][0]["icon"];
                              ?>
                              <img src="https://openweathermap.org/img/wn/<?php echo $icon; ?>@2x.png">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--weather card ends-->
            </div>
          </div>
        </div>
      </div>
  </body>
</html>

