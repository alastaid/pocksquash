import datetime
import smtplib
import os
from email.mime.text import MIMEText
import urllib
import urllib2
from HTMLParser import HTMLParser

class my_opener (urllib.FancyURLopener):
  version = 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0)'
  def get_user_passwd(self, host, realm, clear_cache=0):
    return ('xxxx', 'xxxx')

try:
  url = 'http://192.168.2.1/s_status.htm'
  opener = my_opener()
  response = opener.open (url)
  content = response.read()

except IOError:
  print "Failed"

class MyHTMLParser(HTMLParser):
  def handle_data(self, tag):
    stringarr.append(tag)

timestr = str(datetime.datetime.now())
runningstat = open('/home/pi/Hourlystat.txt','w')
runningstat.write('HourlyChecking invoked at: '+timestr)
runningstat.close()
stringarr = []
parser = MyHTMLParser()
parser.feed(content)
rtrflrdr = open('/home/pi/rtripaddr.txt','r')
oldipaddr = rtrflrdr.read()
rtrflrdr.close()
if oldipaddr.strip() <> stringarr[59]:
  USERNAME = 'xxxx@xxxx'
  PASSWORD = 'xxxx'
  MAILTO_Dad = 'xxxx@xxxxx'

  msg = MIMEText('IP Address Change: '+stringarr[59]+'\nLink to new reg keys is http://'+stringarr[59]+'/NIS1/index.html' )
  msg['Subject'] = 'IP Address Change' 
  msg['From'] = USERNAME
#    msg['To'] = MAILTO_Matts

  server = smtplib.SMTP('smtp.gmail.com:587')
  server.ehlo_or_helo_if_needed()
  server.starttls()
  server.ehlo_or_helo_if_needed()
  server.login(USERNAME,PASSWORD)
#    server.sendmail(USERNAME, MAILTO_Matts, msg.as_string())
  msg['To'] = MAILTO_Dad
  server.sendmail(USERNAME, MAILTO_Dad, msg.as_string())
  server.quit()
  flrdr = open('/home/pi/rtripaddr.txt','w')
  flrdr.write(stringarr[59])
  flrdr.close()
  flrdr = open('/var/www/NIS1/activateresponse','r')
  flstr = flrdr.read()
  flrdr.close()
  newflstr = flstr.replace(oldipaddr.strip(),stringarr[59])
  flrdr = open('/var/www/NIS1/activateresponse','w')
  flrdr.write(newflstr)
  flrdr.close()
  flrdr = open('/var/www/NIS1/IAKeys.reg','r')
  flstr = flrdr.read()
  flrdr.close()
  newflstr = flstr.replace(oldipaddr.strip(),stringarr[59])
  flrdr = open('/var/www/NIS1/IAKeys.reg','w')
  flrdr.write(newflstr)
  flrdr.close() 
