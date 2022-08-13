<?php
/*
 * This file is part of the CLIFramework package.
 *
 * (c) Yo-An Lin <cornelius.howl@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */
namespace CLIFramework;

use ReflectionClass;

class Utils
{
	public static function getKeywords() {
		return ['abstract', 'and', 'array', 'as', 'break', 'callable', 'case', 'catch', 'class', 'clone', 'const', 'continue', 'declare', 'default', 'die', 'do', 'echo', 'else', 'elseif', 'empty', 'enddeclare', 'endfor', 'endforeach', 'endif', 'endswitch', 'endwhile', 'eval', 'exit', 'extends', 'final', 'for', 'foreach', 'function', 'global', 'goto', 'if', 'implements', 'include', 'instanceof', 'insteadof', 'interface', 'isset', 'list', 'namespace', 'new', 'or', 'print', 'private', 'protected', 'public', 'require', 'return', 'static', 'switch', 'throw', 'trait', 'try', 'unset', 'use', 'var', 'while', 'xor'];
	}

    /**
     * translate command name to class name
     *
     * so something like:   to-list will be ToListCommand
     *
     * */
    public static function translateCommandClassName($command)
    {
        if (in_array($command, self::getKeywords())) {
			$command .= 'Command';
        }
        $args = explode('-', $command);
        foreach ($args as & $a) {
            $a = ucfirst($a);
        }
        $subclass = join('', $args);

        return $subclass;
    }

    public static function getClassPath($class, $baseDir = null)
    {
        $refclass = new ReflectionClass($class);
        $path = $refclass->getFilename();
        if ($path && $baseDir) {
            return str_replace(
                rtrim(realpath($baseDir), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR,
                '',
                $path);
        }
        return $path;
    }
}
