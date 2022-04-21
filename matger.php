<?php 
ob_start();
$Marcus = "5079010302:AAE33NvjBUtGiCOSwtUnVnJ7a5YtdCDnGvc";
define('API_KEY',$Marcus);
echo file_get_contents("https://api.telegram.org/bot" . API_KEY . "/setwebhook?url=" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
function bot($method,$datas=[]){
$aws_c9 = http_build_query($datas);
$url = "https://api.telegram.org/bot".API_KEY."/".$method."?$aws_c9";
$aws_c9 = file_get_contents($url);
return json_decode($aws_c9);
}

function save($array){
    file_put_contents('marcus.json', json_encode($array));
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$id = $message->from->id;
$aso = Your_ID ;
$chat_id = $message->chat->id;
$text = $message->text;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id2 = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$name = $message->from->first_name;
$user = $message->from->username;
$from_id = $message->from->id;
$tws = file_get_contents("tw.txt");
$admin =  1043728410;
$admin2 = file_get_contents("admin2.txt");
$ad = array("$admin","$admin2");
$list = file_get_contents("blocklist.txt");
$ebu = explode("\n",$list);
if(in_array($from_id,$ebu)){
 bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⛳| عزيزي انت محظور من البوت",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
]);    
}
#التخزين ايديات
$from_id = $message->from->id;
mkdir("alsh");
if(isset($message)){
$al = file_get_contents('Alsh.txt');
$alo = explode("\n",$al);
if(!in_array($from_id,$alo)){
$alsh2 = fopen("Alsh.txt", "a") or die("Unable to open file!");
fwrite($alsh2, "$from_id\n");
fclose($alsh2);}}
$sta = file_get_contents("start.txt");
#شتراك اجباري خاصه
$all = file_get_contents("id.txt");
$rabt = file_get_contents("rabt.txt");
$join = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$all&user_id=".$from_id);
if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"عذرا 🍃 عليك اولا الاشتراك بالقناة 👇🏻
لكي تتمكن من استخدام البوت 🐼
بعد ذلك اضغط /start مجددا ☁️",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
          'inline_keyboard'=>[
[['text'=>"CH IVAR ❓",'url'=>"$rabt"]],
]])]);return false;}
$op = file_get_contents("ch.txt");
$join = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@$op&user_id=".$from_id);
if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لستخدام البوت عليك اشتراك في قنوات البوت 🎁.
بعد الاشتراك في القنوات اضغط - /start 📦.
قناة البوت : @$op",
'reply_to_message_id'=>$message->message_id,
]);return false;}
#شتراك اجباري2
$oop = file_get_contents("chc.txt");
$join = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@$oop&user_id=".$from_id);
if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لستخدام البوت عليك اشتراك في قنوات البوت 🎁.
بعد الاشتراك في القنوات اضغط - /start 📦.
قناة البوت : @$oop",
'reply_to_message_id'=>$message->message_id,
]);return false;}

