/**
 * 时间对象的格式化;
 */
Date.prototype.format = function(format) {
	/*
	 * eg:format="yyyy-MM-dd hh:mm:ss";
	 */
	var o = {
		"M+" : this.getMonth() + 1, // month
		"d+" : this.getDate(), // day
		"h+" : this.getHours(), // hour
		"m+" : this.getMinutes(), // minute
		"s+" : this.getSeconds(), // second
		"q+" : Math.floor((this.getMonth() + 3) / 3), // quarter
		"S" : this.getMilliseconds()
			// millisecond
	}

	if (/(y+)/.test(format)) {
		format = format.replace(RegExp.$1, (this.getFullYear() + "").substr(4
				- RegExp.$1.length));
	}

	for (var k in o) {
		if (new RegExp("(" + k + ")").test(format)) {
			format = format.replace(RegExp.$1, RegExp.$1.length == 1
					? o[k]
					: ("00" + o[k]).substr(("" + o[k]).length));
		}
	}
	return format;
}
/**
 * 格式化数字
 */
Number.prototype.format = function(pattern){
	var strarr = this.toString().split('.');
	var fmtarr = pattern ? pattern.split('.') : [''];
	var retstr='';

	// 整数部分
	var str = strarr[0];
	var fmt = fmtarr[0];
	var i = str.length-1;  
	var comma = false;
	for(var f=fmt.length-1;f>=0;f--){
		switch(fmt.substr(f,1)){
			case '#':
				if(i>=0 ) retstr = str.substr(i--,1) + retstr;
				break;
			case '0':
				if(i>=0){
					retstr = str.substr(i--,1) + retstr;
				}
				else {
					retstr = '0' + retstr;
				}
				break;
			case ',':
				comma = true;
				retstr=','+retstr;
				break;
		}
	}
	if(i>=0){
		if(comma){
			var l = str.length;
			for(;i>=0;i--){
				retstr = str.substr(i,1) + retstr;
				if(i>0 && ((l-i)%3)==0){
					retstr = ',' + retstr;
				}
			}
		}
		else{
			retstr = str.substr(0,i+1) + retstr;
		}
	}
	retstr = retstr+'.';
	// 处理小数部分
	str=strarr.length>1?strarr[1]:'';
	fmt=fmtarr.length>1?fmtarr[1]:'';
	i=0;
	for(var f=0;f<fmt.length;f++){
		switch(fmt.substr(f,1)){
		case '#':
			if(i<str.length){
				retstr+=str.substr(i++,1);
			}
			break;
		case '0':
			if(i<str.length){
				retstr+= str.substr(i++,1);
			}
			else retstr+='0';
			break;
		}
	}
	return retstr.replace(/^,+/,'').replace(/\.$/,'');
}
Number.format = function(num, pattern){
	num = Number(num);
	return num.format(pattern);
}


String.prototype.trim = String.prototype.trim || function(){
    return this.replace(/^\s+|\s+$/g, '');
}