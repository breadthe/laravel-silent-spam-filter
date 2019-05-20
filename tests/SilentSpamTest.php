<?php

namespace Breadthe\SilentSpam\Tests;

use Orchestra\Testbench\TestCase;
use Breadthe\SilentSpam\Facades\SilentSpam;
use Breadthe\SilentSpam\SilentSpamServiceProvider;

class SilentSpamTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [SilentSpamServiceProvider::class];
    }

    protected function getPackageAliases()
    {
        return [
            'silent-spam' => SilentSpam::class,
        ];
    }

    /** @test */
    public function it_filters_spam()
    {
        $messages = collect([
            'If you invested $1,000 in bitcoin in 2011, now you have $4 million: https://aaa.bla/investmining26009',
            'Invest in mining cryptocurrency $ 5000 once and get passive income of $ 7000 per month: https://aaa.bla/investminingcrypto22370',
            'Beautiful girls for sex in your city: http://ttree.bla/bestadultdating63895',
            'Meet sexy girls in your city: http://rih.bla/bestadultdating42501',
            'The best girls for sex in your town AU: https://aaa.bla/bestadultdating52888',
            'The best girls for sex in your bed',
        ]);

        $keywords = [
            'http(s)?:\/\/aaa.bla',
            'http(s)?:\/\/ttree.bla',
            'http(s)?:\/\/rih.bla',
            'mining cryptocurrency',
            'passive income',
            'girls for sex',
            'sex in your (town|city)',
            'bestadultdating',
            'investmining',
        ];

        SilentSpam::blacklist($keywords);

        $messages->each(function ($message) {
            $this->assertTrue(SilentSpam::isSpam($message));
            $this->assertFalse(SilentSpam::notSpam($message));
        });
    }
}
