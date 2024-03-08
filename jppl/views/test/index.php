<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <title>Internal portal</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Crimatrix is a community powered real-time crime monitoring platform for the police department to harness the power of crowd to monitor and prevent crimes in the city.">
        <meta name="author" content="">

        <link rel="shortcut icon" href="<?php echo URL; ?>assets/bootstrap/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo URL; ?>assets/bootstrap/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo URL; ?>assets/bootstrap/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo URL; ?>assets/bootstrap/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo URL; ?>assets/bootstrap/ico/apple-touch-icon-57-precomposed.png">


        <script src="<?php echo URL; ?>assets/jquery/js/jquery.js"></script>
        <script	src="<?php echo URL; ?>assets/jquery/js/jquery-ui.min.js"></script>
        <script src="<?php echo URL; ?>assets/bootstrap/js/bootstrap.js"></script>
        <script src="<?php echo URL; ?>assets/apps/js/site_analitics.js"></script>

        <link href="<?php echo URL; ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">

        <link href="<?php echo URL; ?>assets/apps/css/crimatrix.css" rel="stylesheet">

        <link href="<?php echo URL; ?>assets/bootstrap/css/bootstrap-responsive.css"	rel="stylesheet">
        <link href="<?php echo URL; ?>assets/jquery/css/jquery-ui.min.css" rel="stylesheet">



        <script type="text/javascript" src="<?php echo URL; ?>assets/apps/js/jquery.form.js"></script>
        <script>
            window.onload = function() {

                upload_image_events();
            };

            function upload_image_events() {
                //elements
                var progressbox = $('#progressbox');
                var progressbar = $('#progressbar');
                var statustxt = $('#statustxt');
                var submitbutton = $("#SubmitButton");
                var myform = $("#UploadForm");
                var output = $("#output");
                var completed = '0%';

                $(myform).ajaxForm({
                    beforeSend: function() { //brfore sending form
                        submitbutton.attr('disabled', ''); // disable upload button
                        statustxt.empty();
                        progressbox.show(); //show progressbar
                        progressbar.width(completed); //initial value 0% of progressbar
                        statustxt.html(completed); //set status text
                        statustxt.css('color', '#000'); //initial color of status text
                    },
                    uploadProgress: function(event, position, total, percentComplete) { //on progress
                        progressbar.width(percentComplete + '%') //update progressbar percent complete
                        statustxt.html(percentComplete + '%'); //update status text
                        if (percentComplete > 50)
                        {
                            statustxt.css('color', '#fff'); //change status text to white after 50%
                        }
                    },
                    complete: function(response) { // on complete
                        output.html(response.responseText); //update element with received data
                        myform.resetForm();  // reset form
                        submitbutton.removeAttr('disabled'); //enable submit button
                        progressbox.hide(); // hide progressbar
                    }
                });
            }

        </script> 
        <link href="<?php echo URL; ?>assets/apps/css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>

        <form action="<?php echo URL; ?>test/upload_image" method="post" enctype="multipart/form-data" id="UploadForm">
            <table width="500" border="0">
                <tr>
                    <td>File : </td>
                    <td><input name="ImageFile" type="file" /></td>
                </tr>
                <tr>
                    <td>Your Name : </td>
                    <td><input name="username" type="text" id="username" value="Jack Sparrow" /></td>
                </tr>
                <tr>
                    <td>Location</td>
                    <td><input name="userlocation" type="text" id="userlocation" value="Troubadour" /></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit"  id="SubmitButton" value="Upload" /></td>
                </tr>
            </table>
        </form>

        <div id="progressbox"><div id="progressbar"></div ><div id="statustxt">0%</div ></div>
        <div id="output"></div>


    </body>
</html>

