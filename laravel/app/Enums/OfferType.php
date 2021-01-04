<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class OfferType extends Enum implements LocalizedEnum
{
    const OFFERONE = 'approve_wait';
    const OFFERTWO = 'approved';
    const OFFERTHREE = 'cancel';


    public static function getOffer($value)
    {
        switch($value) {
            case self::OFFERONE:
                return '承認待ち';
                break;
            case self::OFFERTWO;
                return '承認済';
                break;
            case self::OFFERTHREE;
                return '取消済み';
                break;
            default:
                return self::getKey($value);
        }
    }

    public static function getValue($key)
    {
        switch($key) {
            case '承認待ち':
                return 0;
            case '承認済み':
                return 1;
            case '取消済み':
                return 2;
            default:
                return parent::getValue($key);
        }
    }
}
