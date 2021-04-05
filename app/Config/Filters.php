<?php

namespace Config;

use App\Filters\Admin;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use App\Filters\Auth_Filter;


class Filters extends BaseConfig
{
	/**
	 * Configures aliases for Filter classes to
	 * make reading things nicer and simpler.
	 *
	 * @var array
	 */
	public $aliases = [
		'csrf'     => CSRF::class,
		'toolbar'  => DebugToolbar::class,
		'honeypot' => Honeypot::class,
		'Auth_Filter' => Auth_Filter::class,
		'Admin' => Admin::class,
	];

	/**
	 * List of filter aliases that are always
	 * applied before and after every request.
	 *
	 * @var array
	 */
	public $globals = [
		'before' => [
			'Auth_Filter' => ['except' => ['auth', 'auth/*', '/']],

		],
		'after'  => [
			// 'Auth_Filter' => [
			// 	'except' => [
			// 		'home', 'home/*',
			// 		'departemen', 'departemen/*',
			// 		'kategori', 'kategori/*',
			// 		'user', 'user/*',
			// 		'arsip', 'arsip/*',
			// 	],
			// ],
			// 'Admin' => [
			// 	'except' => [
			// 		'user', 'user/*',
			// 	],
			// ],
			'toolbar',
			// 'honeypot',
		],
	];

	/**
	 * List of filter aliases that works on a
	 * particular HTTP method (GET, POST, etc.).
	 *
	 * Example:
	 * 'post' => ['csrf', 'throttle']
	 *
	 * @var array
	 */
	public $methods = [];

	/**
	 * List of filter aliases that should run on any
	 * before or after URI patterns.
	 *
	 * Example:
	 * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
	 *
	 * @var array
	 */
	public $filters = [
		'Admin' => [
			'before' => [
				'user', 'user/*', '/',
			],
		],
	];
}
