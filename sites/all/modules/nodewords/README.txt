Nodewords: The Drupal 6 Meta Tags module
----------------------------------------

This module allows you to set some meta tags for the different content
available on your site, including nodes, users, views, taxonomy filters and
error pages.

Giving more attention to the important keywords and/or description on your site
may help you to get better positioning within public search engines.

This version of the module only works with Drupal 6.x.


Features
------------------------------------------------------------------------------
The primary features include:

* The current supported basic meta tags are ABSTRACT, CANONICAL, COPYRIGHT,
  GEO.POSITION, DESCRIPTION, ICBM, KEYWORDS, REVISIT-AFTER, ROBOTS.
  These meta tags are provided by the module Basic meta tags.

* The Dublin Core meta tag schema may be added by enabling the "Nodewords
  extra meta tags" module.

* The Open Graph Protocol meta tags, as used by Facebook, may be added by
  enabling the "Open Graph meta tags" module (see below).

* A pluggable system allow the inclusion of new meta tags in addition to the
  ones provided by this module.

* Meta tags can be assigned site-wide defaults and then overridden on a
  per-node, per-tag and per-path basis.

* It is possible to control which of the available tags will be available for
  editing versus only using the previously configured values.

* All text of the DESCRIPTION and KEYWORDS meta tags are added to the search
  system so they are searchable too; other meta tags could be added to the
  search system too (depending on the code implemented from the module).


Integration with other modules
------------------------------------------------------------------------------
Nodewords integrates with other modules for automatic selection of meta tags.

* On node pages all terms of some specified vocabularies associated can be
  added to the KEYWORDS meta tag.

* On taxonomy pages, the term description is used as the meta tag DESCRIPTION.
  The term itself is added to the list of KEYWORDS. You can override the
  description to use, if you wish.

* Previous versions of this module provided support for Views and Panels. This
  feature has been removed from Nodewords 6.x-1.x (since August 15, 2009) as
  the module now provides an API allowing other modules to integrate with it.

* This module may also integrate with Tagadelic, CCK, and others.

* The Meta tags Node Type module [1] allows defaults to be assigned to each
  content type, which can then be overridden on individual nodes.

* The Domain Meta module [2] provides integration with the Domain Access
  module [3].


Installing Nodewords (first time installation)
------------------------------------------------------------------------------
 1. Backup your database.

 2. Copy the module as normal.
   More information about installing contributed modules could be found at
   "Install contributed modules" [4].

 3. Enable the "Nodewords" module from the module administration page
   (Administer >> Site configuration >> Modules).

 4. Enable other modules which provide meta tags. The following are included:
    - Nodewords basic meta tags: for "abstract", "canonical", "copyright",
      "description", "keywords", "revisit-after" and "robots" meta tags.
    - Nodewords extra meta tags: for Dublin Core, "geo.position", "icbm" and
      "shorturl" meta tags.
    - Nodewords Open Graph meta tags: for the Open Graph Protocol meta tags,
      used for integration with Facebook's API.

 5. Configure the module (see "Configuration" below).


Updating Nodewords (module version upgrade)
------------------------------------------------------------------------------
 1. Verify that the version you are going to upgrade contains all the features
    your are using in your Drupal setup. Some features could have been removed
    or replaced by others.

 2. Backup your database.

 3. Update current module code with latest recommended version. Previous
    versions could have bugs already reported and fixed in the last version.

 4. Complete the update process: set the site into maintenance mode, visit the
    update.php script and finish the update operation. For more information
    please see: http://groups.drupal.org/node/19513

 5. Verify your module configuration and check that the features you are using
    work as expected. Also verify that all required modules are enabled, and
    permissions are set as desired.

Note: Whenever you have the chance, try an update in a local or development
      copy of your site.


