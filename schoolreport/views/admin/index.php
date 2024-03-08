<style>
<!--
h4 {
	margin: 5px 10px 5px 0;
}
#edit_student_details{
display: none;
}
-->
</style>

<div class="container">
	<div class="row-fluid">
		<div class="span12">
			<div class="span10">
			<select name="class"class="input-medium pull-left" id="class">
				<option value="0">All Class</option>
				<option value="ONE">class one</option>
				<option value="TWO">class two</option>
				<option value="THREE">class three</option>
				<option value="FOUR">class four</option>
				<option value="FIVE">class five</option>
				<option value="SIX">class six</option>
				<option value="SEVEN">class seven</option>
				<option value="EIGHT">class eight</option>
				<option value="NINE">class nine</option>
				<option value="TEN">class ten</option>
			</select>
			<select	class="input-medium pull-left" name="student_list_sec" id="student_list_sec">
				<option value="0" selected="selected">All Section</option>
				<option value="1" >A</option>
				<option value="2">B</option>
			</select> 
			
				<div class="pull-left input-append">
					<input id="search_student" type="text" class="input-xlarge" placeholder="Search by student name">
					<button class="btn btn-info" type="submit" onclick="search_student();">
						<i class="icon-white icon-search"></i>&nbsp;Search
					</button>
				</div>
				</div>
			<div class="span2">
				<button id="show_new_student_form" class="btn btn-medium btn-success pull-right">New Student</button>
				<button id="hide_new_student_form" class="btn btn-medium btn-inverse pull-right">Hide Form</button>
			</div>
		</div>
	</div>
	<hr>

	<div class="row-fluid" id="add_new_student_div">
		<div class="span12">
			<h5 id="saved_successfully" class="alert alert-success">Student Data Uploaded Successfully </h5>
				<div class="span3">
					<div id="data_url" class="well"></div>
					<label></label><img id="profile_photo" style="width: 250px; height: 250px" class="img-polaroid" src="data:image/jpeg;base64,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bERib29sAAAAAABJbnRyYm9vbAAAAAAAQmNrZ09iamMAAAABAAAAAAAAUkdCQwAAAAMAAAAAUmQgIGRvdWJAb+AAAAAAAAAAAABHcm4gZG91YkBv4AAAAAAAAAAAAEJsICBkb3ViQG/gAAAAAAAAAAAAQnJkVFVudEYjUmx0AAAAAAAAAAAAAAAAQmxkIFVudEYjUmx0AAAAAAAAAAAAAAAAUnNsdFVudEYjUHhsQFIAAAAAAAAAAAAKdmVjdG9yRGF0YWJvb2wBAAAAAFBnUHNlbnVtAAAAAFBnUHMAAAAAUGdQQwAAAABMZWZ0VW50RiNSbHQAAAAAAAAAAAAAAABUb3AgVW50RiNSbHQAAAAAAAAAAAAAAABTY2wgVW50RiNQcmNAWQAAAAAAAAAAABBjcm9wV2hlblByaW50aW5nYm9vbAAAAAAOY3JvcFJlY3RCb3R0b21sb25nAAAAAAAAAAxjcm9wUmVjdExlZnRsb25nAAAAAAAAAA1jcm9wUmVjdFJpZ2h0bG9uZwAAAAAAAAALY3JvcFJlY3RUb3Bsb25nAAAAAAA4QklNA+0AAAAAABAASAAAAAEAAQBIAAAAAQABOEJJTQQmAAAAAAAOAAAAAAAAAAAAAD+AAAA4QklNBA0AAAAAAAQAAAAeOEJJTQQZAAAAAAAEAAAAHjhCSU0D8wAAAAAACQAAAAAAAAAAAQA4QklNJxAAAAAAAAoAAQAAAAAAAAABOEJJTQP1AAAAAABIAC9mZgABAGxmZgAGAAAAAAABAC9mZgABAKGZmgAGAAAAAAABADIAAAABAFoAAAAGAAAAAAABADUAAAABAC0AAAAGAAAAAAABOEJJTQP4AAAAAABwAAD/////////////////////////////A+gAAAAA/////////////////////////////wPoAAAAAP////////////////////////////8D6AAAAAD/////////////////////////////A+gAADhCSU0ECAAAAAAAEAAAAAEAAAJAAAACQAAAAAA4QklNBB4AAAAAAAQAAAAAOEJJTQQaAAAAAANzAAAABgAAAAAAAAAAAAAA+gAAAPoAAAAfAGYAYQBjAGUAYgBvAG8AawAtAGQAZQBmAGEAdQBsAHQALQBuAG8ALQBwAHIAbwBmAGkAbABlAC0A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AGQAbwBiAGUAIABQAGgAbwB0AG8AcwBoAG8AcAAAABMAQQBkAG8AYgBlACAAUABoAG8AdABvAHMAaABvAHAAIABDAFMANgAAAAEAOEJJTQQGAAAAAAAHAAgAAAABAQD/4Q2XaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjMtYzAxMSA2Ni4xNDU2NjEsIDIwMTIvMDIvMDYtMTQ6NTY6MjcgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdEV2dD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlRXZlbnQjIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bXBNTTpEb2N1bWVudElEPSI1RjE4MkNDNzRGQjk3MzM1Nzc5MDk2RDlBRTRFMjAwMCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo1NDVDRUVCRTU2MTZFMzExQTk0QkI4RjU1ODI5RDA3OSIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSI1RjE4MkNDNzRGQjk3MzM1Nzc5MDk2RDlBRTRFMjAwMCIgZGM6Zm9ybWF0PSJpbWFnZS9qcGVnIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0iYzIiIHhtcDpDcmVhdGVEYXRlPSIyMDEzLTA5LTA1VDIzOjQwOjEyKzA1OjMwIiB4bXA6TW9kaWZ5RGF0ZT0iMjAxMy0wOS0wNVQyMzo0MjozNyswNTozMCIgeG1wOk1ldGFkYXRhRGF0ZT0iMjAxMy0wOS0wNVQyMzo0MjozNyswNTozMCI+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjUzNUNFRUJFNTYxNkUzMTFBOTRCQjhGNTU4MjlEMDc5IiBzdEV2dDp3aGVuPSIyMDEzLTA5LTA1VDIzOjQyOjM3KzA1OjMwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ1M2IChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD0iLyIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6NTQ1Q0VFQkU1NjE2RTMxMUE5NEJCOEY1NTgyOUQwNzkiIHN0RXZ0OndoZW49IjIwMTMtMDktMDVUMjM6NDI6MzcrMDU6MzAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDUzYgKFdpbmRvd3MpIiBzdEV2dDpjaGFuZ2VkPSIvIi8+IDwvcmRmOlNlcT4gPC94bXBNTTpIaXN0b3J5PiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8P3hwYWNrZXQgZW5kPSJ3Ij8+/+ICHElDQ19QUk9GSUxFAAEBAAACDGxjbXMCEAAAbW50clJHQiBYWVogB9wAAQAZAAMAKQA5YWNzcEFQUEwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPbWAAEAAAAA0y1sY21zAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAKZGVzYwAAAPwAAABeY3BydAAAAVwAAAALd3RwdAAAAWgAAAAUYmtwdAAAAXwAAAAUclhZWgAAAZAAAAAUZ1hZWgAAAaQAAAAUYlhZWgAAAbgAAAAUclRSQwAAAcwAAABAZ1RSQwAAAcwAAABAYlRSQwAAAcwAAABAZGVzYwAAAAAAAAADYzIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAdGV4dAAAAABGQgAAWFlaIAAAAAAAAPbWAAEAAAAA0y1YWVogAAAAAAAAAxYAAAMzAAACpFhZWiAAAAAAAABvogAAOPUAAAOQWFlaIAAAAAAAAGKZAAC3hQAAGNpYWVogAAAAAAAAJKAAAA+EAAC2z2N1cnYAAAAAAAAAGgAAAMsByQNjBZIIawv2ED8VURs0IfEpkDIYO5JGBVF3Xe1rcHoFibGafKxpv33Tw+kw////7gAOQWRvYmUAZEAAAAAB/9sAhAABAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAgICAgICAgICAgIDAwMDAwMDAwMDAQEBAQEBAQEBAQECAgECAgMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwP/wAARCAD6APoDAREAAhEBAxEB/90ABAAg/8QBogAAAAYCAwEAAAAAAAAAAAAABwgGBQQJAwoCAQALAQAABgMBAQEAAAAAAAAAAAAGBQQDBwIIAQkACgsQAAIBAwQBAwMCAwMDAgYJdQECAwQRBRIGIQcTIgAIMRRBMiMVCVFCFmEkMxdScYEYYpElQ6Gx8CY0cgoZwdE1J+FTNoLxkqJEVHNFRjdHYyhVVlcassLS4vJkg3SThGWjs8PT4yk4ZvN1Kjk6SElKWFlaZ2hpanZ3eHl6hYaHiImKlJWWl5iZmqSlpqeoqaq0tba3uLm6xMXGx8jJytTV1tfY2drk5ebn6Onq9PX29/j5+hEAAgEDAgQEAwUEBAQGBgVtAQIDEQQhEgUxBgAiE0FRBzJhFHEIQoEjkRVSoWIWMwmxJMHRQ3LwF+GCNCWSUxhjRPGisiY1GVQ2RWQnCnODk0Z0wtLi8lVldVY3hIWjs8PT4/MpGpSktMTU5PSVpbXF1eX1KEdXZjh2hpamtsbW5vZnd4eXp7fH1+f3SFhoeIiYqLjI2Oj4OUlZaXmJmam5ydnp+So6SlpqeoqaqrrK2ur6/9oADAMBAAIRAxEAPwDZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6//9DZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6//9HZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917rokKCzEKoBJJIAAH1JJ4AHv3XulFgtpbq3Oyrt7bmZy4c2WakoZvtf+DGslWOlCc/XXb2xNdW1t/b3CL9pz+zj1dIpZf7OMn8uhywPxc3/kWifNV+E29TuoaRRLJlK6MH+wIqcRU3lA+t5bD2TT8x2UdRDG8jfkB/PP8ulqbbO1NbKo/aehDj+I2PFvNvzJtxyIsLQx8/4FqqQgX9ojzO/lZL/vR/zdPja185j+wdN9d8R5wWOM3zqGk6FyOFUHVbgM9LVj03/IF/d05nH+iWf7G/zjqp2s/hm/aOgW3H0V2ftt5jJt2TM0kWthXYCVMgjxJf8AdNJ6K6L0i+koSPZtBvO3XFKXGhvRsfz4fz6SSWVzHX9Oo9Rn/Z6CIgq7xurxyxsUlikRo5YnU2ZJI3CvG6ngggEezTiAQajpL/h697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r//0tl73K/QT697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917pS7T2fuTfGVGH2vjJMjVqFeqmYmDH42FjxPkq5laKljKg6V9Ukh4RGPtPdXdtYxeNdOQlaADifsH+odOwwyTkrGp+3yB+fR5OvPjftPbC0+S3QIt3bgQpL/lcJGAoJRpa1DipNQqXRgf3anyMfqFT6ewZf7/dXWqO2PhQfL4iP6R8vsFPnXo3ttvSEKZjrlH7K/IdGNiijhjSKGOOKKNQqRxIscaKPoqIoCqo/oB7I8murJPRhw4dZPfuvde9+691737r3XvfuvdA72V0xtnsKF6kwxYnPqCY8xSQokszHnTXBQv3S3/LXYf19mm37tc2LBQdUH8J/yenSW4tIpxUij+o6Itv/AKi3j12GrMrR/e4LXoGdoFaSkgJbSi5FAC9D5Dwrt+2TxqB49jCw3a0vxRGKTV+FsE/Z69Es9pNb5YVT1H+X06DD2Z9J+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r/9PZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3XuhR6s6sy/Z2Xkghkkxm3cdIi5zO+MOY3dQ64vGK4MdRlpoyGN7x08bB3uSiMV7ruabdGFADXLAEDyA9W/yD16et7V7xtK4g82HrXK/b1ZLtXaeA2Zh6bB7cx0ONoKcXKp656qZh+5V11S15qysmIu0jkt+BYAAAGe4uLuU3F1IWmPGpr+XQjjjSJdCLRelJ7a6v1737r3Xvfuvde9+691737r3Xvfuvde9+691hqKeCqgmpqmGKpp543hnp540mgnhkUpJFNFIGjlikQkMrAgg8+/VYZQ0YcOtEAggio6IL3d0SdnpVbw2fDLJtYMZMvhF1TS7cVjzW0LeqSXBgn9xDd6Uci8V/GMtn3o3BW0vCPGpRW/i+R+fp6+fRPeWXhjxIR2+Y9Oiy/wC2P+I5B/1vYk49FnXve+vde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvdf/9TZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917pwxOJr8/lsXgcVGsmSzVfT4yiV7aFnqW0+aQkgCKliDSyc/5tG9tzTRW8Uk89fCRSTTifkPtNB1rw3mIhjPc3+Dz6tg2XtHFbH23itt4dAKTHU4V5iiiaurZD5K3JVLC5eqrahmdzc2vYcAARnc3Et3PLcTGrsf2DyA+Q6FEEKQRJFGKIB/s9Kr2x071737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XvfuvdYpoYp45Ipo45YpUeKWKVBJFLHIpSSOWNgVkjdGIIIIIPvwxkcevevVXPb2wh15vatw9KjjCZCL+M7eZzcpjqiVlmxwNyW/hFUDEL8+Joyfr7kXab366yjkY/qr2t9o4H8x/g6Dt5B4Ez0WkZOP83QYezLpL1737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691/9XZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917ox/xewEWV7DrcvOhaPbGClqKe66o/wCIZeY0ELi/CyQ0cdRYjn1+w9zJMUs4oQcyPn7Fz/h6Xbaga6Zz+FMfaT1YWBbgewT0fde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+690Vb5XYCOr2fg9xov8AlGAzsVNIyjk0GcjNLKrMOdCVsMDWPHHsQctTlL6aCvbJH/MZFPnx/b0W7nHqgSQH4W/w46Id7G/RL1737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691//W2Xvcr9BPr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6Op8RqYCg35WkAu+VwtErf2hHT4+apZb/0LVd/YO5nJ+os18tBP7Sf83RxtdNEvrq/ydHG9hno0697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917oHe/qUVXUW9gVDGmx1PXxE/2ZaDI0dUGH+1ARG3sz2Wn72sKmg1/wCEU/y9JL5dVpOPl1WP+T/r+5E+3j0HvM+nXvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3X/9fZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917o8PxH/497e3/AIc9Hb/zx0XsG80A/VWn/NL/AJ+bo42v+zl/03+To3PsNdGnXvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XvfuvdBZ3dx1L2B/X+7Vf/vCj/iT7MNp/5Kdj/wA1V/w9Jrz/AHFn/wBKequPckHift6DfXveut9e9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3X//Q2Xvcr9BPr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6Ov8RZb4zfsFjePNYWbn6fv4ySPgf1H2/sHcz1+otD5eGR/M/5+jjayNEw86j/B0cP2GejTr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xugi75kEXUO+2/wBVh1h4sD/lFbSQAXP9TJ7MNpxudkf+GDpLenTaTn5dVhe5H/w9B3zI697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6/9HZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917o4HxHqCuQ35R34em29Vhb83V8nASB/SzD2E+aFOqxfyow/mOjTajU3ApnHR2vYU6OOve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6Ar5IVPg6j3Clx/ldVg6Mi/wBVlzVCzAf1OmMn/YezXZI/E3WzzwJP/GT0j3DNnMPUD/D1W17kLoPde9+631737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvdf/9LZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917o0fxOmC723XTFuZtq0lQFuL2psuqFrfWwNUB7DXM4/xe0P8ATb/AOjHbK+NL6aB/h6Pv7BvR31737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Rb/lNOIur1jLBfut0YCAAsF1aZKipIF/1G1Pe3s65dUHdKnyRj+wf7PSDcmpbUI4sP8/8Ak6r19j3oi697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6//T2Xvcr9BPr3v3Xuve/de697917r3v3Xuve/de697917r3v3XusU7mOGaRbao4pHW/IuqFhcf0uPfhxHXurUusdibV2lt3Cz4PFUcVfVYWgeuzXiR8pk2q6anqqh6qvYGeWKaeziO4jWw0qAB7jK9uZ7m4lM0hIDGg8h9g6ElvDFEitGgDMoqfM9Cb7S9KOve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6Z85gMLuOhOOz2Kx+ZoS4l+0yNLDVwiVVZFmRJlYRzIjsFdbMLmx92jllglSaGUo6+YND+3qrIkg0uoK9VVb+w1DtzfW78Bi9QxuIztVSUKPIZXgpjHDUpTNKxLuKUzmNSxLaVFyTc+5LsJZJ7K2mlp4jpU0FPMjh86VPzPQauFRJ5VRaKG4dJL2q6a697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuv/1Nl73K/QT697917r3v3Xuve/de697917r3v3Xuve/de697917rplV1ZGF1ZWVh/VSCCP9iPfuvAVx1af03lnzfV2yK+Vw8xwNJSTNcE+XG6sdIDb6MGpefcbbnD9PuF5FigkPDhnP+XoSWrFraEnjp/wY6Ez2h6Ude9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+6910SACSQAOSTwAByST+APeiacevdU/7kyjZ3cu5M29tWX3BmMhccgpPXz+Ag/kfbqgH+A9yhaRmG1tojxWMD/L0FXbXJK/mWP+Hpm9qOq9e9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3X/9XZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de69791rqwn4uZH7rrV6EvqfEblzNIUN7pDVtDlYLD/UkVxA/wBb2BeY4li3N9P4kUnzFSKGh/Lo/wBuk8S3ofiUkdGR9kXS7r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuk1vLJphtpbnyrv4xj8Bl6sP/R4KGd47f4mQAD/AB9uQxmWaKMAnUwFBxyadNzOqRSOxooB6qFgDCCEP+sRRh/+D6Rr/wBu1/cpkgk06CwwAPPrL791vr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6//9bZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917owvx97Podh5mvweZiqHxe7azER01TTIsn8OzPlXFxPVI8sdqGrhqI1d11MhiBsQeA9v+3vcQxXENA0dRQ+Y+LFAeGeNB0usbpIBIki0UkUPz6sUF/wA2/wBh7BPR9137917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917oqHyT7PocdiMj1pRQ1EmazlBQTZCr0otFQYWoq3aWMSiTyyV9YlEyCMJpWN9Zb6AiHYLCSa4hvyaW8bVB8yRwA+XqeizcrhBFJbCpkYD8hX+fRFf8Aef8AX9jWgqSBx6JvMnrr3vr3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691//19l73K/QT697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3XuumeWMeWAlZ4WSenYfVaiBhLAwvwCsyKfeiutXT+IEftFP8vXscTwGf2dW+7WzUW4tt4HPQsrpl8RjsiNBuqtV0sUsiX/rHIzKf8R7i2WJoZZIW+JGI/YadCmNxJGjjgQD0/e2+r9e9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XR/417917qq3t7ODcXZ288ijrJBFljiKWRTdXpcJDHjRp/2k1EEh/wCQvci7PD9PttrHQgldR/2xJ/wU6Dd45kuZSSCAaD8ug49mXSfr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r/0Nl73K/QT697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuvf8a/3g39+6969WE/F/ci5frxsHLIrVe0snU43xgWK42tY5LFufrcaJ5Iwf8Am0R+PYF5htjDuLS0osqhvt8j/g6PtvkDwBPNf9Q6Mj7Iul3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+690l967jh2jtPcG5ahlWPDYqsrF1C+uoSIrRwgcAmardEH+Le37aA3VxDbrxdgPyPE/kM9Ukfw43f0HVRgaV7yVDa6iV3mqJP+OlRM7Szyfk/uTOzf7H3J9FUKq/CAAPsHDoKhWSqtx6797631737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691//9HZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuhp6G35FsfflOmRm8OD3RFFhMnK7aYaOr82vDZGW7KiRx1chgdjwqT6jwp9k2+2cl3Za41rJDn56TxHr86dK7GZYZ9LfC/8qZ6swBv/AL78+wD0Ieu/fuvde9+691737r3Xvfuvde9+691737r3XvfuvdePAv7917om3yn35D9vjevMfMGnmlps3uTxtfwUkDF8PjptLECStqR9wyMLiOBT9HHsUcuWTM77g6/prVV+bHiR/pR6evy6KNzn+CBeNan5f8X0S72L+ioktljnr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuv/S2Xvcr9BPr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917rplVlZHAZGUq6n6MpBBU/1BHv3DPXqBu1uHVlnx63LktzdZ4ubKzvV1mJrchgWq5WLz1NPjJVWjkqHPMk60ksaMx5YrqPJPuPN5gS33CZY10o1Gp6VzT8uhBYSvLbI0h7qkfsPQ3+yvpZ1737r3Xvfuvde9+691737r3Xvfuvde9+6902ZqvOKw+VyYRZP4dja+v0NfS/2dLLUBG0+rS3jsbc292RfEdI/wCIgft60xorH0HVQNZla/O1dVm8rUyVmTzE75KuqpTd5aip9Z44CRQoRHGg4SNVUcAe5RhiSCGKCJNKKKU+fmft6CrM0jF2NWPHqN7c611737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3X/9PZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuux/j79WmevDj1Yv8ZaQ0vVOPkOr/L8zn6xSVtdTkZKZSD/AGgRTfX8+wDzAf8AdrMAQaKo/kD0f7cum0jqckk/zPRgvZN0t697917r3v3Xuve/de697917r3v3Xuve/de6as5TGtwmYo1/VV4rIUw4vzPSTRDj88v7sjaJEf0IPWmBZWUcSOqdadSkEKH6xxJG3/BoxoP+8r7lUmufXP7egmPQevWX37rfXvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvdf/U2Xvcr9BPr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917rxNgT/QE/7bn3scQfn1omgJ9OrSOk6Fsd1RsSmddLtgKascW/tZF5cgx/2Jqb+413NmfcLxm+LxG/kadCSzUrawA0rpr+3PQpe0PSnr3v3Xuve/de697917r3v3Xuve/de697917ro+6tWhp17qnrOULYzPZ/GuArY/PZqj0j+ytPk6qNF/2CAe5Ut38S3t5K8Y1P8h0FGoHcDgGP+Hpr9u9a697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r//1dl73K/QT697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6GbqPp1+2BnJJM7JgcdhpaWjnkgoErauqqK2CWbTTNPLHTwpBEgLFlkJLiwsPZPuu7fuwwxrEHkcVyaac4x59K7W0+qVyZNIU+QrX/N1ZHh8bFh8TjMRAzPBi6Cjx0Dvp1vDRU8dNE7hVVQ7JECbAC/09gJ3eSSSVz3sxJ+0mvR+qhFVRwAp04+69W697917r3v3Xuve/de697917r3v3Xuve/de697917okHd/RSYyDePZuNz8sivWS53JYKqoYgiLVTwR1X2FdA8bIsbyGUiWN+LjV9PYs2feiWs9ulhFK6Q9fLyxw+XHopvLIATXCua0rSn+XoonsV9FHXvfut9e9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvdf/W2Xvcr9BPr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de69791rqwn4t4Y4/raTKyRGOXcWeyeQRz9ZKOkaPFUjAfhT9i5H9dXsCcwy+JuLIGqEUD7MVP+Ho92yMpbEnizE9GR9kfRh1737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XvfuvdJjeuFXce0dy4Ip5DlcHk6KNPyZ5qSUU5H+In0n27bymG5t5ge1XBP5GuOqSKHjdDwIPVRMWvxp5RplChZVIsVlUaZUIP0KSAg/4j3KVQ1GX4DkfZ0FFNRxz1z9+6t1737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691//19l73K/QT697917r3v3Xuve/de697917r3v3Xuve/de697917r3/ABHP+w/r70TTj1rpWbR2Ju/f1QaXaeHqa1NfinzEi/b4THsfrJUZKYCnkaNQWEcXklYiwW/tLdX1pZANczAHjpGWPyp5Z8z05FFPN/uOlSPM1A/b9np1ahtfAUm1tu4TbtB/wEw2MpMfExGlpft4lSSdxzZ6iUM7f7Ux9xxPM1xPLcSf2jmp6EyII1VFHaBTp+9tdX697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3XuvH37r3VbfcXUW5tqbk3DncbhKmu2bX19RlKStxcbVgxS1jCprKTI0kOurpY6etlfxylGiaMj1Agj2Oto3W3uLe3t5Zgt0q6aHFaHFCcVp5Y6I7u3mjaUrEPAJqKZIxnH29AOro6hkZXU/RlIZTb62I4NvZ6QQSGFCOi4EEVHDrl791vr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6//Q2Xvcr9BPr3v3Xuve/de697917r3v3Xuve/de66ZlRSzsqKouzMQqgD8ljYD34Anh1rgCTw6EbZvVG/d9PG+DwU0GOdl1Z7Ma8Zh0QkBpIJJYzU5ErqBtTxyAj+0PZfd7pYWYZZpwZAD2p3GvkDwC1+Z6URWs86hokqppk1Ap5keZ6Ntsn4w7SwvgrN31Mm78gqhmo3RqHb0MhALBcekjVFcEccGokZT/AKgewrd8wXdyhjt1EUfrksf9seH5U+3o0g22KM6pGLt8+H7OjL0tJS0UENLR00FJS06COnpqaKOCngjH0SGCJUiiQX4CgD2RkliWJJY8ejEUAAAoOpHvXXuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de66Iv/AMV/Pv3XugS3z0FsHejT1yUL7czk3qbMYBYqZppbALJXY9kOPrrfksiyG59d/ZtZbzfWRVQ4eD+Fs/sPEf4Pl0iuLCCcNQaJD+If5fI9FD3p8fexNpGapo6NN3YiO7CuwMb/AMRij1NzV4OR3qwyxrdmp2qF5/HsT2m/7fckI9YZcCjGo+3X5D7R0Wy7fNFkd6/Lj+z/ADdAfcanT1LJGxSWJ1aOaJ1/Uk0MgWWJx+QwB9nNQRUfD6jI/IjB/LpD6g8R173vrfXvfuvde9+691737r3Xvfuvde9+691737r3X//R2Xvcr9BPr3v3Xuve/de697917rJTwz1lTFRUVPU1tbOQIKKip5qyrmLGy+OmpklmYH+umw/r7qzIis7uqoOJJAA+0nh1oVZtCir+g49D7tH429g7jMNRmVptnYx9Ds+SH3maeMmzCPD00qpTvb6eeZCPyvsjuuYLO3ZlhUzSD0wn7SK/bj7D0ui2+eQhnIWP5jP7PLo1ey/j/wBebPaGrfHNuTMRWYZXcXirmiltYvRY/wAaY2i55BWIuP8AVew3db1f3YKmTREfwriv2mtT+2nRnDY28J16dT+p/wA3DobFVVAVQAFFlAAAAHAAAAAAH49lIFPPpZ1y97691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XvfuvdesPfuvdB5vLqzY2+42O4MDTTVukiLL0l8fmYCbC6ZKl8c8gUDhZNaf4e1lrf3lm2qC4YD04r/vJx/KvTEttBOKSxA5/P9o6Knu/4r7hx5kqtk5iDPUwJKYnNtHjcqim9khyMSfw2sKj/AI6JT3/r+fYlteZYXot7CYz/ABL3D/eScfkT0V3G1yf8R5Rx4H0+3otOcwWb2zWHH7jxGRwdXeyRZOlkplmuTZqac6qWqVrcGKRx7P4Lm3uVDW8odfOnEfaPLpBJHJFiSMj7Rj9vA9NXt/jw6r1737r3Xvfuvde9+691737r3X//0tl73K/QT69/j+ByT/QfW5/w9+9B59e/LpW7U2JvDfEvj2tgK7JwhtEmRKikw8DWv+7lanRSEgA+mMyP/tPtJc7hZWRIu7gKRxHE/sGf206cigmnYrHG2PMig/b/AJujSbQ+KUCCGr31uCSra4Z8Lt3XSUf0BCVGVqFNbOVJsfEkANuDzf2HLvmSTURYxaR/E9C37B2j5Vr0ZR7WlQ07VI8hw/b0aDbOydp7OpjSbZwGOw8Tf5x6WAfcz/Q3qayQyVdSbj/djt7DlxcT3barmVnb5nH7OHRlHDFCKRoB0qfbPTnXvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+6903ZPE4zM0cuPy2PosnQzC0lJX0sNXTNcEXMM6OmqxNj9R+Pe0Zo2DxsVccCDTrTKrgq6gr8+i4bv+Lmz8sJKnadbVbRrDdlpUD5TBubE6PsKmVamjVmN/wBiZQt+F/HsQWvMd5E3+Nos6/PtP7V9PKoPz6LptrgkOpSVav5fs6KxvDpfsTZXmnyGEfLYqLU38Z295cnSLCv+7qqkWNclQjn+3GyD/Vn2IrTedvu+0TaZv4WwST5A8K/LHRbNZ3EALOoKeoz+0eXQVK6OCyMrqGKkqQQGH1U2JsR+R+PZpw014kV/LpMGBpQ8euXv3W+ve/de6//T2h9o7L3NvvJnE7WxrV88Whq2rkf7fF4uJwSs2Rr2Vo4dSglY1DTSW9KH3JlzfWtlCJ7iQAHgPM/lxFPMnHQWjhmnYrAleOfw4/1Y9ejs7D+M20tviGv3dIN4ZddEn29RGYNvUkq6WtT4zUWrtDCweqaQEchF+nsI3nMF3cBo7f8AShPp8RHzPl/tadG0O1wpQzMZH+fD9g4/n0ZKCmp6WGKmpoIaengUJDBBEkMMKKLKkUUarHGqj6AAAeyIkklmYlifPoyAAAA4dZveut9e9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XvfuvddWHv3Xugc330ZsPfRmq5scMJnJBdc7gxHR1byANpNdTBfsskmprkSoXIHDj6+zOx3e9sKJG+uCvwNlfy4EfKhA86HpLNZ281SUpIRxHH5dEe7F6d3f1sz1WQiTLbd8mmHcmNjcU0KsbRpl6RjJNipmuBqYtTsfpIDx7GG37rb7i3hxkLcfwHifUhuFBQ8aE+Q6JZ7S4tzUrqj/iH+UeXQV8f1/wB9/t/p7NP89P8AV8/l0mr1/9TfX2vtbB7Pw1Lgdv0EOPx1IDpijF5J5WA8tXVzteSrrKgi7yuSzH/AAe3J5ZbmR5Z5C7txr1SOOOFFjiUKg8h0ofbfV+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6xTwQ1MUsFRFHPBPFJDNBMiywzQyqUlilicFJI5EJDKwIINj718xhuvfLy6BP/Zdupf+eUh/4uf8U/4GVv8A56f+BH/Fh/6Y/wDNezP987p/ylH4NP5ev2/Pj8+k30Vp/vkfz/z9f//V3+Pfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691//9bf49+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3X//2Q==">
					<input type="file" id="imgfiles" name="imgfiles" accept="image/jpeg" onchange="readURL(this);">
					<label></label>
					<center><button class="btn " onclick="$('#imgfiles').click();"><i class="icon-upload"></i>Upload</button></center>
					
				</div>
			<form action="" id="new_student_form">
				<div class="span3">
					<input type="hidden" id="id" name="id">
					<input type="hidden" name="user_type" value="general">
					<input type="hidden" name="status" value="1">
					<label>Name</label><input type="text" name="name" id="name" required="required"placeholder="Name of the student">
					<label>Mobile Number</label><input type="tel" name="mobile_no" id="mobile_no" maxlength="10" required="required"placeholder="Mobile Number">
					<label>Email addres</label><input type="email" name="email" id="email" required="required" placeholder="email address">
				</div>
				<div class="span3">
					<label>Father's name</label><input type="text" name="f_name" id="f_name" placeholder="Father's name">
					<label>Mother's name</label><input type="text" name="m_name" id="m_name" placeholder="Mother's name">
					<label>Class</label>
					<select	 name="class" id="class">
						<option value="0" selected="selected">-select class-</option>
						<option value="ONE">class one</option>
						<option value="TWO" >class two</option>
						<option value="THREE">class three</option>
						<option value="FOUR" >class four</option>
						<option value="FIVE">class five</option>
						<option value="SIX" >class six</option>
						<option value="SEVEN">class seven</option>
						<option value="EIGHT" >class eight</option>
						<option value="NINE">class nine</option>
						<option value="TEN">class ten</option>
					</select> 
				</div>
				<div class="span3 ">
					<label>Section</label>
					<select	 name="section" id="section">
						<option value="0" selected="selected">-select section-</option>
						<option value="A" >A</option>
						<option value="B">B</option>
					</select>
					<label>Roll Number</label><input type="text" name="roll_no" id="roll_no" placeholder="Roll Number" required="required">
					<label>Address</label><textarea rows="2" name="address" id="address" placeholder="address"></textarea>
					<label></label><button id="save_student_btn" type="button" onclick="save_new_student();" class="btn btn-success span9">Save Student</button>
				</div>
			</form>
		</div>
	</div>
	<div class="row-fluid" id="edit_student_details">
	<h3>Edit Student Profile</h3>
	<form action="" class="form" id="edit_student_form">
		<div class="span12">
			<div class="span4">
				<input type="hidden" name="id" id="student_id"> 
				<input type="text" name="name" placeholder="Name of the Student" id="student_name" /> 
				<input type="text" name="mobile_no" placeholder="Email address" id="student_mobile_no" disabled/> 
				<input type="text" name="email" placeholder="Email address" id="student_email" disabled/> 
			</div>
			<div class="span4">
				<input type="text" name="f_name" placeholder="Father's name" id="student_f_name" /> 
				<input type="text" name="m_name" placeholder="Mother's name" id="student_m_name" /> 
				<select	 name="class" id="student_class">
						<option value="0" selected="selected">-select class-</option>
						<option value="ONE">class one</option>
						<option value="TWO" >class two</option>
						<option value="THREE">class three</option>
						<option value="FOUR" >class four</option>
						<option value="FIVE">class five</option>
						<option value="SIX" >class six</option>
						<option value="SEVEN">class seven</option>
						<option value="EIGHT" >class eight</option>
						<option value="NINE">class nine</option>
						<option value="TEN">class ten</option>
					</select>  
			</div>
			<div class="span4">
				<select	 name="section" id="student_section">
						<option value="0" selected="selected">-select section-</option>
						<option value="A" >A</option>
						<option value="B">B</option>
				</select>
				<input type="text" name="roll_no" placeholder="Roll number" id="student_roll_no" /> 
				<textarea rows="2" name="address" id="student_address" placeholder="address"></textarea><br>
				<button type="button" class=" btn btn-primary btn-medium pull-left" id="btn_update_student">Update</button>
				<button type="button" class=" btn btn-danger btn-medium pull-left" id="btn_cancel">Cancel</button>
			</div>
		</div>
		</form>
	</div>
	<br>
	<div class="row-fluid" id="all_student_details_div">
			<div class="span12">
				<table class="table table-condensed">
                  <thead>
						<tr>
							<th>#</th>
							<th class="span3">Name</th>
							<th class="span3">Email</th>
							<th class="span3">Phone No</th>
							<th class="span2">Class</th>
							<th class="span2">Section</th>
							<th>Edit</th>
							<th>View Details</th>
						</tr>
					</thead>
					<tbody id="all_student_details_list" class="table table-condensed"></tbody>
				</table>
			</div>
	</div>
