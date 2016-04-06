# VersionChecker

> This VersionChecker can check source code for Deprecations.

## Why you need this?

Example: You are using Fork CMS version 3.9.6
and want to know what Fork CMS Modules/Themes are compatible with that.

... the story stops here...

Modules/Themes are often not maintained anymore.
So you don't know if things will work or not.

## What this class will do?

This VersionChecker **checks the Repository Source code** for **Deprecations**.

## How must it work?

1. You must define all of your versions and all deprecations that comes with them.
2. Then we loop all module repositories (branches/releases) and get a result per check.

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

