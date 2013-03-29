<?php
/**
 * File containing the TimeProcessorTest class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\Core\REST\Server\Tests\FieldTypeProcessor;

use eZ\Publish\Core\REST\Server\Tests\BaseTest;
use eZ\Publish\Core\REST\Server\FieldTypeProcessor\TimeProcessor;
use eZ\Publish\Core\FieldType\Time\Type;

class TimeProcessorTest extends BaseTest
{
    protected $constants = array(
        "DEFAULT_EMPTY",
        "DEFAULT_CURRENT_TIME"
    );

    public function fieldSettingsHashes()
    {
        return array_map(
            function( $constantName )
            {
                return array(
                    array( "defaultType" => $constantName ),
                    array( "defaultType" => constant( "eZ\\Publish\\Core\\FieldType\\Time\\Type::{$constantName}" ) )
                );
            },
            $this->constants
        );
    }

    /**
     * @dataProvider fieldSettingsHashes
     */
    public function testPreProcessFieldSettingsHash( $inputSettings, $outputSettings )
    {
        $processor = $this->getProcessor();

        $this->assertEquals(
            $outputSettings,
            $processor->preProcessFieldSettingsHash( $inputSettings )
        );
    }

    /**
     * @dataProvider fieldSettingsHashes
     */
    public function testPostProcessFieldSettingsHash( $outputSettings, $inputSettings )
    {
        $processor = $this->getProcessor();

        $this->assertEquals(
            $outputSettings,
            $processor->postProcessFieldSettingsHash( $inputSettings )
        );
    }

    /**
     * @return \eZ\Publish\Core\REST\Server\FieldTypeProcessor\TimeProcessor
     */
    protected function getProcessor()
    {
        return new TimeProcessor;
    }
}