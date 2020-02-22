$('#exampleModal').on('show.bs.modal', function (event)
    {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var one = button.data('mName'); // Extract info from data-* attributes
        var two = button.data('mNotes'); // Extract info from data-* attributes
        var three = button.data('mLocation'); // Extract info from data-* attributes

        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

        var modal = $(this);

        // modal.find('.modal-title').text('New message to ' + one);
        // modal.find('.modal-body input').val(recipient);

        modal.find('#mName').val(one);

        // modal.find('.modal-body textarea').val(recipient + "Doody");

        modal.find('#mNotes').val(two);

        modal.find('#mLocation').val(three);
        
    }
)