Hardware Setup
==============

Nova Secura is running on a Raspberry Pi 4B with 8GB of RAM. You can buy these online from various vendors.
The server is housed in an Argon One M.2 case, with a 240GB Western Digital Green M.2 SSD for storage.

I installed Ubuntu Server 21.04 on the Pi using the following guide to enable USB boot: https://jamesachambers.com/raspberry-pi-4-ubuntu-20-04-usb-mass-storage-boot-guide/

The Argon One case comes with a Bash script for controlling the fan, but the official script is only
available for Raspbian/Raspberry Pi OS. I installed the following fork for Ubuntu: https://github.com/meuter/argon-one-case-ubuntu-20.04

Software Installation
=====================

I installed the following software for running services or making my life a little easier:

Docker
------

`snap install docker` (for running services)

Give yourself permission to run `docker` directly:

- `sudo groupadd docker`
- `sudo usermod -aG docker $USER`
- `sudo chown root:docker /var/run/docker.sock`
- `sudo chown -R root:docker /var/run/docker`

Optional
--------

`apt install` ...

- `avahi-daemon` (for zero-conf networking/dns broadcast)
- `rwho` (for easy ruptime monitoring)
- `figlet` (for creating cool ascii art)
- `ripgrep` (fast search)
- `shellcheck` (Bash linter because you never know)
- `unrar` (ORTS2 map file is distributed as a rar file)

SSH Banner
----------

- `figlet "Nova Secura" > /etc/sshbanner` (might need root permissions to write to `/etc/`)
- `echo "Banner /etc/sshbanner" > /etc/ssh/sshd_config.d/banner.conf`

Tada! You'll now see the name of your server when you SSH to it :)

Hostname
--------

TODO Use hostnamectl or something? Can't remember what it was called.

- `sudo vi /etc/hostname`
- Type `nova-secura` and save.
- `sudo reboot`
