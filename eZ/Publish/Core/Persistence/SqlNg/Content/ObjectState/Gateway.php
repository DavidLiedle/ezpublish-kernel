<?php
/**
 * File containing the ObjectState Gateway class
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\Core\Persistence\SqlNg\Content\ObjectState;

use eZ\Publish\SPI\Persistence;

/**
 * ObjectState Gateway
 */
abstract class Gateway
{
    /**
     * Loads data for an object state
     *
     * @param mixed $stateId
     *
     * @return array
     */
    abstract public function loadObjectStateData( $stateId );

    /**
     * Loads data for an object state by identifier
     *
     * @param string $identifier
     * @param mixed $groupId
     *
     * @return array
     */
    abstract public function loadObjectStateDataByIdentifier( $identifier, $groupId );

    /**
     * Loads data for all object states belonging to group with $groupId ID
     *
     * @param mixed $groupId
     *
     * @return array
     */
    abstract public function loadObjectStateListData( $groupId );

    /**
     * Loads data for an object state group
     *
     * @param mixed $groupId
     *
     * @return array
     */
    abstract public function loadObjectStateGroupData( $groupId );

    /**
     * Loads data for an object state group by identifier
     *
     * @param string $identifier
     *
     * @return array
     */
    abstract public function loadObjectStateGroupDataByIdentifier( $identifier );

    /**
     * Loads data for all object state groups, filtered by $offset and $limit
     *
     * @param int $offset
     * @param int $limit
     *
     * @return array
     */
    abstract public function loadObjectStateGroupListData( $offset, $limit );

    /**
     * Inserts a new object state into database
     *
     * @param mixed $groupId
     * @param \eZ\Publish\SPI\Persistence\Content\ObjectState\InputStruct $objectState
     * @return void
     */
    abstract public function insertObjectState( $groupId, Persistence\Content\ObjectState\InputStruct $objectState );

    /**
     * Updates the stored object state with provided data
     *
     * @param int $stateId
     * @param \eZ\Publish\SPI\Persistence\Content\ObjectState\InputStruct $objectState
     */
    abstract public function updateObjectState( $stateId, Persistence\Content\ObjectState\InputStruct $objectState );

    /**
     * Deletes object state identified by $stateId
     *
     * @param int $stateId
     */
    abstract public function deleteObjectState( $stateId );

    /**
     * Inserts a new object state group into database
     *
     * @param \eZ\Publish\SPI\Persistence\Content\ObjectState\InputStruct $objectStateGroup
     */
    abstract public function insertObjectStateGroup( Persistence\Content\ObjectState\InputStruct $objectStateGroup );

    /**
     * Updates the stored object state group with provided data
     *
     * @param int $groupId
     * @param \eZ\Publish\SPI\Persistence\Content\ObjectState\Group $objectStateGroup
     */
    abstract public function updateObjectStateGroup( $groupId, Persistence\Content\ObjectState\InputStruct $objectStateGroup );

    /**
     * Deletes the object state group identified by $groupId
     *
     * @param mixed $groupId
     */
    abstract public function deleteObjectStateGroup( $groupId );

    /**
     * Sets the object state $stateId to content with $contentId ID
     *
     * @param mixed $contentId
     * @param mixed $groupId
     * @param mixed $stateId
     */
    abstract public function setContentState( $contentId, $groupId, $stateId );

    /**
     * Loads object state data for $contentId content from $stateGroupId state group
     *
     * @param int $contentId
     * @param int $stateGroupId
     *
     * @return array
     */
    abstract public function loadObjectStateDataForContent( $contentId, $stateGroupId );

    /**
     * Returns the number of objects which are in this state
     *
     * @param mixed $stateId
     *
     * @return int
     */
    abstract public function getContentCount( $stateId );

    /**
     * Updates the object state priority to provided value
     *
     * @param mixed $stateId
     * @param int $priority
     */
    abstract public function updateObjectStatePriority( $stateId, $priority );
}