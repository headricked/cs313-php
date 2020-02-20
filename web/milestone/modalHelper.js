$('#modal_updateMilestone').on('show.bs.modal', function (event)
    {
        var button     = $(event.relatedTarget); // Button that triggered the modal
        var p_id       = button.data('pId'); // Extract info from data-pId attributes
        var m_id       = button.data('mId'); // Extract info from data-mId attributes
        var m_name     = button.data('mName'); // Extract info from data-mName attributes
        var m_date     = button.data('mDate'); // Extract info from data-mDate attributes
        var m_age      = button.data('mAge'); // Extract info from data-mAge attributes
        var m_location = button.data('mLocation'); // Extract info from data-mLocation attributes
        var m_notes    = button.data('mNotes'); // Extract info from data-mNotes attributes

        var modal  = $(this);

        modal.find('#').val(p_id);
        modal.find('#').val(m_id);
        modal.find('#').val(m_name);
        modal.find('#').val(m_date);
        modal.find('#').val(m_age);
        modal.find('#').val(m_location);
        modal.find('#').val(m_notes);

    }
)