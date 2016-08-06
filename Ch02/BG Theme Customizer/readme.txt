Methodology for Sections, Settings and Controls

1. Define a Section:

A section is a group of settings and controls. Define using the hook 'customize_register'

2. Adding a Setting:

A setting is actual value serialized into the database.

3. Adding a Control:

A control is an html element that allows user to modify the setting.

4. Write the javascript:

For postMessage using action 'customize_preview_init'.

5. Make the call to 'get_theme_mod' function

Displaying the value on front end using wp_head action