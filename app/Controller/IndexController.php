<?php

namespace app\Controller;

use app\core\Home_Controller;
/**
 * 默认控制器
 */
class IndexController extends Home_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
        $data['cityList'] = parent::$model->select('shop', ['shop_id', 'city_name'], ['pid' => 0]);
        $data['shopList'] = parent::$model->select('shop', ['shop_id', 'shop_name'], ['pid' => $data['cityList'][0]['shop_id']]);
        $data['c'] = get('c');

		view('home/index', $data);
	}

    public function getShopList()
    {
        $cityId = intval(post('city_id'));
        if ($cityId) {
            $shopList = parent::$model->select('shop', ['shop_id', 'shop_name'], ['pid' => $cityId]);
            if ($shopList && is_array($shopList)) {
                $html = "<option value=''>---请选择---</option>";
                foreach ($shopList as $shop) {
                    $html .= "<option value='{$shop['shop_id']}'>{$shop['shop_name']}</option>";
                }
            } else {
                $html = "<option value=''>暂无门店</option>";
            }

            ajaxReturn(200, $html);
        }

        ajaxReturn(400);
    }


    /**
     * 验证申请参数
     * @param  array $data 申请参数
     */
    private function _ckeckData($data)
    {
        if(empty($data['username'])) {
            ajaxReturn(202, '请输入姓名');
        }
        if(empty($data['phone'])) {
            ajaxReturn(202, '请输入手机号码');
        }else {
            if($this->checkPhoneNumber($data['phone']) == false) {
                ajaxReturn(202, '请填写正确的手机号码');
            }
        }
        if(empty($data['city_id'])) {
            ajaxReturn(202, '请选择城市');
        }

        if(empty($data['shop_id'])) {
            ajaxReturn(202, '请选择门店');
        }
        unset($data['c']);

        // 根据 姓名+身份证号+手机号判断申请是否存在
        $count = parent::$model->count('order', $data);
        if (!empty($count)) {
            ajaxReturn(202, '申请正在审核中，请勿重复提交！');
        }
    }

    /**
     * 提交申请
     */
    public function submitApplication()
    {
        $postData = post();

        $this->_ckeckData($postData);
        $postData['time'] = time();
        $postData['ip']   = getIp();

        parent::$model->insert('order', $postData);
        if(parent::$model->id()) {
            ajaxReturn(200);
        }else {
            ajaxReturn(202, '申请失败');
        }
    }
}
