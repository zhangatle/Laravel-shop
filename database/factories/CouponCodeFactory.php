<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\CouponCode;

$factory->define(CouponCode::class, function (Faker $faker) {
    $type = $faker->randomElement(array_keys(CouponCode::$typeMap));
    $value = $type === CouponCode::TYPE_FIXED ? random_int(1, 200) : random_int(1, 50);
    if($type === CouponCode::TYPE_FIXED) {
        $minAmount = $value + 0.01;
    } else{
        if (random_int(0, 100) < 50) {
            $minAmount = 0;
        } else {
            $minAmount = random_int(100, 1000);
        }
    }
    return [
        'name'       => join(' ', $faker->words), // 随机生成名称
        'code'       => CouponCode::findAvailableCode(), // 调用优惠码生成方法
        'type'       => $type,
        'value'      => $value,
        'total'      => 1000,
        'used'       => 0,
        'min_amount' => $minAmount,
        'not_before' => null,
        'not_after'  => null,
        'enabled'    => true,
    ];
});
