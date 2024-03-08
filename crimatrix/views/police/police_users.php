<div class="container">
    <div class="row-fluid">
        <h4 class="span2 pull-left">Police User</h4>
        <select class="city_id span2" id="filter_city_id" onchange="filter_city_id();">
            <option value="1">Guwahati</option>
        </select>
        <select class="ps_id span2"  onchange="filter_ps_id();" id="filter_ps_id"></select>
        <div class="span6 input-append pull-right">
            <div class="pull-right">
                <input id="search_police" type="text" class="row" placeholder="Search by name">
                <button class="btn" type="button" onclick="search_police();">
                    <i class="icon-search"></i>&nbsp;Search
                </button>
                <a href="#addUserModal" role="button" class="btn btn-primary"	data-toggle="modal"><i class="icon-white icon-user"></i>&nbsp;New User</a>
            </div>
        </div>	
    </div>
    <div class="row-fluid">
        <table
            class="table table-bordered table-striped responsive-utilities">
            <thead>
                <tr>
                    <th>Sl. no</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Designation</th>
                    <th>Police Station</th>
                    <th>Mobile</th>
                    <th>Web Users</th>
                    <th>SMS Users</th>
                    <th>Reset</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody id="user_table">
            </tbody>
        </table>
    </div>
</div>

<div id="addUserModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 id="myModalLabel">Add Police User</h3>
    </div>
    <div class="modal-body">
        <form action="" id="create_police_user_form">
            <div class="span3">
                <label>Name</label>
                <input class="input-block-level" type="text" name="name" required="required" id="addUserName">
                <label>Email</label>
                <input class="input-block-level" type="email" name="email" required="required" id="addUseremail">
                <label>Mobile</label>
                <input class="input-block-level" type="text" name="mobile" required="required" id="addUserMobile">
                <label>Role</label>
                <select class="input-block-level" name="role" disabled="disabled">
                    <option value="user">User</option>	  			
                </select>
            </div>
            <div class="span3">
                <label>Designation</label>
                <input class="input-block-level" type="text" name="designation">
                <label>City</label>
                <select class="input-block-level" name="city_id">
                    <option value="1">Guwahati</option>
                </select>
                <label>Police Station</label>
                <select class="ps_id input-block-level" name="ps_id"></select>
                <br>
                <label class="checkbox inline">
                    <input type="checkbox" name="sms_users"> SMS User 
                </label>				
                <label class="checkbox inline">
                    <input type="checkbox" name="web_user"> Web User
                </label>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button type="button" class="btn btn-primary" id="create_police_user_btn" onclick="create_police_user();">Create</button>
    </div>
</div>


<div id="edituserModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="cancel_submitUserinfo();">&times;</button>
        <h3 id="myModalLabel">Edit User Details</h3>
    </div>
    <div class="modal-body row">
        <form action="" id="edituserdetails_form">
            <div class="span2">
                <input type="hidden" id="user_type" name="user_type">
                <input type="hidden" id="profile_id" name="profile_id">
                <label>Name</label>
                <input class="input-block-level" type="text" id="user_name" name="name">
                <label>Email</label>
                <input class="input-block-level" type="text" id="user_email" name="email">
                <label>Mobile</label>
                <input class="input-block-level" type="text" id="user_mobile" name="mobile">
            </div>
            <div class="span3">
                <label>Designation</label>
                <input class="input-block-level" type="text" name="designation" id="user_designation">
                <label>City</label>
                <select class="city_id input-block-level" name="city_id" id="user_city_id">
                    <option value="1">Guwahati</option>
                </select>
                <label>Police Station</label>
                <select class="ps_id input-block-level" name="ps_id" id="user_ps_id"></select>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true" onclick="cancel_submitUserinfo();">Close</button>
        <button class="btn btn-primary" type="button" onclick="submitUserinfo();" id="submitUserinfo_btn">Save changes</button>
    </div>
</div>

