from restkit import request
resp = request('http://mooditude.sqroot.eu/public')
print resp.body_string()
print resp.status_int
