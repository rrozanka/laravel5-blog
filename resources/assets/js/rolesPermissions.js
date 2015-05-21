
/*
   * admin/roles/{role}/permissions - JavaScripts.
  #
 */

(function() {
  if ($('body').hasClass('admin roles_permissions index')) {
    $(document).on('click', '.bulk-action-toggle', function(e) {
      e.preventDefault();
      return $(this).parents('form').find('input[type="checkbox"]').prop('checked', $(this).data('action') === 'check');
    });
  }

}).call(this);

//# sourceMappingURL=rolesPermissions.js.map