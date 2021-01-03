<?php

use App\Enums\OfferType;

return [
  OfferType::class => [
    OfferType::OFFERONE => '承認待ち',
    OfferType::OFFERTWO => '承認済み',
    OfferType::OFFERTHREE => '取消済み',
  ],
];