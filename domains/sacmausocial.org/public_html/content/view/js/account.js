Array.prototype.contains = function (obj) {
    var i = this.length;
    while (i--) {
        if (this[i] === obj) {
            return true;
        }
    }
    return false;
}

var validateLogin, validateForgot;
$(function () {
    $('#myModal').modal({
        backdrop: 'static',
        keyboard: false,
        show: false
    });
})

function ValidateLogin() {
    //Xử lý cập nhật dữ liệu
    if ($("#frmLogin").length > 0) {
        validateLogin = $("#frmLogin").validate({
            errorClass: "help-block animation-slideDown",
            errorElement: "div",
            errorPlacement: function (e, a) {
                a.parents(".form-group > div").append(e)
            },
            highlight: function (e) {
                $(e).closest(".form-group").removeClass("has-success has-error").addClass("has-error"),
                $(e).closest(".help-block").remove()
            },
            success: function (e) {
                e.closest(".form-group").removeClass("has-success has-error"),
                e.closest(".help-block").remove()
            },
            rules: {
                login_email: { required: !0 },
                login_password: { required: !0 }
            },
            submitHandler: function (form) {
                $('input').blur();
                Loading();

                $.ajax({
                    url: $(form).attr('action') + '?ran=' + Math.random(),
                    type: 'POST',
                    data: $(form).serialize(),
                    dataType: 'json',
                    cache: false,
                    success: function (data) {
                        RemoveLoading();
                        if (data.status == true) {
                            ShowMsg(data.msg, 'success');

                            if (data.url == '') {
                                if (obj[2].controller == 'checkout') {
                                    document.location.reload();
                                } else {

                                    if (obj[2].controller == 'account' && obj[2].action == 'login') {
                                        document.location.href = obj[8].urlProfile;
                                    } else {
                                        $('#menu .container').load(obj[8].urlMenu + '?ran=' + Math.random(), function () {
                                            RemoveLoading();
                                            $('#myModal').modal('hide');

                                            menuWidth = $('ul.nav.navbar-nav').width();
                                            MenuAutoWitdh();
                                        });
                                    }

                                }
                            } else {
                                document.location.href = data.url;
                            }
                            //var controller = ['benhnhandangky', 'bacsidangky', 'benhviendangky'];

                            //if (obj[2].controller == 'benhvien' || obj[2].controller == 'bacsi') {
                            //    $('#header .header').load(obj[5].url + '?ran=' + Math.random(), function () {
                            //        RemoveLoading();
                            //        $('#myModal').modal('hide');
                            //    });
                            //    return false;
                            //}

                            //if (obj[9].url != '') {
                            //    document.location.href = obj[9].url;
                            //    return false;
                            //}

                            //if (controller.contains(obj[2].controller)) {
                            //    document.location.href = obj[8].url;
                            //} else {
                            //    $('#header .header').load(obj[5].url + '?ran=' + Math.random(), function () {
                            //        RemoveLoading();
                            //        $('#myModal').modal('hide');
                            //    });
                            //}

                            //setTimeout(function () {
                            //    document.location.reload();
                            //}, 2000);
                        } else {
                            RemoveLoading();
                            ShowMsg(data.msg, 'warning');
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        RemoveLoading();
                        ShowMsg(data.msg, 'error');
                    }
                });

                return false;
            }
        });
    }

    if ($("#frmForgot").length > 0) {
        validateForgot = $("#frmForgot").validate({
            errorClass: "help-block animation-slideDown",
            errorElement: "div",
            errorPlacement: function (e, a) {
                a.parents(".form-group > div").append(e)
            },
            highlight: function (e) {
                $(e).closest(".form-group").removeClass("has-success has-error").addClass("has-error"),
                $(e).closest(".help-block").remove()
            },
            success: function (e) {
                e.closest(".form-group").removeClass("has-success has-error"),
                e.closest(".help-block").remove()
            },
            rules: {
                forgot_email: { required: !0, email: !0 }
            },
            submitHandler: function (form) {
                $('input').blur();
                Loading();

                $.ajax({
                    url: $(form).attr('action') + '?ran=' + Math.random(),
                    type: 'POST',
                    data: $(form).serialize(),
                    dataType: 'json',
                    cache: false,
                    success: function (data) {
                        RemoveLoading();
                        if (data.status == true) {
                            ShowMsg(data.msg, 'success');
                        } else {
                            RemoveLoading();
                            ShowMsg(data.msg, 'warning');
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        RemoveLoading();
                        ShowMsg(data.msg, 'error');
                    }
                });

                return false;
            }
        });
    }
}


function ValidateCheck() {
    if ($("#frmCheck").length > 0) {
        validateForgot = $("#frmCheck").validate({
            errorClass: "help-block animation-slideDown",
            errorElement: "div",
            errorPlacement: function (e, a) {
                a.parents(".form-group > div").append(e)
            },
            highlight: function (e) {
                $(e).closest(".form-group").removeClass("has-success has-error").addClass("has-error"),
                $(e).closest(".help-block").remove()
            },
            success: function (e) {
                e.closest(".form-group").removeClass("has-success has-error"),
                e.closest(".help-block").remove()
            },
            rules: {
                number_serial: { required: !0 }
            },
            submitHandler: function (form) {
                $('input').blur();
                $('#checkResult').html('');
                Loading();

                $.ajax({
                    url: $(form).attr('action') + '?ran=' + Math.random(),
                    type: 'POST',
                    data: $(form).serialize(),
                    cache: false,
                    success: function (data) {
                        RemoveLoading();
                        $('#checkResult').html(data);
                        //ShowMsg(data, 'info');
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        RemoveLoading();
                        ShowMsg(errorThrown, 'error');
                    }
                });

                return false;
            }
        });
    }
}

function CreateAccountFBSDK(data) {
    Loading();

    $.ajax({
        url: obj[8].urlFBSDK + '?ran=' + Math.random(),
        type: 'POST',
        data: data,
        cache: false,
        success: function (data) {
            RemoveLoading();

            if (data == '') {
                if (obj[2].controller == 'checkout') {
                    document.location.reload();
                } else {
                    if (obj[2].controller == 'account' && obj[2].action == 'login') {
                        document.location.href = obj[8].urlProfile;
                    } else {
                        $('#menu .boxMenu').load(obj[8].urlMenu + '?ran=' + Math.random(), function () {
                            RemoveLoading();
                            $('#myModal').modal('hide');

                            menuWidth = $('ul.nav.navbar-nav').width();
                            MenuAutoWitdh();
                        });
                    }
                }
            } else {
                document.location.href = data;
            }

        },
        error: function (jqXHR, textStatus, errorThrown) {
            RemoveLoading();
            ShowMsg(data.msg, 'error');
        }
    });

    return false;
}

function ToggleLogin(e) {
    if ($('#frmLogin').length == 0) {
        Loading();

        $.ajax({
            url: obj[8].urlLogin + '?ran=' + Math.random(),
            type: 'GET',
            cache: false,
            success: function (data) {
                RemoveLoading();
                //$('#myModal').find('.modal-dialog:not(.modal-sm)').addClass('modal-sm');
                $('#myModal').find('#myModalLabel').html(obj[8].nameLogin);
                $('#myModal').find('.modal-body').html(data);
                $('#myModal').modal('show');
                ValidateLogin();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                RemoveLoading();
                ShowMsg(data.msg, 'error');
            }
        });
    } else {
        //$('#frmLogin').animate({ scrollTop: $('#frmLogin').position().top }, 'slow');
        $('#login_email').focus();
    }
    return false;
}


function CheckSerial(e) {
    Loading();

    $.ajax({
        url: obj[8].urlCheck + '?ran=' + Math.random(),
        type: 'GET',
        cache: false,
        success: function (data) {
            RemoveLoading();
            //$('#myModal').find('.modal-dialog:not(.modal-sm)').addClass('modal-sm');
            $('#myModal').find('#myModalLabel').html(obj[8].nameCheck);
            $('#myModal').find('.modal-body').html(data);
            $('#myModal').modal('show');
            ValidateCheck();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            RemoveLoading();
            ShowMsg(data.msg, 'error');
        }
    });
    return false;
}

function forgotToggle() {
    validateLogin.resetForm();
    validateForgot.resetForm();
    var formLogin = $('#frmLogin');
    var formForgot = $('#frmForgot');
    formLogin.slideToggle(function () {
        if ($(this).css('display') == 'block') {
            $('#myModal').find('#myModalLabel').html(obj[8].nameLogin);
        }
    });
    formForgot.slideToggle(function () {
        if ($(this).css('display') == 'block') {
            $('#myModal').find('#myModalLabel').html(obj[8].nameForgot);
        }
    });
    return false;
}

function LogOut() {
    new Messi(obj[8].confirmLogout,
        {
            title: obj[8].nameLogout,
            titleClass: 'warning',
            modal: true,
            modalOpacity: 0.6,
            buttons: [{ id: 0, label: 'Có', val: 'Y', btnClass: 'btn-danger' }, { id: 1, label: 'Không', val: 'N', btnClass: 'btn-success' }],
            callback: function (val) {
                if (val == 'Y') {
                    Loading();

                    $.ajax({
                        url: obj[8].urlLogout + '?ran=' + Math.random(),
                        type: 'POST',
                        //data: $(form).serialize(),
                        dataType: 'json',
                        cache: false,
                        success: function (data) {
                            RemoveLoading();
                            if (data.status == true) {
                                var controller = ['account'];

                                if (controller.contains(obj[2].controller)) {
                                    document.location.href = obj[8].urlHome;
                                } else {
                                    if (obj[2].controller == 'checkout') {
                                        document.location.reload();
                                    } else {
                                        $('#menu .container').load(obj[8].urlMenu + '?ran=' + Math.random(), function () {
                                            RemoveLoading();
                                            $('#myModal').modal('hide');

                                            menuWidth = $('ul.nav.navbar-nav').width();
                                            MenuAutoWitdh();
                                        });
                                    }
                                }
                            } else {
                                ShowMsg(data.msg, 'error');
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            RemoveLoading();
                            ShowMsg(data.msg, 'error');
                        }
                    });
                }
            }
        });
    return false;
}

function Register() {
    Loading();

    $.ajax({
        url: obj[8].urlRegister + '?ran=' + Math.random(),
        type: 'GET',
        cache: false,
        success: function (data) {
            RemoveLoading();
            //$('#myModal').find('.modal-dialog:not(.modal-sm)').addClass('modal-sm');
            $('#myModal').find('#myModalLabel').html(obj[8].nameRegister);
            $('#myModal').find('.modal-body').html(data);
            $('#myModal').modal('show');
            ValidateRegister();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            RemoveLoading();
            ShowMsg(data.msg, 'error');
        }
    });

    return false;
}

function ValidateRegister() {
    $("#frmRegister").validate({
        errorClass: "help-block animation-slideDown",
        errorElement: "div",
        errorPlacement: function (e, a) {
            a.parents(".form-group > div").append(e)
        },
        highlight: function (e) {
            $(e).closest(".form-group").removeClass("has-success has-error").addClass("has-error"),
            $(e).closest(".help-block").remove()
        },
        success: function (e) {
            e.closest(".form-group").removeClass("has-success has-error"),
            e.closest(".help-block").remove()
        },
        rules: {
            FirstName: { required: !0 },
            LastName: { required: !0 },
            Phone: { required: !0 },
            Email: {
                required: !0, email: !0,
                remote: {
                    url: obj[8].urlEmailExist,
                    type: "post",
                    data: {
                        email: function () {
                            return $("#Email").val();
                        },
                        id: function () {
                            return 0;
                        }
                    }
                }
            },
            EmailRepeat: { required: !0, email: !0, equalTo: "#Email" },
            Password: { required: !0 },
            PasswordRepeat: { required: !0, equalTo: "#Password" }
        },
        messages: {
            FirstName: obj[9].required.f($('[for="FirstName"]').text()),
            LastName: obj[9].required.f($('[for="LastName"]').text()),
            Phone: obj[9].required.f($('[for="Phone"]').text()),
            Password: obj[9].required.f($('[for="Password"]').text()),
            PasswordRepeat: {
                required: obj[9].required.f($('[for="PasswordRepeat"]').text()),
                equalTo: obj[9].equalto.f($('[for="PasswordRepeat"]').text(), $('[for="Password"]').text())
            },
            Email: {
                required: obj[9].required.f($('[for="Email"]').text()),
                email: obj[9].email,
                remote: obj[9].remote.f($('[for="Email"]').text())
            },
            EmailRepeat: {
                required: obj[9].required.f($('[for="EmailRepeat"]').text()),
                email: obj[9].email,
                equalTo: obj[9].equalto.f($('[for="EmailRepeat"]').text(), $('[for="Email"]').text())
            }
        },
        submitHandler: function (form) {
            Loading();
            $.ajax({
                url: $(form).attr('action') + '?ran=' + Math.random(),
                type: 'POST',
                data: $(form).serialize(),
                dataType: 'json',
                cache: false,
                success: function (data) {
                    RemoveLoading();
                    if (data.status) {
                        $('#myModal .modal-body').html(data.msg);
                    } else {
                        ShowMsg(data.msg, 'warning');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    RemoveLoading();
                }
            });
            return false;
        }
    });
}