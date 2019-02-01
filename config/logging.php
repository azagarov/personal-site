<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 01/02/2019
 * Time: 16:27
 */
return [
	'default' => env('LOG_CHANNEL', 'stack'),

	'channels' => [
		'stack' => [
			'driver' => 'stack',
			'channels' => ['syslog', 'slack', 'single', ],
		],

		'syslog' => [
			'driver' => 'syslog',
			'level' => 'debug',
		],

		'single' => [
			'driver' => 'errorlog',
			'level' => 'debug',
		],

		'slack' => [
			'driver' => 'slack',
			'url' => env('LOG_SLACK_WEBHOOK_URL', 'https://hooks.slack.com/services/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'),
			'username' => 'WebDiver Log',
			'emoji' => ':boom:',
			'level' => 'debug',
		],
	],
];

//https://hooks.slack.com/services/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