Configuration
------------------------------------------------------------------------------
 1. On the access control administration page ("Administer >> User management
    >> Access control") you need to assign:

    - The "administer meta tags" permission to the roles that are allowed to
      administer the meta tags (such as setting the default values and/or
      enabling the possibility to edit them),

    - The "edit XYZ tag" permission to the roles that are allowed to set and
      edit meta tags for the content (there is a permission for each of the
      meta tags currently defined).

    All users will be able to see the assigned meta tags.

 2. On the settings page ("Administer >> Content management >> Meta tags") you
    can specify the default settings for the module. To access this page users
    need the "administer meta tags" permission.

 3. You should enable meta tags for editing before they are available for use.
    The same operation should be done for meta tag output. Only allowed Meta
    tags are available for editing or exposed in the HTML of your site.

 4. The front page is an important page for each website, therefore you can
    specifically set the meta tags to use on the front page meta tags settings
    page ("Administer >> Content management >> Meta tags >> Default and
    specific meta tags >> Front page"). Users need the "administer meta tags"
    permission to do this. When there are resources providing meta tags
    promoted in the front page, you may force the usage of "Front page" meta
    tags superseding all of them.

    Alternatively, you can opt not to set the meta tags for the front page on
    this page, but to use the meta tags of the node, term or other page the
    used to control the front page. To do this, uncheck the "Use front page
    meta tags" option on the main settings page.

    Note that, in contrast to previous versions of this module, the site
    mission and/or site slogan are no longer used as DESCRIPTION or ABSTRACT
    on the front page!


Open Graph Protocol Extra Steps
------------------------------------------------------------------------------
Because of a limitation in Drupal 6, if the Open Graph meta tags module is
enabled the site's theme will have to be customized. In order to work
correctly, and pass XHTML validation, the page.tpl.php for any theme(s) in use
must to be customized to add the following attribute to the HTML tag:

  prefix="og: http://ogp.me/ns#"

As an example, to make it work with the Garland theme the HTML tag must be
changed to the following:

  <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>" prefix="og: http://ogp.me/ns#">

Unless this change is made the page output will fail XHTML validation and the
Open Graph meta tags may not be properly identified by Facebook.


Using With non-PHPTemplate Themes (Chameleon, Marvin)
------------------------------------------------------------------------------
Because Nodewords depends upon PHPTemplate hooks in order to output the meta
tags it will not work with themes that do not use that template engine, e.g.
the core Chameleon or Marvin themes. In order for these to work a Nodewords
function must be called so it can insert the necessary tags into Drupal's
internal list of head tags. To insert the tags, edit the main theme file, e.g.
chameleon.theme, and insert the following at the top of the hook_page()
implementation, e.g. chameleon_page:

function chameleon_page($content, $show_blocks = TRUE, $show_messages = TRUE) {
  /**
   * Start Nodewords Changes.
   */
  // Allow Nodewords to add its tags to the internal HTML head tags array.
  if (module_exists('nodewords')) {
    $vars = array();
    nodewords_preprocess_page($vars);
  }
  /**
   * End Nodewords Changes.
   */

Once that is added the tags will be inserted into the HTML output as expected.


Known Issues
------------------------------------------------------------------------------
* Meta tags cannot be output with non-PHPTemplate themes like Chameleon or
  Marvin without customization (see above).
* Use of the Open Graph meta tags sub-module requires customizing the
  page.tpl.php file for the site's theme(s) (see above for details).
* Versions 6.x-1.9, 6.x-1.10 and 6.x-1.11 had a severe bug that could cause
  data loss when updating from 6.x-1.8 or older. The problem was in how
  nodewords_update_6162() changed the format of the 'id' field, causing records
  with an 'id' (nid, tid, uid) over 65,536 to be lost. The bug has been fixed
  in this release but any data lost as a result of this bug is irretrievable.
  The maintainers are terribly sorry about this and humbly apologize if your
  site(s) suffered data loss as a result of this and vow to do our utmost to
  ensure errors of this magnitude never happen again.


Related modules
------------------------------------------------------------------------------
Starting from nodewords-5.x-1.9 the following modules extend the nodewords
functionality:

- Meta tags Node Type, by Ariel Barreiro
- Meta Tags by Path, by Shannon Lucas

The latest development snapshot (6.x-1.x-dev), and version 6.x-1.1 or higher
implement a functionality similar to the one implemented in the module
Meta Tags by Path, which is not anymore required for those versions.

To assure compatibility between Nodewords and Meta tags Node Type, use the
latest version available of Nodewords and Meta tags Node Type; previous
versions were not compatible with the recent changes in Nodewords.


Credits / Contact
------------------------------------------------------------------------------
The current maintainers are Damien McKenna [5] and Dave Reid [6].

The original author of this module is Andras Barthazi. Mike Carter [7],
Gabor Hojtsy [8] and Robrecht Jacques [9] provided some feature enhancements,
while Alberto Paderno [10] maintained the module for much of its Drupal 6
lifecycle.

The best way to contact the authors is to submit an issue, be it a support
request, a feature request or a bug report, in the project issue queue:
  http://drupal.org/project/issues/nodewords


References
------------------------------------------------------------------------------
[1] http://drupal.org/project/nodewords_nodetype
[2] http://drupal.org/project/domain_meta
[3] http://drupal.org/project/domain
[4] http://drupal.org/documentation/install/modules-themes/modules-5-6
[5] http://drupal.org/user/108450
[6] http://drupal.org/user/53892
[7] http://drupal.org/user/13164
[8] http://drupal.org/user/4166
[9] http://drupal.org/user/22598
[10] http://drupal.org/user/55077
