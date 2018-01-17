<?php echo view('admin/header') ?>
    <div class="container clear">
        <?php echo view('admin/sidebar') ?>
        <div class="main fr">
            <h1>门店管理</h1>
            <div class="operate">
                <a href="#" class="btn add">新增</a>
            </div>

            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>序号</th>
                            <th>城市</th>
                            <th>门店名</th>
                            <th>地址</th>
                            <th>电话</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($shopList as $key => $shop): ?>
                        <tr>
                            <td><?=$number++ ?></td>
                            <td><?=$shop['city_name']?></td>
                            <td><?=$shop['shop_name']?></td>
                            <td><?=$shop['shop_address']?></td>
                            <td><?=$shop['shop_mobile']?></td>
                            <td>
                                <a href="javascript:;" class="btn modify" onClick="shop_modify(<?=$shop['shop_id']?>)">修改</a>
                                <a href="javascript:;" class="btn delete" onclick="delete_by_id(<?=$shop['shop_id']?>)">删除</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <div class="paginate">
                    <ul class="clear">
                       <!-- <?php if ($count > $pageNum): ?>
                            <?=$pageList?>
                        <?php endif ?> -->
                    </ul>
                </div>
            </div> <!-- end table -->
        </div><!-- end main -->

        <div class="popup">
            <div class="content">
                <div class="title"><i class="iconfont icon-modify"></i> 编辑</div>
                <div class="form" id="div-form">
                    <form action="<?=base_url('shop/modifyShop')?>" class="operateForm" method="POST" id="shop-form" name="adduser">
                        <div class="entry">
                            <input type="hidden" name="shop_id" id="shop_id" value="">
                        </div>
                        <div class="entry">
                            <label>城市:</label>
                            <select name="city_id" id="city_id">
                                <?php foreach ($cityList as $key => $city): ?>
                                <option value="<?=$city['shop_id']?>"><?=$city['city_name']?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="entry">
                            <label>门店名:</label>
                            <input type="text" name="shop_name" id="shop_name" value="" placeholder="">
                        </div>
                        <div class="entry">
                            <label>地址:</label>
                            <input type="text" name="shop_address" id="shop_address" value="" placeholder="">
                        </div>
                        <div class="entry">
                            <label>电话:</label>
                            <input type="text" name="shop_mobile" id="shop_mobile" value="" placeholder="">
                        </div>
                        <input type="hidden" name="type" id="modify-type" value="add">
                    </form>
                </div>
                <div class="operate">
                    <!-- <a href="javascript:document.adduser.submit();" onclick="save()" class="btn save">保存</a> -->
                    <a href="javascript:;" onclick="save()" class="btn save">保存</a>
                    <a href="javascript:;" class="btn cancle" onClick="cancel()">取消</a>
                </div>          
                <div class="close"><a href="#" class="btn-close"><i class="iconfont icon-close"></i></a></div> 
            </div>
        </div><!-- end popup -->
    </div>
    <script>
        var div_form = $("#div-form").html();
        /**
         * 修改时获取数据
         */
        function shop_modify(shop_id)
        {
            $.get('<?=base_url('shop/byPkGetShop')?>',{shop_id:shop_id}, function(data) {
                if(data) {
                    $("#shop_id").val(shop_id);
                    $("#city_id").val(data.pid);
                    $("#shop_name").val(data.shop_name);
                    $("#shop_address").val(data.shop_address);
                    $("#shop_mobile").val(data.shop_mobile);
                    $("#modify-type").val('edit');
                }
            }, 'JSON');
        }

        /**
         * 取消 清空数据
         */
        function cancel()
        {
            $("#div-form").html(div_form);
        }

        /**
         * 根据ID删除数据
         */
        function delete_by_id(shop_id)
        {
            if (confirm('确定删除？') == true) {
                $.post('<?=base_url('shop/delShop')?>', {shop_id: shop_id}, function(data) {
                    if (data.status == 200) {
                        alert('删除成功');
                        location.href = "<?=base_url('shop/shopList')?>";
                    } else {
                        alert('删除失败，请刷新重试');
                    }
                }, 'JSON');
            }
        }

        function save()
        {
            $.post('<?=base_url('shop/modifyShop')?>', $("#shop-form").serialize(), function(data) {
                if (data.status == 200) {
                    alert(data.msg + '成功');
                    location.href = "<?=base_url('shop/shopList')?>";
                }
            }, 'JSON');
        }
    </script>
<?php echo view('admin/footer') ?>

