<?php
/** op-unit-git:/GitBranch.class.php
 *
 * @created    2023-02-17
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
namespace OP\UNIT\Git;

/** use
 *
 */
use OP\OP_CI;
use OP\OP_CORE;
use OP\IF_UNIT;

/** GitBranch
 *
 * @created    2023-02-17
 * @version    1.0
 * @package    op-unit-git
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
 */
class GitBranch implements IF_UNIT
{
	/** use
	 *
	 */
	use OP_CORE, OP_CI;

	/** Add branch repository.
	 *
	 * @created    2023-02-13
	 * @param      string      $name
	 * @param      string      $url
	 * @return     string
	 */
	static function Add(string $name, string $url)
	{
		return `git branch add {$name} $url`;
	}

	/** Delete branch repository.
	 *
	 * @created    2023-02-13
	 * @param      string      $name
	 * @param      string      $url
	 * @return     string
	 */
	static function Delete(string $name)
	{
		return `git branch rm {$name}`;
	}

	/** Rename branch repository.
	 *
	 * @created    2023-02-13
	 * @param      string      $from
	 * @param      string      $to
	 * @return     string
	 */
	static function Rename(string $from, string $to)
	{
		return `git branch rename {$from} {$to}`;
	}

	/** Return branch repository name list.
	 *
	 * @created    2023-02-13
	 * @return     string
	 */
	static function List()
	{
		return explode("\n", trim(`git branch`));
	}

	/** Check if exists branch name.
	 *
	 * @created    2023-02-13
	 * @param      string      $name
	 * @param      string      $url
	 * @return     string
	 */
	static function isExists(string $name)
	{
		//	...
		$list = self::List();

		//	...
		return (array_search($name, $list) !== false) ? true: false;
	}
}
