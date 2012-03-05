Mooditude v1.0
================

* @author Ando Roots
* @licence Apache 2.0
* @created Dec, 2011
* @url: https://github.com/anroots/Mooditude
* @live: http://mooditude.sqroot.eu

Mooditude is a simplistic mood tracker focused on the individual.
The system doesn't include a lot of "bang", but satisfies the basic need: creating a mood database over time.

Install
========

* Create a new database and drop the doc/database.sql file in there. The default user/password is test/test.
* Copy Kohana Database config file from https://github.com/kohana/database/blob/3.2/master/config/database.php and replace relevant parts with your connection settings.

* Modify application/bootstrap.php and replace the base url.
* Modify index.php and point MODPATH and SYSPATH to correct paths.
* Install Kohana Commoneer module

Usage
=====

The original goal was to develop the API to enable a wide range of clients to interact with the service.
One example is in the Python folder. Modify python/mooditude.py settings and place it (and the .sh) in ~/bin. Then all you need to do is write mooditude 6 and your status for today gets updated.
The Python script is written for Ubuntu, Gnome 3 and has dependencies.

TODO
======

RESTFUL API and documentation

Live Demo
=========

Visit: http://mooditude.sqroot.eu

User: test, Password: test
