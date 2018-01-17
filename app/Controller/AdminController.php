<?php 
namespace app\Controller;

use app\core\Wb_Controller;
use system\core\Config;
use system\core\Page;

/**
 * 后台控制器
 */
class AdminController extends Wb_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 后台首页
     */
    public function index()
    {
        view('admin/index');
    }

    /**
     * 数据整理
     * @param  array &$data 待整理数据
     */
    public function _arrangeData( &$data )
    {
        foreach ($data as $key => $val) {
            $data[$key]['city_name'] = parent::$model->select('shop', 'city_name', ['shop_id' => $val['city_id']])[0];
            $data[$key]['shop_name'] = parent::$model->select('shop', 'shop_name', ['shop_id' => $val['shop_id']])[0];
        }
    }

    /**
     * 拼接查询条件
     * @return array
     */
    public function _getOrderSearch()
    {
        if(get('username')) {
            $where['username[~]'] = get('username');
        }
        if(get('city_id')) {
            $where['city_id'] = get('city_id');            
        }
        if(get('shop_id')) {
            $where['shop_id'] = get('shop_id');
        }
        if(get('c')) {
            $where['c[~]'] = get('c');
        }
        if(get('start_date') || get('end_date')) {
            $where['time[<>]'] = [strtotime(get('start_date')), strtotime(get('end_date'))];
        }
        return $where;
    }

    /**
     * 申请列表
     */
    public function orderList()
    {
        // 取出查询条件
        $where = $this->_getOrderSearch();
        // 取出查询参数uri
        $parameter = getSearchParam();
        if(isset($_GET['page'])) {
            $now_page = intval($_GET['page']) ? intval($_GET['page']) : 1;
        }else {
            $now_page = 1;
        }
        // 取得每页条数
        $pageNum           = Config::get('PAGE_NUM', 'page');
        // 计算偏移量
        $offset            = $pageNum * ($now_page - 1);

        $data['count']     = parent::$model->count('order', $where);
        $where['LIMIT']    = [$offset, $pageNum];

        $data['orderData'] = parent::$model->select('order', '*', $where);
        
        // 分页处理
        $objPage           = new page($data['count'], $pageNum, $now_page, '?page={page}' . $parameter);
        $data['pageNum']   = $pageNum;
        $data['pageList']  = $objPage->myde_write();
        // 整理数据
        $this->_arrangeData($data['orderData']);
        
        // 取出导出uri参数
        if($parameter) {
            $data['exportUri'] = '?' . ltrim($parameter, '&');
        }

        if($now_page == 1) {
            $data['number'] = 1;
        }else {
            $data['number'] = $pageNum * ($now_page - 1) + 1;
        }

        /**
         * 取出城市列表 和 默认第一个城市的门店
         */
        $data['cityList'] = parent::$model->select('shop', ['shop_id', 'city_name'], ['pid' => 0]);
        $data['shopList'] = parent::$model->select('shop', ['shop_id', 'shop_name'], ['pid' => $data['cityList'][0]['shop_id']]);

        view('admin/order', $data);
    }

    /**
     * 删除申请
     */
    public function deleteOrderByIds()
    {
        if(post('order') && is_array(post('order'))) {
            $flag = parent::$model->delete('order', ['id' => post('order')]);
            if($flag) redirect('admin/orderList');
        }
    }

    /**
     * 导出CSV
     */
    public function downloadOrder()
    {
        
        header("Content-Type: application/force-download");
        header("Content-type:text/csv;charset=utf-8");  
        header("Content-Disposition:filename=".date("YmdHis").".csv");

        $where    = $this->_getOrderSearch();
        $orderIds = post('order');
        if($orderIds && is_array($orderIds)) {
            $where['id'] = $orderIds;
        } else {
            $where = $this->_getOrderSearch();
        }
        $orderData  = parent::$model->select('order', '*', $where);
        $this->_arrangeData($orderData);
        echo "\xEF\xBB\xBF子链接,用户名,城市,门店,手机,提交时间\r";
        ob_end_flush();  
        foreach($orderData as $order) {
            
            echo $order['c'] . "," . "\"\t" . $order['username'] . "\",\"\t" . $order['city_name'] . "\",\"\t" . $order['shop_name'] . "\",\"\t" . $order['phone'] ."\",\"\t" . get_date($order['time']). "\"\t\r";  
            flush();  
        }  
    }
}