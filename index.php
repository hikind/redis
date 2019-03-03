<?php
//引入公共文件
include 'common.php';
//引入redis
$redis = include 'redis.php';
//获取文章id集合
$ids = $redis->zRange('article_set', 0, -1);;

?>
<div class="layui-row layui-col-space10">
    <div class="layui-col-md2"></div>
    <div class="layui-col-md8">
        <div class="layui-card">
            <div class="layui-card-header"><h2>文章列表</h2></div>
            <div class="layui-card-body">
                <a href="add.php" class="layui-btn">添加文章</a>
                <table class="layui-table">
                    <colgroup>
                        <col width="100">
                        <col width="200">
                        <col width="150">
                        <col width="150">
                        <col>
                    </colgroup>
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>文章标题</th>
                        <th>作者</th>
                        <th>发表时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($ids as $k => $v):
                        //获取文章信息
                        $article = $redis->hMGet('article:id:'.$v,['id','uid','title','time']);
                    ?>
                    <tr>
                        <td><?php echo $article['id']; ?></td>
                        <td><?php echo $article['title']; ?></td>
                        <td><?php echo $redis->hget('user:id:'.$article['uid'],'username'); ?></td>
                        <td><?php echo date('y-m-d,h:i:s',$article['time']); ?></td>
                        <td>
                            <a href="update.php?id=<?php echo $article['id']; ?>" 	class="layui-btn layui-btn-warm">修改</a>
                            <a href="" 	class="layui-btn layui-btn-danger">删除</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="layui-col-md2"></div>
</div>