$user = $message->from->username;
if(isset($update->callback_query)){
  $chat_id = $update->callback_query->message->chat->id;
  $message_id = $update->callback_query->message->message_id;
  $data     = $update->callback_query->data;
 $user = $update->callback_query->from->username;
}
$admin =$aso ;
$me = bot('getme',['bot'])->result->username;
$sales = json_decode(file_get_contents('marcus.json'),1);
# @uuuuhu #
if($chat_id == $admin){
 if($text == '/u'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"- مرحباً عزيزي المطور ( @$user ) 🔥.",
   'reply_markup'=>json_encode([
     'inline_keyboard'=>[
       [['text'=>'- اضف سلعة ، 💸','callback_data'=>'add']],
       [['text'=>'- حذف سلعة 🗑\'','callback_data'=>'del']]
      ]
    ])
  ]);
  $sales['mode'] = null;
  save($sales);
 }
 if($data == 'add'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'• قم بأرسال اسم السلعة ، 📬',
    'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'- الغاء 🚫!','callback_data'=>'c']]
      ]
    ])
  ]);
  $sales['mode'] = 'add';
  save($sales);
  exit;
 }
 if($text != '/start' and $text != null and $sales['mode'] == 'add'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'تم الحفظ ✅. 
~ الان ارسل عدد النقاط ( السعر ) المطلوبة للشراء ، 💸 ... رقم فقط '
  ]);
  $sales['n'] = $text;
  $sales['mode'] = 'addm';
  save($sales);
  exit;
 }
 if($text != '/start' and $text != null and $sales['mode'] == 'addm'){
  $code = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz12345689807'),1,7);
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'تم الحفظ السلعة ✅. 
   ℹ️┇الاسم : '.$sales['n'].'
💵┇السعر : '.$text.'
⛓┇كود السلعة : '.$code
  ]);
  
  $sales['sales'][$code]['name'] = $sales['n'];
  $sales['sales'][$code]['price'] = $text;
  $sales['n'] = null;
  $sales['mode'] = null;
  save($sales);
  exit;
 }
 if($data == 'del'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'• قم بأرسال كود السلعة ، 📬',
    'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'- الغاء 🚫!','callback_data'=>'c']]
      ]
    ])
  ]);
  $sales['mode'] = 'del';
  save($sales);
  exit;
 }
 if($text != '/start' and $text != null and $sales['mode'] == 'del'){
  if($sales['sales'][$text] != null){
   bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'تم حذف السلعة ✅. 
   ℹ️┇الاسم : '.$sales['sales'][$text]['name'].'
💵┇السعر : '.$sales['sales'][$text]['price'].'
⛓┇كود السلعة : '.$text
  ]);
  unset($sales['sales'][$text]);
  $sales['mode'] = null;
  save($sales);
  exit;
  } else {
   bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>'- الكود الذي ارسلته غير موجود 🚫!'
   ]);
  }
 }
} else {
 if(preg_match('/\/(start)(.*)/', $text)){
  $ex = explode(' ', $text);
  if(isset($ex[1])){
   if(!in_array($chat_id, $sales[$chat_id]['id'])){
    $sales[$ex[1]]['collect'] += 1;
    save($sales);
    bot('sendMessage',[
     'chat_id'=>$ex[1] ,
     'text'=>"- قام : @$user بالدخول الى الرابط الخاص وحصلت على نقطة واحده ، ✨\n~ عدد نقاطك : ".$sales[$ex[1]]['collect'], 
    ]);
    $sales[$chat_id]['id'][] = $chat_id;
    save($sales);
   }
  }
  $status = bot('getChatMember',['chat_id'=>'@I_l_D','user_id'=>$chat_id])->result->status;
  if($status == 'left'){
   bot('sendMessage',[
       'chat_id'=>$chat_id,
       'text'=>"- لا تستطيع بدء استخدام البوت الا بعد الاشتراك بقناة البوت 🚫' @I_l_D",
       'reply_to_message_id'=>$message->message_id,
   ]);
   exit();
  }
  if($sales[$chat_id]['collect'] == null){
   $sales[$chat_id]['collect'] = 0;
   save($sales);
  }
  bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>'
▪️ مرحبا بك 
---------------------------------------------
▪️ البوت متخصص لبيع العروض المتقدمة من لبوت عـن طريق تجميع النقود 💰،
---------------------------------------------
▪️ قم باختيار احد الاقسام الذي تريدها من الكيبورد السفلي ✅
عدد نقودك الآن 💰 :  '.$sales[$chat_id]['collect'],
   'reply_markup'=>json_encode([
    'inline_keyboard'=>[
 
     [['text'=>"قائمة السلع 🏖",'callback_data'=>"sales"],['text'=>"جمع فلوس 💰",'callback_data'=>"col"]],
     [['text'=>"الشرح ⁉️",'callback_data'=>"mysend"],['text'=>'حسابي 📡','callback_data'=>'nk']],
     [['text'=>"تحويل نقودي 📛،",'callback_data'=>"th"],['text'=>"شراء نقود 💵",'callback_data'=>"sho"]],
    ] 
   ])
  ]);
 }
