<style>
body #cam_modal{
	max-width: 430px;
	margin-left: -150px;
}
#data_url,
#imgfiles{
	display: none;
}
#saved_successfully{
	display: none;
	position: absolute;
	margin-top: 5%;
	margin-left: 25%;
	padding: 20px;
}
#add_guest_btn{
	min-width: 220px;
}
#datepicker_guest_list{
	font-weight: bold;
}
</style>
<div class="container">
	<div class="row-fluid">
		<span class="alth4">Date</span>
		&nbsp;&nbsp;<input class="span2" id="datepicker_guest_list" type="text" />
		<button class="btn btn-danger pull-right" id="show_checkin" type="button">Show Check-in&nbsp;<i class="icon-white icon-chevron-down"></i></button>
		<button class="btn btn-inverse pull-right" id="hide_checkin" type="button">Hide Check-in&nbsp;<i class="icon-white icon-chevron-up"></i></button>
	</div>
	
	<div class="row-fluid" id="new_guest_list_div">
		<h5 id="saved_successfully" class="alert alert-success">New guest record submitted to <span id="hotel_ps_name"></span> police station</h5>
		<div class="span3" style="margin-left: 0;">
				<div id="data_url" class="well"></div>
				<img class="img-rounded" id="cam_photo" alt="" src="data:image/jpeg;base64,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bERib29sAAAAAABJbnRyYm9vbAAAAAAAQmNrZ09iamMAAAABAAAAAAAAUkdCQwAAAAMAAAAAUmQgIGRvdWJAb+AAAAAAAAAAAABHcm4gZG91YkBv4AAAAAAAAAAAAEJsICBkb3ViQG/gAAAAAAAAAAAAQnJkVFVudEYjUmx0AAAAAAAAAAAAAAAAQmxkIFVudEYjUmx0AAAAAAAAAAAAAAAAUnNsdFVudEYjUHhsQFIAAAAAAAAAAAAKdmVjdG9yRGF0YWJvb2wBAAAAAFBnUHNlbnVtAAAAAFBnUHMAAAAAUGdQQwAAAABMZWZ0VW50RiNSbHQAAAAAAAAAAAAAAABUb3AgVW50RiNSbHQAAAAAAAAAAAAAAABTY2wgVW50RiNQcmNAWQAAAAAAAAAAABBjcm9wV2hlblByaW50aW5nYm9vbAAAAAAOY3JvcFJlY3RCb3R0b21sb25nAAAAAAAAAAxjcm9wUmVjdExlZnRsb25nAAAAAAAAAA1jcm9wUmVjdFJpZ2h0bG9uZwAAAAAAAAALY3JvcFJlY3RUb3Bsb25nAAAAAAA4QklNA+0AAAAAABAASAAAAAEAAQBIAAAAAQABOEJJTQQmAAAAAAAOAAAAAAAAAAAAAD+AAAA4QklNBA0AAAAAAAQAAAAeOEJJTQQZAAAAAAAEAAAAHjhCSU0D8wAAAAAACQAAAAAAAAAAAQA4QklNJxAAAAAAAAoAAQAAAAAAAAABOEJJTQP1AAAAAABIAC9mZgABAGxmZgAGAAAAAAABAC9mZgABAKGZmgAGAAAAAAABADIAAAABAFoAAAAGAAAAAAABADUAAAABAC0AAAAGAAAAAAABOEJJTQP4AAAAAABwAAD/////////////////////////////A+gAAAAA/////////////////////////////wPoAAAAAP////////////////////////////8D6AAAAAD/////////////////////////////A+gAADhCSU0ECAAAAAAAEAAAAAEAAAJAAAACQAAAAAA4QklNBB4AAAAAAAQAAAAAOEJJTQQaAAAAAANzAAAABgAAAAAAAAAAAAAA+gAAAPoAAAAfAGYAYQBjAGUAYgBvAG8AawAtAGQAZQBmAGEAdQBsAHQALQBuAG8ALQBwAHIAbwBmAGkAbABlAC0A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AGQAbwBiAGUAIABQAGgAbwB0AG8AcwBoAG8AcAAAABMAQQBkAG8AYgBlACAAUABoAG8AdABvAHMAaABvAHAAIABDAFMANgAAAAEAOEJJTQQGAAAAAAAHAAgAAAABAQD/4Q2XaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjMtYzAxMSA2Ni4xNDU2NjEsIDIwMTIvMDIvMDYtMTQ6NTY6MjcgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdEV2dD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlRXZlbnQjIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bXBNTTpEb2N1bWVudElEPSI1RjE4MkNDNzRGQjk3MzM1Nzc5MDk2RDlBRTRFMjAwMCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo1NDVDRUVCRTU2MTZFMzExQTk0QkI4RjU1ODI5RDA3OSIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSI1RjE4MkNDNzRGQjk3MzM1Nzc5MDk2RDlBRTRFMjAwMCIgZGM6Zm9ybWF0PSJpbWFnZS9qcGVnIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0iYzIiIHhtcDpDcmVhdGVEYXRlPSIyMDEzLTA5LTA1VDIzOjQwOjEyKzA1OjMwIiB4bXA6TW9kaWZ5RGF0ZT0iMjAxMy0wOS0wNVQyMzo0MjozNyswNTozMCIgeG1wOk1ldGFkYXRhRGF0ZT0iMjAxMy0wOS0wNVQyMzo0MjozNyswNTozMCI+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjUzNUNFRUJFNTYxNkUzMTFBOTRCQjhGNTU4MjlEMDc5IiBzdEV2dDp3aGVuPSIyMDEzLTA5LTA1VDIzOjQyOjM3KzA1OjMwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ1M2IChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD0iLyIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6NTQ1Q0VFQkU1NjE2RTMxMUE5NEJCOEY1NTgyOUQwNzkiIHN0RXZ0OndoZW49IjIwMTMtMDktMDVUMjM6NDI6MzcrMDU6MzAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDUzYgKFdpbmRvd3MpIiBzdEV2dDpjaGFuZ2VkPSIvIi8+IDwvcmRmOlNlcT4gPC94bXBNTTpIaXN0b3J5PiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8P3hwYWNrZXQgZW5kPSJ3Ij8+/+ICHElDQ19QUk9GSUxFAAEBAAACDGxjbXMCEAAAbW50clJHQiBYWVogB9wAAQAZAAMAKQA5YWNzcEFQUEwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPbWAAEAAAAA0y1sY21zAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAKZGVzYwAAAPwAAABeY3BydAAAAVwAAAALd3RwdAAAAWgAAAAUYmtwdAAAAXwAAAAUclhZWgAAAZAAAAAUZ1hZWgAAAaQAAAAUYlhZWgAAAbgAAAAUclRSQwAAAcwAAABAZ1RSQwAAAcwAAABAYlRSQwAAAcwAAABAZGVzYwAAAAAAAAADYzIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAdGV4dAAAAABGQgAAWFlaIAAAAAAAAPbWAAEAAAAA0y1YWVogAAAAAAAAAxYAAAMzAAACpFhZWiAAAAAAAABvogAAOPUAAAOQWFlaIAAAAAAAAGKZAAC3hQAAGNpYWVogAAAAAAAAJKAAAA+EAAC2z2N1cnYAAAAAAAAAGgAAAMsByQNjBZIIawv2ED8VURs0IfEpkDIYO5JGBVF3Xe1rcHoFibGafKxpv33Tw+kw////7gAOQWRvYmUAZEAAAAAB/9sAhAABAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAgICAgICAgICAgIDAwMDAwMDAwMDAQEBAQEBAQEBAQECAgECAgMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwP/wAARCAD6APoDAREAAhEBAxEB/90ABAAg/8QBogAAAAYCAwEAAAAAAAAAAAAABwgGBQQJAwoCAQALAQAABgMBAQEAAAAAAAAAAAAGBQQDBwIIAQkACgsQAAIBAwQBAwMCAwMDAgYJdQECAwQRBRIGIQcTIgAIMRRBMiMVCVFCFmEkMxdScYEYYpElQ6Gx8CY0cgoZwdE1J+FTNoLxkqJEVHNFRjdHYyhVVlcassLS4vJkg3SThGWjs8PT4yk4ZvN1Kjk6SElKWFlaZ2hpanZ3eHl6hYaHiImKlJWWl5iZmqSlpqeoqaq0tba3uLm6xMXGx8jJytTV1tfY2drk5ebn6Onq9PX29/j5+hEAAgEDAgQEAwUEBAQGBgVtAQIDEQQhEgUxBgAiE0FRBzJhFHEIQoEjkRVSoWIWMwmxJMHRQ3LwF+GCNCWSUxhjRPGisiY1GVQ2RWQnCnODk0Z0wtLi8lVldVY3hIWjs8PT4/MpGpSktMTU5PSVpbXF1eX1KEdXZjh2hpamtsbW5vZnd4eXp7fH1+f3SFhoeIiYqLjI2Oj4OUlZaXmJmam5ydnp+So6SlpqeoqaqrrK2ur6/9oADAMBAAIRAxEAPwDZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6//9DZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6//9HZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917rokKCzEKoBJJIAAH1JJ4AHv3XulFgtpbq3Oyrt7bmZy4c2WakoZvtf+DGslWOlCc/XXb2xNdW1t/b3CL9pz+zj1dIpZf7OMn8uhywPxc3/kWifNV+E29TuoaRRLJlK6MH+wIqcRU3lA+t5bD2TT8x2UdRDG8jfkB/PP8ulqbbO1NbKo/aehDj+I2PFvNvzJtxyIsLQx8/4FqqQgX9ojzO/lZL/vR/zdPja185j+wdN9d8R5wWOM3zqGk6FyOFUHVbgM9LVj03/IF/d05nH+iWf7G/zjqp2s/hm/aOgW3H0V2ftt5jJt2TM0kWthXYCVMgjxJf8AdNJ6K6L0i+koSPZtBvO3XFKXGhvRsfz4fz6SSWVzHX9Oo9Rn/Z6CIgq7xurxyxsUlikRo5YnU2ZJI3CvG6ngggEezTiAQajpL/h697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r//0tl73K/QT697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917pS7T2fuTfGVGH2vjJMjVqFeqmYmDH42FjxPkq5laKljKg6V9Ukh4RGPtPdXdtYxeNdOQlaADifsH+odOwwyTkrGp+3yB+fR5OvPjftPbC0+S3QIt3bgQpL/lcJGAoJRpa1DipNQqXRgf3anyMfqFT6ewZf7/dXWqO2PhQfL4iP6R8vsFPnXo3ttvSEKZjrlH7K/IdGNiijhjSKGOOKKNQqRxIscaKPoqIoCqo/oB7I8murJPRhw4dZPfuvde9+691737r3XvfuvdA72V0xtnsKF6kwxYnPqCY8xSQokszHnTXBQv3S3/LXYf19mm37tc2LBQdUH8J/yenSW4tIpxUij+o6Itv/AKi3j12GrMrR/e4LXoGdoFaSkgJbSi5FAC9D5Dwrt+2TxqB49jCw3a0vxRGKTV+FsE/Z69Es9pNb5YVT1H+X06DD2Z9J+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r/9PZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3XuhR6s6sy/Z2Xkghkkxm3cdIi5zO+MOY3dQ64vGK4MdRlpoyGN7x08bB3uSiMV7ruabdGFADXLAEDyA9W/yD16et7V7xtK4g82HrXK/b1ZLtXaeA2Zh6bB7cx0ONoKcXKp656qZh+5V11S15qysmIu0jkt+BYAAAGe4uLuU3F1IWmPGpr+XQjjjSJdCLRelJ7a6v1737r3Xvfuvde9+691737r3Xvfuvde9+691hqKeCqgmpqmGKpp543hnp540mgnhkUpJFNFIGjlikQkMrAgg8+/VYZQ0YcOtEAggio6IL3d0SdnpVbw2fDLJtYMZMvhF1TS7cVjzW0LeqSXBgn9xDd6Uci8V/GMtn3o3BW0vCPGpRW/i+R+fp6+fRPeWXhjxIR2+Y9Oiy/wC2P+I5B/1vYk49FnXve+vde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvdf/9TZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917pwxOJr8/lsXgcVGsmSzVfT4yiV7aFnqW0+aQkgCKliDSyc/5tG9tzTRW8Uk89fCRSTTifkPtNB1rw3mIhjPc3+Dz6tg2XtHFbH23itt4dAKTHU4V5iiiaurZD5K3JVLC5eqrahmdzc2vYcAARnc3Et3PLcTGrsf2DyA+Q6FEEKQRJFGKIB/s9Kr2x071737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XvfuvdYpoYp45Ipo45YpUeKWKVBJFLHIpSSOWNgVkjdGIIIIIPvwxkcevevVXPb2wh15vatw9KjjCZCL+M7eZzcpjqiVlmxwNyW/hFUDEL8+Joyfr7kXab366yjkY/qr2t9o4H8x/g6Dt5B4Ez0WkZOP83QYezLpL1737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691/9XZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917ox/xewEWV7DrcvOhaPbGClqKe66o/wCIZeY0ELi/CyQ0cdRYjn1+w9zJMUs4oQcyPn7Fz/h6Xbaga6Zz+FMfaT1YWBbgewT0fde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+690Vb5XYCOr2fg9xov8AlGAzsVNIyjk0GcjNLKrMOdCVsMDWPHHsQctTlL6aCvbJH/MZFPnx/b0W7nHqgSQH4W/w46Id7G/RL1737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691//W2Xvcr9BPr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6Op8RqYCg35WkAu+VwtErf2hHT4+apZb/0LVd/YO5nJ+os18tBP7Sf83RxtdNEvrq/ydHG9hno0697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917oHe/qUVXUW9gVDGmx1PXxE/2ZaDI0dUGH+1ARG3sz2Wn72sKmg1/wCEU/y9JL5dVpOPl1WP+T/r+5E+3j0HvM+nXvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3X/9fZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917o8PxH/497e3/AIc9Hb/zx0XsG80A/VWn/NL/AJ+bo42v+zl/03+To3PsNdGnXvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XvfuvdBZ3dx1L2B/X+7Vf/vCj/iT7MNp/5Kdj/wA1V/w9Jrz/AHFn/wBKequPckHift6DfXveut9e9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3X//Q2Xvcr9BPr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6Ov8RZb4zfsFjePNYWbn6fv4ySPgf1H2/sHcz1+otD5eGR/M/5+jjayNEw86j/B0cP2GejTr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xugi75kEXUO+2/wBVh1h4sD/lFbSQAXP9TJ7MNpxudkf+GDpLenTaTn5dVhe5H/w9B3zI697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6/9HZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917o4HxHqCuQ35R34em29Vhb83V8nASB/SzD2E+aFOqxfyow/mOjTajU3ApnHR2vYU6OOve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6Ar5IVPg6j3Clx/ldVg6Mi/wBVlzVCzAf1OmMn/YezXZI/E3WzzwJP/GT0j3DNnMPUD/D1W17kLoPde9+631737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvdf/9LZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917o0fxOmC723XTFuZtq0lQFuL2psuqFrfWwNUB7DXM4/xe0P8ATb/AOjHbK+NL6aB/h6Pv7BvR31737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Rb/lNOIur1jLBfut0YCAAsF1aZKipIF/1G1Pe3s65dUHdKnyRj+wf7PSDcmpbUI4sP8/8Ak6r19j3oi697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6//T2Xvcr9BPr3v3Xuve/de697917r3v3Xuve/de697917r3v3XusU7mOGaRbao4pHW/IuqFhcf0uPfhxHXurUusdibV2lt3Cz4PFUcVfVYWgeuzXiR8pk2q6anqqh6qvYGeWKaeziO4jWw0qAB7jK9uZ7m4lM0hIDGg8h9g6ElvDFEitGgDMoqfM9Cb7S9KOve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6Z85gMLuOhOOz2Kx+ZoS4l+0yNLDVwiVVZFmRJlYRzIjsFdbMLmx92jllglSaGUo6+YND+3qrIkg0uoK9VVb+w1DtzfW78Bi9QxuIztVSUKPIZXgpjHDUpTNKxLuKUzmNSxLaVFyTc+5LsJZJ7K2mlp4jpU0FPMjh86VPzPQauFRJ5VRaKG4dJL2q6a697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuv/1Nl73K/QT697917r3v3Xuve/de697917r3v3Xuve/de697917rplV1ZGF1ZWVh/VSCCP9iPfuvAVx1af03lnzfV2yK+Vw8xwNJSTNcE+XG6sdIDb6MGpefcbbnD9PuF5FigkPDhnP+XoSWrFraEnjp/wY6Ez2h6Ude9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+6910SACSQAOSTwAByST+APeiacevdU/7kyjZ3cu5M29tWX3BmMhccgpPXz+Ag/kfbqgH+A9yhaRmG1tojxWMD/L0FXbXJK/mWP+Hpm9qOq9e9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3X/9XZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de69791rqwn4uZH7rrV6EvqfEblzNIUN7pDVtDlYLD/UkVxA/wBb2BeY4li3N9P4kUnzFSKGh/Lo/wBuk8S3ofiUkdGR9kXS7r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuk1vLJphtpbnyrv4xj8Bl6sP/R4KGd47f4mQAD/AB9uQxmWaKMAnUwFBxyadNzOqRSOxooB6qFgDCCEP+sRRh/+D6Rr/wBu1/cpkgk06CwwAPPrL791vr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6//9bZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917owvx97Podh5mvweZiqHxe7azER01TTIsn8OzPlXFxPVI8sdqGrhqI1d11MhiBsQeA9v+3vcQxXENA0dRQ+Y+LFAeGeNB0usbpIBIki0UkUPz6sUF/wA2/wBh7BPR9137917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917oqHyT7PocdiMj1pRQ1EmazlBQTZCr0otFQYWoq3aWMSiTyyV9YlEyCMJpWN9Zb6AiHYLCSa4hvyaW8bVB8yRwA+XqeizcrhBFJbCpkYD8hX+fRFf8Aef8AX9jWgqSBx6JvMnrr3vr3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691//19l73K/QT697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3XuumeWMeWAlZ4WSenYfVaiBhLAwvwCsyKfeiutXT+IEftFP8vXscTwGf2dW+7WzUW4tt4HPQsrpl8RjsiNBuqtV0sUsiX/rHIzKf8R7i2WJoZZIW+JGI/YadCmNxJGjjgQD0/e2+r9e9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XR/417917qq3t7ODcXZ288ijrJBFljiKWRTdXpcJDHjRp/2k1EEh/wCQvci7PD9PttrHQgldR/2xJ/wU6Dd45kuZSSCAaD8ug49mXSfr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r/0Nl73K/QT697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuvf8a/3g39+6969WE/F/ci5frxsHLIrVe0snU43xgWK42tY5LFufrcaJ5Iwf8Am0R+PYF5htjDuLS0osqhvt8j/g6PtvkDwBPNf9Q6Mj7Iul3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+690l967jh2jtPcG5ahlWPDYqsrF1C+uoSIrRwgcAmardEH+Le37aA3VxDbrxdgPyPE/kM9Ukfw43f0HVRgaV7yVDa6iV3mqJP+OlRM7Szyfk/uTOzf7H3J9FUKq/CAAPsHDoKhWSqtx6797631737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691//9HZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuhp6G35FsfflOmRm8OD3RFFhMnK7aYaOr82vDZGW7KiRx1chgdjwqT6jwp9k2+2cl3Za41rJDn56TxHr86dK7GZYZ9LfC/8qZ6swBv/AL78+wD0Ieu/fuvde9+691737r3Xvfuvde9+691737r3XvfuvdePAv7917om3yn35D9vjevMfMGnmlps3uTxtfwUkDF8PjptLECStqR9wyMLiOBT9HHsUcuWTM77g6/prVV+bHiR/pR6evy6KNzn+CBeNan5f8X0S72L+ioktljnr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuv/S2Xvcr9BPr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917rplVlZHAZGUq6n6MpBBU/1BHv3DPXqBu1uHVlnx63LktzdZ4ubKzvV1mJrchgWq5WLz1NPjJVWjkqHPMk60ksaMx5YrqPJPuPN5gS33CZY10o1Gp6VzT8uhBYSvLbI0h7qkfsPQ3+yvpZ1737r3Xvfuvde9+691737r3Xvfuvde9+6902ZqvOKw+VyYRZP4dja+v0NfS/2dLLUBG0+rS3jsbc292RfEdI/wCIgft60xorH0HVQNZla/O1dVm8rUyVmTzE75KuqpTd5aip9Z44CRQoRHGg4SNVUcAe5RhiSCGKCJNKKKU+fmft6CrM0jF2NWPHqN7c611737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3X/9PZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuux/j79WmevDj1Yv8ZaQ0vVOPkOr/L8zn6xSVtdTkZKZSD/AGgRTfX8+wDzAf8AdrMAQaKo/kD0f7cum0jqckk/zPRgvZN0t697917r3v3Xuve/de697917r3v3Xuve/de6as5TGtwmYo1/VV4rIUw4vzPSTRDj88v7sjaJEf0IPWmBZWUcSOqdadSkEKH6xxJG3/BoxoP+8r7lUmufXP7egmPQevWX37rfXvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvdf/U2Xvcr9BPr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917rxNgT/QE/7bn3scQfn1omgJ9OrSOk6Fsd1RsSmddLtgKascW/tZF5cgx/2Jqb+413NmfcLxm+LxG/kadCSzUrawA0rpr+3PQpe0PSnr3v3Xuve/de697917r3v3Xuve/de697917ro+6tWhp17qnrOULYzPZ/GuArY/PZqj0j+ytPk6qNF/2CAe5Ut38S3t5K8Y1P8h0FGoHcDgGP+Hpr9u9a697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r//1dl73K/QT697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6GbqPp1+2BnJJM7JgcdhpaWjnkgoErauqqK2CWbTTNPLHTwpBEgLFlkJLiwsPZPuu7fuwwxrEHkcVyaac4x59K7W0+qVyZNIU+QrX/N1ZHh8bFh8TjMRAzPBi6Cjx0Dvp1vDRU8dNE7hVVQ7JECbAC/09gJ3eSSSVz3sxJ+0mvR+qhFVRwAp04+69W697917r3v3Xuve/de697917r3v3Xuve/de697917okHd/RSYyDePZuNz8sivWS53JYKqoYgiLVTwR1X2FdA8bIsbyGUiWN+LjV9PYs2feiWs9ulhFK6Q9fLyxw+XHopvLIATXCua0rSn+XoonsV9FHXvfut9e9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvdf/W2Xvcr9BPr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de69791rqwn4t4Y4/raTKyRGOXcWeyeQRz9ZKOkaPFUjAfhT9i5H9dXsCcwy+JuLIGqEUD7MVP+Ho92yMpbEnizE9GR9kfRh1737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XvfuvdJjeuFXce0dy4Ip5DlcHk6KNPyZ5qSUU5H+In0n27bymG5t5ge1XBP5GuOqSKHjdDwIPVRMWvxp5RplChZVIsVlUaZUIP0KSAg/4j3KVQ1GX4DkfZ0FFNRxz1z9+6t1737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691//19l73K/QT697917r3v3Xuve/de697917r3v3Xuve/de697917r3/ABHP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nadbVbRrDdlpUD5TBubE6PsKmVamjVmN/wBiZQt+F/HsQWvMd5E3+Nos6/PtP7V9PKoPz6LptrgkOpSVav5fs6KxvDpfsTZXmnyGEfLYqLU38Z295cnSLCv+7qqkWNclQjn+3GyD/Vn2IrTedvu+0TaZv4WwST5A8K/LHRbNZ3EALOoKeoz+0eXQVK6OCyMrqGKkqQQGH1U2JsR+R+PZpw014kV/LpMGBpQ8euXv3W+ve/de6//T2h9o7L3NvvJnE7WxrV88Whq2rkf7fF4uJwSs2Rr2Vo4dSglY1DTSW9KH3JlzfWtlCJ7iQAHgPM/lxFPMnHQWjhmnYrAleOfw4/1Y9ejs7D+M20tviGv3dIN4ZddEn29RGYNvUkq6WtT4zUWrtDCweqaQEchF+nsI3nMF3cBo7f8AShPp8RHzPl/tadG0O1wpQzMZH+fD9g4/n0ZKCmp6WGKmpoIaengUJDBBEkMMKKLKkUUarHGqj6AAAeyIkklmYlifPoyAAAA4dZveut9e9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XvfuvddWHv3Xugc330ZsPfRmq5scMJnJBdc7gxHR1byANpNdTBfsskmprkSoXIHDj6+zOx3e9sKJG+uCvwNlfy4EfKhA86HpLNZ281SUpIRxHH5dEe7F6d3f1sz1WQiTLbd8mmHcmNjcU0KsbRpl6RjJNipmuBqYtTsfpIDx7GG37rb7i3hxkLcfwHifUhuFBQ8aE+Q6JZ7S4tzUrqj/iH+UeXQV8f1/wB9/t/p7NP89P8AV8/l0mr1/9TfX2vtbB7Pw1Lgdv0EOPx1IDpijF5J5WA8tXVzteSrrKgi7yuSzH/AAe3J5ZbmR5Z5C7txr1SOOOFFjiUKg8h0ofbfV+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6xTwQ1MUsFRFHPBPFJDNBMiywzQyqUlilicFJI5EJDKwIINj718xhuvfLy6BP/Zdupf+eUh/4uf8U/4GVv8A56f+BH/Fh/6Y/wDNezP987p/ylH4NP5ev2/Pj8+k30Vp/vkfz/z9f//V3+Pfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691//9bf49+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3X//2Q==" width="250" height="250">
				<input type="file" id="imgfiles" name="imgfiles" accept="image/jpeg" onchange="readURL(this);"/>
				<label></label>
				<button class="btn pull-left" onclick="$('#imgfiles').click();"><i class="icon-upload"></i> Upload</button>
				<span style=" margin-left: 12%; line-height: 3; ">OR</span>
				<button class="btn pull-right" type="button" data-toggle="modal" data-target="#cam_modal" onclick="webcam();" style="margin-right: 20px;"><i class="icon-facetime-video"></i> Capture</button>
		</div>
		<form id="new_guest_list_form" action="">
			<div class="span3">
				<label>Room No. <span class="red_text">* required field</span></label>	
				<input type="text"  id="room_no" name="room_no" class="" placeholder="Room No." required="required">
				<label>Name of Guest <span class="red_text">* required field</span></label>
				<input type="text" id="name" name="name" class="" placeholder="Name of Guest" required="required">
				<label>Mobile Number <span class="red_text">* required field</span></label>
				<input type="text"  id="mobile_no" name="mobile_no" class="" placeholder="Mobile Number" maxlength="10" required="required">
				<label>Coming From</label>
				<input type="text" id="comming_from" name="comming_from" class="" placeholder="Coming From" data-provide="typeahead" data-items="4" data-source="[&quot;Guwahati&quot;,&quot;Dibrugarh&quot;,&quot;Tezpur&quot;,&quot;Nalbari&quot;]">
			</div>
			
			<div class="span3">
				<label>Going To</label>
				<input type="text" id="going_to" name="going_to" class="" placeholder="Going To" data-provide="typeahead" data-items="4" data-source="[&quot;Guwahati&quot;,&quot;Dibrugarh&quot;,&quot;Tezpur&quot;,&quot;Nalbari&quot;]">
				<label>ID Type</label>
				<select id="id_type" name="id_type" class="">
					<option value="None">--Select--</option>
					<option value="Passport">Passport</option>
					<option value="PAN Card">PAN Card</option>
					<option value="Driver's licenses">Driver's licenses</option>
					<option value="Voter ID Card">Voter ID Card</option>
					<option value="Others">Others</option>
				</select>
				<label>ID Card No.</label>
				<input type="text" id="id_no" name="id_no" class="" placeholder="ID Card No.">
				<label>Vehicle Number (if any)</label>	
				<input type="text"  id="vehicle_no" name="vehicle_no" class="" placeholder="Vehicle Number (if any)">
			</div>	
			<div class="span3">
				<label>Age</label>
				<input type="number" id="age" name="age" class="" placeholder="Age">
				<label>Sex</label>
				<select class="" id="sex" name="sex">
					<option value="M">Male</option>
					<option value="F">Female</option>
				</select>
				<label>Nationality</label>
				  <select class="" id="nationality" name="nationality">
					<option value="Indian">Indian</option>
					<option value="Foreign">Foreign</option>
				</select>
				
				<label><br/></label>
				
				<button id="add_guest_btn" type="button" onclick="save_new_guest();" class="btn btn-primary">Add Guest</button>
				
			</div>		
		</form>
		
	</div>
	
	<div class="row-fluid">
		<hr>
		<label> <strong  class="pull-left"><span id="guestlistDate"></span></strong></label>
		<table class="table table-bordered">
			<thead id="guest_list_head"></thead>
		<tbody id="guest_list_body" class="table table-bordered">
		</tbody>
		</table>
	</div>
