<?php

/**
 * The VersionChecker class will loop the master for the Repository and all releases (= tags)
 * It will check if the code has the notice and warnings.
 *
 * @author Jeroen Desloovere
 */
class VersionChecker
{
    /**
     * @var boolean
     */
    protected $checkAllReleases;

    /**
     * @var Notices
     */
    protected $notices;

    /**
     * @var string
     */
    protected $repositoryUrl;

    /**
     * @var Warnings
     */
    protected $warnings;

    /**
     * Construct
     *
     * @param string $repositoryUrl
     * @param Notices $notices
     * @param Warnings $warnings
     * @param boolean $checkAllReleases
     */
    public function __construct(
        $repositoryUrl,
        Notices $notices,
        Warnings $warnings,
        $checkAllReleases = true
    ) {
        $this->repositoryUrl = $repositoryUrl;
        $this->notices = $notices;
        $this->warnings = $warnings;
        $this->checkAllReleases = $checkAllReleases;
    }
}
