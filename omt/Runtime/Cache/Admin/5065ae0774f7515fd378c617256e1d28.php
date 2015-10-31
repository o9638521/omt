<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Build CRUD DataGrid with jQuery EasyUI - jQuery EasyUI Demo</title>
	<link rel="stylesheet" type="text/css" href="/omt/Public/include/easyui.1.4.3/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="/omt/Public/include/easyui.1.4.3/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="/omt/Public/include/easyui.1.4.3/themes/color.css">
	<script type="text/javascript" src="/omt/Public/include/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="/omt/Public/include/easyui.1.4.3/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="/omt/Public/include/easyui.1.4.3/jquery.edatagrid.js"></script>
</head>
<body>
    	<div id="dlg" class="easyui-dialog" title="新增會員" closed="true" style="width:450px;height:400px;padding:10px;"
			data-options="
				buttons: [{
					text:'確定',
					iconCls:'icon-ok',
					handler:function(){
						alert('ok');
					}
				},{
					text:'取消',
					iconCls:'icon-cancel',
					handler:function(){
						$('#dlg').dialog('close');
					}
				}]
			">
			<div style="padding:10px 30px 20px 30px">
			<form id="memberform" method="post">
				<table cellpadding="5">
					<tr>
						<td>會員名稱</td>
						<td><input class="easyui-textbox" type="text" name="name" data-options="required:true" style="width:250px;"></input></td>
					</tr>
					<tr>
						<td>信箱</td>
						<td><input class="easyui-textbox" type="text" name="email" data-options="required:true,validType:'email'" style="width:250px;"></input></td>
					</tr>
					<tr>
						<td>密碼</td>
						<td><input class="easyui-textbox" type="text" name="password" data-options="required:true" style="width:250px;"></input></td>
					</tr>
					<tr>
						<td>生日</td>
						<td><input class="easyui-textbox" name="birthday" data-options="required:true" style="width:250px;"></input></td>
					</tr>
					<tr>
						<td>手機</td>
						<td><input class="easyui-textbox" name="phone" data-options="required:true" style="width:250px;"></input></td>
					</tr>
					<tr>
						<td>金額</td>
						<td><input class="easyui-textbox" name="cash" style="width:250px;"></input></td>
					</tr>
					<tr>
						<td>加入日期</td>
						<td><input class="easyui-datebox" name="build_date" style="width:250px;"></input></td>
					</tr>
					<tr>
						<td>uid</td>
						<td><input class="easyui-textbox" name="uid" data-options="required:true" style="width:250px;"></input></td>
					</tr>
				</table>
			</form>
			</div>
		</div>
		<div id="edit_dialog" class="easyui-dialog" title="編輯會員" closed="true" style="width:450px;height:400px;padding:10px;"
			buttons="#adduser_button">
			<div style="padding:10px 30px 20px 30px">
			<form id="form_edit" method="post" enctype="multipart/form-data">
				<table cellpadding="5">
					<tr>
						<td>會員名稱</td>
						<td><input class="easyui-textbox" type="text" name="name" data-options="required:true" style="width:250px;"></input></td>
					</tr>
					<tr>
						<td>信箱</td>
						<td><input class="easyui-textbox" type="text" name="email" data-options="required:true,validType:'email'" style="width:250px;"></input></td>
					</tr>
					<tr>
						<td>密碼</td>
						<td><input class="easyui-textbox" type="text" name="password" data-options="required:true" style="width:250px;"></input></td>
					</tr>
					<tr>
						<td>生日</td>
						<td><input class="easyui-textbox" name="birthday" data-options="required:true" style="width:250px;"></input></td>
					</tr>
					<tr>
						<td>手機</td>
						<td><input class="easyui-textbox" name="phone" data-options="required:true" style="width:250px;"></input></td>
					</tr>
					<tr>
						<td>金額</td>
						<td><input class="easyui-textbox" name="cash" style="width:250px;"></input></td>
					</tr>
					<tr>
						<td>加入日期</td>
						<td><input class="easyui-datebox" name="build_date" style="width:250px;"></input></td>
					</tr>
					<tr>
						<td>uid</td>
						<td><input class="easyui-textbox" name="uid" data-options="required:true" style="width:250px;"></input></td>
					</tr>
				</table>
			</form>
			<div id="edituser_button" style="float:right;" >
		        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="save('#form_edit')" style="width:90px">儲存</a>
		        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#edit_dialog').dialog('close')" style="width:90px">取消</a>
		    </div>
			</div>
		</div>
		<div id="store" class="easyui-dialog" title="儲值" closed="true" style="width:350px;height:250px;;padding:10px;"
			buttons="#store_button">
			
			<div style="padding:10px 30px 20px 30px">
			<form id="form_store" method="post">
				<table cellpadding="5">
					<tr>
						<td>信箱</td>
						<td><input class="easyui-textbox" type="text" name="email" data-options="required:true,validType:'email'" style="width:170px;;"></input></td>
					</tr>
					<tr>
						<td>手機</td>
						<td><input class="easyui-textbox" type="text" name="phone" data-options="required:true" style="width:170px;;"></input></td>
					</tr>
					<tr>
						<td>儲值金額</td>
						<td>
							<select id="money" class="easyui-combobox" name="money" style="width:170px;">
								<option value="100" selected>100</option>
								<option value="200">200</option>
								<option value="500">500</option>
								<option value="1000">1000</option>
							</select>
						</td>
					</tr>
				</table>
			</form>
			<div id="store_button" style="float:right;" >
		        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="save('#form_store')" style="width:90px">儲存</a>
		        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#store').dialog('close')" style="width:90px">取消</a>
		    </div>
			</div>
		</div>
		<div id="insidelayout" class="easyui-layout" data-options="fit:true">
			<div data-options="region:'center',iconCls:'icon-ok'">
				<table id="dg" class="easyui-datagrid" style="width:100%;height:530px;"
				toolbar="#toolbar"  idField="id"  rownumbers="true" fitColumns="true" singleSelect="true"
				data-options="url:'<?php echo U('Member/member_r');?>',method:'get',fit:'true'">
						<thead>
						<tr>
							<th field="name" width="50" editor="{type:'validatebox',options:{required:true}}">會員名稱</th>
							<th field="email" width="50" editor="{type:'validatebox',options:{required:true},validType:'email'}">信箱</th>
							<th field="password" width="50" editor="{type:'validatebox',options:{required:true}}">密碼</th>
							<th field="birthday" width="50" editor="text">生日</th>
							<th field="phone" width="50" editor="{type:'validatebox',options:{required:true}}">手機</th>
							<th field="cash" width="50" editor="text">金額</th>
							<th field="build_date" width="50" editor="text">加入日期</th>
							<th field="uid" width="50" editor="text">uid</th>
							<th field="m_id" width="50" data-options="hidden:true" editor="text">m_id</th>
						</tr>
					</thead>
				</table>
			</div>
		<div>
    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="javascript:$('#dlg').dialog('open')">新增</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#dg').edatagrid('destroyRow')">刪除</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#dg').edatagrid('saveRow')">儲存</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="edit_user()">編輯</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="searchOpen()">搜尋UID</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="store()">儲值</a>
	</div>
    <script type="text/javascript">
    	var url;
		function searchOpen()
		{
			$('#insidelayout').layout('remove', 'east');
			$('#insidelayout').layout('add',{
				region: 'east',
				width: 380,
				title: '搜尋表',
				split: true,
				content:'<form id="searchform" style="padding:20px;font-size:20px;"method="post"><table cellpadding="20"><tr><td>信箱</td><td><input class="easyui-textbox" type="validatebox" name="mail" style="width:200px;"></input></td></tr><tr><td>手機</td><td><input class="easyui-textbox" type="text" name="phone" data-options="required:true" style="width:200px;"></input></td></tr><tr><td>結果</td><td><input class="easyui-textbox" type="text" name="result" data-options="multiline:true" style="width:200px;height:60px;"></input></td></tr><tr><a href="#" class="easyui-linkbutton c5" style="width:50px;" onclick=alert("搜尋")>搜尋</a><a href="#" class="easyui-linkbutton" style="width:50px;" onclick="formclear()">清除</a></tr></table></form>'
			});
		}
		function formclear()
		{
			$('#searchform').form('clear');
		}
		function edit_user(){
			$('#edit_dialog').dialog('open');
			var row = $('#dg').datagrid('getSelected');
			$('#form_edit').form('load',row);
			url = "<?php echo U('Member/member_u');?>?m_id=" + row.m_id;
		}
		function store(){
			$('#store').dialog('open');
			var row = $('#dg').datagrid('getSelected');
			$('#form_store').form('load',row);
			url = "<?php echo U('Member/store');?>?m_id=" + row.m_id + "&money=" + $('#money').val();
		}
		function save(form){
			$(form).form('submit',{
                url: url,
                success: function(result){
                    $('#edit_dialog').dialog('close');
                    $('#dg').datagrid('reload');
                }
            });
		}
    </script>
    
</body>
</html>