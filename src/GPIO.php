<?php
/**
 * Created by IntelliJ IDEA.
 * User: wenchao
 * Date: 2017/8/29
 * Time: 21:59
 */

namespace Pi;

/**
 * Class GPIO
 * @package Pi
 */
class GPIO
{

    const    INPUT = 0;
    const    OUTPUT = 1;
    const    PWM_OUTPUT = 2;
    const    GPIO_CLOCK = 3;
    const    SOFT_PWM_OUTPUT = 4;
    const    SOFT_TONE_OUTPUT = 5;
    const    PWM_TONE_OUTPUT = 6;


    const    LOW = 0;
    const    HIGH = 1;


    const    PUD_OFF = 0;
    const    PUD_DOWN = 1;
    const    PUD_UP = 2;

    /**
     * root user name
     *
     * @var string
     */
    protected $rootUser = "pi";

    /**
     * root user password
     *
     * @var string
     */
    protected $rootPassword = "raspberry";

    /**
     * Setup type
     *
     * wiringPiSetup
     * wiringPiSetupGpio
     *
     * @var string
     */
    protected $initSetup = "wiringPiSetup";


    /**
     * set root
     *
     * @param string $user
     * @param string $pass
     */
    public function setRootUser($user, $pass)
    {
        $this->rootUser = $user;
        $this->rootPassword = $pass;
    }

    /**
     * set setup
     *
     * @param string $setup
     */
    public function setSetup($setup)
    {
        $this->initSetup = $setup;
    }


    /**
     * pinMode:
     * Sets the mode of a pin to be INPUT or OUTPUT
     *
     * @param int $pin
     * @param int $mode
     * @return bool
     */
    public function pinMode($pin, $mode)
    {
        $aryReturn = Shell::GPIO($this->rootUser, $this->rootPassword, $this->initSetup, 'pinMode', $pin, $mode);

        return $aryReturn == 1 ? true : false;
    }

    /**
     * getPinMode :
     * Gets the mode of a pin to be INPUT or OUTPUT
     *
     * @param int $pin
     * @return int 0: INPUT 1: OUTPUT -1:NO Mode -2: Identify errors
     */
    public function getPinMode($pin)
    {

    }


    /**
     * like run gpio readall
     *
     * @return array
     */
    public function readAll()
    {

    }

    /**
     * digitalWrite:
     * Set pin HIGI or LOW
     *
     * @param int $pin
     * @param int $value
     * @return int
     */
    public function digitalWrite($pin, $value)
    {
        $aryReturn = Shell::GPIO($this->rootUser, $this->rootPassword, $this->initSetup, 'digitalWrite', $pin, $value);

        return $aryReturn == 1 ? true : false;
    }

    /**
     * digitalRead:
     * Get pin HIGI or LOW
     *
     * @param int $pin
     * @return int HIGI or LOW
     */
    public function digitalRead($pin)
    {

        return Shell::GPIO($this->rootUser, $this->rootPassword, $this->initSetup, 'digitalRead', $pin, 0);

    }


}