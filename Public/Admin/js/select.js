$(function(){
		var select="";
		var html='';
		// 为下拉框绑定change事件
        $('select').eq(0).change(function(){
             if($(this).context.value=='个人用户'){
                 select="<option value=''>--请选择--</option><option value='车驾用户'>车驾用户</option><option value='学员用户'>学员用户</option><option value='新车车主用户'>新车车主用户</option><option value='窗口用户''>窗口用户</option>"; 
                 $('select').eq(1).html(select);
             }
             if($(this).context.value=='单位用户'){
                select="<option value=''>--请选择--</option><option value='道路运输企业'>道路运输企业</option><option value='教育行政部门'>教育行政部门</option><option value='道路运输管理部门'>道路运输管理部门</option><option value='驾驶培训企业'>窗口用户</option><option value='汽车销售商家'>汽车销售商家</option><option value='安监部门'>安监部门</option><option value='学校'>学校</option><option value='医院'>医院</option><option value='其他'>其他</option><option value='检测站'>检测站</option>"; 
                $('select').eq(1).html(select);
             }
        });

        $('select').eq(2).change(function(){
              if($(this).context.value=='机动车业务'){
                 html="<option value=''>--请选择--</option><option value='预选机动车号牌'>预选机动车号牌</option><option value='机动车检查预约'>机动车检查预约</option><option value='补领机动车号牌'>补领机动车号牌</option><option value='换领机动车号牌'>换领机动车号牌</option><option value='补领机动车行驶证'>补领机动车行驶证</option><option value='换领机动车行驶证'>换领机动车行驶证</option><option value='补换领机动车检验合格标志'>补换领机动车检验合格标志</option><option value='变更车主联系方式'>变更车主联系方式</option>";
                 $('select').eq(3).html(html);
              }
              if($(this).context.value=='驾驶证业务'){
                 html="<option value=''>--请选择--</option><option value='期满换证'>期满换证</option><option value='超龄换证'>超龄换证</option><option value='损毁换证'>损毁换证</option><option value='遗失补证'>遗失补证</option><option value='延期换证'>延期换证</option><option value='延期审验'>延期审验</option><option value='延期提交身体条件证明'>延期提交身体条件证明</option><option value='考试预约'>考试预约</option><option value='取消考试预约'>取消考试预约</option><option value='打印学习驾驶证明'>打印学习驾驶证明</option><option value='变更联系方式'>变更联系方式</option>";
                 $('select').eq(3).html(html);
              }
              if($(this).context.value=='违法处理业务'){
                 html=" <option value=''>--请选择--</option><option value='电子监控处理'>电子监控处理</option><option value='缴纳罚款'>缴纳罚款</option>";
                 $('select').eq(3).html(html);
              }
        });
  
	});