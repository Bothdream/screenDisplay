<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>图片展示</title>
  <style>
	body {margin-left:60px; }
  body div.more{width: 100%;text-align: center;}
  body a {text-decoration: none;}
  #table_contianer a  img.img{width:200px;height: 130px;display: inline-block;}
  </style>
<body> 
<!-- HTML START -->
  <table id='table_contianer'>

    <tr>
  <?php foreach($data as $k => $v):?>
      <?php if($k<=5):?>
        <td>
      		<div>
              <a href="#">
                   <img src="/screen-master/Public/Home/<?php echo $v['img'];?>" class='img'/>
              </a>
               <div>工号：<?php echo $v['wid'];?><br>姓名：<?php echo $v['wname'];?><br>接听电话数量：<?php echo $v['num'];?><br>接听电话的时间：<?php echo $v['time'];?></div>
      		</div>
    	  </td>	
      <?php endif;?>
 <?php endforeach;?>
  </tr> 
   <tr>
   <?php foreach($data as $k => $v):?>
      <?php if($k>5):?>   
      <td>
        <div>
            <a href="#">
                 <img src="/screen-master/Public/Home/<?php echo $v['img'];?>" class='img'/>
            </a>
             <div>工号：<?php echo $v['wid'];?><br>姓名：<?php echo $v['wname'];?><br>接听电话数量：<?php echo $v['num'];?><br>当天时间：<?php echo $v['time'];?></div>
        </div>
      </td> 
      <?php endif;?>
   <?php endforeach;?>
  </tr> 
</table>
  <div class="more"><a href="#" onclick="demand();" id="more">更多...</a></div>
</body>
<script src="/screen-master/Public/Home/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" charset="utf-8">
    function demand(){
        $.ajax({
            type:'post',
            url:"<?php echo U('more');?>",
            data:'',
            dataTyp:'json',
            success:function(msg){
               /*******装换为js数组*******/
               msg = eval(msg);
               var html = "<tr>";
               for (var i = 0; i < msg.length; i++) {
                   html += "<td><div>";
                   html += "<a><img src='/screen-master/Public/Home/" + msg[i]['img'] + "' class='img'/></a>";
                   html += "<div>工号："+ msg[i]['wid'] + "<br>姓名：" + msg[i]['wname'] + "<br>接听电话数量：" + msg[i]['num'] + "<br>当天时间："+ msg[i]['time']+ "</div>";  
                   html +="</div></td>";
               }
               html += "</tr>";
               $('#table_contianer').append(html); 
               $('#more').html('');
            }
        });
    }
</script>
</html>