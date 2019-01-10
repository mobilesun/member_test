<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<title>编辑会员</title>
</head>
<body>
<h1>编辑会员</h1>
<div></div>
<form action="/index.php?m=home&c=Members&a=edit&id=<?php echo ($data['id']); ?>" method="post" enctype="multipart/form-data">
<table width="600">
<tr>
<td width="100">会员姓名</td> <td><input type="text" name="name" size="30" value="<?php echo ($data['name']); ?>"></td>
</tr>
<tr>
<td width="100">身份证号</td> <td><input type="text" name="certinum" size="30" value="<?php echo ($data['certinum']); ?>"></td>
</tr>
<tr>
<td width="100">性别</td> <td><input type="radio" name="sex" value="1" <?php echo ($data['sex']==1?"checked":""); ?>>男 <input type="radio" name="sex" value="2" <?php echo ($data['sex']==2?"checked":""); ?>>女</td>
</tr>
<tr>
<td width="100">加入日期</td> <td><input type="input" name="creattime" size="30" value="<?php echo (date('Y-m-d',strtotime($data['creattime']))); ?>" > <font color="red">*格式如"2019-10-02"</font></td>
</tr>
<tr>
<td width="100">所属分组</td> 
<td>
<?php foreach($groups as $k=>$v) { ?>
<input type="checkbox" name="group_ids[]" value="<?php echo ($k); ?>" <?php echo in_array($k,explode(',',$data['group_ids']))?"checked":""; ?> /><?php echo ($v); ?> &nbsp;&nbsp;&nbsp;
<?php } ?>
	
</td>
</tr>
<tr>
<td width="100">照片</td> <td><input type='file' name='photo' /></td>
</tr>
<tr>
<td width="100">注释</td> <td><textarea name="remark"><?php echo ($data['remark']); ?></textarea>></td>
</tr>

</table>
<input type="submit"/>
</form>
</body>
</html>