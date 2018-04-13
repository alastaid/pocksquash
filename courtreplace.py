import os
import datetime

            
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
timearr = ["17:00", "17:40", "18:20", "19:00", "19:40", "20:20", "21:00"]
for timestr in timearr:       
   strtpos = newflstr.find('<!--1' + timestr + '-->') 
   tomcrt = newflstr[strtpos+13:strtpos+14]
   orgstr = newflstr[strtpos:strtpos + 14]
   newflstr= newflstr.replace(orgstr,'<!--1' + timestr + '-->0')
   strtpos =  newflstr.find('<!--0' + timestr + '-->')
   orgstr = newflstr[strtpos:strtpos + 14]
   newflstr = newflstr.replace(orgstr,'<!--0' + timestr + '-->' + tomcrt)
   mstrtpos = mnewflstr.find('<!--1' + timestr + '-->') 
   mtomcrt = mnewflstr[mstrtpos+13:mstrtpos+14]
   morgstr = mnewflstr[mstrtpos:mstrtpos + 14]
   mnewflstr= mnewflstr.replace(morgstr,'<!--1' + timestr + '-->0')
   mstrtpos =  mnewflstr.find('<!--0' + timestr + '-->')
   morgstr = mnewflstr[mstrtpos:mstrtpos + 14]
   mnewflstr = mnewflstr.replace(morgstr,'<!--0' + timestr + '-->' + mtomcrt)
flrdr = open('/var/www/pocksquash/courts.html','w')
flrdr.write(newflstr)
flrdr.close()
mflrdr = open('/var/www/pocksquash/m/mcourts.html','w')
mflrdr.write(mnewflstr)
mflrdr.close()
