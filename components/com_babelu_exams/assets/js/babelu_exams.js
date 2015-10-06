var babelu_progress =
	{
		completed_text : "",
		complete: [],
		
		problem_count: 0,
		
		setProblemCount: function(count)
		{
			babelu_progress.problem_count = count;
		}, // end of setProblemCount() function
		
		setCompletedText: function(text)
		{
			babelu_progress.completed_text = text;
		}, // end of setCompletedText() function

		addComplete: function(id)
		{
			babelu_progress.complete.push(id);
		}, //end of addComplete() function
		
		checkProgress: function(e)
		{
			//get the target element
			var targ = e.target || e.srcElement;
			
			
			var do_update = true;
			if(babelu_progress.complete.length != 0)
			{
				var i = 0;
				var completed_count = babelu_progress.complete.length;
				while (i <= completed_count)
				{
					if(babelu_progress.complete[i] == targ.name)
					{
						do_update = false;
					}
					i++;
				}
			}
			
			if(do_update)
			{
				//add targ to complete array
				babelu_progress.addComplete(targ.name);
				
				//update progress bar
				babelu_progress.updateProgress();
			}
			
			//remove event listener
			babelu_utility.removeEvent(targ, 'change', babelu_progress.checkProgress);
			
		}, // end checkProgress() function
		
		updateProgress: function ()
		{
			// get the size of the progress box
			var box_width = document.getElementById('progress_bar_box').offsetWidth;
			// clean the border from the number
			box_width = new Number (box_width - 2);
			
			// get the 1% value
			var increment = (box_width /babelu_progress.problem_count);
				
			// get the width of green bar
			var green_width = document.getElementById('progress_bar_completed').offsetWidth;
			
			green_width += increment;
			
			var text_percent = Math.round((babelu_progress.complete.length /babelu_progress.problem_count)*100)+'%';

			if(green_width >= box_width || babelu_progress.complete.length >= babelu_progress.problem_count )
			{
				green_width = box_width +1;
				text_percent = babelu_progress.completed_text;
				document.getElementById('progress_bar_box').style.border = '1px solid #f0f000';
			}
			
			document.getElementById('progress_bar_completed').style.width = green_width+'px';
			document.getElementById('progress_bar_text').innerHTML = text_percent;
			
		}, //end of update progress function
		
	};

var babelu_form =
	{
		default_text: "",
		confirmation_msg: "",
		
		setDefaultText: function (text)
		{
			babelu_form.default_text = text;
		}, // end setDefaultText() function
		
		setConfirmationMsg: function(text)
		{
			babelu_form.confirmation_msg = text;
		}, // end setConfirmationMsg() function
		
		clearDefaultText: function(e)
		{
			var targ = e.target || e.srcElement;
			
			if(babelu_form.default_text == targ.value)
			{
				targ.value = "";
				targ.style.color= "#000000";
			}
		}, // end clearDefaultText() function
		
		confirmSubmit: function(e)
		{
			var task_check = (document.getElementById("form_task").value == "exam.submit");
			if(task_check)
			{
				var ans = babelu_utility.getElementsByClassName(document, 'js-answered');
				var anLen = ans.length;
				var i , j;
				var k = true;
			
				for(i = 0, j = 0; i < anLen; i++)
				{
					if(ans[j].checked == false && k == true)
					{
						var confirm_submit = confirm(babelu_form.confirmation_msg);
						if(confirm_submit == false)
						{
							e.preventDefault();
						}
						k = false;
					}
					j++;
				}
			}
		}, // end of confirm single submit() function
		
		setTask: function(e)
		{
			var form_task = document.getElementById("form_task");
			if(form_task.value == "exam.submit")
			{
				form_task.value = "exam.pause";
			}
			
			document.getElementById("babelu_examForm").submit();
		}
	};

