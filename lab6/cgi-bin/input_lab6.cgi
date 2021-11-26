#!/usr/bin/python3

import cgi
import csv

siteObj = open("input_lab6.html", "r")
site = siteObj.read()
siteObj.close()

# retrieve form data
form = cgi.FieldStorage()
f_name = form.getvalue('field_name')
f_surname = form.getvalue('field_surname')
f_mail = form.getvalue('field_mail')
f_year = form.getvalue('field_year')
list = [f_name, f_surname, f_mail, f_year]

if (list[0] and list[1] and list[2] and list[3]):
	# write form values into a csv file
	csv_filename = "data_lab6.csv"
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
