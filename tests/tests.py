#!/usr/bin/env python
import json
import os
import sys

if sys.version_info[0] == 2:
	from urlparse import urljoin
else:
	print("python v2 is expected")
	sys.exit(1)

__DIR__ = os.path.dirname(os.path.realpath(__file__))

bad_cases = []
return_code = 0
overall_cases_count = 0

f = open(__DIR__ + "/cases.json", "r")

for item in json.loads(f.read()):
	for case in item['cases']:
		overall_cases_count += 1
		if urljoin(case[0], case[1]) != case[2]:
			bad_cases.append([case[0], case[1], urljoin(case[0], case[1]), case[2]])

f.close()

if len(bad_cases) == 0:
	print("OK. {} case(s) read".format(overall_cases_count))
else:
	return_code = 1
	for case in bad_cases:
		print("{} + {} = {} (expected {})".format(case[0], case[1], case[2], case[3]))

sys.exit(return_code)
