import RPi.GPIO as GPIO
import time
import os
import LCD


GPIO.setmode(GPIO.BCM)
myLcd=LCD.lcd()

ldr   = 4
TRIG1 = 22
ECHO1 = 23

TRIG2 = 17
ECHO2 = 18

TRIG3 = 9
ECHO3 = 25

TRIG4 = 11
ECHO4 = 8

print "Distance Measurement In Progress"

GPIO.setup(TRIG1,GPIO.OUT)
GPIO.setup(ECHO1,GPIO.IN)

GPIO.setup(TRIG2,GPIO.OUT)
GPIO.setup(ECHO2,GPIO.IN)

GPIO.setup(TRIG3,GPIO.OUT)
GPIO.setup(ECHO3,GPIO.IN)

GPIO.setup(TRIG4,GPIO.OUT)
GPIO.setup(ECHO4,GPIO.IN)

GPIO.setup(ldr,GPIO.IN)

def calculateDistance(TRIG,ECHO):
	GPIO.output(TRIG, False)

	GPIO.output(TRIG, True)
	time.sleep(0.00001)
	GPIO.output(TRIG, False)

	pulse_start = time.time()
	while GPIO.input(ECHO)==0:
		pulse_start = time.time()

	pulse_end = time.time()
	while GPIO.input(ECHO)==1:
		pulse_end = time.time()

	pulse_duration = pulse_end - pulse_start

	distance = pulse_duration * 17150

	distance = round(distance, 2)

	#print "Distance:",distance,"cm"

	binStat=round(100-(((distance-3)/9)*100),2)
	if(binStat>100):
		binStat=100
	if(binStat<5):
		binStat=0	

	return distance,binStat

while 1:
	try:
#		print "Waiting For Sensor To Settle"
				
		distance1,bin1 = calculateDistance(TRIG1,ECHO1)
		distance2,bin2 = calculateDistance(TRIG2,ECHO2)
		distance3,bin3 = calculateDistance(TRIG3,ECHO3)
		distance4,bin4 = calculateDistance(TRIG4,ECHO4) 

		ldrStat = GPIO.input(ldr)
		print ldrStat,"\n"

		if(ldrStat == 0):
			bin1=0.00
		print distance1," ",bin1,"% -- ",distance2," ",bin2,"% --  ",distance3," ",bin3,"% -- ",distance4," ",bin4,"%"
		url1 = 'curl "http://192.168.43.100/ecobin/sensor_data.php?bin_code=OD004&is_bin_present='+str(ldrStat)+'&bin_level='+str(bin1)+'&latitude=20.3040&longitude=85.8397"'		
		url2 = 'curl "http://192.168.43.100/ecobin/sensor_data.php?bin_code=OD007&is_bin_present=1&bin_level='+str(bin2)+'&latitude=20.2804&longitude=85.8499"'
		url3 = 'curl "http://192.168.43.100/ecobin/sensor_data.php?bin_code=OD012&is_bin_present=1&bin_level='+str(bin3)+'&latitude=20.2899&longitude=85.8102"'
		url4 = 'curl "http://192.168.43.100/ecobin/sensor_data.php?bin_code=OD013&is_bin_present=1&bin_level='+str(bin4)+'&latitude=20.2990&longitude=85.8173"'
#		url1='"Hello"'+str(671)
#		print url1
		os.system(url1)
		os.system(url2)
		os.system(url3)
		os.system(url4)
		myLcd.lcd_display_string("1:"+str(bin1)+"%   ",1,0)
		myLcd.lcd_display_string("2:"+str(bin2)+"%   ",1,8)
		myLcd.lcd_display_string("3:"+str(bin3)+"%   ",2,0)
		myLcd.lcd_display_string("4:"+str(bin4)+"%   ",2,8)
		time.sleep(1)

	except :
		print("EXception...")
		#print e
		break;
GPIO.cleanup()
