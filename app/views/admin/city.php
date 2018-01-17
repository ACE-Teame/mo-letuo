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
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>1</td>
                                <td>北京</td>
                                <td>
                                    <a href="javascript:;" class="btn modify" onClick="user_edit(<?=$user['id']?>)">修改</a>
                                    <a href="javascript:;" class="btn delete" onclick="delete_by_id(<?=$user['id']?>)">删除</a>
                                </td>
                            </tr>
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
                <div class="form">                      
                    <form action="<?=base_url('user/add')?>" class="operateForm" method="POST" id="from" name="adduser">
                        <div class="entry">
                            <input type="hidden" name="shop_id" id="shop_id" value="">
                        </div>
                        <div class="entry">
                            <label>城市:</label>
                            <input type="text" name="city_name" id="city_name" value="" placeholder="">
                        </div>
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
        function user_edit(id)
        {
            $.get('<?=base_url('user/byPkGetUser')?>',{id:id}, function(data) {
                if(data) {
                    $("#id").val(data.id);
                    $("#username").val(data.username);
                }
            }, 'JSON');
        }

        /**
         * 取消 清空数据
         */
        function cancel()
        {
            $("#id").val('');
            $("#name").val('');
        }

        /**
         * 根据ID删除数据
         */
        function delete_by_id(id)
        {
            if(confirm('确定删除？') == true){
                $("#from").attr('action', '<?=base_url('user/deleteById')?>' + '?id=' + id);
                $("#from").submit();
            }
        }

    </script>
<?php echo view('admin/footer') ?>

