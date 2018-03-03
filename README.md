# Remove Empty Headings #
**Contributors:** mackensen  
**Requires at least:** 4.8  
**Tested up to:** 4.9  
**Stable tag:** 0.1.0  
**License:** GPLv2 or later  
**License URI:** http://www.gnu.org/licenses/gpl-2.0.html  

This plugin strips out empty heading tags.

## Description ##

This plugin removes heading tags which don't have any text content. It's intended for multisites trying to resolve
WCAG 1.3.1 standards regarding [headings with missing text](https://www.w3.org/TR/UNDERSTANDING-WCAG20/content-structure-separation-programmatic.html).

The plugin uses the `content_save_pre` hook to eliminate the headings on save. Given the following content:

```
<h4><a name="212"></a></h4>
<h4><a name="247"></a>Lorem Ipsum</h4>
<h4><a name="213"></a></h4>
```

the following content would actually be saved:

```
<h4><a name="247"></a>Lorem Ipsum</h4>
```

## Installation ##

1. Upload the `remove-empty-headings` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress


## Changelog ##

### 0. 1.0 ###
* Initial release
