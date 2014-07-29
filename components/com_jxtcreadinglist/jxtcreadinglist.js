function jxtcPost( element, posturl ) {
	new Request({
    url: posturl,
    method: 'post',
    onSuccess: function(resp){
			var data = eval('(' + resp + ')');
      element.innerHTML = data[1];
      
      if (resp[0] == 0) {
      	if (document.getElementById('readinglistinfo_noitems') != null) { document.getElementById('readinglistinfo_noitems').style.display='block';}
      	if (document.getElementById('readinglistinfo_items') != null) { document.getElementById('readinglistinfo_items').style.display='none';}
      }
      else {
      	if (document.getElementById('readinglistinfo_noitems') != null) { document.getElementById('readinglistinfo_noitems').style.display='none';}
      	if (document.getElementById('readinglistinfo_items') != null) { document.getElementById('readinglistinfo_items').style.display='block';}
      	if (document.getElementById('readinglistinfo_count') != null) { document.getElementById('readinglistinfo_count').innerHTML=data[0];}
      }
    }
	}).send();
}
