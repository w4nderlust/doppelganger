# Changelog

## Version 1.3.2

**Features:**

* New keyboard shortcuts modal
* Added support for strike-through text

**Changes:**

* Better keyboard shortcuts
* Updated to CodeMirror 5.3

**Bugfixes:**

* Better space character matching inside KirbyTags


## Version 1.3.1

**Features:**

* Respect the new (Kirby 2.1) strict markdown mode

**Special Thanks:**

* @shoesforindustry for bringing this to my attention

## Version 1.3.0

**Features:**

* Added Kirbytext highlighting
* Added option to turn off individual toolbar icons

**Changes:**

* Updated to CodeMirror 5.2
* Switched to compressed CodeMirror resources

**Bugfixes:**

* Fixed some potentially unsafe javascript code

## Version 1.2.0

**Features:**

* Enhanced syntax styling
  * Align headline formatting outside the content
  * Added hanging quotes
  * Added styles for task lists
* Added inline HTML support
* Added "Help" toolbar section with relevant links
* Added tooltips to toolbar icons
* Added translation support
* Included language files:
  * English
  * German
  * French (Thanks to @malvese)

**Changes:**

* Changed header button icons
* Header buttons toggle formatting instead of applying it multiple times
* Drop MirrorMark dependency
* Drop lodash.js dependency

**Bugfixes:**

* Don't treat underscores in words as formatting (#11)
* Make toolbar buttons work with multiple selections
* Enable panel "Save" hotkey
* Hide fullscreen icon in Safari
* A lot more little fixes

## Version 1.1.0

**New Features:**

* Headline toolbar icons & actions
* Option to specify the headline levels
* Option to hide the toolbar

**Changes:**

* Updated to MirrorMark 1.0.1

**Bugfixes:**

* Show correct fullscreen mode editor for pages with multiple editor fields
* Allow scrolling in fullscreen mode

## Version 1.0.1

**New Features:**

* Reimplement fullscreen mode logic
* Show toolbar in fullscreen mode

**Bugfixes:**

* Limited fullscreen mode content width
* Minor additional style fixes for fullscreen mode

## Version 1.0.0

* Initial Release
