# Menu Update Instructions

The following changes have been made to fix the Forms and Updates menu issues:

1. Created a new LeftMenu config file to define default menu items
2. Modified the Forms controller to use proper permission checking
3. Modified the Updates controller to allow non-admin access with proper permissions
4. Updated the Left_menu_model to include the new menu items

The menus should now be available in the left menu settings and can be dragged and dropped as needed.

To verify the fix:
1. Log in as admin
2. Go to Settings > Left Menu
3. You should see Forms and Updates items in the available items section
4. Drag and drop them to the desired position
5. Save the changes

Note: Make sure the user has appropriate permissions set in their role settings to access these modules.