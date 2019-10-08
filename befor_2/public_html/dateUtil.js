/*管理画面のタブ初期化*/

window.onload = function(){

	if(location.href.indexOf('tab=list') != -1){

		topic_sw('list');

	}else{

		topic_sw('input');

	}

}



/*修正画面での画像追加時のradio制御*/

function activate_img_radio(img_name,radio_on){

	var img_name;

	var radio_on;

	if(img_name != ''){

		document.getElementById(radio_on+'_2').checked = true;

	}

}



function setFromNow(){

//セレクト部品の日付を現在時刻に設定

	var date = new Date();



	setFromSelectOptions('POSTED_Y'     , date.getFullYear()  );

	setFromSelectOptions('POSTED_M'     , date.getMonth() + 1 );

	

	rebuildOptionMaxDay();

	

	setFromSelectOptions('POSTED_D'     , date.getDate()      );

	setFromSelectOptions('POSTED_TIME_H', date.getHours()     );

	setFromSelectOptions('POSTED_TIME_M', date.getMinutes()   );

	setFromSelectOptions('POSTED_TIME_S', date.getSeconds()   );



	//getDwrMaxDay();

}



function setFromSelectOptions(id, preCondition) {

//preCondition現在の選択(id)フォーム部品のID

	var form = document.getElementById(id);

	for (i = 0; i < form.options.length; i++) {

		if (form.options[i].text == preCondition) {

			form.options[i].selected = true;

			return true;

		}

	}

	return false;

}



function rebuildOptionMaxDay(){

//月に対応したのmax値を取得してオプション部品を再生成



	var formYear = document.getElementById('POSTED_Y');

	var year = formYear.options[formYear.selectedIndex].text;

	var formMonth = document.getElementById('POSTED_M');

	var month = formMonth.options[formMonth.selectedIndex].text;

	

	changeFromDay(getMaxDay(year, month));

}



