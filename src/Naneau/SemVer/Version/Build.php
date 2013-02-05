<?php
/**
 * Build.php
 *
 * @category        Naneau
 * @package         SemVer
 * @subpackage      Version
 */

namespace Naneau\SemVer\Version;

/**
 * Build
 *
 * Build part
 *
 * @category        Naneau
 * @package         SemVer
 * @subpackage      Version
 */
class Build
{
    /**
     * Build number
     *
     * @var int
     **/
    private $number;

    /**
     * Parts
     *
     * @var array[int]string
     **/
    private $parts = array();

    /**
     * Get the build number
     *
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set the build number
     *
     * @param  int   $number
     * @return Build
     */
    public function setNumber($number)
    {
        if ($number < 0) {
            throw new InvalidArgumentException(
                'Build number "' . $number . '" is invalid'
            );
        }

        $this->number = $number;

        return $this;
    }

    /**
     * Get the build parts
     *
     * @return array[int]string
     */
    public function getParts()
    {
        return $this->parts;
    }

    /**
     * Set the build parts
     *
     * @param  array[int]string $parts
     * @return Build
     */
    public function setParts($parts)
    {
        $this->parts = array();

        foreach($parts as $part) {
            $this->addPart($part);
        }

        return $this;
    }

    /**
     * Add a part to the build parts stack
     *
     * @param  string $part
     * @return Build
     **/
    public function addPart($part)
    {
        // Sanity check
        if (!ctype_alnum($part)) {
            throw new InvalidArgumentException(
                'Build part "' . $part . '" is not alpha numerical'
            );
        }

        $this->parts[] = $part;

        return $this;
    }

    /**
     * Get string representation
     *
     * @return string
     **/
    public function __toString()
    {
        if (count($this->getParts()) > 0) {
            return implode('.', array(
                'build.' . $this->getNumber(),
                implode('.', $this->getParts())
            ));
        }

        return 'build.' . $this->getNumber();
    }
}