babelu_navi = 
	{
		box_count: 0,
		current_box: 'js-box1',
		toTop: false,
		
		setBoxCount: function (count)
		{
			babelu_navi.box_count = count;
		}, // end setBoxCount() function
		
		setToTop: function($value)
		{
			babelu_navi.toTop = $value;
		}, //end toggleToTop
		
		updateCurrentBox: function (e)
		{	e.preventDefault();
			var targ = e.target || e.srcElement;
			var classNames = targ.className.split(" ");
			
			babelu_navi.current_box = classNames[0];
			
			babelu_navi.showHide();
		}, //end of updateCurrentBox() function
		
		showHide: function()
		{
			if(document.getElementById(babelu_navi.current_box) == undefined)
			{
				babelu_navi.current_box = "js-box1";
			}
			
			var i = 1;
			while(i <= babelu_navi.box_count)
			{
				var m = "js-box"+i;
				var d = document.getElementById(m);
				if(d.id != babelu_navi.current_box && d.className == "open")
				{
					d.className = "closed";
				}
				
				if(d.id == babelu_navi.current_box && d.className == "closed")
				{
					d.className = "open";
				}
				 i++;
			}
			
			babelu_navi.scrollToTop();
		}, // end of showHide() function
			
		goToNext: function()
		{
			var current_num = new Number(babelu_navi.current_box.substr(6))*1;
			
			current_num++;
			babelu_navi.current_box = 'js-box'+current_num;
			
			babelu_navi.showHide();
		}, // end of goToNext() function
		
		goToPrev: function()
		{
			var current_num = new Number(babelu_navi.current_box.substr(6))*1;
			
			current_num--;
			babelu_navi.current_box = 'js-box'+current_num;
			
			babelu_navi.showHide();
		} ,// end of goToPrev() function
		
		scrollToTop: function()
		{
			if(babelu_navi.toTop == true)
			{
				var wrapper = babelu_utility.getElementsByClassName(document, "babelu_exams_wrapper");
				var topOffset = wrapper[0].offsetTop;
				window.scrollTo(0,topOffset);
				
			}
		}, // end of scrollToTop
		
		showCorrect: function()
		{
			var incorrectProblems = babelu_utility.getElementsByClassName(document, "js-incorrect");
			var partialProblems = babelu_utility.getElementsByClassName(document, "js-partial");
			var correctProblems = babelu_utility.getElementsByClassName(document, "js-correct");

			
			var incorrectCount = incorrectProblems.length;
			var partialCount = partialProblems.length;
			var correctCount = correctProblems.length;
			
			for(i = 0; i < incorrectCount; i++)
			{
				incorrectProblems[i].style.display = 'none';
			}
			
			for(i = 0; i < partialCount; i++)
			{
				partialProblems[i].style.display = 'none';
			}
			

			for(i = 0; i < correctCount; i++)
			{
				correctProblems[i].style.display = 'block';
			}
			
			
			var buttonId= 'bu_show_correct';
			this.indicateSelection(buttonId);
		}, // end of showCorrect function
		
		showIncorrect: function()
		{
			var incorrectProblems = babelu_utility.getElementsByClassName(document, "js-incorrect");
			var partialProblems = babelu_utility.getElementsByClassName(document, "js-partial");
			var correctProblems = babelu_utility.getElementsByClassName(document, "js-correct");
			
			var incorrectCount = incorrectProblems.length;
			var partialCount = partialProblems.length;
			var correctCount = correctProblems.length;
			
			for(i = 0; i < incorrectCount; i++)
			{
				incorrectProblems[i].style.display = 'block';
			}
			
			for(i = 0; i < partialCount; i++)
			{
				partialProblems[i].style.display = 'none';
			}
			
			for(i = 0; i < correctCount; i++)
			{
				correctProblems[i].style.display = 'none';
			}
			
			var buttonId= 'bu_show_incorrect';
			this.indicateSelection(buttonId);
		}, // end of showIncorrect function
		
		showPartial: function()
		{
			var incorrectProblems = babelu_utility.getElementsByClassName(document, "js-incorrect");
			var partialProblems = babelu_utility.getElementsByClassName(document, "js-partial");
			var correctProblems = babelu_utility.getElementsByClassName(document, "js-correct");
			
			var incorrectCount = incorrectProblems.length;
			var partialCount = partialProblems.length;
			var correctCount = correctProblems.length;
			
			for(i = 0; i < incorrectCount; i++)
			{
				incorrectProblems[i].style.display = 'none';
			}
			
			for(i = 0; i < partialCount; i++)
			{
				partialProblems[i].style.display = 'block';
			}
			
			for(i = 0; i < correctCount; i++)
			{
				correctProblems[i].style.display = 'none';
			}
			
			var buttonId= 'bu_show_partial';
			this.indicateSelection(buttonId);
		}, // end of showPartial function
		
		clearProblemFilters: function()
		{
			var incorrectProblems = babelu_utility.getElementsByClassName(document, "js-incorrect");
			var partialProblems = babelu_utility.getElementsByClassName(document, "js-partial");
			var correctProblems = babelu_utility.getElementsByClassName(document, "js-correct");
			
			var incorrectCount = incorrectProblems.length;
			var partialCount = partialProblems.length;
			var correctCount = correctProblems.length;
			
			for(i = 0; i < incorrectCount; i++)
			{
				incorrectProblems[i].style.display = 'block';
			}
			
			for(i = 0; i < partialCount; i++)
			{
				partialProblems[i].style.display = 'block';
			}
			
			for(i = 0; i < correctCount; i++)
			{
				correctProblems[i].style.display = 'block';
			}
			
			var buttonId= 'bu_show_all';
			this.indicateSelection(buttonId);
		}, // end of showPartial function
		
		indicateSelection: function(buttonId)
		{
			document.getElementById("bu_show_all").disabled=false;
			document.getElementById("bu_show_correct").disabled=false;
			document.getElementById("bu_show_incorrect").disabled=false;
			document.getElementById("bu_show_partial").disabled=false;
			
			var targ = document.getElementById(buttonId);
			targ.disabled=true;
			
		}// end of indicateSelction function
	};

