#!/usr/bin/env bash
gcc -Wall -o ../executable/gpio ./gpio.c -lwiringPi
chmod +x gpio