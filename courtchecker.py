import os
import datetime
import urllib
import urllib2
from HTMLParser import HTMLParser

class my_opener (urllib.FancyURLopener):
    version = 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0)'

class MyHTMLParser(HTMLParser):
    def handle_data(self, tag):
        stringarr.append(tag)  
            
flrdr = open('/var/www/pocksquash/courts.html','r')
flstr = flrdr.read()
newflstr = flstr
flrdr.close()
mflrdr = open('/var/www/pocksquash/m/mcourts.html','r')
mflstr = mflrdr.read()
mnewflstr = mflstr
mflrdr.close()
strtpos = flstr.find('Last updated:')
endpos = flstr.find('<!--updatemarker-->')
orgstr = flstr[strtpos:endpos]
now = datetime.datetime.now()
newflstr = newflstr.replace(orgstr,'Last updated: '+now.strftime('%A')+' '+str(now.hour)+':'+str(now.minute))
mstrtpos = mflstr.find('Last updated:')
mendpos = mflstr.find('<!--updatemarker-->')
morgstr = mflstr[mstrtpos:mendpos]
mnewflstr = mnewflstr.replace(morgstr,'Last updated: '+now.strftime('%A')+' '+str(now.hour)+':'+str(now.minute))

dayarray = ["0","1"]
pagearray = ["0","1","2"]

for eachday in dayarray:
    for eachpage in pagearray:
        fsurlstr = "http://www.francisscaifesportscentre.co.uk/bears/leisure/index.aspx?strPage=activity&pPG="+eachpage+"&pVenueID=2308&pLocationID=5199&pActivityID=368&pDate="+eachday
        try:
            opener = my_opener()
            response = opener.open (fsurlstr)
            content = response.read()
      
        except  IOError:
            print "Failed"
            
        stringarr = []
        parser = MyHTMLParser()
        parser.feed(content)
        
        timearr = ["17:00","17:40","18:20","19:00","19:40","20:20","21:00"]
        for timestr in timearr:
          
            mycounter = 0
            for i in stringarr:
                if i == timestr:
                    srchpos = flstr.find('<!--'+eachday+timestr+'-->')
                    orgstr = flstr[srchpos:srchpos+14]
                    newflstr = newflstr.replace(orgstr,'<!--'+eachday+timestr+'-->'+stringarr[mycounter+1])
                    msrchpos = mflstr.find('<!--'+eachday+timestr+'-->')
                    morgstr = mflstr[msrchpos:msrchpos+14]
                    mnewflstr = mnewflstr.replace(morgstr,'<!--'+eachday+timestr+'-->'+stringarr[mycounter+1])
                mycounter = mycounter+1

flrdr = open('/var/www/pocksquash/courts.html','w')
flrdr.write(newflstr)
flrdr.close()
mflrdr = open('/var/www/pocksquash/m/mcourts.html','w')
mflrdr.write(mnewflstr)
mflrdr.close()
