window.fbAsyncInit = function () {
    FB.init({
        appId: '254171341603723',
        xfbml: true,
        version: 'v2.6'
    });
};

// Load the SDK asynchronously
(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function CallAfterLogin() {
    FB.login(function (response) {
        if (response.status === "connected") {
            var url = '/me?fields=first_name,last_name,id,email';
            FB.api(url, function (data) {
                if (data.email == null) {
                    alert('Không thể lấy địa chỉ email');
                    //console.log(data);
                } else {
                    CreateAccountFBSDK(data);

                    //console.log(data);
                }
            });
        }
    },
    {
        scope: 'public_profile,email'
    });
}

function LogOutFB() {
    FB.logout(function (response) {
        // user is now logged out
    });
}