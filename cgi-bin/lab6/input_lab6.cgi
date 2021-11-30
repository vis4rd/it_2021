#!/usr/bin/python3

import cgi
import csv

siteObj = open("labs/lab6/input_lab6.html", "r")
site = siteObj.read()
siteObj.close()

# retrieve form data
form = cgi.FieldStorage()
f_name = form.getvalue('field_name')
f_surname = form.getvalue('field_surname')
f_mail = form.getvalue('field_mail')
f_year = form.getvalue('field_year')
f_pass = form.getvalue('field_password')
list = [f_name, f_surname, f_mail, f_year]

if (list[0] and list[1] and list[2] and list[3] and (f_pass == "youcantseeme")):
	# write form values into a csv file
	csv_filename = "labs/lab6/data_lab6.csv"
	with open(csv_filename, 'a') as csvfile: 
	    writer = csv.writer(csvfile)
	    writer.writerow(list)

# send HTML site back
print("Content-type: text/html")
print()
print(site)


# DEBUG
# for el in list:
# 	print(el)
