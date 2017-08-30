<?php
/**
 * Created by IntelliJ IDEA.
 * User: wenchao
 * Date: 2017/8/29
 * Time: 23:53
 */

namespace Pi;

/**
 * Class Shell Get C Lib
 *
 * @package Pi
 */
class Shell
{

    /**
     *
     * Shell GET GPIO
     *
     * @param string $user root user
     * @param string $pass root pass
     * @param string $setup mode setup init
     * @param int $pin pi pin
     * @param int $value set value pin
     *
     * @return mixed
     */
    public static function GPIO($user, $pass, $setup, $intention, $pin, $value)
    {
        $path = dirname(dirname(__FILE__)) . "/shell/GPIO.sh";

        $shell = shell_exec("/usr/bin/env bash " . "$path $user $pass $setup $intention $pin $value");

        $value = Util::getBetween($shell, "<", ">");

        return Util::checkShell($value, $shell);
    }
}