--TEST--
PEAR_PackageFile_Generator_v1->toV2(), test other maintainer types
--SKIPIF--
<?php
if (!getenv('PHP_PEAR_RUNTESTS')) {
    echo 'skip';
}
?>
--FILE--
<?php

require_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'setup.php.inc';

$pf = &$parser->parse(implode('', file(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'packagefiles' .
    DIRECTORY_SEPARATOR . 'test_othermaintainers.xml')), dirname(__FILE__) . DIRECTORY_SEPARATOR . 'packagefiles' .
    DIRECTORY_SEPARATOR . 'test_othermaintainers.xml');

$generator = &$pf->getDefaultGenerator();
$e = &$generator->toV2();
$phpunit->assertNoErrors('errors');
$egen = &$e->getDefaultGenerator();
$xml = $egen->toXml();

$phpunit->assertEquals('<?xml version="1.0" encoding="UTF-8"?>
<package packagerversion="' . $egen->getPackagerVersion() . '" version="2.0" xmlns="http://pear.php.net/dtd/package-2.0" xmlns:tasks="http://pear.php.net/dtd/tasks-1.0" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://pear.php.net/dtd/tasks-1.0
http://pear.php.net/dtd/tasks-1.0.xsd
http://pear.php.net/dtd/package-2.0
http://pear.php.net/dtd/package-2.0.xsd">
 <name>foo</name>
 <channel>pear.php.net</channel>
 <summary>foo</summary>
 <description>foo
hi there
 
 </description>
 <lead>
  <name>person</name>
  <user>single</user>
  <email>joe@example.com</email>
  <active>yes</active>
 </lead>
 <developer>
  <name>person1</name>
  <user>single1</user>
  <email>joe1@example.com</email>
  <active>yes</active>
 </developer>
 <contributor>
  <name>person2</name>
  <user>single2</user>
  <email>joe2@example.com</email>
  <active>yes</active>
 </contributor>
 <helper>
  <name>person3</name>
  <user>single3</user>
  <email>joe3@example.com</email>
  <active>yes</active>
 </helper>
 <date>' . date('Y-m-d') . '</date>
 <time>' . $e->getTime() . '</time>
 <version>
  <release>1.2.0a1</release>
  <api>1.2.0a1</api>
 </version>
 <stability>
  <release>alpha</release>
  <api>alpha</api>
 </stability>
 <license uri="http://www.php.net/license">PHP License</license>
 <notes>
here are the
multi-line
release notes
 </notes>
 <contents>
  <dir name="/">
   <dir name="sunger">
    <file baseinstalldir="freeb" md5sum="8332264d2e0e3c3091ebd6d8cee5d3a3" name="foo.dat" role="data" />
   </dir> <!-- //sunger -->
   <file baseinstalldir="freeb" md5sum="8332264d2e0e3c3091ebd6d8cee5d3a3" name="foo.php" role="php">
    <tasks:replace from="@pv@" to="version" type="package-info" />
   </file>
  </dir> <!-- / -->
 </contents>
 <dependencies>
  <required>
   <php>
    <min>4.3.0</min>
   </php>
   <pearinstaller>
    <min>1.4.0b1</min>
   </pearinstaller>
   <package>
    <name>Console_Getopt</name>
    <channel>pear.php.net</channel>
    <max>1.2</max>
    <exclude>1.2</exclude>
   </package>
  </required>
  <optional>
   <extension>
    <name>xmlrpc</name>
    <min>1.0</min>
   </extension>
  </optional>
 </dependencies>
 <phprelease>
  <filelist>
   <install as="merbl.php" name="foo.php" />
  </filelist>
 </phprelease>
 <changelog>
  <release>
   <version>
    <release>1.3.3</release>
    <api>1.3.3</api>
   </version>
   <stability>
    <release>stable</release>
    <api>stable</api>
   </stability>
   <date>2004-10-28</date>
   <license uri="http://www.php.net/license">PHP License</license>
   <notes>
Installer:
 * fix Bug #1186 raise a notice error on PEAR::Common $_packageName
 * fix Bug #1249 display the right state when using --force option
 * fix Bug #2189 upgrade-all stops if dependancy fails
 * fix Bug #1637 The use of interface causes warnings when packaging with PEAR
 * fix Bug #1420 Parser bug for T_DOUBLE_COLON
 * fix Request #2220 pear5 build fails on dual php4/php5 system
 * fix Bug #1163  pear makerpm fails with packages that supply role=&quot;doc&quot;

Other:
 * add PEAR_Exception class for PHP5 users
 * fix critical problem in package.xml for linux in 1.3.2
 * fix staticPopCallback() in PEAR_ErrorStack
 * fix warning in PEAR_Registry for windows 98 users
   </notes>
  </release>
  <release>
   <version>
    <release>1.3.2</release>
    <api>1.3.2</api>
   </version>
   <stability>
    <release>stable</release>
    <api>stable</api>
   </stability>
   <date>2004-10-28</date>
   <license uri="http://www.php.net/license">PHP License</license>
   <notes>
Installer:
 * fix Bug #1186 raise a notice error on PEAR::Common $_packageName
 * fix Bug #1249 display the right state when using --force option
 * fix Bug #2189 upgrade-all stops if dependancy fails
 * fix Bug #1637 The use of interface causes warnings when packaging with PEAR
 * fix Bug #1420 Parser bug for T_DOUBLE_COLON
 * fix Request #2220 pear5 build fails on dual php4/php5 system
 * fix Bug #1163  pear makerpm fails with packages that supply role=&quot;doc&quot;

Other:
 * add PEAR_Exception class for PHP5 users
 * fix critical problem in package.xml for linux in 1.3.2
 * fix staticPopCallback() in PEAR_ErrorStack
 * fix warning in PEAR_Registry for windows 98 users
   </notes>
  </release>
 </changelog>
</package>
', $xml, 'xml');

$pf = &$parser->parse(implode('', file(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'packagefiles' .
    DIRECTORY_SEPARATOR . 'test_othermaintainersmultiple.xml')), dirname(__FILE__) . DIRECTORY_SEPARATOR . 'packagefiles' .
    DIRECTORY_SEPARATOR . 'test_othermaintainersmultiple.xml');
$generator = &$pf->getDefaultGenerator();
$e = &$generator->toV2();
$phpunit->assertNoErrors('errors2');
$egen = &$e->getDefaultGenerator();
$xml = $egen->toXml();
$phpunit->assertEquals('<?xml version="1.0" encoding="UTF-8"?>
<package packagerversion="' . $egen->getPackagerVersion() . '" version="2.0" xmlns="http://pear.php.net/dtd/package-2.0" xmlns:tasks="http://pear.php.net/dtd/tasks-1.0" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://pear.php.net/dtd/tasks-1.0
http://pear.php.net/dtd/tasks-1.0.xsd
http://pear.php.net/dtd/package-2.0
http://pear.php.net/dtd/package-2.0.xsd">
 <name>foo</name>
 <channel>pear.php.net</channel>
 <summary>foo</summary>
 <description>foo
hi there
 
 </description>
 <lead>
  <name>person</name>
  <user>single</user>
  <email>joe@example.com</email>
  <active>yes</active>
 </lead>
 <developer>
  <name>person1</name>
  <user>single1</user>
  <email>joe1@example.com</email>
  <active>yes</active>
 </developer>
 <developer>
  <name>person15</name>
  <user>single15</user>
  <email>joe15@example.com</email>
  <active>yes</active>
 </developer>
 <contributor>
  <name>person2</name>
  <user>single2</user>
  <email>joe2@example.com</email>
  <active>yes</active>
 </contributor>
 <contributor>
  <name>person25</name>
  <user>single25</user>
  <email>joe25@example.com</email>
  <active>yes</active>
 </contributor>
 <helper>
  <name>person3</name>
  <user>single3</user>
  <email>joe3@example.com</email>
  <active>yes</active>
 </helper>
 <helper>
  <name>person35</name>
  <user>single35</user>
  <email>joe35@example.com</email>
  <active>yes</active>
 </helper>
 <date>' . date('Y-m-d') . '</date>
 <time>' . $e->getTime() . '</time>
 <version>
  <release>1.2.0a1</release>
  <api>1.2.0a1</api>
 </version>
 <stability>
  <release>alpha</release>
  <api>alpha</api>
 </stability>
 <license uri="http://www.php.net/license">PHP License</license>
 <notes>
here are the
multi-line
release notes
 </notes>
 <contents>
  <dir name="/">
   <dir name="sunger">
    <file baseinstalldir="freeb" md5sum="8332264d2e0e3c3091ebd6d8cee5d3a3" name="foo.dat" role="data" />
   </dir> <!-- //sunger -->
   <file baseinstalldir="freeb" md5sum="8332264d2e0e3c3091ebd6d8cee5d3a3" name="foo.php" role="php">
    <tasks:replace from="@pv@" to="version" type="package-info" />
   </file>
  </dir> <!-- / -->
 </contents>
 <dependencies>
  <required>
   <php>
    <min>4.3.0</min>
   </php>
   <pearinstaller>
    <min>1.4.0b1</min>
   </pearinstaller>
   <package>
    <name>Console_Getopt</name>
    <channel>pear.php.net</channel>
    <max>1.2</max>
    <exclude>1.2</exclude>
   </package>
  </required>
  <optional>
   <extension>
    <name>xmlrpc</name>
    <min>1.0</min>
   </extension>
  </optional>
 </dependencies>
 <phprelease>
  <filelist>
   <install as="merbl.php" name="foo.php" />
  </filelist>
 </phprelease>
 <changelog>
  <release>
   <version>
    <release>1.3.3</release>
    <api>1.3.3</api>
   </version>
   <stability>
    <release>stable</release>
    <api>stable</api>
   </stability>
   <date>2004-10-28</date>
   <license uri="http://www.php.net/license">PHP License</license>
   <notes>
Installer:
 * fix Bug #1186 raise a notice error on PEAR::Common $_packageName
 * fix Bug #1249 display the right state when using --force option
 * fix Bug #2189 upgrade-all stops if dependancy fails
 * fix Bug #1637 The use of interface causes warnings when packaging with PEAR
 * fix Bug #1420 Parser bug for T_DOUBLE_COLON
 * fix Request #2220 pear5 build fails on dual php4/php5 system
 * fix Bug #1163  pear makerpm fails with packages that supply role=&quot;doc&quot;

Other:
 * add PEAR_Exception class for PHP5 users
 * fix critical problem in package.xml for linux in 1.3.2
 * fix staticPopCallback() in PEAR_ErrorStack
 * fix warning in PEAR_Registry for windows 98 users
   </notes>
  </release>
  <release>
   <version>
    <release>1.3.2</release>
    <api>1.3.2</api>
   </version>
   <stability>
    <release>stable</release>
    <api>stable</api>
   </stability>
   <date>2004-10-28</date>
   <license uri="http://www.php.net/license">PHP License</license>
   <notes>
Installer:
 * fix Bug #1186 raise a notice error on PEAR::Common $_packageName
 * fix Bug #1249 display the right state when using --force option
 * fix Bug #2189 upgrade-all stops if dependancy fails
 * fix Bug #1637 The use of interface causes warnings when packaging with PEAR
 * fix Bug #1420 Parser bug for T_DOUBLE_COLON
 * fix Request #2220 pear5 build fails on dual php4/php5 system
 * fix Bug #1163  pear makerpm fails with packages that supply role=&quot;doc&quot;

Other:
 * add PEAR_Exception class for PHP5 users
 * fix critical problem in package.xml for linux in 1.3.2
 * fix staticPopCallback() in PEAR_ErrorStack
 * fix warning in PEAR_Registry for windows 98 users
   </notes>
  </release>
 </changelog>
</package>
', $xml, 'xml2');
echo 'tests done';
?>
--CLEAN--
<?php
require_once dirname(dirname(__FILE__)) . '/teardown.php.inc';
?>
--EXPECT--
tests done
