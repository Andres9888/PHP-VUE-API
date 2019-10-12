<html>

<body>

  <?php

  $curl = curl_init();

curl_setopt_array(
	$curl,
	array(
		CURLOPT_URL            => 'https://4w5hfwgyt2.execute-api.us-east-1.amazonaws.com/production/code-test',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING       => '',
		CURLOPT_MAXREDIRS      => 10,
		CURLOPT_TIMEOUT        => 30,
		CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST  => 'GET',
		CURLOPT_HTTPHEADER     => array(
			'Accept: */*',
			'Accept-Encoding: gzip, deflate',
			'Cache-Control: no-cache',
			'Connection: keep-alive',
			'Host: 4w5hfwgyt2.execute-api.us-east-1.amazonaws.com',
			'Postman-Token: ddc627a4-3fad-46d1-918b-68c7668d88b7,893567a7-4317-41ca-8e4c-107d286e1a5f',
			'User-Agent: PostmanRuntime/7.17.1',
			'cache-control: no-cache',
			'x-api-key: I4hBB55p7V57qK4OBhnMYaP9lEapiLY05WWJHBCq',
		),
)
);

  $response = curl_exec( $curl );
  $err      = curl_error( $curl );

  curl_close( $curl );

  if ( $err ) {
	  echo 'cURL Error #:' . $err;
  } else {
	  $json = json_decode( $response );
  }
	?>

  <div id="show-box">
	<div v-for="item in items">
	  <h1 class="show-box__title">{{item.data[2]["value"]}}</h1>
	  <p class="show-box__description">{{item.data[1]["value"]}}</p>
	  <img class="show-box__img" v-for="img in item.links.slice(0,1)" :src="img.href">
	</div>

  </div>


  <script type="text/javascript">
	var json = <?php echo json_encode( $json ); ?>;
  </script>
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script>
	var vm = new Vue({

	  el: '#show-box',
	  data: json.collection



	})
  </script>
</body>

</html>
