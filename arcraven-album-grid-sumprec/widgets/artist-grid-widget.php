<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Elementor_Artists_Grid_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'artist_grid_widget';
    }

    public function get_title() {
        return __('Artist Grid', 'artist-grid-widget');
    }

    public function get_icon() {
        return 'eicon-user-circle-o';
    }

    public function get_categories() {
        return ['general'];
    }

    protected function _register_controls() {
        // Grid Settings
        $this->start_controls_section(
            'grid_settings',
            [
                'label' => __('Grid Settings', 'artist-grid-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'columns',
            [
                'label' => __('Number of Columns', 'artist-grid-widget'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3,
                'min' => 1,
                'max' => 6,
            ]
        );

        $this->add_control(
            'rows',
            [
                'label' => __('Number of Rows', 'artist-grid-widget'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 2,
                'min' => 1,
                'max' => 10,
            ]
        );

        $this->add_control(
            'artists_per_page',
            [
                'label' => __('Artists Per Page', 'artist-grid-widget'),
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
                'label' => __('Title Style', 'artist-grid-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'artist-grid-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .artist-item h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_size',
            [
                'label' => __('Title Size', 'artist-grid-widget'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .artist-item h3' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_alignment',
            [
                'label' => __('Title Alignment', 'artist-grid-widget'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'artist-grid-widget'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'artist-grid-widget'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'artist-grid-widget'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .artist-item h3' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Image Styles
        $this->start_controls_section(
            'image_style',
            [
                'label' => __('Image Style', 'artist-grid-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'image_border_radius',
            [
                'label' => __('Border Radius', 'artist-grid-widget'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .artist-item img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Icon Settings
        $this->start_controls_section(
            'icon_style',
            [
                'label' => __('Icon', 'artist-grid-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'artist-grid-widget'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-user',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label' => __('Icon Size', 'artist-grid-widget'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .artist-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __('Icon Color', 'artist-grid-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .artist-icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Card Settings
        $this->start_controls_section(
            'card_style',
            [
                'label' => __('Card Style', 'artist-grid-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_background_color',
            [
                'label' => __('Card Background Color', 'artist-grid-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .artist-item' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'card_hover_background_color',
            [
                'label' => __('Card Hover Background Color', 'artist-grid-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .artist-item:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'card_border_radius',
            [
                'label' => __('Card Border Radius', 'artist-grid-widget'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .artist-item' => 'border-radius: {{SIZE}}{{UNIT}};',
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
        $artists_per_page = $settings['artists_per_page']; //$columns * $rows;

        $paged = isset($_GET['artist_page']) ? absint($_GET['artist_page']) : 1;
        $offset = ($paged - 1) * $artists_per_page;

        // Fetch artists from database
        $artists = $wpdb->get_results($wpdb->prepare(
            "SELECT * FROM {$wpdb->posts} 
            WHERE post_type = 'ms-artists' 
            AND post_status = 'publish' 
            ORDER BY post_date DESC 
            LIMIT %d OFFSET %d",
            $artists_per_page, $offset
        ));

        // Count total artists for pagination
        $total_artists = $wpdb->get_var(
            "SELECT COUNT(*) FROM {$wpdb->posts} 
            WHERE post_type = 'ms-artists' 
            AND post_status = 'publish'"
        );

        if ($artists) {
            echo '<div class="container">';
            echo '<div class="row g-4">';

            $count = 0;
            foreach ($artists as $artist) {
                if ($count >= $rows * $columns) break;
                $count++;

                $featured_image = get_the_post_thumbnail_url($artist->ID, 'medium');
                $artist_link = get_permalink($artist->ID);
                $title = $artist->post_title;

                echo '<div class="col-md-' . (12 / $columns) . '">';
                echo '<div class="artist-item card h-100">';
                echo '<a href="' . esc_url($artist_link) . '">';
                echo '<div class="artist-thumbnail card-img-top position-relative">';
                echo '<img src="' . esc_url($featured_image) . '" alt="' . esc_attr($title) . '" class="img-fluid">';
                echo '<div class="artist-overlay position-absolute top-0 start-0 w-100 h-100"></div>';
                echo '<div class="artist-icon position-absolute top-50 start-50 translate-middle">';
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
                echo '</div>';

                if ($count % $columns == 0) {
                    echo '</div><div class="row g-4">';
                }
            }

            echo '</div>';
            echo '</div>';

            // Pagination
            $total_pages = ceil($total_artists / $artists_per_page);
            if ($total_pages > 1) {
                echo '<nav aria-label="Page navigation" class="mt-4">';
                echo '<ul class="pagination justify-content-center">';

                if ($paged > 1) {
                    echo '<li class="page-item">';
                    echo '<a class="page-link" href="?artist_page=' . ($paged - 1) . '" aria-label="Previous">';
                    echo '<span aria-hidden="true">&laquo;</span>';
                    echo '</a>';
                    echo '</li>';
                }

                for ($i = 1; $i <= $total_pages; $i++) {
                    $active_class = ($paged == $i) ? 'active' : '';
                    echo '<li class="page-item ' . $active_class . '">';
                    echo '<a class="page-link" href="?artist_page=' . $i . '">' . $i . '</a>';
                    echo '</li>';
                }

                if ($paged < $total_pages) {
                    echo '<li class="page-item">';
                    echo '<a class="page-link" href="?artist_page=' . ($paged + 1) . '" aria-label="Next">';
                    echo '<span aria-hidden="true">&raquo;</span>';
                    echo '</a>';
                    echo '</li>';
                }

                echo '</ul>';
                echo '</nav>';
            }
        } else {
            echo '<p class="text-center">No artists found.</p>';
        }
    }
}