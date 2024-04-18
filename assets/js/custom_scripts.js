
function goBack() {
    window.history.go(-1);
}
function setDomainVerifyId(ca_id){
    $("#dmain_verifyId").val(ca_id);
}

// $("#sa_phonenumber,#ca_phoneNumber, #phoneNumber").mask("+1(000)000-0000");
// $(".resetClientAdminPassword").click(function(e) {
function resetAdminPassword(ca_id1) {
    e.preventDefault();
    window.scrollTo(0, 0);
    $('#resetAdminPasswordwait_msg').slideDown(1000);
    var r_id = $(this).attr("id");

    $.ajax({
        url: baseURL + 'dashboard/resetClientAdminPassword',
        type: "POST",
        data: {
            'id': ca_id1,
        },
        success: function(result) {

            if (result == 1) {
                return true;
                //     $('#resetAdminPasswordSuccess_msg').slideDown(1000);
                //     $('#resetAdminPasswordwait_msg').slideUp(1000);
                //     setTimeout(function() {
                //         $('#resetAdminPasswordwait_msg').slideUp(1000);
                //         window.location.href = baseURL + 'dashboard/clientUser';
                //     }, 4000);

            } else {
                return false;
                //     window.scrollTo(0, 0);
                //     $('#resetAdminPasswordwait_msg').slideUp(1000);
                //     $('#resetAdminPassworderror_msg').slideDown(1000);
                //     setTimeout(function() {
                //         $('#resetAdminPassworderror_msg').slideUp(1000);
                //     }, 4000);

            }
        },
    });
}

// });

// $(".setClientAdminPassword").click(function(e) {
function setAdminPassword(ca_id1) {
    e.preventDefault();
    window.scrollTo(0, 0);
    $('#setAdminPasswordwait_msg').slideDown(1000);
    var r_id = $(this).attr("id");

    $.ajax({
        url: baseURL + 'dashboard/setClientAdminPassword',
        type: "POST",
        data: {
            'id': ca_id1,
        },
        success: function(result) {
            if (result == 1) {
                return true;
                //     $('#setAdminPasswordSuccess_msg').slideDown(2000);
                //     $('#setAdminPasswordwait_msg').slideUp(1000);
                //     setTimeout(function() {
                //         $('#setAdminPasswordSuccess_msg').slideUp(1000);
                //         window.location.href = baseURL + 'dashboard/clientUser';
                //     }, 4000);

            } else {
                return false;
                //     window.scrollTo(0, 0);
                //     // $('#setAdminPassword_error_content').html(result);
                //     $('#setAdminPasswordwait_msg').slideUp(1000);
                //     $('#setAdminPassworderror_msg').slideDown(1000);
                //     setTimeout(function() {
                //         $('#setAdminPassworderror_msg').slideUp(1000);
                //     }, 4000);

            }
        },
    });
    // })
}



