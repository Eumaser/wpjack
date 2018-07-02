# WordPress Theme Boilerplate

WordPress Theme Boilerplate is a skeleton template for creating a WordPress theme from scratch. It includes only generic or common functions used in most projects. On top of that the boilerplate also modifies WordPress login and admin panel theme to a custom FirstCom Solutions flavor. Many files necessary for theme creation, including header.php and footer.php, are populated with common function call intended to be used as a reference or cheat sheet. Remove **all** parts of code or files that are not used for your current project. e.g. If you are not using search function, remove search.php and searchform.php. 

## Functions

Functions from functions.php is split into many php includes inside functions folder. This allow you to easily include or exclude specific function by uncommenting or commenting the functions.php file. For in-depth configuration you can modify the file inside functions folder.

Included functions:

1. **Load CSS And JS**

   Load up all of your CSS and JS scripts inside wp_head() or wp_footer() instead of inserting it manually. Uses enqueue for best practice. All of the most common plugins have been inserted and commented for easy inclusion.
   
2. **Add Admin And Login CSS**

   Add a custom stylesheet for admin and login panel. Included style is a custom FirstCom Solutions theme.
   
3. **Add Admin Menu**

   Add a new custom menu inside the admin panel. Useful when you want to add a documentation inside the admin panel.
   
4. **Add Option Menu**

   Add a new option menu inside the admin panel for ACF 5 PRO.
   
5. **Add Custom Dashboard**

   Add a new custom dashboard widget inside the admin panel.
   
6. **Clean WP Head**

   Clean up the output of wp_head().
   
7. **Register Menu**

   Registers a menu for a theme to use. If you are using wp_nav_menu() to create a menu, this function is required.
   
8. **White Label**

   Rebrand the whole admin panel by editing or removing any mention of WordPress. The change of login panel logo is handled with "Add Admin And Login CSS" as a custom CSS. Will also cleans up the admin panel a bit.
   
9. **Thumbnail Size Options**

   Adds a new thumbnail size option whenever you uploaded a new image to WP. To generate new thumbnail for existing images, use "Regenerate Thumbnails" plugin.
   
10. **Remove Top Admin Bar**

   Remove the top admin bar while you are inside the actual website. It does not remove the top admin bar inside the admin panel.
   
11. **Adds Sub Menu Capabilities**
    
   Allows you to get sub menu items based on the parent or siblings in their wp_nav_menu. You no longer need to create new menu to get parts of the main menu.
   
12. **Plugin Specific Configuration**
    
   Adds configuration to several of the most commonly used plugins, usually to clean unneeded features.
