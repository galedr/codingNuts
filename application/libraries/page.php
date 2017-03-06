<?php
error_reporting(0);
class Page
{	
	//總筆數
	public $total_rows;
	//每頁筆數
	public $per_page;
	//總頁數
	public $total_pages;
	//當前頁數
	public $num_page;

	public $prev;

	public $next;
	// url 字串
	public $url = '';

	public function __construct($total_rows, $per_page, $num_page = 0, $args = array())
	{
		$this->total_rows = $total_rows;

		$this->per_page = $per_page;

		$this->total_pages = ceil($this->total_rows / $this->per_page);

		$this->num_page = empty($num_page) ? 1 : $num_page;

		$this->prev = $this->get_prev_page();

		$this->next = $this->get_next_page();

		$this->base_url = self::get_base_url($args);
	}
	//
	public function set_url_param($args)
	{
		if (is_array($args)) {
			$this->url_param = "?" . $this->make_url_query($args);
			return true;
		}

		$this->url_param = "?" . $args;
	}

	public function make_url_query($query)
	{
		if (empty($query)) {
			return '';
		}

		$url_query = array();

		foreach ($query as $key => $value) {
			$url_query[] = $key."=".$value;
		}

		$url_query = implode("&", $url_query);

		return $url_query;

	}

	public static function get_base_url($args = array())
	{
		$base_url = base_url();

		if (!empty($args)) {
			
			$url_key = implode("/", $args);
			$base_url .= $url_key."/";

		}

		return $base_url;
	}

	public function get_cur_url($num_page)
	{
		return $this->base_url.$num_page.$this->url_param;
	}

	public function get_prev_page()
	{	
		return (($this->num_page - 1) >= 1) ? $this->num_page - 1 : false;
	}
	// 取得前一頁的url網址 ： base_url + 頁數 + GET傳值url串
	public function get_prev_url()
	{
		return $this->base_url.$this->prev.$this->url_param;
	}

	public function get_next_page()
	{	 
		return $this->num_page + 1 > $this->total_pages ? false : $this->num_page + 1;
	}

	public function get_next_url()
	{	
		return $this->base_url.$this->next.$this->url_param;
	}

	public function show_page_num($range = 5)
	{
		if (empty($range)) {
			return array($this->num_page);
		}

		$pagi_quantity = array();

		if (($this->num_page - $range - 1) <= 0) {
			$range += abs($this->num_page - $range - 1);
		} elseif (($this->num_page + $range - $this->total_pages) > 0) {
			$range += abs($this->num_page + $range - $this->total_pages);
		}

		// 當前頁左邊頁數，數量 = range
		$int = 0;
		$i = 0;
		for ($i = 1; $i <= $range; $i++) { 
			$int += -1;
			$count = $this->num_page + $int;
			if ($count < 1) {
				break;
			}

			$pagi_quantity[] = $count;
		}

		$pagi_quantity[] = $this->num_page;

		// 當前頁右邊頁數，數量 = range
		$int = 0;
		$i = 0;
		for ($i = 0; $i <= $range ; $i++) { 
			$int += 1;
			$count = $this->num_page + $int;
			if ($count > $this->total_pages) {
				break;
			}

			$pagi_quantity[] = $count;
		}

		sort($pagi_quantity);

		return $pagi_quantity;

	}

}





?>