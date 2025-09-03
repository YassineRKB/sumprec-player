<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Elementor_Album_Grid_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'album_grid_widget';
    }

    public function get_title() {
        return __('Album Grid', 'album-grid-widget');
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    public function get_categories() {
        return ['general'];
    }

    protected function _register_controls() {
        // Grid Settings
        $this->start_controls_section(
            'grid_settings',
            [
                'label' => __('Grid Settings', 'album-grid-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'columns',
            [
                'label' => __('Number of Columns', 'album-grid-widget'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3,
                'min' => 1,
                'max' => 6,
            ]
        );

        $this->add_control(
            'rows',
            [
                'label' => __('Number of Rows', 'album-grid-widget'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 2,
                'min' => 1,
                'max' => 10,
            ]
        );

        $this->add_control(
            'albums_per_page',
            [
                'label' => __('Albums Per Page', 'album-grid-widget'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 12,
                'min' => 1,
                'max' => 50,
            ]
        );

        $this->end_controls_section();

        // Title Settings
        $this->start_controls_section(
            'title_style',
            [
                'label' => __('Title Style', 'album-grid-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'album-grid-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .album-item h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_size',
            [
                'label' => __('Title Size', 'album-grid-widget'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .album-item h3' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_alignment',
            [
                'label' => __('Title Alignment', 'album-grid-widget'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'album-grid-widget'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'album-grid-widget'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'album-grid-widget'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .album-item h3' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Image Styles
        $this->start_controls_section(
            'image_style',
            [
                'label' => __('Image Style', 'album-grid-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'image_border_radius',
            [
                'label' => __('Border Radius', 'album-grid-widget'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .album-item img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();

        // Icon Settings
        $this->start_controls_section(
            'icon_style',
            [
                'label' => __('Icon', 'album-grid-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'album-grid-widget'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-play-circle',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label' => __('Icon Size', 'album-grid-widget'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .album-play-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __('Icon Color', 'album-grid-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .album-play-icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_url',
            [
                'label' => __('Icon URL', 'album-grid-widget'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'album-grid-widget'),
                'default' => [
                    'url' => '',
                ],
            ]
        );

        $this->end_controls_section();

        // Card Settings
        $this->start_controls_section(
            'card_style',
            [
                'label' => __('Card Style', 'album-grid-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_background_color',
            [
                'label' => __('Card Background Color', 'album-grid-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .album-item' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'card_hover_background_color',
            [
                'label' => __('Card Hover Background Color', 'album-grid-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .album-item:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'card_border_radius',
            [
                'label' => __('Card Border Radius', 'album-grid-widget'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .album-item' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();
    }

    protected function render() {
        global $wpdb;
    
        $settings = $this->get_settings_for_display();
        $columns = $settings['columns'];
        $rows = $settings['rows'];
        $albums_per_page = $settings['albums_per_page']; //$columns * $rows; // Albums per page should be calculated from rows * columns
    
        $paged = isset($_GET['album_page']) ? absint($_GET['album_page']) : 1;
        $offset = ($paged - 1) * $albums_per_page;
    
        // Fetch albums from database
        $albums = $wpdb->get_results($wpdb->prepare(
            "SELECT * FROM {$wpdb->posts} 
            WHERE post_type = 'ms-albums' 
            AND post_status = 'publish' 
            ORDER BY post_date DESC 
            LIMIT %d OFFSET %d",
            $albums_per_page, $offset
        ));
    
        // Count total albums for pagination
        $total_albums = $wpdb->get_var(
            "SELECT COUNT(*) FROM {$wpdb->posts} 
            WHERE post_type = 'ms-albums' 
            AND post_status = 'publish'"
        );
    
        if ($albums) {
            echo '<div class="container">'; // Ensure a container for proper Bootstrap layout
            echo '<div class="row g-4">';
    
            $count = 0;
            foreach ($albums as $album) {
                if ($count >= $rows * $columns) break; // Stop when the limit is reached
                $count++;
    
                $featured_image = get_the_post_thumbnail_url($album->ID, 'medium');
                $album_link = get_permalink($album->ID);
                $title = $album->post_title;
    
                // Bootstrap column setup based on the selected number of columns
                echo '<div class="col-md-' . (12 / $columns) . '">'; // Distributes columns properly
                echo '<div class="album-item card h-100">';
                echo '<a href="' . esc_url($album_link) . '">';
                echo '<div class="album-thumbnail card-img-top position-relative">';
                echo '<img src="' . esc_url($featured_image) . '" alt="' . esc_attr($title) . '" class="img-fluid">';
                echo '<div class="album-overlay position-absolute top-0 start-0 w-100 h-100"></div>';
                echo '<div class="album-play-icon position-absolute top-50 start-50 translate-middle">';
                if (!empty($settings['icon']['value'])) {
                    $icon_size = !empty($settings['icon_size']['size']) ? $settings['icon_size']['size'] . $settings['icon_size']['unit'] : '24px';
                
                    echo '<i class="' . esc_attr($settings["icon"]["value"]) . '" style="font-size: ' . esc_attr($icon_size) . ';"></i>';
                }
                
                echo '</div>';
                echo '</div>';
                echo '<div class="card-body">';
                echo '<h3 class="card-title">' . esc_html($title) . '</h3>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
                echo '</div>'; // End col
    
                // Close and open row after the last column in a row
                if ($count % $columns == 0) {
                    echo '</div><div class="row g-4">';
                }
            }
    
            echo '</div>'; // Close final row
            echo '</div>'; // Close container
            

            // Pagination
            $total_pages = ceil($total_albums / $albums_per_page);
            if ($total_pages > 1) {
                echo '<nav aria-label="Page navigation" class="mt-4">';
                echo '<ul class="pagination justify-content-center">';

                // Previous Button
                if ($paged > 1) {
                    echo '<li class="page-item">';
                    echo '<a class="page-link" href="?album_page=' . ($paged - 1) . '" aria-label="Previous">';
                    echo '<span aria-hidden="true">&laquo;</span>';
                    echo '</a>';
                    echo '</li>';
                } else {
                    echo '<li class="page-item">';
                    echo '<a class="page-link disabled" href="?album_page=#" aria-label="Previous">';
                    echo '<span aria-hidden="true">&laquo;</span>';
                    echo '</a>';
                    echo '</li>';
                }
                
                // Page Numbers
                for ($i = 1; $i <= $total_pages; $i++) {
                    $active_class = ($paged == $i) ? 'active' : '';
                    echo '<li class="page-item ' . $active_class . '">';
                    echo '<a class="page-link" href="?album_page=' . $i . '">' . $i . '</a>';
                    echo '</li>';
                }

                // Next Button
                if ($paged < $total_pages) {
                    echo '<li class="page-item">';
                    echo '<a class="page-link" href="?album_page=' . ($paged + 1) . '" aria-label="Next">';
                    echo '<span aria-hidden="true">&raquo;</span>';
                    echo '</a>';
                    echo '</li>';
                } else {
                    echo '<li class="page-item">';
                    echo '<a class="page-link disabled" href="?album_page=#" aria-label="Next">';
                    echo '<span aria-hidden="true">&raquo;</span>';
                    echo '</a>';
                    echo '</li>';
                }

                echo '</ul>';
                echo '</nav>';
            }
        } else {
            echo '<p class="text-center">No albums found.</p>';
        }
    }
}