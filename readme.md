Nova Secura
===========

An OpenTibia 10.x server running under Docker on a Raspberry Pi.

[Hardware & Operating System Setu](docs/raspberry_pi_setup.md)

Repositories
============

The following forks are used by this project via Git Submodules:

- https://github.com/silic0nalph4/forgottenserver
- https://github.com/silic0nalph4/myaac
- https://github.com/silic0nalph4/orts2

Config
======

TODO `config.lua` is now top level (but uncommitted)

TODO document my config changes

Setup
=====

TODO need to run `./setup_map.sh` to decompress the map file.

Usage
=====

Starting the Services
=====================

- `docker-compose up`

Website Setup
-------------

- Navigate to http://nova-secura.local and use MyAAC to set up the website.
- When MyAAC asks for a path to the server, use `/srv` - the config file and data pack are shared at this location.

Updating Config/Data
--------------------

TODO document how the config file and data pack are mounted for easy modification.

Working with Submodules
-----------------------

TODO document how to update the underlying submodules

Updating Services
-----------------

TODO document how to update to new versions of TFS, MyAAC, and ORTS2.

Backups
-------

TODO set up scheduled SQL dumps, document how it works.

Clone Your Own
--------------

TODO document how to use this repo as a template for your own server.
