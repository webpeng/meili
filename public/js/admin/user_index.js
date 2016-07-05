/* 
 * Copyright(c)2016 All rights reserved.
 * @Licenced  http://www.w3.org
 * @Author  liutian<1538731090@qq.com> liutian_jiayi
 * @Create on 2016-6-24 12:07:39
 * @Version 1.0
 */
$(function () {
	$("select").change(function () {
		//询问是否确定修改
		var result = confirm("确定修改分组权限吗？");
		if (result == false) {
			location.reload();
			return;
		}
		//修改分组
		$.ajax({
			type : "post",
			url : "/admin/user/setGroup",
			data :  "groupid=" + $(this).val() + "&uid=" + $(this).attr("uid"),
			dataType: "json",
			success : function (result) {
                            alert(result.info);
                            if (!result.stauts) location.reload();
			}
		});
	});
})

