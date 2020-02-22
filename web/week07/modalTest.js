$('#exampleModal').on('show.bs.modal', function (event)
    {
        let a      = $(event.relatedTarget); // Button that triggered the modal
        let mName     = a.data('mName'); // Extract info from data-* attributes
        let mNotes    = a.data('mNotes'); // Extract info from data-* attributes
        let mLocation = a.data('mLocation'); // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        let modal = $(this);
        // modal.find('.modal-title').text('New message to ' + recipient);
        // modal.find('.modal-body input').val(recipient);
        // modal.find('#recipient-name').val(recipient);
        // modal.find('.modal-body textarea').val(recipient + "Doody");
        modal.find('#mName').val(mName);
        modal.find('#mNotes').val(mNotes);
        modal.find('#mLocation').val(mLocation);
        
    }
)