</div>


<script type="text/javascript">
<!--
var search_query='0';
window.onload = function() {
	get_all_student_data();
};
$('#student_nav').addClass('active');

$('#show_new_student_form').click(function(){
	$('#add_new_student_div').toggle("400");
	$('#hide_new_student_form').show();
	$('#show_new_student_form').hide();
	$('#edit_student_details').slideUp("300");
});

$('#hide_new_student_form').click(function(){
	$('#show_new_student_form').show();
	$('#add_new_student_div').toggle("400");
	$('#hide_new_student_form').hide();
});

function readURL(input){
    if (input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#profile_photo').attr('src', e.target.result).width(250).height(250);
            var a = $('#profile_photo').attr('src');
            document.getElementById('data_url').textContent = a;
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function save_new_student(){
	$('#save_student_btn').attr('disabled',true).html('Saving...');
	var data_url = document.getElementById('data_url').textContent;
	var formData =$('form#new_student_form').serializeArray();
	formData.push({name: 'data_url', value: data_url});
	var name = $('#name').val();
	var mobile_no = $('#mobile_no').val();
	if(name == 0 || name ==''){
		alert('Empty Name Field !');
		$('#save_student_btn').attr('disabled',false);
	}
	else if(mobile_no == ''){
		alert('Empty Mobile!');
		$('#save_student_btn').attr('disabled',false);
	}
	else{
		$.ajax({
			  url: '<?php echo URL;?>admin/save_new_student/',
			  type:'POST',
			  data:formData,
			  dataType:'JSON',
			  success: function(resp){
				  console.log(resp);
				  data_url.length=0;
				  document.getElementById('data_url').textContent='';
				  $('#new_student_form').each(function(){this.reset();});
				  document.getElementById('profile_photo').src = "data:image/jpeg;base64,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bERib29sAAAAAABJbnRyYm9vbAAAAAAAQmNrZ09iamMAAAABAAAAAAAAUkdCQwAAAAMAAAAAUmQgIGRvdWJAb+AAAAAAAAAAAABHcm4gZG91YkBv4AAAAAAAAAAAAEJsICBkb3ViQG/gAAAAAAAAAAAAQnJkVFVudEYjUmx0AAAAAAAAAAAAAAAAQmxkIFVudEYjUmx0AAAAAAAAAAAAAAAAUnNsdFVudEYjUHhsQFIAAAAAAAAAAAAKdmVjdG9yRGF0YWJvb2wBAAAAAFBnUHNlbnVtAAAAAFBnUHMAAAAAUGdQQwAAAABMZWZ0VW50RiNSbHQAAAAAAAAAAAAAAABUb3AgVW50RiNSbHQAAAAAAAAAAAAAAABTY2wgVW50RiNQcmNAWQAAAAAAAAAAABBjcm9wV2hlblByaW50aW5nYm9vbAAAAAAOY3JvcFJlY3RCb3R0b21sb25nAAAAAAAAAAxjcm9wUmVjdExlZnRsb25nAAAAAAAAAA1jcm9wUmVjdFJpZ2h0bG9uZwAAAAAAAAALY3JvcFJlY3RUb3Bsb25nAAAAAAA4QklNA+0AAAAAABAASAAAAAEAAQBIAAAAAQABOEJJTQQmAAAAAAAOAAAAAAAAAAAAAD+AAAA4QklNBA0AAAAAAAQAAAAeOEJJTQQZAAAAAAAEAAAAHjhCSU0D8wAAAAAACQAAAAAAAAAAAQA4QklNJxAAAAAAAAoAAQAAAAAAAAABOEJJTQP1AAAAAABIAC9mZgABAGxmZgAGAAAAAAABAC9mZgABAKGZmgAGAAAAAAABADIAAAABAFoAAAAGAAAAAAABADUAAAABAC0AAAAGAAAAAAABOEJJTQP4AAAAAABwAAD/////////////////////////////A+gAAAAA/////////////////////////////wPoAAAAAP////////////////////////////8D6AAAAAD/////////////////////////////A+gAADhCSU0ECAAAAAAAEAAAAAEAAAJAAAACQAAAAAA4QklNBB4AAAAAAAQAAAAAOEJJTQQaAAAAAANzAAAABgAAAAAAAAAAAAAA+gAAAPoAAAAfAGYAYQBjAGUAYgBvAG8AawAtAGQAZQBmAGEAdQBsAHQALQBuAG8ALQBwAHIAbwBmAGkAbABlAC0A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AGQAbwBiAGUAIABQAGgAbwB0AG8AcwBoAG8AcAAAABMAQQBkAG8AYgBlACAAUABoAG8AdABvAHMAaABvAHAAIABDAFMANgAAAAEAOEJJTQQGAAAAAAAHAAgAAAABAQD/4Q2XaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjMtYzAxMSA2Ni4xNDU2NjEsIDIwMTIvMDIvMDYtMTQ6NTY6MjcgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdEV2dD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlRXZlbnQjIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bXBNTTpEb2N1bWVudElEPSI1RjE4MkNDNzRGQjk3MzM1Nzc5MDk2RDlBRTRFMjAwMCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo1NDVDRUVCRTU2MTZFMzExQTk0QkI4RjU1ODI5RDA3OSIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSI1RjE4MkNDNzRGQjk3MzM1Nzc5MDk2RDlBRTRFMjAwMCIgZGM6Zm9ybWF0PSJpbWFnZS9qcGVnIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0iYzIiIHhtcDpDcmVhdGVEYXRlPSIyMDEzLTA5LTA1VDIzOjQwOjEyKzA1OjMwIiB4bXA6TW9kaWZ5RGF0ZT0iMjAxMy0wOS0wNVQyMzo0MjozNyswNTozMCIgeG1wOk1ldGFkYXRhRGF0ZT0iMjAxMy0wOS0wNVQyMzo0MjozNyswNTozMCI+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjUzNUNFRUJFNTYxNkUzMTFBOTRCQjhGNTU4MjlEMDc5IiBzdEV2dDp3aGVuPSIyMDEzLTA5LTA1VDIzOjQyOjM3KzA1OjMwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ1M2IChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD0iLyIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6NTQ1Q0VFQkU1NjE2RTMxMUE5NEJCOEY1NTgyOUQwNzkiIHN0RXZ0OndoZW49IjIwMTMtMDktMDVUMjM6NDI6MzcrMDU6MzAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDUzYgKFdpbmRvd3MpIiBzdEV2dDpjaGFuZ2VkPSIvIi8+IDwvcmRmOlNlcT4gPC94bXBNTTpIaXN0b3J5PiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8P3hwYWNrZXQgZW5kPSJ3Ij8+/+ICHElDQ19QUk9GSUxFAAEBAAACDGxjbXMCEAAAbW50clJHQiBYWVogB9wAAQAZAAMAKQA5YWNzcEFQUEwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPbWAAEAAAAA0y1sY21zAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAKZGVzYwAAAPwAAABeY3BydAAAAVwAAAALd3RwdAAAAWgAAAAUYmtwdAAAAXwAAAAUclhZWgAAAZAAAAAUZ1hZWgAAAaQAAAAUYlhZWgAAAbgAAAAUclRSQwAAAcwAAABAZ1RSQwAAAcwAAABAYlRSQwAAAcwAAABAZGVzYwAAAAAAAAADYzIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAdGV4dAAAAABGQgAAWFlaIAAAAAAAAPbWAAEAAAAA0y1YWVogAAAAAAAAAxYAAAMzAAACpFhZWiAAAAAAAABvogAAOPUAAAOQWFlaIAAAAAAAAGKZAAC3hQAAGNpYWVogAAAAAAAAJKAAAA+EAAC2z2N1cnYAAAAAAAAAGgAAAMsByQNjBZIIawv2ED8VURs0IfEpkDIYO5JGBVF3Xe1rcHoFibGafKxpv33Tw+kw////7gAOQWRvYmUAZEAAAAAB/9sAhAABAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAgICAgICAgICAgIDAwMDAwMDAwMDAQEBAQEBAQEBAQECAgECAgMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwP/wAARCAD6APoDAREAAhEBAxEB/90ABAAg/8QBogAAAAYCAwEAAAAAAAAAAAAABwgGBQQJAwoCAQALAQAABgMBAQEAAAAAAAAAAAAGBQQDBwIIAQkACgsQAAIBAwQBAwMCAwMDAgYJdQECAwQRBRIGIQcTIgAIMRRBMiMVCVFCFmEkMxdScYEYYpElQ6Gx8CY0cgoZwdE1J+FTNoLxkqJEVHNFRjdHYyhVVlcassLS4vJkg3SThGWjs8PT4yk4ZvN1Kjk6SElKWFlaZ2hpanZ3eHl6hYaHiImKlJWWl5iZmqSlpqeoqaq0tba3uLm6xMXGx8jJytTV1tfY2drk5ebn6Onq9PX29/j5+hEAAgEDAgQEAwUEBAQGBgVtAQIDEQQhEgUxBgAiE0FRBzJhFHEIQoEjkRVSoWIWMwmxJMHRQ3LwF+GCNCWSUxhjRPGisiY1GVQ2RWQnCnODk0Z0wtLi8lVldVY3hIWjs8PT4/MpGpSktMTU5PSVpbXF1eX1KEdXZjh2hpamtsbW5vZnd4eXp7fH1+f3SFhoeIiYqLjI2Oj4OUlZaXmJmam5ydnp+So6SlpqeoqaqrrK2ur6/9oADAMBAAIRAxEAPwDZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6//9DZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6//9HZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917rokKCzEKoBJJIAAH1JJ4AHv3XulFgtpbq3Oyrt7bmZy4c2WakoZvtf+DGslWOlCc/XXb2xNdW1t/b3CL9pz+zj1dIpZf7OMn8uhywPxc3/kWifNV+E29TuoaRRLJlK6MH+wIqcRU3lA+t5bD2TT8x2UdRDG8jfkB/PP8ulqbbO1NbKo/aehDj+I2PFvNvzJtxyIsLQx8/4FqqQgX9ojzO/lZL/vR/zdPja185j+wdN9d8R5wWOM3zqGk6FyOFUHVbgM9LVj03/IF/d05nH+iWf7G/zjqp2s/hm/aOgW3H0V2ftt5jJt2TM0kWthXYCVMgjxJf8AdNJ6K6L0i+koSPZtBvO3XFKXGhvRsfz4fz6SSWVzHX9Oo9Rn/Z6CIgq7xurxyxsUlikRo5YnU2ZJI3CvG6ngggEezTiAQajpL/h697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r//0tl73K/QT697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917pS7T2fuTfGVGH2vjJMjVqFeqmYmDH42FjxPkq5laKljKg6V9Ukh4RGPtPdXdtYxeNdOQlaADifsH+odOwwyTkrGp+3yB+fR5OvPjftPbC0+S3QIt3bgQpL/lcJGAoJRpa1DipNQqXRgf3anyMfqFT6ewZf7/dXWqO2PhQfL4iP6R8vsFPnXo3ttvSEKZjrlH7K/IdGNiijhjSKGOOKKNQqRxIscaKPoqIoCqo/oB7I8murJPRhw4dZPfuvde9+691737r3XvfuvdA72V0xtnsKF6kwxYnPqCY8xSQokszHnTXBQv3S3/LXYf19mm37tc2LBQdUH8J/yenSW4tIpxUij+o6Itv/AKi3j12GrMrR/e4LXoGdoFaSkgJbSi5FAC9D5Dwrt+2TxqB49jCw3a0vxRGKTV+FsE/Z69Es9pNb5YVT1H+X06DD2Z9J+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r/9PZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3XuhR6s6sy/Z2Xkghkkxm3cdIi5zO+MOY3dQ64vGK4MdRlpoyGN7x08bB3uSiMV7ruabdGFADXLAEDyA9W/yD16et7V7xtK4g82HrXK/b1ZLtXaeA2Zh6bB7cx0ONoKcXKp656qZh+5V11S15qysmIu0jkt+BYAAAGe4uLuU3F1IWmPGpr+XQjjjSJdCLRelJ7a6v1737r3Xvfuvde9+691737r3Xvfuvde9+691hqKeCqgmpqmGKpp543hnp540mgnhkUpJFNFIGjlikQkMrAgg8+/VYZQ0YcOtEAggio6IL3d0SdnpVbw2fDLJtYMZMvhF1TS7cVjzW0LeqSXBgn9xDd6Uci8V/GMtn3o3BW0vCPGpRW/i+R+fp6+fRPeWXhjxIR2+Y9Oiy/wC2P+I5B/1vYk49FnXve+vde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvdf/9TZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917pwxOJr8/lsXgcVGsmSzVfT4yiV7aFnqW0+aQkgCKliDSyc/5tG9tzTRW8Uk89fCRSTTifkPtNB1rw3mIhjPc3+Dz6tg2XtHFbH23itt4dAKTHU4V5iiiaurZD5K3JVLC5eqrahmdzc2vYcAARnc3Et3PLcTGrsf2DyA+Q6FEEKQRJFGKIB/s9Kr2x071737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XvfuvdYpoYp45Ipo45YpUeKWKVBJFLHIpSSOWNgVkjdGIIIIIPvwxkcevevVXPb2wh15vatw9KjjCZCL+M7eZzcpjqiVlmxwNyW/hFUDEL8+Joyfr7kXab366yjkY/qr2t9o4H8x/g6Dt5B4Ez0WkZOP83QYezLpL1737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691/9XZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917ox/xewEWV7DrcvOhaPbGClqKe66o/wCIZeY0ELi/CyQ0cdRYjn1+w9zJMUs4oQcyPn7Fz/h6Xbaga6Zz+FMfaT1YWBbgewT0fde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+690Vb5XYCOr2fg9xov8AlGAzsVNIyjk0GcjNLKrMOdCVsMDWPHHsQctTlL6aCvbJH/MZFPnx/b0W7nHqgSQH4W/w46Id7G/RL1737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691//W2Xvcr9BPr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6Op8RqYCg35WkAu+VwtErf2hHT4+apZb/0LVd/YO5nJ+os18tBP7Sf83RxtdNEvrq/ydHG9hno0697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917oHe/qUVXUW9gVDGmx1PXxE/2ZaDI0dUGH+1ARG3sz2Wn72sKmg1/wCEU/y9JL5dVpOPl1WP+T/r+5E+3j0HvM+nXvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3X/9fZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917o8PxH/497e3/AIc9Hb/zx0XsG80A/VWn/NL/AJ+bo42v+zl/03+To3PsNdGnXvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XvfuvdBZ3dx1L2B/X+7Vf/vCj/iT7MNp/5Kdj/wA1V/w9Jrz/AHFn/wBKequPckHift6DfXveut9e9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3X//Q2Xvcr9BPr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6Ov8RZb4zfsFjePNYWbn6fv4ySPgf1H2/sHcz1+otD5eGR/M/5+jjayNEw86j/B0cP2GejTr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xugi75kEXUO+2/wBVh1h4sD/lFbSQAXP9TJ7MNpxudkf+GDpLenTaTn5dVhe5H/w9B3zI697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6/9HZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917o4HxHqCuQ35R34em29Vhb83V8nASB/SzD2E+aFOqxfyow/mOjTajU3ApnHR2vYU6OOve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6Ar5IVPg6j3Clx/ldVg6Mi/wBVlzVCzAf1OmMn/YezXZI/E3WzzwJP/GT0j3DNnMPUD/D1W17kLoPde9+631737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvdf/9LZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917o0fxOmC723XTFuZtq0lQFuL2psuqFrfWwNUB7DXM4/xe0P8ATb/AOjHbK+NL6aB/h6Pv7BvR31737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Rb/lNOIur1jLBfut0YCAAsF1aZKipIF/1G1Pe3s65dUHdKnyRj+wf7PSDcmpbUI4sP8/8Ak6r19j3oi697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6//T2Xvcr9BPr3v3Xuve/de697917r3v3Xuve/de697917r3v3XusU7mOGaRbao4pHW/IuqFhcf0uPfhxHXurUusdibV2lt3Cz4PFUcVfVYWgeuzXiR8pk2q6anqqh6qvYGeWKaeziO4jWw0qAB7jK9uZ7m4lM0hIDGg8h9g6ElvDFEitGgDMoqfM9Cb7S9KOve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6Z85gMLuOhOOz2Kx+ZoS4l+0yNLDVwiVVZFmRJlYRzIjsFdbMLmx92jllglSaGUo6+YND+3qrIkg0uoK9VVb+w1DtzfW78Bi9QxuIztVSUKPIZXgpjHDUpTNKxLuKUzmNSxLaVFyTc+5LsJZJ7K2mlp4jpU0FPMjh86VPzPQauFRJ5VRaKG4dJL2q6a697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuv/1Nl73K/QT697917r3v3Xuve/de697917r3v3Xuve/de697917rplV1ZGF1ZWVh/VSCCP9iPfuvAVx1af03lnzfV2yK+Vw8xwNJSTNcE+XG6sdIDb6MGpefcbbnD9PuF5FigkPDhnP+XoSWrFraEnjp/wY6Ez2h6Ude9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+6910SACSQAOSTwAByST+APeiacevdU/7kyjZ3cu5M29tWX3BmMhccgpPXz+Ag/kfbqgH+A9yhaRmG1tojxWMD/L0FXbXJK/mWP+Hpm9qOq9e9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3X/9XZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de69791rqwn4uZH7rrV6EvqfEblzNIUN7pDVtDlYLD/UkVxA/wBb2BeY4li3N9P4kUnzFSKGh/Lo/wBuk8S3ofiUkdGR9kXS7r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuk1vLJphtpbnyrv4xj8Bl6sP/R4KGd47f4mQAD/AB9uQxmWaKMAnUwFBxyadNzOqRSOxooB6qFgDCCEP+sRRh/+D6Rr/wBu1/cpkgk06CwwAPPrL791vr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6//9bZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917owvx97Podh5mvweZiqHxe7azER01TTIsn8OzPlXFxPVI8sdqGrhqI1d11MhiBsQeA9v+3vcQxXENA0dRQ+Y+LFAeGeNB0usbpIBIki0UkUPz6sUF/wA2/wBh7BPR9137917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917oqHyT7PocdiMj1pRQ1EmazlBQTZCr0otFQYWoq3aWMSiTyyV9YlEyCMJpWN9Zb6AiHYLCSa4hvyaW8bVB8yRwA+XqeizcrhBFJbCpkYD8hX+fRFf8Aef8AX9jWgqSBx6JvMnrr3vr3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691//19l73K/QT697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3XuumeWMeWAlZ4WSenYfVaiBhLAwvwCsyKfeiutXT+IEftFP8vXscTwGf2dW+7WzUW4tt4HPQsrpl8RjsiNBuqtV0sUsiX/rHIzKf8R7i2WJoZZIW+JGI/YadCmNxJGjjgQD0/e2+r9e9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XR/417917qq3t7ODcXZ288ijrJBFljiKWRTdXpcJDHjRp/2k1EEh/wCQvci7PD9PttrHQgldR/2xJ/wU6Dd45kuZSSCAaD8ug49mXSfr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r/0Nl73K/QT697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuvf8a/3g39+6969WE/F/ci5frxsHLIrVe0snU43xgWK42tY5LFufrcaJ5Iwf8Am0R+PYF5htjDuLS0osqhvt8j/g6PtvkDwBPNf9Q6Mj7Iul3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+690l967jh2jtPcG5ahlWPDYqsrF1C+uoSIrRwgcAmardEH+Le37aA3VxDbrxdgPyPE/kM9Ukfw43f0HVRgaV7yVDa6iV3mqJP+OlRM7Szyfk/uTOzf7H3J9FUKq/CAAPsHDoKhWSqtx6797631737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691//9HZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuhp6G35FsfflOmRm8OD3RFFhMnK7aYaOr82vDZGW7KiRx1chgdjwqT6jwp9k2+2cl3Za41rJDn56TxHr86dK7GZYZ9LfC/8qZ6swBv/AL78+wD0Ieu/fuvde9+691737r3Xvfuvde9+691737r3XvfuvdePAv7917om3yn35D9vjevMfMGnmlps3uTxtfwUkDF8PjptLECStqR9wyMLiOBT9HHsUcuWTM77g6/prVV+bHiR/pR6evy6KNzn+CBeNan5f8X0S72L+ioktljnr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuv/S2Xvcr9BPr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917rplVlZHAZGUq6n6MpBBU/1BHv3DPXqBu1uHVlnx63LktzdZ4ubKzvV1mJrchgWq5WLz1NPjJVWjkqHPMk60ksaMx5YrqPJPuPN5gS33CZY10o1Gp6VzT8uhBYSvLbI0h7qkfsPQ3+yvpZ1737r3Xvfuvde9+691737r3Xvfuvde9+6902ZqvOKw+VyYRZP4dja+v0NfS/2dLLUBG0+rS3jsbc292RfEdI/wCIgft60xorH0HVQNZla/O1dVm8rUyVmTzE75KuqpTd5aip9Z44CRQoRHGg4SNVUcAe5RhiSCGKCJNKKKU+fmft6CrM0jF2NWPHqN7c611737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3X/9PZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuux/j79WmevDj1Yv8ZaQ0vVOPkOr/L8zn6xSVtdTkZKZSD/AGgRTfX8+wDzAf8AdrMAQaKo/kD0f7cum0jqckk/zPRgvZN0t697917r3v3Xuve/de697917r3v3Xuve/de6as5TGtwmYo1/VV4rIUw4vzPSTRDj88v7sjaJEf0IPWmBZWUcSOqdadSkEKH6xxJG3/BoxoP+8r7lUmufXP7egmPQevWX37rfXvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvdf/U2Xvcr9BPr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917rxNgT/QE/7bn3scQfn1omgJ9OrSOk6Fsd1RsSmddLtgKascW/tZF5cgx/2Jqb+413NmfcLxm+LxG/kadCSzUrawA0rpr+3PQpe0PSnr3v3Xuve/de697917r3v3Xuve/de697917ro+6tWhp17qnrOULYzPZ/GuArY/PZqj0j+ytPk6qNF/2CAe5Ut38S3t5K8Y1P8h0FGoHcDgGP+Hpr9u9a697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r//1dl73K/QT697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6GbqPp1+2BnJJM7JgcdhpaWjnkgoErauqqK2CWbTTNPLHTwpBEgLFlkJLiwsPZPuu7fuwwxrEHkcVyaac4x59K7W0+qVyZNIU+QrX/N1ZHh8bFh8TjMRAzPBi6Cjx0Dvp1vDRU8dNE7hVVQ7JECbAC/09gJ3eSSSVz3sxJ+0mvR+qhFVRwAp04+69W697917r3v3Xuve/de697917r3v3Xuve/de697917okHd/RSYyDePZuNz8sivWS53JYKqoYgiLVTwR1X2FdA8bIsbyGUiWN+LjV9PYs2feiWs9ulhFK6Q9fLyxw+XHopvLIATXCua0rSn+XoonsV9FHXvfut9e9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvdf/W2Xvcr9BPr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de69791rqwn4t4Y4/raTKyRGOXcWeyeQRz9ZKOkaPFUjAfhT9i5H9dXsCcwy+JuLIGqEUD7MVP+Ho92yMpbEnizE9GR9kfRh1737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XvfuvdJjeuFXce0dy4Ip5DlcHk6KNPyZ5qSUU5H+In0n27bymG5t5ge1XBP5GuOqSKHjdDwIPVRMWvxp5RplChZVIsVlUaZUIP0KSAg/4j3KVQ1GX4DkfZ0FFNRxz1z9+6t1737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691//19l73K/QT697917r3v3Xuve/de697917r3v3Xuve/de697917r3/ABHP+w/r70TTj1rpWbR2Ju/f1QaXaeHqa1NfinzEi/b4THsfrJUZKYCnkaNQWEcXklYiwW/tLdX1pZANczAHjpGWPyp5Z8z05FFPN/uOlSPM1A/b9np1ahtfAUm1tu4TbtB/wEw2MpMfExGlpft4lSSdxzZ6iUM7f7Ux9xxPM1xPLcSf2jmp6EyII1VFHaBTp+9tdX697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3XuvH37r3VbfcXUW5tqbk3DncbhKmu2bX19RlKStxcbVgxS1jCprKTI0kOurpY6etlfxylGiaMj1Agj2Oto3W3uLe3t5Zgt0q6aHFaHFCcVp5Y6I7u3mjaUrEPAJqKZIxnH29AOro6hkZXU/RlIZTb62I4NvZ6QQSGFCOi4EEVHDrl791vr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6//Q2Xvcr9BPr3v3Xuve/de697917r3v3Xuve/de66ZlRSzsqKouzMQqgD8ljYD34Anh1rgCTw6EbZvVG/d9PG+DwU0GOdl1Z7Ma8Zh0QkBpIJJYzU5ErqBtTxyAj+0PZfd7pYWYZZpwZAD2p3GvkDwC1+Z6URWs86hokqppk1Ap5keZ6Ntsn4w7SwvgrN31Mm78gqhmo3RqHb0MhALBcekjVFcEccGokZT/AKgewrd8wXdyhjt1EUfrksf9seH5U+3o0g22KM6pGLt8+H7OjL0tJS0UENLR00FJS06COnpqaKOCngjH0SGCJUiiQX4CgD2RkliWJJY8ejEUAAAoOpHvXXuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de66Iv/AMV/Pv3XugS3z0FsHejT1yUL7czk3qbMYBYqZppbALJXY9kOPrrfksiyG59d/ZtZbzfWRVQ4eD+Fs/sPEf4Pl0iuLCCcNQaJD+If5fI9FD3p8fexNpGapo6NN3YiO7CuwMb/AMRij1NzV4OR3qwyxrdmp2qF5/HsT2m/7fckI9YZcCjGo+3X5D7R0Wy7fNFkd6/Lj+z/ADdAfcanT1LJGxSWJ1aOaJ1/Uk0MgWWJx+QwB9nNQRUfD6jI/IjB/LpD6g8R173vrfXvfuvde9+691737r3Xvfuvde9+691737r3X//R2Xvcr9BPr3v3Xuve/de697917rJTwz1lTFRUVPU1tbOQIKKip5qyrmLGy+OmpklmYH+umw/r7qzIis7uqoOJJAA+0nh1oVZtCir+g49D7tH429g7jMNRmVptnYx9Ds+SH3maeMmzCPD00qpTvb6eeZCPyvsjuuYLO3ZlhUzSD0wn7SK/bj7D0ui2+eQhnIWP5jP7PLo1ey/j/wBebPaGrfHNuTMRWYZXcXirmiltYvRY/wAaY2i55BWIuP8AVew3db1f3YKmTREfwriv2mtT+2nRnDY28J16dT+p/wA3DobFVVAVQAFFlAAAAHAAAAAAH49lIFPPpZ1y97691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XvfuvdesPfuvdB5vLqzY2+42O4MDTTVukiLL0l8fmYCbC6ZKl8c8gUDhZNaf4e1lrf3lm2qC4YD04r/vJx/KvTEttBOKSxA5/P9o6Knu/4r7hx5kqtk5iDPUwJKYnNtHjcqim9khyMSfw2sKj/AI6JT3/r+fYlteZYXot7CYz/ABL3D/eScfkT0V3G1yf8R5Rx4H0+3otOcwWb2zWHH7jxGRwdXeyRZOlkplmuTZqac6qWqVrcGKRx7P4Lm3uVDW8odfOnEfaPLpBJHJFiSMj7Rj9vA9NXt/jw6r1737r3Xvfuvde9+691737r3X//0tl73K/QT69/j+ByT/QfW5/w9+9B59e/LpW7U2JvDfEvj2tgK7JwhtEmRKikw8DWv+7lanRSEgA+mMyP/tPtJc7hZWRIu7gKRxHE/sGf206cigmnYrHG2PMig/b/AJujSbQ+KUCCGr31uCSra4Z8Lt3XSUf0BCVGVqFNbOVJsfEkANuDzf2HLvmSTURYxaR/E9C37B2j5Vr0ZR7WlQ07VI8hw/b0aDbOydp7OpjSbZwGOw8Tf5x6WAfcz/Q3qayQyVdSbj/djt7DlxcT3barmVnb5nH7OHRlHDFCKRoB0qfbPTnXvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+6903ZPE4zM0cuPy2PosnQzC0lJX0sNXTNcEXMM6OmqxNj9R+Pe0Zo2DxsVccCDTrTKrgq6gr8+i4bv+Lmz8sJKnadbVbRrDdlpUD5TBubE6PsKmVamjVmN/wBiZQt+F/HsQWvMd5E3+Nos6/PtP7V9PKoPz6LptrgkOpSVav5fs6KxvDpfsTZXmnyGEfLYqLU38Z295cnSLCv+7qqkWNclQjn+3GyD/Vn2IrTedvu+0TaZv4WwST5A8K/LHRbNZ3EALOoKeoz+0eXQVK6OCyMrqGKkqQQGH1U2JsR+R+PZpw014kV/LpMGBpQ8euXv3W+ve/de6//T2h9o7L3NvvJnE7WxrV88Whq2rkf7fF4uJwSs2Rr2Vo4dSglY1DTSW9KH3JlzfWtlCJ7iQAHgPM/lxFPMnHQWjhmnYrAleOfw4/1Y9ejs7D+M20tviGv3dIN4ZddEn29RGYNvUkq6WtT4zUWrtDCweqaQEchF+nsI3nMF3cBo7f8AShPp8RHzPl/tadG0O1wpQzMZH+fD9g4/n0ZKCmp6WGKmpoIaengUJDBBEkMMKKLKkUUarHGqj6AAAeyIkklmYlifPoyAAAA4dZveut9e9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XvfuvddWHv3Xugc330ZsPfRmq5scMJnJBdc7gxHR1byANpNdTBfsskmprkSoXIHDj6+zOx3e9sKJG+uCvwNlfy4EfKhA86HpLNZ281SUpIRxHH5dEe7F6d3f1sz1WQiTLbd8mmHcmNjcU0KsbRpl6RjJNipmuBqYtTsfpIDx7GG37rb7i3hxkLcfwHifUhuFBQ8aE+Q6JZ7S4tzUrqj/iH+UeXQV8f1/wB9/t/p7NP89P8AV8/l0mr1/9TfX2vtbB7Pw1Lgdv0EOPx1IDpijF5J5WA8tXVzteSrrKgi7yuSzH/AAe3J5ZbmR5Z5C7txr1SOOOFFjiUKg8h0ofbfV+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6xTwQ1MUsFRFHPBPFJDNBMiywzQyqUlilicFJI5EJDKwIINj718xhuvfLy6BP/Zdupf+eUh/4uf8U/4GVv8A56f+BH/Fh/6Y/wDNezP987p/ylH4NP5ev2/Pj8+k30Vp/vkfz/z9f//V3+Pfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691//9bf49+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3X//2Q==";
				  $('#save_student_btn').attr('disabled',false).html('Add Student');

				  if(resp['img'].length==0){
					  resp['img']="assets/upload_img/student/thumb/profile_thumb_m.jpg";
			      }
				  get_all_student_data();
				  $('#saved_successfully').fadeIn();
				  setTimeout(function(){
					  $('#saved_successfully').fadeOut();
					  //$("#guest_list_body tr:first").removeClass('alert-success');
                  }, 2000);
                 
			  }
		});
	}
}

$('#mobile_no').change(function(){
	  var a = $(this).val();
	  if(a.length ==10){
	    var filter = /^[0-9-+]+$/;
	    if (filter.test(a)) {
	        return true;
	    }
	    else{
	    	alert("Not a valid mobile no");
	    	$(this).focus().val('');
	        return false;
	    }
	  }
	  else{
		 	alert("Not a valid mobile no");
	    	$(this).focus().val('');
	  } 
});

function search_student(){

	search_query = $('#search_student').val();
	get_all_student_data();
}

function get_all_student_data(){
	$('#all_student_details_list').html('<p class="loading_img"><img alt="loading" src="<?php echo URL;?>/assets/apps/img/loading.gif"/></p>');
	$.ajax({
		url: '<?php echo URL;?>admin/get_all_student_data/'+search_query,
		type: 'POST',
		dataType: 'JSON',
		beforeSend: function() {	
			$('#all_student_details_list').empty();
		},
		success: function(data) {
			console.log(data);
			var count=0;
			for(var i in data){
				count= count +1;
				/*var url= '';
				if(data[i].status == 0){
					url= '<td class="is-disable"><a title="Click to Enable" class="label">Dismiss</a></td>';
				}else{
					url= '<td class="is-enable"><a title="Click to Disable" class="label label-success">Approved</a></td>';
				}*/
				$('#all_student_details_list').append('<tr id=tr_'+data[i].id+'><td>'+count+'</td><td class="id hidden">'+data[i].id+'</td><td>'+data[i].name+'</td><td>'+data[i].email+'</td><td>'+data[i].mobile_no+'</td><td>'+data[i].class+'</td><td>'+data[i].section+'</td><td><button class="btn btn-mini btn-inverse" onclick="edit_student('+data[i].id+');">edit details</button></td><td><button class="btn btn-success btn-mini">view details</button></td></tr>');
			}	
		}
	});
}


/*$("#all_student_details_list").on("click", ".is-disable", function(){
	
	var  id = $(this).closest("tr").find(".id").text();
	var  name = $(this).closest("tr").find(".name").text();
	var  email = $(this).closest("tr").find(".email").text();
	var  user_type ='general';
	var status = 1;
	$(this).closest("tr").find(".is-disable").html('<a title="Click to Disable" class="label label-success">Approved</a>');
	approve_student(id,name,email,user_type,status);
});

$("#all_student_details_list").on("click", ".is-enable", function(){
	var  id = $(this).closest("tr").find(".id").text();
	var  name = $(this).closest("tr").find(".name").text();
	var  email = $(this).closest("tr").find(".email").text();
	var  user_type ='general';
	var status = 0;
	$(this).closest("tr").find(".is-enable").html('<a title="Click to Enable" class="label ">Dismiss</a>');
	approve_student(id,name,email,user_type,status);
});

function approve_student(id,name,email,user_type,status){
	 $.ajax({
		url: '<?php echo URL;?>admin/change_account_status',
		type: 'POST',
		dataType: 'JSON',
		data:{'id':id,'name':name,'email':email,'user_type':user_type,'status':status},
		success: function(data){
			get_all_student_data();
			
		}			
	});
}*/

function edit_student(id){
	$.ajax({
		url: '<?php echo URL;?>admin/get_student_info',
		type: 'POST',
		dataType: 'JSON',
		data:{id:id},
		success: function(data){
			console.log(data);
			for(var i in data){
				
				//console.log(data);
				$('#student_id').val(data[i].id);
				$('#student_name').val(data[i].name);
				$('#student_mobile_no').val(data[i].mobile_no);
				$('#student_email').val(data[i].email);	
				$('#student_f_name').val(data[i].f_name);
				$('#student_m_name').val(data[i].m_name);
				$('#student_class').val(data[i].class);
				$('#student_section').val(data[i].section);			
				$('#student_roll_no').val(data[i].roll_no);
				$('#student_address').val(data[i].address);
				$('#edit_student_details').toggle("300");
			}

			
			
		}			
});
}

$('#btn_update_student').click(function(){
	$('#btn_update_student').attr('disabled',true).html('Saving...');
	var formData = $('form#edit_student_form').serialize();
	$.ajax({
		url:'<?php echo URL;?>admin/update_student',
		type:'POST',
		data: formData,
		dataType:'json',
		  success: function(data){
			  	$('#btn_update_student').attr('disabled',false).html('Update');
			    $("#edit_student_details").slideUp(300);
				get_all_student_data();
			  }
	});
	return false;
});

$('#btn_cancel').click(function(){
	$('#edit_student_details').toggle("300");
});


//-->
</script>