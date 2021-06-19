#include<WiFi.h>
#include<HTTPClient.h>
#include<Arduino_JSON.h>

const char* ssid = "VIETTEL";
const char* password = "23456789";
const char* serverName = "https://dangbxiot.000webhostapp.com/loaptrung/action.php?action=outputs_state&board=1";
const long interval = 1000;
unsigned long previousMillis = 0;
String outputsState;
void setup() {
  // put your setup code here, to run once:
  Serial.begin(115200);
  WiFi.begin(ssid,password);
  Serial.println("Connecting");
  while(WiFi.status()!= WL_CONNECTED){
    delay(5000);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to wifi network with IP Address: ");
  Serial.println(WiFi.localIP());
}

void loop() {
  // put your main code here, to run repeatedly:
    unsigned long currentMillis = millis();
    if(currentMillis - previousMillis >= interval){
      if(WiFi.status()== WL_CONNECTED){
        outputsState = httpGETRequest(serverName);
        Serial.println(outputsState);
        JSONVar myObject = JSON.parse(outputsState);
        
        if(JSON.typeof(myObject)== "undefined"){
          Serial.println("Parsing input failed!");
          return;
        }
        Serial.print("JSON Object = ");
        Serial.println(myObject);
        JSONVar keys = myObject.keys();
  
        for(int i=0;i < keys.length();i++){
          JSONVar value = myObject[keys[i]];
          Serial.print("GPIO: ");
          Serial.print(keys[i]);
          Serial.print(" - SET to: ");
          Serial.println(value);
          pinMode(atoi(keys[i]),OUTPUT);
          digitalWrite(atoi(keys[i]),atoi(value));
        }
        previousMillis = currentMillis;
    }
    else{
      Serial.println("WiFi Disconnected!");
    }
  }
}

String httpGETRequest(const char* serverName){
  HTTPClient http;
  http.begin(serverName);
  int httpResponseCode = http.GET();
  String payload = "{}";

  if(httpResponseCode > 0){
    Serial.print("HTTP Response code: ");
    Serial.println(httpResponseCode);
    payload = http.getString();
  }
  else{
    Serial.print("Erorr code: ");
    Serial.println(httpResponseCode);
  }
  http.end();
  return payload;
}
