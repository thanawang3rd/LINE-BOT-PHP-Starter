<?php
ini_set('always_populate_raw_post_data', '-1');
$proxy = 'http://fixie:rnOjMCQkPajq457@velodrome.usefixie.com:80';
$proxyauth = 'http://fixie:rnOjMCQkPajq457@velodrome.usefixie.com:80';
$access_token = '+wkE0LfTqTxn8HRBs+HnkoM2FOHGmZhpbVl+Vm13Y0ZsW1Yplfj8UXibnizUAZYABL49/J9Q0AXoNMyurJI8xb1B3lbdEfzaFFU8fZAQ4jVvPLT5m9VNNm1pG3WsjCGHgn5nHb35NHH1vY3FxFr3OQdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			$bot ="หนูหิ่น";

			switch ($bot) {
			    case "หิวบ่":
			        $response_text = 'หิวหลาย';
			        break;
			    case "ถูกหวยบ่":
			        $response_text = 'บ่ถึก';
			        break;
			    case "นุชงามบ่":
			        $response_text = 'เบิคำซิเว่า';
			        break;
			    default:
			        $response_text = ' จ้าาา';
			}


			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $response_text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);


			
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_PROXY, $proxy);
			curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";