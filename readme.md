Nova Secura
===========

A Tibia 10.x server on a Raspberry Pi 4b (8GB RAM).

Hardware Setup
==============

I'm using an Argon One M.2 case to house my Pi.

- Setup instructions: https://jamesachambers.com/raspberry-pi-4-ubuntu-20-04-usb-mass-storage-boot-guide/
- Fan control script: https://github.com/meuter/argon-one-case-ubuntu-20.04

Server Setup
============

`snap install`...

- `docker` (for running services)

Give yourself permission to run `docker` directly:

- `sudo groupadd docker`
- `sudo usermod -aG docker $USER`
- `sudo chown root:docker /var/run/docker.sock`
- `sudo chown -R root:docker /var/run/docker`

The following aren't needed to run Tibia, but I like them anyway:

`apt install` ...

- `avahi-daemon` (for zero-conf networking/dns broadcast)
- `rwho` (for easy ruptime monitoring)
- `figlet` (for creating ssh banners)
- `ripgrep` (fast search)
- `shellcheck` (Bash linter because you never know)
- `unrar` (ORTS2 map file is distributed as a rar file)

Repositories
============

- https://github.com/silic0nalph4/forgottenserver
- https://github.com/silic0nalph4/myaac
- https://github.com/silic0nalph4/orts2

Config
======

I _think_ we need to `cp config.lua.dist` to `config.lua`, then change the following:

TODO document my config changes


Building Services
=================

MyAAC
-----

Due to being in a separate repo, we need to build the MyAAC Docker image first:

- `cd myaac`
- `./build-docker.sh`

Forgotten Server
----------------

This doesn't need building separately - instead we can just start the Docker Compose cluster and wait for the service to compile and start:

- `docker-compose up`


Usage
=====

Setup
-----

- Navigate to http://nova-secura.local and use MyAAC to set up the website.
- When MyAAC asks for a path to the server, use `/opt/tfs` - this is a volume that is shared from the forgottenserver container and mounted on the MyAAC container. 



How to modify config
--------------------

NOTE: My previous notes suggest that it might be enough to just `rm` the `forgottenserver_tfs` volume - this is worth testing.

Because the config file is persisted in a Docker volume, modifying it in the Git directory and restarting the containers currently doesn't update the file. Instead we need to:

- `docker-compose down`
- Wait for `docker ps` to show that nothing is running

Then maybe...:

- Delete `forgottenserver_server` image
- Delete volumes
- `docker system prune`
- Rebuild, e.g. `docker-compose up` (does this need the `--build` flag?)

