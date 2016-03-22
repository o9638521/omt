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
    <div id="dlg" class="easyui-dialog" title="訂票資料" closed="true" style="width:450px;height:400px;padding:10px;"
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
		<form id="ticketform" method="post">
			<table cellpadding="5">
				<tr>
					<td>電影名稱</td>
					<td><input class="easyui-textbox" type="text" name="movie_name" data-options="required:true" style="width:250px;"></input></td>
				</tr>
				<tr>
					<td>電影種類</td>
					<td><input class="easyui-textbox" type="text" name="movie_type" data-options="required:true" style="width:250px;"></input></td>
				</tr>
				<tr>
					<td>電影院</td>
					<td><input class="easyui-textbox" type="text" name="theater_name" data-options="required:true" style="width:250px;"></input></td>
				</tr>
				<tr>
					<td>會員名稱</td>
					<td><input class="easyui-textbox" name="name" data-options="required:true" style="width:250px;"></input></td>
				</tr>
				<tr>
					<td>座位</td>
					<td><input class="easyui-textbox" name="seat" data-options="required:true" style="width:250px;"></input></td>
				</tr>
				<tr>
					<td>張數</td>
					<td><input class="easyui-textbox" name="quantity" style="width:250px;"></input></td>
				</tr>
				<tr>
					<td>花費</td>
					<td><input class="easyui-textbox" name="cost" style="width:250px;"></input></td>
				</tr>
				<tr>
					<td>enable</td>
					<td><input class="easyui-textbox" name="enable" data-options="required:true" style="width:250px;"></input></td>
				</tr>
			</table>
		</form>
		</div>
	</div>
	<div id="edit_dialog" class="easyui-dialog" title="編輯訂票紀錄" closed="true" style="width:450px;height:400px;padding:10px;"
		buttons="#adduser_button">
		<div style="padding:10px 30px 20px 30px">
			<form id="form_edit" method="post" enctype="multipart/form-data">
				<table cellpadding="5">
					<tr>
						<td>電影名稱</td>
						<td><input class="easyui-textbox" type="text" name="movie_name" data-options="required:true" style="width:250px;"></input></td>
					</tr>
					<tr>
						<td>電影種類</td>
						<td><input class="easyui-textbox" type="text" name="movie_type" data-options="required:true" style="width:250px;"></input></td>
					</tr>
					<tr>
						<td>電影院</td>
						<td><input class="easyui-textbox" type="text" name="theater_name" data-options="required:true" style="width:250px;"></input></td>
					</tr>
					<tr>
						<td>會員名稱</td>
						<td><input class="easyui-textbox" name="name" data-options="required:true" style="width:250px;"></input></td>
					</tr>
					<tr>
						<td>座位</td>
						<td><input class="easyui-textbox" name="seat" data-options="required:true" style="width:250px;"></input></td>
					</tr>
					<tr>
						<td>張數</td>
						<td><input class="easyui-textbox" name="quantity" style="width:250px;"></input></td>
					</tr>
					<tr>
						<td>花費</td>
						<td><input class="easyui-textbox" name="cost" style="width:250px;"></input></td>
					</tr>
					<tr>
						<td>enable</td>
						<td><input class="easyui-textbox" name="enable" data-options="required:true" style="width:250px;"></input></td>
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
	data-options="url:'<?php echo U('Ticket/ticket_r');?>',method:'get',fit:true">
			<thead>
			<tr>
				<th field="movie_name" width="50" editor="text">電影名稱</th>
				<th field="movie_type" width="50" editor="text">電影種類</th>
				<th field="theater_name" width="50" editor="text">電影院</th>
				<th field="name" width="50" editor="text">會員名稱</th>
				<th field="seat" width="50" editor="{type:'validatebox',options:{required:true}}">座位</th>
				<th field="quantity" width="50" editor="{type:'validatebox',options:{required:true}}">張數</th>
				<th field="cost" width="50" editor="text">花費</th>
				<th field="enable" width="50" editor="text">enable</th>
				<th field="m_id" width="50" data-options="hidden:true" editor="text">m_id</th>
				<th field="ot_id" width="50" data-options="hidden:true" editor="text">ot_id</th>
				<th field="s_id" width="50" data-options="hidden:true" editor="text">s_id</th>
				
			</tr>
		</thead>
	</table>
    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="javascript:$('#dlg').dialog('open')">新增</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyRow()">刪除</a>
        <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#dg').        edatagrid('saveRow')">儲存</a>-->
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="edit_ticket()">編輯</a>
    </div>
    <script type="text/javascript">
    	function edit_ticket(){
			var row = $('#dg').datagrid('getSelected');
			if(row.ot_id!=''){
				$('#edit_dialog').dialog('open');
				$('#form_edit').form('load',row);
				url = "<?php echo U('ticket/edit_c');?>?ot_id=" + row.ot_id;
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
        	$('#ticketform').form('submit',{
	            onSubmit: function(){
	            	if( $('#ticketform').form('validate')==false){
	            		$.messager.confirm('警告','紅色欄位為必要欄位!!',function(r){
						    if (r){
						        $('#dlg').dialog('open');
						    }
						});
	            	}
	            	else{
	            		/*append_forDB();*/
	            		$.ajax({
			                url: "<?php echo U('ticket/append_c');?>",
			                data:$('#ticketform').serialize(),
			                type:"POST",
			                dataType:'text',
			                
			                success: function(result){

			                    result = JSON.parse(result);
			                    if (result==true) {
			                    	$.messager.alert('訊息','成功新增資料');
			                    	setTimeout("location.href='<?php echo U('Index/ticket');?>'",850);
			                    } 
			                },
			                 error:function(result){ 
			                     console.log(result);
			                }
			        	});
	            		$('#ticketform').form('clear'); 
	            		return $('#ticketform').form('validate');
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
				$('#ticketform').form('clear');
        	}*/

        function destroyRow(){
        	var row=$('#dg').datagrid('getSelected');
        	if(row){
        		$.messager.confirm('警告','確定要刪除此列',function(r){
        			if(r){
        				/*destroyRow_forDB()*/
        				$.ajax({
			                url:"<?php echo U('ticket/destroyRow_c');?>",
                            data:{
                                delete_ot_id:row.ot_id
                            },
                            type:"POST",
                            async:false,
			                success: function(result){
			                    result = JSON.parse(result);
			                    if (result==true) {
			                    	$.messager.alert('訊息','成功刪除資料');
			                    	setTimeout("location.href='<?php echo U('Index/ticket');?>'",850);
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