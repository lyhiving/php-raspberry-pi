#include <wiringPi.h>
#include <stdio.h>
#include <string.h>
#include <stdlib.h>


/*
 * wiringPiSetup:
 *	Must be called once at the start of your program execution.
 */

int wiringPiSetupP(char *type) {

    if (strcmp(type, "wiringPiSetup") == 0) {
        return wiringPiSetup();
    }

    if (strcmp(type, "wiringPiSetupGpio") == 0) {
        return wiringPiSetupGpio();
    }

    if (strcmp(type, "wiringPiSetupPhys") == 0) {
        return wiringPiSetupPhys();
    }

    if (strcmp(type, "wiringPiSetupSys") == 0) {
        return wiringPiSetupSys();
    }

    return -1;

}

/*
 * pinMode:
 *	Sets the mode of a pin to be input, output or PWM output
 *********************************************************************************
 */

int pinModeP(char *charPin, char *charMode) {

    int pin = (int) strtol(charPin, NULL, 10);
    int mode = (int) strtol(charMode, NULL, 10);

    if (mode == INPUT || mode == OUTPUT || mode == PWM_OUTPUT || mode == GPIO_CLOCK || mode == SOFT_PWM_OUTPUT ||
        mode == SOFT_TONE_OUTPUT || mode == PWM_TONE_OUTPUT) {
        pinMode(pin, mode);

        return 1;
    }

    return -1;
}

/*
 * digitalWrite:
 *	Set an output bit
 *********************************************************************************
 */

int digitalWriteP(char *charPin, char *charValue) {

    int pin = (int) strtol(charPin, NULL, 10);
    int value = (int) strtol(charValue, NULL, 10);

    if (value == HIGH || value == LOW) {
        digitalWrite(pin, value);
        return 1;
    }

    return -1;
}

/*
 * digitalRead:
 *	Read the value of a given Pin, returning HIGH or LOW
 *********************************************************************************
 */

int digitalReadP(char *charPin) {

    int pin = (int) strtol(charPin, NULL, 10);

    return digitalRead(pin);
}

/*
 * analogWrite:
 *	Write the analog value to the given Pin.
 *	There is no on-board Pi analog hardware,
 *	so this needs to go to a new node.
 *********************************************************************************
 */

void analogWriteP(char *charPin, char *charValue) {

    int pin = (int) strtol(charPin, NULL, 10);
    int value = (int) strtol(charValue, NULL, 10);

    analogWrite(pin, value);
}

/*
 * analogRead:
 *	Read the analog value of a given Pin.
 *	There is no on-board Pi analog hardware,
 *	so this needs to go to a new node.
 *********************************************************************************
 */

int analogReadP(char *charPin) {

    int pin = (int) strtol(charPin, NULL, 10);

    return analogRead(pin);

}

/*
 * pwmWrite:
 *	Set an output PWM value
 *********************************************************************************
 */

void pwmWriteP(char *charPin, char *charValue) {

    int pin = (int) strtol(charPin, NULL, 10);
    int value = (int) strtol(charValue, NULL, 10);

    pwmWrite(pin, value);

}

/*
 * pullUpDownCtrl:
 *	Control the internal pull-up/down resistors on a GPIO pin
 *	The Arduino only has pull-ups and these are enabled by writing 1
 *	to a port when in input mode - this paradigm doesn't quite apply
 *	here though.
 *********************************************************************************
 */

int pullUpDnControlP(char *charPin, char *charPud) {

    int pin = (int) strtol(charPin, NULL, 10);
    int pud = (int) strtol(charPud, NULL, 10);

    if (pud == PUD_UP || pud == PUD_DOWN || pud == PUD_OFF) {
        pullUpDnControl(pin, pud);

        return 1;
    }

    return -1;
}

/*
 * print msg
 */
void echo(char *msg, int out, char *error) {
    printf("{\"status\": %s,\"result\": %d,\"error\": \"%s\"}", msg, out, error);
    printf(">");
}


int main(int argc, char *argv[]) {

    printf("<");

    if (argc < 3) {
        echo("FAIL", -1, "Enter a valid integer.");
        return 0;
    }

    // Init wiringPi GPIO
    if (wiringPiSetupP(argv[1]) == -1) {
        echo("FAIL", -1, "Init error");
        return 0;
    }

    // Judgement input String
    if (strcmp(argv[2], "pinMode") == 0) {

        if (pinModeP(argv[3], argv[4]) == -1) {
            echo("FAIL", -1, "No mode");
        } else {
            echo("OK", 1, "");
        }

    }

    if (strcmp(argv[2], "digitalWrite") == 0) {

        if (digitalWriteP(argv[3], argv[4]) == -1) {
            echo("FAIL", -1, "No mode");
        } else {
            echo("OK", 1, "");
        }
    }

    if (strcmp(argv[2], "digitalRead") == 0) {

        int out = digitalReadP(argv[3]);

        echo("OK", out, "");
    }

    if (strcmp(argv[2], "analogWrite") == 0) {

        analogWriteP(argv[3], argv[4]);
        echo("OK", 1, "");

    }

    if (strcmp(argv[2], "analogRead") == 0) {

        int out = analogReadP(argv[3]);
        echo("OK", out, "");

    }


    if (strcmp(argv[2], "pwmWrite") == 0) {

        pwmWriteP(argv[3], argv[4]);
        echo("OK", 1, "");

    }

    if (strcmp(argv[2], "pullUpDnControl") == 0) {

        if (pullUpDnControlP(argv[3], argv[4]) == -1) {
            echo("FAIL", -1, "No mode");
        } else {
            echo("OK", 1, "");
        }
    }

    return 0;
}


