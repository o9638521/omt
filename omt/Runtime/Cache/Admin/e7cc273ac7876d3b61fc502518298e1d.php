<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Basic CRUD Application - jQuery EasyUI CRUD Demo</title>
	<link rel="stylesheet" type="text/css" href="/omt/Public/include/easyui.1.4.3/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="/omt/Public/include/easyui.1.4.3/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="/omt/Public/include/easyui.1.4.3/themes/color.css">
	<script type="text/javascript" src="/omt/Public/include/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="/omt/Public/include/easyui.1.4.3/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="/omt/Public/include/easyui.1.4.3/jquery.edatagrid.js"></script>
</head>
<body>
	<img src="/omt/Public/images/title.png">

	<div id="dlg" class="easyui-dialog" title="News" closed="true" style="width:400px;height:350px;padding:10px;;"
			data-options="
				buttons: [{
					text:'Ok',
					iconCls:'icon-ok',
					handler:function(){
						append()
						$('#dlg').dialog('close');
					}
				},{
					text:'Cancel',
					iconCls:'icon-cancel',
					handler:function(){
						$('#dlg').dialog('close');
					}
				}]
			">
		<div style="padding:10px 30px 20px 30px">
	    <form id="newsform" method="post">
	    	<table cellpadding="5">
	    		<tr>
	    			<td>標題</td>
	    			<td><input class="easyui-textbox" type="text" name="title" data-options="required:true" style="width:250px;"></input></td>
	    		</tr>
	    		<tr>
	    			<td>內容</td>
	    			<td><input class="easyui-textbox" type="text" name="content" data-options="multiline:true" style="width:250px;height:60px;"></input></td>
	    		</tr>
	    		<tr>
	    			<td>日期</td>
	    			<td><input class="easyui-datebox" type="text" id="date" name="date" data-options="required:true" style="width:250px;"></input></td>
	    		</tr>
	    		
	    	</table>
	    </form>
	    </div>
	</div>
	<div id="edit_dialog" class="easyui-dialog" title="編輯公告" closed="true" style="width:450px;height:400px;padding:10px;"
		buttons="#adduser_button">
		<div style="padding:10px 30px 20px 30px">
			<form id="form_edit" method="post" enctype="multipart/form-data">
				<table cellpadding="5">
	    		<tr>
	    			<td>標題</td>
	    			<td><input class="easyui-textbox" type="text" name="title" data-options="required:true" style="width:250px;"></input></td>
	    		</tr>
	    		<tr>
	    			<td>內容</td>
	    			<td><input class="easyui-textbox" type="text" name="content" data-options="multiline:true" style="width:250px;height:60px;"></input></td>
	    		</tr>
	    		<tr>
	    			<td>日期</td>
	    			<td><input class="easyui-datebox" type="text" id="date1" name="date" data-options="required:true" style="width:250px;"></input></td>
	    		</tr>
	    		
	    	</table>
			</form>
			<div id="edituser_button" style="float:right;" >
		        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="save('#form_edit')" style="width:90px">儲存</a>
		        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#edit_dialog').dialog('close')" style="width:90px">取消</a>
		    </div>
		</div>
	</div>
    <div id="outlayout" class="easyui-layout" data-options="fit:true">
	
		<div id="westwindows" data-options="region:'west',split:true" title="功能表" style="width:200px;height:525px;">
			<div id="item" class="easyui-penal" style="padding:30px;">
				<a href="#" class="easyui-linkbutton c8" style="width:95%;" onclick="addTab('系統資訊')"><span style="font-size:12pt;">系統資訊</span></a>
				<div class="easyui-penal" style="padding:5px;width:100;"></div>
				<a href="#" class="easyui-linkbutton c8" style="width:95%;" onclick='addTab("會員資料","<?php echo U("Index/member");?>")'><span style="font-size:12pt;">會員資料</span></a>
				<div class="easyui-penal" style="padding:5px;width:100;"></div>
				<a href="#" class="easyui-linkbutton c8" style="width:95%;" onclick='addTab("訂票資料","<?php echo U("Index/ticket");?>")'><span style="font-size:12pt;">訂票資料</span></a>
				<div class="easyui-penal" style="padding:5px;width:100;"></div>
				<a href="#" class="easyui-linkbutton c8" style="width:95%;" onclick='addTab("訂餐資料","<?php echo U("Index/food");?>")'><span style="font-size:12pt;">訂餐資料</span></a>
				<div class="easyui-penal" style="padding:5px;width:100;"></div>
				<a href="#" class="easyui-linkbutton c8" style="width:95%;" onclick='addTab("優惠資料","<?php echo U("Index/discount");?>")'><span style="font-size:12pt;">優惠資料</span></a>
				<div class="easyui-penal" style="padding:5px;width:100;"></div>
				<a href="#" class="easyui-linkbutton c8" style="width:95%;" onclick='addTab("各電影院","<?php echo U("Index/theater");?>")'><span style="font-size:12pt;">各電影院</span></a>
				<div class="easyui-penal" style="padding:5px;width:100;"></div>
				<a href="#" class="easyui-linkbutton c8" style="width:95%;" onclick='addTab("電影資訊","<?php echo U("Index/movie");?>")'><span style="font-size:12pt;">電影資訊</span></a>
				<div class="easyui-penal" style="padding:5px;width:100;"></div>
				<a href="#" class="easyui-linkbutton c8" style="width:95%;" onclick='addTab("各片票價","<?php echo U("Index/ticketprice");?>")'><span style="font-size:12pt;">各片票價</span></a>
				<div class="easyui-penal" style="padding:5px;width:100;"></div>
				<a href="#" class="easyui-linkbutton c8" style="width:95%;" onclick='addTab("電影場次","<?php echo U("Index/session");?>")'><span style="font-size:12pt;">電影場次</span></a>
			</div>
		</div>

		<div data-options="region:'center'">
			<div id="insidelayout" class="easyui-layout" data-options="fit:true">
				<div data-options="region:'center',iconCls:'icon-ok'">
					<div id="tt" class="easyui-tabs" style="width:100%;height:528px;"
						data-options="tabWidth:110,fit:true">
						<div title="系統資訊" style="width:100%;height:100%;">
							<table id="dg" class="easyui-datagrid" style="width:100%;height:530px;"
							toolbar="#toolbar"  idField="id"  rownumbers="true" fitColumns="true" singleSelect="true"
							data-options="url:'<?php echo U('Index/index_r');?>',method:'get',fit:true">
								<thead>
									<tr>
										<th field="title" width="50" editor="text">標題</th>
										<th field="content" width="50" editor="text">內容</th>
										<th field="date" width="50" align="right" editor="{type:'validatebox',options:{required:true}}">公告時間</th>
										<th field="n_id" width="50" data-options="hidden:true" editor="text">n_id</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	<div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="javascript:$('#dlg').dialog('open')">新增</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyRow()">刪除</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="edit_news()">編輯</a>
		
	</div>
    
    <script type="text/javascript">
		$(document).ready(function(){
	      	$("#date").datebox({
		        formatter:function(date){
		            var y=date.getFullYear();
		            var m=date.getMonth()+1;
		            var d=date.getDate();
		            return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);       
		        },
		        parser:function(s){
			        var t=Date.parse(s);
			        if (!isNaN(t)) {return new Date(t);}
			        else {return new Date();}
			    }     
	    	});
	    	$("#date1").datebox({
		        formatter:function(date){
		            var y=date.getFullYear();
		            var m=date.getMonth()+1;
		            var d=date.getDate();
		            return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);       
		        },
		        parser:function(s){
			        var t=Date.parse(s);
			        if (!isNaN(t)) {return new Date(t);}
			        else {return new Date();}
			    }     
	    	});
	    });
    	function edit_news(){
    		var row = $('#dg').datagrid('getSelected');
    		if(row.ot_id!=''){
    			$('#edit_dialog').dialog('open');
				$('#form_edit').form('load',row);
				url = "<?php echo U('Index/edit_c');?>?n_id=" + row.n_id;
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
		function addTab(title,url)
		{
			if($('#tt').tabs('exists', title))
			{
				$('#tt').tabs('select',title);
			}
			else {
				var content = 
				'<iframe scrolling="auto" frameborder="0"  src="'+url+'"  style="width:100%;height:99%" ></iframe>'
				$('#tt').tabs('add',{
					title:title,
					content:content,
					closable:true
				});
			}
		}
		function append(){
        	$('#newsform').form('submit',{
	            onSubmit: function(){
	            	if( $('#newsform').form('validate')==false){
	            		$.messager.confirm('警告','紅色欄位為必要欄位!!',function(r){
						    if (r){
						        $('#dlg').dialog('open');
						    }
						});
	            	}
	            	else{
	            		/*append_forDB();*/
	            		$.ajax({
			                url: "<?php echo U('Index/append_c');?>",
			                data:$('#newsform').serialize(),
			                type:"POST",
			                dataType:'text',
			                
			                success: function(result){

			                    result = JSON.parse(result);
			                    if (result==true) {
			                    	$.messager.alert('訊息','資料成功儲存');
			                    	setTimeout("location.href='<?php echo U('Index/index');?>'",850);
			                    } 
			                },
			                 error:function(result){ 
			                     console.log(result);
			                }
			        	});
	            		$('#newsform').form('clear'); 
	            		return $('#newsform').form('validate');
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
				$('#newsform').form('clear');
        	}*/

        function destroyRow(){
        	var row=$('#dg').datagrid('getSelected');
        	if(row){
        		$.messager.confirm('警告','確定要刪除此列',function(r){
        			if(r){
        				/*destroyRow_forDB()*/
        				$.ajax({
			                url:"<?php echo U('Index/destroyRow_c');?>",
                            data:{
                                delete_n_id:row.n_id
                            },
                            type:"POST",
                            async:false,
			                success: function(result){
			                    result = JSON.parse(result);
			                    if (result==true) {
			                    	$.messager.alert('訊息','成功刪除資料');
			                    	setTimeout("location.href='<?php echo U('Index/index');?>'",850);
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