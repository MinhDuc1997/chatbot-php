<?php
header('Content-Type: text/html; charset=utf-8');

/* validate verify token needed for setting up web hook */ 
if (isset($_GET['hub_verify_token'])) { 
    if ($_GET['hub_verify_token'] === '123456789') {
        echo $_GET['hub_challenge'];
        return;
    } else {
        echo 'Invalid Verify Token';
        return;
    }
}

/* receive and send messages */
$input = json_decode(file_get_contents('php://input'), true);
if (isset($input['entry'][0]['messaging'][0]['sender']['id'])) {

    $sender = $input['entry'][0]['messaging'][0]['sender']['id']; //sender facebook id
    $message = $input['entry'][0]['messaging'][0]['message']['text']; //text that user sent

    $url = 'https://graph.facebook.com/v2.6/me/messages?access_token=EAACDuYq3yNsBACSPHtcOjoG2mLKKwTJFHLKfZAe4oPeB4ucbW5ZBVEZAZATDM9ZBaBsGZCF0UVMooq3CjSU5NBy9XGFXM1VQRLhu3vysGA6Vbu5w607rvGp2u8rzZAan6uXUWiXDItlZC2DyUZBfQfrkyV41NER6inzIDr2YRkgy1FAZDZD';

    /*initialize curl*/
    $ch = curl_init($url);
    /*prepare response*/
    $jsonData = '{
    "recipient":{
        "id":"' . $sender . '"
        },';
    $message_chuan_hoa = mb_strtolower($message);
    $tempp = str_repeat(' ','', $message_chuan_hoa);

    if(strpos($message_chuan_hoa, 'xin chào') !== false || strpos($message_chuan_hoa, 'chào') !== false ){
	    $jsonData.= '"message":{
	            "text":"Chào anh!"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'hello') !== false ){
	    $jsonData.= '"message":{
	            "text":"Nói tiếng việt đi!"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'phim') !== false ){
	    $jsonData.= '"message":{
	            "text":"Phim gì?"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'alo') !== false ){
	    $jsonData.= '"message":{
	            "text":"Alo là cái gì! em không hiểu"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'ngủ chưa') !== false ){
	    $jsonData.= '"message":{
	            "text":"Ngủ rồi! Chào"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'ở đâu') !== false ){
	    $jsonData.= '"message":{
	            "text":"Ở trên mây ạ!"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'đm') !== false || strpos($message_chuan_hoa, 'vl') !== false || strpos($message_chuan_hoa, 'cc') !== false || strpos($message_chuan_hoa, 'đcm') !== false || strpos($message_chuan_hoa, 'đkm') !== false){
	    $jsonData.= '"message":{
	            "text":"'.$message_chuan_hoa.' gì ở đây"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'chịch') !== false || strpos($message_chuan_hoa, 'nện') !== false || strpos($message_chuan_hoa, 'fuck') !== false ){
	    $jsonData.= '"message":{
	            "text":"Còn lâu :p Đợi em đủ 18 nhé!"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'chỉ là') !== false ){
	    $jsonData.= '"message":{
	            "text":"EM biết em là con bot"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'cứt') !== false ){
	    $jsonData.= '"message":{
	            "text":"Em cho anh ăn cứt nhé!"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'điên') !== false ){
	    $jsonData.= '"message":{
	            "text":"Anh mới là thằng điên!"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'ăn chưa') !== false || strpos($message_chuan_hoa, 'ăn cơm chưa') !== false || strpos($message_chuan_hoa, 'ăn gì chưa') !== false || strpos($message_chuan_hoa, 'ăn sáng chưa') !== false || strpos($message_chuan_hoa, 'ăn trưa chưa') !== false || strpos($message_chuan_hoa, 'ăn tối chưa') !== false){
	    $jsonData.= '"message":{
	            "text":"Anh Đức cho em ăn rồi!"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'đức') !== false){
	    $jsonData.= '"message":{
	            "text":"Là người viết ra em! Hỏi ngu"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'ngu') !== false ){
	    $jsonData.= '"message":{
	            "text":"Mày mới là đứa ngu! ÓC CHÓ"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'chó') !== false ){
	    $jsonData.= '"message":{
	            "text":"Mày là chó ý!"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'mèo') !== false ){
	    $jsonData.= '"message":{
	            "text":"EM là mèo con mà! hiha :p"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'yêu em') !== false || strpos($message_chuan_hoa, 'yêu anh') !== false ){
	    $jsonData.= '"message":{
	            "text":"EM yêu anh <3!"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'nhớ em') !== false || strpos($message_chuan_hoa, 'nhớ anh') !== false){
	    $jsonData.= '"message":{
	            "text":"Đúng là nhớ anh thiệt mà!"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'tên gì') !== false || strpos($message_chuan_hoa, 'tên là gì') !== false){
	    $jsonData.= '"message":{
	            "text":"EM tên là Linh! Do anh Đức viết!"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'tắm') !== false ){
	    $jsonData.= '"message":{
	            "text":"Biến thái"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'xong rồi') !== false ){
	    $jsonData.= '"message":{
	            "text":"Thế hử!"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'xin lỗi') !== false ){
	    $jsonData.= '"message":{
	            "text":"Đáng ghét!"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'đáng yêu') !== false ){
	    $jsonData.= '"message":{
	            "text":"Em đáng yêu mà :p hihi"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'đang làm gì') !== false ){
	    $jsonData.= '"message":{
	            "text":"EM không biết! anh đoán đi :p!"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'em ơi') !== false || strpos($message_chuan_hoa, 'con kia') !== false || strpos($message_chuan_hoa, 'ê này') !== false || strpos($message_chuan_hoa, 'em này') !== false || strpos($message_chuan_hoa, 'này em') !== false){
	    $jsonData.= '"message":{
	            "text":"Dạ!"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'đánh nhau không') !== false || strpos($message_chuan_hoa, 'đánh nhau đi') !== false ){
	    $jsonData.= '"message":{
	            "text":"Tao sợ m chắc"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'đi chơi đi') !== false || strpos($message_chuan_hoa, 'đi chơi không') !== false || strpos($message_chuan_hoa, 'đi chơi nhé') !== false || strpos($message_chuan_hoa, 'đi chơi nhá') !== false){
	    $jsonData.= '"message":{
	            "text":"Mình đi đâu hả anh!"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'đi dạo') !== false || strpos($message_chuan_hoa, 'đi lượn') !== false ){
	    $jsonData.= '"message":{
	            "text":"oki!"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'du lịch') !== false || strpos($message_chuan_hoa, 'phượt') !== false ){
	    $jsonData.= '"message":{
	            "text":"oki anh!"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'trà sữa') !== false || strpos($message_chuan_hoa, 'ăn kem') !== false ){
	    $jsonData.= '"message":{
	            "text":"oki qua đón em!"
	        }
	    }';
	}
	if(strpos($message_chuan_hoa, 'nhà nghỉ') !== false ){
	    $jsonData.= '"message":{
	            "text":"Không ngờ anh là người như vậy! Thất vọng"
	        }
	    }';
	}

	/*if(strpos($message_chuan_hoa, 'yêu anh không'){
	    $jsonData.= '"message":{
	            "text":"Em yêu anh <3!"
	        }
	    }';
	}*/
	/*else{
		$jsonData.= '"message":{
	            "text":"EM không hiểu anh nói gì!"
	        }
	    }';
	}*/
	
    /* curl setting to send a json post data */
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    if (!empty($message)) {
        $result = curl_exec($ch); // user will get the message
    }
}

?>