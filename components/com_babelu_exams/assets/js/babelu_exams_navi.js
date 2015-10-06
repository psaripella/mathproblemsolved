var babelu_exams_box_count = new Number(0);

var babelu_exams_current_box = 'box1';

function setBabeluExamsBoxCount(box_count)
{
	babelu_exams_box_count = box_count;
}

function babeluExamsShowHide(box)
{
	var i = 1;
	while(i <= babelu_exams_box_count)
	{
		var m = "js-box"+i;
		if(document.getElementById(m).className == "open")
		{
			document.getElementById(m).className = "closed";
		}
		 i++;
	}
	
	babelu_exams_current_box = box;
	document.getElementById(box).className="open";	
}

function babeluExamsPageTop()
{
	var babelu_exams_top = document.getElementById("babelu_exams_navi_top").offsetTop;
	
	window.scrollTo(0,babelu_exams_top);
}

function babeluExamsPageBottom()
{
	var babelu_exams_bottom = document.getElementById("babelu_exams_navi_bottom").offsetTop;

	window.scrollTo(0,babelu_exams_bottom);
}

function babeluExamsGoPrev()
{
	// split current box at the number
	var current_box_num = babelu_exams_current_box.substr(6);
	// add one to the number
	var make_num = new Number(current_box_num);
	// subtract the box prefix 
	make_num--;
	// create the new box id
	var goto_box = 'js-box'+ make_num;
	
	// if the new box is greater than or equal to 1
	// then show hide using the new box id
	if(make_num >= 1)
	{
		babeluExamsShowHide(goto_box);
	}
}

function babeluExamsGoNext()
{
	// split current box at the number
	var current_box_num = babelu_exams_current_box.substr(6);
	// add one to the number
	var make_num = new Number(current_box_num);
	// add the box prefix 
	make_num++;
	// create the new box id
	var goto_box = 'js-box'+ make_num;
	
	// if the new box is less than or equal to the total number of boxes
	// then show hide using the new box id
	if(make_num <= babelu_exams_box_count)
	{
		babeluExamsShowHide(goto_box);
	}
}
