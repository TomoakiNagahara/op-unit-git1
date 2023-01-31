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
use OP\IF_UNIT;
use OP\OP_CORE;
use OP\OP_CI;
use function OP\RootPath;

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

	/** Get git root path.
	 *
	 * @created    2023-01-30
	 * @return     string
	 */
	static function Root() : string
	{
		return RootPath('app');
	}
}
