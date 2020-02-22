$('#modal_updateMilestone').on('show.bs.modal', function (event)
    {
        var a     = $(event.relatedTarget.val); // Anchor (link) that triggered the modal
        // var p_id       = a.data('pId'); // Extract info from data-pId attributes
        // var m_id       = a.data('mId'); // Extract info from data-mId attributes
        var m_name     = a.data('mName'); // Extract info from data-mName attributes
        // var m_date     = a.data('mDate'); // Extract info from data-mDate attributes
        // var m_age      = a.data('mAge'); // Extract info from data-mAge attributes
        // var m_location = a.data('mLocation'); // Extract info from data-mLocation attributes
        // var m_notes    = a.data('mNotes'); // Extract info from data-mNotes attributes

        alert('a: ' + a);

        var modal  = $(this);

        // modal.find('#').val(p_id);
        // modal.find('#').val(m_id);
        modal.find('#mName').val(m_name);
        // modal.find('#mDate').val(m_date);
        // modal.find('#mAge').val(m_age);
        // modal.find('#mLocation').val(m_location);
        // modal.find('#mNotes').val(m_notes);

        alert("a.data('mName'): " + a.data('mName'));
        // alert('milestone name: ' + m_name);

    }
)