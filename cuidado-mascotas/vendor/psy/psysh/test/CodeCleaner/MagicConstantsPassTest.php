<?php

/*
 * This file is part of Psy Shell.
 *
 * (c) 2012-2023 Justin Hileman
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Psy\Test\CodeCleaner;

use Psy\CodeCleaner\MagicConstantsPass;

/**
 * @group isolation-fail
 */
class MagicConstantsPassTest extends CodeCleanerTestCase
{
    /**
     * @before
     */
    public function getReady()
    {
        $this->setPass(new MagicConstantsPass());
    }

    /**
     * @dataProvider magicConstants
     */
    public function testProcess($from, $to)
    {
        $this->assertProcessesAs($from, $to);
    }

    public function magicConstants()
    {
        return [
            ['__DIR__;', 'getcwd();'],
            ['__FILE__;', "'';"],
            ['___FILE___;', '___FILE___;'],
        ];
    }
}
