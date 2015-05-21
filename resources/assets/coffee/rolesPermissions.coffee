###
  # admin/roles/{role}/permissions - JavaScripts.
  #
###
if $('body').hasClass 'admin roles_permissions index'
  $(document).on 'click', '.bulk-action-toggle', (e) ->
    e.preventDefault()

    $(this).parents('form').find('input[type="checkbox"]').prop 'checked', $(this).data('action') == 'check'