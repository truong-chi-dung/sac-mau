<script src="https://www.google.com/recaptcha/api.js?render=<?=$config['gv3_client']?>"></script>
<script>
grecaptcha.ready(function () {
grecaptcha.execute('<?=$config['gv3_client']?>', { action: 'nindex' }).then(function (token) {
var recaptchaResponse = document.getElementsByClassName('recaptchaResponse');
for(var i = 0; i < recaptchaResponse.length; i++) {
recaptchaResponse[i].value = token;
}
});
});
</script>