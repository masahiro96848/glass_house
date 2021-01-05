<?php

use App\Enums\OfferType;

return [
  OfferType::class => [
    OfferType::Nullable => 'null',
    OfferType::ApproveWait => '承認待ち',
    OfferType::Approved => '承認済み',
    OfferType::Cancel => '取消済み',
  ],
];