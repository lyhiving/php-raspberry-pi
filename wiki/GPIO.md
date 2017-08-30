## 1.setSetup

#### Code

    $gpio->setSetup("wiringPiSetup")

#### Info

|Input|Info|
|:----- |:----- |
|wiringPiSetup|This initialises wiringPi and assumes that the calling program is going to be using the wiringPi pin numbering scheme. This is a simplified numbering scheme which provides a mapping from virtual pin numbers 0 through 16 to the real underlying Broadcom GPIO pin numbers. See the run `gpio readall`  for a table which maps the wiringPi pin number to the Broadcom GPIO pin number to the physical location on the edge connector.This function needs to be called with root privileges.|
|wiringPiSetupGpio|This is identical to above, however it allows the calling programs to use the Broadcom GPIO pin numbers directly with no re-mapping.As above, this function needs to be called with root privileges, and note that some pins are different from revision 1 to revision 2 boards.|
|wiringPiSetupPhys|Identical to above, however it allows the calling programs to use the physical pin numbers on the P1 connector only.As above, this function needs to be called with root priviliges.|

#### Return

|Return|Info|
|:----- |:----- |
|(bool)| |

## 2.pinMode

#### Code

    $gpio->pinMode(0,GPIO:INPUT)
    
#### Info

##### Pin

|Input|Info|
|:----- |:----- |
|int| wiringPi pin , Broadcom GPIO pin , physical pin|

##### Mode

|Input|Info|
|:----- |:----- |
|int|This sets the mode of a pin to either GPIO:INPUT,  GPIO:OUTPUT,  GPIO:PWM_OUTPUT or  GPIO:GPIO_CLOCK. Note that only wiringPi pin 1 (BCM_GPIO 18) supports PWM output and only wiringPi pin 7 (BCM_GPIO 4) supports CLOCK output modes.


#### Return

|Return|Info|
|:----- |:----- |
|bool| |

## 3.digitalWrite

#### Code

    $gpio->digitalWrite(0, GPIO::LOW)
    
#### Info


##### Pin

|Input|Info|
|:----- |:----- |
|int| wiringPi pin , Broadcom GPIO pin , physical pin|

##### value

|Input|Info|
|:----- |:----- |
|int| GPIO::HIGH , GPIO::LOW|

#### Return

|Return|Info|
|:----- |:----- |
|bool| |

## 4.digitalRead

#### Code

    $gpio->digitalRead(0)
    
#### Info

|Input|Info|
|:----- |:----- |
|int| wiringPi pin , Broadcom GPIO pin , physical pin|

#### Return

|Return|Info|
|:----- |:----- |
|int| GPIO::HIGH , GPIO::LOW|

## 5.pullUpDnControl

#### Code

    $gpio->pullUpDnControl(0,GPIO::PUD_DOWN)
    
#### Info

##### Pin

|Input|Info|
|:----- |:----- |
|int| wiringPi pin , Broadcom GPIO pin , physical pin|

##### Pub

|Input|Info|
|:----- |:----- |
|int| This sets the pull-up or pull-down resistor mode on the given pin, which should be set as an input. Unlike the Arduino, the BCM2835 has both pull-up an down internal resistors. The parameter pud should be; GPIO::PUD_OFF, (no pull up/down), GPIO::PUD_DOWN (pull to ground) or GPIO::PUD_UP (pull to 3.3v) The internal pull up/down resistors have a value of approximately 50KΩ on the Raspberry Pi.|

#### Return

|Return|Info|
|:----- |:----- |
|bool| |
