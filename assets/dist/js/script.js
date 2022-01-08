// Active Darkmode

var toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
  var currentTheme = localStorage.getItem('theme');
  var mainHeader = document.querySelector('.main-header');

  if (currentTheme) {
    if (currentTheme === 'dark') {
      if (!document.body.classList.contains('dark-mode')) {
        document.body.classList.add("dark-mode");
      }
      if (mainHeader.classList.contains('navbar-white')) {
        mainHeader.classList.add('navbar-dark');
        mainHeader.classList.remove('navbar-white');
      }
      toggleSwitch.checked = true;
    }
  }

  function switchTheme(e) {
    if (e.target.checked) {
      if (!document.body.classList.contains('dark-mode')) {
        document.body.classList.add("dark-mode");
      }
      if (mainHeader.classList.contains('navbar-white')) {
        mainHeader.classList.add('navbar-dark');
        mainHeader.classList.remove('navbar-white');
      }
      localStorage.setItem('theme', 'dark');
    } else {
      if (document.body.classList.contains('dark-mode')) {
        document.body.classList.remove("dark-mode");
      }
      if (mainHeader.classList.contains('navbar-dark')) {
        mainHeader.classList.add('navbar-white');
        mainHeader.classList.remove('navbar-dark');
      }
      localStorage.setItem('theme', 'white');
    }
  }

  toggleSwitch.addEventListener('change', switchTheme, false);

  
// Add Active Class To Current Link
$(".nav a").each(function() {
  var url = window.location.href.split('?')[0];
  url = url.replace(/\#$/, "");
  if (this.href == url) {
      $(this).addClass("active");
      $(this).parents(".nav-treeview").prevAll(".nav-link").addClass("active");
  }
});

// Password Change validation
$("#confirm_password").keyup(function(){
  if ($("#new_password").val() != $("#confirm_password").val()) {
      $("#pass_val").html("<span style='color: red;'>Password do not match</span>");
      $("#change-password").attr('disabled', true);
  }else{
      $("#pass_val").html("<span style='color: green;'>Password matched</span>");
      $("#change-password").attr('disabled', false);
 }
});

// Username validation
$("#username").keyup(function(){
  var username = $(this).val().trim();
  if(username != ''){
     $.ajax({
        url: './includes/ajax_username.php',
        type: 'post',
        data: {username: username},
        success: function(response){
          if(response == true){
            $('#user_val').html("<span style='color: green;'>Username is valid.</span>");
            $('#submit-btn').attr('disabled', false);
          }else{
            $('#user_val').html("<span style='color: red;'>Username already taken</span>");
            $('#submit-btn').attr('disabled', true);
          }
         }
     });
  }else{
     $("#user_val").html("");
  }
});

// Email validation
$("#email").keyup(function(){
  var email = $(this).val().trim();
  if(email != ''){
     $.ajax({
        url: './includes/ajax_email.php',
        type: 'post',
        data: {email: email},
        success: function(response){
          if(response == true){
            $('#email_val').html("<span style='color: green;'>Email is valid.</span>");
            $('#submit-btn').attr('disabled', false);
          }else if(response == 'invalid'){
            $('#email_val').html("<span style='color: red;'>Email is invalid</span>");
            $('#submit-btn').attr('disabled', true);
          }else{
            $('#email_val').html("<span style='color: red;'>Email already taken</span>");
            $('#submit-btn').attr('disabled', true);
          }
         }
     });
  }else{
     $("#email_val").html("");
  }
});

// Datatable
$(document).ready(function() {
  $('#example').DataTable({
    'order': [
      [1, "asc"]
    ],
    'responsive': false,
      'scrollX': true,
      'lengthMenu': [
        [5, 15, 15, -1],
        [5, 10, 15, "All"]
      ],
    'searching': true,
    'ordering': true,
    'lengthChange': true
  });
} );

// Delete Admin Alart
$(".admin-delete").click(function() {
  var dataId = $(this).attr("data-id");
  Swal.fire({
      title: 'Are you sure?',
      text: "This Admin will be deleted!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Delete it!'
  }).then((result) => {
      if (result.isConfirmed) {
          Swal.fire(
              'Deleted!',
              'Admin has been Deleted.',
              'success',
              window.location.href = "admin_delete.php?delete=role&id=" + dataId
          )
      }
  })
});