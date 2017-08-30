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
     * wiringPiSetupPhys
     * wiringPiSetupSys
     *
     * @var string
     */
    protected $initSetup = "wiringPiSetup";


    /**
     * set root
     *
     * @param $user
     * @param $pass
     */
    public function setRootUser($user, $pass)
    {
        $this->rootUser = $user;
        $this->rootPassword = $pass;
    }

    /**
     * set setup
     * @param $setup
     */
    public function setSetup($setup)
    {
        $this->initSetup = $setup;
    }


    /**
     *
     * pinMode:
     * Sets the mode of a pin to be input, output or PWM output
     *
     * @param $pin
     * @param $mode
     * @return bool
     */
    public function pinMode($pin, $mode)
    {
        $aryReturn = Shell::GPIO($this->rootUser, $this->rootPassword, $this->initSetup, 'pinMode', $pin, $mode);

        return $aryReturn == 1 ? true : false;
    }

    /**
     *
     * digitalWrite:
     * Set an output bit
     *
     * @param $pin
     * @param $value
     * @return bool
     */
    public function digitalWrite($pin, $value)
    {
        $aryReturn = Shell::GPIO($this->rootUser, $this->rootPassword, $this->initSetup, 'digitalWrite', $pin, $value);

        return $aryReturn == 1 ? true : false;
    }


}