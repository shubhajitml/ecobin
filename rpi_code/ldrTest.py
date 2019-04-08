import RPi.GPIO as GPIO


GPIO.setmode(GPIO.BCM)
GPIO.setup(4,GPIO.IN)

while 1:
	try:
		print GPIO.input(4),"\n"
	except:
		print "Exception..."
		break;
