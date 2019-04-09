<?php

declare(strict_types = 1);

namespace Classes;

class PostType{

    protected $plural;
    protected $singular;

    public function __construct(String $plural, String $singular){

        $this->plural = $plural;
        $this->singular = $singular;

        add_action('init', [$this, 'create']);
        add_filter('gutenberg_can_edit_post_type', true, strtolower($this->singular));

    }

    public function create(){
        register_post_type(strtolower($this->singular), $this->setArgs());
    }


    private function setLabels(){

        return [
            'name'                  => _x($this->plural, 'Post type general name', 'textdomain'),
            'singular_name'         => _x($this->singular, 'Post type singular name', 'textdomain'),
            'menu_name'             => _x($this->plural, 'Admin Menu text', 'textdomain'),
            'name_admin_bar'        => _x($this->singular, 'Add New on Toolbar', 'textdomain'),
            'add_new'               => __('Add New', 'textdomain'),
            'add_new_item'          => __('Add New ' . $this->singular, 'textdomain'),
            'new_item'              => __('New ' . $this->singular, 'textdomain'),
            'edit_item'             => __('Edit ' . $this->singular, 'textdomain'),
            'view_item'             => __('View ' . $this->singular, 'textdomain'),
            'all_items'             => __('All ' . $this->plural, 'textdomain'),
            'search_items'          => __('Search ' . $this->plural, 'textdomain'),
            'parent_item_colon'     => __('Parent ' . $this->plural . ':', 'textdomain'),
            'not_found'             => __('No ' . $this->plural . ' found.', 'textdomain'),
            'not_found_in_trash'    => __('No ' . $this->plural . ' found in Trash.', 'textdomain'),
            'featured_image'        => _x($this->singular . ' Featured Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain'),
            'set_featured_image'    => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain'),
            'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain'),
            'use_featured_image'    => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain'),
            'archives'              => _x($this->singular . ' archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain'),
            'insert_into_item'      => _x('Insert into ' . $this->singular, 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain'),
            'uploaded_to_this_item' => _x('Uploaded to this ' . $this->singular, 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain'),
            'filter_items_list'     => _x('Filter ' . $this->plural . ' list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain'),
            'items_list_navigation' => _x($this->plural . ' list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain'),
            'items_list'            => _x($this->plural . ' list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain')
        ];

    }

    private function setArgs(){

        return [
            'labels'             => $this->setLabels(),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_rest'       => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => strtolower($this->singular)),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array('title', 'editor', 'revisions', 'author', 'thumbnail', 'excerpt', 'comments'),
            'menu_icon' => 'dashicons-media-spreadsheet'
        ];

    }

}
