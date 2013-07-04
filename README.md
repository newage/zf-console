
## Web console for Zend Framework 1

# Setup

## Composer properties

```
{
    "require": {
        "newage/zf-debug": "1.*",
    },
    "repositories": [
         {
            "type": "vcs",
            "url":  "git@bitbucket.org:newage/zf-debug.git"
        }
    ]
}
```

## Configuration

Add this parameters to you config file


```
; Enable plugins in ZFDebug
resources.debug.plugins.0 = Variables
resources.debug.plugins.1 = Memory
resources.debug.plugins.2 = Auth
resources.debug.plugins.Auth.user = email
resources.debug.plugins.Auth.role = role
resources.debug.plugins.3 = Time
resources.debug.plugins.4 = Registry
```
