<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<title>会员分组详情</title>
</head>
<body>
<h1>编辑会员分组</h1>
<div></div>
<form action="/index.php?m=home&c=MemberGroup&a=edit&id=<?php echo ($data['id']); ?>" method="post">
<table width="500">
<tr>
<td width="100">会员组名称</td> <td><input type="text" name="name" size="30" value="<?php echo ($data['name']); ?>"></td>
</tr>
<tr>
<td width="100">注释</td> <td><textarea name="remark"><?php echo ($data['remark']); ?></textarea>></td>
</tr>

</table>
<input type="submit"/>
</form>
</body>
</html>