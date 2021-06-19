#include <WiFi.h>
#include <HTTPClient.h>
#include "DHT.h"
#define DHTPIN 15
#define DHTTYPE DHT11
DHT dht(DHTPIN, DHTTYPE);

int a=1;
const char *ssid = "VIETTEL";  
const char *password = "23456789";

float h, t;
void setup(){
  delay(1000);
  Serial.begin(115200);
  WiFi.mode(WIFI_OFF);
  delay(1000);
  WiFi.mode(WIFI_STA);

  WiFi.begin(ssid, password);
  Serial.println("");

  Serial.print("Connecting");
  // Wait for connection
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.print("Connected to: ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());  
  dht.begin();
}

void loop() {

  if (Serial.available()) {
    delay(1000);
    a++;

    if (a > 0) {
      read_dht();
      send_data();
    }
  }

}

void read_dht() {
  h = dht.readHumidity();
  t = dht.readTemperature();

  // Check if any reads failed and exit early (to try again).
  if (isnan(h) || isnan(t)) {
    Serial.println(F("Failed to read from DHT sensor!"));
    return;
  }
  Serial.print(F("Humidity: "));
  Serial.print(h);
  Serial.print(F("%  Temperature: "));
  Serial.print(t);
  Serial.println(F("°C "));
}
void send_data(){
  float temp, humd;
  temp = t;
  humd = h;

  String postData = (String)"temp=" + temp + "&humd=" + humd;

  HTTPClient http;
  http.begin("https://dangbxiot.000webhostapp.com/loaptrung/api.php");
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");

  auto httpCode = http.POST(postData);
  String payload = http.getString();

  Serial.println(postData);
  Serial.println(payload);

  http.end();
}