if($data == "nk"){
    bot('deleteMessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    ]);
    bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
احصائيات حسابك 
↓ عدد الذين قامو بالدخول عبر رابط الدعوة
▪ ".$sales[$chat_id]['collect']."
",
]);
}
if($data == "to"){
    bot('deleteMessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    ]);
    bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
اهلا بك صديقي 🎊

أرسل رسالتك كـ{صورة ، فيديو كام ، ملف ، رسالة صوتية ، الخ}  🛠

وسيتم ارسالها للمطورين 📬
",
]);
}

  if($data == "th"){
    bot('deleteMessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    ]);
    bot('SendMessage',[
'chat_id'=>$chat_id,
        'text'=>"◾ قيد الانشاء 
تحت الصيانه هذا القسم 📤
للرجوع اضغط /start
",
]);
}
if($data == "mysend"){
    bot('deleteMessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    ]);
    bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
▪ البوت بسيط جدا ولا يحتاج للشرح 📬

▪ تواصل مع مطور البوت اذا لم تفهم عمل البوت :
@J_V_6
",
]);
}

  if($data == "sho"){
    bot('deleteMessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    ]);
    bot('SendMessage',[
'chat_id'=>$chat_id,
        'text'=>" 
مرحبا بك في قسم شراء النقود 💰
لشراء النقود 👇
--------------------------------------
متواجد من 5 لل 100 نقطه - 🔺
اقبل بأي مقابلك عندك - ♣️
@J_V_6 - 🀄 للتواصل
أرسل /start للعودة 📮
",
]);
}
 # @uuuuhu #
 if($data == 'col'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'
- رابط الدعوه الخاص بك عند دخول شخص
 للبوت عن طريق رابطك تحصل على نقطة واحده  ، ⬇️

https://t.me/'.$me.'?start='.$chat_id.'
',
  ]);
 }elseif($data == 'sales'){
  $reply_markup = [];
  $reply_markup['inline_keyboard'][] = [['text'=>'💵┇السعر ','callback_data'=>'s'],['text'=>'ℹ️┇الاسم ','callback_data'=>'s']];
  foreach($sales['sales'] as $code => $sale){
   $reply_markup['inline_keyboard'][] = [['text'=>$sale['price'],'callback_data'=>$code],['text'=>$sale['name'],'callback_data'=>$code]];
  }
  $reply_markup = json_encode($reply_markup);
  bot('editMessageText',[
   'chat_id'=>$chat_id,
   'message_id'=>$message_id,
   'text'=>'- ▪️ اليكم قسم العروض 

▪️ اختر العرض المناسب وقم بشراؤه 👇',
   'reply_markup'=>($reply_markup)
  ]);
  $sales[$chat_id]['mode'] = null;
   save($sales);
   exit;
 } elseif($data == 'yes'){
  $price = $sales['sales'][$sales[$chat_id]['mode']]['price'];
  $name = $sales['sales'][$sales[$chat_id]['mode']]['name'];
  bot('editMessageText',[
   'chat_id'=>$chat_id,
   'message_id'=>$message_id,
   'text'=>"- تم ارسال طلبك لمالك البوت ، ✨\nقم بمراسلته لينفذ طلبك ...
 - @J_V_6"
  ]);
  bot('sendmessage',[
   'chat_id'=>$admin,
   'text'=>"@$user \n - قام بشراء $name بسعر $price ، 🧨"
  ]);
  $sales[$chat_id]['mode'] = null;
  $sales[$chat_id]['collect'] -= $price;
  save($sales);
  exit;
 } else {
   if($data == 's') { exit; }
   $price = $sales['sales'][$data]['price'];
   $name = $sales['sales'][$data]['name'];
   if($price != null){
    if($price <= $sales[$chat_id]['collect']){
     bot('editMessageText',[
      'chat_id'=>$chat_id,
      'message_id'=>$message_id,
      'text'=>"أهل؟ انت متأكد من شراء $name بسعر $price ؟ ، 📮",
      'reply_markup'=>json_encode([
       'inline_keyboard'=>[
        [['text'=>'- تاكيد الشراء، ⁦🇮🇶⁩','callback_data'=>'yes'],['text'=>'- لااريد 🚫\'','callback_data'=>'sales']] 
       ] 
      ])
     ]);
     $sales[$chat_id]['mode'] = $data;
     save($sales);
     exit;
    } else {
     bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
      'text'=>'- للاسف نقاطك غير كافيه لشراء السلعه ، 🚫',
      'show_alert'=>true
     ]);
    }
   }
 }
}
$bot = file_get_contents("com.txt");
if($text == "/start" and in_array($chat_id,$ad)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"آهلا بك $name 🍟.
🎺| يمكنك استخدام الاوامر الموجوده في اسفل.
📌| لعرض احصائيات البوت ارسل : /mem.
",
'parse_mode'=>"Markdown",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
       [['text'=>'- اضف سلعة ، 💸','callback_data'=>'add'],['text'=>'- حذف سلعة 🗑\'','callback_data'=>'del']],
[["text"=>"تفعيل التواصل ،📯.","callback_data"=>"utws"],["text"=>"تعطيل التواصل ،📌.","callback_data"=>"ntws"]],
[["text"=>"حظـر عضو ،📤.","callback_data"=>"bn"],["text"=>"الغاء حظر العضو ،📦.","callback_data"=>"unbn"]],
[["text"=>"آضـآفهہ‏‏ آدمـن للبوت ،📚.","callback_data"=>"admin"]],
[["text"=>"مـعلومـآت لعضـو ،🎺.","callback_data"=>"info"]],
[["text"=>"قسم شتراك اجباري ،🎯.","callback_data"=>"chh"],["text"=>"قسم الاذاعه ،🏆.","callback_data"=>"bcc"]],
[["text"=>"حذف جميع احصائيات البوت ،🌻.","callback_data"=>"delbot"]],
]])
]);   
unlink("com.txt");
}
#رجوع
if($data == "bk" and in_array($chat_id2,$ad)){
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"آهلا بك $name 🍟.
🎺| يمكنك استخدام الاوامر الموجوده في اسفل.
📌| لعرض احصائيات البوت ارسل : /mem.
",
'parse_mode'=>"Markdown",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
       [['text'=>'- اضف سلعهہ‌‏ 🪂','callback_data'=>'add'],['text'=>'- حذف سلعهہ‏‏ ❌','callback_data'=>'del']],
[["text"=>"تفعيل التواصل ،📯.","callback_data"=>"utws"],["text"=>"تعطيل التواصل ،📌.","callback_data"=>"ntws"]],
[["text"=>"حظـر عضو ،📤.","callback_data"=>"bn"],["text"=>"الغاء حظر العضو ،📦.","callback_data"=>"unbn"]],
[["text"=>"آضـآفهہ‏‏ آدمـن للبوت ،📚.","callback_data"=>"admin"]],
[["text"=>"مـعلومـآت لعضـو ،🎺.","callback_data"=>"info"]],
[["text"=>"قسم شتراك اجباري ،🎯.","callback_data"=>"chh"],["text"=>"قسم الاذاعه ،🏆.","callback_data"=>"bcc"]],
[["text"=>"حذف جميع احصائيات البوت ،🌻.","callback_data"=>"delbot"]],
]])
]);   
unlink("com.txt");
}

