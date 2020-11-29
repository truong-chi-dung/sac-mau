
$(function () {
    LoadBag();
})
function LoadBag() {
    $.ajax({
        url: obj[10].urlBag + '?ran=' + Math.random(),
        cache: false,
        dataType: 'json',
        type: 'POST',
        success: function (data) {
            if (parseFloat(data.Qty) > 0) {
                $('.cart-qty').removeClass('hidden').html(data.Qty);
            } else {
                $('.cart-qty').addClass('hidden').html(0);
            }
        }
    });
}

function Add2Cart(id, url, qty) {
    var form = $('#frmCart');

    Loading();

    $.ajax({
        url: obj[10].urlAdd + '?ran=' + Math.random(),
        data: {
            productID: id,
            productURL: url,
            qty: qty
        },
        cache: false,
        dataType: 'json',
        type: 'POST',
        success: function (data) {
            document.location.href = obj[10].urlCart;
            //RemoveLoading();

            //msgMessi = new Messi(data.msg, {
            //    titleClass: 'success', title: 'Message', modal: true, width: 'auto',
            //    buttons: [{ id: 0, label: obj[10].view, val: 'Y' }, { id: 1, label: obj[10].continue, val: 'N' }],
            //    callback: function (val) {
            //        if (val == 'Y') {
            //            document.location.href = obj[10].urlCart;
            //        } else {

            //        }
            //    }
            //});

            //LoadBag();
        },
        error: function (a, b, c) {
            RemoveLoading();
            ShowMsg(b, 'error');
        }
    });


    return false;
}


function LoadTableCart() {
    Loading();

    $.ajax({
        url: obj[10].urlTable + '?ran=' + Math.random(),
        cache: false,
        type: 'POST',
        success: function (data) {
            RemoveLoading();
            $('.page-cart .table-responsive').html(data);
            LoadBag();
        },
        error: function (a, b, c) {
            RemoveLoading();
            ShowMsg(b, 'error');
        }
    });
}

function UpdateCart() {
    var form = $('.page-cart form');
    Loading();

    $.ajax({
        url: obj[10].urlUpdate + '?ran=' + Math.random(),
        data: form.serialize(),
        cache: false,
        type: 'POST',
        success: function (data) {
            RemoveLoading();
            if (data == "ok") {
                $('.page-cart .alert-success').removeClass('hidden').html(obj[10].alert).delay(3000).slideUp(function () {
                    $(this).addClass('hidden').attr('style', '');
                });
                LoadTableCart();
            }
        },
        error: function (a, b, c) {
            RemoveLoading();
            ShowMsg(b, 'error');
        }
    });
}


function RemoveCart(id) {

    new Messi(obj[10].confirmRemove, {
        title: 'Confirm',
        titleClass: 'warning',
        modal: true,
        width: 'auto',
        buttons: [
            { id: 0, label: 'Yes', val: 'Y', btnClass: 'btn-danger' },
            { id: 1, label: 'No', val: 'N', btnClass: 'btn-info' }
        ],
        callback: function (val) {
            if (val == 'Y') {
                var form = $('.page-cart form');
                Loading();

                $.ajax({
                    url: obj[10].urlRemove + '?ran=' + Math.random(),
                    data: { id: id },
                    cache: false,
                    type: 'POST',
                    success: function (data) {
                        RemoveLoading();
                        if (data == "ok") {
                            $('.page-cart .alert-success').removeClass('hidden').html(obj[10].alert).delay(3000).slideUp(function () {
                                $(this).addClass('hidden').attr('style', '');
                            });
                            LoadTableCart();
                        }
                    },
                    error: function (a, b, c) {
                        RemoveLoading();
                        ShowMsg(b, 'error');
                    }
                });
            }
        }
    });

}