#!/usr/bin/python3
import cgi

f_url = "../../labs/lab7/results_lab7.txt"

# preparing arrays of answer counts
q1 = [0, 0, 0, 0, 0, 0]
q2 = [0, 0, 0, 0, 0, 0]
q3 = [0, 0, 0, 0, 0]
questions = [q1, q2, q3]

# getting new answers
form = cgi.FieldStorage()
qa = form.getvalue("info", "test1")

# answer validation
# TODO

# appending new results to the text file database
with open(f_url, 'a') as file:
	file.write('\n' + qa)

# getting all old answers
with open(f_url) as file:
	data = file.read().split('\n')
	for row in data:
		ans = row.split(' ')
		it = -1
		for a in ans:
			it += 1
			questions[it][(ord(a) & 31)-1] += 1

# sending results
print("Content-Type: text/plain\n")
print("{} {} {} {} {} {}" .format(q1[0], q1[1], q1[2], q1[3], q1[4], q1[5]))
print("{} {} {} {} {} {}" .format(q2[0], q2[1], q2[2], q2[3], q2[4], q2[5]))
print("{} {} {} {} {}" .format(q3[0], q3[1], q3[2], q3[3], q3[4]))
