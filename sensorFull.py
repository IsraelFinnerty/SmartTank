from wia import Wia
import time
import urllib2
import  json
import random

WRITE_API_KEY='RDS0MO035L0O5TPJ'

baseURL='https://api.thingspeak.com/update?api_key=%s' % WRITE_API_KEY

wia = Wia()
wia.access_token = "d_sk_2tJSSWfq3Z8NNjshmpSRLvfO"

def writeData(oil):
    # Sending the data to thingspeak in the query string
    conn = urllib2.urlopen(baseURL + '&field1=%s' % (oil))
    print(conn.read())
    # Closing the connection
    conn.close()

while True:
  oil=99
  writeData(oil)  
  wia.Event.publish(name="tank level", data=oil)
  time.sleep(60)