#قسم حذف كل
if($data == "delbot" and in_array($chat_id2,$ad)){
 bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"📮| عزيزي هل انت متاكد من انك تريد حذف جميع احصائيات البوت،
🎄| #مـلآحظـهہ‏‏ سيتم حذف جميع ايديات الاعضا،الاشتراك الاجباري،اعضا المحظورين،عدد زخارف و....،",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"نعم ،📌.","callback_data"=>"dell"],["text"=>"لآ ،📌.","callback_data"=>"bk"]],
]])
]);   
}
if($data == "dell" and in_array($chat_id2,$ad)){
 bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"📮| تم حذف جميع احصائيات البوت اصبح الان جديد",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،📌.","callback_data"=>"bk"]],
]])
]);   
unlink("start.txt");
unlink("tw.txt");
unlink("blocklist.txt");
unlink("admin2.txt");
unlink("Alsh.txt");
unlink("rabt.txt");
unlink("id.txt");
unlink("ch.txt");
unlink("chc.txt");
unlink("zkf.txt");
}
#قسم الاذاعه
if($data == "bcc" and in_array($chat_id2,$ad)){
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"💛| حسننا الان قم بختيار الاذاعه من فضلك،",
'disable_web_page_preview'=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"آذآعهہ‏‏ رسـآلهہ‏‏ ،🌻.","callback_data"=>"bc"],["text"=>"آذآعهہ‏‏ بآلتوجيهہ‏‏ ،🌻.","callback_data"=>"for"]],
[["text"=>"آذآعهہ‏‏ شـفآف ،🌻.","callback_data"=>"inln"],["text"=>"آذآعهہ‏‏ بآلمـيديآ ،🌻.","callback_data"=>"med"]],
[["text"=>"رجوع ،🌻.","callback_data"=>"bk"]],
]])
]);   
}
#قسم شتراك اجباري
if($data == "chh" and in_array($chat_id2,$ad)){
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"📯||حسننا عزيزي قم بلختيار من الاسفل لوضع شتراك اجباري،",
'disable_web_page_preview'=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"قناة عامه 1 ،🎺.","callback_data"=>"add2"],["text"=>"قناة عامه 2 ،🎺.","callback_data"=>"add1"]],
[["text"=>"قناة خاصه ،🎺.","callback_data"=>"add"]],
[["text"=>"حذف جميع القنوات من شتراك ،🎺.","callback_data"=>"remch"]],
[["text"=>"رجوع ،🎺.","callback_data"=>"bk"]],
]])
]);   
}
#الاحصائيات
$tkzk = explode("\n",file_get_contents("zkf.txt"));
$meb = explode("\n",file_get_contents("Alsh.txt"));
$band = explode("\n",file_get_contents("blocklist.txt"));
$mem = count($meb)-1;
$zktex = count($tkzk)-1;
$bnn = count($band)-1;
if($text == "/mem" and in_array($chat_id,$ad)){
 date_default_timezone_set("Asia/Baghdad");
$getMe = bot('getMe')->result;
$date = $message->date;
$gettime = time();
$sppedtime = $gettime - $date;
$time = date('h:i');
$date = date('y/m/d');
$userbot = "{$getMe->username}";
$userb = strtoupper($userbot);
if ($sppedtime == 3  or $sppedtime < 3) {
$f = "ممتازة 👏🏻";}
if ($sppedtime == 9 or $sppedtime > 9 ) {
$f = "لا بأس 👍🏻";}
if ($sppedtime == 10 or $sppedtime > 10) {
$f = " سئ جدا 👎🏻"; }
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>
"📯||عدد العضاء : *$mem*،
📯||عدد الاعضا المحظورين : *$bnn*،
📯||حاله البوت : *$f*،
📯||الوقت و التاريخ : *20$date - $time*،",
'parse_mode'=>'MarkDown',
'reply_to_message_id'=>$message->message_id,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🎺.","callback_data"=>"bk"]],
]])
]);   
}
#رساله ستارت
if($data == "start" and in_array($chat_id2,$ad)){
file_put_contents("com.txt","start");
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"📯||حسننا الان قم برسال النص،
🐞| يمكنك ايضا استخدام الماركدوان كمثال،
[اضغط هنا وتابع جديدنا](t.me/alshh)",
'disable_web_page_preview'=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🎺.","callback_data"=>"bk"]],
]])
]);   
}
if($bot == "start" and $text != "/h" and $text != "/start" and in_array($chat_id,$ad)){
file_put_contents("start.txt","$text");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🎯| تم حفظ نص الاستارت،",
'reply_to_message_id'=>$message->message_id,
]);
unlink("com.txt");
}
#تفعيل تواصل
if($data == "utws" and in_array($chat_id2,$ad)){
file_put_contents("tw.txt","on");
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"📦|تم تفعيل التواصل ،",
]); 
}
#تعطيل تواصل
if($data == "ntws" and in_array($chat_id2,$ad)){
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"📮|تم تعطيل التواصل ،",
]); 
unlink("tw.txt");
}
if($text and !in_array($from_id,$ebu) and !in_array($chat_id,$ad) and $tws == "on"){
bot('forwardMessage',[
'chat_id'=>$admin,
'from_chat_id'=>$chat_id,
'message_id'=>$update->message->message_id,
'text'=>$text,
]);
}
if($text and $message->reply_to_message && $text!="/info" && $text!="/ban" && $text!="/unban" && $text!="/forward" and !$data ){
bot('sendMessage',[
'chat_id'=>$message->reply_to_message->forward_from->id,
'text'=>$text,
]);
}
#اضافه ادمن
if($data == "admin" and $chat_id2 == $admin){
file_put_contents("com.txt","ad");
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"📮| حسننا الان قم برسال ايدي العضو،",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🎺.","callback_data"=>"bk"]],
]])
]);   
}
if($bot == "ad" and $text != "/start" and $chat_id == $admin){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📮| تم حفظ ايدي العضو،",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🎺.","callback_data"=>"bk"]],
]])
]);   
bot('sendMessage',[
'chat_id'=>$text,
'text'=>"📯||تم رفعك ادمن بواسط صاحب البوت،",
'parse_mode'=>'MarkDown',
]);
unlink("com.txt");
file_put_contents("admin2.txt","$text");
}
#مـآيخصـك
if($data == "admin" and $chat_id2 == $admin2){
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"📯||هاذ الامر لايخصك،",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🎺.","callback_data"=>"bk"]],
]])
]);   
}
#حظر
if($data == "bn" and in_array($chat_id2,$ad)){
file_put_contents("com.txt","bn");
 bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"💘| حسننا الان قم برسال ايدي العضو،",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🎺.","callback_data"=>"bk"]],
]])
]);   
}
if($bot == "bn" and $text != "/start" and in_array($chat_id,$ad)){
$myfile2 = fopen("blocklist.txt", "a") or die("Unable to open file!");	
fwrite($myfile2, "$text\n");
fclose($myfile2);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"📨| تم حظر العضو بنجاح،",
]);
bot('sendmessage',[
'chat_id'=>$text,
'text'=>"📨| عذرا عزيزي تم حظرك،",
]);
unlink("com.txt");
}
#الغاء حظر
$listt = file_get_contents("blocklist.txt");
if($data == "unbn" and in_array($chat_id2,$ad)){
file_put_contents("com.txt","unbn");
 bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"📮| حسننا الان قم برسال ايدي العضو،",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🎺.","callback_data"=>"bk"]],
]])
]);   
}
if($bot == "unbn" and $text != "/start" and in_array($chat_id,$ad)){
$newlist = str_replace($text,"",$listt);
file_put_contents("blocklist.txt",$newlist);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"📯||تم آلغآء حظر العضو بنجاح،",
]);
bot('sendmessage',[
'chat_id'=>$text,
'text'=>"📯||عزيزي تم آلغآء آلحظر عنك،",
]);
unlink("com.txt");
}
#معلومات
if($data == "info" and in_array($chat_id2,$ad)){
file_put_contents("com.txt","info");
 bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"🎁| حسننا الان قم برسال ايدي العضو،
📯||#ملاحظه يجب العضو يكون مشترك في لبوت مسبقا،",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🎺.","callback_data"=>"bk"]],
]])
]);   
}
if($bot == "info" and $text != "/start"and in_array($chat_id,$ad)){
$ine = json_decode(file_get_contents("http://api.telegram.org/bot".API_KEY."/getChat?chat_id=$text"));
$infe4 =$ine->result->first_name;
$infe2 =$ine->result->id;
$infe3 =$ine->result->username;
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"*🎯| INFO MEMBER*
🔖| Name 💬 : *$infe4* \n 🎧| User 💌 : [@$infe3] \n 📚| Id 🎄 : `$infe2`",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>'MarkDown', 
]);
unlink("com.txt");
}
#شتراك اجباري1
if($data == "add2" and in_array($chat_id2,$ad)){
file_put_contents("com.txt","ab");
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"📦| حسـننا عزيزي قم برسال معرف قناتك مـندون ل @
📥| كمثال : `I8F8I`",
'parse_mode'=>"Markdown",
]);
}
if($bot == "ab" and $text != "/h" and $text != "/start" and in_array($chat_id,$ad)){
file_put_contents("chc.txt","$text");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🎯| حسننا عزيزي تم حفظ قناتك الان قم برفعي مشرف في قناتك .
📮| قناتك : @$text.
لرجوع اضغط /start.",
'reply_to_message_id'=>$message->message_id,
]);
unlink("com.txt");
}
#شـترآك اجباري1
if($data == "add1" and in_array($chat_id2,$ad)){
file_put_contents("com.txt","al");
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"📦| حسـننا عزيزي قم برسال معرف قناتك مـندون ل @
📚| كمثال : `I8F8I`",
'parse_mode'=>"Markdown",
]);
}

