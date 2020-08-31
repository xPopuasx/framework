<?php

namespace models;

class Api{

	public function Get_api_CB()
	{
		$this->json_daily_file = __DIR__.'/daily.json';
	    if (!is_file($this->json_daily_file) || filemtime($this->json_daily_file) < time() - 3600) {
	        if ($json_daily = file_get_contents('https://www.cbr-xml-daily.ru/daily_json.js')) {
	            file_put_contents($this->json_daily_file, $json_daily);
	        }
	    }

	    return json_decode(file_get_contents($this->json_daily_file));
	}


	public function Get_api_weather_widget($city_arr=[])
	{
		$apiKey = "87a884aeca5bc60cc0a9c11eb97aeca2";
		$count_arr = count($city_arr);
		for($i = 0; $i < $count_arr; $i++)
		{
			$city = $city_arr[$i];
			$url = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . ",ru&lang=ru&units=metric&appid=" . $apiKey;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_URL, $url);
			$data = json_decode(curl_exec($ch));
			curl_close($ch);

			if($data->weather[0]->description == 'ясно')
			{
				$background = 'bg-orange';
				$info_background = 'bg-orange-800';
				$icon_weather = '<i style="color:yellow;" class="icon-sun3"></i>';
			}
			else
			{	
				$background = 'bg-slate';
				$info_background = 'bg-slate-800';
				$icon_weather = '<i class="icon-droplet"></i>';
			}

		     $result .= '
		     <div class="panel '.$background.'" style="margin-bottom:2px;">
				<div class="panel-body">
					<div class="heading-elements">
						<ul class="icons-list">
	                		<li class="dropup">
	                			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="#"><i class="icon-spinner11"></i> Обновить</a></li>
									<li class="divider"></li>
									<li><a href="#"><i class="icon-cross2" style="color:red;"></i> Удалить из списка</a></li>
								</ul>
	                		</li>
	                	</ul>
                	</div>

					<h5 class="no-margin">'.$icon_weather.' '.$data->name.'</h5>
					<br>
					<div class="text-muted text-size-small">

						
						<span class="heading-text badge '.$info_background.'"><i class="icon-sort-numeric-asc"></i>: '.round($data->main->temp_min,0).' °C</span>
						<span class="heading-text badge '.$info_background.'"><i class="icon-weather-windy"></i> '.round($data->wind->speed,1).' км/ч</span>
						<span class="heading-text badge '.$info_background.'"><i class="icon-droplet"></i> '.$data->main->humidity.' %</span>
					</div>
				</div>
			</div>';
		}
				return $result;
	}

}

?>