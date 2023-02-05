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

//	SubmoduleConfig
$args   = true;
$result = OP::Unit('Git')->SubmoduleConfig(true);
$ci->Set('SubmoduleConfig', $result, $args);

//	CommitID
$args   = 'master';
$result = trim(`git rev-parse master`);
$ci->Set('CommitID', $result, $args);

//	Branches
$args   =  null;
$result = ['2022','master'];
$ci->Set('Branches', $result, $args);

//	Switch
$args   = '2022';
$result =  null;
$ci->Set('Switch', $result, $args);

//	Push
$args   = '2022';
$result =  null;
$ci->Set('Push', $result, $args);

//	...
return $ci->GenerateConfig();
