<?php
/**
 * Created by IntelliJ IDEA.
 * User: wenchao
 * Date: 2017/8/30
 * Time: 01:26
 */

namespace Pi;

/**
 * Class Util
 * @package Pi
 */
class Util
{

    /**
     *
     * get between string
     *
     * @param $input
     * @param $start
     * @param $end
     * @return bool|string
     */
    public static function getBetween($input, $start, $end)
    {

        $substr = substr($input, strlen($start) + strpos($input, $start),

            (strlen($input) - strpos($input, $end)) * (-1));

        return $substr;
    }

    /**
     *
     * check shell error
     *
     * @param $value
     * @param $input
     * @return mixed
     * @throws \Exception
     */
    public static function checkShell($value, $input)
    {
        if ($value == false) {
            throw new \Exception($input);
        }

        $aryReturn = json_decode($value, true);

        if (empty($aryReturn)) {
            throw new \Exception($input);
        }

        if ($aryReturn['status'] != 'OK') {
            throw new \Exception($aryReturn['error']);
        }

        if ($aryReturn['status'] == 'OK') {
            return $aryReturn['result'];
        }

        throw new \Exception($input);
    }

}