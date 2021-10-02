#!/bin/bash

set -x

# Run this whenever the ORTS2 repo changes the map.
# The map is stored in Git as a rar file - we need to decompress it.

WORLD="./orts2/data/world"

unzip "${WORLD}/*.zip" -d "${WORLD}"

