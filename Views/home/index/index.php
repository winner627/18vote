<!-- 
@author Xu
@create 2020-11-26 18:23
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>vote</title>
<!-- 	<script src="https://kit.fontawesome.com/f32b941d9f.js" crossorigin="anonymous"></script>-->
	<link rel="stylesheet" href="/statics/css/main.css">
</head>
<body>
	<main id="work">  <!--这是我的作品主页-->
		<h1 class="lg-heading">
			数媒摄影作品
			<span class="text-second">投票</span>
		</h1>
		<h2 class="sm-heading">
			喜欢就投一票吧......
        </h2>
        
        <div class="works">
<!--            循环整个item-->
            <?php foreach ($works as $val):?>
            <div class="item">
<!--                循环哪个号-->
                <div class="count">
                    <?php echo $val['id'];?>号
                </div>
<!--                循环图片名称-->
                <a href="/uploads/<?php echo $val['filename'];?>">
                    <img src="/uploads/<?php echo $val['filename'];?>" alt="work">
                </a>
<!--                循环作品名-->
                <a href="" class="btn btn-light">
                    <i><?php echo $val['title'];?></i>
                </a>
                <a href="javascript:vote(<?php echo $val['id'];?>)" class="btn btn-dark">
                   投票 
                </a>
                <div class="vote-count" id="vote-count-<?php echo $val['id'];?>">
                    投票数：<?php echo $val['vote_count'];?>
                </div>
            </div>
            <?php endforeach;?>
        </div>

<!--            <div class="item">-->
<!--                <div class="count">-->
<!--                    2号-->
<!--                </div>-->
<!--                <a href="#">-->
<!--                    <img src="./imgs/work_2.jpg" alt="work">-->
<!--                </a>-->
<!--                <a href="" class="btn btn-light">-->
<!--                    <i class="fas fa-eye">作品名称</i>-->
<!--                </a>-->
<!--                <a href="" class="btn btn-dark">-->
<!--                   投票 -->
<!--                </a>-->
<!--            </div>-->
<!---->
<!--            <div class="item">-->
<!--                <div class="count">-->
<!--                    3号-->
<!--                </div>-->
<!--                <a href="#">-->
<!--                    <img src="./imgs/work_3.jpg" alt="work">-->
<!--                </a>-->
<!--                <a href="" class="btn btn-light">-->
<!--                    <i class="fas fa-eye">作品名称</i>-->
<!--                </a>-->
<!--                <a href="" class="btn btn-dark">-->
<!--                   投票 -->
<!--                </a>-->
<!--            </div>-->
<!---->
<!--            <div class="item">-->
<!--                <div class="count">-->
<!--                    4号-->
<!--                </div>-->
<!--                <a href="#">-->
<!--                    <img src="./imgs/work_4.jpg" alt="work">-->
<!--                </a>-->
<!--                <a href="" class="btn btn-light">-->
<!--                    <i class="fas fa-eye">作品名称</i>-->
<!--                </a>-->
<!--                <a href="" class="btn btn-dark">-->
<!--                   投票-->
<!--                </a>-->
<!--            </div>-->
<!---->
<!--            <div class="item">-->
<!--                <div class="count">-->
<!--                    5号-->
<!--                </div>-->
<!--                <a href="#">-->
<!--                    <img src="./imgs/work_5.jpg" alt="work">-->
<!--                </a>-->
<!--                <a href="" class="btn btn-light">-->
<!--                    <i class="fas fa-eye">作品名称</i>-->
<!--                </a>-->
<!--                <a href="" class="btn btn-dark">-->
<!--                   投票 -->
<!--                </a>-->
<!--            </div>-->
<!---->
<!--            <div class="item">-->
<!--                <div class="count">-->
<!--                    6号-->
<!--                </div>-->
<!--                <a href="#">-->
<!--                    <img src="./imgs/work_6.jpg" alt="work">-->
<!--                </a>-->
<!--                <a href="" class="btn btn-light">-->
<!--                    <i class="fas fa-eye">作品名称</i>-->
<!--                </a>-->
<!--                <a href="" class="btn btn-dark">-->
<!--                   投票 -->
<!--                </a>-->
<!--            </div>-->
<!---->
<!--            <div class="item">-->
<!--                <div class="count">-->
<!--                    7号-->
<!--                </div>-->
<!--                <a href="#">-->
<!--                    <img src="./imgs/work_7.jpg" alt="work">-->
<!--                </a>-->
<!--                <a href="" class="btn btn-light">-->
<!--                    <i class="fas fa-eye">作品名称</i>-->
<!--                </a>-->
<!--                <a href="" class="btn btn-dark">-->
<!--                   投票 -->
<!--                </a>-->
<!--            </div>-->
<!---->
<!--            <div class="item">-->
<!--                <div class="count">-->
<!--                    8号-->
<!--                </div>-->
<!--                <a href="#">-->
<!--                    <img src="./imgs/work_8.jpg" alt="work">-->
<!--                </a>-->
<!--                <a href="" class="btn btn-light">-->
<!--                    <i class="fas fa-eye">作品名称</i>-->
<!--                </a>-->
<!--                <a href="" class="btn btn-dark">-->
<!--                   投票 -->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
	</main>
	
    <footer id="main-footer">
        Copyright &copy 2020
    </footer>

<!--    <div class="info">-->
<!--        fdafdafdaf-->
<!--    </div>-->

	<script src="js/main.js"></script>
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <script>
        function vote(id) {
            jQuery.post('/index.php?c=index&a=vote', {id: id}, function(data) {
                if (data.status == 200) {
                    jQuery('#vote-count-' + id).html(data.data.vote_count);
                }
                alert(data.message);
            }, 'json');
        }

        function showInfo(message) {
            jQuery('.info').show();
            jQuery('.info').html(message);
            setTimeout(function () {
                jQuery('.info').hide();
            }, 3000)
        }
    </script>
</body>
</html>