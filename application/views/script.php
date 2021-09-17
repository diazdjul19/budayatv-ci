<script src="assets/plugins/pace/pace.min.js" ></script>
<!--<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>-->
<script src="assets/plugins/jquery/jquery-1.11.1.min.js" ></script>
<script src="assets/plugins/modernizr.custom.js" ></script>
<script src="assets/plugins/jquery-ui/jquery-ui.min.js" ></script>
<script src="assets/plugins/boostrapv3/js/bootstrap.min.js" ></script>
<script src="assets/plugins/jquery/jquery-easy.js" ></script>
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" ></script>
<script src="assets/plugins/jquery-bez/jquery.bez.min.js"></script>
<script src="assets/plugins/jquery-ios-list/jquery.ioslist.min.js" ></script>
<script src="assets/plugins/jquery-actual/jquery.actual.min.js"></script>
<script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/plugins/bootstrap-select2/select2.min.js"></script>
<script src="assets/plugins/classie/classie.js"></script>
<script src="assets/plugins/switchery/js/switchery.min.js" ></script>
<script src="assets/plugins/toastr/toastr.min.js" ></script>

<script src="assets/pages/js/pages.min.js"></script>
<script src="assets/js/megonesia_admin.js"></script>
<!--<script src="assets/js/scripts.js" ></script>-->


<script src="https://www.gstatic.com/firebasejs/3.8.0/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyBAu3OvbfOTErpynOUjQ3s_UetyRfBLPfM",
    authDomain: "chat-77f1f.firebaseapp.com",
    databaseURL: "https://chat-77f1f.firebaseio.com",
    projectId: "chat-77f1f",
    storageBucket: "chat-77f1f.appspot.com",
    messagingSenderId: "678421159741"
  };
  firebase.initializeApp(config);
</script>

<script>
    $(function(){
        setTimeout(function() {
            $('#alerts').slideUp();
        }, 30000);



        $("#notification-center").click(function (e) {
            e.preventDefault();
            
            $.ajax({
                url: 'user/read',
                success:function () {
                    $("#notification-center .badge").remove();
                }
            });
        });
    });

</script>