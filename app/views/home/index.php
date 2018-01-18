<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>佰花方专业祛斑连锁</title>
    <?php echo css('swiper-3.4.2.min.css') ?>
    <?php echo css('jquery.fancybox.css') ?>
    <?php echo css('font/iconfont.css') ?>
    <?php echo css('main.css') ?>
</head>
<body>
    <div class="container home">
        <div class="img"><img src="<?php echo base_url('resource/images/p_01.jpg') ?>" alt=""></div>    
        <div class="img"><img src="<?php echo base_url('resource/images/p_02.jpg') ?>" alt=""></div>    
        <div class="img"><img src="<?php echo base_url('resource/images/p_03.jpg') ?>" alt=""></div>    
        <div class="img"><img src="<?php echo base_url('resource/images/p_16.jpg') ?>" alt=""></div>    
        <div class="img"><img src="<?php echo base_url('resource/images/p_04.jpg') ?>" alt=""></div>    
        <div class="img"><img src="<?php echo base_url('resource/images/p_05.jpg') ?>" alt=""></div>    
        <div class="img"><img src="<?php echo base_url('resource/images/p_07.jpg') ?>" alt=""></div>    
        <div class="img"><img src="<?php echo base_url('resource/images/p_08.jpg') ?>" alt=""></div>  
        <div class="banner-1">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><div class="img"><img src="<?php echo base_url('resource/images/case1.jpg') ?>" alt=""></div></div>
                    <div class="swiper-slide"><div class="img"><img src="<?php echo base_url('resource/images/case2.jpg') ?>" alt=""></div></div>
                    <div class="swiper-slide"><div class="img"><img src="<?php echo base_url('resource/images/case3.jpg') ?>" alt=""></div></div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>  
        <div class="img"><img src="<?php echo base_url('resource/images/58.png') ?>" alt=""></div>  

        <div class="form">              
            <form id="form_application">
                <div class="entry">
                    <label>预约城市:<span>*</span></label>
                    <select name="city_id" id="city_id" onChange="city_change(this)">
                        <?php foreach ($cityList as $city): ?>
                        <option value="<?=$city['shop_id']?>"><?=$city['city_name']?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="entry">
                    <label>预约门店:<span>*</span></label>
                    <select name="shop_id" id="shop_id">
                        <?php foreach ($shopList as $shop): ?>
                        <option value="<?=$shop['shop_id']?>"><?=$shop['shop_name']?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="entry">
                    <label>预约姓名:<span>*</span></label>
                    <input type="text" id="username" name="username" placeholder="请填写姓名">
                </div>
                <div class="entry">
                    <label>预约手机:<span>*</span></label>
                    <input type="text" id="phone" name="phone" placeholder="请填写手机号码">
                </div>
                <div class="entry">
                    <label>预约留言:<span>*</span></label>                
                    <textarea id="contect" name="contect" placeholder="内容:" row="3"></textarea>
                </div>
                <input type="hidden" name="c" value="<?php echo $c ?>">
            </form>
            <a class="btn btn-next" href="javascript:;" onClick="submit_application(this)">免费预约58元超值套餐</a>
        </div>

        <!-- <div class="img"><img src="<?php echo base_url('resource/images/p_14_02.jpg') ?>" alt=""></div>  
        <div class="img"><img src="<?php echo base_url('resource/images/p_10.jpg') ?>" alt=""></div>  
        <div class="img"><img src="<?php echo base_url('resource/images/59.jpg') ?>" alt=""></div>  
        <div class="img"><img src="<?php echo base_url('resource/images/p_12.jpg') ?>" alt=""></div>  
        <div class="img"><img src="<?php echo base_url('resource/images/p_13.jpg') ?>" alt=""></div>   -->

        <div class="img"><img src="<?php echo base_url('resource/images/y_01.jpg') ?>" alt=""></div>  
        <div class="img"><img src="<?php echo base_url('resource/images/y_02.jpg') ?>" alt=""></div>  
        <div class="img"><img src="<?php echo base_url('resource/images/y_03.jpg') ?>" alt=""></div>  
        <div class="img"><img src="<?php echo base_url('resource/images/y_04.jpg') ?>" alt=""></div>  

        <div class="img"><img src="<?php echo base_url('resource/images/p_14.jpg') ?>" alt=""></div>  
        <div class="img"><img src="<?php echo base_url('resource/images/p_15.jpg') ?>" alt=""></div>  
        <footer>
            <p>沪ICP备15058074号-1</p>
            <p> &copy; 2017 佰花方专业祛斑连锁 版权所有</p>
            <p>020-38398851</p>
        </footer>
        <div class="nav">
            <ul class="clear">
                <!-- <li class="phone"><a href="tel:020-38398851"><i class="iconfont icon-phone"></i>电话咨询</a></li> -->
                <li class="sms"><a href="http://p.qiao.baidu.com/cps/chat?siteId=11610952&userId=25005297" target="_blank"><i class="iconfont icon-sms"></i>在线咨询</a></li>
            </ul>
        </div>
    </div>
    <?php echo js('jquery.min.js') ?>
    <?php echo js('jquery.fancybox.js') ?>
    <?php echo js('swiper-3.4.2.jquery.min.js') ?>

    <script>
    var swiper = new Swiper('.swiper-container', {
        // pagination: '.swiper-pagination',
        prevButton:'.swiper-button-prev',
        nextButton:'.swiper-button-next',
        paginationClickable: true,
        loop: true,
        autoplay: 3500,
        speed: 300
    });
    </script>
    
    <!-- <script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b2e3dc8433387b3afea4a82295edaae4";
        var s = document.getElementsByTagName("script")[0]; 
        s.parentNode.insertBefore(hm, s);
    })();
    </script> -->

    <script>
        function city_change(it)
        {
            var city_id = $(it).val();

            $.post("<?=base_url('index/getShopList')?>", {city_id: city_id}, function(data) {
                if (data.status == 200) {
                    $("#shop_id").html(data.msg);
                }
            }, 'JSON');
        }

        /**
         * 提交申请
         */
        function submit_application(it)
        {
            $(it).removeAttr('onClick');
            $.ajax({
                url: '<?php echo base_url('index/submitApplication') ?>',
                type: 'POST',
                dataType: 'json',
                data: $('#form_application').serialize(),
                success:function(data) {
                    if(data.status == 200) {
                        alert('申请成功！工作人员将在一个工作日联系您，确认信息');
                        location.reload();
                    }else {
                        $(it).attr('onClick', 'submit_application(this)');
                        alert(data.msg);
                    }
                }
            })
        }

    </script>
</body>
</html>