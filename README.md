# WordPress Custom Post Types
Easy custom post types setup within your custom WordPress themes

## Install:
1. Download PostType.php and place it inside your theme folder.
2. On your functions.php, include PostType.php
3. And you're done!

## Create Post Types
If you want to create post types, just simply:

new PostType({plural name}, {singular name});
  
## Example
new PostType('Projects', 'Project');

#### or create as many post types as you want!

new PostType('Clients', 'Client');

new PostType('Cars', 'Car');

new PostType('Bikes', 'Bike');

new PostType('Testimonial', 'Testimonial');
