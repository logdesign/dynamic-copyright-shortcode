# Dynamic Copyright Shortcode

**Dynamic Copyright Shortcode** is a lightweight WordPress plugin that adds a customizable shortcode to display a dynamic copyright message with flexible styling options.

---

## Features

- Dynamically displays the copyright year range (start year to current year).
- Includes an optional "Copyright" text.
- Allows customizing the company name.
- Generates clean and flexible HTML structure with CSS classes for styling.

---

## Installation

1. Download the plugin as a ZIP file.
2. Upload the ZIP file to your WordPress site:
   - Go to **Plugins → Add New → Upload Plugin**.
3. Activate the plugin in the **Plugins** menu.
4. Use the shortcode `[dynamic_copyright]` in your posts, pages, or widgets.

---

## Usage

Add the following shortcode to your WordPress content:

```plaintext
[dynamic_copyright start_year="2020" company_name="Your Company" show_text="yes"]
```

### Shortcode Attributes

| Attribute      | Description                                  | Default Value  | Example                 |
|----------------|----------------------------------------------|----------------|-------------------------|
| `start_year`   | The starting year for the copyright.         | `2024`         | `start_year="2020"`     |
| `company_name` | The name of the company to display.          | `LogDesign`    | `company_name="My Co."` |
| `show_text`    | Whether to display the word "Copyright".     | `yes`          | `show_text="no"`        |

---

## Example Outputs

### Default Usage:
```plaintext
[dynamic_copyright]
```
**Output:**
```html
<span class="dynamic-copyright-text">Copyright</span> 
<span class="dynamic-copyright-symbol">&copy;</span> 
<span class="dynamic-copyright-years">2024</span> 
<span class="dynamic-copyright-company">LogDesign</span>
```

### Custom Example:
```plaintext
[dynamic_copyright start_year="2020" company_name="My Company" show_text="no"]
```
**Output:**
```html
<span class="dynamic-copyright-symbol">&copy;</span> 
<span class="dynamic-copyright-years">2020 - 2024</span> 
<span class="dynamic-copyright-company">My Company</span>
```

---

## Styling

You can customize the appearance of each part of the output using CSS. Here are the default CSS classes:

```css
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
```

Add this CSS to your theme's stylesheet or in **Appearance → Customize → Additional CSS**.

---

## License

This plugin is licensed under the **GPL v2 or later**.  
[Learn more about GPL licensing](https://www.gnu.org/licenses/gpl-2.0.html).

---

## Author

**Toncho Chobanov**  
For suggestions or feedback, feel free to reach out!

---

## Contribution

Feel free to contribute to the development of this plugin by submitting pull requests on GitHub.
