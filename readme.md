Nova Secura
===========

An OpenTibia 10.x server running under Docker on a Raspberry Pi.

[Hardware & Operating System Setup](docs/raspberry_pi_setup.md)

Repositories
============

The following forks are used by this project via Git Submodules:

- https://github.com/silic0nalph4/forgottenserver
- https://github.com/silic0nalph4/myaac
- https://github.com/silic0nalph4/orts2

Setup
=====

- `git clone git@github.com:silic0nalph4/nova-secura-10.git` to get a copy of this repo.
- `./setup_map.sh` to unzip the ORTS2 map file. This is distributed as a zip because maps can be big!
- `cp config/config.lua.example config/config.lua` to create your config file.
- Edit the new config file you created - see the `config.lua` section below as there are some changes you **must** make before
starting the server!
- `docker-compose up` to start the cluster.
- Once the server has started, it's time to configure MyACC.

Website Setup
-------------

- If you've set your server's hostname to `nova-secura.local` and set up ZeroConf networking, you should get a response to
 `ping nova-secura.local` from your workstation. If you haven't set this up, use an IP address for the server that you can route to instead.
- Navigate to http://nova-secura.local in a web browser - you should see the MyACC install page.
- Follow the instal wizard. The path to your TFS install is `/srv` - once MyACC has loaded your config file everything else should
be straightforward.
- You'll want to use client version `10.98` when prompted. I'm not sure how much of a difference it makes if the links on the website are wrong, but that's the latest protocol version that TFS supports.
- When you reach the last page of the wizard, it's time to apply any custom MyACC config you want:
- `docker exec -it nova-secura-10_web_1 /bin/bash`
- `vi config.local.php` and append your personal config changes. I've included my preferences in `config/config.local.php` in this repo.
- You can now access the MyACC website to create characters etc.

Client
------

You'll need an OTClient to connect to the server. I'm using https://github.com/edubart/otclient - you can download a binary from the "Actions" tab on GitHub. You'll also need appropriate `.spr` and `.dat` files for the game you're trying to play - but that's beyond the scope of this guide, sorry.

My config.lua
-------------

**Essential** config changes before starting the server:
- `ip = "192.168.0.37"` (use the static IP address of your server)
- `mapName = "map"` (this is the name of the map file to load)
- `mapAuthor = "ORTS"`
- `mysqlHost = "db"` (database server name from docker-compose.yaml)
- `mysqlUser = "forgottenserver"` (database username from docker-compose.yaml)
- `mysqlPass = "aibit"` (database password from docker-compose.yaml)
- `mysqlDatabase = "forgottenserver"` (database name from docker-compose.yaml)

Some additional changes that I've made are:
- `worldType = "no-pvp"`
- `motd = "Welcome to Nova Secura, a more perfect world."`
- `serverName = "Nova Secura"`
- `ownerName = "GM Silic0n Alph4"`
- `ownerEmail = "silic0nalph4@protonmail.com"`
- `url = "192.168.0.37"` (you might need to set this for MyACC to load server status correctly - TODO double check)
- `location = "Earth"`
- `housePriceEachSQM = 1` (cheapest rent you'll ever find!)
- `houseRentPeriod = "yearly"` (house rent only charged annually)


Administration
==============

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

