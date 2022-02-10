#ifdef ESP32
  #include <WiFi.h>
  #include <HTTPClient.h>
#else
  #include <ESP8266WiFi.h>
  #include <ESP8266HTTPClient.h>
  #include <WiFiClient.h>
#endif


const char* ssid     = "VIETTEL";           //Tên WIFI truy cập
const char* password = "01693356824";       //Mật khẩu WIFI


const char* host = "mucnuocsong.000webhostapp.com/esp_data.php";      //Khi thiết bị kích hoạt, dữ liệu sẽ được gửi lên URL này bằng giao thức HTTP GET

String apiKeyValue = "kjsjkhjdhfd";         //Dùng để xác thực khi GET

String sensorName = "W-Track-01";      //Tên thiết bị gửi kèm trong gói tin
String sensorLocation = "Area-01";     //Tên khu vực thiết bị được đặt

//Cấu hình các chân nối trên mạch ESP
#define TRIGGERPIN D1
#define ECHOPIN    D2
#define BUZZPIN    D3

void setup() {
   
  Serial.begin(115200);
  
  pinMode(TRIGGERPIN, OUTPUT);
  pinMode(ECHOPIN, INPUT);
  pinMode(BUZZPIN, OUTPUT);
  
  WiFi.begin(ssid, password);
  Serial.println("Connecting");

  //Kết nối WIFI
  while(WiFi.status() != WL_CONNECTED) { 
    digitalWrite(2, LOW);
    delay(250);
    Serial.print(".");
    digitalWrite(2, HIGH); 
    delay(250);
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());

}
//Hàm tính toán mực nước
long runSensor()
{
  long duration, distance, level;
  digitalWrite(TRIGGERPIN, LOW);  
  delayMicroseconds(3); 
  
  digitalWrite(TRIGGERPIN, HIGH);
  delayMicroseconds(12); 
  
  digitalWrite(TRIGGERPIN, LOW);
  duration = pulseIn(ECHOPIN, HIGH);
  distance = (duration/2) / 29.1;
  

  if (isnan(distance)) {
    Serial.println("Failed to read from sensor!");
    return -1;
  }
  level = 300 - distance; //Số 300 có thể thay đổi tuỳ vào đặc điểm khu vực thiết bị lắp đặt. Tối đa là 400.
  
  Serial.print(level);
  Serial.println("Cm");
  
  if(level > 50)  {
    alert();  //Kích hoạt còi hú
  }
  return level;
}
//Hàm kích hoạt còi hú
void alert()
{
  digitalWrite(BUZZPIN, HIGH);
  delay(10000);
  digitalWrite(BUZZPIN, LOW);
}

void loop() {
  //Check WiFi connection status
  if(WiFi.status()== WL_CONNECTED){
    
    HTTPClient http;
    
     long waterLevel = runSensor();
    // Your Domain name with URL path or IP address with path
    
    // Specify content-type header
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");
    
    // Prepare your HTTP GET request data
    String httpRequestData = "http://mucnuocsong.000webhostapp.com/esp_data.php?api_key=" + apiKeyValue + "&sensor=" + sensorName
                          + "&location=" + sensorLocation + "&value=" +waterLevel
                          +"";
    Serial.print("httpRequestData: ");
    Serial.println(httpRequestData);
    
    // Send HTTP GET request

    http.begin(httpRequestData);
    int httpResponseCode = http.GET();

     String payload = http.getString(); 
        
    if (httpResponseCode>0) {
      Serial.print("HTTP Response code: ");
      Serial.println(httpResponseCode);
      Serial.println(payload);  
    }
    else {
      Serial.print("Error code: ");
      Serial.println(httpResponseCode);
    }
    // Free resources
    http.end();
//Send an HTTP GET request every 3600 seconds
    delay(1*3600*1000); 
  }
  else {
    Serial.println("WiFi Disconnected");
    digitalWrite(2, LOW);
    delay(250);
    Serial.print(".");
    digitalWrite(2, HIGH); 
    delay(250);
  }
  
   
}
