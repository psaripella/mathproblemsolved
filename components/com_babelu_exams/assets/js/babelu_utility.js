var babelu_utility = 
{
	$: function(elementId)
	{
		'use strict';
		if(typeof elementId == 'string')
		{
			return document.getElementById(elementId);
		}
	},  // end of $() function.
	
	setText: function(id, message)
	{
		'use strict';
		if((typeof id == 'string') && (typeof message == 'string'))
		{
			var output = $this.$(id);
			if(!output){return flase;}
			if(output.textContent !== undefined){ output.textContent = message;}
			else{ output.innerText = message;}
			return true;
		} // End primary if
	}, //end of setText() function
	
	addEvent: function(obj, type, fn)
	{
		'use strict';
		if(obj && obj.addEventListener){obj.addEventListener(type, fn, false);}
		else if (obj && obj.attachEvent){ obj.attachEvent('on'+type, fn);}
	}, // end of addEvent() function
	
	removeEvent: function(obj, type, fn)
	{
		'use strict';
		if(obj && obj.removeEventListener){obj.removeEventListener(type,fn,false);}
		else if(obj && obj.dettachEvent){ obj.detachEvent('on'+type,fn);}
	},//end of removeEvent() function
	
	
	getElementsByClassName: function(obj, classname)
	{	
		if(obj.getElementsByClassName)
		{
			return obj.getElementsByClassName(classname);
		}
		else
		{	
			var classElements = [];
			if(obj == null){obj = document;}
			var tag = "*";
			var  els = obj.getElementsByTagName(tag);
			var elsLen = els.length;
			var i , j;
			
			for(i = 0, j = 0; i < elsLen; i++)
			{
				var str = els[i].className;
				var str_array = str.split(" ");
				var l;
				for(l = 0; l < str_array.length; l++ )
				{
					if(str_array[l] == classname)
					{
						classElements[j] = els[i];
						j++;
					}
				}// end sub loop
			} // end main loop
			
			return classElements;
		}
	}, //end of GetElementsByClassName() function
	
	addEventByClass: function(classname, type, fn)
	{
		var objArray = babelu_utility.getElementsByClassName(document, classname);
		var count = objArray.length;
		var i;
		
		for(i = 0; i < count; i++)
		{
			babelu_utility.addEvent(objArray[i], type, fn);
		}
		
		return objArray;
	}, // end of addEventByClass() function
};