var babelu_timer = 
	{
		max_time: new Number(),
		
		min_time: new Number(),
		
		time_out_msg: " ",
		
		setMaxTime: function(max_time)
		{
			babelu_timer.max_time = max_time;
		}, // end of setMaxTime() function

		setMinTime: function(min_time)
		{
			babelu_timer.min_time = min_time;
		},
		
		setTimeOutMsg: function(msg)
		{
			babelu_timer.time_out_msg = msg;
		}, // end of setTimeOutMsg() function
		
		countDown: function()
		{
			if(babelu_timer.max_time < 0 )
			{
				// alert the user
				alert(babelu_timer.time_out_msg);
				
				// submit the form
				document.getElementById("babelu_examForm").submit();
			}
			else
			{
				var amount = babelu_timer.max_time;
				var out = "";
				var hour = new Number(0);
				var min = new Number(0);
				var sec = new Number(0);
				
				hour = Math.floor(amount/3600);//hours
				amount = amount%3600;
				min = Math.floor(amount/60);//minutes
				amount = amount%60;
				
				sec = Math.floor(amount);//seconds
				
				if(hour <= 0)
				{
					hour = "00";
				}
				if (min <= 0)
				{
					min = "00";
				}
				else
				{
					if(min < 10)
					{
						min = "0"+min;
					}
				}
				
				if(sec == 0)
				{
					sec = "00";
				}
				else
				{
					if(sec < 10)
					{
						sec = "0"+sec;
					}
				}
				out += hour +":"+min +":"+sec;
				
				babelu_utility.$('babelu_exams_timer').innerHTML=out;
				var time_spent = babelu_utility.$('time_spent');
				time_spent.value = (time_spent.value*1) + (1*1);
				babelu_timer.max_time = babelu_timer.max_time-1;
				setTimeout(function(){babelu_timer.countDown();}, 1000);
			}
		}, // end of countDown() function
		
		countUp: function()
		{
			var time_spent = babelu_utility.$('time_spent');
			var amount = (time_spent.value*1) + (1*1);
			var out = "";
			var hour = new Number(0);
			var min = new Number(0);
			var sec = new Number(0);
				
			hour = Math.floor(amount/3600);//hours
			amount = amount%3600;
			min = Math.floor(amount/60);//minutes
			amount = amount%60;
				
			sec = Math.floor(amount);//seconds
				
			if(hour <= 0)
			{
					hour = "00";
			}
			if (min <= 0)
			{
					min = "00";
			}
			else
			{
				if(min < 10)
				{
						min = "0"+min;
				}
			}
				
			if(sec == 0)
			{
				sec = "00";
			}
			else
			{
				if(sec < 10)
				{
					sec = "0"+sec;
				}
			}
			out += hour +":"+min +":"+sec;
				
			babelu_utility.$('babelu_exams_timer').innerHTML=out;
			time_spent.value = (time_spent.value*1) + (1*1);
			setTimeout(function(){babelu_timer.countUp();}, 1000);
			
		} // end of countUp() function
	};

var babelu_marker = 
{
	updateAnswered: function(e)
	{
		e.preventDefault();
		var targ = e.target || e.srcElement;
		var pid = babelu_marker.getPid(targ.name);
		
		if(targ.type == "checkbox")
		{
			var inputs = document.getElementsByName(targ.name);
			var inputCount = inputs.length;
			var flag = false;
		
		
			for(var i = 0; i < inputCount; i++)
			{
				if(inputs[i].checked == true)
				{
					flag = true;
				}
			}
		
			if(flag == false)
			{
				document.getElementById('js-a'+pid).checked = false;
			}
			else
			{
				document.getElementById('js-a'+pid).checked = true;
			}
		}
		else
		{
			if(targ.value != '')
			{
				document.getElementById('js-a'+pid).checked = true;
			}
			else
			{
				document.getElementById('js-a'+pid).checked = false;
			}
		}
	},// end of updateAnswered()

	toggleMarker: function(e)
	{
		e.preventDefault();
		var targ = e.target || e.srcElement;
		var pid = babelu_marker.getPid(targ.name);
		
		var markerId = 'js-m'+pid;
		
		if(document.getElementById(markerId).checked == true)
		{
			document.getElementById(markerId).checked = false;
		}
		else
		{
			document.getElementById(markerId).checked = true;
		}
	},
	
	getPid: function(name)
	{
		var pidStart = 9;
		var pidEnd = name.search(/\]/) - 9;
		var pid = name.substr(pidStart,pidEnd);
		return pid;
	}
	
	
}