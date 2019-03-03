<?php
//引入公共文件
include 'common.php';

//接收文章id
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