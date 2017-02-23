<?php
if ( ! defined('BASEPATH') )
    exit( 'No direct script access allowed' );

class Setsession
{

	public function __construct()
	{
		session_start();
	}

	public function admin_set($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	public function admin_unset()
	{
		unset($_SESSION['codingNuts_admin']);
	}

	public function member_set($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	public function member_unset()
	{
		unset($_SESSION['codingNuts_member']);
	}

	public function set_collect($a_id, $m_account)
	{	
		$_SESSION['article_collect'][$m_account][$a_id] = true;
	}

	public function unset_collect($a_id, $m_account)
	{
		unset($_SESSION['article_collect'][$m_account][$a_id]);
	}


}




?>