#!/usr/bin/python3

import cgi
import csv
import os.path

def insertElement(target, element):
    target += "\n<td>"+element+"</td>"
    return target

def insertRow(target, row):
    target += "\n<tr>"
    for data in row:
        target = insertElement(target, data)
    target += "\n</tr>"
    return target

def insertTable(target):
    target += """
<table id>
    <thead>
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>E-Mail</th>
            <th>Year</th>
        </tr>
    </thead>
    <tbody>"""

    # retrieve data from the csv file
    csv_filename = "data_lab6.csv"
    if os.path.isfile(csv_filename):
        with open(csv_filename, 'r') as csvfile:
            reader = csv.reader(csvfile)
            for row in reader:
               target = insertRow(target, row)

    target += """
    </tbody>
</table>
    """
    return target


# insert the beggining of HTML tree
site = """Content-type: text/html

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../lab6.css">
    <title>Kluczka - Internet Technology</title>
</head>
<body>
    <div class="parag">
        <h1>Task 6 - Data</h1>
    </div>
    <nav>
        <div class="navbar-entry">
            <a href="input_lab6.cgi">input</a>
        </div>
        <div class="navbar-entry" id="nav-active">
            output
        </div>
    </nav>
    <div class="parag" id="table_wrapper">
"""

# insert table with data
site = insertTable(site)

# end the HTML tree
site += """
    </div>
</body>
</html>
"""

# send HTML site bacc
print(site)
