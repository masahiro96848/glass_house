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
    const Nullable = 'null';
    const ApproveWait = 'approve_wait';
    const Approved = 'approved';
    const Cancel = 'cancel';
    


    public static function getOffer($value): string
    {
        switch($value) {
            case self::Nullable:
                return '';
                break;
            case self::ApproveWait:
                return '承認待ち';
                break;
            case self::Approved;
                return '承認済み';
                break;
            case self::Cancel;
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
