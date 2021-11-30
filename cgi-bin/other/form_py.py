#!/usr/bin/env python3
import cgi
form = cgi.FieldStorage()
 
text1 = form.getvalue("get1","(no data)")
text2 = form.getvalue("get2","(no data)")
text3 = form.getvalue("get3","(no data)")
 
# print HTTP/HTML headers
print ("Content-type: text/html")
print ()
 
print ("""<!DOCTYPE html>
<html><head>
<title>A CGI Script</title>
</head><body>
""")
 
# print HTML body using form data
print ("<p>Zawartosc pola data1 - " + text1 + ".</p>")
print ("<p>Zawartosc pola data2 - " + text2 + ".</p>")
print ("<p>Zawartosc pola data3 - " + text3 + ".</p>")
#print "<p>TEST OK"
print ("</body></html>")
