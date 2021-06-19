#include <WiFi.h>
#include <HTTPClient.h>
const char *ssid = "VIETTEL";
const char *password = "23456789";

void setup(){

   delay(1000);
   Serial.begin(115200);
   WiFi.mode(WIFI_OFF);
   delay(1000);
   WiFi.mode(WIFI_STA);

   WiFi.begin(ssid,password);
   Serial.println("");

   Serial.print("Connecting");
   //cho ket noi wifi
   while(WiFi.status() != WL_CONNECTED){
      delay(500);
      Serial.print("...");
   }

   Serial.println("");
   Serial.print("Connected to");
   Serial.println(ssid);
   Serial.print("IP address: ");
   Serial.println(WiFi.localIP());
}

void loop(){

   if(Serial.available()){

     int a = Serial.parseInt();
     if(a>0){
      send_data();
     }
   }
}

void send_data(){

  int volt, ampe, temp, humd;
  volt = random(0,12);
  ampe = random(0,3);
  temp = random(0,50);
  humd = random(50,95);

  String postData = (String)"volt=" + volt + "&ampe=" + ampe + "&temp=" + temp + "&humd=" + humd;

  HTTPClient http;
  http.begin("https://dangbxiot.000webhostapp.com/demoESP32/api.php");
  http.addHeader("Content-Type","application/x-www-form-urlencoded");

  auto httpCode = http.POST(postData);
  String payload = http.getString();

  Serial.println(postData);
  Serial.println(payload);

  http.end();
}
