<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$icon = array(	'dashboard'				=>	'<i class="fa fa-home"></i>',
				'user_management'		=>	'<i class="fa fa-user"></i>',
				'next'					=>	'<i class="fa fa-angle-left pull-right"></i>',
				'shop_management'		=>	'<i class="fa fa-shopping-cart"></i>',
				'product_management'	=>	'<i class="fa fa-cube"></i>',
				'order_management'		=>	'<i class="fa fa-shopping-cart"></i>',
				'ad_management'			=>	'<i class="fa fa-bullhorn"></i>',
				'user_management'		=>	'<i class="fa fa-user"></i>',
				'settings'				=>	'<i class="fa fa-gear"></i>');

$dashboard = array(	'url' 		=> 	'base_url("admin/dashboard")',
					'icon'		=>	$icon['dashboard'],
					'isParent'	=>	true);

$user_management = array( 'url'		=>	'base_url("admin/user")',
						  'icon'	=>	$icon['user_management'],
						  'isParent'	=>	true);



$config['admin_menu'] = '';

