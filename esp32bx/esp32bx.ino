#include <WiFi.h>
#include <WebServer.h>
WebServer webServer(80);
char* ssid = "VIETTEL";
char* pass = "23456789";
//=========Biến chứa mã HTLM Website==//
const char MainPage[] PROGMEM = R"=====(
  <!DOCTYPE html> 
  <html>
   <head> 
       <title>HOME PAGE</title> 
       <style> 
          body {text-align:center;}
          h1 {color:#003399;}
          a {text-decoration: none;color:#FFFFFF;}
          .bt_on {height:50px; width:100px; margin:10px 0;background-color:#FF6600;border-radius:5px;}
          .bt_off {height:50px; width:100px; margin:10px 0;background-color:#00FF00;border-radius:5px;}
       </style>
       <meta charset="UTF-8">
   </head>
   <body> 
      <h1>ESP8266 Web Server</h1> 
      <div>Trạng thái trên chân D13: <b><pan id="trangthaiD13"><pan></b></div>
      <div>
        <button class="bt_on" onclick="getdata('onD13')">ON</button>
        <button class="bt_off" onclick="getdata('offD13')">OFF</button>
      </div>
      <div>Trạng thái trên chân D23: <b><pan id="trangthaiD23"><pan></b></div>
      <div>
        <button class="bt_on" onclick="getdata('onD23')">ON</button>
        <button class="bt_off" onclick="getdata('offD23')">OFF</button>
      </div>
      <div id="reponsetext"></div>
      <script>
        //-----------Tạo đối tượng request----------------
        var xhttp = new XMLHttpRequest();
        //-----------Thiết lập dữ liệu và gửi request-------
        function getdata(url){
          xhttp.open("GET","/"+url,true);
          xhttp.send();
        }
         //------------Kiểm tra trạng thái chân D13 D23------
        function getstatusD13D23(){
          xhttp.open("GET","getstatusD13D23",true);
          xhttp.send();
        }
        //-----------Kiểm tra response-------------------------------
        function process_json(){
          if(xhttp.readyState == 4 && xhttp.status == 200){
            //------Update data sử dụng javascript-------------------
            var trangthaiD13D23_JSON = xhttp.responseText;
            var Obj = JSON.parse(trangthaiD13D23_JSON);
            document.getElementById("trangthaiD13").innerHTML = Obj.D13;
            document.getElementById("trangthaiD23").innerHTML = Obj.D23;
          }
        }
        //---Ham update duu lieu tu dong---
        setInterval(function() {
          getstatusD13D23();
        }, 1000);
      </script>
   </body> 
  </html>
)=====";
//=========================================//
void setup() {
  pinMode(13,OUTPUT);
  pinMode(23,OUTPUT);
  digitalWrite(13,HIGH);
  digitalWrite(23,HIGH);
  WiFi.begin(ssid,pass);
  Serial.begin(115200);
  Serial.print("Connecting");
  while(WiFi.status()!=WL_CONNECTED){
    delay(500);
    Serial.print("...");
  }
  Serial.println(WiFi.localIP());

  webServer.on("/",mainpage);
  webServer.on("/onD13",on_D13);
  webServer.on("/offD13",off_D13);
  webServer.on("/onD23",on_D23);
  webServer.on("/offD23",off_D23);
  webServer.on("/getstatusD13D23",get_statusD13D23);
  webServer.begin();
}
void loop() {
  webServer.handleClient();
}
//==========Chương trình con=================//
void mainpage(){
  String s = FPSTR(MainPage);
  webServer.send(200,"text/html",s);
}
void on_D13(){
  digitalWrite(13,LOW);
  webServer.send(200,"text/html","CHÂN D13 ĐÃ ON");
}
void off_D13(){
  digitalWrite(13,HIGH);
  webServer.send(200,"text/html","CHÂN D13 ĐÃ OFF");
}
void on_D23(){
  digitalWrite(23,LOW);
  webServer.send(200,"text/html","CHÂN D23 ĐÃ ON");
}
void off_D23(){
  digitalWrite(23,HIGH);
  webServer.send(200,"text/html","CHÂN D23 ĐÃ OFF");
}
void get_statusD13D23(){
  String d13,d23;
  if(digitalRead(13)==1){
    d13 = "OFF";
  }else{
    d13 = "ON";
  }
  if(digitalRead(23)==1){
    d23 = "OFF";
  }else{
    d23 = "ON";
  }
  String s = "{\"D13\": \""+ d13 +"\",\"D23\": \""+ d23 +"\"}";
  webServer.send(200,"application/json",s);
}
