#!/usr/bin/env bash
gcc -Wall -o ../executable/GPIO ./GPIO.c -lwiringPi
chmod +x ../executable/GPIO