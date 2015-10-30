EabUniqueDatatypesBundle
========================

Summary
-------
eZ Publish 5 bundle wrapping [eZ Unique Datatypes](http://projects.ez.no/ez_unique_datatypes)
extension for eZ Publish 4.0.

This is a collection of common datatypes whose validation has been extended
so to verify their uniqueness within given content object attribute. Otherwise,
these datatypes behave exactly as their prototypes.

Currently there are two datatypes provided:

* Unique string (based on Text line system datatype),
* Unique URL (based on URL system datatype).

Fields using these datatypes can be displayed using the Symfony stack. To edit
them you need to use the legacy stack.

[More documentation](ezpublish_legacy/ezuniquedatatypes/doc/readme.txt)

Copyright
---------
Portions copyright (C) 2007 [mediaSELF.pl](http://www.mediaself.pl/)
Portions copyright (C) 2015 [Enterprise AB Ltd](http://eab.uk/)

License
-------
Licensed under [GNU General Public License 2.0](http://www.gnu.org/licenses/gpl-2.0.html)

Requirements
------------
Requires eZ Publish 5.

Installation
------------

1. You can use composer to install the bundle:

        composer require --update-no-dev --prefer-dist eab/unique-datatypes-bundle

   Otherwise, clone the bundle using git:

        cd src
        git clone https://github.com/eab-dev/UniqueDatatypesBundle.git Eab/UniqueDatatypesBundle

2. Edit the file `ezpublish/EzPublishKernel.php`, look for the function `registerBundles()` and add:

        new Eab\UniqueDatatypesBundle\EabUniqueDatatypesBundle(),

3. Run (in Windows you should be administrator to create symlinks):

        php ezpublish/console ezpublish:legacybundles:install_extensions
        php ezpublish/console ezpublish:legacy:script bin/php/ezpgenerateautoloads.php
        php ezpublish/console cache:clear --no-warmup --env=prod

4. Use eZ Publish's admin interface to add a field using this datatype to a content type and create some content.

5. Test it in a Twig template using the `ez_render` function.