$(document).ready(function() {

    $(document).on("change", "#credittranfer1", function () {
        
        if (this.checked) {
            $("#credit_card").hide();
        }else{
            $("#credit_card").show();
        }
    });

    $(document).on("change", "#credittranfer", function () {
        
        if (this.checked) {
            $("#credit_card1").hide();
        }else{
            $("#credit_card1").show();
        }
    });

    $('#previewText1').summernote({
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],
            ['height', ['height']]
        ],
        fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '24', '36'],
        height: 300,
        callbacks: {
            onKeyup: function(e) {
                setTimeout(function() {
                    var maxLength = 200;
                    var test = $('#previewText').val();
                    //alert(test);
                    var testcon = ($(test).text());
    
    
    
                    var length = testcon.length;
    
    
                    if (maxLength < length) {
                        $('#getcharterlenth').html('<span style="color:red;">Character was over limit</span>');
                        $('#disablebtn').attr('disabled', true);
                        return false;
                    }
                    var length = maxLength - length;
                    $('#disablebtn').attr('disabled', false);
                    $('#getcharterlenth').text(length + ' Character Limit');
    
    
    
                }, 200);
            }
        }
    });

    $('#typeOffering').change(function() {
        var emp = $(this).val();
        if (emp == 'Regulation CF' || emp == 'Reg A+') {

           

            $("#credit_card").show();
            $("#credit_card1").show();

            $('#credittranfer').prop('checked', false); // Unchecks it
            $('#credittranfer1').prop('checked', false); // Unchecks it


        } else {

            $("#credit_card").hide();
            $("#credit_card1").hide();

        }
    });
    $('#Password').keyup(function() {
        $('#result').html(checkStrength($('#Password').val()))
    })
    $('#confirmPassword').keyup(function() {
        var checkPasword = checkStrength($('#Password').val());
        if (checkPasword == 'Strong') {
            if ($(this).val() != $('#Password').val()) {
                $('#confirmresult').removeClass()
                $('#confirmresult').addClass('short1')
                $('#confirmresult').html('Passwords do not match')
                $('#resetPwdsubmit').attr('disabled', true)
            } else {
                $('#confirmresult').html('');
                $('#resetPwdsubmit').attr('disabled', false)
            }
        }
    })
});
function setDeleteOfferID(offeringId) {
    $("#deletedOfferingId").val(offeringId);
}
function checkStrength(password) {
    var strength = 0
    if (password.length < 8) {
        $('#result').removeClass()
        $('#result').addClass('short1')
        $('#resetPwdsubmit').attr('disabled', true);
        return 'The password should be a minimum of 8 characters and must have at least one upper-case letter, one lower-case letter, one numeric digit and one special character.'
    }
    if (password.length >= 8 && password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/) && password.match(/([!,%,&,@,#,$,^,*,?,_,~])/) && password.match(/([0-9])/))
        strength += 3
    if (strength < 2) {
        $('#result').removeClass()
        $('#result').addClass('short1')
        $('#resetPwdsubmit').attr('disabled', true)
        return 'The password should be a minimum of 8 characters and must have at least one upper-case letter, one lower-case letter, one numeric digit and one special character.'
    } else {
        $('#result').removeClass()
        $('#result').addClass('strong1')
        $('#resetPwdsubmit').attr('disabled', false)
        return 'Strong'
    }
}

function addWebhook(ca_id1){
    $('#addWebhookwait_msg').slideDown(1000);
    $.ajax({
        url: baseURL + "dashboard/addWebhookSYnc",
        type: "POST",
        data: { ca_id: ca_id1 },
        success: function(result) {
            if (result == 1) {
                
                setTimeout("window.open('" + location.href + "','_self'); ", 2000);

            }
        },
    });
}

function checkClientNameExists(ca_user_unique_name) {

    $.ajax({
        url: baseURL + "dashboard/checkClientNameExists",
        type: "POST",
        data: { ca_user_unique_name: ca_user_unique_name },
        success: function(result) {
            if (result == 1) {
                window.scrollTo(0, 0);
                $('#addClienterror_content').html('Client user name already exists.');
                $('#addClientwait_msg').slideUp(1000);
                $('#addClienterror_msg').slideDown(1000);
                setTimeout(function() {
                    $('#addClienterror_msg').slideUp(1000);
                }, 4000);
                $('#ca_user_unique_name').focus();
                return false;

            }
        },
    });
}

function checkClientNameUpdateExists(ca_user_unique_name, ca_id) {

    $.ajax({
        url: baseURL + "dashboard/checkClientNameUpdateExists",
        type: "POST",
        data: { ca_user_unique_name: ca_user_unique_name, ca_id: ca_id },
        success: function(result) {
            if (result == 1) {
                window.scrollTo(0, 0);
                $('#editClienterror_content').html('Client user name already exists.');
                $('#editClientwait_msg').slideUp(1000);
                $('#editClienterror_msg').slideDown(1000);
                setTimeout(function() {
                    $('#editClienterror_msg').slideUp(1000);
                }, 4000);
                $('#ca_user_unique_name_up').focus();
                return false;

            }
        },
    });
}


function checkCa_usernameExists(ca_username) {

    $.ajax({
        url: baseURL + "dashboard/checkCa_usernameExists",
        type: "POST",
        data: { ca_username: ca_username },
        success: function(result) {
            if (result == 1) {
                window.scrollTo(0, 0);
                $('#addClienterror_content').html('Client name already exists.');
                $('#addClientwait_msg').slideUp(1000);
                $('#addClienterror_msg').slideDown(1000);
                setTimeout(function() {
                    $('#addClienterror_msg').slideUp(1000);
                }, 4000);
                $('#ca_username').focus();
                // return false;
                window.stop();

            }
        },
    });
}

function checkCa_usernameUpdateExists(ca_username, ca_id) {

    $.ajax({
        url: baseURL + "dashboard/checkCa_usernameUpdateExists",
        type: "POST",
        data: { ca_username: ca_username, ca_id: ca_id },
        success: function(result) {
            if (result == 1) {
                window.scrollTo(0, 0);
                $('#editClienterror_content').html('Client name already exists.');
                $('#editClientwait_msg').slideUp(1000);
                $('#editClienterror_msg').slideDown(1000);
                setTimeout(function() {
                    $('#editClienterror_msg').slideUp(1000);
                }, 4000);
                // $('#ca_username_up').focus();
                $('#edit_ca_username').focus();

                // return false;
                window.stop();
            }
        },
    });
}

function checkCa_usernameUpdateExistsBlur(ca_username, ca_id) {

    $.ajax({
        url: baseURL + "dashboard/checkCa_usernameUpdateExists",
        type: "POST",
        data: { ca_username: ca_username, ca_id: ca_id },
        success: function(result) {
            if (result == 1) {
                window.scrollTo(0, 0);
                $('#edit_ca_username').focus();
                $('#usernameError').show();
                return false;

            } else {
                $('#usernameError').hide();

            }
        },
    });
}


function checkCa_usernameExistsBlur(ca_username) {

    $.ajax({
        url: baseURL + "dashboard/checkCa_usernameExists",
        type: "POST",
        data: { ca_username: ca_username },
        success: function(result) {
            if (result == 1) {
                window.scrollTo(0, 0);
                $('#ca_username').focus();
                $('#usernameError').show();
                return false;
            } else {
                $('#usernameError').hide();

            }
        },
    });
}



$(document).ready(function(e) { 

    var table = $('#member_tbl').DataTable({
        stateSave: true,
        rowReorder: true,
        "columnDefs": [
            { "visible": false, "targets": 5 }
        ]
    });

    var table = $('#partyDoc_tbl').DataTable({
        stateSave: true,
        rowReorder: true,
    });


    //table.on('row-reorder', function (e, diff, edit) {
    // var tablediff = $('#member_tbl > tbody  > tr');

    $('#teamordersave').click(function() {
        var tablediff = $('#member_tbl > tbody  > tr');
        $.each(tablediff, function(rowIndex, r) {
            var reordervalues = rowIndex + 1;
            var rowidval = $(this).closest('tr').find("td:nth-child(2)").attr('data-id');
            console.log(rowidval);
            $('#updateOfferingContentsuccess_msg2').slideDown(1000);
            $.ajax({
                url: baseURL + "offerings/updatereoderingTeamMembers",
                type: "POST",
                data: { "orderposition": reordervalues, "memberId": rowidval },
                success: function(result) {
                    $('#updateOfferingContentsuccess_content2').html("Reorder Updated successfully");
                    $('#updateOfferingContentsuccess_msg2').slideUp(2000);
                },
            });
        });
    });

    var table = $('#attestation_tbl').DataTable({
        stateSave: true,
        rowReorder: true,
        "columnDefs": [
            { "visible": false, "targets": 3 }
        ]
    });
    var table = $('#sattestation_tbl').DataTable({
        stateSave: true,
        rowReorder: true,
        "columnDefs": [
            { "visible": false, "targets": 3 }
        ]
    });

    //table.on('row-reorder', function (e, diff, edit) {
    // var tablediff = $('#member_tbl > tbody  > tr');

    $('#Attachsave').click(function() {
        var tablediff = $('#attestation_tbl > tbody  > tr');
        $.each(tablediff, function(rowIndex, r) {
            var reordervalues = rowIndex + 1;
            var rowidval = $(this).closest('tr').find("td:nth-child(2)").attr('data-id');
            console.log(rowidval);
            $('#updateOfferingContentsuccess_msg2').slideDown(1000);
            $.ajax({
                url: baseURL + "offerings/updatereoderingAttachstation",
                type: "POST",
                data: { "orderposition": reordervalues, "memberId": rowidval },
                success: function(result) {
                    $('#updateOfferingContentsuccess_content2').html("Reorder Updated successfully");
                    $('#updateOfferingContentsuccess_msg2').slideUp(2000);
                },
            });
        });
    });

    var table = $('#offeringSection_table').DataTable({
        stateSave: true,
        rowReorder: true,
        "columnDefs": [
            { "visible": false, "targets": 6 }
        ]
    });

    $('#offSectionOrdersave').click(function() {
        var tablediff = $('#offeringSection_table > tbody  > tr');
        $.each(tablediff, function(rowIndex, r) {
            var reordervalues = rowIndex + 1;
            var rowidval = $(this).closest('tr').find("td:nth-child(2)").attr('data-id');
            console.log(rowidval);
            $('#updateOfferingContentsuccess_msg2').slideDown(1000);
            $.ajax({
                url: baseURL + "offerings/updatereoderingofferingSection",
                type: "POST",
                data: { "orderposition": reordervalues, "sectionId": rowidval },
                success: function(result) {
                    $('#updateOfferingContentsuccess_content2').html("Reorder Updated successfully");
                    $('#updateOfferingContentsuccess_msg2').slideUp(2000);
                },
            });
        });
    });

    $("#updateOfferingContentTeam").submit(function(e) {
        e.preventDefault();

        window.scrollTo(0, 0);
        $('#updateOfferingContentwait_msg1').slideDown(1000);
        var data = $(this).serialize();
        var offerId = $("#offerId").val();
        $.ajax({
            url: baseURL + "offerings/updateOfferingContentTeam",
            type: "POST",
            data: data,
            success: function(result) {
                if (result == 1) {
                    window.scrollTo(0, 0);
                    $('#updateOfferingContentsuccess_content1').html("Offering content updated successfully");
                    $('#updateOfferingContentwait_msg1').slideUp(1000);
                    $('#updateOfferingContentsuccess_msg1').slideDown(1000);
                    //setTimeout("window.open('" + baseURL + "offerings/editOfferingContent/" + offerId + "', '_self');", 2000);
                    //setTimeout("window.open('" + baseURL + "offerings/editOfferingContent/" + offerId + "', '_self');", 2000);
                    setTimeout("window.open('" + location.href + "','_self'); ", 2000);
                } else {
                    window.scrollTo(0, 0);
                    $('#updateOfferingContenterror_content1').html(result);
                    $('#updateOfferingContentwait_msg1').slideUp(1000);
                    $('#updateOfferingContenterror_msg1').slideDown(1000);
                    setTimeout(function() {
                        $('#updateOfferingContenterror_msg1').slideUp(1000);
                    }, 4000);
                }
            },
        });

    });

    $("#addAttestations").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#addAttestationswait_msg').slideDown(1000);
        var data = $('#addAttestations').serialize();
        console.log(data);

        $.ajax({
            url: baseURL + "offerings/addAttestations_ctrl",
            type: "POST",
            data: data,
            success: function(result) {
                if (result == 1) {
                    window.scrollTo(0, 0);
                    $('#addAttestationssuccess_content').html("Attestation added successfully");
                    $('#addAttestationswait_msg').slideUp(1000);
                    $('#addAttestationssuccess_msg').slideDown(1000);
                    setTimeout("window.open('" + location.href + "','_self'); ", 2000);
                } else {
                    window.scrollTo(0, 0);
                    $('#addAttestationserror_content').html(result);
                    $('#addAttestationswait_msg').slideUp(1000);
                    $('#addAttestationserror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#addAttestationserror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        });
    });

    $("#updateAttestations").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#updateAttestationswait_msg').slideDown(1000);
        var data = $('#updateAttestations').serialize(); //console.log(data);

        $.ajax({
            url: baseURL + "offerings/updateAttestations_ctrl",
            type: "POST",
            data: data,
            success: function(result) {
                if (result == 1) {
                    window.scrollTo(0, 0);
                    $('#updateAttestationssuccess_content').html("Attestation updated successfully");
                    $('#updateAttestationswait_msg').slideUp(1000);
                    $('#updateAttestationssuccess_msg').slideDown(1000);
                    setTimeout("window.open('" + location.href + "','_self'); ", 2000);
                } else {
                    window.scrollTo(0, 0);
                    $('#updateAttestationserror_content').html(result);
                    $('#updateAttestationswait_msg').slideUp(1000);
                    $('#updateAttestationserror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#updateAttestationserror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        });
    });
    $("#deleteAttestations").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#deleteAttestationswait_msg').slideDown(1000);
        var data = $('#deleteAttestations').serialize(); //console.log(data);

        $.ajax({
            url: baseURL + "offerings/deleteAttestations_ctrl",
            type: "POST",
            data: data,
            success: function(result) {
                if (result == 1) {
                    window.scrollTo(0, 0);
                    $('#deleteAttestationssuccess_content').html("Attestation Deleted successfully");
                    $('#deleteAttestationswait_msg').slideUp(1000);
                    $('#deleteAttestationssuccess_msg').slideDown(1000);
                    setTimeout("window.open('" + location.href + "','_self'); ", 2000);
                } else {
                    window.scrollTo(0, 0);
                    $('#deleteAttestationserror_content').html(result);
                    $('#deleteAttestationswait_msg').slideUp(1000);
                    $('#deleteAttestationserror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#deleteAttestationserror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        });
    });


    $('[data-toggle="tooltip"]').tooltip();

    $("#superAdminLogin").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#superAdminLoginwait_msg').slideDown(1000);
        var data = $(this).serialize();
        $.ajax({
            url: baseURL + "home/login",
            type: "POST",
            data: data,
            success: function(result) {
                if (result == 1) {
                    window.location.href = baseURL + 'dashboard';
                } else if (result == 2) {
                    window.scrollTo(0, 0);
                    $('#superAdminLoginerror_content').html('Sorry! Admin user does not exist.');
                    $('#superAdminLoginwait_msg').slideUp(1000);
                    $('#superAdminLoginerror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#superAdminLoginerror_msg').slideUp(1000);
                    }, 4000);

                } else if (result == 0) {
                    window.scrollTo(0, 0);
                    $('#superAdminLoginerror_content').html('Invalid Credentials');
                    $('#superAdminLoginwait_msg').slideUp(1000);
                    $('#superAdminLoginerror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#superAdminLoginerror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        });
    });


    // $('#ca_name').keyup(function(e) {

    //     var cur_val = $(this).val().toLowerCase();
    //     var ca_name = $('#ca_user_unique_name').val(cur_val.replace(/[^a-z0-9]+|\s+/gmi, ""));

    // });

    // $('#ca_name_up').keyup(function(e) {

    //     var cur_val = $(this).val().toLowerCase();
    //     var ca_name = $('#ca_user_unique_name_up').val(cur_val.replace(/[^a-z0-9]+|\s+/gmi, ""));

    // });

    $('#ca_username').blur(function(e) {

        var ca_username = $('#ca_username').val();
        checkCa_usernameExistsBlur(ca_username);

    });
    $('#edit_ca_username').blur(function(e) {

        var ca_name = $('#edit_ca_username').val();
        var ca_id = $('#ca_id').val();

        checkCa_usernameUpdateExistsBlur(ca_name, ca_id);

    });
    // $('#ca_name').blur(function(e) {

    //     var ca_name = $('#ca_user_unique_name').val();
    //     checkClientNameExists(ca_name);

    // });

    $('#ca_user_unique_name_up').blur(function(e) {
        // $('#ca_name_up, #ca_user_unique_name_up').blur(function(e) {

        var ca_name = $('#ca_user_unique_name_up').val();
        var ca_id = $('#ca_id').val();

        checkClientNameUpdateExists(ca_name, ca_id);

    });
    $('#clientname').keyup(function(e) {

        // var ca_name = $('#ca_user_unique_name_up').val();
        // var ca_id = $('#ca_id').val();

        // domainNameInput(ca_name, ca_id);

    });

    $("#addClient").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#addClientwait_msg').slideDown(1000);
        var phone_number = $('#ca_phoneNumber').val();
        //var ph_filter = /^\+\d{1}\(\d{3}\)\d{3}\-\d{4}$/;
var ph_filter = /^\+\d{11}$/;
        if (phone_number != '') {
            if (ph_filter.test(phone_number) == 1) {
                console.log("valid phone number");
            } else {
                window.scrollTo(0, 0);
                console.log("Phone number Invalid");
                $('#addClienterror_content').html('Phone number Invalid.');
                $('#addClientwait_msg').slideUp(1000);
                $('#addClienterror_msg').slideDown(1000);
                setTimeout(function() {
                    $('#addClienterror_msg').slideUp(1000);
                }, 4000);
                return false;
            }
        }
        var clientId = $('#ca_clinetId').val();
        var developerkey = $('#ca_developerKey').val();
        var data1 = $(this).serialize();
        var ca_domain = $('#ca_domain').val();
        var mtDomainName = ca_domain.trim();

        var ca_user_unique_name = $('#ca_user_unique_name').val();
        var ca_username = $('#ca_username').val();

        if (ca_username != "") {

            // return checkCa_usernameExists(ca_username);
            $.ajax({
                url: baseURL + "dashboard/checkCa_usernameExists",
                type: "POST",
                data: { ca_username: ca_username },
                success: function(result) {
                    if (result == 1) {
                        window.scrollTo(0, 0);
                        $('#addClienterror_content').html('Client name already exists.');
                        $('#addClientwait_msg').slideUp(1000);
                        $('#addClienterror_msg').slideDown(1000);
                        setTimeout(function() {
                            $('#addClienterror_msg').slideUp(1000);
                        }, 4000);
                        $('#ca_username').focus();
                        // return false;
                        window.stop();

                    }
                },
            });

        }
        if (mtDomainName != "") {

            if (/^([a-zA-Z0-9][a-zA-Z0-9-_]*\.)*[a-zA-Z0-9]*[a-zA-Z0-9-_]*[[a-zA-Z0-9]+$/.test(mtDomainName)) {
                console.log("valid domain name");
            } else {
                window.scrollTo(0, 0);
                console.log("Domain name Invalid");
                $('#addClienterror_content').html('Domain name Invalid.');
                $('#addClientwait_msg').slideUp(1000);
                $('#addClienterror_msg').slideDown(1000);
                setTimeout(function() {
                    $('#addClienterror_msg').slideUp(1000);
                }, 4000);
                return false;
            }

        }

        // if (ca_user_unique_name != "") {

        //     checkClientNameExists(ca_user_unique_name);

        // }

        $.ajax({
            url: baseURL + "dashboard/checkClientInfo",
            type: "POST",
            data: { clientId: clientId, developerkey: developerkey },
            success: function(result) {
                console.log(result);
                if (result == 1) {
                    $.ajax({
                        url: baseURL + "dashboard/addClient_ctrl",
                        type: "POST",
                        data: data1,
                        success: function(result) {
                            if (result == 1) {
                                $('#addClientsuccess_content').html('Client added successfully');
                                $('#addClientsuccess_msg').slideDown(1000);
                                $('#addClientwait_msg').slideUp(1000);
                                setTimeout(function() {
                                    window.location.href = baseURL + 'dashboard/clients';
                                }, 4000);
                            } else {
                                window.scrollTo(0, 0);
                                $('#addClienterror_content').html(result);
                                $('#addClientwait_msg').slideUp(1000);
                                $('#addClienterror_msg').slideDown(1000);
                                setTimeout(function() {
                                    $('#addClienterror_msg').slideUp(1000);
                                }, 4000);

                            }
                        },
                    });
                } else {
                    window.scrollTo(0, 0);
                    $('#addClienterror_content').html(result);
                    $('#addClientwait_msg').slideUp(1000);
                    $('#addClienterror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#addClienterror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        });

        // $.ajax({
        //     url: baseURL + "dashboard/addClient_ctrl",
        //     type: "POST",
        //     data: data,
        //     success: function(result) {
        //         if (result == 1) {
        //             $('#addClientsuccess_msg').slideDown(1000);
        //             $('#addClientwait_msg').slideUp(1000);
        //             setTimeout(function() {
        //                 window.location.href = baseURL + 'dashboard/clients';
        //             }, 4000);
        //         } else {
        //             window.scrollTo(0, 0);
        //             $('#addClienterror_content').html(result);
        //             $('#addClientwait_msg').slideUp(1000);
        //             $('#addClienterror_msg').slideDown(1000);
        //             setTimeout(function() {
        //                 $('#addClienterror_msg').slideUp(1000);
        //             }, 4000);

        //         }
        //     },
        // });
    });
    $("#addClientAdmin").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#addClientAdminwait_msg').slideDown(1000);
        var phone_number = $('#phoneNumber').val();
        // var ph_filter = /^\+\d{11}$/;

        //var ph_filter = /^\+\d{1}\(\d{3}\)\d{3}\-\d{4}$/;
var ph_filter = /^\+\d{11}$/;
        if (phone_number != '') {
            if (ph_filter.test(phone_number) == 1) {
                console.log("valid phone number");
            } else {
                window.scrollTo(0, 0);
                console.log("Phone number Invalid");
                $('#addClientAdminerror_content').html('Phone number Invalid.');
                $('#addClientAdminwait_msg').slideUp(1000);
                $('#addClientAdminerror_msg').slideDown(1000);
                setTimeout(function() {
                    $('#addClientAdminerror_msg').slideUp(1000);
                }, 4000);
                return false;
            }
        }
        var data = $(this).serialize();
        $.ajax({
            url: baseURL + "dashboard/addClientAdmin_ctrl",
            type: "POST",
            data: data,
            success: function(result) {
                if (result == 1) {
                    $('#addClientAdminsuccess_msg').slideDown(1000);
                    $('#addClientAdminwait_msg').slideUp(1000);
                    setTimeout(function() {
                        window.location.href = baseURL + 'dashboard/clientUser';
                    }, 4000);
                } else {
                    window.scrollTo(0, 0);
                    $('#addClientAdminerror_content').html(result);
                    $('#addClientAdminwait_msg').slideUp(1000);
                    $('#addClientAdminerror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#addClientAdminerror_msg').slideUp(1000);
                    }, 4000);

                }
            },
        });
    });

    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
        // return ;
    }
    $("#addSuperAdmin").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#addSuperAdminwait_msg').slideDown(1000);


        var email = $('#sa_emailid').val();
        var isEmailCheck = isEmail(email);
        if (isEmailCheck != true) {
            window.scrollTo(0, 0);
            $('#addSuperAdminerror_content').html('Please check you E-mail');
            $('#addSuperAdminwait_msg').slideUp(1000);
            $('#addSuperAdminerror_msg').slideDown(1000);
            setTimeout(function() {
                $('#addSuperAdminerror_msg').slideUp(1000);
            }, 4000);
            return false;
        }
        // var phone_number = $('#sa_phonenumber').val();
        // var ph_filter = /^\+\d{11}$/;

        //var ph_filter = /^\+\d{1}\(\d{3}\)\d{3}\-\d{4}$/;
// var ph_filter = /^\+\d{11}$/;
//         if (phone_number != '') {
//             if (ph_filter.test(phone_number) == 1) {
//                 console.log("valid phone number");
//             } else {
//                 window.scrollTo(0, 0);
//                 $('#addSuperAdminerror_content').html('Phone number Invalid.');
//                 $('#addSuperAdminwait_msg').slideUp(1000);
//                 $('#addSuperAdminerror_msg').slideDown(1000);
//                 setTimeout(function() {
//                     $('#addSuperAdminerror_msg').slideUp(1000);
//                 }, 4000);
//                 return false;
//             }
//         }
        var data = $(this).serialize();
        $.ajax({
            url: baseURL + "dashboard/addSuperAdmin_ctrl",
            type: "POST",
            data: data,
            success: function(result) {
                if (result == 1) {
                    $('#addSuperAdminsuccess_msg').slideDown(1000);
                    $('#addSuperAdminwait_msg').slideUp(1000);
                    setTimeout(function() {
                        window.location.href = baseURL + 'dashboard/Admin';
                    }, 4000);
                } else if (result == 2) {
                    window.scrollTo(0, 0);
                    $('#addSuperAdminerror_content').html('Email ID already exists');
                    $('#addSuperAdminwait_msg').slideUp(1000);
                    $('#addSuperAdminerror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#addSuperAdminerror_msg').slideUp(1000);
                    }, 4000);
                } else {
                    window.scrollTo(0, 0);
                    $('#addSuperAdminerror_content').html(result);
                    $('#addSuperAdminwait_msg').slideUp(1000);
                    $('#addSuperAdminerror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#addSuperAdminerror_msg').slideUp(1000);
                    }, 4000);

                }
            },
        });
    });

    $("#editSuperAdmin").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#editSuperAdminwait_msg').slideDown(1000);


        var email = $('#sa_emailid').val();
        var isEmailCheck = isEmail(email);
        if (isEmailCheck != true) {
            window.scrollTo(0, 0);
            $('#editSuperAdminerror_content').html('Please check you E-mail');
            $('#editSuperAdminwait_msg').slideUp(1000);
            $('#editSuperAdminerror_msg').slideDown(1000);
            setTimeout(function() {
                $('#editSuperAdminerror_msg').slideUp(1000);
            }, 4000);
            return false;
        }

        var phone_number = $('#sa_phonenumber').val();
        // var ph_filter = /^\+\d{11}$/;
        //var ph_filter = /^\+\d{1}\(\d{3}\)\d{3}\-\d{4}$/;
var ph_filter = /^\+\d{11}$/;
        if (phone_number != '') {
            if (ph_filter.test(phone_number) == 1) {
                console.log("valid phone number");
            } else {
                window.scrollTo(0, 0);
                $('#editSuperAdminerror_content').html('Phone number Invalid.');
                $('#editSuperAdminwait_msg').slideUp(1000);
                $('#editSuperAdminerror_msg').slideDown(1000);
                setTimeout(function() {
                    $('#editSuperAdminerror_msg').slideUp(1000);
                }, 4000);
                return false;
            }
        }
        var data = $(this).serialize();
        $.ajax({
            url: baseURL + "dashboard/editSuperAdmin_ctrl",
            type: "POST",
            data: data,
            success: function(result) {
                if (result == 1) {
                    $('#editSuperAdminsuccess_msg').slideDown(1000);
                    $('#editSuperAdminwait_msg').slideUp(1000);
                    setTimeout(function() {
                        window.location.href = baseURL + 'dashboard/Admin';
                    }, 4000);
                } else if (result == 2) {
                    window.scrollTo(0, 0);
                    $('#editSuperAdminerror_content').html('Email ID already exists');
                    $('#editSuperAdminwait_msg').slideUp(1000);
                    $('#editSuperAdminerror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#editSuperAdminerror_msg').slideUp(1000);
                    }, 4000);
                } else {
                    window.scrollTo(0, 0);
                    $('#editSuperAdminerror_content').html(result);
                    $('#editSuperAdminwait_msg').slideUp(1000);
                    $('#editSuperAdminerror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#editSuperAdminerror_msg').slideUp(1000);
                    }, 4000);

                }
            },
        });
    });

    $("#deletesuperAdmin").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#deletesuperAdminwait_msg').slideDown(1000);
        var data = $(this).serialize();
        $.ajax({
            url: baseURL + "dashboard/deletesuperAdmin_ctrl",
            type: "POST",
            data: data,
            success: function(result) {
                if (result == 1) {
                    window.scrollTo(0, 0);
                    $('#deletesuperAdminsuccess_content').html("SuperAdmin deleted successfully");
                    $('#deletesuperAdminwait_msg').slideUp(1000);
                    $('#deletesuperAdminsuccess_msg').slideDown(1000);
                    setTimeout(function() {
                        window.location.href = baseURL + 'dashboard/Admin';
                    }, 4000);
                } else {
                    window.scrollTo(0, 0);
                    $('#deletesuperAdminerror_content').html(result);
                    $('#deletesuperAdminwait_msg').slideUp(1000);
                    $('#deletesuperAdminerror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#deletesuperAdminerror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        });
    });

    $("#editClient").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#editClientwait_msg').slideDown(1000);
        var clientId = $('#ca_clinetId').val();
        var developerkey = $('#ca_developerKey').val();
        var data1 = $(this).serialize();

        var ca_name = $('#edit_ca_username').val();
        var ca_id = $('#ca_id').val();
        var clientAdmin = ca_name.trim();

        if (ca_name != "") {
            // return checkCa_usernameUpdateExists(ca_name, ca_id);
            $.ajax({
                url: baseURL + "dashboard/checkCa_usernameUpdateExists",
                type: "POST",
                data: { ca_username: clientAdmin, ca_id: ca_id },
                success: function(result) {
                    if (result == 1) {
                        window.scrollTo(0, 0);
                        $('#editClienterror_content').html('Client name already exists.');
                        $('#editClientwait_msg').slideUp(1000);
                        $('#editClienterror_msg').slideDown(1000);
                        setTimeout(function() {
                            $('#editClienterror_msg').slideUp(1000);
                        }, 4000);
                        // $('#ca_username_up').focus();
                        $('#edit_ca_username').focus();

                        // return false;
                        window.stop();
                    }
                },
            });

        }
        var ca_domain = $('#ca_domain').val();
        var mtDomainName = ca_domain.trim();
        if (mtDomainName != "") {

            if (/^([a-zA-Z0-9][a-zA-Z0-9-_]*\.)*[a-zA-Z0-9]*[a-zA-Z0-9-_]*[[a-zA-Z0-9]+$/.test(mtDomainName)) {
                console.log("valid domain name");
            } else {
                window.scrollTo(0, 0);
                console.log("Domain name Invalid");
                $('#editClienterror_content').html('Domain name Invalid.');
                $('#editClientwait_msg').slideUp(1000);
                $('#editClienterror_msg').slideDown(1000);
                setTimeout(function() {
                    $('#editClienterror_msg').slideUp(1000);
                }, 4000);
                return false;
            }

        }
        var phone_number = $('#ca_phoneNumber').val();
        //var ph_filter = /^\+\d{1}\(\d{3}\)\d{3}\-\d{4}$/;
var ph_filter = /^\+\d{11}$/;
        if (phone_number != '') {
            if (ph_filter.test(phone_number) == 1) {
                console.log("valid phone number");
            } else {
                window.scrollTo(0, 0);
                console.log("Phone number Invalid");
                $('#editClienterror_content').html('Phone number Invalid.');
                $('#editClientwait_msg').slideUp(1000);
                $('#editClienterror_msg').slideDown(1000);
                setTimeout(function() {
                    $('#editClienterror_msg').slideUp(1000);
                }, 4000);
                return false;
            }
        }

        $.ajax({
            url: baseURL + "dashboard/checkClientInfo",
            type: "POST",
            data: { clientId: clientId, developerkey: developerkey },
            success: function(result) {
                console.log(result);
                if (result == 1) {
                    $.ajax({
                        url: baseURL + "dashboard/editClient_ctrl",
                        type: "POST",
                        data: data1,
                        success: function(result) {
                            if (result == 1) {
                                editClientsuccess_content
                                $('#editClientsuccess_content').html('Client updated successfully');
                                $('#editClientsuccess_msg').slideDown(1000);
                                $('#editClientwait_msg').slideUp(1000);
                                setTimeout(function() {
                                    window.location.href = baseURL + 'dashboard/clients';
                                }, 4000);
                            } else {
                                window.scrollTo(0, 0);
                                $('#editClienterror_content').html(result);
                                $('#editClientwait_msg').slideUp(1000);
                                $('#editClienterror_msg').slideDown(1000);
                                setTimeout(function() {
                                    $('#editClienterror_msg').slideUp(1000);
                                }, 4000);

                            }
                        },
                    });
                } else {
                    window.scrollTo(0, 0);
                    $('#editClienterror_content').html(result);
                    $('#editClientwait_msg').slideUp(1000);
                    $('#editClienterror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#editClienterror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        });

    });
    $("#deleteClient").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#deleteClientwait_msg').slideDown(1000);
        var data = $(this).serialize();
        $.ajax({
            url: baseURL + "dashboard/deleteClient_ctrl",
            type: "POST",
            data: data,
            success: function(result) {
                if (result == 1) {
                    window.scrollTo(0, 0);
                    $('#deleteClientsuccess_content').html("Client deleted successfully");
                    $('#deleteClientwait_msg').slideUp(1000);
                    $('#deleteClientsuccess_msg').slideDown(1000);
                    setTimeout(function() {
                        window.location.href = baseURL + 'dashboard/clients';
                    }, 4000);
                } else {
                    window.scrollTo(0, 0);
                    $('#deleteClienterror_content').html(result);
                    $('#deleteClientwait_msg').slideUp(1000);
                    $('#deleteClienterror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#deleteClienterror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        });
    });
    $("#editClientAdmin").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#editClientAdminwait_msg').slideDown(1000);
        // var clientId = $('#ca_clinetId').val();
        // var developerkey = $('#ca_developerKey').val();
        var data1 = $(this).serialize();


        var phone_number = $('#phoneNumber').val();
        // var ph_filter = /^\+\d{11}$/;

        //var ph_filter = /^\+\d{1}\(\d{3}\)\d{3}\-\d{4}$/;
var ph_filter = /^\+\d{11}$/;
        if (phone_number != '') {
            if (ph_filter.test(phone_number) == 1) {
                console.log("valid phone number");
            } else {
                window.scrollTo(0, 0);
                console.log("Phone number Invalid");
                $('#editClientAdminerror_content').html('Phone number Invalid.');
                $('#editClientAdminwait_msg').slideUp(1000);
                $('#editClientAdminerror_msg').slideDown(1000);
                setTimeout(function() {
                    $('#editClientAdminerror_msg').slideUp(1000);
                }, 4000);
                return false;
            }
        }

        $.ajax({
            url: baseURL + "dashboard/editClientAdmin_ctrl",
            type: "POST",
            data: data1,
            success: function(result) {
                if (result == 1) {
                    $('#editClientAdminsuccess_msg').slideDown(1000);
                    $('#editClientAdminwait_msg').slideUp(1000);
                    setTimeout(function() {
                        window.location.href = baseURL + 'dashboard/clientUser';
                    }, 4000);
                } else {
                    window.scrollTo(0, 0);
                    $('#editClientAdminerror_content').html('Something went wrong');
                    $('#editClientAdminwait_msg').slideUp(1000);
                    $('#editClientAdminerror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#editClientAdminerror_msg').slideUp(1000);
                    }, 4000);

                }
            },
        });

    });

    $("#deleteClientAdmin").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#deleteClientAdminwait_msg').slideDown(1000);
        var data = $(this).serialize();
        $.ajax({
            url: baseURL + "dashboard/deleteClientAdmin_ctrl",
            type: "POST",
            data: data,
            success: function(result) {
                if (result == 1) {
                    window.scrollTo(0, 0);
                    $('#deleteClientAdminsuccess_content').html("Client deleted successfully");
                    $('#deleteClientAdminwait_msg').slideUp(1000);
                    $('#deleteClientAdminsuccess_msg').slideDown(1000);
                    setTimeout(function() {
                        window.location.href = baseURL + 'dashboard/clientUser';
                    }, 4000);
                } else {
                    window.scrollTo(0, 0);
                    $('#deleteClientAdminerror_content').html(result);
                    $('#deleteClientAdminwait_msg').slideUp(1000);
                    $('#deleteClientAdminerror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#deleteClientAdminerror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        });
    });
    $('#updateSuperAdminPwd').submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#updateSuperAdminPwdwait_msg').slideDown(1000);
        var data = $(this).serialize();
        $.ajax({
            url: baseURL + "dashboard/masterPassword_ctrl",
            type: "POST",
            data: data,
            success: function(result) {
                if (result == 1) {
                    window.scrollTo(0, 0);
                    $('#updateSuperAdminPwdsuccess_content').html("Password Updated successfully");
                    $('#updateSuperAdminPwdwait_msg').slideUp(1000);
                    $('#updateSuperAdminPwdsuccess_msg').slideDown(1000);
                    setTimeout(function() {
                        window.location.href = baseURL + 'dashboard/masterPassword';
                    }, 4000);
                } else {
                    window.scrollTo(0, 0);
                    $('#updateSuperAdminPwderror_content').html(result);
                    $('#updateSuperAdminPwdwait_msg').slideUp(1000);
                    $('#updateSuperAdminerror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#updateSuperAdminerror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        });
    });
    $("#sendingPassword").submit(function(e) {
        e.preventDefault();
        $("html, body").scrollTop(0);
        $('#sendingPasswordErrorMsg, #sendingPasswordSuccessMsg').slideUp(1000);
        $('#sendingPasswordWaitMsg').slideDown(1000);
        var data = $(this).serialize();
        $.ajax({
            url: baseURL + "dashboard/sendPasswordSetup",
            type: "POST",
            data: data,
            success: function(result) {
                if (result == 1) {
                    $('#sendingPasswordSuccessContent').html("Password set up send successfully");
                    $('#sendingPasswordWaitMsg').slideUp(1000);
                    $('#sendingPasswordSuccessMsg').slideDown(1000);
                    setTimeout("window.open('" + location.href + "','_self'); ", 2000);
                } else {
                    $('#sendingPasswordErrorContent').html(result);
                    $('#sendingPasswordWaitMsg').slideUp(1000);
                    $('#sendingPasswordErrorMsg').slideDown(1000);
                    setTimeout(function() {
                        $('#sendingPasswordErrorMsg').slideUp(1000);
                    }, 4000);
                }
            }
        });
    });

    $("#addIpaddress").submit(function(e) {
        window.scrollTo(0, 0);
        $('#addIpaddresswait_msg').slideDown(1000);
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: baseURL + "dashboard/ipaddress_ctrl",
            type: "POST",
            data: data,
            success: function(result) {
                if (result == 1) {
                    window.scrollTo(0, 0);
                    $("#addIpaddresssuccess_content").html('Ipaddress added.');
                    $('#addIpaddresswait_msg').slideUp(1000);
                    $('#addIpaddresssuccess_msg').slideDown(1000);
                    setTimeout(function() {
                        $("#addIpaddresssuccess_msg").slideUp(1000);
                        //window.location.href = baseURL + "home/login";
                        window.location.href = baseURL + 'dashboard/ipAddress';
                    }, 4000);
                } else {
                    window.scrollTo(0, 0);
                    $("#addIpaddresserror_content").html(result);
                    $('#addIpaddresswait_msg').slideUp(1000);
                    $('#addIpaddresserror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#addIpaddresserror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        });
    })

    $("#updateIpaddress").submit(function(e) {
        window.scrollTo(0, 0);
        $('#updateIpaddresswait_msg').slideDown(1000);
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: baseURL + "dashboard/updateIpaddress_ctrl",
            type: "POST",
            data: data,
            success: function(result) {
                if (result == 1) {
                    window.scrollTo(0, 0);
                    $("#updateIpaddresssuccess_content").html('Ipaddress updated.');
                    $('#updateIpaddresswait_msg').slideUp(1000);
                    $('#updateIpaddresssuccess_msg').slideDown(1000);
                    setTimeout(function() {
                        $("#updateIpaddresssuccess_msg").slideUp(1000);
                        //window.location.href = baseURL + "home/login";
                        window.location.href = baseURL + 'dashboard/ipAddress';
                    }, 4000);
                } else {
                    window.scrollTo(0, 0);
                    $("#updateIpaddresserror_content").html(result);
                    $('#updateIpaddresswait_msg').slideUp(1000);
                    $('#updateIpaddresserror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#updateIpaddresserror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        });
    })

    $("#deleteIpaddress").submit(function(e) {
        window.scrollTo(0, 0);
        $('#deleteIpaddresswait_msg').slideDown(1000);
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: baseURL + "dashboard/deleteIpaddress_ctrl",
            type: "POST",
            data: data,
            success: function(result) {
                if (result == 1) {
                    window.scrollTo(0, 0);
                    $("#deleteIpaddresssuccess_content").html('Ipaddress updated.');
                    $('#deleteIpaddresswait_msg').slideUp(1000);
                    $('#deleteIpaddresssuccess_msg').slideDown(1000);
                    setTimeout(function() {
                        $("#deleteIpaddresssuccess_msg").slideUp(1000);
                        //window.location.href = baseURL + "home/login";
                        window.location.href = baseURL + 'dashboard/ipAddress';
                    }, 4000);
                } else {
                    window.scrollTo(0, 0);
                    $("#deleteIpaddresserror_content").html(result);
                    $('#deleteIpaddresswait_msg').slideUp(1000);
                    $('#deleteIpaddresserror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#deleteIpaddresserror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        });
    })

    $("#resetAdminUserpwd").submit(function(e) {
        e.preventDefault();

        // var Passw = $('#Password').val();
        // var Passwconf = $('#confirmPassword').val();
        // //alert(Passw);
        // if (Passw != Passwconf) {
        //     $("#pwdMismatch").html('<span style="color:red;">Password Mismatch.</span>');
        //     return false;
        // }
        //return false;
        window.scrollTo(0, 0);
        $('#resetPwdwait_msg').slideDown(1000);
        var data = $(this).serialize();
        $.ajax({
            url: baseURL + "home/updatePasswordAdmin",
            type: "POST",
            data: data,
            success: function(result) {
                if (result == 1) {
                    window.scrollTo(0, 0);
                    $('#resetPwdwait_msg').slideUp(1000);
                    $('#resetPwdsuccess_msg').slideDown(1000);
                    setTimeout(function() {
                        $("#resetPwdsuccess_msg").slideUp(1000);
                        window.location.href = baseURL + "home/";
                        // setTimeout("window.open('" + location.href + "','_self'); ", 2000);
                    }, 4000);
                } else {
                    window.scrollTo(0, 0);
                    $("#resetPwderror_content").html(result);
                    $('#resetPwdwait_msg').slideUp(1000);
                    $('#resetPwderror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#resetPwderror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        })
    });


    $("#superadminforgotpwd").submit(function(e) {
        window.scrollTo(0, 0);
        $('#forgotPwdwait_msg').slideDown(1000);
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: baseURL + "home/forgotPwd_ctrl",
            type: "POST",
            data: data,
            success: function(result) {
                if (result == 1) {
                    window.scrollTo(0, 0);
                    $('#forcontentpwd').hide();
                    $('#topcontent').show();
                    //window.location.href = baseURL;
                } else {
                    window.scrollTo(0, 0);
                    document.getElementById('forgotPwderror_content').innerHTML = 'Please check your E-mail ID';
                    $('#forgotPwdwait_msg').slideUp(1000);
                    $('#forgotPwderror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#forgotPwderror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        });
    })



});
$(document).ready(function(e) { 
$.fn.dataTable.moment( 'MM-DD-YYYY HH:mm:ss' ); 
    $('#photo_tbl').DataTable({
        stateSave: true,
        "columnDefs": [
            { "orderable": false, "targets": 4 }
        ]
    });

    $('#client_tbl').DataTable({
        stateSave: true,
        // "columnDefs": [
        //     { "orderable": false, "targets": [3, 4] }
        // ]
    }); 
     $('#faq_tbl').DataTable({
        stateSave: true,
        "columnDefs": [
            { "orderable": false, "targets": 4 }
        ]
    });
    $('#offeringDoc_tbl').DataTable({
        stateSave: true,
        "columnDefs": [
            { "orderable": false, "targets": 6 }
        ]
    });
    $('#clientuser_tbl').DataTable({
        stateSave: true,
        "columnDefs": [
            { "orderable": false, "targets": [6, 8] }
        ]
    });
    $('#superAdmin_tbl').DataTable({
        stateSave: true,
        "columnDefs": [
            { "orderable": false, "targets": 6 }
        ]
    });
    $('#ipaddress_tbl').DataTable({
        stateSave: true,
        "columnDefs": [
            { "orderable": false, "targets": 3 }
        ]
    });
    $('#client_config_tbl').DataTable({
        stateSave: true,
        "columnDefs": [
            { "orderable": false, "targets": [5, 6] }
        ]
    });
    $('#offers_tbl').DataTable({
        stateSave: true,
        "columnDefs": [
            { "orderable": false, "targets": [5, 6] }
        ]
    });
});

function setDeleteClientId(clientId) {
    $("#clientId").val(clientId);
}

function setDeleteClientAdminId(clientAdminId) {
    $("#clientAdminId").val(clientAdminId);
}

function setDeletesuperAdminId(superAdminId) {
    $('#superAdminId').val(superAdminId);
}

function setAdminUserId(id) {
    $('#superadminId').val(id);
}

function setupdateIpaddress(id, address) {
    $('#updateIpaddressId').val(id);
    $('#updatedIpaddress').val(address);
}

function setDeleteIpaddress(id) {
    $('#deleteIpaddressId').val(id);
}
function offerUnits() {
    var maxAmount = $('#maxAmount').val();
    var unitPrice = $('#unitPrice').val();
    if (maxAmount == "" || unitPrice == "" || maxAmount == 0 || unitPrice == 0) {
        $("#noUnits").val("");
        return false;
    }
    var units = maxAmount / unitPrice;
    $("#noUnits").val(units);
}

function setViewAttestationsDetails(text) {
    var decoded_Dbdata = atob(text)
    var encoded_data = btoa(decoded_Dbdata)
    if (text == encoded_data) {
        $('#viewAttestations').html(atob(text));
    } else {
        $('#viewAttestations').html(text);
    }
    // $('#viewAttestations').html(text);
    $('#viewAttestationsWaitDiv').hide();
}

function setEditAttestationsId(text, id) {
    var decoded_Dbdata = atob(text)
    var encoded_data = btoa(decoded_Dbdata)
    if (text == encoded_data) {
        $("#updateattestationsText").summernote("code", atob(text));
    } else {
        $("#updateattestationsText").summernote("code", text);
    }
    // $("#updateattestationsText").summernote("code", atob(text));
    // $('#updateattestationsText').val(text);
    $('#AttestationsId').val(id);
}

function setDeleteAttestationsId(id) {
    $('#deteleAttestationsId').val(id);
}

function updateOfferSection(defaultName, customName, id) {
    $("#defaultName").val(defaultName);
    $("#customName").val(customName);
    $("#sectionId").val(id);
}

function updateDashbdSection(defaultName, customName, id) {
    $("#defaultName").val(defaultName);
    $("#customName").val(customName);
    $("#sectionId").val(id);
}

function setEditPhotoId(photoId) {
    $("#photoId").val(photoId);
}

function setDeletePhotoId(photoId) {
    $("#deletePhotoId").val(photoId);
}

function setViewPhotoDetails(imagePath, photo) {
    $("#viewPhotoContentDiv").hide();
    $("#viewPhotoWaitDiv").show();
    if (photo != "") {
        var image = '<img src="' + imagePath + photo + '" border="0"/>';
    } else {
        var image = '';
    }
    $("#viewPhoto").html(image);
    setTimeout(function() {
        $("#viewPhotoWaitDiv").hide();
        $("#viewPhotoContentDiv").show();
    }, 1000);
}

function setViewFaqDetails(faqQuestion, faqAnswer) {
    $("#viewFaqContentDiv").hide();
    $("#viewFaqWaitDiv").show();
    $("#viewFaqQuestion").html(atob(faqQuestion));
    var str = atob(faqAnswer);
    var stringvalues = strreplacecharte(str);
    $("#viewFaqAnswer").html(stringvalues);
    //$("#viewFaqAnswer").html(atob(faqAnswer));
    setTimeout(function() {
        $("#viewFaqWaitDiv").hide();
        $("#viewFaqContentDiv").show();
    }, 1000);
}

function strreplacecharte(str) {

    var replaceval = str.replace("Ã‚", "").replace("Ã‚", "").replace("Ã‚", "").replace("Ã‚", "").replace("Ã‚", "").replace("Ã‚", "").replace("Ã‚", "").replace("Ã‚", "").replace("Ã‚", "").replace("Ã‚", "");

    return replaceval;
}

function setDeleteFaqId(faqId) {
    $("#deleteFaqId").val(faqId);
}

function setViewMemberDetails(memberName, memberPosition, memberImage, aboutMember, imagePath) {
    $("#viewMemberContentDiv").hide();
    $("#viewMemberWaitDiv").show();
    if (memberImage != "") {
        var image = '<img src="' + imagePath + memberImage + '" border="0"/>';
    } else {
        var image = '<img src="' + imagePath + 'defaultMember.png" border="0"/>';
    }
    $("#viewMemberPic").html(image);
    $("#viewMemberName").html(memberName);
    $("#viewMemberPosition").html(memberPosition);
    str = atob(aboutMember);
    var stringvalues = strreplacecharte(str);
    $("#memberDescription").html(stringvalues);
    setTimeout(function() {
        $("#viewMemberWaitDiv").hide();
        $("#viewMemberContentDiv").show();
    }, 1000);
}

function setEditTeamMemberId(memberId, memberName, memberPosition, memberImage, aboutMember, imagePath) {
    $("#memberId").val(memberId);
    $("#updateMemberName").val(memberName);
    $("#updateMemberPosition").val(memberPosition);
    //$(".custimgshow .btn.btn-default ").attr('enabled',true);
    //var testnew = atob(aboutMember);
    if (memberImage != "") {
        var image = '<img src="' + imagePath + memberImage + '" border="0"/>';
        $("#editimageshow").html(image);
        $(".custimgshow .btn.btn-default ").hide();
        $(".custimgshow input[type=text]").val(memberImage);
        $("#update_team_mem_remove").show();
    } else {
        var image = '<img src="' + imagePath + 'defaultMember.png" border="0"/>';
        $("#editimageshow").html('');
        $(".custimgshow .btn.btn-default ").show();
        $(".custimgshow input[type=text]").val('');
        $("#update_team_mem_remove").hide();


    }


    str = atob(aboutMember);
    var stringvalues = strreplacecharte(str);

    //var test1 = testnew.replace(/(<([^>]+)>)/ig,"");
    $("#updateAboutMember").summernote("code", stringvalues);
}

function setDeleteTeamMemberId(memberId) {
    $("#viewMemberId").val(memberId);
}

function setEditFaqId(faqId, faqQuestion, faqAnswer) {
    $("#faqId").val(faqId);
    $("#updateFaqQuestion").val(atob(faqQuestion));
    str = atob(faqAnswer);
    var stringvalues = strreplacecharte(str);
    $("#updateFaqAnswer").summernote("code", stringvalues);
}
function setOffDeleteId(documentId) {
    $("#offDocId").val(documentId);
}

function sendFile(file, el) {
    var data = new FormData();
    data.append("file", file);
    console.log(data)

    $.ajax({
        data: data,
        type: "POST",
        url: baseURL + "offerings/Image_Upload",
        // url: baseURL + "offers/upload_loc",
        cache: false,
        contentType: false,
        processData: false,
        success: function(imageUrl) {
            console.log(imageUrl)

            var obj = jQuery.parseJSON(imageUrl);

            console.log(obj.link)
            $(el).summernote('editor.insertImage', obj.link);
        }
    });
}

function updateTeamMember(data, type) {
    var offerId = $("#offerId").val();
    $('#' + type + 'teamMemberwait_msg').slideDown(1000);
    $.ajax({
        url: baseURL + "Offerings/updateTeamMember",
        type: "POST",
        data: data,
        processData: false,
        contentType: false,
        success: function(result) {
            if (result == 1) {
                window.scrollTo(0, 0);
                $('#' + type + 'teamMembersuccess_content').html("Team Member details updated successfully");
                $('#' + type + 'teamMemberwait_msg').slideUp(1000);
                $('#' + type + 'teamMembersuccess_msg').slideDown(1000);
                //setTimeout("window.open('" + location.href + "','_self'); ", 2000);
                setTimeout("window.open('" + baseURL + "Offerings/teamMembers/" + offerId + "', '_self');", 2000);
            } else {
                window.scrollTo(0, 0);
                $('#' + type + 'teamMembererror_content').html(result);
                $('#' + type + 'teamMemberwait_msg').slideUp(1000);
                $('#' + type + 'teamMembererror_msg').slideDown(1000);
                setTimeout(function() {
                    $('#' + type + 'teamMembererror_msg').slideUp(1000);
                }, 4000);
            }
        },
    });
}

function updatePhoto(data, type) {
    $('#' + type + 'Photowait_msg').slideDown(1000);
    var offerId = $("#offerId").val();
    $.ajax({
        url: baseURL + "Offerings/updatePhoto",
        type: "POST",
        data: data,
        processData: false,
        contentType: false,
        success: function(result) {
            if (result == 1) {
                window.scrollTo(0, 0);
                $('#' + type + 'Photosuccess_content').html("Photo updated successfully");
                $('#' + type + 'Photowait_msg').slideUp(1000);
                $('#' + type + 'Photosuccess_msg').slideDown(1000);
                //setTimeout("window.open('" + location.href + "','_self'); ", 2000);
                setTimeout("window.open('" + baseURL + "Offerings/photos/" + offerId + "', '_self');", 2000);
            } else {
                window.scrollTo(0, 0);
                $('#' + type + 'Photoerror_content').html(result);
                $('#' + type + 'Photowait_msg').slideUp(1000);
                $('#' + type + 'Photoerror_msg').slideDown(1000);
                setTimeout(function() {
                    $('#' + type + 'Photoerror_msg').slideUp(1000);
                }, 4000);
            }
        },
    });
}

function updateFaq(data, type) {
    $('#' + type + 'Faqwait_msg').slideDown(1000);
    var offerId = $("#offerId").val();
    $.ajax({
        url: baseURL + "Offerings/updateFaq",
        type: "POST",
        data: data,
        processData: false,
        contentType: false,
        success: function(result) {
            if (result == 1) {
                window.scrollTo(0, 0);
                $('#' + type + 'Faqsuccess_content').html("Faq updated successfully");
                $('#' + type + 'Faqwait_msg').slideUp(1000);
                $('#' + type + 'Faqsuccess_msg').slideDown(1000);
                //setTimeout("window.open('" + location.href + "','_self'); ", 2000);
                setTimeout("window.open('" + baseURL + "Offerings/faq/" + offerId + "', '_self');", 2000);
            } else {
                window.scrollTo(0, 0);
                $('#' + type + 'Faqerror_content').html(result);
                $('#' + type + 'Faqwait_msg').slideUp(1000);
                $('#' + type + 'Faqerror_msg').slideDown(1000);
                setTimeout(function() {
                    $('#' + type + 'Faqerror_msg').slideUp(1000);
                }, 4000);
            }
        },
    });
}

function changeAccessStatus(documentId) {
    $.ajax({
        url: baseURL + "Offerings/changeAccessStatus",
        type: "POST",
        data: { documentId: documentId },
        success: function(result) {
            window.location.href = location.href;
        }
    });
}

function changeusersAccessStatus(documentId) {
    $.ajax({
        url: baseURL + "Offerings/changeusersAccessStatus",
        type: "POST",
        data: { documentId: documentId },
        success: function(result) {
            window.location.href = location.href;
        }
    });
}

function tabscontent(val) {

    // $('#offering_aboutcompany_status,#offering_content_status,#offering_glance_status,#investment_summary_status').iCheck('destroy');

    if (val == "Offering Details") {
        $("#offerdDetails_div_id").show();
        var x = $("#offerdDetails_div_id").offset();
        $('html, body').animate({
            scrollTop: x.top - 2500
        }, 'slow');
        $("#Content_div_id,#Team_div_id,#faq_div_id,#Image_div_id,#photo_div_id,#documents_div_id").hide();

    }
    if (val == "Offering Content") {
        $("#Content_div_id").show();
        var x = $("#Content_div_id").offset();
        $('html, body').animate({
            scrollTop: x.top - 2500
        }, 'slow');
        $("#offerdDetails_div_id,#Team_div_id,#faq_div_id,#Image_div_id,#photo_div_id,#documents_div_id").hide();

    }
    if (val == "Team Members") {
        $("#Team_div_id").show();
        var x = $("#Team_div_id").offset();
        $('html, body').animate({
            scrollTop: x.top - 2500
        }, 'slow');
        $("#offerdDetails_div_id,#Content_div_id,#faq_div_id,#Image_div_id,#photo_div_id,#documents_div_id").hide();

    }
    if (val == "FAQ") {
        $("#faq_div_id").show();
        var x = $("#faq_div_id").offset();
        $('html, body').animate({
            scrollTop: x.top - 2500
        }, 'slow');
        $("#offerdDetails_div_id,#Content_div_id,#Team_div_id,#Image_div_id,#photo_div_id,#documents_div_id").hide();

    }

    if (val == "Offering Images") {
        $("#Image_div_id").show();
        var x = $("#Image_div_id").offset();
        $('html, body').animate({
            scrollTop: x.top - 2500
        }, 'slow');
        $("#offerdDetails_div_id,#Content_div_id,#Team_div_id,#faq_div_id,#photo_div_id,#documents_div_id").hide();

    }
    if (val == "Photos") {
        $("#photo_div_id").show();
        var x = $("#photo_div_id").offset();
        $('html, body').animate({
            scrollTop: x.top - 2500
        }, 'slow');
        $("#offerdDetails_div_id,#Content_div_id,#Team_div_id,#faq_div_id,#Image_div_id,#documents_div_id").hide();

    }
    if (val == "View Documents") {
        $("#documents_div_id").show();
        var x = $("#documents_div_id").offset();
        $('html, body').animate({
            scrollTop: x.top - 2500
        }, 'slow');
        $("#offerdDetails_div_id,#Content_div_id,#Team_div_id,#faq_div_id,#Image_div_id,#photo_div_id").hide();

    }

}

$(document).ready(function() {

    $("#update_team_mem_remove").click(function() {
        //alert('test');
        $(".custimgshow input[type=text]").val('');
        $("#editimageshow").html('');
        $("#update_team_mem_remove").hide();
        $(".custimgshow .btn.btn-default ").show();
    
    
    });

    $('li').click(function() {
        $('li').removeClass("active");
        $(this).addClass("active");
    });

    $('#addDoc').click(function() {
        var countdoc_div = $('.append_fileclass').length;
        var updatedoc_cdiv = countdoc_div;
        updatedoc_cdiv++;

        var content = ' <div class="form-group append_fileclass" id="append_file_' + updatedoc_cdiv + '"><label class="col-sm-4 control-label">Tags </label><div class="col-sm-7"><input type="text" name="offeringtags[]" id="offeringtags" class="form-control" placeholder="Tags"></div><div class="col-sm-1"><div class="input-group-addon remove_doc" data-id=' + updatedoc_cdiv + '> <i class="fa fa-times"></i></div></div></div>';

        $('.append_fileclass:last').after(content);
    });


    $('body').delegate('.remove_doc', 'click', function() {
        $('#append_file_' + $(this).attr('data-id')).remove();
    });

    $("#unitPrice,#maxAmount").keyup(function() {
        offerUnits();
    });

    $('body').delegate('.offeringAddDoc', 'click', function() {
       
        var closeBtn = $("#closeBtnUrl").val();
        var updateDocDivCount = $('.offeringAppendFileClass').length;
        updateDocDivCount++;
        var content = '<div class="offeringAppendFileClass" id="offeringAppendFile' + updateDocDivCount + '"><div class="form-group" style="clear:both;" ><label class="col-sm-4 control-label">Document Title <span class="redtxt">*</span></label><div class="col-sm-7"><input type="text" name="documentTitle[]" id="documentTitle' + updateDocDivCount + '" required="" class="form-control" placeholder="Document Title"></div><br></div><div class="form-group"><label class="col-sm-4 control-label">Document File Name <span class="redtxt">*</span></label><div class="col-sm-7"><input type="file" class="docfiledynamic" name="userfile[]" id="userfile' + updateDocDivCount + '" required="" placeholder="Document File Name"></div><div class="col-sm-1"><div class="offeringRemoveDoc" data-id="' + updateDocDivCount + '"><img src="' + closeBtn + '" /></div></div></div></div>';
        $('.offeringAppendFileClass:last').after(content);
       
    });

    $('body').delegate('.offeringRemoveDoc', 'click', function() {
        $('#offeringAppendFile' + $(this).attr('data-id')).remove();
    });
});

$(document).ready(function() {

    $(".domain_verification").click(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#Clientwait_msg').slideDown(1000);
        
        // var ca_id = $(this).data("ca-id");
        var ca_id = $('#dmain_verifyId').val();

        $.ajax({
            url: baseURL + 'dashboard/domainVerificationProcess',
            type: "POST",
            data: {
                'ca_id': ca_id,
            },
            success: function(result) {

                if (result == 'site_found') {

                    window.scrollTo(0, 0);

                    //console.log(result);

                    $("#Clientsuccess_content").html('Domain verified successfully.');
                    $('#Clientwait_msg').slideUp(1000);
                    $('#Clientsuccess_msg').slideDown(1000);
                    setTimeout(function() {
                        $("#Clientsuccess_msg").slideUp(1000);
                        window.location.href = baseURL + 'dashboard/clients';
                    }, 2000);

                } else if (result == 'site_not_found') {
                    window.scrollTo(0, 0);
                    $('#Clienterror_content').html('Domain not verified.');
                    $('#Clientwait_msg').slideUp(1000);
                    $('#Clienterror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#Clienterror_msg').slideUp(1000);
                        window.location.href = baseURL + 'dashboard/clients';
                    }, 4000);
                    return false;


                }
            },
        });

    });

   
    $('#client_con_stat').click(function(){
        if ($('#acc_type_joint').is(':checked') || $('#acc_type_individual').is(':checked') || $('#acc_type_entity').is(':checked')) {
        }
        else{
            window.scrollTo(0, 0);
            $('#editClientacctypeerror_content').slideUp(1000);
            $('#editClientacctypeerror_msg').slideDown(1000);
            setTimeout(function() {
                $('#editClientacctypeerror_msg').slideUp(1000);
            }, 4000);
            return false;
        }
    });


    $(".send_invitation").on('click', function() {


        var client_id = $(this).data('client_id');
        var client_name = $(this).data('client_name');
        console.log(client_id);
        console.log(client_name);
        $("#sendInvitation").attr("data-client_id", client_id);
        $("#sendInvitation").attr("data-client_uname", client_name);
    });

    $(".send_invitationAdmin").on('click', function() {
        var client_id = $(this).data('client_id');
        var client_name = $(this).data('client_name');
        console.log(client_id);
        console.log(client_name);
        $("#sendInvitationClientAdmin").attr("data-client_id", client_id);
        $("#sendInvitationClientAdmin").attr("data-client_uname", client_name);
    });

    $("#sendInvitation").click(function(e) {
        console.log('Client_id' + $(this).data("client_id"));
        console.log('Client_name' + $(this).data('client_uname'));
        var ca_id1 = $(this).data("client_id");
        $.ajax({
            url: baseURL + 'dashboard/checkClientPasswordStatus',
            type: "POST",
            data: {
                'ca_id': ca_id1,
            },
            success: function(result) {
                if (result == 1) {
                    console.log('reset');
                    // resetAdminPassword(ca_id1);
                } else if (result == 2) {
                    console.log('setadmin');
                    // setAdminPassword(ca_id1);
                } else {
                    return false;
                }
            },
        });
        // return false;
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#sendInvitationWaitMsg').slideDown(1000);

        var ca_id = $(this).data("client_id");
        var ca_name = $(this).data('client_uname');

        $.ajax({
            url: baseURL + 'dashboard/sendInvitationProcess',
            type: "POST",
            data: {
                'ca_id': ca_id,
                'ca_name': ca_name,
            },
            success: function(result) {
                console.log(result);

                if (result == 1) {

                    window.scrollTo(0, 0);


                    $("#sendInvitationSuccessContent").html('Invitation sent successfully.');
                    $('#sendInvitationWaitMsg').slideUp(1000);
                    $('#sendInvitationSuccessMsg').slideDown(1000);
                    setTimeout(function() {
                        $("#sendInvitationSuccessMsg").slideUp(1000);
                        window.location.href = baseURL + 'dashboard/clients';
                    }, 2000);

                } else {
                    window.scrollTo(0, 0);
                    $('#sendInvitationErrorContent').html('Something went wrong.');
                    $('#sendInvitationWaitMsg').slideUp(1000);
                    $('#sendInvitationErrorMsg').slideDown(1000);
                    setTimeout(function() {
                        $('#sendInvitationErrorMsg').slideUp(1000);
                        window.location.href = baseURL + 'dashboard/clients';
                    }, 4000);
                    return false;


                }
            },
        });

    });
    $("#sendInvitationClientAdmin").click(function(e) {
        console.log('Client_id' + $(this).data("client_id"));
        console.log('Client_name' + $(this).data('client_uname'));
        // var ca_id1 = $(this).data("client_id");
        // $.ajax({
        //     url: baseURL + 'dashboard/checkClientPasswordStatus',
        //     type: "POST",
        //     data: {
        //         'ca_id': ca_id1,
        //     },
        //     success: function(result) {
        //         if (result == 1) {
        //             console.log('reset');
        //             // resetAdminPassword(ca_id1);
        //         } else if (result == 2) {
        //             console.log('setadmin');
        //             // setAdminPassword(ca_id1);
        //         } else {
        //             return false;
        //         }
        //     },
        // });
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#sendInvitationWaitMsg').slideDown(1000);

        var ca_id = $(this).data("client_id");
        var ca_name = $(this).data('client_uname');

        $.ajax({
            url: baseURL + 'Dashboard/sendInvitationProcessAdmin',
            type: "POST",
            data: {
                'ca_id': ca_id,
                'ca_name': ca_name,
            },
            success: function(result) {
                if (result == 1) {
                    window.scrollTo(0, 0);
                    $("#sendInvitationSuccessContent").html('Invitation sent successfully.');
                    $('#sendInvitationAdminWaitMsg').slideUp(1000);
                    $('#sendInvitationAdminSuccessMsg').slideDown(1000);
                    setTimeout(function() {
                        $("#sendInvitationAdminSuccessMsg").slideUp(1000);
                        window.location.href = baseURL + 'dashboard/clientUser';
                    }, 2000);

                } else {
                    window.scrollTo(0, 0);
                    $('#sendInvitationErrorContent').html('Something went wrong.');
                    $('#sendInvitationAdminWaitMsg').slideUp(1000);
                    $('#sendInvitationAdminErrorMsg').slideDown(1000);
                    setTimeout(function() {
                        $('#sendInvitationAdminErrorMsg').slideUp(1000);
                        window.location.href = baseURL + 'dashboard/clientUser';
                    }, 4000);
                    return false;


                }
            },
        });

    });

    $("#addOfferingDocument").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#offeringDocwait_msg').slideDown(1000);
        var offerId = $("#offerId").val();
        var data = new FormData(this);
        $.ajax({
            url: baseURL + "Offerings/offeringDoc_ctrl",
            type: "POST",
            data: data,
            processData: false,
            contentType: false,
            success: function(result) {
                if (result == 1) {
                    window.scrollTo(0, 0);
                    $('#offeringDocsuccess_content').html("Offering Document added successfully");
                    $('#offeringDocwait_msg').slideUp(1000);
                    $('#offeringDocsuccess_msg').slideDown(1000);
                    //setTimeout("window.open('" + location.href + "','_self');", 2000);
                    setTimeout("window.open('" + baseURL + "Offerings/viewDocuments/" + offerId + "', '_self');", 2000);
                } else {
                    window.scrollTo(0, 0);
                    $('#offeringDocerror_content').html(result);
                    $('#offeringDocwait_msg').slideUp(1000);
                    $('#offeringDocerror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#offeringDocerror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        });
    });

    $("#editClientConfig").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#editClientConfigwait_msg').slideDown(1000);
        var data = $(this).serialize();
        $.ajax({
            url: baseURL + "dashboard/editclientconfig_ctrl",
            type: "POST",
            data: data,
            success: function(result) {
                if (result == 1) {
                    window.scrollTo(0, 0);
                    $('#editClientConfigsuccess_content').html("Updated successfully");
                    $('#editClientConfigwait_msg').slideUp(1000);
                    $('#editClientConfigsuccess_msg').slideDown(1000);
                    setTimeout(function() {
                        window.location.href = baseURL + 'dashboard/clientconfiguration';
                    }, 4000);
                } else {
                    window.scrollTo(0, 0);
                    $('#editClientConfigerror_content').html(result);
                    $('#editClientConfigwait_msg').slideUp(1000);
                    $('#editClientConfigerror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#editClientConfigerror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        });
    });


    $('body').delegate('.offeringRemoveDoc', 'click', function() {
        $('#offeringAppendFile' + $(this).attr('data-id')).remove();
    });
    $('body').delegate('.offeringAddDoccreate', 'click', function() {
        var closeBtn = $("#closeBtnUrl").val();
        var updateDocDivCount = $('.offeringAppendFileClass').length;
        updateDocDivCount++;
        var content = '<div class="offeringAppendFileClass" id="offeringAppendFile' + updateDocDivCount + '"><div class="form-group" style="clear:both;" ><label class="col-sm-4 control-label">Document Title <span class="redtxt">*</span></label><div class="col-sm-7"><input type="text" name="documentTitle[]" id="documentTitle' + updateDocDivCount + '" required="" class="form-control" placeholder="Document Title"></div><br></div><div class="form-group"><label class="col-sm-4 control-label">Document File Name <span class="redtxt">*</span></label><div class="col-sm-7"><input type="file" class="docfiledynamiccreate" name="userfile[]" id="userfile' + updateDocDivCount + '" required="" placeholder="Document File Name"></div><div class="col-sm-1"><div class="offeringRemoveDoccreate" data-id="' + updateDocDivCount + '"><img src="' + closeBtn + '" /></div></div></div></div>';
        $('.offeringAppendFileClass:last').after(content);
    });
    $('body').delegate('.offeringRemoveDoccreate', 'click', function() {
        $('#offeringAppendFile' + $(this).attr('data-id')).remove();
    });


    $("#startDate, #endDate,#dateFrom,#dateTo").datepicker({
        changeMonth: true,
        changeYear: true,
        todayHighlight: true,
        //        startDate: "today",
        format: "mm-dd-yyyy"
    });
    $("#startDate,#endDate,#dob").mask("00-00-0000");

    $("#dealType").change(function() {
        var dealType = $("#dealType").val();


        $("#displayMarketYes").attr("disabled", false);
        $("#displayMarketNo").attr("disabled", false);
        $("#displayMarket").iCheck('update');

        if (dealType == 'Demo') {
            // $(".icheck").attr("checked", true);
            $(".marketNo").find("div").addClass("checked");
            $(".marketYes").find("div").removeClass("checked");

            // $(".marketYes").find("class").attr("checked", false);

            // $(".marketNo").addClass("checked");

            $("#demoOffPasswd").show();
            $("#demoofferPassword").show();
            $("#demoofferPassword").attr("required", true);
            $("#displayMarketNo").attr("checked", true);
            $("#displayMarketNo").iCheck('check');
            $("#displayMarketYes").iCheck('uncheck');
            $("#displayMarketYes").attr("checked", false);
            $("#displayMarketYes").attr("disabled", true);
            $("#displayMarketNo").attr("disabled", false);

        } else {
            // $(".marketNo").addClass("checked");
            // $(".marketYes").addClass("checked");
            $(".marketYes").find("div").addClass("checked");
            $(".marketNo").find("div").removeClass("checked");
            $("#demoofferPassword").attr("required", false);

            $("#demoOffPasswd").hide();
            $("#demoofferPassword").hide();
            $("#displayMarketYes").attr("disabled", false);
            $("#displayMarketNo").attr("disabled", false);
            $("#displayMarketYes").attr("checked", true);
            $("#displayMarketYes").iCheck('check');

            $("#displayMarketNo").iCheck('uncheck');
            $("#displayMarketNo").attr("checked", false);


        }

    });


    $("#createOffer").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);

        //var paymentmethod=$(".payemntoption").val();
        var checkedNum = $('input[name="payemntoption[]"]:checked').length;
        var issuerId = $("#issuerId").val();
        var offerName = $("#offerName").val();
        var typeOffering = $("#typeOffering").val();
        var offeringType = $("#offeringType").val();
        var dealType = $("#dealType").val();
        var targetAmount = $("#targetAmount").val();
        var maxAmount = $("#maxAmount").val();
        var minSubAmount = $("#minSubAmount").val();
        var startDate = $("#startDate").val();
        var endDate = $("#endDate").val();
        var stampingText = $("#stampingText").val();
        if (!checkedNum || issuerId == '' && offerName == '' && typeOffering == '' && offeringType == '' && dealType == '' && targetAmount == '' && maxAmount == '' && minSubAmount == '' && startDate == '' && endDate == '' && stampingText == '') {
            $('#showpaymeterr').html('<div style="color:red;font-size:15px;margin-left:30px;">Please fill the required fields.</div>');


            return false;
        }
        $('#showpaymeterr').html();

        $('#createOfferwait_msg').slideDown(1000);
        dealType = $('#dealType').val();
        
        var data = new FormData(this);
        $.ajax({
            url: baseURL + "offerings/createOffer_ctrl",
            type: "POST",
            data: data,
            processData: false,
            contentType: false,
            success: function(result) {
                if (!isNaN(result)) {
                    window.scrollTo(0, 0);
                    $('#createOffersuccess_content').html("Offer added successfully");
                    $('#createOfferwait_msg').slideUp(1000);
                    $('#createOffersuccess_msg').slideDown(1000);
                    setTimeout("window.open('" + baseURL + "offerings/editOffer/" + btoa(result) + "', '_self');", 2000);
                    //                    setTimeout("window.open('" + baseURL + "offers', '_self');", 2000);
                } else {
                    window.scrollTo(0, 0);
                    $('#createOffererror_content').html(result);
                    $('#createOfferwait_msg').slideUp(1000);
                    $('#createOffererror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#createOffererror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        });
    });

    $("#deleteOfferForm").submit(function(e) {
        e.preventDefault();
        $("#delOfferwait_msg").slideDown(1000);
        var data = $(this).serialize();
        $.ajax({
            url: baseURL + "offerings/deleteOfferCtrl",
            type: "POST",
            data: data,
            dataType: "JSON",
            success: function(result) {
                var data = eval(result);
                if (data.result == 1) {
                    $("#delOfferwait_msg").slideUp(1000);
                    $('#delOffersuccess_content').html(data.message);
                    $("#delOffersuccess_msg").slideDown(1000);
                    setTimeout("window.open('" + location.href + "','_self'); ", 2000);
                } else if (data.result == 0) {
                    $("#delOfferwait_msg").slideUp(1000);
                    $('#delOffererror_content').html(data.message);
                    $("#delOffererror_msg").slideDown(1000);
                    setTimeout(function() {
                        $('#delOffererror_msg').slideUp(1000);
                    }, 4000);
                }

            },
        });
    });

    $("#deleteTeamMember").submit(function(e) {
        e.preventDefault();
        $('#deleteTeamMemberDiv').scrollTop(0);
        $('#deleteTeamMemberwait_msg').slideDown(1000);
        var data = new FormData(this);
        $.ajax({
            url: baseURL + "offerings/deleteTeamMember",
            type: "POST",
            data: data,
            processData: false,
            contentType: false,
            success: function(result) {
                if (result == 1) {
                    window.scrollTo(0, 0);
                    $('#deleteTeamMembersuccess_content').html("Team Member deleted successfully");
                    $('#deleteTeamMemberwait_msg').slideUp(1000);
                    $('#deleteTeamMembersuccess_msg').slideDown(1000);
                    setTimeout("window.open('" + location.href + "','_self'); ", 2000);
                } else {
                    window.scrollTo(0, 0);
                    $('#deleteTeamMembererror_content').html(result);
                    $('#deleteTeamMemberwait_msg').slideUp(1000);
                    $('#deleteTeamMembererror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#deleteTeamMembererror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        });
    });
    $(".offeringContentSubmit").click(function() {
        $("#updateOfferingContent").submit();
    });
    $("#editOffer").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        var checkedNum = $('input[name="payemntoption[]"]:checked').length;
        if (!checkedNum) {
            $('#showpaymeterr').html('<span style="color:red;font-size:15px;">Please select the payment type.</span>');

            return false;
        }

        $('#editOfferwait_msg').slideDown(1000);
        dealType = $('#dealType').val();
        
        
        var data = $(this).serialize();
        var offerId = $("#offerId").val();
        $.ajax({
            url: baseURL + "offerings/editOffer_ctrl",
            type: "POST",
            data: data,
            success: function(result) {
                if (result == 1) {
                    window.scrollTo(0, 0);
                    $('#editOffersuccess_content').html("Offer updated successfully");
                    $('#editOfferwait_msg').slideUp(1000);
                    $('#editOffersuccess_msg').slideDown(1000);
                    //setTimeout("window.open('" + baseURL + "offers', '_self');", 2000);
                    setTimeout("window.open('" + baseURL + "offerings/editOffer/" + offerId + "', '_self');", 2000);
                } else {
                    window.scrollTo(0, 0);
                    $('#editOffererror_content').html(result);
                    $('#editOfferwait_msg').slideUp(1000);
                    $('#editOffererror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#editOffererror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        });
    });

    $("#updateOfferingContent").submit(function(e) {
        e.preventDefault();

        window.scrollTo(0, 0);
        $('#updateOfferingContentwait_msg').slideDown(1000);
        var data = $(this).serialize();
        var offerId = $("#offerId").val();
        $.ajax({
            url: baseURL + "offerings/updateOfferingContent",
            type: "POST",
            data: data,
            success: function(result) {
                if (result == 1) {
                    window.scrollTo(0, 0);
                    $('#updateOfferingContentsuccess_content').html("Offering content updated successfully");
                    $('#updateOfferingContentwait_msg').slideUp(1000);
                    $('#updateOfferingContentsuccess_msg').slideDown(1000);
                    //setTimeout("window.open('" + baseURL + "offerings/editOfferingContent/" + offerId + "', '_self');", 2000);
                    setTimeout("window.open('" + baseURL + "offerings/editOfferingContent/" + offerId + "', '_self');", 2000);
                } else {
                    window.scrollTo(0, 0);
                    $('#updateOfferingContenterror_content').html(result);
                    $('#updateOfferingContentwait_msg').slideUp(1000);
                    $('#updateOfferingContenterror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#updateOfferingContenterror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        });

    });

    $("#updateOfferingImg").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#updateOfferingImgwait_msg').slideDown(1000);
        var data = new FormData(this);
        var offerId = $("#offerId").val();
        $.ajax({
            url: baseURL + "offerings/updateOfferingImage",
            type: "POST",
            data: data,
            processData: false,
            contentType: false,
            success: function(result) {
                if (result == 1) {
                    window.scrollTo(0, 0);
                    $('#updateOfferingImgsuccess_content').html("Offering Images updated successfully");
                    $('#updateOfferingImgwait_msg').slideUp(1000);
                    $('#updateOfferingImgsuccess_msg').slideDown(1000);
                    setTimeout("window.open('" + baseURL + "offerings/editOfferingImg/" + offerId + "', '_self');", 2000);
                } else {
                    window.scrollTo(0, 0);
                    $('#updateOfferingImgerror_content').html(result);
                    $('#updateOfferingImgwait_msg').slideUp(1000);
                    $('#updateOfferingImgerror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#updateOfferingImgerror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        });
    });

    $("#deletePreviewimage").submit(function(e) {
    e.preventDefault();
    window.scrollTo(0, 0);
    $('#deletePreviewimageDivwait_msg').slideDown(1000);
    var data = $(this).serialize();
    $.ajax({
        url: baseURL + "offerings/deletePreviewimage_ctrl",
        type: "POST",
        data: data,
        success: function(result) {
            if (result == 1) {
                window.scrollTo(0, 0);
                $('#deletePreviewimageDivsuccess_content').html("Preview Image Deleted Successfully");
                $('#deletePreviewimageDivwait_msg').slideUp(1000);
                $('#deletePreviewimageDivsuccess_msg').slideDown(1000);
                $('#deletePreviewimageDivsuccess_msg').slideUp(1000);
                setTimeout(function() {
                    $('#deletePreviewimageDivDiv').modal('hide');
                    $('#hideRemovebtn').hide();
                    $('#offeringPreviewImage1').html('');

                }, 2000);
                setTimeout("window.open('" + location.href + "','_self'); ", 2000);


            } else {
                window.scrollTo(0, 0);
                $('#deletePreviewimageDiverror_content').html(result);
                $('#deletePreviewimageDivwait_msg').slideUp(1000);
                $('#deletePreviewimageDiverror_msg').slideDown(1000);
                setTimeout(function() {
                    $('#deletePreviewimageDiverror_msg').slideUp(1000);
                }, 4000);
            }
        },
    });
});

$("#deleteProductLogoimage").submit(function(e) {
    e.preventDefault();
    window.scrollTo(0, 0);
    $('#deleteProductLogoimageDivwait_msg').slideDown(1000);
    var data = $(this).serialize();
    $.ajax({
        url: baseURL + "offerings/deleteProductLogoimage_ctrl",
        type: "POST",
        data: data,
        success: function(result) {
            if (result == 1) {
                window.scrollTo(0, 0);
                $('#deleteProductLogoimageDivsuccess_content').html("Product Logo Deleted Successfully");
                $('#deleteProductLogoimageDivwait_msg').slideUp(1000);
                $('#deleteProductLogoimageDivsuccess_msg').slideDown(1000);
                $('#deleteProductLogoimageDivsuccess_msg').slideUp(1000);
                setTimeout(function() {
                    $('#deleteProductLogoimageDivDiv').modal('hide');
                    $('#hideRemovebtn').hide();
                    $('#offeringPreviewImage1').html('');

                }, 2000);
                setTimeout("window.open('" + location.href + "','_self'); ", 2000);


            } else {
                window.scrollTo(0, 0);
                $('#deleteProductLogoimageDiverror_content').html(result);
                $('#deleteProductLogoimageDivwait_msg').slideUp(1000);
                $('#deleteProductLogoimageDiverror_msg').slideDown(1000);
                setTimeout(function() {
                    $('#deleteProductLogoimageDiverror_msg').slideUp(1000);
                }, 4000);
            }
        },
    });
});

$("#deleteCoverimage").submit(function(e) {
    e.preventDefault();
    window.scrollTo(0, 0);
    $('#deleteCoverimageDivwait_msg').slideDown(1000);
    var data = $(this).serialize();
    $.ajax({
        url: baseURL + "offerings/deleteCoverimage_ctrl",
        type: "POST",
        data: data,
        success: function(result) {
            if (result == 1) {
                window.scrollTo(0, 0);
                $('#deleteCoverimageDivsuccess_content').html("Cover Image Deleted Successfully");
                $('#deleteCoverimageDivwait_msg').slideUp(1000);
                $('#deleteCoverimageDivsuccess_msg').slideDown(1000);
                $('#deleteCoverimageDivsuccess_msg').slideUp(1000);
                setTimeout(function() {
                    $('#deleteCoverimageDivDiv').modal('hide');
                    $('#hideRemovebtn').hide();
                    $('#offeringPreviewImage1').html('');

                }, 2000);
                setTimeout("window.open('" + location.href + "','_self'); ", 2000);


            } else {
                window.scrollTo(0, 0);
                $('#deleteCoverimageDiverror_content').html(result);
                $('#deleteCoverimageDivwait_msg').slideUp(1000);
                $('#deleteCoverimageDiverror_msg').slideDown(1000);
                setTimeout(function() {
                    $('#deleteCoverimageDiverror_msg').slideUp(1000);
                }, 4000);
            }
        },
    });
});

$("#deletePhoto").submit(function(e) {
    e.preventDefault();
    $('#deletePhotoDiv').scrollTop(0);
    $('#deletePhotowait_msg').slideDown(1000);
    var data = new FormData(this);
    $.ajax({
        url: baseURL + "offerings/deletePhoto",
        type: "POST",
        data: data,
        processData: false,
        contentType: false,
        success: function(result) {
            if (result == 1) {
                window.scrollTo(0, 0);
                $('#deletePhotosuccess_content').html("Photo deleted successfully");
                $('#deletePhotowait_msg').slideUp(1000);
                $('#deletePhotosuccess_msg').slideDown(1000);
                setTimeout("window.open('" + location.href + "','_self'); ", 2000);
            } else {
                window.scrollTo(0, 0);
                $('#deletePhotoerror_content').html(result);
                $('#deletePhotowait_msg').slideUp(1000);
                $('#deletePhotoerror_msg').slideDown(1000);
                setTimeout(function() {
                    $('#deletePhotoerror_msg').slideUp(1000);
                }, 4000);
            }
        },
    });
});

$("#deleteFaq").submit(function(e) {
        e.preventDefault();
        $('#deleteFaqDiv').scrollTop(0);
        $('#deleteFaqwait_msg').slideDown(1000);
        var data = new FormData(this);
        $.ajax({
            url: baseURL + "offerings/deleteFaq",
            type: "POST",
            data: data,
            processData: false,
            contentType: false,
            success: function(result) {
                if (result == 1) {
                    window.scrollTo(0, 0);
                    $('#deleteFaqsuccess_content').html("Faq deleted successfully");
                    $('#deleteFaqwait_msg').slideUp(1000);
                    $('#deleteFaqsuccess_msg').slideDown(1000);
                    setTimeout("window.open('" + location.href + "','_self'); ", 2000);
                } else {
                    window.scrollTo(0, 0);
                    $('#deleteFaqerror_content').html(result);
                    $('#deleteFaqwait_msg').slideUp(1000);
                    $('#deleteFaqerror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#deleteFaqerror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        });
    });

    $("#deleteOfferingDocument").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#offeringDocumentwait_msg').slideDown(1000);
        var data = $(this).serialize();
        $.ajax({
            url: baseURL + "offerings/deleteOfferingDocument",
            type: "POST",
            data: data,
            success: function(result) {
                if (result == 1) {
                    window.scrollTo(0, 0);
                    $('#offeringDocumentsuccess_content').html("Offering Document deleted successfully");
                    $('#offeringDocumentwait_msg').slideUp(1000);
                    $('#offeringDocumentsuccess_msg').slideDown(1000);
                    setTimeout("window.open('" + location.href + "','_self'); ", 2000);
                } else {
                    window.scrollTo(0, 0);
                    $('#offeringDocumenterror_content').html(result);
                    $('#offeringDocumentwait_msg').slideUp(1000);
                    $('#offeringDocumenterror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#offeringDocumenterror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        });
    });

$('.offeringSectionoffOn').change(function() {

        var id = $(this).attr("data-id");
        var offerId = $("#offerId").val();

        if ($(this).is(":checked")) {
            status = '1';
        } else {
            status = '0';
        }

        var data = { status: status, id: id, offerId: offerId };
        $.ajax({
            url: baseURL + "offerings/offeringSectionoffOn",
            type: "POST",
            data: data,
            success: function(result) {
                if (result) {
                    setTimeout("window.open('" + location.href + "','_self'); ", 2000);
                }
            },
        });
    });

    $('#offering_glance_status').change(function() {


        var status = $(this).val();

        var offerId = $("#offerId").val();

        if ($('#offering_glance_status').is(":checked")) {
            status = '1';
        } else {
            status = '0';
        }

        var data = { status: status, offerId: offerId };
        $.ajax({
            url: baseURL + "offerings/offering_glance_status",
            type: "POST",
            data: data,
            success: function(result) {

                if (result) {
                    setTimeout("window.open('" + baseURL + "offerings/editOfferingContent/" + offerId + "', '_self');", 1000);
                }
            },
        });
    });

    $('#about_Team_status').change(function() {

        var status = $(this).val();


        var offerId = $("#offerId").val();

        if ($('#about_Team_status').is(":checked")) {
            status = '1';
        } else {
            status = '0';
        }

        var data = { status: status, offerId: offerId };
        $.ajax({
            url: baseURL + "offerings/about_Team_status",
            type: "POST",
            data: data,
            success: function(result) {

                if (result) {
                    setTimeout("window.open('" + location.href + "','_self'); ", 2000);
                }
            },
        });
    });


    $("#updateOfferingSection").submit(function(e) {
    e.preventDefault();
    window.scrollTo(0, 0);
    $('#updateOfferingSectionwait_msg').slideDown(1000);
    var data = $(this).serialize();
    $.ajax({
        url: baseURL + "offerings/updateOfferingSection_ctrl",
        type: "POST",
        data: data,
        success: function(result) {
            if (result == 1) {
                window.scrollTo(0, 0);
                $('#updateOfferingSectionsuccess_content').html("Update Offering Section successfully");
                $('#updateOfferingSectionwait_msg').slideUp(1000);
                $('#updateOfferingSectionsuccess_msg').slideDown(1000);
                setTimeout("window.open('" + location.href + "','_self'); ", 2000);
            } else {
                window.scrollTo(0, 0);
                $('#updateOfferingSectionerror_content').html(result);
                $('#updateOfferingSectionwait_msg').slideUp(1000);
                $('#updateOfferingSectionerror_msg').slideDown(1000);
                setTimeout(function() {
                    $('#updateOfferingSectionerror_msg').slideUp(1000);
                }, 4000);
            }
        },
    });
});

$("#updateOfferingContentOverview").submit(function(e) {
        e.preventDefault();

        window.scrollTo(0, 0);
        $('#updateOfferingContentwait_msg').slideDown(1000);
        var data = $(this).serialize();
        var offerId = $("#offerId").val();
        $.ajax({
            url: baseURL + "offerings/Overview_ctrl",
            type: "POST",
            data: data,
            success: function(result) {
                if (result == 1) {
                    window.scrollTo(0, 0);
                    $('#updateOfferingContentsuccess_content').html("Offering content updated successfully");
                    $('#updateOfferingContentwait_msg').slideUp(1000);
                    $('#updateOfferingContentsuccess_msg').slideDown(1000);
                    setTimeout("window.open('" + location.href + "','_self'); ", 2000);

                } else {
                    window.scrollTo(0, 0);
                    $('#updateOfferingContenterror_content').html(result);
                    $('#updateOfferingContentwait_msg').slideUp(1000);
                    $('#updateOfferingContenterror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#updateOfferingContenterror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        });

    });
    $("#updateinvestmentSummary").submit(function(e) {
        e.preventDefault();

        window.scrollTo(0, 0);
        $('#updateOfferingContentwait_msg').slideDown(1000);
        var data = $(this).serialize();
        var offerId = $("#offerId").val();
        $.ajax({
            url: baseURL + "offerings/investmentSummary_ctrl",
            type: "POST",
            data: data,
            success: function(result) {
                if (result == 1) {
                    window.scrollTo(0, 0);
                    $('#updateOfferingContentsuccess_content').html("Offering content updated successfully");
                    $('#updateOfferingContentwait_msg').slideUp(1000);
                    $('#updateOfferingContentsuccess_msg').slideDown(1000);
                    setTimeout("window.open('" + location.href + "','_self'); ", 2000);

                } else {
                    window.scrollTo(0, 0);
                    $('#updateOfferingContenterror_content').html(result);
                    $('#updateOfferingContentwait_msg').slideUp(1000);
                    $('#updateOfferingContenterror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#updateOfferingContenterror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        });

    });
    $("#updaterisksDisclosures").submit(function(e) {
        e.preventDefault();

        window.scrollTo(0, 0);
        $('#updateOfferingContentwait_msg').slideDown(1000);
        var data = $(this).serialize();
        var offerId = $("#offerId").val();
        $.ajax({
            url: baseURL + "offerings/risksDisclosures_ctrl",
            type: "POST",
            data: data,
            success: function(result) {
                if (result == 1) {
                    window.scrollTo(0, 0);
                    $('#updateOfferingContentsuccess_content').html("Offering content updated successfully");
                    $('#updateOfferingContentwait_msg').slideUp(1000);
                    $('#updateOfferingContentsuccess_msg').slideDown(1000);
                    setTimeout("window.open('" + location.href + "','_self'); ", 2000);

                } else {
                    window.scrollTo(0, 0);
                    $('#updateOfferingContenterror_content').html(result);
                    $('#updateOfferingContentwait_msg').slideUp(1000);
                    $('#updateOfferingContenterror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#updateOfferingContenterror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        });

    });

    $("#updateOfferingDocument").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#updateOfferingDocwait_msg').slideDown(1000);
        var data = new FormData(this);
        var offerId = $("#offerId").val();
        $.ajax({
            url: baseURL + "offerings/updateOfferingDocument",
            type: "POST",
            data: data,
            processData: false,
            contentType: false,
            success: function(result) {
                if (result == 1) {
                    window.scrollTo(0, 0);
                    $('#updateOfferingDocsuccess_content').html("Offering Document updated successfully");
                    $('#updateOfferingDocwait_msg').slideUp(1000);
                    $('#updateOfferingDocsuccess_msg').slideDown(1000);
                    setTimeout("window.open('" + baseURL + "offerings/viewDocuments/" + offerId + "', '_self');", 2000);
                } else {
                    window.scrollTo(0, 0);
                    $('#updateOfferingDocerror_content').html(result);
                    $('#updateOfferingDocwait_msg').slideUp(1000);
                    $('#updateOfferingDocerror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#updateOfferingDocerror_msg').slideUp(1000);
                    }, 4000);
                }
            },
        });
    });


    $('#progressStatus').change(function() {


        if ($('#progressStatus').is(":checked")) {
            $("#pergrepercent").show();
            $('input[name=progressvalues][type=radio]').attr('required', true);
        } else {
            $("#pergrepercent").hide();
            $('input[name=progressvalues][type=radio]').removeAttr('required');
        }



    });

    $("#addTeamMember").submit(function(e) {
        e.preventDefault();
        $('#addTeamMemberDiv').scrollTop(0);
        var data = new FormData(this);
        updateTeamMember(data, "add");
    });
    $("#updateTeamMember").submit(function(e) {
        e.preventDefault();
        $('#updateTeamMemberDiv').scrollTop(0);
        var data = new FormData(this);
        updateTeamMember(data, "update");
    });
    $("#addPhoto").submit(function(e) {
        $("#upload_image").attr('required', true);
        e.preventDefault();
        $('#addPhotoDiv').scrollTop(0);
        var data = new FormData(this);
        updatePhoto(data, "add");
    });
    $("#updatePhoto").submit(function(e) {
        $("#editphotoupload_image").attr('required', true);

        e.preventDefault();
        $('#updatePhotoDiv').scrollTop(0);
        var data = new FormData(this);
        updatePhoto(data, "update");
    });

$("#addFaq").submit(function(e) {
        e.preventDefault();
        $('#addFaqDiv').scrollTop(0);
        var data = new FormData(this);
        updateFaq(data, "add");
    });
    $("#updateFaq").submit(function(e) {
        e.preventDefault();
        $('#updateFaqDiv').scrollTop(0);
        var data = new FormData(this);
        updateFaq(data, "update");
    });


 ////////////////////CROP FEATURES
 $photoimage_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
        width: 150,
        height: 150,
        type: 'square' //circle

    },
    enforceBoundary: false,

    boundary: {
        width: 300,
        height: 300
    }
});

$('#upload_image').on('change', function() {
    var extsize = (this.files[0].size);
    var ext = this.files[0].name.split('.').pop();
    ext = ext.toLowerCase();
    if (extsize > 10506316) {
        $("#addPhotoerror_content").html("Choosen image is too large...");
        $("#addPhotoerror_msg").slideDown(1000);
        setTimeout(function() {
            $("#addPhotoerror_msg").slideUp(1000);
            $("#offeringPhoto").filestyle('clear');
            $('#upload_image').val('');
        }, 2000);
        return false;
    }

    $('#upload_imageExt').val(ext);

    var reader = new FileReader();
    reader.onload = function(event) {
        $photoimage_crop.croppie('bind', {
            url: event.target.result
        }).then(function() {
            console.log('jQuery bind complete');
        });
    }
    reader.readAsDataURL(this.files[0]);
    // this.value = null;
    $('#cropDiv').show();
});
var offerId = $('#offerId').val();

$('.crop_image').click(function(event) {
    var ext = $('#upload_imageExt').val();

    $('#addPhotowait_msg').slideDown(1000);
    $photoimage_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
            // size: 'original'
            // type: 'canvas',
            // type: 'base64',
            // format: 'jpeg',
            // size: { width: 600, height: 600 }
            // size: 'original'
    }).then(function(response) {
        $('#addphotoCropped').val(response);
        var data = new FormData($("#addPhoto")[0]);
        $.ajax({
            url: baseURL + "offerings/editaddphotos",
            type: "POST",
            dataType: 'json',
            data: data,
            processData: false,
            contentType: false,
            success: function(result) {

                if (result == 1) {
                    window.scrollTo(0, 0);
                    $('#addPhotosuccess_content').html("Photo updated successfully");
                    $('#addPhotowait_msg').slideUp(1000);
                    $('#addPhotosuccess_msg').slideDown(1000);
                    //setTimeout("window.open('" + location.href + "','_self'); ", 2000);
                    setTimeout("window.open('" + baseURL + "offerings/photos/" + offerId + "', '_self');", 2000);
                } else {
                    window.scrollTo(0, 0);
                    $('#addPhotoerror_content').html(result);
                    $('#addPhotowait_msg').slideUp(1000);
                    $('#addPhotoerror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#addPhotoerror_msg').slideUp(1000);
                    }, 4000);
                }
            }
        });
    })
});

$editimage_crop = $('#editphoto_demo').croppie({
    enableExif: true,
    viewport: {
        width: 150,
        height: 150,
        type: 'square' //circle

    },
    // enforceBoundary: false,

    boundary: {
        width: 300,
        height: 300
    }
});

$('#editphotoupload_image').on('change', function() {
    var extsize = (this.files[0].size);
    var ext = this.files[0].name.split('.').pop();
    ext = ext.toLowerCase();
    // if (ext != 'jpg' && ext != 'png' && ext != 'jpeg') {
    if (extsize > 10506316) {
        $("#updatePhotoerror_content").html("Choosen image is too large...");
        $("#updatePhotoerror_msg").slideDown(1000);
        setTimeout(function() {
            $("#updatePhotoerror_msg").slideUp(1000);
            $("#updatePhotoImage").filestyle('clear');
            $('#editphotoupload_image').val('');
        }, 2000);
        return false;
    }
    $('#editphotoupload_imageExt').val(ext);

    var reader = new FileReader();
    reader.onload = function(event) {
        $editimage_crop.croppie('bind', {
            url: event.target.result
        }).then(function() {
            console.log('jQuery bind complete');
        });
    }
    reader.readAsDataURL(this.files[0]);
    this.value = null;
    $('#editphotocropDiv').show();
});
var offerId = $('#offerId').val();

$('#editphotocrop_image').click(function(event) {
    var ext = $('#editphotoupload_imageExt').val();

    $('#updatePhotowait_msg').slideDown(1000);
    $editimage_crop.croppie('result', {
        type: 'canvas',
        size: 'original'
            // size: 'viewport'
            // type: 'base64',
            // format: 'jpeg',
            // size: { width: 600, height: 600 }
    }).then(function(response) {
        $('#editphotoCropped').val(response);
        var data = new FormData($("#updatePhoto")[0]);
        $.ajax({
            url: baseURL + "offerings/editphotoCropped",
            type: "POST",
            dataType: 'json',
            data: data,
            processData: false,
            contentType: false,
            success: function(result) {

                if (result == 1) {
                    window.scrollTo(0, 0);
                    $('#updatePhotosuccess_content').html("Photo updated successfully");
                    $('#updatePhotowait_msg').slideUp(1000);
                    $('#updatePhotosuccess_msg').slideDown(1000);
                    //setTimeout("window.open('" + location.href + "','_self'); ", 2000);
                    setTimeout("window.open('" + baseURL + "offerings/photos/" + offerId + "', '_self');", 2000);
                } else {
                    window.scrollTo(0, 0);
                    $('#updatePhotoerror_content').html(result);
                    $('#updatePhotowait_msg').slideUp(1000);
                    $('#updatePhotoerror_msg').slideDown(1000);
                    setTimeout(function() {
                        $('#updatePhotoerror_msg').slideUp(1000);
                    }, 4000);
                }
            }
        });
    })
});

 $memberImage_crop = $('#memberImage_demo').croppie({
    enableExif: true,
    viewport: {
        width: 245,
        height: 245,
        type: 'square' //circle
    },
    boundary: {
        width: 400,
        height: 400
    }
});

$('#addmemberImage').on('change', function() {
    var extsize = (this.files[0].size);
    var ext = this.files[0].name.split('.').pop();
    ext = ext.toLowerCase();
    $('#memberImageExt').val(ext);
    if (extsize > 10506316) {
        window.scrollTo(0, 0);
        $("#addteamMembererror_content").html("Choosen image is too large....");
        $("#addteamMembererror_msg").slideDown(1000);

        setTimeout(function() {
            $("#addteamMembererror_msg").slideUp(1000);
            $(".addmemimg input[type=text]").val('');
            //$("#crowdCheckLogo").filestyle('clear');
            $('#addmemberImage').val('');
        }, 2000);
        return false;
    }
    var reader = new FileReader();
    reader.onload = function(event) {
        $memberImage_crop.croppie('bind', {
            url: event.target.result
        }).then(function() {
            console.log('jQuery bind complete');
        });
    }
    reader.readAsDataURL(this.files[0]);
    this.value = null;
    $('#uploadmemberImageModal').modal('show');
});
var offerId = $('#offerId').val();
$('#crop_memberImage').click(function(event) {
    $('#offeringmemberImage').hide();
    var ext = $('#memberImageExt').val();

    $memberImage_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function(response) {
        $.ajax({
            //url: baseURL + "offerings/memberImage_crop",
            url: baseURL + "offerings/memberImage_crop",
            type: "POST",
            data: { "memberImage": response, "upload_imageExt": ext, "offerId": offerId },
            success: function(result) {

                $('#uploadmemberImageModal').modal('hide');
                //var data = '<img src="' + siteURL + "/assets/admin/img/offeringImage/" + result + '">';
                $('#memberImage').val(result);
                //$('#memberImageuploaded_image').html(data); console.log(data);
            }
        });
    })
});
/////////////
$editmemberImage_crop = $('#updatememberImage_crop_demo').croppie({
    enableExif: true,
    viewport: {
        width: 245,
        height: 245,
        type: 'square' //circle
    },
    boundary: {
        width: 400,
        height: 400
    }
});

$('#updateMemberImage').on('change', function() {
    var extsize = (this.files[0].size);
    var ext = this.files[0].name.split('.').pop();
    ext = ext.toLowerCase();
    $('#updatememberImageExt').val(ext);
    if (extsize > 10506316) {
        window.scrollTo(0, 0);
        $("#updateteamMembererror_content").html("Choosen image is too large....");
        $("#updateteamMembererror_msg").slideDown(1000);

        setTimeout(function() {
            $("#updateteamMembererror_msg").slideUp(1000);
            $(".custimgshow input[type=text]").val('');
            // $("#crowdCheckLogo").filestyle('clear');
            $('#updateMemberImage').val('');
        }, 2000);
        return false;
    }
    var reader = new FileReader();
    reader.onload = function(event) {
        $editmemberImage_crop.croppie('bind', {
            url: event.target.result
        }).then(function() {
            console.log('jQuery bind complete');
        });
    }
    reader.readAsDataURL(this.files[0]);
    this.value = null;
    $('#uploadupdatememberImage_cropModal').modal('show');
});
var offerId = $('#offerId').val();
$('#crop_updatememberImage_crop').click(function(event) {
    $('#offeringupdatememberImage_crop').hide();
    var ext = $('#updatememberImageExt').val();

    $editmemberImage_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function(response) {
        $.ajax({
            url: baseURL + "offerings/memberImage_crop",
            type: "POST",
            data: { "memberImage": response, "upload_imageExt": ext, "offerId": offerId },
            success: function(result) {
                console.log(result);

                $('#uploadupdatememberImage_cropModal').modal('hide');
                //var data = '<img src="' + siteURL + "/assets/admin/img/offeringImage/" + result + '">';
                $('#updatemember_Image').val(result);
                //$('#updatememberImage_cropuploaded_image').html(data); console.log(data);
            }
        });
    })
});
///////


//Create Offer//
$image_crop = $('#createphoto_demo').croppie({
    enableExif: true,
    viewport: {
        width: 245,
        height: 245,
        type: 'square' //circle
    },
    boundary: {
        width: 400,
        height: 400
    }
});

$('#editcreatephoto').on('change', function() {
    var extsize = (this.files[0].size);
    var ext = this.files[0].name.split('.').pop();
    ext = ext.toLowerCase();
    if (extsize > 10506316) {
        window.scrollTo(0, 0);
        $("#createOffererror_content").html("Choosen image is too large...");
        $("#createOffererror_msg").slideDown(1000);

        setTimeout(function() {
            $("#createOffererror_msg").slideUp(1000);
            $("#crowdCheckLogo").filestyle('clear');
            $('#editcreatecoverImage').val('');
        }, 2000);
        return false;
    }
    $('#createphotoExt').val(ext);

    var reader = new FileReader();
    reader.onload = function(event) {
        $image_crop.croppie('bind', {
            url: event.target.result
        }).then(function() {
            console.log('jQuery bind complete');
        });
    }
    reader.readAsDataURL(this.files[0]);
    this.value = null;
    $('#uploadcreatephotoModal').modal('show');
});
var offerId = $('#offerId').val();
$('#crop_createphoto').click(function(event) {
    $('#offeringcreatephoto').hide();
    var ext = $('#createphotoExt').val();

    $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function(response) {
        $.ajax({
            url: baseURL + "offerings/createphoto_crop",
            type: "POST",
            data: { "createphoto": response, "upload_imageExt": ext, "offerId": offerId },
            success: function(result) {

                $('#uploadcreatephotoModal').modal('hide');
                var data = '<img src="' + s3URL + "assets/admin/img/offeringPhotos/" + result + '">';
                $('#createphoto').val(result);
                $('#createphotouploaded_image').html(data);
            }
        });
    })
});
/////

$creatememberimage_crop = $('#creatememberImage_demo').croppie({
    enableExif: true,
    viewport: {
        width: 245,
        height: 245,
        type: 'square' //circle
    },
    boundary: {
        width: 400,
        height: 400
    }
});

$('#createaddmemberImage').on('change', function() {

    var ext = this.files[0].name.split('.').pop();
    ext = ext.toLowerCase();
    $('#creatememberImageExt').val(ext);

    var reader = new FileReader();
    reader.onload = function(event) {
        $creatememberimage_crop.croppie('bind', {
            url: event.target.result
        }).then(function() {
            console.log('jQuery bind complete');
        });
    }
    reader.readAsDataURL(this.files[0]);
    this.value = null;
    $('#uploadcreatememberImageModal').modal('show');
});
var offerId = $('#offerId').val();
$('#crop_creatememberImage').click(function(event) {
    var ext = $('#creatememberImageExt').val();

    $creatememberimage_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function(response) {
        $.ajax({
            url: baseURL + "offerings/memberImage_crop",
            type: "POST",
            data: { "memberImage": response, "upload_imageExt": ext, "offerId": offerId },
            success: function(result) {
                console.log(result);

                $('#uploadcreatememberImageModal').modal('hide');
                //var data = '<img src="' + siteURL + "/assets/admin/img/offeringImage/" + result + '">';
                $('#creatememberImage').val(result);
                console.log(result);
                //$('#updatecreatememberImage_cropuploaded_image').html(data); console.log(data);
            }
        });
    })
});
///
$createpreviewimage_crop = $('#createpreviewimage_demo').croppie({
    enableExif: true,
    viewport: {
        width: 245,
        height: 245,
        type: 'square' //circle
    },
    boundary: {
        width: 400,
        height: 400
    }
});

$('#editcreatepreviewImage').on('change', function() {
    var extsize = (this.files[0].size);
    var ext = this.files[0].name.split('.').pop();
    ext = ext.toLowerCase();
    if (extsize > 10506316) {
        window.scrollTo(0, 0);
        $("#createOffererror_content").html("Choosen image is too large...");
        $("#createOffererror_msg").slideDown(1000);

        setTimeout(function() {
            $("#createOffererror_msg").slideUp(1000);
            //$("#crowdCheckLogo").filestyle('clear');
            $('#editcreatepreviewImage').val('');
        }, 2000);
        return false;
    }

            $('#createpreviewImageExt').val(ext);

    var reader = new FileReader();
    reader.onload = function(event) {
        $createpreviewimage_crop.croppie('bind', {
            url: event.target.result
        }).then(function() {
            console.log('jQuery bind complete');
        });
    }
    reader.readAsDataURL(this.files[0]);
    this.value = null;
    $('#uploadcreatepreviewimageModal').modal('show');
});
var offerId = $('#offerId').val();
$('#crop_createpreviewimage').click(function(event) {
    $('#offeringcreatepreviewImage').hide();
    var ext = $('#createpreviewImageExt').val();

    $createpreviewimage_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function(response) {
        $.ajax({
            url: baseURL + "offerings/previewimage_crop",
            type: "POST",
            data: { "previewImage": response, "upload_imageExt": ext, "offerId": offerId },
            success: function(result) {

                $('#uploadcreatepreviewimageModal').modal('hide');
                var data = '<img src="' + s3URL + "assets/admin/img/offeringImage/" + result + '">';
                $('#createpreviewImage').val(result);
                $('#createpreviewImageuploaded_image').html(data);
                console.log(data);
            }
        });
    })
});
///
$createcoverImage_crop = $('#createcoverImage_demo').croppie({
    enableExif: true,
    viewport: {
        width: 600,
        height: 300,
        type: 'square' //circle
    },
    boundary: {
        width: 800,
        height: 500
    }
});

$('#editcreatecoverImage').on('change', function() {
    $('#cropimageName').val('2');
    var extsize = (this.files[0].size);
    var ext = this.files[0].name.split('.').pop();
    ext = ext.toLowerCase();
    if (extsize > 10506316) {
        window.scrollTo(0, 0);
        $("#createOffererror_content").html("Choosen image is too large...");
        $("#createOffererror_msg").slideDown(1000);

        setTimeout(function() {
            $("#createOffererror_msg").slideUp(1000);
            $("#crowdCheckLogo").filestyle('clear');
            $('#editcreatecoverImage').val('');
        }, 2000);
        return false;
    }
            $('#createcoverImageExt').val(ext);

    var reader = new FileReader();
    reader.onload = function(event) {
        $createcoverImage_crop.croppie('bind', {
            url: event.target.result
        }).then(function() {
            console.log('jQuery bind complete');
        });
    }
    reader.readAsDataURL(this.files[0]);
    this.value = null;
    $('#uploadcreatecoverImageModal').modal('show');
});
var offerId = $('#offerId').val();
$('#crop_createcoverImage').click(function(event) {
    $('#offeringcreatecoverImage').hide();
    var ext = $('#createcoverImageExt').val();

    $createcoverImage_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function(response) {
        $.ajax({
            url: baseURL + "offerings/coverImage_crop",
            type: "POST",
            data: { "coverImage": response, "upload_imageExt": ext, "offerId": offerId },
            success: function(result) {

                $('#uploadcreatecoverImageModal').modal('hide');
                var data = '<img src="' + s3URL + "assets/admin/img/offeringImage/" + result + '">';
                $('#createcoverImage').val(result);
                //$('#offeringcreatecoverImage').hide();
                $('#createcoverImageuploaded_image').html(data);
                console.log(data);
            }
        });
    })
});

$createproductLogo_crop = $('#createproductLogo_demo').croppie({
    enableExif: true,
    viewport: {
        width: 245,
        height: 245,
        type: 'square' //circle
    },
    boundary: {
        width: 400,
        height: 400
    }
});
// }
$('#editcreateproductLogo').on('change', function() {
    $('#cropimageName').val('3');
    var extsize = (this.files[0].size);
    var ext = this.files[0].name.split('.').pop();
    ext = ext.toLowerCase();
    var ext = this.files[0].name.split('.').pop();
    ext = ext.toLowerCase();
    if (extsize > 10506316) {
        window.scrollTo(0, 0);
        $("#createOffererror_content").html("Choosen image is too large...");
        $("#createOffererror_msg").slideDown(1000);

        setTimeout(function() {
            $("#createOffererror_msg").slideUp(1000);
            $("#crowdCheckLogo").filestyle('clear');
            $('#editcreatecoverImage').val('');
        }, 2000);
        return false;
    }
    $('#createproductLogoExt').val(ext);

    var reader = new FileReader();
    reader.onload = function(event) {
        $createproductLogo_crop.croppie('bind', {
            url: event.target.result
        }).then(function() {
            console.log('jQuery bind complete');
        });
    }
    reader.readAsDataURL(this.files[0]);
    this.value = null;
    $('#uploadcreateproductLogoModal').modal('show');
});
var offerId = $('#offerId').val();
$('#crop_createproductLogo').click(function(event) {
    $('#offeringcreateproductLogo').hide();
    var ext = $('#createproductLogoExt').val();

    $createproductLogo_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function(response) {
        $.ajax({
            url: baseURL + "offerings/productLogo_crop",
            type: "POST",
            data: { "productLogo": response, "upload_imageExt": ext, "offerId": offerId },
            success: function(result) {

                $('#uploadcreateproductLogoModal').modal('hide');
                var data = '<img src="' + s3URL + "assets/admin/img/offeringImage/" + result + '">';
                $('#createproductLogo').val(result);
                $('#createproductLogouploaded_image').html(data);
                console.log(data);
                $('#offeringcreateproductLogo').hide();
            }
        });
    })
});

$previewimage_crop = $('#previewimage_demo').croppie({
        enableExif: true,
        viewport: {
            width: 245,
            height: 245,
            type: 'square' //circle
        },
        boundary: {
            width: 400,
            height: 400
        }
    });
$('#editpreviewImage').on('change', function() {
        $('#cropimageName').val('1');
        var extsize = (this.files[0].size);
        var ext = this.files[0].name.split('.').pop();
        ext = ext.toLowerCase();
        if (extsize > 10506316) {
            window.scrollTo(0, 0);
            $("#updateOfferingImgerror_content").html("Choosen image is too large...");
            $("#updateOfferingImgerror_msg").slideDown(1000);

            setTimeout(function() {
                $("#updateOfferingImgerror_msg").slideUp(1000);
                $("#crowdCheckLogo").filestyle('clear');
                $('#editpreviewImage').val('');
            }, 2000);
            return false;
        }

        $('#previewImageExt').val(ext);

        var reader = new FileReader();
        reader.onload = function(event) {
            $previewimage_crop.croppie('bind', {
                url: event.target.result
            }).then(function() {
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
        this.value = null;
        $('#uploadpreviewimageModal').modal('show');
    });
    var offerId = $('#offerId').val();
    $('#crop_previewimage').click(function(event) {
        $('#offeringPreviewImage').hide();
        var ext = $('#previewImageExt').val();

        $previewimage_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(response) {
            $.ajax({
                url: baseURL + "offerings/previewimage_crop",
                // url: baseURL + "offerings/previewimage_crop",
                type: "POST",
                data: { "previewImage": response, "upload_imageExt": ext, "offerId": offerId },
                success: function(result) {

                    $('#uploadpreviewimageModal').modal('hide');
                    var data = '<img id="previewOfferImage" src="' + s3URL + "assets/admin/img/offeringImage/" + result + '">';
                    // var data = '<img id="previewOfferImage" src="' + siteURL + "/assets/admin/img/offeringImage/" + result + '">';
                    $('#previewImage').val(result);
                    $('#previewImageuploaded_image').html(data);
                    //delete icon
                    $('#remove_offering_img').show();
                    $('#previewImageuploaded_image').show();
                    console.log(data);
                    $('#offeringCoverImage').hide();
                }
            });
        })
    });
    $coverImage_crop = $('#coverImage_demo').croppie({
        enableExif: true,
        viewport: {
            width: 600,
            height: 300,
            type: 'square' //circle
        },
        boundary: {
            width: 800,
            height: 500
        }
    });

     $('#editcoverImage').on('change', function() {
        $('#cropimageName').val('2');
        var extsize = (this.files[0].size);
        var ext = this.files[0].name.split('.').pop();
        ext = ext.toLowerCase();
        $('#coverImageExt').val(ext);

        if (extsize > 10506316) {
            window.scrollTo(0, 0);
            $("#updateOfferingImgerror_content").html("Choosen image is too large...");
            $("#updateOfferingImgerror_msg").slideDown(1000);
            setTimeout(function() {
                $("#updateOfferingImgerror_msg").slideUp(1000);
                $("#crowdCheckLogo").filestyle('clear');
                $('#editcoverImage').val('');
            }, 2000);
            return false;
        }

        var reader = new FileReader();
        reader.onload = function(event) {
            $coverImage_crop.croppie('bind', {
                url: event.target.result
            }).then(function() {
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
        this.value = null;
        $('#uploadcoverImageModal').modal('show');
    });
    var offerId = $('#offerId').val();
    $('#crop_coverImage').click(function(event) {
        $('#offeringcoverImage').hide();
        var ext = $('#coverImageExt').val();

        $coverImage_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(response) {
            $.ajax({
                url: baseURL + "offerings/coverImage_crop",
                type: "POST",
                data: { "coverImage": response, "upload_imageExt": ext, "offerId": offerId },
                success: function(result) {

                    $('#uploadcoverImageModal').modal('hide');
                    var data = '<img id="CoverOfferImage" src="' + s3URL + "assets/admin/img/offeringImage/" + result + '">';
                    $('#coverImage').val(result);
                    $('#offeringCoverImage').hide();
                    $('#coverImageuploaded_image').html(data);
                    //delete icon
                    $('#remove_offeringCover_img').show();
                    $('#coverImageuploaded_image').show();
                    console.log(data);
                }
            });
        })
    });
    /////////////
$productLogo_crop = $('#productLogo_demo').croppie({
        enableExif: true,
        viewport: {
            width: 245,
            height: 245,
            type: 'square' //circle
        },
        boundary: {
            width: 400,
            height: 400
        }
    });
    $('#editproductLogo').on('change', function() {
        $('#cropimageName').val('3');
        var extsize = (this.files[0].size);
        var ext = this.files[0].name.split('.').pop();
        ext = ext.toLowerCase();

        if (extsize > 10506316) {
            window.scrollTo(0, 0);
            $("#updateOfferingImgerror_content").html("Choosen image is too large...");
            $("#updateOfferingImgerror_msg").slideDown(1000);
            setTimeout(function() {
                $("#updateOfferingImgerror_msg").slideUp(1000);
                $("#crowdCheckLogo").filestyle('clear');
                $('#editproductLogo').val('');
            }, 2000);
            return false;
        }

        $('#productLogoExt').val(ext);

        var reader = new FileReader();
        reader.onload = function(event) {
            $productLogo_crop.croppie('bind', {
                url: event.target.result
            }).then(function() {
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
        this.value = null;
        $('#uploadproductLogoModal').modal('show');
    });
    var offerId = $('#offerId').val();
    $('#crop_productLogo').click(function(event) {
        $('#offeringproductLogo').hide();
        var ext = $('#productLogoExt').val();

        $productLogo_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(response) {
            $.ajax({
                url: baseURL + "offerings/productLogo_crop",
                type: "POST",
                data: { "productLogo": response, "upload_imageExt": ext, "offerId": offerId },
                success: function(result) {

                    $('#uploadproductLogoModal').modal('hide');
                    var data = '<img id="pLogoOfferImage" src="' + s3URL + "assets/admin/img/offeringImage/" + result + '">';
                    $('#productLogo').val(result);
                    $('#productLogouploaded_image').html(data);
                    //delete icon
                    $('#remove_offeringPLogo_img').show();
                    $('#productLogouploaded_image').show();
                    console.log(data);
                    $('#offeringProductLogo').hide();
                }
            });
        })
    });
////CROP FEATURES


$("#previewText,#offerText,#highlights,#investmentSummary,#offeringContent,#offeringGlance,#companyOverview,#meetCeo,#inNews,#termSheet,#financialDiscussion,#priorRounds,#market,#risksDisclosures,#aboutTeam,#aboutMember,#updateAboutMember,#updateFaqAnswer,#AchWireInstruction,#disclaimer_text,#disclaimer_text2,#investpageDisclimaer,#updateattestationsText,#attestationsText,#faqAnswer").summernote({

    lang: "es-ES",
    fontNamesIgnoreCheck: ["Roboto"],
    fontNames: ["Arial", "Arial Black", "Comic Sans MS", "Courier New",
        "Helvetica Neue", "Helvetica", "Impact", "Lucida Grande",
        "Tahoma", "Times New Roman", "Verdana"
    ],
    toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['fontname', ['fontname']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']],
        ['height', ['height']]
    ],
    fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '24', '36'],
    height: 300,
    callbacks: {
        onImageUpload: function(files, editor, welEditable) {
            for (var i = files.length - 1; i >= 0; i--) {
                sendFile(files[i], this);
            }
        }
    }

});
$(".note-editable").css("font-family", "Arial");
$('.note-editable').css('font-size', '12pt');
$('.note-current-fontsize').html('Font Size');
$('.note-current-fontname').html('Font');

});

////