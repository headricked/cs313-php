$('#modal_updateMilestone').on('show.bs.modal', function (event)
    {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var p_id   = button.data('personid'); // Extract info from data-personid attributes
        var m_id   = button.data('milestoneid'); // Extract info from data-personid attributes
        var modal  = $(this);
        modal.find('.modal-title').text('New message to ' + p_id);
        modal.find('.modal-body input').val(m_id);
    }
)

