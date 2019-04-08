import RPi.GPIO as gpio
import time

gpio.setmode(gpio.BCM)
gpio.setup(20,gpio.OUT)

while 1:
	try:
		gpio.output(20,gpio.HIGH)
		time.sleep(1)
		gpio.output(20,gpio.LOW)
		time.sleep(1)
	except:
		break

gpio.cleanup()
