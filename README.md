# VersionChecker

> This VersionChecker library can check source code for Deprecations.

When using a specific version of Fork CMS, you want to use a module to fully supports your version. Thats why I'm creating this class, so it can check if the module supports everything.

The result could have a status =
- OK = green
- HAS_NOTICES = orange
- HAS_WARNINGS = red

## Temporary Example for automated testings

We must define the versions, which will be used to verify

```php
$versions = array(
    new Version(
        '3.9.6',
        new Notices(
            // Deprecated constants
            array(
                'SPOON_DEBUG',
            ),
            // Deprecated namespaces
            array(

            ),
            // Deprecated methods
            array(

            ),
            // Deprecated services
            array(

            )
        ),
        new Warnings(
            // Deprecated constants
            array(
                'SPOON_DEBUG',
            ),
            // Deprecated namespaces
            array(
                
            ),
            // Deprecated methods
            array(
                
            ),
            // Deprecated services
            array(
                'database'
            )
        )
    )
)
```


```php
// Define your repository
$repositoryUrl = 'htts://github.com/forkcms/fork-cms-media-module';

// Define VersionChecker
$versionChecker = new VersionChecker(
    $repositoryUrl
)

// Define results
$versionCheckerResult = $versionChecker->checkBranch('master');
```


### Temporary library

```php
<?php

/**
 * The VersionChecker class will loop the master for the Repository and all releases (= tags)
 * It will check if the code has the notice and warnings.
 *
 * @author Jeroen Desloovere <info@jeroendesloovere.be>
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
```

```
/**
 * X
 *
 * @author Jeroen Desloovere <info@jeroendesloovere.be>
 */
class X
{
    /**
     * @var array
     */
    protected $deprecatedConstants;

    /**
     * @var array
     */
    protected $deprecatedNamespaces;

    /**
     * @var array
     */
    protected $deprecatedMethods;

    /**
     * @var array
     */
    protected $deprecatedServices;
}

/**
 * Notices
 *
 * @author Jeroen Desloovere <info@jeroendesloovere.be>
 */
class Notices extends X
{
    const STATUS = 'notice';
}

/**
 * Warnings
 *
 * @author Jeroen Desloovere <info@jeroendesloovere.be>
 */
class Warnings extends X
{
    const STATUS = 'warning';
}

/**
 * DeprecatedItem
 *
 * @author Jeroen Desloovere <info@jeroendesloovere.be>
 */
class DeprecatedItem
{
    /**
     *
     */
}
```

