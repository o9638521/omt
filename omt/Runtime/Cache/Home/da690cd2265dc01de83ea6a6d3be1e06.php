<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="/omt/Public/js/modernizr.js"></script> <!-- Modernizr --> 
        <script src="/omt/Public/include/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="/omt/Public/include/jquery.mobile-1.4.5/css/jquery.mobile-1.4.5.css" />
        <script src="/omt/Public/include/jquery.mobile-1.4.5/js/jquery.mobile-1.4.5.js"></script>
        <link rel="stylesheet" href="/omt/Public/include/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="/omt/Public/css/reset.css"> <!-- CSS reset -->
        <link rel="stylesheet" href="/omt/Public/css/style.css"> <!-- Resource style -->
        <script src="/omt/Public/js/main.js"></script> <!-- Resource jQuery -->
        <!--Bootstrap-->
        <script src="/omt/Public/include/bootstrap/js/bootstrap.js"></script>
        <title>Ticket</title>
        <style>
            .cd-3d-nav a {
                font-size: 10px;
            }
            .ui-page-theme-a,body,
            .ui-page-theme-a .ui-panel-wrapper {
              	background-color: 	rgba(30, 221, 133, 0.77) ;
              	border-color:	#bbb;
              	color: 	#333;
              	text-shadow: 0  0px  0  ;
            }
            .form-control{
                font-size: 15px;
                background-color: rgba(52, 60, 85,1);
                color: #fff;
                border: : 1px outset;
            }
            .ui-btn {
                padding: 0px;
            }
            body{
                transition: background-color .8s ease-in-out;
                -moz-transition: background-color .8s ease-in-out;
                -webkit-transition: background-color .8s ease-in-out;
            }
            body{
                opacity: 0;
                transition: opacity .25s ease-in-out;
                -moz-transition: opacity .25s ease-in-out;
                -webkit-transition: opacity .25s ease-in-out;
            }
            body.visible {
                opacity: 1;
                transition: opacity .8s ease-in-out;
                -moz-transition: opacity .8s ease-in-out;
                -webkit-transition: opacity .8s ease-in-out;
            }
            .m_img{
                padding:0px;
            }
            .m_title{
                font-size:18px;
            }
            .m_content{
                font-size:9px;
                color: #ACA6AC;
                font-weight: lighter;
            }
        </style>
        <script>
        		$(document).ready(function(){
                window.requestAnimationFrame(updateSelectedNav);
          			$('body').toggleClass("visible");
          			$(".nav_list").click(function(){
            				event.preventDefault();
            				// Sets the new destination to the href of the link
            				color = $(this).data("color");
            				$('body').css('background-color', color );
            				$('body').css('opacity','0' );
            				setTimeout("location.href='<?php echo U('index/"+this.id+"');?>'",850);
          			});
          		//js取select值 傳給php
        		});
        		function express(){
          			var add_cash = select_cash.select_cash.value; //取select value="" 值
          			$.ajax({
                    url: "Stored_Cash.php",
                    data:{value:add_cash},
                    type:"GET",
                    dataType:'text',

                    success: function(msg){
                        alert(msg);
                    },

                     error:function(xhr, ajaxOptions, thrownError){ 
                        alert(xhr.status); 
                        alert(thrownError); 
                    }
                });
                setTimeout("location.href='user.php'",850);
        		}
            function sign_out(){
                $.ajax({
                    url: "sign_out.php",
                    type:"GET",
                    dataType:'text',

                    success: function(msg){
                        alert(msg);
                    },      
                });
                setTimeout("location.href='index.php'",850);
            }
        </script>
    </head>
    <body>
        <div id="easyin">
            <div id="order_t" data-role="page">
                <header class="cd-header navbar-fixed-top" > 
                    <a href="#0" class="cd-3d-nav-trigger " >
                        <img src="img/icon-user.svg" style="width:100%;height:100%;">
                        <span></span>
                    </a>           
                    <a href="index.php" class="cd-3d-nav-trigger-home " data-ajax="false" >
                        <img src="img/icon-home.svg" style="width:100%;height:100%;">
                    </a>
                </header> <!-- .cd-header -->
                <nav class="cd-3d-nav-container navbar-fixed-top">
                    <ul class="cd-3d-nav">
                        <li>
                            <a class="nav_list" id="order_t" data-color="#4FE29E" >訂票去</a>
                  			</li>

                  			<li>
                            <a class="nav_list" id="order" data-color="#4FE29E">訂餐去</a>
                  			</li>

                  			<li class="cd-selected" id="nav_user" user="user">
                            <a class="nav_list" id="member" data-color="#485274" >個人資料</a>
                  			</li>

                  			<li >
                            <a class="nav_list" id="ticket" data-color="#4FE29E" >我的票卷</a>
                  			</li>

                  			<li>
                            <a class="nav_list" id="order_t" data-color="#4FE29E">優惠收藏</a>
                  			</li>
                		</ul> <!-- .cd-3d-nav -->
                    <span class="cd-marker color-4"></span> 
                </nav> <!-- .cd-3d-nav-container -->
                   <!--Main-->
                <main>
                    <div class="ui-content" style="position: relative;top: 80px;">
                     	  <!--<div  class="content next">-->
                          <!--     以下新增      -->
                        <div class="table-responsive" style="padding:10px; background-color:#FFF; font-size:20px; font-family:微軟正黑體; font-weight:bold; ">
                            <table class="table table-hover table-striped">
                                  <thead>
                                      <tr>
                                          <div style="text-align:center; font-size:24px; padding:15px;">會員資料</div>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr >
                                          <td style="width:30%; color:#006; text-align:center;">帳號</td>
                                          <td style="width:70%;"> 7788 </td>
                                      </tr>
                                      <tr >
                                          <td style="color:#006; text-align:center;">密碼</td>
                                          <td> 7788 </td>
                                      </tr>
                                      <tr >
                                          <td style="color:#006; text-align:center;">姓名</td>
                                          <td> 阿松菌 </td>
                                      </tr>
                                      <tr >
                                          <td style="color:#006; text-align:center;">E-mail</td>
                                          <td> songhan@gmail.com </td>
                                      </tr>
                                      <tr >
                                          <td style="color:#006; text-align:center;">生日</td>
                                          <td> 0708 </td>
                                      </tr>
                                      <tr >
                                          <td style="color:#006; text-align:center;">手機 / 電話</td>
                                          <td> 0912345678 </td>
                                      </tr>
                                      <tr >
                                          <td style="color:#006; text-align:center;">餘額</td>
                                          <td> 負債中... </td>
                                      </tr>
                                      <tr>
                                          <td style="color:#006; text-align:center;">儲值</td>
                                          <td >
                                              <form name="select_cash" method="post" style="font-size:18px;"> 
                                                  <div> <div style="width:70%;"> 
                                                      <select name="select_cash"> 
                                                          <option value="0">請選擇儲值金額</option> 
                                                          <option value="100">100</option> 
                                                          <option value="300">300</option> 
                                                          <option value="500">500</option> 
                                                          <option value="1000">1000</option> 
                                                      </select> 
                                                  </div> 
                                              </form>
                                          </td>
                                      </tr>
                                      <tr >
                                          <td ></td>
                                          <td>
                                              <div style="width:50%; "> 
                                                  <button type="submit" style="font-size:24px; padding:5px;" onclick="express()">儲值</button>
                                              </div>
                                          </td>
                                      </tr>
                                  </tbody>
                            </table>
                            <div style="height:15px;"></div> <!-- 與上表格空格 --> 
                            <div  style="text-align:center;"> 
                                <a id="sign_out"  class="btn btn-primary" style="width:40%;font-weight:bold;font-size:20px;padding:8px; color:#FFF;" onClick="sign_out()">登出</a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>