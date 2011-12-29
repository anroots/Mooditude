Mooditude v1.0
================

@author Ando Roots
@licence Apache 2.0
@created Dec, 2011
@url: https://github.com/anroots/Mooditude
@live: http://mooditude.sqroot.eu

Mooditude is a simplistic, fast and usable mood tracker focused on the individual.
The premise requires dedication for the data is only worth something over time.

Born out of an off day, the project acts as a front end for a mood-storage database and offers a *RESTFUL API* for manipulating and reading the stored data.

Install
========

Create a new database and drop the doc/database.sql file in there. The default user/password is test/test.
Copy Kohana Database config file from https://github.com/kohana/database/blob/3.2/master/config/database.php and replace relevant parts with your connection settings.

Modify application/bootstrap.php and replace the base url.
Modify index.php and point MODPATH and SYSPATH to correct paths.

Live Demo
=========

Visit: http://mooditude.sqroot.eu

User: test, Password: test
