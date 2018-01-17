<?php echo view('admin/header') ?>
    <div class="container clear">
        <?php echo view('admin/sidebar') ?>
        <div class="main fr">
            <h1>门店管理</h1>
            <div class="operate">
                <a href="#" class="btn add">新增</a>
            </div>

            <div class="table">
                <form action="" id="del-from" method="GET">
                    <table>
                        <thead>
                            <tr>
                                <th>序号</th>
                                <th>城市</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cityList as $key => $city): ?>
                            <tr>
                                <td><?=$number++ ?></td>
                                <td><?=$city['city_name']?></td>
                                <td>
                                    <a href="javascript:;" class="btn modify" onClick="city_edit(<?=$city['shop_id']?>, '<?=$city['city_name']?>')">修改</a>
                                    <a href="javascript:;" class="btn delete" onClick="delete_by_id(<?=$city['shop_id']?>)">删除</a>
                                </td>
                            </tr>      
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </form>
                <div class="paginate">
                    <ul class="clear">
                        <?php if ($count > $pageNum): ?>
                            <?=$pageList?>
                        <?php endif ?>
                    </ul>
                </div>
            </div> <!-- end table -->
        </div><!-- end main -->

        <div class="popup">
            <div class="content">
                <div class="title"><i class="iconfont icon-modify"></i> 编辑</div>
                <div class="form">                      
                    <form action="<?=base_url('shop/modifyCity')?>" class="operateForm" method="POST" id="from" name="adduser">
                        <div class="entry">
                            <input type="hidden" name="shop_id" id="shop_id" value="">
                        </div>
                        <div class="entry">
                            <label>城市:</label>
                            <input type="text" name="city_name" id="city_name" value="" placeholder="">
                        </div>
                        <input type="hidden" name="type" id="modify-type" value="add">
                    </form>
                </div>
                <div class="operate">
                    <a href="javascript:document.adduser.submit();" class="btn save">保存</a>
                    <a href="javascript:;" class="btn cancle" onClick="cancel()">取消</a>
                </div>          
                <div class="close"><a href="#" class="btn-close"><i class="iconfont icon-close"></i></a></div> 
            </div>
        </div><!-- end popup -->
    </div>
    <script>
        /**
         * 修改时获取数据
         */
        function city_edit(shop_id, city_name)
        {
            $("#shop_id").val(shop_id);
            $("#city_name").val(city_name);
            $("#modify-type").val('edit');
        }

        /**
         * 取消 清空数据
         */
        function cancel()
        {
            $("#shop_id").val('');
            $("#city_name").val('');
            $("#modify-type").val('add');
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
                        location.href = "<?=base_url('shop/cityList')?>";
                    } else {
                        alert('删除失败，请刷新重试');
                    }
                }, 'JSON');
            }
        }

    </script>
<?php echo view('admin/footer') ?>

