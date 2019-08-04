<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$config['api_baseurl'] = 'http://api.hkshopu.com:8000/api/';

//Register
$config['Register']	=	$config['api_baseurl'].'register';

//login
$config['Login']	=	$config['api_baseurl'].'login';

//Logout
$config['Logout']	=	$config['api_baseurl'].'logout';

//User
$config['User']			= 	$config['api_baseurl'].'user';
$config['UserImage']	=	$config['api_baseurl'] . 'userimage';
$config['UserType']		= 	$config['api_baseurl'].'usertype';
$config['UserStatus']		= 	$config['api_baseurl'].'userstatus';
$config['UpdatePassword']	= $config['api_baseurl'].'updatepassword';

//Product
$config['Product']				=	$config['api_baseurl'] . 'product';
$config['ProductCategory']		=	$config['api_baseurl'] . 'productcategory';
$config['ProductImage']			=	$config['api_baseurl'] . 'productimage';
$config['ProductStockAdd']		=	$config['api_baseurl'] . 'productstockadd';
$config['ProductStockRemove']	=	$config['api_baseurl'] . 'productstockremove';
$config['ProductStatus']		= 	$config['api_baseurl'].'productstatus';
$config['ProductStock']		= 	$config['api_baseurl'].'productstock';

//Color
$config['Color']	=	$config['api_baseurl'].'color';

//Size
$config['Size']	=	$config['api_baseurl'].'size';

//Shop
$config['Shop']					=	$config['api_baseurl'] . 'shop';
$config['ShopCategory']			=	$config['api_baseurl'] . 'shopcategory';
$config['ShopImage']			=	$config['api_baseurl'] . 'shopimage';
$config['ShopComment']			=	$config['api_baseurl'] . 'shopcomment';
$config['ShopStatus']			= 	$config['api_baseurl'].'shopstatus';
$config['ShopPaymentMethod']	= 	$config['api_baseurl'].'shoppaymentmethod';
$config['ShopShipment']		 	= 	$config['api_baseurl'].'shopshipment';

//Upload
$config['ImageUpload'] = $config['api_baseurl'] . 'uploadimage';


//News(Blog)
$config['Blog']			=	$config['api_baseurl'] . 'blog';
$config['BlogCategory']	=	$config['api_baseurl'] . 'blogcategory';
$config['BlogComment']	=	$config['api_baseurl'] . 'blogcomment';
$config['BlogStatus']	= 	$config['api_baseurl'].'blogstatus';
$config['BlogImage']	=	$config['api_baseurl'].'blogimage';

//Category Status
$config['CategoryStatus']		= $config['api_baseurl'].'categorystatus';

//Order
$config['Order']		= $config['api_baseurl'].'order';
$config['OrderStatus']	= $config['api_baseurl'].'orderstatus';

//Payment
$config['PaymentStatus']	=	$config['api_baseurl'].'paymentstatus';

//Cart
$config['Cart']		= $config['api_baseurl'].'cart';