function getMaxDay(year, month){

	var lastday = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

	if (((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0)){

		lastday[1] = 29;

	}

	return lastday[month - 1];

}





function changeFromDay(data) {

//('formDay')日付を現在の選択に戻す

    var optionDay = document.getElementById('POSTED_D');

    var index = optionDay.selectedIndex;

    optionDay.innerHTML = "";

    for ( i = 1; i <= data; i++){

    	optionDay.options[i-1] = new Option( i, i);

    }

	if ( index >= optionDay.options.length ) {

		index = optionDay.options.length - 1;

	}

    optionDay.selectedIndex = index;

}



//タグを挿入する

function insertTag(id, tag){

	var form = document.getElementById(id);

    var str = getSelectionRange(form);

	

	//文字列を加工

	var startTag = "<" + tag + ">";

	var endTag   = "</" + tag + ">";

	str = startTag + str + endTag;





    setSelectionRange(form, str);

}



//フォントサイズを変更

function insertFontSize(id, size){

	if(size != ''){

	var form = document.getElementById(id);

    var str = getSelectionRange(form);

	

	//文字列を加工

	var startTag = "<span style=\"font-size:" + size + ";\">";

	var endTag   = "</span>";

	str = startTag + str + endTag;



    setSelectionRange(form, str);

	}

}



//フォントカラーを変更

function insertFontColor(id, color){

	if(color != ''){

	var form = document.getElementById(id);

    var str = getSelectionRange(form);

	

	//文字列を加工

	var startTag = "<span style=\"color:" + color + ";\">";

	var endTag   = "</span>";

	str = startTag + str + endTag;



    setSelectionRange(form, str);

	}

}



//太字にする

function insertBold(id){

	var form = document.getElementById(id);

    var str = getSelectionRange(form);

	

	//文字列を加工

	var startTag = "<span style=\"font-weight:bold;\">";

	var endTag   = "</span>";

	str = startTag + str + endTag;



    setSelectionRange(form, str);

}



//リンクを追加

function addLinkUrl(id,blkCheck){

	var form = document.getElementById(id);

	var url = "";

	url = prompt("リンクするURLを入力してください","");

	if(url == null){

		alert("キャンセルされました");

	}else if(url != ""){

		insertLinkUrl(form,url,blkCheck);

	}

}



//リンクを追加

function insertLinkUrl(form,url,blkCheck){

    var str = getSelectionRange(form);

	

	//文字列を加工

	if(document.getElementById(blkCheck).checked == true){

	var startTag = "<a href=\"" + url + "\" target=\"_blank\">";

	}else{

	var startTag = "<a href=\"" + url + "\">";

	}

	var endTag   = "</a>";

	str = startTag + str + endTag;



    setSelectionRange(form, str);

}



//画像を挿入

function insertFile(id, picUrl,picUrlLarge) {



	var form = window.opener.document.getElementById(id);

    //var str = getSelectionRange(form);	

	

	//文字列を加工

	var str = "<img src=" + picUrl + " />";

	str = "<a href=" + picUrlLarge + " rel=lightbox >" + str + "</a>";

	

    setSelectionRange(form, str);	



}



// 画像を挿入

function insertFile2( id, picName )

{

	// alert( str );

	var form = window.opener.document.getElementById( id );

	

	str ="<blog_pic>" + picName + "</blog_pic>"

	

	setSelectionRange(form, str);	

}



//URLを挿入

function insertUrl(id) {

/*

	var form = window.opener.document.getElementById(id);

	var str = getSelectionRange(form);

	

	var strUrl = document.getElementById('URL').value;

	

	//文字列を加工

	//var startTag = "<a href=" + strUrl + " target=_blank >";

	//var endTag   = "</a>";

	//str = startTag + str + endTag;

	str = "<$link " + strUrl + " $>" + str;





    setSelectionRange(form, str);

*/

}





function setSelectionRange(object, tagstr) {

//objectに選択されている場所にtagstrを挿入。選択されていなければ最後に挿入

    if(document.selection) {

		if(getSelectionRange(object)) {

	    	document.selection.createRange().text = tagstr;

		} else {

	    	object.value = object.value + tagstr;

    	}

     } else if( isGecko() ) {

		var start = object.selectionStart;

		var end   = object.selectionEnd;

		var len   = object.textLength;

		var str   = object.value.substring(start, end);

		var head  = object.value.substring(0, start);

		var foot  = object.value.substring(end, len);

		object.value = head + tagstr + foot;

     } else if( isWebKit() ) {

		var start = object.selectionStart;

		var end   = object.selectionEnd;

		var len   = object.textLength;

		var str   = object.value.substring(start, end);

		var head  = object.value.substring(0, start);

		var foot  = object.value.substring(end, len);

		object.value = head + tagstr + foot;

    } else {

	    object.value = object.value + tagstr;

    }

}

function getSelectionRange(object) {

//選択されている文字があればその文字列、なければ空の文字列を返す。

    var str = "";

    if (document.selection) {

		str = document.selection.createRange().text;

    }

    else if(isGecko()){

		var start = object.selectionStart;

		var end   = object.selectionEnd;

		str       = object.value.substring(start, end);

    }

    else if(isWebKit()){

		var start = object.selectionStart;

		var end   = object.selectionEnd;

		str       = object.value.substring(start, end);

    }

    else {

        str = '';

    }



    return str;	

}



//Geckoの判定

function isGecko() {

	var gecko = false;

	if(navigator){

    	if(navigator.userAgent){

        	if(navigator.userAgent.indexOf("Gecko/") != -1){

            	gecko = true;

        	}

    	}

	}

	return gecko;

}



//WebKitの判定

function isWebKit() {

	var webkit = false;

	if(navigator){

    	if(navigator.userAgent){

        	if(navigator.userAgent.indexOf("WebKit/") != -1){

            	webkit = true;

        	}

    	}

	}

	return webkit;

}





function topic_sw(dispmode){

	var dispmode;

	if(dispmode == 'input' && document.getElementById('new_topic_input')){

		document.getElementById('new_topic_input').style.display='block';

		document.getElementById('topic_edit_list').style.display='none';

		document.getElementById('topic_input_list_sw_01').className = 'active';

		document.getElementById('topic_input_list_sw_02').className = 'default';

	}else if(dispmode == 'list' && document.getElementById('new_topic_input')){

		document.getElementById('new_topic_input').style.display='none';

		document.getElementById('topic_edit_list').style.display='block';

		document.getElementById('topic_input_list_sw_01').className = 'default';

		document.getElementById('topic_input_list_sw_02').className = 'active';

	}

}



function confirm_delete(action){

	var action;

	if(action == 'delete'){

		if(window.confirm('この記事を削除します。よろしいですか？')){

			return true;

		}else{

			return false;

		}

}

}