#include <WiFi.h>
#include <HTTPClient.h>
#include <WiFiMulti.h>
#include <WiFiClient.h>
WiFiMulti wiFiMulti;

//int dv, chuc, tram, nghin, chucnghin;
//int s;
//String data;

const int pind0 = 16;
const int pind1 = 5;
const int pind2 = 4;
const int pind3 = 0;
const int pind4 = 2;
const int pind5 = 14;
const int pind6 = 12;
const int pind7 = 13;

void setup() {
  //cai dat che do GPIO
  pinMode(pind0,OUTPUT);
  pinMode(pind1,OUTPUT);
  pinMode(pind2,OUTPUT);
  pinMode(pind3,OUTPUT);
  pinMode(pind4,OUTPUT);
  pinMode(pind5,OUTPUT);
  pinMode(pind6,OUTPUT);
  pinMode(pind7,OUTPUT);
  // put your setup code here, to run once:
  Serial.begin(115200);
  delay(10);
//====================================================
  for(uint8_t t=4;t>0;t--){
    Serial.printf("[SETUP] WAIT %d...\n",t);
    Serial.flush();
    delay(1000);
  }

  WiFi.mode(WIFI_STA);
  wiFiMulti.addAP("VIETTEL","23456789");
}

void loop() {
  int t1,t2,t3,g1,g2,g3,h1,h2,h3,h4,h5,h6,hour,mi,sec;
  //cho ket noi
  if((wiFiMulti.run() == WL_CONNECTED)){
    WiFiClient client;//client
    HTTPClient http;
    Serial.print("[HTTP] begin...\n");
    

    if(http.begin(client, "https://dangbxiot.000webhostapp.com/myserver/sendata.php")){
      Serial.print("[HTTP] GET...\n");
      //bat dau ket noi va gui header
      int httpCode = http.GET();
      // httpCode will be negative on error
      if(httpCode > 0){
        //HTTP header has been send and Server responese header has been handled
        Serial.printf("[HTTP] GET... code: %d\n", httpCode);
        //file found at server
        if(httpCode == HTTP_CODE_OK || httpCode == HTTP_CODE_MOVED_PERMANENTLY){
          String str = http.getString();
          Serial.println(str);
          int I00 =str[str.indexOf("I00")+6]-'0';
          int I01 =str[str.indexOf("I01")+6]-'0';
          int I02 =str[str.indexOf("I02")+6]-'0';
          int I03 =str[str.indexOf("I03")+6]-'0';
          int I04 =str[str.indexOf("I04")+6]-'0';
          int I05 =str[str.indexOf("I05")+6]-'0';
          int I06 =str[str.indexOf("I06")+6]-'0';
          int I07 =str[str.indexOf("I07")+6]-'0';
         
          int I10 =str[str.indexOf("I10")+6]-'0';
          int I11 =str[str.indexOf("I11")+6]-'0';
          int I12 =str[str.indexOf("I12")+6]-'0';
          int I13 =str[str.indexOf("I13")+6]-'0';
          int I14 =str[str.indexOf("I14")+6]-'0';
          int I15 =str[str.indexOf("I15")+6]-'0';
          int I16 =str[str.indexOf("I16")+6]-'0';
          int I17 =str[str.indexOf("I17")+6]-'0';

          int directions =str[str.indexOf("direction")+12]-'0';  
          //nhiet do t1
          int dv =str[str.indexOf("t1")+7]-'0'; int chuc =str[str.indexOf("t1")+6]-'0'; int tram =str[str.indexOf("t1")+5]-'0'; 
          if(dv>=0 && dv<=9){t1= tram * 100 + chuc * 10 + dv;} else if(chuc>=0 && chuc<=9){ t1 = tram * 10 + chuc;} else{ t1 = tram; }
          //nhiet do t2
          dv =str[str.indexOf("t2")+7]-'0'; chuc =str[str.indexOf("t2")+6]-'0'; chuc =str[str.indexOf("t2")+5]-'0'; 
          if(dv>=0 && dv<=9){t2= tram * 100 + chuc * 10 + dv;} else if(chuc>=0 && chuc<=9){ t2 = tram * 10 + chuc;} else{ t2 = tram; }
          //nhiet do t3
          dv =str[str.indexOf("t3")+7]-'0'; chuc =str[str.indexOf("t3")+6]-'0'; chuc =str[str.indexOf("t3")+5]-'0'; 
          if(dv>=0 && dv<=9){t3= tram * 100 + chuc * 10 + dv;} else if(chuc>=0 && chuc<=9){ t3 = tram * 10 + chuc;} else{ t3 = tram; }
          //Cuong do g1
          dv =str[str.indexOf("g1")+7]-'0'; chuc =str[str.indexOf("g1")+6]-'0'; chuc =str[str.indexOf("g1")+5]-'0'; 
          if(dv>=0 && dv<=9){g1= tram * 100 + chuc * 10 + dv;} else if(chuc>=0 && chuc<=9){ g1 = tram * 10 + chuc;} else{ g1 = tram; }
          //Cuong do g2
          dv =str[str.indexOf("g2")+7]-'0'; chuc =str[str.indexOf("g2")+6]-'0'; chuc =str[str.indexOf("g2")+5]-'0'; 
          if(dv>=0 && dv<=9){g2= tram * 100 + chuc * 10 + dv;} else if(chuc>=0 && chuc<=9){ g2 = tram * 10 + chuc;} else{ g2 = tram; }
          //Cuong do g3
          dv =str[str.indexOf("g3")+7]-'0'; chuc =str[str.indexOf("g3")+6]-'0'; chuc =str[str.indexOf("g3")+5]-'0'; 
          if(dv>=0 && dv<=9){g3= tram * 100 + chuc * 10 + dv;} else if(chuc>=0 && chuc<=9){ g3 = tram * 10 + chuc;} else{ g3 = tram; }
          //do am h1
          dv =str[str.indexOf("h1")+7]-'0'; chuc =str[str.indexOf("h1")+6]-'0'; chuc =str[str.indexOf("h1")+5]-'0'; 
          if(dv>=0 && dv<=9){h1= tram * 100 + chuc * 10 + dv;} else if(chuc>=0 && chuc<=9){ h1 = tram * 10 + chuc;} else{ h1 = tram; }
          //do am h2
          dv =str[str.indexOf("h2")+7]-'0'; chuc =str[str.indexOf("h2")+6]-'0'; chuc =str[str.indexOf("h2")+5]-'0'; 
          if(dv>=0 && dv<=9){h2= tram * 100 + chuc * 10 + dv;} else if(chuc>=0 && chuc<=9){ h2 = tram * 10 + chuc;} else{ h2 = tram; }
          //do am h3
          dv =str[str.indexOf("h3")+7]-'0'; chuc =str[str.indexOf("h3")+6]-'0'; chuc =str[str.indexOf("h3")+5]-'0'; 
          if(dv>=0 && dv<=9){h3= tram * 100 + chuc * 10 + dv;} else if(chuc>=0 && chuc<=9){ h3 = tram * 10 + chuc;} else{ h3 = tram; }
          //do am h4
          dv =str[str.indexOf("h4")+7]-'0'; chuc =str[str.indexOf("h4")+6]-'0'; chuc =str[str.indexOf("h4")+5]-'0'; 
          if(dv>=0 && dv<=9){h4= tram * 100 + chuc * 10 + dv;} else if(chuc>=0 && chuc<=9){ h4 = tram * 10 + chuc;} else{ h4 = tram; }
          //do am h5
          dv =str[str.indexOf("h5")+7]-'0'; chuc =str[str.indexOf("h5")+6]-'0'; chuc =str[str.indexOf("h5")+5]-'0'; 
          if(dv>=0 && dv<=9){h5= tram * 100 + chuc * 10 + dv;} else if(chuc>=0 && chuc<=9){ h5 = tram * 10 + chuc;} else{ h5 = tram; }
          //do am h6
          dv =str[str.indexOf("h6")+7]-'0'; chuc =str[str.indexOf("h6")+6]-'0'; chuc =str[str.indexOf("h6")+5]-'0'; 
          if(dv>=0 && dv<=9){h6= tram * 100 + chuc * 10 + dv;} else if(chuc>=0 && chuc<=9){ h6 = tram * 10 + chuc;} else{ h6 = tram; }
          //hour
          dv =str[str.indexOf("hour")+9]-'0'; chuc =str[str.indexOf("hour")+8]-'0'; chuc =str[str.indexOf("hour")+7]-'0'; 
          if(dv>=0 && dv<=9){hour= tram * 100 + chuc * 10 + dv;} else if(chuc>=0 && chuc<=9){ hour = tram * 10 + chuc;} else{ hour = tram; }
          //min
          dv =str[str.indexOf("mi")+7]-'0'; chuc =str[str.indexOf("mi")+6]-'0'; chuc =str[str.indexOf("mi")+5]-'0'; 
          if(dv>=0 && dv<=9){mi= tram * 100 + chuc * 10 + dv;} else if(chuc>=0 && chuc<=9){ mi = tram * 10 + chuc;} else{ mi = tram; }
          //sec
          dv =str[str.indexOf("sec")+8]-'0'; chuc =str[str.indexOf("sec")+7]-'0'; chuc =str[str.indexOf("sec")+6]-'0'; 
          if(dv>=0 && dv<=9){sec= tram * 100 + chuc * 10 + dv;} else if(chuc>=0 && chuc<=9){ sec = tram * 10 + chuc;} else{ sec = tram; }
        }
      }else{
        Serial.printf("[HTTP] GET... failed,eror %s\n",http.errorToString(httpCode).c_str());
      }
      http.end();
    }else{
      Serial.printf("[HTTP] Unable to connect\n");
    }
  }
  delay(1);
}