<script type="text/javascript">
                    var search_query = '0';
                    $('#setting_dropdown_li').addClass('active');
                    window.onload = function() {
                        get_all_ps();
                        //get_all_city();
                        get_police_users();
                    };

                    /*
                     function get_all_city(){
                     $.ajax({
                     url: '<?php //echo URL; ?>user_service/get_all_city/',
                     type: 'POST',
                     dataType: 'JSON',
                     success: function(data){
                     for(var i in data){				
                     $('.city_id').append($('<option value="'+data[i].id+'">'+data[i].name+'</option>'));
                     }
                     }		
                     });
                     }
                     */

                    function get_all_ps() {
                        $.ajax({
                            url: '<?php echo URL; ?>user_service/get_all_ps/',
                            type: 'POST',
                            dataType: 'JSON',
                            success: function(data) {
                                $('.ps_id').empty();
                                $('.ps_id').append('<option value="0">All</option>');

                                for (var i in data) {
                                    $('.ps_id').append($('<option value="' + data[i].id + '">' + data[i].name + '</option>'));
                                }
                            }
                        });
                    }

                    function search_police() {
                        search_query = $('#search_police').val();
                        get_police_users();
                    }

                    function get_police_users() {
                        $('#user_table').html('<p class="loading_img"><img alt="loading" src="<?php echo URL; ?>/assets/apps/img/loading.gif"/></p>');
                        $.ajax({
                            url: '<?php echo URL; ?>police_service/get_police_users/' + search_query,
                            dataType: 'JSON',
                            success: function(data) {
                                $('#user_table').empty();
                                var count = 1;
                                for (var i in data) {
                                    var sms_users = '<td></td>';

                                    var resetpass = '<td id=reset_' + data[i].id + ' class="resetpass"><a title="Click to Reset Password" class="label label-inverse">Reset</a></td>';
                                    var edit = '<td id=edit_' + data[i].id + ' class="edituser"><a title="Click to Edit" class="label label-important">Edit</a></td>';

                                    if (data[i].sms_users == 0) {
                                        sms_users = '<td class="sms_is_disable"  id="sms_' + data[i].id + '"><a href="#" class="label">Disabled</a></td>';
                                    } else {
                                        sms_users = '<td class="sms_is_enable"  id="sms_' + data[i].id + '"><a href="#" class="label label-success">Enabled</a></td>';
                                    }
                                    var web_user = '';

                                    if (data[i].status == 0) {
                                        web_user = '<td class="web_is_disable"  id="web_' + data[i].id + '"><a href="#" title="Click to Enable" class="label">Disabled</a></td>';
                                    }
                                    else if (data[i].status == null) {
                                        web_user = '<td class="web_to_add" id="add_to_web_' + data[i].id + '"><a href="#" title="Click to Add" class="label">Add Web User</a></td>';
                                    }
                                    else {
                                        web_user = '<td class="web_is_enable"  id="web_' + data[i].id + '"><a href="#" title="Click to Disable" class="label label-success">Enabled</a></td>';
                                    }
                                    $('#user_table').append('<tr><td class="id hidden">' + data[i].id + '</td><td>' + count + '</td><td class="name">' + data[i].name + '</td><td class="email">' + data[i].email + '</td><td>' + data[i].designation + '</td><td>' + data[i].ps_id + '</td><td class="mobile">' + data[i].mobile + '</td>' + web_user + '' + sms_users + resetpass + edit + '</tr>');
                                    count = count + 1;
                                }
                            }
                        });
                    }


                    function filter_ps_id() {
                        var ps_id = $('#filter_ps_id').val();
                        $.ajax({
                            url: '<?php echo URL; ?>police_service/get_filter_police_users_by_ps_id/',
                            type: 'POST',
                            dataType: 'JSON',
                            data: {'ps_id': ps_id},
                            success: function(data) {
                                $('#user_table').empty();
                                var count = 1;
                                for (var i in data) {
                                    var sms_users = '<td></td>';

                                    var resetpass = '<td id=reset_' + data[i].id + ' class="resetpass"><a title="Click to Reset Password" class="label label-inverse">Reset</a></td>';
                                    var edit = '<td id=edit_' + data[i].id + ' class="edituser"><a title="Click to Edit" class="label label-important">Edit</a></td>';

                                    if (data[i].sms_users == 0) {
                                        sms_users = '<td class="sms_is_disable"  id="sms_' + data[i].id + '"><a href="#" class="label">Disabled</a></td>';
                                    } else {
                                        sms_users = '<td class="sms_is_enable"  id="sms_' + data[i].id + '"><a href="#" class="label label-success">Enabled</a></td>';
                                    }
                                    var web_user = '';

                                    if (data[i].status == 0) {
                                        web_user = '<td class="web_is_disable"  id="web_' + data[i].id + '"><a href="#" title="Click to Enable" class="label">Disabled</a></td>';
                                    }
                                    else if (data[i].status == null) {
                                        web_user = '<td class="web_to_add" id="add_to_web_' + data[i].id + '"><a href="#" title="Click to Add" class="label">Add Web User</a></td>';
                                    }
                                    else {
                                        web_user = '<td class="web_is_enable"  id="web_' + data[i].id + '"><a href="#" title="Click to Disable" class="label label-success">Enabled</a></td>';
                                    }
                                    $('#user_table').append('<tr><td class="id hidden">' + data[i].id + '</td><td>' + count + '</td><td class="name">' + data[i].name + '</td><td class="email">' + data[i].email + '</td><td>' + data[i].designation + '</td><td>' + data[i].ps_id + '</td><td class="mobile">' + data[i].mobile + '</td>' + web_user + '' + sms_users + resetpass + edit + '</tr>');
                                    count = count + 1;
                                }
                            }
                        });
                    }

                    function filter_city_id() {
                        var city_id = $('#filter_city_id').val();
                        $.ajax({
                            url: '<?php echo URL; ?>police_service/get_filter_police_users_by_city_id/',
                            type: 'POST',
                            dataType: 'JSON',
                            data: {'city_id': city_id},
                            success: function(data) {
                                console.log(data);
                            }
                        });
                    }


                    $("#user_table").on("click", ".web_to_add", function() {
                        $(this).removeClass('web_to_add').addClass('web_is_enable');
                        var profile_id = $(this).closest("tr").find(".id").text();
                        var name = $(this).closest("tr").find(".name").text();
                        var email = $(this).closest("tr").find(".email").text();
                        var mobile = $(this).closest("tr").find(".mobile").text();
                        var user_type = 'police';
                        add_web_user(profile_id, name, email, mobile, user_type);
                    });


                    function add_web_user(profile_id, name, email, mobile, user_type) {
                        $.ajax({
                            url: '<?php echo URL; ?>police_service/add_web_user/',
                            type: 'POST',
                            dataType: 'JSON',
                            data: {'profile_id': profile_id, 'name': name, 'email': email, 'mobile': mobile, 'user_type': user_type},
                            success: function(data) {
                                if (data > 0) {
                                    document.getElementById('add_to_web_' + profile_id).innerHTML = '<a href="#" title="Click to Disable" class="label label-success">Enabled</a>';
                                }
                            }
                        });
                    }


                    $("#user_table").on("click", ".web_is_disable", function() {
                        var profile_id = $(this).closest("tr").find(".id").text();
                        var name = $(this).closest("tr").find(".name").text();
                        var email = $(this).closest("tr").find(".email").text();
                        var user_type = 'police';
                        var status = 1;
                        approve_web_user(profile_id, name, email, user_type, status);
                    });

                    $("#user_table").on("click", ".web_is_enable", function() {
                        var profile_id = $(this).closest("tr").find(".id").text();
                        var name = $(this).closest("tr").find(".name").text();
                        var email = $(this).closest("tr").find(".email").text();
                        var user_type = 'police';
                        var status = 0;
                        approve_web_user(profile_id, name, email, user_type, status);
                    });



                    function approve_web_user(profile_id, name, email, user_type, status) {
                        $.ajax({
                            url: '<?php echo URL; ?>police_service/change_account_status/',
                            type: 'POST',
                            dataType: 'JSON',
                            data: {'profile_id': profile_id, 'name': name, 'email': email, 'user_type': user_type, 'status': status},
                            success: function(data) {
                                if (data == 0) {
                                    document.getElementById('web_' + profile_id).innerHTML = '<a title="Click to Enable" class="label">Disabled</a>';
                                    $('#web_' + profile_id).removeClass('web_is_enable').addClass('web_is_disable');
                                }
                                else {
                                    document.getElementById('web_' + profile_id).innerHTML = '<a title="Click to Disable" class="label label-success">Enabled</a>';
                                    $('#web_' + profile_id).removeClass('web_is_disable').addClass('web_is_enable');
                                }
                            }
                        });
                    }


                    $("#user_table").on("click", ".sms_is_disable", function() {
                        var profile_id = $(this).closest("tr").find(".id").text();
                        var name = $(this).closest("tr").find(".name").text();
                        var mobile = $(this).closest("tr").find(".mobile").text();
                        var status = 1;
                        approve_sms_user(profile_id, name, mobile, status);
                    });

                    $("#user_table").on("click", ".sms_is_enable", function() {
                        var profile_id = $(this).closest("tr").find(".id").text();
                        var name = $(this).closest("tr").find(".name").text();
                        var mobile = $(this).closest("tr").find(".mobile").text();
                        var status = 0;
                        approve_sms_user(profile_id, name, mobile, status);
                    });


                    function approve_sms_user(profile_id, name, mobile, status) {
                        $.ajax({
                            url: '<?php echo URL; ?>police_service/approve_sms_user/',
                            type: 'POST',
                            dataType: 'JSON',
                            data: {'profile_id': profile_id, 'name': name, 'mobile': mobile, 'status': status},
                            success: function(data) {
                                if (data == 0) {
                                    document.getElementById('sms_' + profile_id).innerHTML = '<a title="Click to Enable" class="label">Disabled</a>';
                                    $('#sms_' + profile_id).removeClass('sms_is_enable').addClass('sms_is_disable');
                                }
                                else {
                                    document.getElementById('sms_' + profile_id).innerHTML = '<a title="Click to Disable" class="label label-success">Enabled</a>';
                                    $('#sms_' + profile_id).removeClass('sms_is_disable').addClass('sms_is_enable');
                                }
                            }
                        });
                    }



                    $("#user_table").on("click", ".resetpass", function() {
                        var profile_id = $(this).closest("tr").find(".id").text();
                        var name = $(this).closest("tr").find(".name").text();
                        var email = $(this).closest("tr").find(".email").text();
                        var mobile = $(this).closest("tr").find(".mobile").text();
                        var user_type = 'police';
                        document.getElementById('reset_' + profile_id).innerHTML = '<a><img src="<?php echo URL; ?>assets/apps/img/loading.gif" width="20" heigth="20"></a>';
                        reset_pass(profile_id, name, email, mobile, user_type);
                    });

                    function reset_pass(profile_id, name, email, mobile, user_type) {
                        $.ajax({
                            url: '<?php echo URL; ?>police_service/reset_password/',
                            type: 'POST',
                            dataType: 'JSON',
                            data: {profile_id: profile_id, name: name, email: email, user_type: user_type, mobile: mobile},
                            success: function(data) {
                                alert('Done');
                                document.getElementById('reset_' + profile_id).innerHTML = '<a title="Click to Reset Password" class="label label-inverse">Reset</a>';
                            }
                        });
                    }

                    $("#user_table").on("click", ".edituser", function() {
                        var profile_id = $(this).closest("tr").find(".id").text();
                        var user_type = 'police';
                        document.getElementById('edit_' + profile_id).innerHTML = '<a><img src="<?php echo URL; ?>assets/apps/img/loading.gif" width="20" heigth="20"></a>';
                        $.ajax({
                            url: '<?php echo URL; ?>police_service/get_user_details/',
                            type: 'POST',
                            dataType: 'JSON',
                            data: {profile_id: profile_id, user_type: user_type},
                            success: function(data) {
                                console.log(data);
                                for (var i in data) {
                                    $('#user_type').val(user_type);
                                    $('#user_type').val(user_type);
                                    $('#profile_id').val(profile_id);
                                    $('#user_name').val(data[i].name);
                                    $('#user_email').val(data[i].email);
                                    $('#user_mobile').val(data[i].mobile);
                                    $('#user_designation').val(data[i].designation);
                                    //$('#user_city_id').val(data[i].city_id);
                                    $('#user_ps_id').val(data[i].ps_id);
                                }
                                $('#edituserModal').modal('show');
                            }
                        });
                    });

                    function submitUserinfo() {
                        var formData = $('#edituserdetails_form').serialize();
                        $("#submitUserinfo_btn").attr('disabled', true).html('<img src="<?php echo URL; ?>assets/apps/img/loading.gif" width="20" heigth="20">');
                        $.ajax({
                            url: '<?php echo URL; ?>police_service/update_user_details/',
                            type: 'POST',
                            dataType: 'JSON',
                            data: formData,
                            success: function(data) {
                                $('#edituserModal').modal('hide');
                                $("#submitUserinfo_btn").attr('disabled', false).html('Save changes');
                                document.getElementById('edit_' + data).innerHTML = '<a title="Click to Edit" class="label label-important">Edit</a>';
                                $('#edituserdetails_form').each(function() {
                                    this.reset();
                                });
                                get_police_users();
                            }
                        });
                    }

                    function cancel_submitUserinfo() {
                        var profile_id = $('#profile_id').val();
                        document.getElementById('edit_' + profile_id).innerHTML = '<a title="Click to Edit" class="label label-important">Edit</a>';
                    }

                    function create_police_user() {
                        var name = $('#addUserName').val();
                        var email = $('#addUseremail').val();
                        var mobile = $('#addUserMobile').val();
                        if (name.length == 0) {
                            alert('Entry User Name');
                        }
                        else if (email.length == 0) {
                            alert('Entry User Email');
                        }
                        else if (mobile.length == 0) {
                            alert('Entry User Mobile');
                        }
                        else {
                            var formData = $('#create_police_user_form').serialize();
                            $("#create_police_user_btn").attr('disabled', true).html('<img src="<?php echo URL; ?>assets/apps/img/loading.gif" width="20" heigth="20">');
                            $.ajax({
                                type: 'POST',
                                url: '<?php echo URL; ?>police_service/register_new_user/',
                                data: formData,
                                dataType: 'JSON',
                                success: function(resp) {
                                    $('#create_police_user_form').each(function() {
                                        this.reset();
                                    });
                                    $("#create_police_user_btn").attr('disabled', false).html('Create');
                                    $('#addUserModal').modal('hide');
                                    get_police_users();
                                }
                            });
                        }
                    }

</script>