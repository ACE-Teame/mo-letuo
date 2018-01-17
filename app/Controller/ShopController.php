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


    public function cityList()
    {
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
        $where['pid'] = 0;
        $data['count']     = parent::$model->count('shop', $where);
        $where['LIMIT']    = [$offset, $pageNum];

        $data['cityList'] = parent::$model->select('shop', ['shop_id', 'city_name'], $where);
        
        // 分页处理
        $objPage           = new page($data['count'], $pageNum, $now_page, '?page={page}' . $parameter);
        $data['pageNum']   = $pageNum;
        $data['pageList']  = $objPage->myde_write();
        // 整理数据
        // $this->_arrangeData($data['orderData']);
        
        // 取出导出uri参数
        if($parameter) {
            $data['exportUri'] = '?' . ltrim($parameter, '&');
        }

        if($now_page == 1) {
            $data['number'] = 1;
        }else {
            $data['number'] = $pageNum * ($now_page - 1) + 1;
        }

        view('admin/city', $data);
    }

    public function modifyCity()
    {
        $postData = post();

        // 插入
        if ($postData['type'] == 'add') {
            parent::$model->insert('shop', [
                'city_name' => $postData['city_name'],
                'pid'       => 0,
            ]);
            echo "<script>alert('添加成功')</script>";
        } else if ($postData['type'] == 'edit') { // 修改
            $shopId = intval($postData['shop_id']);
            if ($shopId) {
                parent::$model->update('shop', ['city_name' => $postData['city_name']], ['shop_id' => $shopId]);
            }
        }
        redirect('shop/cityList');
    }

    public function delShop()
    {
        $shopId = intval(post('shop_id'));
        if ($shopId) {
            parent::$model->delete('shop', ['shop_id' => $shopId]);
            ajaxReturn(200);
        }
    }

    private function _arrangeData(&$data)
    {
        foreach ($data as $key => $val) {
            $data[$key]['city_name'] = parent::$model->select('shop', 'city_name', ['shop_id' => $val['pid']])[0];
        }
    }

    /**
     * 后台首页
     */
    public function shopList()
    {

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
        $where['pid[!]'] = 0;
        $data['count']     = parent::$model->count('shop', $where);
        $where['LIMIT']    = [$offset, $pageNum];

        $data['shopList'] = parent::$model->select('shop', ['shop_id', 'shop_name', 'shop_address', 'shop_mobile', 'pid'], $where);
        
        // 分页处理
        $objPage           = new page($data['count'], $pageNum, $now_page, '?page={page}' . $parameter);
        $data['pageNum']   = $pageNum;
        $data['pageList']  = $objPage->myde_write();
        // 整理数据
        $this->_arrangeData($data['shopList']);
        
        // 取出导出uri参数
        if($parameter) {
            $data['exportUri'] = '?' . ltrim($parameter, '&');
        }

        if($now_page == 1) {
            $data['number'] = 1;
        }else {
            $data['number'] = $pageNum * ($now_page - 1) + 1;
        }

        // 取出城市列表
        $data['cityList'] = parent::$model->select('shop', ['shop_id', 'city_name'], ['pid' => 0]);

        view('admin/shop', $data);
    }

    public function modifyShop()
    {
        $postData = post();
        // dump($postData);exit;
        // 插入
        if ($postData['type'] == 'add') {
            parent::$model->insert('shop', [
                'shop_name'    => $postData['shop_name'],
                'shop_address' => $postData['shop_address'],
                'shop_mobile'  => $postData['shop_mobile'],
                'pid'          => $postData['city_id'],
            ]);
            if (parent::$model->id()) {
                ajaxReturn(200, '添加');
            }
        } else if ($postData['type'] == 'edit') { // 修改
            $shopId = intval($postData['shop_id']);
            if ($shopId) {
                $postData['pid'] = $postData['city_id'];
                unset($postData['shop_id'], $postData['type'], $postData['city_id']);
                parent::$model->update('shop', $postData, ['shop_id' => $shopId]);
                ajaxReturn(200, '修改');
            }
        }
        ajaxReturn(400);
    }

    public function byPkGetShop()
    {
        $shopId = intval(get('shop_id'));
        if ($shopId) {
            $shopInfo = parent::$model->select('shop', ['shop_name', 'pid', 'shop_address', 'shop_mobile'], ['shop_id' => $shopId])[0];
            if ($shopInfo && is_array($shopInfo)) {
                ajaxReturn($shopInfo);
            }
        }
    }
}