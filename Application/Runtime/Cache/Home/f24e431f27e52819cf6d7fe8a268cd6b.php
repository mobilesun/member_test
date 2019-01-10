<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<title>会员分组详情</title>
</head>
<body>
<h1>会员分组详情</h1>
<div></div>

<table width="500">
<tr>
<td width="100">会员组名称</td> <td><?php echo ($data['name']); ?></td>
</tr>
<tr>
<td width="100">创建时间</td> <td><?php echo ($data['creattime']); ?></td>
</tr>
<tr>
<td width="100">注释</td> <td><?php echo ($data['remark']); ?></td>
</tr>
<tr>
<td width="100">会员数量</td> <td><?php echo ($data['nums']); ?></td>
</tr>
<tr>
<td width="100">所属会员</td> <td></td>
</tr>
</table>
<?php if(!empty($members)){ ?>
<table width="300">
<tr width="100"><td>身份证号码</td><td>姓名</td><td>性别</td></tr>
<?>
 <?php foreach($members as $v) { ?>
 		<tr><td><?php echo ($v[certinum]); ?></td><td><?php echo ($v['name']); ?></td><td><?php echo ($v['sex']==1?"男":"女"); ?></td></tr>
 <?php } ?>
</table>
<?php } ?>
</body>
</html>