#!/usr/bin/env bash
gcc -Wall -o ../executable/GPIO ./gpio.c -lwiringPi
chmod +x ../executable/GPIO