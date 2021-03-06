<?php

/**
 * File containing the UserGroupTest class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace eZ\Publish\Core\Repository\Tests\Values\User;

use eZ\Publish\API\Repository\Tests\Values\ValueObjectTestTrait;
use eZ\Publish\Core\Repository\Values\User\UserGroup;
use PHPUnit_Framework_TestCase;

/**
 * Test internal integrity of @see \eZ\Publish\Core\Repository\Values\User\UserGroup.
 */
class UserGroupTest extends PHPUnit_Framework_TestCase
{
    use ValueObjectTestTrait;

    /**
     * @covers \eZ\Publish\Core\Repository\Values\User\UserGroup::__construct
     */
    public function testNewClass()
    {
        $group = new UserGroup();
        self::assertEquals(null, $group->parentId);
        self::assertEquals(null, $group->subGroupCount);

        $this->assertPropertiesCorrect(
            [
                'parentId' => null,
                'subGroupCount' => null,
            ],
            $group
        );
    }

    /**
     * Test retrieving missing property.
     *
     * @covers \eZ\Publish\API\Repository\Values\User\UserGroup::__get
     * @expectedException \eZ\Publish\API\Repository\Exceptions\PropertyNotFoundException
     */
    public function testMissingProperty()
    {
        $userGroup = new UserGroup();
        $value = $userGroup->notDefined;
        self::fail('Succeeded getting non existing property');
    }

    /**
     * Test setting read only property.
     *
     * @covers \eZ\Publish\API\Repository\Values\User\UserGroup::__set
     * @expectedException \eZ\Publish\API\Repository\Exceptions\PropertyReadOnlyException
     */
    public function testReadOnlyProperty()
    {
        $userGroup = new UserGroup();
        $userGroup->parentId = 42;
        self::fail('Succeeded setting read only property');
    }

    /**
     * Test if property exists.
     *
     * @covers \eZ\Publish\API\Repository\Values\User\UserGroup::__isset
     */
    public function testIsPropertySet()
    {
        $userGroup = new UserGroup();
        $value = isset($userGroup->notDefined);
        self::assertEquals(false, $value);

        $value = isset($userGroup->parentId);
        self::assertEquals(true, $value);
    }

    /**
     * Test unsetting a property.
     *
     * @covers \eZ\Publish\API\Repository\Values\User\UserGroup::__unset
     * @expectedException \eZ\Publish\API\Repository\Exceptions\PropertyReadOnlyException
     */
    public function testUnsetProperty()
    {
        $userGroup = new UserGroup(['parentId' => 1]);
        unset($userGroup->parentId);
        self::fail('Unsetting read-only property succeeded');
    }
}
