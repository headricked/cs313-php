$('#modal_updateMilestone').on('show.bs.modal', function (event)
    {
        var button     = $(event.relatedTarget); // Button that triggered the modal
        var p_id       = button.data('personId'); // Extract info from data-personId attributes
        var m_id       = button.data('milestoneId'); // Extract info from data-milestoneId attributes
        var m_name     = button.data('milestoneName'); // Extract info from data-milestoneName attributes
        var m_date     = button.data('milestoneDate'); // Extract info from data-milestoneDate attributes
        var m_age      = button.data('milestoneAge'); // Extract info from data-milestoneAge attributes
        var m_location = button.data('milestoneLocation'); // Extract info from data-milestoneLocation attributes
        var m_notes    = button.data('milestoneNotes'); // Extract info from data-milestoneNotes attributes

        var modal  = $(this);
        
        modal.find('.modal-title').text('New message to ' + p_id);
        modal.find('.modal-body input').val(m_id);
    }
)

{/* <td>$m_name</td>
<td>$m_date</td>
<td>$m_age</td>
<td>$m_location</td>
<td>$m_notes</td> */}