if($bot == "al" and $text != "/h" and $text != "/start" and in_array($chat_id,$ad)){
file_put_contents("ch.txt","$text");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🎯| حسننا عزيزي تم حفظ قناتك الان قم برفعي مشرف في قناتك .
📮| قناتك : @$text.
لرجوع اضغط /start.",
'reply_to_message_id'=>$message->message_id,
]);
unlink("com.txt");
}
#شتراك خاص
if($data == "add"  and in_array($chat_id2,$ad)){
file_put_contents("com.txt","vv");
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"📌| حسننا عزيزي قم برسال ايدي قناتك !
📮| كمثال : `-1001416392355` !
📎| آن لم تعرف كيفه استخراج ايدي قناتك كل ماعليك قم برسال توجيه من قناتك لهاذ البوت ! @X59BoT !
لرجوع اضغط /start.",
'parse_mode'=>"Markdown",
]);
}

if($bot == "vv" and $text != "/o" and $text != "/start" and in_array($chat_id,$ad)){
file_put_contents("com.txt","alo");
file_put_contents("id.txt","$text");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✂| تم حفظ ايدي قناتك !
📛| حسننا الان قم برسال رابط قناتك !
لرجوع اضغط /start.",
'reply_to_message_id'=>$message->message_id,
]);
}
if($bot == "alo" and $text != "/o" and $text != "/start" and in_array($chat_id,$ad)){
file_put_contents("rabt.txt","$text");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"💛| تم حفظ رابط القناة .
📚| رابط قناتك : `[$text]`
🔖| آيدي قناتك : `$al`
🔖| آلآن قم برفع لبوت مشرفي في قناتك
لرجوع اضغط /start.",
'parse_mode'=>"Markdown",
'reply_to_message_id'=>$message->message_id,
]);
unlink("com.txt");
}
#حذف قنوات
if($data == "remch" and in_array($chat_id2,$ad)){
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"📦| تم حذف جميع القنوات،",
'parse_mode'=>"Markdown",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🎺.","callback_data"=>"bk"]],
]])
]);   
unlink("rabt.txt");
unlink("id.txt");
unlink("ch.txt");
unlink("chc.txt");
}
#اذاعه
if($data == "bc" and in_array($chat_id2,$ad)){
file_put_contents("com.txt","send");
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>" ارسل رسالتك الان عزيزي 🎯. #يمكنك استخدام الماركدان ايضا",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🎺.","callback_data"=>"bk"]],
]])
]);
}
$ali = fopen( "Alsh.txt", 'r');
while(!feof( $ali)){
$alshh3 = fgets($ali);
if($bot == "send" and in_array($chat_id,$ad)){
bot('sendMessage', [
'chat_id' =>$alshh3,
'text'=>$text,
'parse_mode'=>"MarkDown",
'disable_web_page_preview' =>"true"
]);
unlink("com.txt");
}
}
$tx = file_get_contents("alh.txt");
if($data == "inln" and in_array($chat_id2,$ad)){
file_put_contents("com.txt","sn");
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"حسـننآ آلآن ارسل نص تريد نشرة ك منشور شفاف 🎁. #ملاحظه يمكنك استخدام الماركدوان ايضا",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🎺.","callback_data"=>"bk"]],
]])
]);
}
if($bot == "sn" and $text != "/start" and in_array($chat_id,$ad)){
file_put_contents("alh.txt","$text");
file_put_contents("com.txt","snn");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"حسننا الان استخدم🎄.
text = link
text = link + text = link
نص = رابط
نص = رابط + نص = رابط",
'reply_to_message_id'=>$message->message_id,
]);
}
$i=0;
$keyboard = [];
$keyboard["inline_keyboard"] = [];
$rows = explode("\n",$text);
foreach($rows as $row){
$j=0;
$keyboard["inline_keyboard"][$i]=[];
$bottons = explode("+",$row);
foreach($bottons as $botton){
$alsh = explode("=",$botton."=");
$Ibotton = ["text" => trim($alsh[0]), "url" => trim($alsh[1])];
$keyboard["inline_keyboard"][$i][$j] = $Ibotton;
$j++;                }                $i++;            }
$reply_markup=json_encode($keyboard);
if($bot == "snn" and $text != "/start" and in_array($chat_id,$ad)){
$ali = fopen( "Alsh.txt", 'r');
while(!feof( $ali)){
$alshh = fgets($ali);
bot('sendmessage',[
'chat_id'=>$alshh,
'text'=>$tx,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>($reply_markup)
]);
}
unlink("com.txt");
unlink("alh.txt");
}
if($data == "for" and in_array($chat_id2,$ad)){
file_put_contents("com.txt","fd");
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>" ارسل توجيهك الان عزيزي 📌.",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🎺.","callback_data"=>"bk"]],
]])
]);
}
if($bot == "fd" and $text != "/start" and in_array($chat_id,$ad)){
$ali = fopen( "Alsh.txt", 'r');
while(!feof( $ali)){
$ali2 = fgets($ali);
bot('forwardMessage',[
 'chat_id'=>$ali2,
 'from_chat_id'=>$chat_id,
 'message_id'=>$message->message_id,
 ]);
 unlink("com.txt");
 }
 }
 if($data == "med" and in_array($chat_id2,$ad)){
file_put_contents("com.txt","mide");
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"🔖| حسـننآ الان ارسل احد ميديا،
📌| مثلا : صور،فيديو،ملف،اغنيه،ملصق،ملف صوتي،",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"رجوع ،🎺.","callback_data"=>"bk"]],
]])
]);
}
#اذاعه ب ميديا
 if($message->video and $bot == "mide" and in_array($chat_id,$ad) and $text != "/start"){
 $ali = fopen( "Alsh.txt", 'r');
while(!feof( $ali)){
$aly = fgets($ali);
bot('sendvideo',['chat_id'=>$aly,'video'=>$message->video->file_id,'caption'=>$message->caption,'parse_mode'=>"MARKDOWN",'disable_web_page_preview'=>true,]);
bot('sendmessage',[ 
'chat_id'=>$chat_id, 'text'=>"تم نشر الفيديو '📚!",]); }unlink("com.txt"); }
if($message->document and $bot == "mide" and in_array($chat_id,$ad) and $text != "/start"){
$ali = fopen( "Alsh.txt", 'r');
while(!feof( $ali)){
$aly = fgets($ali);
bot('Senddocument',['chat_id'=>$aly,'document'=>$message->document->file_id,'caption'=>$message->caption,'parse_mode'=>"MARKDOWN",'disable_web_page_preview'=>true,
]);bot('sendmessage',[ 'chat_id'=>$chat_id, 'text'=>"تم نشر الملف او متحركه '🎻!", ]); } unlink("com.txt");}
 if($message->audio and $bot == "mide" and in_array($chat_id,$ad) and $text != "/start"){
 	$ali = fopen( "Alsh.txt", 'r');
while(!feof( $ali)){
$aly = fgets($ali);
 bot('sendaudio',[    'chat_id'=>$aly,    'audio'=>$message->audio->file_id,    'caption'=>$message->caption,'parse_mode'=>"MARKDOWN",'disable_web_page_preview'=>true,
 ]); bot('sendmessage',[ 'chat_id'=>$chat_id, 'text'=>"تم نشر الاغنيه '🎺!", ]); } unlink("com.txt");}
