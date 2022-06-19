<?php
$city = $_POST['city'];
$url = 'https://api.openweathermap.org/data/2.5/weather';

$options = array(
    'q' => $city,
    'APPID' => 'ae961d697e9d2658b4c51e90f919bc37',
    'units' => 'metric',
    'lang' => 'ru'
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($options));

$response = curl_exec($ch);
$data = json_decode($response, true);
$temp = intval($data['main']['temp']);
$icon = $data['weather'][0]['icon'];
$dt = new DateTime();
$sys = $data['dt'];
$date = $data['timezone'];
curl_close($ch);
?>
<?php require_once('../vendor/header.php') ?>
<div class="container-fluid" style="margin-top: 200px">
    <div class="row justify-content-center">
        <div class="col-12 col-md-4 col-sm-12 col-xs-12">
            <div class="card p-4">

                <div class="d-flex">
                    <h6 class="flex-grow-1"><?= $data['name'] ?></h6>
                    <h6><?= gmdate('H:i', $sys + $date); ?></h6>
                </div>

                <div class="d-flex flex-column temp mt-5 mb-3">
                    <h1 class="mb-0 font-weight-bold" id="heading"> <?= $temp ?>&deg; C </h1>
                    <span class="small grey"><?= $data['weather']['0']['description'] ?></span>
                </div>
                <div class="d-flex">
                    <div class="temp-details flex-grow-1">
                        <p class="my-1">
                            <img src="https://i.imgur.com/B9kqOzp.png" height="17px">

                            <span> <?= $data['wind']['speed'] ?> km/h  </span>
                        </p>
                        <p class="my-1">
                            <i class="fa fa-tint mr-2" aria-hidden="true"></i>
                            <span> <?= $data['main']['humidity'] ?>% </span>
                        </p>
                    </div>

                    <div>
                        <img src="http://openweathermap.org/img/wn/<?= $icon ?>@2x.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    body{
        background-color: #a5a5b1;
    }
</style>
<?php require_once('../vendor/footer.php') ?>
