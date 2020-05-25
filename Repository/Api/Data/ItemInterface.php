<?php

namespace Example\Repository\Api\Data;

/**
 * @api
 */
interface ItemInterface {
    /**#@+
     * Constants defined for keys of data array
     */
    const NAME = 'name';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    /**#@-*/

    /**
     * Get item id
     * @return int|null
     */
    public function getId();

    /**
     * Set item id
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Get item name
     *
     * @return string
     */
    public function getName();

    /**
     * Set item name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * Get item created date
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set item created date
     *
     * @param string $timeStamp
     * @return $this
     */
    public function setCreatedAt($timeStamp);

    /**
     * Get item updated date
     *
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set item updated date
     *
     * @param string $timeStamp
     * @return $this
     */
    public function setUpdatedAt($timeStamp);
}