<?php
/** op-unit-git:/ci/Git.php
 *
 * @created    2023-01-30
 * @version    1.0
 * @package    op-unit-git
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
 */

/** Declare strict
 *
 */
declare(strict_types=1);

/** namespace
 *
 */
namespace OP;

//	...
$ci = new CI();

//	Root
$args   = null;
$result = RootPath('app');
$ci->Set('Root', $result, $args);

//	...
return $ci->GenerateConfig();
