import urllib2, urllib
myFile = open("/Users/mac/Desktop/arduino.txt")
data = [(line.strip()) for line in myFile]
myFile.close()
#print data

mydata = [('one', data),('session',2)] #The first is the var name the second is the value
mydata=urllib.urlencode(mydata)
path='http://134.126.64.244/tricam.php'    #the url you want to POST to
req=urllib2.Request(path, mydata)
req.add_header("Content-type", "application/x-www-form-urlencoded")
page=urllib2.urlopen(req).read()
print page


