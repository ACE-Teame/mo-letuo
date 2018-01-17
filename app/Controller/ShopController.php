<?php 
namespace app\Controller;

use app\core\Wb_Controller;
use system\core\Config;
use system\core\Page;

/**
 * 后台控制器
 */
class ShopController extends Wb_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 后台首页
     */
    public function shopList()
    {
        view('admin/shop');
    }

    public function cityList()
    {
        view('admin/city');
    }

    
}