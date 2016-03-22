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
    <div id="dlg" class="easyui-dialog" title="訂餐資料" closed="true" style="width:450px;height:350px;padding:10px;"
		data-options="
			buttons: [{
				text:'確定',
				iconCls:'icon-ok',
				handler:function(){
					append();
					$('#dlg').dialog('close');
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
		<form id="foodform" method="post">
			<table cellpadding="5">
				<tr>
					<td>食物名稱</td>
					<td><input class="easyui-textbox" type="text" id="food" name="food" data-options="required:true" style="width:250px;"></input></td>
				</tr>
				<tr>
					<td>食物類型</td>
					<td><input class="easyui-textbox" id="type" name="type" data-options="required:true" style="width:250px;"></input></td>
				</tr>
				<tr>
					<td>價格</td>
					<td><input class="easyui-textbox" id="price" name="price" data-options="required:true" style="width:250px;"></input></td>
				</tr>
				<tr>
					<td>大小</td>
					<td><input class="easyui-textbox" id="size" name="size" data-options="required:true" style="width:250px;"></input></td>
				</tr>
			</table>
		</form>
		</div>
	</div>
	<div id="edit_dialog" class="easyui-dialog" title="編輯餐點" closed="true" style="width:450px;height:400px;padding:10px;"
		buttons="#adduser_button">
		<div style="padding:10px 30px 20px 30px">
			<form id="form_edit" method="post" enctype="multipart/form-data">
				<table cellpadding="5">
					<tr>
						<td>食物名稱</td>
						<td><input class="easyui-textbox" type="text" id="food" name="food" data-options="required:true" style="width:250px;"></input></td>
					</tr>
					<tr>
						<td>食物類型</td>
						<td><input class="easyui-textbox" id="type" name="type" data-options="required:true" style="width:250px;"></input></td>
					</tr>
					<tr>
						<td>價格</td>
						<td><input class="easyui-textbox" id="price" name="price" data-options="required:true" style="width:250px;"></input></td>
					</tr>
					<tr>
						<td>大小</td>
						<td><input class="easyui-textbox" id="size" name="size" data-options="required:true" style="width:250px;"></input></td>
					</tr>
				</table>
			</form>
			<div id="edituser_button" style="float:right;" >
		        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="save('#form_edit')" style="width:90px">儲存</a>
		        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#edit_dialog').dialog('close')" style="width:90px">取消</a>
		    </div>
		</div>
	</div>
    <table id="dg" class="easyui-datagrid" style="width:100%;height:530px;"
	toolbar="#toolbar"  idField="id"  rownumbers="true" fitColumns="true" singleSelect="true"
	data-options="url:'<?php echo U('Food/food_r');?>',method:'get',fit:true">
			<thead>
			<tr>
				<th field="food" width="50" editor="{type:'validatebox',options:{required:true}}">食物名稱</th>
				<th field="type" width="50" editor="text">食物類型</th>
				<th field="price" width="50" editor="{type:'validatebox',options:{required:true}}">價格</th>
				<th field="size" width="50" editor="{type:'validatebox',options:{required:true}}">大小</th>
				<th field="f_id" width="50" data-options="hidden:true" editor="text">f_id</th>
			</tr>
		</thead>
	</table>
    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="javascript:$('#dlg').dialog('open')">新增</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyRow()">刪除</a>
        <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#dg').        edatagrid('saveRow')">儲存</a>-->
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="edit_food()">編輯</a>
    </div>
    <script type="text/javascript">
    	function edit_food(){
			var row = $('#dg').datagrid('getSelected');
			if(row.f_id!=''){
				$('#edit_dialog').dialog('open');
				$('#form_edit').form('load',row);
				url = "<?php echo U('Food/edit_c');?>?f_id=" + row.f_id;
			}
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
        function append(){
        	$('#foodform').form('submit',{
	            onSubmit: function(){
	            	if( $('#foodform').form('validate')==false){
	            		$.messager.confirm('警告','紅色欄位為必要欄位!!',function(r){
						    if (r){
						        $('#dlg').dialog('open');
						    }
						});
	            	}
	            	else{
	            		/*append_forDB();*/
	            		$.ajax({
			                url: "<?php echo U('Food/append_c');?>",
			                data:$('#foodform').serialize(),
			                type:"POST",
			                dataType:'text',
			                
			                success: function(result){

			                    result = JSON.parse(result);
			                    if (result==true) {
			                    	$.messager.alert('訊息','成功新增資料');
			                    	setTimeout("location.href='<?php echo U('Index/food');?>'",850);
			                    } 
			                },
			                 error:function(result){ 
			                     console.log(result);
			                }
			        	});
	            		$('#foodform').form('clear'); 
	            		return $('#foodform').form('validate');
	            	}             
	            }
            });	
        }
   /*     	var name = $('#name').val()
        	var theater_name = $('#theater_name').val()
        	var food = $('#food').val()
        	var type = $('#type').val()
        	var price = $('#price').val()
        	var size = $('#size').val()

        	if(name==''||theater_name==''||food==''||type==''||price==''||size==''){
        		$.messager.confirm('Confirm','紅色欄位為必要欄位!!',function(r){
				    if (r){
				        $('#dlg').dialog('open');
				    }
				});
        	}else {
	        	$('#dg').datagrid('appendRow',{
					name: name,
					theater_name: theater_name,
					food: food,
					type: type,
					price: price,
					size: size
				});

				$('#dlg').dialog('close');
				$('#foodform').form('clear');
        	}*/

        function destroyRow(){
        	var row=$('#dg').datagrid('getSelected');
        	if(row){
        		$.messager.confirm('警告','確定要刪除此列',function(r){
        			if(r){
        				/*destroyRow_forDB()*/
        				$.ajax({
			                url:"<?php echo U('Food/destroyRow_c');?>",
                            data:{
                                delete_f_id:row.f_id
                            },
                            type:"POST",
                            async:false,
			                success: function(result){
			                    result = JSON.parse(result);
			                    if (result==true) {
			                    	$.messager.alert('訊息','成功刪除資料');
			                    	setTimeout("location.href='<?php echo U('Index/food');?>'",850);
			                    }
			                },
			                error:function(result){ 
			                     console.log(result);
			                }
			        	});

        			}

        		});
        	}
        }
    </script>
    
</body>
</html>