<?php
/**
 * Plugin Name: Dynamic Copyright Shortcode
 * Description: Adds a shortcode [dynamic_copyright] to display a dynamic copyright message with optional "Copyright" text.
 * Version: 1.1
 * Author: Toncho Chobanov
 * License: GPL2
 * 
 * * Shortcode Usage:
 * [dynamic_copyright start_year="2020" company_name="Your Company" show_text="yes"]
 *
 * Attributes:
 * - start_year: (string) The starting year for the copyright. Default is "2024".
 * - company_name: (string) The name of the company. Default is "LogDesign".
 * - show_text: (string) Show the word "Copyright". Accepts "yes" or "no". Default is "yes".
 *
 * Output:
 * The shortcode generates HTML with spans for flexible styling:
 * <span class="dynamic-copyright-text">Copyright</span>
 * <span class="dynamic-copyright-symbol">&copy;</span>
 * <span class="dynamic-copyright-years">2020 - 2024</span>
 * <span class="dynamic-copyright-company">Your Company</span>
 *
 * Styling:
 * To customize the appearance, add CSS to your theme or Customizer:
 * .dynamic-copyright-text { ... }
 * .dynamic-copyright-symbol { ... }
 * .dynamic-copyright-years { ... }
 * .dynamic-copyright-company { ... }
 *
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
// Function to generate the shortcode content
function dynamic_copyright_shortcode($atts) {
    // Set default values for attributes
    $atts = shortcode_atts(
        array(
            'start_year'    => '2024',          // Default start year
            'company_name'  => 'LogDesign',   // Default company name
            'show_text'     => 'yes',          // Show "Copyright" text: yes/no
        ),
        $atts,
        'dynamic_copyright'
    );

    // Get the current year
    $current_year = date('Y');

    // Sanitize and validate start_year
    $start_year = intval($atts['start_year']); // Convert to integer    

    if ($start_year < 1900 || $start_year > $current_year) {
        $start_year = $current_year; // Fallback to current year if invalid
    }

    // Determine the year range
    $years = ($start_year == $current_year) ? $current_year : $atts['start_year'] . ' - ' . $current_year;

    // Prepare the "Copyright" text if enabled
    $copyright_text = (strtolower($atts['show_text']) === 'yes') ? '<span class="dynamic-copyright-text">Copyright</span> ' : '';

    // Generate the final output with spans for styling
    $output = $copyright_text .
              '<span class="dynamic-copyright-symbol">&copy;</span> ' .
              '<span class="dynamic-copyright-years">' . esc_html($years) . '</span> ' .
              '<span class="dynamic-copyright-company">' . esc_html($atts['company_name']) . '</span>';

    return $output;
}

// Register the shortcode
add_shortcode('dynamic_copyright', 'dynamic_copyright_shortcode');

// Add a menu page for shortcode instructions
function dynamic_copyright_admin_menu() {
    add_menu_page(
        'Dynamic Copyright Instructions',  // Page title
        'Copyright Shortcode',             // Menu title
        'manage_options',                  // Capability (admin access only)
        'dynamic-copyright',               // Menu slug
        'dynamic_copyright_instructions',  // Callback function
        'dashicons-editor-code',           // Menu icon
        99                                 // Position in menu
    );
}
add_action('admin_menu', 'dynamic_copyright_admin_menu');

// Callback function to display instructions
function dynamic_copyright_instructions() {
    ?>
    <div class="wrap">
        <h1>Dynamic Copyright Shortcode Instructions</h1>
        <p>To use the shortcode, add the following to your posts, pages, or widgets:</p>
        <pre>[dynamic_copyright start_year="2020" company_name="Your Company" show_text="yes"]</pre>
        
        <h2>Attributes:</h2>
        <ul>
            <li><strong>start_year</strong>: The starting year for the copyright. Default: <em>2024</em>.</li>
            <li><strong>company_name</strong>: The name of your company. Default: <em>LogDesign</em>.</li>
            <li><strong>show_text</strong>: Whether to display the word "Copyright". Options: <em>yes</em> or <em>no</em>. Default: <em>yes</em>.</li>
        </ul>

        <h2>Output:</h2>
        <p>The shortcode generates HTML with the following structure:</p>
        <pre>
<span class="dynamic-copyright-text">Copyright</span>
<span class="dynamic-copyright-symbol">&copy;</span>
<span class="dynamic-copyright-years">2020 - 2024</span>
<span class="dynamic-copyright-company">Your Company</span>
        </pre>

        <h2>Custom Styling:</h2>
        <p>To style the output, add the following CSS to your theme's stylesheet or in <strong>Appearance → Customize → Additional CSS</strong>:</p>
        <pre>
.dynamic-copyright-text {
    font-weight: bold;
    color: #333;
}

.dynamic-copyright-symbol {
    color: #ff4500;
    font-size: 1.2em;
}

.dynamic-copyright-years {
    color: #007acc;
    font-style: italic;
}

.dynamic-copyright-company {
    font-weight: bold;
    color: #228b22;
    text-transform: uppercase;
}
        </pre>

        <p>You can customize these styles to match your theme design.</p>
    </div>
    <?php
}

