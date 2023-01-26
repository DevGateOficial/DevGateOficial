$(document).ready(function() {
    // Attach a click event listener to all "Editar" buttons
    $('.edit-server-button').on('click', function() {
      // Get the server ID from the button's data attribute
      let serverId = $(this).data('server-id');
      // Assign the server ID to the hidden input field
      $('#server-id').val(serverId);
  
      // Make an AJAX request to get the server information
      $.ajax({
        url: 'http://localhost/Devgate_rebuild/admin-edit-email-info/index',
        type: 'POST',
        data: {
          server_id: serverId
        },
        success: function(response) {
          // Parse the JSON response
          let server = JSON.parse(response);
          // Populate the form fields with the server information
          $('#title').val(server.title);
          $('#name').val(server.name);
          $('#email').val(server.email);
          $('#host').val(server.host);
          $('#username').val(server.username);
          $('#password').val(server.password);
          $('#smtpsecure').val(server.smtpsecure);
          $('#port').val(server.port);
          // Show the modal
          $('#edit-server-modal').show();
        }
      });
    });
});
