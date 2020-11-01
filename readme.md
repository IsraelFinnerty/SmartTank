# SmartTank IoT Project

Never run out of oil again! Smart Tank takes accurate readings from your oil tank and relays them directly to your dashboard on our website. SmartTank will notify by email and Twitter when your oil is running low. You will be prompted to request oil refill quotes from your local oil providers via your dashboard. 
If you have smart heating technology Smart Tank will also disable your heating until your tank has adequate levels of heating oil avoiding air locks and avoiding the need to bleed the boiler. 
Smart Tank can be retro fitted to any existing oil tank or added to the factory design of new oil tanks.
“Smart Tank – taking the stress out of oil heating”

The prototype will be installed in the cap of the oil tank and use an ultrasonic sensor connected to the Raspberry Pi to measure the levels of oil in the tank. Home heating oil tanks are within close proximity to the dwelling therefore the prototyped device can utilise the home wifi , 802.11,to deliver readings to the IoT platform and the end user. The end user will be able to monitor the levels of oil in the tank. The device will also connect to other smart home devices such as smart thermostat to disable the heating system if there is insufficient oil in the tank preventing air locks. 
When oil is running low the user will be asked if they would like to receive quotes on refills or part refills from local oil distributors. The user is prompted to request these quotes via their dashboard, which displays their local oil providers from a Cloud Based SQL Server. When the form is submitted the website uses PHP to get the email addresses of the local oil providers  and sends them an email with the user details requesting a quote based on the users demand.


## Getting Started

Download all resources from GitHub Repo. Connect the RCWL - 1601 or HC-SR04 to the Raspberry Pi as in the presentation slides. If using the HC-SR04 Sensor connect with Breadboard and Resistors (330? & 470?) as shown. Ensure the Raspberry Pi is connected to the home 802.11 WiFi router. Affix the sensor and connected Pi to the inside of the oil tank fuel cap. Ensure that the sensor is positioned to pointed down toward the bottom of the tank. Secure by soldering or taping the devices to the inside of the oil cap. Replace the oil cap back onto your heating tank.

### Prerequisites

RCWL - 1601 or HC-SR04 Sensor with Breadboard and Resistors (330? & 470?)
Raspberry Pi with 802.11 or ESP-8266 Microcontroller with 802.11
802.11 Wifi Router
Internet access
Smart Thermostat installed (optional)

### Installation & Deployment

Install your sensor scripting file onto your Pi (This prototype version uses simulated sensor readings using python scripts to write to ThingSpeak – sensorRand.py for random sensor readings, sensorLow.py for a near empty tank, sensorFull to simulate a tank refill).

Configure ThingSpeak with Reacts – ThingHTTP to turn off users smart Thermostat when oil is low – ThingTweet to notify user via Twitter of low oil levels – ThingHTTP to send a POST to an IFTTT webbook set up to notify user by email of low oil levels and prompt them to order oil request via dashboard on the website.

Set up remote SQL database and ensure website PHP code points makes requests from the connected DB.


## Built With

* Visual Studio Code
* Sublime Text
* Vagrant VM
* Putty SSH
* cPanel
* MySQL WorkBench
* ThingSpeak IoT Platform
* IFTTT Webhooks


## Versioning

SmartTank Version 1.0

## Author

* **Israel Finnerty** (https://github.com/IsraelFinnerty)



