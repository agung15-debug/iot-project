#include <SPI.h>
#include <MFRC522.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#define RST_PIN D1
#define SDA_PIN D2
#define BUZZER_PIN D0
#define GREEN_PIN D3
#define YELLOW_PIN D4

const char* ssid     = "CAAAACRprNwADwEtRedmi 4A";
const char* password = "Yogi1551";

MFRC522 mfrc522(SDA_PIN, RST_PIN);
WiFiClient client;

void setup() {
  // put your setup code here, to run once:
  Serial.begin(9600);
  pinMode(BUZZER_PIN, OUTPUT);
  pinMode(GREEN_PIN, OUTPUT);
  pinMode(YELLOW_PIN, OUTPUT);
  SPI.begin();
  mfrc522.PCD_Init();
  WiFi.begin(ssid, password);
  
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    digitalWrite(YELLOjW_PIN, HIGH);
    Serial.print("Connecting....");
  }
  digitalWrite(YELLOW_PIN, LOW);
  delay(500);
  digitalWrite(GREEN_PIN, HIGH);
  Serial.print("Use this URL to connect: ");
  Serial.print("http://");
  Serial.print(WiFi.localIP());
  Serial.println("");
}

void loop() {
  HTTPClient http;
  String url = "http://192.168.144.17/iot-project/get_mode.php";
  http.begin(client, url);
  int httpResponseCode = http.GET();
  delay(100);
   if(!mfrc522.PICC_IsNewCardPresent())
    {
      return;
    }
    if(!mfrc522.PICC_ReadCardSerial())
    {
      return;
    }
    Serial.println();
    Serial.print(" UID tag :");
    String content = "";
    byte letter;
    for (byte i = 0; i < mfrc522.uid.size; i++)
    {
      Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? "0" : "");
      Serial.print(mfrc522.uid.uidByte[i], HEX);
      content.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? "0" : ""));
      content.concat(String(mfrc522.uid.uidByte[i], HEX));
    }
    content.toUpperCase();
    Serial.println();
  if (httpResponseCode > 0) {
    String response = http.getString();
    Serial.print(response);
    if(response == "read"){
      sendAttendance(content);
    } else {
      kirim(content);
    }
  }
  else {
    Serial.print("Error on sending POST: ");
    Serial.println(httpResponseCode);
  }
  http.end();    
  delay(3000);
}

void sendUID(String url, String content){
  HTTPClient http;
  http.begin(client, url);
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  int httpResponseCode = http.POST("uid=" + content);
  delay(100);
  if (httpResponseCode > 0) {
    String response = http.getString();
    Serial.print(response);
    if(response == "Data berhasil disimpan"){
    digitalWrite(BUZZER_PIN, HIGH);
    delay(500);
    digitalWrite(BUZZER_PIN, LOW);
  }
  } else {
    Serial.print("Error on sending POST: ");
    Serial.println(httpResponseCode);
  }
  http.end();
}

void sendAttendance(String content){
  String url = "http://192.168.144.17/iot-project/entry-att.php";
  sendUID(url, content);
}

void kirim(String content){
  String url = "http://192.168.144.17/iot-project/rest.php";
  sendUID(url, content);
}