</div>

	<div id="cam_modal" class="modal hide fade">
		<div class="modal-body">
			<div class="row-fluid">
				<video id="vi" width="400" height="340" autoplay></video>
				<canvas id="photoCanvas" width="400" height="340" style="display: none;"></canvas>
			</div>
			<div class="row-fluid">
				<input type="hidden" class="resp_id" name="resp_id">
				<button class="btn btn-primary" type="button" id="capture">Capture</button>
				<button class="btn btn-info" type="button" id="re_capture">Re-Capture</button>
				<button class="btn btn-success pull-right" type="button" id="ok" data-dismiss="modal" aria-hidden="true">OK</button>
			</div>
		</div>
	</div>
	
	<div id="main_img_modal" class="modal hide fade" tabindex="-1" role="dialog">
	</div>
<script type="text/javascript">
	$('#dashboard_hotel_li').addClass('active');
	var d = new Date();
	var month = d.getMonth()+1;
	var day = d.getDate();
	var today = d.getFullYear()+'-'+ ((''+month).length<2 ? '0' : '') + month +'-'+ ((''+day).length<2 ? '0' : '') + day;

	$('#datepicker_guest_list').val(today);
	window.onload = function() {
		get_hotel_ps_name();
	    $('#datepicker_guest_list').datepicker({
	        dateFormat: 'yy-mm-dd',
	        showOn: "button",
	        minDate: -6,
	        maxDate: today,
	        buttonImage: "assets/apps/img/calendar.gif",
	        buttonImageOnly: true,
		    onSelect:function(date){
		  	    var date = $(this).datepicker({ dateFormat: 'yy-mm-dd' }).val();
		  	    get_hotel_guestlists(date);
		  	    $('#datepicker_guest_list_date').val(date);
		  	}
	    });
	    get_hotel_guestlists(today);
	};

	$('#show_checkin').click(function(){
		$('#new_guest_list_div').slideDown();
		$('#hide_checkin').show();
		$('#show_checkin').hide();
	});

	$('#hide_checkin').click(function(){
		$('#new_guest_list_div').slideUp();
		$('#hide_checkin').hide();
		$('#show_checkin').show();
	});
	
	function readURL(input){
	    if (input.files && input.files[0]){
	        var reader = new FileReader();
	        reader.onload = function (e) {
	            $('#cam_photo').attr('src', e.target.result).width(250).height(250);
	            var a = $('#cam_photo').attr('src');
	            document.getElementById('data_url').textContent = a;
	        };
	        reader.readAsDataURL(input.files[0]);
	    }
	}

	/*web cam*/
	
	var canvasData;
	function webcam(){
	    window.URL = window.URL || window.webkitURL;
	    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia ||
	        navigator.mozGetUserMedia || navigator.msGetUserMedia;

	    var intervalForReading;
	    var onFailSoHard = function (e) {
	        $('#sorryMsg').show();
	    };
	    var video = $('video')[0];
	    var canvas = $('canvas')[0];
	    var localMediaStream = null;
	    function clearUI() {
	        $("#stop-button").fadeOut(1000);
	        var $photoCanvas = $("#photoCanvas");
	        if (!$photoCanvas.data("photoTaken")) {
	            $photoCanvas.hide();
	        }
	        document.getElementById('vi').src = '';
	    }

	    function stopWebCam(){
	        clearUI();
	        clearInterval(intervalForReading);
	        video.pause();
	        localMediaStream.stop();
	        var context = canvas.getContext('2d');
	        context.clearRect(0, 0, canvas.width, canvas.height);
	    }

	    function snapshot($canvas) {
	        var canvas = $canvas[0];
	        if (localMediaStream) {
	            var canvasContext = canvas.getContext('2d');
	            canvasContext.drawImage(video, 0, 0, 400, 340);
	            canvasData = canvas.toDataURL("image/jpeg");
	            $canvas.data("photoTaken", true);
	            document.getElementById('cam_photo').src = canvasData;
	            document.getElementById('data_url').textContent = canvasData;
	            video.pause();
	        }
	    }

	    if (navigator.getUserMedia){
	        navigator.getUserMedia({video: true}, function (stream) {
	            $('video').show();
	            video.src = window.URL.createObjectURL(stream);
	            localMediaStream = stream;
	            startReading();
	            $('video, #photoCanvas, #stop-button').fadeIn(500);
	        }, onFailSoHard);
	    }
	    else{
	        $('#sorryMsg').html('Not Supported').fadeIn(500);
	    }
	  	$('#ok').click(function () {
	        stopWebCam();
	        $('#capture').show();
	        $('#re_capture').hide();
	    });
		$('#capture').click( function(){
			$('#capture').hide();
			$('#re_capture').show();
			snapshot($('#photoCanvas'));
		});
		
		$('#re_capture').click( function(){
			$('#capture').show();
			$('#re_capture').hide();
			snapshot($('#photoCanvas'));
			video.play(); 
		});
	}

	function save_new_guest(){
		$('#add_guest_btn').attr('disabled',true).html('Saving...');
		var data_url = document.getElementById('data_url').textContent;
		var guestlist_date = $('#datepicker_guest_list').val();
		var formData =$('form#new_guest_list_form').serializeArray();
		formData.push({name: 'data_url', value: data_url});
		formData.push({name: 'guestlist_date', value: guestlist_date});
		var room_no = $('#room_no').val();
		var name = $('#name').val();
		var mobile_no = $('#mobile_no').val();
		if(room_no == 0 || room_no ==''){
			alert('Empty Room No!');
			$('#add_guest_btn').attr('disabled',false);
		}
		else if(name == ''){
			alert('Empty Name!');
			$('#add_guest_btn').attr('disabled',false);
		}
		else if(mobile_no == ''){
			alert('Empty Mobile!');
			$('#add_guest_btn').attr('disabled',false);
		}
		else{
			$.ajax({
				  url: '<?php echo URL;?>hotel_service/save_new_guest/',
				  type:'POST',
				  data:formData,
				  dataType:'JSON',
				  success: function(resp){
					  console.log(resp);
					  data_url.length=0;
					  document.getElementById('data_url').textContent='';
					  $('#new_guest_list_form').each(function(){this.reset();});
					  document.getElementById('cam_photo').src = "data:image/jpeg;base64,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bERib29sAAAAAABJbnRyYm9vbAAAAAAAQmNrZ09iamMAAAABAAAAAAAAUkdCQwAAAAMAAAAAUmQgIGRvdWJAb+AAAAAAAAAAAABHcm4gZG91YkBv4AAAAAAAAAAAAEJsICBkb3ViQG/gAAAAAAAAAAAAQnJkVFVudEYjUmx0AAAAAAAAAAAAAAAAQmxkIFVudEYjUmx0AAAAAAAAAAAAAAAAUnNsdFVudEYjUHhsQFIAAAAAAAAAAAAKdmVjdG9yRGF0YWJvb2wBAAAAAFBnUHNlbnVtAAAAAFBnUHMAAAAAUGdQQwAAAABMZWZ0VW50RiNSbHQAAAAAAAAAAAAAAABUb3AgVW50RiNSbHQAAAAAAAAAAAAAAABTY2wgVW50RiNQcmNAWQAAAAAAAAAAABBjcm9wV2hlblByaW50aW5nYm9vbAAAAAAOY3JvcFJlY3RCb3R0b21sb25nAAAAAAAAAAxjcm9wUmVjdExlZnRsb25nAAAAAAAAAA1jcm9wUmVjdFJpZ2h0bG9uZwAAAAAAAAALY3JvcFJlY3RUb3Bsb25nAAAAAAA4QklNA+0AAAAAABAASAAAAAEAAQBIAAAAAQABOEJJTQQmAAAAAAAOAAAAAAAAAAAAAD+AAAA4QklNBA0AAAAAAAQAAAAeOEJJTQQZAAAAAAAEAAAAHjhCSU0D8wAAAAAACQAAAAAAAAAAAQA4QklNJxAAAAAAAAoAAQAAAAAAAAABOEJJTQP1AAAAAABIAC9mZgABAGxmZgAGAAAAAAABAC9mZgABAKGZmgAGAAAAAAABADIAAAABAFoAAAAGAAAAAAABADUAAAABAC0AAAAGAAAAAAABOEJJTQP4AAAAAABwAAD/////////////////////////////A+gAAAAA/////////////////////////////wPoAAAAAP////////////////////////////8D6AAAAAD/////////////////////////////A+gAADhCSU0ECAAAAAAAEAAAAAEAAAJAAAACQAAAAAA4QklNBB4AAAAAAAQAAAAAOEJJTQQaAAAAAANzAAAABgAAAAAAAAAAAAAA+gAAAPoAAAAfAGYAYQBjAGUAYgBvAG8AawAtAGQAZQBmAGEAdQBsAHQALQBuAG8ALQBwAHIAbwBmAGkAbABlAC0A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AGQAbwBiAGUAIABQAGgAbwB0AG8AcwBoAG8AcAAAABMAQQBkAG8AYgBlACAAUABoAG8AdABvAHMAaABvAHAAIABDAFMANgAAAAEAOEJJTQQGAAAAAAAHAAgAAAABAQD/4Q2XaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjMtYzAxMSA2Ni4xNDU2NjEsIDIwMTIvMDIvMDYtMTQ6NTY6MjcgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdEV2dD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlRXZlbnQjIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bXBNTTpEb2N1bWVudElEPSI1RjE4MkNDNzRGQjk3MzM1Nzc5MDk2RDlBRTRFMjAwMCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo1NDVDRUVCRTU2MTZFMzExQTk0QkI4RjU1ODI5RDA3OSIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSI1RjE4MkNDNzRGQjk3MzM1Nzc5MDk2RDlBRTRFMjAwMCIgZGM6Zm9ybWF0PSJpbWFnZS9qcGVnIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0iYzIiIHhtcDpDcmVhdGVEYXRlPSIyMDEzLTA5LTA1VDIzOjQwOjEyKzA1OjMwIiB4bXA6TW9kaWZ5RGF0ZT0iMjAxMy0wOS0wNVQyMzo0MjozNyswNTozMCIgeG1wOk1ldGFkYXRhRGF0ZT0iMjAxMy0wOS0wNVQyMzo0MjozNyswNTozMCI+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjUzNUNFRUJFNTYxNkUzMTFBOTRCQjhGNTU4MjlEMDc5IiBzdEV2dDp3aGVuPSIyMDEzLTA5LTA1VDIzOjQyOjM3KzA1OjMwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ1M2IChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD0iLyIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6NTQ1Q0VFQkU1NjE2RTMxMUE5NEJCOEY1NTgyOUQwNzkiIHN0RXZ0OndoZW49IjIwMTMtMDktMDVUMjM6NDI6MzcrMDU6MzAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDUzYgKFdpbmRvd3MpIiBzdEV2dDpjaGFuZ2VkPSIvIi8+IDwvcmRmOlNlcT4gPC94bXBNTTpIaXN0b3J5PiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8P3hwYWNrZXQgZW5kPSJ3Ij8+/+ICHElDQ19QUk9GSUxFAAEBAAACDGxjbXMCEAAAbW50clJHQiBYWVogB9wAAQAZAAMAKQA5YWNzcEFQUEwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPbWAAEAAAAA0y1sY21zAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAKZGVzYwAAAPwAAABeY3BydAAAAVwAAAALd3RwdAAAAWgAAAAUYmtwdAAAAXwAAAAUclhZWgAAAZAAAAAUZ1hZWgAAAaQAAAAUYlhZWgAAAbgAAAAUclRSQwAAAcwAAABAZ1RSQwAAAcwAAABAYlRSQwAAAcwAAABAZGVzYwAAAAAAAAADYzIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAdGV4dAAAAABGQgAAWFlaIAAAAAAAAPbWAAEAAAAA0y1YWVogAAAAAAAAAxYAAAMzAAACpFhZWiAAAAAAAABvogAAOPUAAAOQWFlaIAAAAAAAAGKZAAC3hQAAGNpYWVogAAAAAAAAJKAAAA+EAAC2z2N1cnYAAAAAAAAAGgAAAMsByQNjBZIIawv2ED8VURs0IfEpkDIYO5JGBVF3Xe1rcHoFibGafKxpv33Tw+kw////7gAOQWRvYmUAZEAAAAAB/9sAhAABAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAgICAgICAgICAgIDAwMDAwMDAwMDAQEBAQEBAQEBAQECAgECAgMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwP/wAARCAD6APoDAREAAhEBAxEB/90ABAAg/8QBogAAAAYCAwEAAAAAAAAAAAAABwgGBQQJAwoCAQALAQAABgMBAQEAAAAAAAAAAAAGBQQDBwIIAQkACgsQAAIBAwQBAwMCAwMDAgYJdQECAwQRBRIGIQcTIgAIMRRBMiMVCVFCFmEkMxdScYEYYpElQ6Gx8CY0cgoZwdE1J+FTNoLxkqJEVHNFRjdHYyhVVlcassLS4vJkg3SThGWjs8PT4yk4ZvN1Kjk6SElKWFlaZ2hpanZ3eHl6hYaHiImKlJWWl5iZmqSlpqeoqaq0tba3uLm6xMXGx8jJytTV1tfY2drk5ebn6Onq9PX29/j5+hEAAgEDAgQEAwUEBAQGBgVtAQIDEQQhEgUxBgAiE0FRBzJhFHEIQoEjkRVSoWIWMwmxJMHRQ3LwF+GCNCWSUxhjRPGisiY1GVQ2RWQnCnODk0Z0wtLi8lVldVY3hIWjs8PT4/MpGpSktMTU5PSVpbXF1eX1KEdXZjh2hpamtsbW5vZnd4eXp7fH1+f3SFhoeIiYqLjI2Oj4OUlZaXmJmam5ydnp+So6SlpqeoqaqrrK2ur6/9oADAMBAAIRAxEAPwDZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6//9DZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6//9HZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917rokKCzEKoBJJIAAH1JJ4AHv3XulFgtpbq3Oyrt7bmZy4c2WakoZvtf+DGslWOlCc/XXb2xNdW1t/b3CL9pz+zj1dIpZf7OMn8uhywPxc3/kWifNV+E29TuoaRRLJlK6MH+wIqcRU3lA+t5bD2TT8x2UdRDG8jfkB/PP8ulqbbO1NbKo/aehDj+I2PFvNvzJtxyIsLQx8/4FqqQgX9ojzO/lZL/vR/zdPja185j+wdN9d8R5wWOM3zqGk6FyOFUHVbgM9LVj03/IF/d05nH+iWf7G/zjqp2s/hm/aOgW3H0V2ftt5jJt2TM0kWthXYCVMgjxJf8AdNJ6K6L0i+koSPZtBvO3XFKXGhvRsfz4fz6SSWVzHX9Oo9Rn/Z6CIgq7xurxyxsUlikRo5YnU2ZJI3CvG6ngggEezTiAQajpL/h697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r//0tl73K/QT697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917pS7T2fuTfGVGH2vjJMjVqFeqmYmDH42FjxPkq5laKljKg6V9Ukh4RGPtPdXdtYxeNdOQlaADifsH+odOwwyTkrGp+3yB+fR5OvPjftPbC0+S3QIt3bgQpL/lcJGAoJRpa1DipNQqXRgf3anyMfqFT6ewZf7/dXWqO2PhQfL4iP6R8vsFPnXo3ttvSEKZjrlH7K/IdGNiijhjSKGOOKKNQqRxIscaKPoqIoCqo/oB7I8murJPRhw4dZPfuvde9+691737r3XvfuvdA72V0xtnsKF6kwxYnPqCY8xSQokszHnTXBQv3S3/LXYf19mm37tc2LBQdUH8J/yenSW4tIpxUij+o6Itv/AKi3j12GrMrR/e4LXoGdoFaSkgJbSi5FAC9D5Dwrt+2TxqB49jCw3a0vxRGKTV+FsE/Z69Es9pNb5YVT1H+X06DD2Z9J+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r/9PZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3XuhR6s6sy/Z2Xkghkkxm3cdIi5zO+MOY3dQ64vGK4MdRlpoyGN7x08bB3uSiMV7ruabdGFADXLAEDyA9W/yD16et7V7xtK4g82HrXK/b1ZLtXaeA2Zh6bB7cx0ONoKcXKp656qZh+5V11S15qysmIu0jkt+BYAAAGe4uLuU3F1IWmPGpr+XQjjjSJdCLRelJ7a6v1737r3Xvfuvde9+691737r3Xvfuvde9+691hqKeCqgmpqmGKpp543hnp540mgnhkUpJFNFIGjlikQkMrAgg8+/VYZQ0YcOtEAggio6IL3d0SdnpVbw2fDLJtYMZMvhF1TS7cVjzW0LeqSXBgn9xDd6Uci8V/GMtn3o3BW0vCPGpRW/i+R+fp6+fRPeWXhjxIR2+Y9Oiy/wC2P+I5B/1vYk49FnXve+vde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvdf/9TZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917pwxOJr8/lsXgcVGsmSzVfT4yiV7aFnqW0+aQkgCKliDSyc/5tG9tzTRW8Uk89fCRSTTifkPtNB1rw3mIhjPc3+Dz6tg2XtHFbH23itt4dAKTHU4V5iiiaurZD5K3JVLC5eqrahmdzc2vYcAARnc3Et3PLcTGrsf2DyA+Q6FEEKQRJFGKIB/s9Kr2x071737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XvfuvdYpoYp45Ipo45YpUeKWKVBJFLHIpSSOWNgVkjdGIIIIIPvwxkcevevVXPb2wh15vatw9KjjCZCL+M7eZzcpjqiVlmxwNyW/hFUDEL8+Joyfr7kXab366yjkY/qr2t9o4H8x/g6Dt5B4Ez0WkZOP83QYezLpL1737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691/9XZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917ox/xewEWV7DrcvOhaPbGClqKe66o/wCIZeY0ELi/CyQ0cdRYjn1+w9zJMUs4oQcyPn7Fz/h6Xbaga6Zz+FMfaT1YWBbgewT0fde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+690Vb5XYCOr2fg9xov8AlGAzsVNIyjk0GcjNLKrMOdCVsMDWPHHsQctTlL6aCvbJH/MZFPnx/b0W7nHqgSQH4W/w46Id7G/RL1737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691//W2Xvcr9BPr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6Op8RqYCg35WkAu+VwtErf2hHT4+apZb/0LVd/YO5nJ+os18tBP7Sf83RxtdNEvrq/ydHG9hno0697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917oHe/qUVXUW9gVDGmx1PXxE/2ZaDI0dUGH+1ARG3sz2Wn72sKmg1/wCEU/y9JL5dVpOPl1WP+T/r+5E+3j0HvM+nXvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3X/9fZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917o8PxH/497e3/AIc9Hb/zx0XsG80A/VWn/NL/AJ+bo42v+zl/03+To3PsNdGnXvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XvfuvdBZ3dx1L2B/X+7Vf/vCj/iT7MNp/5Kdj/wA1V/w9Jrz/AHFn/wBKequPckHift6DfXveut9e9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3X//Q2Xvcr9BPr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6Ov8RZb4zfsFjePNYWbn6fv4ySPgf1H2/sHcz1+otD5eGR/M/5+jjayNEw86j/B0cP2GejTr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xugi75kEXUO+2/wBVh1h4sD/lFbSQAXP9TJ7MNpxudkf+GDpLenTaTn5dVhe5H/w9B3zI697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6/9HZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917o4HxHqCuQ35R34em29Vhb83V8nASB/SzD2E+aFOqxfyow/mOjTajU3ApnHR2vYU6OOve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6Ar5IVPg6j3Clx/ldVg6Mi/wBVlzVCzAf1OmMn/YezXZI/E3WzzwJP/GT0j3DNnMPUD/D1W17kLoPde9+631737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvdf/9LZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917o0fxOmC723XTFuZtq0lQFuL2psuqFrfWwNUB7DXM4/xe0P8ATb/AOjHbK+NL6aB/h6Pv7BvR31737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Rb/lNOIur1jLBfut0YCAAsF1aZKipIF/1G1Pe3s65dUHdKnyRj+wf7PSDcmpbUI4sP8/8Ak6r19j3oi697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6//T2Xvcr9BPr3v3Xuve/de697917r3v3Xuve/de697917r3v3XusU7mOGaRbao4pHW/IuqFhcf0uPfhxHXurUusdibV2lt3Cz4PFUcVfVYWgeuzXiR8pk2q6anqqh6qvYGeWKaeziO4jWw0qAB7jK9uZ7m4lM0hIDGg8h9g6ElvDFEitGgDMoqfM9Cb7S9KOve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6Z85gMLuOhOOz2Kx+ZoS4l+0yNLDVwiVVZFmRJlYRzIjsFdbMLmx92jllglSaGUo6+YND+3qrIkg0uoK9VVb+w1DtzfW78Bi9QxuIztVSUKPIZXgpjHDUpTNKxLuKUzmNSxLaVFyTc+5LsJZJ7K2mlp4jpU0FPMjh86VPzPQauFRJ5VRaKG4dJL2q6a697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuv/1Nl73K/QT697917r3v3Xuve/de697917r3v3Xuve/de697917rplV1ZGF1ZWVh/VSCCP9iPfuvAVx1af03lnzfV2yK+Vw8xwNJSTNcE+XG6sdIDb6MGpefcbbnD9PuF5FigkPDhnP+XoSWrFraEnjp/wY6Ez2h6Ude9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+6910SACSQAOSTwAByST+APeiacevdU/7kyjZ3cu5M29tWX3BmMhccgpPXz+Ag/kfbqgH+A9yhaRmG1tojxWMD/L0FXbXJK/mWP+Hpm9qOq9e9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3X/9XZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de69791rqwn4uZH7rrV6EvqfEblzNIUN7pDVtDlYLD/UkVxA/wBb2BeY4li3N9P4kUnzFSKGh/Lo/wBuk8S3ofiUkdGR9kXS7r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuk1vLJphtpbnyrv4xj8Bl6sP/R4KGd47f4mQAD/AB9uQxmWaKMAnUwFBxyadNzOqRSOxooB6qFgDCCEP+sRRh/+D6Rr/wBu1/cpkgk06CwwAPPrL791vr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6//9bZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917owvx97Podh5mvweZiqHxe7azER01TTIsn8OzPlXFxPVI8sdqGrhqI1d11MhiBsQeA9v+3vcQxXENA0dRQ+Y+LFAeGeNB0usbpIBIki0UkUPz6sUF/wA2/wBh7BPR9137917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917oqHyT7PocdiMj1pRQ1EmazlBQTZCr0otFQYWoq3aWMSiTyyV9YlEyCMJpWN9Zb6AiHYLCSa4hvyaW8bVB8yRwA+XqeizcrhBFJbCpkYD8hX+fRFf8Aef8AX9jWgqSBx6JvMnrr3vr3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691//19l73K/QT697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3XuumeWMeWAlZ4WSenYfVaiBhLAwvwCsyKfeiutXT+IEftFP8vXscTwGf2dW+7WzUW4tt4HPQsrpl8RjsiNBuqtV0sUsiX/rHIzKf8R7i2WJoZZIW+JGI/YadCmNxJGjjgQD0/e2+r9e9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XR/417917qq3t7ODcXZ288ijrJBFljiKWRTdXpcJDHjRp/2k1EEh/wCQvci7PD9PttrHQgldR/2xJ/wU6Dd45kuZSSCAaD8ug49mXSfr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r/0Nl73K/QT697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuvf8a/3g39+6969WE/F/ci5frxsHLIrVe0snU43xgWK42tY5LFufrcaJ5Iwf8Am0R+PYF5htjDuLS0osqhvt8j/g6PtvkDwBPNf9Q6Mj7Iul3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+690l967jh2jtPcG5ahlWPDYqsrF1C+uoSIrRwgcAmardEH+Le37aA3VxDbrxdgPyPE/kM9Ukfw43f0HVRgaV7yVDa6iV3mqJP+OlRM7Szyfk/uTOzf7H3J9FUKq/CAAPsHDoKhWSqtx6797631737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691//9HZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuhp6G35FsfflOmRm8OD3RFFhMnK7aYaOr82vDZGW7KiRx1chgdjwqT6jwp9k2+2cl3Za41rJDn56TxHr86dK7GZYZ9LfC/8qZ6swBv/AL78+wD0Ieu/fuvde9+691737r3Xvfuvde9+691737r3XvfuvdePAv7917om3yn35D9vjevMfMGnmlps3uTxtfwUkDF8PjptLECStqR9wyMLiOBT9HHsUcuWTM77g6/prVV+bHiR/pR6evy6KNzn+CBeNan5f8X0S72L+ioktljnr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuv/S2Xvcr9BPr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917rplVlZHAZGUq6n6MpBBU/1BHv3DPXqBu1uHVlnx63LktzdZ4ubKzvV1mJrchgWq5WLz1NPjJVWjkqHPMk60ksaMx5YrqPJPuPN5gS33CZY10o1Gp6VzT8uhBYSvLbI0h7qkfsPQ3+yvpZ1737r3Xvfuvde9+691737r3Xvfuvde9+6902ZqvOKw+VyYRZP4dja+v0NfS/2dLLUBG0+rS3jsbc292RfEdI/wCIgft60xorH0HVQNZla/O1dVm8rUyVmTzE75KuqpTd5aip9Z44CRQoRHGg4SNVUcAe5RhiSCGKCJNKKKU+fmft6CrM0jF2NWPHqN7c611737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3X/9PZe9yv0E+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuux/j79WmevDj1Yv8ZaQ0vVOPkOr/L8zn6xSVtdTkZKZSD/AGgRTfX8+wDzAf8AdrMAQaKo/kD0f7cum0jqckk/zPRgvZN0t697917r3v3Xuve/de697917r3v3Xuve/de6as5TGtwmYo1/VV4rIUw4vzPSTRDj88v7sjaJEf0IPWmBZWUcSOqdadSkEKH6xxJG3/BoxoP+8r7lUmufXP7egmPQevWX37rfXvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvdf/U2Xvcr9BPr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917rxNgT/QE/7bn3scQfn1omgJ9OrSOk6Fsd1RsSmddLtgKascW/tZF5cgx/2Jqb+413NmfcLxm+LxG/kadCSzUrawA0rpr+3PQpe0PSnr3v3Xuve/de697917r3v3Xuve/de697917ro+6tWhp17qnrOULYzPZ/GuArY/PZqj0j+ytPk6qNF/2CAe5Ut38S3t5K8Y1P8h0FGoHcDgGP+Hpr9u9a697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r//1dl73K/QT697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6GbqPp1+2BnJJM7JgcdhpaWjnkgoErauqqK2CWbTTNPLHTwpBEgLFlkJLiwsPZPuu7fuwwxrEHkcVyaac4x59K7W0+qVyZNIU+QrX/N1ZHh8bFh8TjMRAzPBi6Cjx0Dvp1vDRU8dNE7hVVQ7JECbAC/09gJ3eSSSVz3sxJ+0mvR+qhFVRwAp04+69W697917r3v3Xuve/de697917r3v3Xuve/de697917okHd/RSYyDePZuNz8sivWS53JYKqoYgiLVTwR1X2FdA8bIsbyGUiWN+LjV9PYs2feiWs9ulhFK6Q9fLyxw+XHopvLIATXCua0rSn+XoonsV9FHXvfut9e9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvdf/W2Xvcr9BPr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de69791rqwn4t4Y4/raTKyRGOXcWeyeQRz9ZKOkaPFUjAfhT9i5H9dXsCcwy+JuLIGqEUD7MVP+Ho92yMpbEnizE9GR9kfRh1737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XvfuvdJjeuFXce0dy4Ip5DlcHk6KNPyZ5qSUU5H+In0n27bymG5t5ge1XBP5GuOqSKHjdDwIPVRMWvxp5RplChZVIsVlUaZUIP0KSAg/4j3KVQ1GX4DkfZ0FFNRxz1z9+6t1737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691//19l73K/QT697917r3v3Xuve/de697917r3v3Xuve/de697917r3/ABHP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nadbVbRrDdlpUD5TBubE6PsKmVamjVmN/wBiZQt+F/HsQWvMd5E3+Nos6/PtP7V9PKoPz6LptrgkOpSVav5fs6KxvDpfsTZXmnyGEfLYqLU38Z295cnSLCv+7qqkWNclQjn+3GyD/Vn2IrTedvu+0TaZv4WwST5A8K/LHRbNZ3EALOoKeoz+0eXQVK6OCyMrqGKkqQQGH1U2JsR+R+PZpw014kV/LpMGBpQ8euXv3W+ve/de6//T2h9o7L3NvvJnE7WxrV88Whq2rkf7fF4uJwSs2Rr2Vo4dSglY1DTSW9KH3JlzfWtlCJ7iQAHgPM/lxFPMnHQWjhmnYrAleOfw4/1Y9ejs7D+M20tviGv3dIN4ZddEn29RGYNvUkq6WtT4zUWrtDCweqaQEchF+nsI3nMF3cBo7f8AShPp8RHzPl/tadG0O1wpQzMZH+fD9g4/n0ZKCmp6WGKmpoIaengUJDBBEkMMKKLKkUUarHGqj6AAAeyIkklmYlifPoyAAAA4dZveut9e9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XvfuvddWHv3Xugc330ZsPfRmq5scMJnJBdc7gxHR1byANpNdTBfsskmprkSoXIHDj6+zOx3e9sKJG+uCvwNlfy4EfKhA86HpLNZ281SUpIRxHH5dEe7F6d3f1sz1WQiTLbd8mmHcmNjcU0KsbRpl6RjJNipmuBqYtTsfpIDx7GG37rb7i3hxkLcfwHifUhuFBQ8aE+Q6JZ7S4tzUrqj/iH+UeXQV8f1/wB9/t/p7NP89P8AV8/l0mr1/9TfX2vtbB7Pw1Lgdv0EOPx1IDpijF5J5WA8tXVzteSrrKgi7yuSzH/AAe3J5ZbmR5Z5C7txr1SOOOFFjiUKg8h0ofbfV+ve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6xTwQ1MUsFRFHPBPFJDNBMiywzQyqUlilicFJI5EJDKwIINj718xhuvfLy6BP/Zdupf+eUh/4uf8U/4GVv8A56f+BH/Fh/6Y/wDNezP987p/ylH4NP5ev2/Pj8+k30Vp/vkfz/z9f//V3+Pfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691//9bf49+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3X//2Q==";
					  $('#add_guest_btn').attr('disabled',false).html('Add Guest');

					  if(resp['img'].length==0){
						  resp['img']="assets/uploded_img/hotel_guest/thumb/profile_thumb_m.jpg";
				      }
				      
					  $('#guest_list_body').prepend('<tr><td style="display:none;" class="id">'+resp['id']+'</td><td>'+resp['room_no']+'</td><td><img onclick="show_main_img('+resp['id']+')" alt="" src='+resp['img']+' style=" width: 50px; height: 50px;"></td><td><strong>'+resp['name']+'</strong><br/>'+resp['age']+'&nbsp;|&nbsp;'+resp['sex']+'&nbsp;|&nbsp;'+resp['nationality']+'</td><td>'+resp['mobile']+'</td><td>'+resp['comming_from']+'</td><td>'+resp['going_to']+'</td><td>'+resp['id_type']+'</td><td>'+resp['id_no']+'</td><td>'+readable_format_date_without_time(resp['date_arrival'])+'</td><td class="button_td"><button class="update_date_deparature btn btn-mini" type="button">Checkout</button></td></tr>');
					  $("#guest_list_body tr:first").addClass('alert-success');
					  
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
	})
	
		function get_hotel_guestlists(date){
		$('#guest_list_head').html('<p class="loading_img"><img alt="loading" src="<?php echo URL;?>assets/apps/img/loading.gif"/ style=" margin-left: 100px; "></p>');
		$.ajax({
			url: '<?php echo URL;?>hotel_service/get_hotel_guestlists_day/',
			dataType: 'JSON',
			type: 'POST',
			data: {day:date},
			success: function(resp){
				$('#guest_list_body,#guest_list_head').empty();
				$('#guestlistDate').text('Received guestlist for '+readable_format_date_without_time(date));
				$('#guest_list_head').append('<tr>'
						+'<th class=""><strong>Room No.</strong></th>'
						+'<th class="" style="width:50px;"><strong>Photo</strong></th>'
						+'<th class=""><strong>Name</strong></th>'
						+'<th class=""><strong>Mobile No.</strong></th>'
						+'<th class=""><strong>Comming From</strong></th>'
						+'<th class=""><strong>Going To</strong></th>'
						+'<th class=""><strong>Id Type</strong></th>'
						+'<th class=""><strong>Id No</strong></th>'
						+'<th><strong>Check In Date</strong></th>'
						+'<th class="" style="width: 120px;"><strong>Check Out Date</strong></th></tr>');
				if(resp.length==0){
					$('#guest_list_body').append('<tr><th colspan="11"><h4 class="alert alert-error">Guest List Not Submitted</h4></th></tr>');
				}
				else{
					
					for(var i in resp){
						if(today==date){
							if(resp[i].check_out_status == 0){
								$('#guest_list_body').append('<tr><td style="display:none;" class="id">'+resp[i].id+'</td><td>'+resp[i].room_no+'</td><td><img onclick="show_main_img('+resp[i].id+')" alt="" src='+resp[i].image_url+' style=" width: 50px; height: 50px;"></td><td><strong>'+resp[i].name+'</strong><br/>'+resp[i].age+'&nbsp;|&nbsp;'+resp[i].sex+'&nbsp;|&nbsp;'+resp[i].nationality+'</td><td>'+resp[i].mobile+'</td><td>'+resp[i].comming_from+'</td><td>'+resp[i].going_to+'</td><td>'+resp[i].id_type+'</td><td>'+resp[i].id_no+'</td><td>'+readable_format_date_without_time(resp[i].date_arrival)+'</td><td class="button_td"><button class="update_date_deparature btn btn-mini" type="button">Checkout</button></td></tr>');
							}
							else{
								$('#guest_list_body').append('<tr class="alert"><td style="display:none;" class="id">'+resp[i].id+'</td><td>'+resp[i].room_no+'</td><td><img alt="" src='+resp[i].image_url+' style=" width: 50px; height: 50px; "></td><td><strong>'+resp[i].name+'</strong><br/>'+resp[i].age+'&nbsp;|&nbsp;'+resp[i].sex+'&nbsp;|&nbsp;'+resp[i].nationality+'</td><td>'+resp[i].mobile+'</td><td>'+resp[i].comming_from+'</td><td>'+resp[i].going_to+'</td><td>'+resp[i].id_type+'</td><td>'+resp[i].id_no+'</td><td>'+readable_format_date_without_time(resp[i].date_arrival)+'</td><td class="button_td"><span class="checkedout">Checked out</span> <br/>on '+readable_format_date(resp[i].last_update_time)+'</td></tr>');
							}
						}
						else{
							if(resp[i].check_out_status == 0){
								$('#guest_list_body').append('<tr><td style="display:none;" class="id">'+resp[i].id+'</td><td>'+resp[i].room_no+'</td><td><img onclick="show_main_img('+resp[i].id+')" alt="" src='+resp[i].image_url+' style=" width: 50px; height: 50px;"></td><td><strong>'+resp[i].name+'</strong><br/>'+resp[i].age+'&nbsp;|&nbsp;'+resp[i].sex+'&nbsp;|&nbsp;'+resp[i].nationality+'</td><td>'+resp[i].mobile+'</td><td>'+resp[i].comming_from+'</td><td>'+resp[i].going_to+'</td><td>'+resp[i].id_type+'</td><td>'+resp[i].id_no+'</td><td>'+readable_format_date_without_time(resp[i].date_arrival)+'</td><td></td></tr>');
							}
							else{
								$('#guest_list_body').append('<tr class="alert"><td style="display:none;" class="id">'+resp[i].id+'</td><td>'+resp[i].room_no+'</td><td><img alt="" src='+resp[i].image_url+' style=" width: 50px; height: 50px; "></td><td><strong>'+resp[i].name+'</strong><br/>'+resp[i].age+'&nbsp;|&nbsp;'+resp[i].sex+'&nbsp;|&nbsp;'+resp[i].nationality+'</td><td>'+resp[i].mobile+'</td><td>'+resp[i].comming_from+'</td><td>'+resp[i].going_to+'</td><td>'+resp[i].id_type+'</td><td>'+resp[i].id_no+'</td><td>'+readable_format_date_without_time(resp[i].date_arrival)+'</td><td class="button_td"><span class="checkedout">Checked out</span> <br/>on '+readable_format_date(resp[i].last_update_time)+'</td></tr>');
							}
						}

					}
				}
			}			
		});
	}

	$("#guest_list_body").on("click", ".update_date_deparature", function() {
		var id = $(this).closest("tr").find(".id").text();
		update_date_deparature(id);
		$(this).closest("tr").addClass('alert');
		$(this).closest("tr").find(".button_td").html('<span class="checkedout">Checked out</span>');
	});	

	function update_date_deparature(id){
		$.ajax({
			  url: '<?php echo URL;?>hotel_service/update_date_deparature/',
			  type:'POST',
			  data:{id:id},
			  dataType:'JSON',
			  success: function(resp){
			  }
		});
	}

	function show_main_img(id){
		var path = '<?php echo URL;?>assets/uploded_img/hotel_guest/'+id+'.jpg';
		$.ajax({
			url: '<?php echo URL;?>assets/uploded_img/hotel_guest/'+id+'.jpg',
			success: function(data){
				console.log(data.length);
				if(data.length>9186){
			    	//alert('exists');
					$('#main_img_modal').html('<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style=" margin-bottom: -26px;">&times;</button><img class="container" style="max-height:450px;"  src='+path+'>');
					$('#main_img_modal').modal('show');
				}
				else{
					//image not exist
				}
			}			  
		})
	}
	
	function readable_format_date(date){
		//date formate has to be in yyyy-mm-dd hh:mm:ss
		var y=date.split(" ");
		var year = y[0];
		var time = y[1];
		var n=year.split("-");
		var month='';
		if(n[1] == '01'){month= "Jan";}
		else if(n[1] == '02'){month= "Feb";}
		else if(n[1] == '03'){month= "Mar";}
		else if(n[1] == '04'){month= "Apr";}
		else if(n[1] == '05'){month= "May";}
		else if(n[1] == '06'){month= "Jun";}		
		else if(n[1] == '07'){month= "Jul";}
		else if(n[1] == '08'){month= "Aug";}
		else if(n[1] == '09'){month= "Sep";}
		else if(n[1] == '10'){month= "Oct";}
		else if(n[1] == '11'){month= "Nov";}
		else if(n[1] == '12'){month= "Dec";}
		var d=n[2]+' '+month+', '+n[0]; 
		return d+' '+time;
	}

	function readable_format_date_without_time(date){
		//date formate has to be in yyyy-mm-dd
		var n=date.split("-");
		var month='';
		if(n[1] == '01'){month= "Jan";}
		else if(n[1] == '02'){month= "Feb";}
		else if(n[1] == '03'){month= "Mar";}
		else if(n[1] == '04'){month= "Apr";}
		else if(n[1] == '05'){month= "May";}
		else if(n[1] == '06'){month= "Jun";}		
		else if(n[1] == '07'){month= "Jul";}
		else if(n[1] == '08'){month= "Aug";}
		else if(n[1] == '09'){month= "Sep";}
		else if(n[1] == '10'){month= "Oct";}
		else if(n[1] == '11'){month= "Nov";}
		else if(n[1] == '12'){month= "Dec";}
		var d=n[2]+' '+month+', '+n[0]; 
		return d;
	}

	function get_hotel_ps_name(){
		$.ajax({
			url: '<?php echo URL;?>hotel_service/get_hotel_ps_name/',
			type: 'POST',
			dataType: 'JSON',
			success: function(data){
				console.log(data);
				$('#hotel_ps_name').text(data[0]['ps_name']);
			}		
		});
	}
</script>