if($message->photo and $bot == "mide" and in_array($chat_id,$ad) and $text != "/start"){
	$ali = fopen( "Alsh.txt", 'r');
while(!feof( $ali)){
$aly = fgets($ali);
    bot('sendPhoto',[      'chat_id'=>$aly,      'photo'=>$message->photo[0]->file_id,      'caption'=>$message->caption,      'parse_mode'=>"MARKDOWN",'disable_web_page_preview'=>true,
    ]);bot('sendmessage',[ 'chat_id'=>$chat_id, 'text'=>"تم نشر الصورة '📇!", ]); } unlink("com.txt");}
if($message->voice and $bot == "mide" and in_array($chat_id,$ad) and $text != "/start"){
	$ali = fopen( "Alsh.txt", 'r');
while(!feof( $ali)){
$aly = fgets($ali);
    bot('sendvoice',[     'chat_id'=>$aly,      'voice'=>$message->voice->file_id,     'caption'=>$message->caption,'parse_mode'=>"MARKDOWN",'disable_web_page_preview'=>true,
      ]);      bot('sendmessage',[ 'chat_id'=>$chat_id, 'text'=>"تم نشر الاغنيه '📜!", ]); } unlink("com.txt");}
      if($message->sticker and $bot == "mide" and in_array($chat_id,$ad) and $text != "/start"){
      	$ali = fopen( "Alsh.txt", 'r');
while(!feof( $ali)){
$aly = fgets($ali);
bot('sendsticker',['chat_id'=>$aly,'sticker'=>$message->sticker->file_id
]);bot('sendmessage',['chat_id'=>$chat_id, 'text'=>"تم نشر الملصق '📂!", ]); }unlink("com.txt"); }