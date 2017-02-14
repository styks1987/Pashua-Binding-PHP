<?php

namespace Test\TestCase;

use PHPUnit\Framework\TestCase;
use BlueM\Pashua;

class ArrayToConfigTest extends TestCase
{
    /**
     * @covers BlueM\Pashua::ArrayToConfig()
     */
    public function testSimpleConfig()
    {
        $configArray = [
            'indesign_version' => [
                'type' => 'radiobutton',
                'label' => 'Indesign Version (if you don\'t know, choose 11)',
                'default' => '11',
                ['option' => 11],
                ['option' => 12]
            ],
            'artwork_root' => [
                'label' => 'Artwork Folder (folder with all the customer artwork)',
                'type' => 'openbrowser',
                'mandatory' => 'true',
                'filetype' => 'directory',
                'default' => '/Users/mike/EnfocusSwitch/ServerFiles/Graphics/Artwork/',
                'width' => 500
            ]
        ];

        $expectedString = "indesign_version.type=radiobutton" . PHP_EOL;
        $expectedString .= "indesign_version.label=Indesign Version (if you don't know, choose 11)" . PHP_EOL;
        $expectedString .= "indesign_version.default=11" . PHP_EOL;
        $expectedString .= "indesign_version.option=11" . PHP_EOL;
        $expectedString .= "indesign_version.option=12" . PHP_EOL;
        $expectedString .= "artwork_root.label=Artwork Folder (folder with all the customer artwork)" . PHP_EOL;
        $expectedString .= "artwork_root.type=openbrowser" . PHP_EOL;
        $expectedString .= "artwork_root.mandatory=true" . PHP_EOL;
        $expectedString .= "artwork_root.filetype=directory" . PHP_EOL;
        $expectedString .= "artwork_root.default=/Users/mike/EnfocusSwitch/ServerFiles/Graphics/Artwork/" . PHP_EOL;
        $expectedString .= "artwork_root.width=500" . PHP_EOL;

        $this->assertEquals($expectedString, Pashua::arrayToConfig($configArray));
    }
}