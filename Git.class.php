<?php
/** op-unit-git:/Git.class.php
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
namespace OP\UNIT;

/** use
 *
 */
use Exception;
use OP\IF_UNIT;
use OP\OP_CORE;
use OP\OP_CI;

/** Git
 *
 * @created    2023-01-30
 * @version    1.0
 * @package    op-unit-git
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
 */
class Git implements IF_UNIT
{
	/** use
	 *
	 */
	use OP_CORE, OP_CI;

	/** Get submodule config.
	 *
	 * @created    2023-01-02
	 * @moved      2023-01-30  op-cd:/Git.class.php
	 * @param      bool        $current
	 * @throws     Exception
	 * @return     array
	 */
	static function SubmoduleConfig(?bool $current=true) : array
	{
		//	...
		$file_name = $current ? '.gitmodules': '.gitmodules_original';
		$file_path = OP()->MetaRoot('git') . $file_name;

		//	Get submodule settings.
		if(!file_exists($file_path) ){
			throw new Exception("This file does not exist. ($file_path)");
		}

		//	Get submodule settings from file.
		if(!$file = file_get_contents($file_path) ){
			throw new Exception("Could not read this file. ($file_path)");
		}

		//	Parse submodule settings.
		$source = explode("\n", $file);

		//	Parse the submodule settings.
		$configs = [];
		while( $line = array_shift($source) ){
			//	[submodule "asset/core"]
			$name = substr($line, 12, -2);
			$name = str_replace('/', '-', $name);

			//	path, url, branch
			for($i=0; $i<3; $i++){
				list($key, $var) = explode("=", array_shift($source));
				$configs[$name][ trim($key) ] = trim($var);
			}
		}

		//	...
		return $configs;
	}

	/** Get branch name list
	 *
	 * @created    2023-02-05
	 * @return     array       $branches
	 */
	static function Branches():array
	{
		//	...
		$return = [];
		//	...
		foreach( explode("\n", `git branch`) as $branch ){
			//	...
			if(empty($branch)){
				continue;
			}
			//	...
			$return[] = substr($branch, 2);
		}
		//	...
		return $return;
	}

	/** Return Commit ID by branch name.
	 *
	 * @see https://prograshi.com/general/git/show-ref-and-rev-parse/
	 * @created    2023-02-05
	 * @param      string      $branch_name
	 * @return     string
	 */
	static function CommitID(string $branch_name) : string
	{
		//	...
		$branches = self::Branches();
		//	...
		if( array_search($branch_name, $branches) === false ){
			throw new Exception("This branch name is not exists. ($branch_name)");
		}
		//	...
		return trim(`git rev-parse {$branch_name}`);
	}

	/** Switch to branch
	 *
	 * @created    2023-02-05
	 * @param      string      $branch_name
	 */
	static function Switch(string $branch_name):void
	{
		//	...
		if( self::CurrentBranch() === $branch_name ){
			return;
		}

		//	...
		echo trim(`git switch {$branch_name} 2>&1`);
	}

	/** Push of branch
	 *
	 * @created    2023-02-05
	 * @param      string      $branch_name
	 */
	static function Push(string $remote_name, string $branch_name):void
	{
		echo trim(`git push {$remote_name} {$branch_name} 2>&1`);
	}

	/** Get current branch name.
	 *
	 * @created    2023-01-06
	 * @return     string
	 */
	static function CurrentBranch():string
	{
		return trim(`git rev-parse --abbrev-ref HEAD 2>&1`);
	}

	/** Get current commit ID.
	 *
	 * @created    2023-01-06
	 * @return     string
	 */
	static function CurrentCommitID():string
	{
		return trim(`git show --format='%H' --no-patch 2>&1`);
	}
}
