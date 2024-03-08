<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!-- Wrap all page content here -->
<div id="wrap">

    <!-- Begin page content -->
    <div class="container">
        <div class="page-header">
            <h3>Message Board <small class="pull-right" id="new_message">New Message</small></h3>
        </div>

        <div class="col-md-12">
            
            <div class="row" id="messages">

            </div>	
        </div>

    </div>
</div>

<script>
    window.onload = function() {
        getlastmessages();
    };
    function getlastmessages() {
        $('#messages').empty();
        $('#messages').css('border', 0).append('<div class="col-md-12"><p style="text-align: center;"><i class="fa fa-spinner fa-spin"></i></p></div>')
        for (var i = 0; i < 10; i++) {

            var content = '<div class="col-md-6 card">'
                    + '<div class="col-md-4" style="padding-left: 5px;">'
                    + '<img onclick="openModal(' + i + ');" style="width:80px; height: 80px; cursor: pointer;" src=' + i + '>'
                    + '</div>'
                    + '<div class="col-md-8">'
                    + '<strong>Offices Name</strong> <br>'
                    + '<lable>Designation<lable> <span class="glyphicon glyphicon-arrow-right"></span> '
                    + '<lable>Police Station<lable><br>'
                    + '<lable>Messages<lable>'
                    + '</div></div>';
            $('#messages').prepend(content);
        }


    }
</script>