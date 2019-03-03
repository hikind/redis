<?php
//引入公共文件
include 'common.php';

//判断表单是否有提交
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //获取文章信息
    $input = $_POST;
    //引入redis
    $redis = include "redis.php";
    //获取文章id
    $input['id'] = $redis->incr('article_id');
    //获取用户id
    $input['uid'] = $_SESSION['userInfo']['uid'];
    //存入时间
    $input['time'] = time();
    //将文章信息存入redis.hash
    $redis->hMSet('article:id:'.$input['id'],$input);
    //将id放入文章的有序集合中
    $redis->zAdd('article_set',$input['id'],$input['id']);
    //将id存入该用户的集合中
    $redis->sAdd('user_Article_'.$input['uid'],$input['id']);
    echo '<script>alert("添加成功");window.location.href="index.php";</script>';
    //    echo '<script>alert("添加成功");</script>';
//    header('Location:index.php');
}
?>
<div class="layui-row layui-col-space10">
    <div class="layui-col-md2"></div>
    <div class="layui-col-md8">
        <div class="layui-card">
            <div class="layui-card-header"><h2>文章添加</h2></div>
            <div class="layui-card-body">
                <form class="layui-form" action="" method="post">
                    <div class="layui-form-item">
                        <label class="layui-form-label">文章标题</label>
                        <div class="layui-input-block">
                            <input type="text" name="title" required lay-verify="required" placeholder="请输入标题"
                                   autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">文章内容</label>
                        <div class="layui-input-block">
                            <textarea name="desc" placeholder="请输入内容" class="layui-textarea"></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="layui-col-md2"></div>
</div>