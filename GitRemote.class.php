<?php
/** op-unit-git:/GitRemote.class.php
 *
 * @created    2023-02-13
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

/** GitRemote
 *
 * @created    2023-02-13
 * @version    1.0
 * @package    op-unit-git
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
 */
class GitRemote implements IF_UNIT
{
	/** use
	 *
	 */
	use OP_CORE, OP_CI;

	/** Add remote repository.
	 *
	 * @created    2023-02-13
	 * @param      string      $name
	 * @param      string      $url
	 * @return     string
	 */
	static function Add(string $name, string $url)
	{
		return `git remote add {$name} $url`;
	}

	/** Delete remote repository.
	 *
	 * @created    2023-02-13
	 * @param      string      $name
	 * @param      string      $url
	 * @return     string
	 */
	static function Delete(string $name)
	{
		return `git remote rm {$name}`;
	}

	/** Rename remote repository.
	 *
	 * @created    2023-02-13
	 * @param      string      $from
	 * @param      string      $to
	 * @return     string
	 */
	static function Rename(string $from, string $to)
	{
		return `git remote rename {$from} {$to}`;
	}

	/** Return remote repository name list.
	 *
	 * @created    2023-02-13
	 * @return     array
	 */
	static function List():array
	{
		return explode("\n", trim(`git remote`));
	}

	/** Check if exists remote name.
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
