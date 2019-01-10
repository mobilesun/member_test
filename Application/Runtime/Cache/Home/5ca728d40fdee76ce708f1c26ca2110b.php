<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<title>会员分组列表</title>
</head>
<body>
<div><a href="/index.php?m=home&c=MemberGroup&a=add">添加</a></div>

<table width="500">
<tr>
<td width="100">会员名称</td><td width="100">创建时间</td><td>会员数量</td><td>操作</td>
</tr>
<?php foreach($list as $v){ ?>
	<tr>
	<td><a href="/index.php?m=home&c=MemberGroup&a=detail&id=<?php echo ($v[id]); ?>"><?php echo ($v['name']); ?></a></td><td><?php echo ($v['creattime']); ?></td><td><?php echo ($v['nums']); ?></td><td><a href="/index.php?m=home&c=MemberGroup&a=edit&id=<?php echo ($v[id]); ?>">编辑</a></td>
	<tr>
<?php } ?>
</table>
</body>
</html>