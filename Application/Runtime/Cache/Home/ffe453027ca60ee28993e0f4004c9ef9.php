<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<title>会员分组列表</title>
</head>
<body>
<div><a href="/index.php?m=home&c=Members&a=add">添加</a></div>

<table width="500">
<tr>
<td width="100">身份证号码</td><td>会员姓名</td><td>性别</td><td width="100">创建日期</td><td>会员所属分组</td><td>会员照片</td><td>操作</td>
</tr>
<?php foreach($list as $v){ ?>
	<tr>
	<td><?php echo ($v['certinum']); ?></td><td><a href="/index.php?m=home&c=Members&a=detail&id=<?php echo ($v[id]); ?>"><?php echo ($v['name']); ?></a></td><td><?php echo ($v['sex']); ?></td><td><?php echo ($v['creattime']); ?></td><td><?php echo ($v['group_name']); ?></td><td><img src="#"></td><td><a href="/index.php?m=home&c=Members&a=edit&id=<?php echo ($v[id]); ?>">编辑</a></td>
	<tr>
<?php } ?>
</table>
</body>
</html>