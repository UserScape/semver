<?php
/**
 * Version.php
 *
 * @category        Naneau
 * @package         SemVer
 * @subpackage      Version
 */

namespace Naneau\SemVer;

use Naneau\SemVer\Version\Versionable;
use Naneau\SemVer\Version\Build;
use Naneau\SemVer\Version\PreRelease;

/**
 * Version
 *
 * A single SemVer version
 *
 * @category        Naneau
 * @package         SemVer
 * @subpackage      Version
 */
class Version extends Versionable
{
    /**
     * Pre release version
     *
     * @var PreRelease
     **/
    private $preRelease;

    /**
     * Build version
     *
     * @var Build
     **/
    private $build;

    /**
     * Original version String
     *
     * @var originalVersionString
     */
    private $originalVersionString;

    public function setOriginalVersion($version)
    {
        $this->originalVersionString = $version;
    }

    /**
     * Get the pre release version
     *
     * @return PreRelease
     */
    public function getPreRelease()
    {
        return $this->preRelease;
    }

    /**
     * Set the pre release version
     *
     * @param  PreRelease $preRelease
     * @return Version
     */
    public function setPreRelease(PreRelease $preRelease)
    {
        $this->preRelease = $preRelease;

        return $this;
    }

    /**
     * Does this Version have a pre release?
     *
     * @return bool
     **/
    public function hasPreRelease()
    {
        return ($this->preRelease instanceof PreRelease);
    }

    /**
     * Get the build
     *
     * @return Build
     */
    public function getBuild()
    {
        return $this->build;
    }

    /**
     * Set the build
     *
     * @param  Build   $build
     * @return Version
     */
    public function setBuild(Build $build)
    {
        $this->build = $build;

        return $this;
    }

    /**
     * Does this Version have a Build?
     *
     * @return bool
     **/
    public function hasBuild()
    {
        return ($this->build instanceof Build);
    }

    /**
     * String representation of this Version
     *
     * @return string
     **/
    public function __toString()
    {
        return $this->originalVersionString;
    }
}
